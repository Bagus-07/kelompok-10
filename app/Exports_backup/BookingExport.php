<?php

namespace App\Exports;

use App\Models\Booking;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;

class BookingExport implements FromCollection, ShouldAutoSize, WithEvents
{
    public function collection()
    {
        return Booking::select(
            'nama',
            'room_name',
            'kamar',
            'check_in',
            'status',
            'total_price'
        )->orderByDesc('check_in')->get();
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {

                $sheet = $event->sheet->getDelegate();
                $rows = Booking::orderByDesc('check_in')->get();

                $sheet->insertNewRowBefore(1,8);

                $drawing = new Drawing();

                $drawing->setName('Logo');
                $drawing->setDescription('StayEase Logo');
                $drawing->setPath(public_path('photo/new logo.jpeg'));
                $drawing->setHeight(70);
                $drawing->setCoordinates('A1');
                $drawing->setWorksheet($sheet);

                $sheet->mergeCells('B1:F1');
                $sheet->mergeCells('B2:F2');
                $sheet->mergeCells('B3:F3');
                $sheet->mergeCells('B5:F5');

                $sheet->setCellValue('B1','STAYEASE HOTEL');
                $sheet->setCellValue('B2','Hotel Reservation System');
                $sheet->setCellValue('B3','Jl. Ahmad Yani No.20, Batam');
                $sheet->setCellValue('B5','LAPORAN BOOKING HOTEL');
                $sheet->getStyle('B4:F4')
                ->getBorders()
                ->getBottom()
                ->setBorderStyle(Border::BORDER_MEDIUM);
                $sheet->setCellValue('B6','Tanggal Cetak : '.Carbon::now()->format('d M Y'));
                $sheet->setCellValue('E6','Total Booking : '.$rows->count().' Data');
                $sheet->setCellValue('E7','Total Pendapatan : Rp '.number_format($rows->sum('total_price'),0,',','.'));

                $headerRow=9;
                $headers=['No','Nama','Kamar','Check In','Status','Total Harga'];
                foreach($headers as $i=>$h){
                    $sheet->setCellValue(chr(65+$i).$headerRow,$h);
                }

                $r=10;$no=1;
                foreach($rows as $b){
                    $sheet->setCellValue("A$r",$no++);
                    $sheet->setCellValue("B$r",$b->nama);
                    $sheet->setCellValue("C$r",$b->room_name ?: $b->kamar);
                    $sheet->setCellValue("D$r",Carbon::parse($b->check_in)->format('d M Y'));
                    $sheet->setCellValue("E$r",ucwords(str_replace('_',' ',$b->status)));
                    $sheet->setCellValue("F$r",$b->total_price);

                    $sheet->getStyle("F$r")->getNumberFormat()->setFormatCode('"Rp" #,##0');

                    $color='FFFFFF';
                    switch(strtolower($b->status)){
                        case 'confirmed': $color='D1FAE5'; break;
                        case 'pending': $color='FEF3C7'; break;
                        case 'cancelled': $color='FECACA'; break;
                        case 'waiting_verification': $color='DBEAFE'; break;
                    }
                    $sheet->getStyle("E$r")->getFill()->setFillType(Fill::FILL_SOLID)->getStartColor()->setRGB($color);
                    // ==========================
                    // Zebra Stripe
                    // ==========================
                    if ($r % 2 == 0) {
                        
                    $sheet->getStyle("A$r:F$r")
                    ->getFill()
                    ->setFillType(Fill::FILL_SOLID)
                    ->getStartColor()
                    ->setRGB('F8FAFC');
                    
                    // Supaya warna status tetap muncul
                    $sheet->getStyle("E$r")->getFill()
                    ->setFillType(Fill::FILL_SOLID)
                    ->getStartColor()
                    ->setRGB($color);
                    }

                    $r++;
                }

                $last=$r-1;
                $sheet->getStyle("A9:F{$last}")
                ->getAlignment()
                ->setVertical(Alignment::VERTICAL_CENTER);
                
                $sheet->getStyle("A10:A{$last}")
                ->getAlignment()
                ->setHorizontal(Alignment::HORIZONTAL_CENTER);

                $sheet->getStyle("D10:D{$last}")
                ->getAlignment()
                ->setHorizontal(Alignment::HORIZONTAL_CENTER);

                $sheet->getStyle("E10:E{$last}")
                ->getAlignment()
                ->setHorizontal(Alignment::HORIZONTAL_CENTER);

                $sheet->getStyle("F10:F{$last}")
                ->getAlignment()
                ->setHorizontal(Alignment::HORIZONTAL_RIGHT);

                $sheet->getStyle("A9:F$last")->getBorders()->getAllBorders()->setBorderStyle(Border::BORDER_THIN);

                $sheet->getStyle("A9:F9")->applyFromArray([
                    'font'=>['bold'=>true,'color'=>['rgb'=>'FFFFFF']],
                    'fill'=>['fillType'=>Fill::FILL_SOLID,'startColor'=>['rgb'=>'1E3A8A']],
                    'alignment'=>['horizontal'=>Alignment::HORIZONTAL_CENTER]
                ]);

                $sheet->getRowDimension(9)->setRowHeight(28);

                foreach(['B1','B2','B3','B5'] as $c) {
                    $sheet->getStyle($c)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
                }
                $sheet->getStyle('B1')->getFont()->setBold(true)->setSize(20);
                $sheet->getStyle('B5')->getFont()->setBold(true)->setSize(14);

                $sheet->freezePane('A10');
                $sheet->setAutoFilter("A9:F$last");
                $sheet->getColumnDimension('A')->setWidth(8);
                $sheet->getColumnDimension('B')->setWidth(30);
                $sheet->getColumnDimension('C')->setWidth(25);
                $sheet->getColumnDimension('D')->setWidth(18);
                $sheet->getColumnDimension('E')->setWidth(24);
                $sheet->getColumnDimension('F')->setWidth(20);

                $footer = $last + 4;
                
                $sheet->setCellValue("E{$footer}","Batam, ".Carbon::now()->format('d M Y'));
                
                $sheet->setCellValue("E".($footer+1),"Administrator");
                
                $sheet->setCellValue("E".($footer+5),
                "____________________");
            }
        ];
    }
}