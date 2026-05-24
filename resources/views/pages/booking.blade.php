@extends('layouts.app')

@section('title', 'Booking')

@section('content')

<style>
    .content-box {
        background: #f1f5f9;
        padding: 25px;
        border-radius: 16px;
    }

    .card {
        background: white;
        padding: 20px;
        border-radius: 14px;
    }

    .header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 20px;
    }

    .btn-add {
        background: #10b981;
        color: white;
        padding: 10px 16px;
        border: none;
        border-radius: 8px;
        font-weight: 600;
        cursor: pointer;
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

    .status {
        padding: 5px 12px;
        border-radius: 20px;
        font-size: 12px;
    }

    .confirmed {
        background: #d1fae5;
        color: #065f46;
    }

    .pending {
        background: #fef3c7;
        color: #92400e;
    }

    .btn {
        padding: 6px 12px;
        border: none;
        border-radius: 6px;
        cursor: pointer;
    }

    .edit {
        background: #3b82f6;
        color: white;
    }

    .delete {
        background: #ef4444;
        color: white;
    }
</style>

<div class="content-box">

    <div class="header">
        <h3>Data Booking</h3>
        <button class="btn-add">+ Tambah Booking</button>
    </div>

    <div class="card">
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Kamar</th>
                    <th>Tanggal</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <td>1</td>
                    <td>Cia</td>
                    <td>Deluxe</td>
                    <td>12 Mei 2026</td>
                    <td><span class="status confirmed">Confirmed</span></td>
                    <td>
                        <button class="btn edit">Edit</button>
                        <button class="btn delete">Hapus</button>
                    </td>
                </tr>

                <tr>
                    <td>2</td>
                    <td>Andi</td>
                    <td>Suite</td>
                    <td>14 Mei 2026</td>
                    <td><span class="status pending">Pending</span></td>
                    <td>
                        <button class="btn edit">Edit</button>
                        <button class="btn delete">Hapus</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

</div>

@endsection