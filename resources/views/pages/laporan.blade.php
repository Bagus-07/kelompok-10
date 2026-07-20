@extends('layouts.admin')

@section('title', __('messages.report'))

@section('content')

<!-- FILTER -->
<div class="box">

    <div class="box-header">
        <div>
            <h3>{{ __('messages.hotel_report') }}</h3>
            <p>{{ __('messages.monitoring') }}</p>
        </div>

        <form action="{{ route('laporan') }}" method="GET" class="filter-box">

            <input
                type="date"
                name="start_date"
                value="{{ request('start_date') }}"
            >

            <input
                type="date"
                name="end_date"
                value="{{ request('end_date') }}"
            >

            <button type="submit" class="btn btn-blue">
                Filter
            </button>

        </form>

    </div>

</div>

<!-- CARD -->
<div class="cards">

    <div class="card blue">
        <h4>{{ __('messages.total_bookings') }}</h4>
        <h1>{{ $totalBooking }}</h1>
    </div>

    <div class="card green">
        <h4>{{ __('messages.income') }}</h4>
        <h1>Rp {{ number_format($totalPendapatan, 0, ',', '.') }}</h1>
    </div>

    <div class="card orange">
        <h4>{{ __('messages.occupied_room') }}</h4>
        <h1>{{ $kamarTerisi }}</h1>
    </div>

</div>

<!-- GRAFIK -->
<div class="box">

    <div class="box-header">
        <div>
            <h3>{{ __('messages.revenue_chart') }}</h3>
            <p>{{ __('messages.statistics') }}</p>
        </div>
    </div>

    <canvas id="revenueChart" height="90"></canvas>

</div>

<!-- TABLE -->
<div class="box">

    <div class="box-header">

        <div>
            <h3>{{ __('messages.booking_report') }}</h3>
            <p>{{ __('messages.new_booking_list') }}</p>
        </div>

        <div style="display:flex; gap:10px;">
            <a href="{{ route('laporan.exportPdf') }}" class="btn btn-green">
                Export PDF
            </a>
            <a href="{{ route('reports.export.excel') }}" class="btn btn-blue">
                Export Excel
            </a>
        </div>

    </div>

    <table>

        <thead>
            <tr>
                <th>No</th>
                <th>{{ __('messages.name') }}</th>
                <th>{{ __('messages.rooms') }}</th>
                <th>{{ __('messages.date') }}</th>
                <th>{{ __('messages.status') }}</th>
                <th>{{ __('messages.price') }}</th>
            </tr>
        </thead>

        <tbody>

            @forelse($bookings as $booking)

<tr>
    <td>{{ $loop->iteration }}</td>

    <td>{{ $booking->nama }}</td>

    <td>
        <strong>Tipe:</strong>
        {{ $booking->room_name }}<br>
        <strong>No:</strong>
        {{ $booking->room->nama ?? $booking->kamar ?? '-' }}
    </td>

    <td>
        {{ \Carbon\Carbon::parse($booking->check_in)->format('d M Y') }}
    </td>

    <td>
        <span class="status {{ $booking->statusClass() }}">
            {{ $booking->statusLabel() }}
        </span>
    </td>

    <td>
        Rp {{ number_format($booking->total_price,0,',','.') }}
    </td>
</tr>

@empty

<tr>
    <td colspan="6" style="text-align:center">
        {{ __('messages.admin_no_bookings') }}
    </td>
</tr>

@endforelse 

        </tbody>

    </table>

</div>

<!-- CHART -->
<script>

const ctx = document.getElementById('revenueChart');

new Chart(ctx, {

    type: 'line',

    data: {

        labels: @json($labels),
        
        datasets: [{
            label: 'Pendapatan',
            data: @json($data),

            borderColor: '#2563eb',
            backgroundColor: 'rgba(37,99,235,0.1)',

            borderWidth: 4,
            fill: true,
            tension: 0.4,
            pointRadius: 5
        }]
    },

    options: {
        responsive: true
    }

});

</script>

@endsection