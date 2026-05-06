@extends('layouts.app')

@section('title', 'Laporan')

@section('content')

<style>
.content-box {
    background: #f1f5f9;
    padding: 25px;
    border-radius: 16px;
}

/* FILTER */
.filter-box {
    display: flex;
    gap: 10px;
    margin-bottom: 20px;
}

.filter-box input, .filter-box button {
    padding: 8px 12px;
    border-radius: 8px;
    border: 1px solid #ddd;
}

.filter-box button {
    background: #3b82f6;
    color: white;
    border: none;
    cursor: pointer;
}

/* CARDS */
.cards {
    display: flex;
    gap: 20px;
    margin-bottom: 25px;
}

.card {
    flex: 1;
    padding: 20px;
    border-radius: 12px;
    color: white;
}

.card h1 {
    margin: 10px 0 0;
}

.blue { background: #3b82f6; }
.green { background: #10b981; }
.orange { background: #f59e0b; }

/* TABLE */
.table-box {
    background: white;
    padding: 20px;
    border-radius: 14px;
}

table {
    width: 100%;
    border-collapse: collapse;
}

th {
    background: #f1f5f9;
    padding: 14px;
    text-align: left;
    color: #475569;
}

td {
    padding: 14px;
    border-bottom: 1px solid #eee;
    color: #1e293b;
}

tr:hover {
    background: #f9fafb;
}
</style>

<div class="content-box">

    <!-- FILTER -->
    <div class="filter-box">
        <input type="date">
        <input type="date">
        <button>Filter</button>
    </div>

    <!-- RINGKASAN -->
    <div class="cards">
        <div class="card blue">
            Total Booking
            <h1>80</h1>
        </div>

        <div class="card green">
            Pendapatan
            <h1>Rp 40.000.000</h1>
        </div>

        <div class="card orange">
            Kamar Terpakai
            <h1>65</h1>
        </div>
    </div>

    <!-- TABEL LAPORAN -->
    <div class="table-box">
        <h3>Laporan Booking</h3>

        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Kamar</th>
                    <th>Tanggal</th>
                    <th>Harga</th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <td>1</td>
                    <td>Cia</td>
                    <td>Deluxe</td>
                    <td>12 Mei 2026</td>
                    <td>Rp 500.000</td>
                </tr>

                <tr>
                    <td>2</td>
                    <td>Andi</td>
                    <td>Suite</td>
                    <td>14 Mei 2026</td>
                    <td>Rp 900.000</td>
                </tr>
            </tbody>
        </table>
    </div>

</div>

@endsection