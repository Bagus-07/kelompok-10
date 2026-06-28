@extends('layouts.admin')

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
       padding: 6px 14px;
        border-radius: 20px;
        font-size: 13px;
        font-weight: 600;
        display: inline-block;
    }

    .confirmed {
        background: #d1fae5;
        color: #065f46;
    }

    .pending {
        background: #fef3c7;
        color: #92400e;
    }
    
    .rejected {
        background: #fee2e2;
        color: #991b1b;
    }

    .waiting {
        background: #dbeafe;
        color: #1e40af;
    }

    .completed{
        background:#e0e7ff;
        color:#3730a3;
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
            onclick="openModal('modalBooking')">

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

    <td>{{ $booking->kamar->nomor_kamar ?? '-' }}
        -
        {{ $booking->room_name }}
    </td>

    <td>
        {{ \Carbon\Carbon::parse($booking->check_in)->format('d M Y') }}
        -
        {{ \Carbon\Carbon::parse($booking->check_out)->format('d M Y') }}
    </td>

    <td>

        @if($booking->status == 'confirmed')

    <span class="status confirmed">
        Confirmed
    </span>

@elseif($booking->status == 'waiting_verification')

    <span class="status waiting">
        Waiting Verification
    </span>

@elseif($booking->status == 'rejected')

    <span class="status rejected">
        Rejected
    </span>

@elseif($booking->status == 'completed')

    <span class="status completed">
        Completed
    </span>

@else

    <span class="status pending">
        Pending
    </span>

@endif

    </td>

    <td>

<div class="action-buttons">

    @if($booking->payment_proof)

        <a href="{{ asset('storage/'.$booking->payment_proof) }}"
           target="_blank"
           class="btn edit">
            Lihat Bukti
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

            <button type="submit"
                    class="btn"
                    style="
                        background:#6366f1;
                        color:white;
                    ">
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

</tbody>
        </table>
    </div>

</div>

@endsection