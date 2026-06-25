<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use App\Models\TipeKamar;
use App\Models\Kamar;

class LaporanController extends Controller
{
    public function index(Request $request)
    {
        $query = Booking::query();

        // Filter tanggal check in
        if ($request->filled('tanggal_awal')) {
            $query->whereDate(
                'check_in',
                '>=',
                $request->tanggal_awal
            );
        }

        if ($request->filled('tanggal_akhir')) {
            $query->whereDate(
                'check_out',
                '<=',
                $request->tanggal_akhir
            );
        }

        // Filter status
        if ($request->filled('status')) {
            $query->where(
                'status',
                $request->status
            );
        }

        $bookings = $query
            ->latest()
            ->get();

        $totalBooking = $bookings->count();

        $confirmed = $bookings
            ->where('status', 'confirmed')
            ->count();

        $pending = $bookings
            ->whereIn('status', [
                'pending',
                'waiting_verification'
            ])
            ->count();

        $totalPendapatan = $bookings
            ->where('status', 'confirmed')
            ->sum('total_price');

        $chartData = Booking::where('status', 'confirmed')
            ->selectRaw('MONTH(check_in) as bulan')
            ->selectRaw('SUM(total_price) as total')
            ->groupBy('bulan')
            ->orderBy('bulan')
            ->get();

        return view(
            'pages.laporan',
            compact(
                'bookings',
                'totalBooking',
                'confirmed',
                'pending',
                'totalPendapatan',
                'chartData'
            )
        );
    }
}