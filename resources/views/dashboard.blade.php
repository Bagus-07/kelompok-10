@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

<!-- CARDS -->
<div class="cards">
    <div class="card blue">
        Total User
        <h1>120</h1>
    </div>

    <div class="card green">
        Total Booking
        <h1>80</h1>
    </div>

    <div class="card orange">
        Kamar Tersedia
        <h1>25</h1>
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
        <tr>
            <td>Cia</td>
            <td>Deluxe</td>
            <td>12 Mei 2026</td>
            <td><span class="status confirmed">Confirmed</span></td>
        </tr>
        <tr>
            <td>Andi</td>
            <td>Suite</td>
            <td>14 Mei 2026</td>
            <td><span class="status pending">Pending</span></td>
        </tr>
    </table>
</div>

@endsection