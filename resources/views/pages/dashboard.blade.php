@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')

<!-- CARDS -->
<div class="cards">

    <div class="card blue">
        Total User
        <h1>{{ $users }}</h1>
    </div>

    <div class="card green">
        Total Booking
        <h1>{{ $bookings }}</h1>
    </div>

    <div class="card orange">
        Kamar Tersedia
        <h1>{{ $rooms }}</h1>
    </div>

</div>


<!-- TABLE -->
<div class="table-box">

    <h3>Booking Terbaru</h3>

    <table>

        <tr>
            <th>Nama</th>
            <th>Kamar</th>
            <th>Tanggal</th>
            <th>Status</th>
        </tr>


        @forelse($bookingTerbaru as $booking)

        <tr>

            <td>
                {{ $booking->nama ?? $booking->user->name ?? '-' }}
            </td>

            <td>
                {{ $booking->room->nama ?? $booking->kamar ?? '-' }}
            </td>

            <td>
                {{ $booking->created_at->format('d M Y') }}
            </td>

            <td>

                @if($booking->status == 'confirmed')

                    <span class="status confirmed">
                        Confirmed
                    </span>

                @elseif($booking->status == 'pending')

                    <span class="status pending">
                        Pending
                    </span>

                @else

                    <span class="status">
                        {{ $booking->status }}
                    </span>

                @endif

            </td>

        </tr>

        @empty

        <tr>
            <td colspan="4" style="text-align:center">
                Belum ada booking
            </td>
        </tr>

        @endforelse


    </table>

</div>

@endsection