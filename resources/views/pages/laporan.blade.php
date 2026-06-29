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
        <h1>80</h1>
        <p>↑ 12% dari bulan lalu</p>
    </div>

    <div class="card green">
        <h4>Pendapatan</h4>
        <h1>40JT</h1>
        <p>↑ 18% minggu ini</p>
    </div>

    <div class="card orange">
        <h4>Kamar Terisi</h4>
        <h1>65</h1>
        <p>80% okupansi</p>
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

        <button class="btn btn-green">
            Export PDF
        </button>

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

            <tr>
                <td>1</td>
                <td>Cia</td>
                <td>Deluxe</td>
                <td>12 Mei 2026</td>

                <td>
                    <span class="status success">
                        Success
                    </span>
                </td>

                <td>Rp 500.000</td>
            </tr>

            <tr>
                <td>2</td>
                <td>Andi</td>
                <td>Suite</td>
                <td>14 Mei 2026</td>

                <td>
                    <span class="status pending">
                        Pending
                    </span>
                </td>

                <td>Rp 900.000</td>
            </tr>

        </tbody>

    </table>

</div>

<!-- CHART -->
<script>

const ctx = document.getElementById('revenueChart');

new Chart(ctx, {

    type: 'line',

    data: {

        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun'],

        datasets: [{
            label: 'Pendapatan',
            data: [12000000, 18000000, 15000000, 25000000, 30000000, 40000000],

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