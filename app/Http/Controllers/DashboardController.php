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
        $users = User::where('role', 'user')->count();
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
  public function laporan(Request $request)
{
    $start = $request->start_date;
    $end = $request->end_date;

    // ==========================
    // TOTAL BOOKING
    // ==========================
    $bookingQuery = Booking::query();

    if ($start && $end) {
        $bookingQuery->whereBetween('check_in', [$start, $end]);
    }

    $totalBooking = $bookingQuery->count();

    // ==========================
    // TOTAL PENDAPATAN
    // ==========================
    $pendapatanQuery = Booking::whereIn('status', ['confirmed', 'completed']);

    if ($start && $end) {
        $pendapatanQuery->whereBetween('check_in', [$start, $end]);
    }

    $totalPendapatan = $pendapatanQuery->sum('total_price');

    // ==========================
    // KAMAR TERISI
    // ==========================
    $kamarQuery = Booking::whereIn('status', ['confirmed', 'completed']);

    if ($start && $end) {
        $kamarQuery->whereBetween('check_in', [$start, $end]);
    }

    $kamarTerisi = $kamarQuery->count();

    // ==========================
    // DATA BOOKING
    // ==========================
    $bookings = Booking::when($start && $end, function ($query) use ($start, $end) {
            $query->whereBetween('check_in', [$start, $end]);
        })
        ->latest()
        ->get();

    // ==========================
    // DATA GRAFIK PENDAPATAN
    // ==========================
    $grafik = Booking::select(
            DB::raw('MONTH(check_in) as bulan'),
            DB::raw('SUM(total_price) as total')
        )
        ->whereIn('status', ['confirmed', 'completed']);

    if ($start && $end) {
        $grafik->whereBetween('check_in', [$start, $end]);
    }

    $grafik = $grafik->groupBy(DB::raw('MONTH(check_in)'))
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
    // EXPORT PDF & EXCEL
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
