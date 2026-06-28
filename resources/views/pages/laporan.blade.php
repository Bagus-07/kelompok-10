@extends('layouts.admin')

@section('title', 'Laporan')

@section('content')

<style>
.report-summary{
    display:grid;
    grid-template-columns:repeat(4,1fr);
    gap:20px;
    margin-bottom:25px;
}

.summary-card{
    background: white;
    padding: 20px;
    border-radius: 14px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.08);
}

.summary-card h4{
    color: #64748b;
    margin-bottom: 8px;
    font-size: 14px;
}

.summary-card h2{
    color: #1e293b;
    font-size: 30px;
    font-weight: 700;
}

.chart-card{
    background:white;
    padding:25px;
    border-radius:16px;
    margin-bottom:25px;
}

.filter-box{
    background:white;
    padding:20px;
    border-radius:14px;
    margin-bottom:20px;
}

.filter-box form{
    display:flex;
    gap:15px;
    flex-wrap:wrap;
    align-items:center;
}

.filter-box input,
.filter-box select{
    padding:10px;
    border:1px solid #ddd;
    border-radius:8px;
}

.btn-filter{
    background:#3b82f6;
    color:white;
    border:none;
    padding:10px 18px;
    border-radius:8px;
    cursor:pointer;
}

.btn-reset{
    background:#64748b;
    color:white;
    padding:10px 18px;
    border-radius:8px;
    text-decoration:none;
}

</style>


<!-- FILTER -->
<div class="box">

    <div class="box-header">
        <div>
            <h3>Laporan Hotel</h3>
            <p>Monitoring pendapatan dan booking hotel</p>
        </div>

    <div class="filter-box">

        <form method="GET">

            <input
                type="date"
                name="tanggal_awal"
                value="{{ request('tanggal_awal') }}"
            >

            <input
                type="date"
                name="tanggal_akhir"
                value="{{ request('tanggal_akhir') }}"
            >

            <select name="status">

                <option value="">
                    Semua Status
                </option>

                <option value="pending"
                    {{ request('status') == 'pending' ? 'selected' : '' }}>
                    Pending
                </option>

                <option value="waiting_verification"
                    {{ request('status') == 'waiting_verification' ? 'selected' : '' }}>
                    Waiting Verification
                </option>

                <option value="confirmed"
                    {{ request('status') == 'confirmed' ? 'selected' : '' }}>
                    Confirmed
                </option>

                <option value="rejected"
                    {{ request('status') == 'rejected' ? 'selected' : '' }}>
                    Rejected
                </option>

            </select>

            <button
                type="submit"
                class="btn-filter">
                Filter
            </button>

            <a
                href="{{ route('laporan') }}"
                class="btn-reset">
                Reset
            </a>

        </form>

    </div>
    </div>

</div>

<!-- CARD -->
<div class="report-summary">

    <div class="summary-card">
        <h4>Total Booking</h4>
        <h2>{{ $totalBooking }}</h2>
    </div>

    <div class="summary-card">
        <h4>Confirmed</h4>
        <h2>{{ $confirmed }}</h2>
    </div>

    <div class="summary-card">
        <h4>Pending</h4>
        <h2>{{ $pending }}</h2>
    </div>

    <div class="summary-card">
        <h4>Pendapatan</h4>
        <h2>
            Rp {{ number_format($totalPendapatan,0,',','.') }}
        </h2>
    </div>

</div>

<!-- GRAFIK -->
<div class="chart-card">

    <h3>Pendapatan Bulanan</h3>

    <canvas id="incomeChart"></canvas>

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
                    <th>Nama</th>
                    <th>Kamar</th>
                    <th>Check In</th>
                    <th>Check Out</th>
                    <th>Total</th>
                    <th>Status</th>
                </tr>
            </thead>

            <tbody>

                @foreach($bookings as $booking)

                <tr>
                    <td>{{ $booking->nama }}</td>
                    <td>{{ $booking->kamar->nomor_kamar ?? '-'}}</td>
                    <td>{{ $booking->check_in }}</td>
                    <td>{{ $booking->check_out }}</td>
                    <td>
                        Rp {{ number_format($booking->total_price,0,',','.') }}
                    </td>
                    <td>{{ $booking->status }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
</div>

<!-- CHART -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>

const chartData = @json($chartData);

const labels = chartData.map(item => {
    const bulan = [
        '',
        'Jan',
        'Feb',
        'Mar',
        'Apr',
        'Mei',
        'Jun',
        'Jul',
        'Agu',
        'Sep',
        'Okt',
        'Nov',
        'Des'
    ];

    return bulan[item.bulan];
});

const totals = chartData.map(
    item => item.total
);

new Chart(
    document.getElementById('incomeChart'),
    {
        type: 'bar',

        data: {
            labels: labels,

            datasets: [{
                label: 'Pendapatan',

                data: totals,

                borderWidth: 1
            }]
        },

        options: {
            responsive: true,

            plugins: {
                legend: {
                    display: false
                }
            },

            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    }
);

</script>

@endsection