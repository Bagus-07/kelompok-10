<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Kamar;
use App\Models\User;
use App\Models\TipeKamar;
use Carbon\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;

class AdminBookingController extends Controller
{
    public function index()
    {
        $bookings = Booking::latest()->get();
        $users = User::where('role', 'user')
            ->orderBy('name')
            ->get();
        $tipeKamars = TipeKamar::orderBy('nama_tipe')->get();

        return view(
            'pages.booking',
            compact(
                'bookings',
                'users',
                'tipeKamars'
            )
        );
    }

    public function approve($id)
    {
        $booking = Booking::findOrFail($id);

        $booking->update([
            'status' => 'confirmed'
        ]);

        Kamar::where('nomor_kamar', $booking->kamar)
            ->update(['status' => 'Dipakai']);

        return redirect()
            ->route('admin.booking')
            ->with('success', 'Booking berhasil dikonfirmasi');
    }

    public function reject($id)
    {
        $booking = Booking::findOrFail($id);

        $booking->update([
            'status' => 'rejected'
        ]);

        Kamar::where('id', $booking->kamar_id)
            ->update([
                'status' => 'Tersedia'
            ]);

        return redirect()
            ->route('admin.booking')
            ->with('success', 'Booking berhasil ditolak');
    }
    public function checkout($id)
    {
        $booking = Booking::findOrFail($id);

        $booking->update([
            'status' => 'completed'
        ]);

        Kamar::where('nomor_kamar', $booking->kamar)
            ->update([
                'status' => 'Cleaning'
            ]);

        return redirect()
            ->route('admin.booking')
            ->with('success', 'Guest berhasil checkout.');
    }

    public function store(Request $request)
    {
        $request->validate([

            'user_id' => 'required|exists:users,id',
            'room_name' => 'required',
            'check_in' => 'required|date',
            'check_out' => 'required|date|after:check_in',
            'payment_method' => 'required',

        ],[

            'user_id.required' => 'Silakan pilih tamu.',
            'user_id.exists' => 'Data tamu tidak ditemukan.',

            'room_name.required' => 'Silakan pilih tipe kamar.',

            'check_in.required' => 'Tanggal check-in wajib diisi.',
            'check_in.date' => 'Tanggal check-in tidak valid.',

            'check_out.required' => 'Tanggal check-out wajib diisi.',
            'check_out.date' => 'Tanggal check-out tidak valid.',
            'check_out.after' => 'Tanggal check-out harus setelah check-in.',

            'payment_method.required' => 'Metode pembayaran wajib dipilih.',

        ]);

        $hotelCheckInHour = 14;
        $hotelCheckOutHour = 12;

        $checkIn = \Carbon\Carbon::parse($request->check_in)
            ->setTime($hotelCheckInHour,0);

        $checkOut = \Carbon\Carbon::parse($request->check_out)
            ->setTime($hotelCheckOutHour,0);

        $kamar = Kamar::whereHas('tipeKamar', function($q) use ($request){

            $q->where(
                'nama_tipe',
                $request->room_name
            );

        })

        ->where('status','Tersedia')

        ->whereDoesntHave('bookings', function($q) use($checkIn,$checkOut){

            $q->whereIn('status',[
                'confirmed',
                'waiting_verification'
            ])

            ->where(function($query) use($checkIn,$checkOut){

                $query
                    ->where('check_in','<',$checkOut)
                    ->where('check_out','>',$checkIn);

            });

        })

        ->first();

        if(!$kamar){

            return back()
                ->withErrors([
                    'room_name' => 'Tidak ada kamar tersedia pada tanggal tersebut.'
                ])
                ->withInput()
                ->with('form_type','create_booking');

        }

        $malam = Carbon::parse($request->check_in)
            ->startOfDay()
            ->diffInDays(
                Carbon::parse($request->check_out)
                    ->startOfDay()
            );

        $harga = $kamar
            ->tipeKamar
            ->harga_per_malam;

        $total = $malam * $harga;

        $user = \App\Models\User::findOrFail(
            $request->user_id
        );

        Booking::create([

            'user_id'=>$user->id,
            'nama'=>$user->name,
            'kamar'=>$kamar->nomor_kamar,
            'room_name'=>$request->room_name,
            'tanggal'=>now(),
            'check_in'=>$checkIn,
            'check_out'=>$checkOut,
            'payment_method'=>$request->payment_method,
            'total_price'=>$total,
            'status'=>'confirmed',
            'booking_source'=>'walk_in',
            'created_by' => auth()->id()

        ]);

        $kamar->update([
            'status'=>'Dipakai'
        ]);

        return redirect()
            ->route('admin.booking')
            ->with(
                'success',
                'Booking walk-in berhasil dibuat.'
            );
    }

    public function receipt(Booking $booking)
    {
        $prefix = $booking->booking_source == 'walk_in'
        ? 'WIN'
        : 'ONL';

        $receiptNumber =
            $prefix . '-' .
            $booking->created_at->format('Ymd') .
            '-' .
            str_pad($booking->id,5,'0',STR_PAD_LEFT);

        $pdf = Pdf::loadView(
            'pages.receipt_pdf',
            compact(
                'booking',
                'receiptNumber'
            )
        );

        return $pdf->stream(
            'reservation-'.$booking->id.'.pdf'
        );
    }
}