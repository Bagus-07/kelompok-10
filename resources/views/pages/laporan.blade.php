@extends('layouts.admin')

@section('title', 'Laporan')

@section('content')

<!-- FILTER -->
<div class="box">

    <div class="box-header">
        <div>
            <h3>Laporan Hotel</h3>
            <p>Monitoring pendapatan dan booking hotel</p>
        </div>

        <div class="filter-box">
            <input type="date">
            <input type="date">

            <button class="btn btn-blue">
                Filter
            </button>
        </div>
    </div>

</div>

<!-- CARD -->
<div class="cards">

    <div class="card blue">
        <h4>Total Booking</h4>
        <h1>{{ $totalBooking }}</h1>
    </div>

    <div class="card green">
        <h4>Pendapatan</h4>
        <h1>Rp {{ number_format($totalPendapatan, 0, ',', '.') }}</h1>
    </div>

    <div class="card orange">
        <h4>Kamar Terisi</h4>
        <h1>{{ $kamarTerisi }}</h1>
    </div>

</div>

<!-- GRAFIK -->
<div class="box">

    <div class="box-header">
        <div>
            <h3>Grafik Pendapatan</h3>
            <p>Statistik pendapatan hotel per bulan</p>
        </div>
    </div>

    <canvas id="revenueChart" height="90"></canvas>

</div>

<!-- TABLE -->
<div class="box">

    <div class="box-header">

        <div>
            <h3>Laporan Booking</h3>
            <p>Daftar booking terbaru hotel</p>
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
                <th>Nama</th>
                <th>Kamar</th>
                <th>Tanggal</th>
                <th>Status</th>
                <th>Harga</th>
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
        <span class="status {{ $booking->status }}">
            {{ ucfirst($booking->status) }}
        </span>
    </td>

    <td>
        Rp {{ number_format($booking->total_price,0,',','.') }}
    </td>
</tr>

@empty

<tr>
    <td colspan="6" style="text-align:center">
        Belum ada data booking
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