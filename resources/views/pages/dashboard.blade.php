@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')

<!-- CARDS -->
<div class="cards">

    <div class="card blue">
        {{ __('messages.total_users') }}
        <h1>{{ $users }}</h1>
    </div>

    <div class="card green">
        {{ __('messages.total_bookings') }}
        <h1>{{ $bookings }}</h1>
    </div>

    <div class="card orange">
        {{ __('messages.room_available') }}
        <h1>{{ $rooms }}</h1>
    </div>

</div>


<!-- TABLE -->
<div class="table-box">

    <h3>{{ __('messages.new_bookings') }}</h3>

    <table>

        <tr>
            <th>{{ __('messages.name') }}</th>
            <th>{{ __('messages.rooms') }}</th>
            <th>{{ __('messages.date') }}</th>
            <th>{{ __('messages.status') }}</th>
        </tr>


        @forelse($bookingTerbaru as $booking)

        <tr>

            <td>
                {{ $booking->nama ?? $booking->user->name ?? '-' }}
            </td>

            <td>
                <strong>Tipe:</strong>
                {{ $booking->room_name }}<br>
                <strong>No:</strong>
                {{ $booking->room->nama ?? $booking->kamar ?? '-' }}
            </td>

            <td>
                {{ $booking->created_at->format('d M Y') }}
            </td>

            <td>

                <span class="status {{ $booking->statusClass() }}">
                    {{ $booking->statusLabel() }}
                </span>
            </td>
        </tr>

        @empty

        <tr>
            <td colspan="4" style="text-align:center">
                {{ __('messages.no_new_bookings') }}
            </td>
        </tr>

        @endforelse


    </table>

</div>

@endsection