@extends('layouts.admin')

@section('title', 'Booking')

@section('content')

<style>

    .modal{
        display:none;
        position:fixed;
        inset:0;
        background:rgba(0,0,0,.45);
        justify-content:center;
        align-items:center;
        z-index:9999;
    }

    .modal-content{
        background:white;
        width:500px;
        border-radius:14px;
        padding:25px;
    }

    .modal-header{
        display:flex;
        justify-content:space-between;
        align-items:center;
        margin-bottom:20px;
    }

    .close{
        cursor:pointer;
        font-size:28px;
    }

    .form-group{
        margin-bottom:18px;
    }

    .form-group label{
        display:block;
        margin-bottom:8px;
        color:#111827;
        font-weight:600;
    }

    .form-group input,
    .form-group select{
        width:100%;
        padding:10px;
        border:1px solid #ccc;
        border-radius:8px;
        color:#111827;
        background:#fff;
    }

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

    .btn {
        padding: 8px 14px;
        border: none;
        border-radius: 6px;
        cursor: pointer;
        text-decoration: none;
        display: inline-block;
        margin-right: 6px;
    }

    .edit {
        background: #3b82f6;
        color: white;
    }

    .delete {
        background: #ef4444;
        color: white;
    }

    .action-buttons{
        display: flex;
        align-items: center;
        gap: 8px;
        flex-wrap: wrap;
    }

    .action-buttons form{
        margin: 0;
    }

    th:last-child,
    td:last-child{
        min-width: 280px;
    }

</style>

<div class="content-box">

    <div class="header">
        <h3>Data Booking</h3>
        <button
            class="btn-add"
            onclick="openBookingModal()">

            + Tambah Booking

        </button>
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
         <strong>Check-in:</strong>
        {{ \Carbon\Carbon::parse($booking->check_in)->format('d M Y H:i') }} WIB
        <br>
        <strong>Check-out:</strong>
        {{ \Carbon\Carbon::parse($booking->check_out)->format('d M Y H:i') }} WIB
    </td>

    <td>

<span class="status {{ $booking->statusClass() }}">

    {{ $booking->statusLabel() }}

</span>

    </td>

    <td>

<div class="action-buttons">

    @if($booking->booking_source == 'walk_in')

    <a
        href="{{ route('booking.receipt',$booking->id) }}"
        target="_blank"
        class="btn edit">

        Lihat Receipt

    </a>

    @elseif($booking->payment_proof)

    <a
        href="{{ asset('storage/'.$booking->payment_proof) }}"
        target="_blank"
        class="btn edit">

        Lihat Bukti Transfer

    </a>

    @endif

    @if($booking->status == 'waiting_verification')

        <form action="{{ route('booking.approve', $booking->id) }}"
              method="POST">

            @csrf
            @method('PUT')

            <button type="submit"
                    class="btn"
                    style="background:#10b981;color:white;">
                Approve
            </button>

        </form>

        <form action="{{ route('booking.reject', $booking->id) }}"
              method="POST">

            @csrf
            @method('PUT')

            <button type="submit"
                    class="btn delete">
                Reject
            </button>

        </form>

    @endif

    @if($booking->status == 'confirmed')

    <form action="{{ route('booking.checkout', $booking->id) }}"
        method="POST">

        @csrf
        @method('PUT')

        <button
            type="submit"
            class="btn"
            style="background:#f59e0b;color:white;">

            Checkout

        </button>

    </form>

    @endif

</div>

</td>

</tr>

@empty

<tr>
    <td colspan="6" style="text-align:center;">
        Belum ada data booking
    </td>
</tr>

@endforelse

<div id="bookingModal" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <h2>Tambah Booking</h2>

            <span
                class="close"
                onclick="closeBookingModal()">

                &times;

            </span>
        </div>

        <form
            action="{{ route('booking.admin.store') }}"
            method="POST">

            @csrf

            <div class="form-group">

                <label>Pilih Tamu</label>

                <select name="user_id" required>

                    <option value="">
                        -- Pilih Tamu --
                    </option>

                    @foreach($users as $user)
                        <option value="{{ $user->id }}">
                            {{ $user->name }} ({{ $user->email }})
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label>Tipe Kamar</label>

                <select
                    name="room_name"
                    required>

                    @foreach($tipeKamars as $tipe)

                        <option
                            value="{{ $tipe->nama_tipe }}">

                            {{ $tipe->nama_tipe }}

                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label>Check In</label>

                <input
                    type="date"
                    name="check_in"
                    required>

            </div>

            <div class="form-group">

                <label>Check Out</label>

                <input
                    type="date"
                    name="check_out"
                    required>

            </div>

            <div class="form-group">

                <label>Metode Pembayaran</label>
                <select name="payment_method" required>

                    <option value="Tunai">Tunai</option>
                    <option value="QRIS">QRIS</option>
                    <option value="Debit">Debit</option>
                    <option value="Transfer Bank">Transfer Bank</option>
                </select>
            </div>

            <button
                class="btn btn-green">

                Simpan Booking

            </button>
        </form>
    </div>
</div>

<script>

function openBookingModal(){

    document
        .getElementById('bookingModal')
        .style.display='flex';

}

function closeBookingModal(){

    document
        .getElementById('bookingModal')
        .style.display='none';

}

window.onclick=function(e){

    const modal=
    document.getElementById('bookingModal');

    if(e.target===modal){

        modal.style.display='none';

    }

}

</script>
@endsection