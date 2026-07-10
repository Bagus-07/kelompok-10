<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Booking;
use App\Models\Kamar;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\BookingExport;

class DashboardController extends Controller
{
    // ==========================
    // DASHBOARD
    // ==========================
    public function tampilkan()
    {
        $users = User::count();
        $bookings = Booking::count();
        $rooms = Kamar::where('status', 'Tersedia')->count();

        $bookingTerbaru = Booking::latest()->take(5)->get();

        return view('pages.dashboard', compact(
            'users',
            'bookings',
            'rooms',
            'bookingTerbaru'
        ));
    }

    // ==========================
    // LAPORAN
    // ==========================
    public function laporan()
    {
        $totalBooking = Booking::count();

        $totalPendapatan = Booking::whereIn('status', ['confirmed','completed'])
            ->sum('total_price');

        $kamarTerisi = Booking::whereIn('status', ['confirmed','completed'])
            ->count();

        $bookings = Booking::latest()->get();

        // ==========================
        // DATA GRAFIK PENDAPATAN
        // ==========================
        $grafik = Booking::select(
                DB::raw('MONTH(check_in) as bulan'),
                DB::raw('SUM(total_price) as total')
            )
            ->whereIn('status', ['confirmed','completed'])
            ->groupBy(DB::raw('MONTH(check_in)'))
            ->orderBy('bulan')
            ->get();

        $labels = [];
        $data = [];

        foreach ($grafik as $item) {
            $labels[] = date('M', mktime(0, 0, 0, $item->bulan, 1));
            $data[] = $item->total;
        }

        return view('pages.laporan', compact(
            'totalBooking',
            'totalPendapatan',
            'kamarTerisi',
            'bookings',
            'labels',
            'data'
        ));
    }

    // ==========================
    // EXPORT PDF &7 EXCEL
    // ==========================
    public function exportPdf()
    {
        $bookings = Booking::latest()->get();

        $tanggalCetak = now();

        $pdf = Pdf::loadView(
            'pages.laporan_pdf',
            compact('bookings', 'tanggalCetak')
        );

        return $pdf->download('laporan-booking.pdf');
    }

    public function exportExcel()
    {
        return Excel::download(new BookingExport, 'laporan-booking.xlsx');
    }
}