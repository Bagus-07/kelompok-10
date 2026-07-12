<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">

    <style>
        body {
            font-family: DejaVu Sans;
            font-size: 12px;
            color: #000;
        }

        .header {
            text-align: center;
            margin-bottom: 15px;
        }

        .header h2 {
            margin: 0;
            font-size: 22px;
        }

        .header p {
            margin: 3px 0;
            font-size: 12px;
        }

        hr {
            margin: 10px 0;
        }

        .info {
            width: 100%;
            margin-bottom: 15px;
            border: none;
        }

        .info td {
            border: none;
            padding: 2px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid #000;
            padding: 8px;
        }

        th {
            background-color: #e5e7eb;
            text-align: center;
        }

        td {
            vertical-align: middle;
        }

        .text-center {
            text-align: center;
        }

        .text-right {
            text-align: right;
        }

        .footer {
            margin-top: 20px;
        }

        .signature {
            width: 220px;
            float: right;
            text-align: center;
            margin-top: 40px;
        }
    </style>
</head>

<body>

    <!-- Header -->
    <div class="header">

    <table style="width:100%; border:none; margin-bottom:10px;">
        <tr>

            <<td style="border:none; width:20%; text-align:left; vertical-align:middle;">

                <img src="{{ public_path('photo/new logo.jpeg') }}" width="120">
            </td>

            <td style="border:none; text-align:center;">

                <h2 style="margin:0;">
                    HOTEL RESERVATION SYSTEM
                </h2>

                <p style="margin:5px 0;">
                    StayEase Hotel
                </p>

                <p style="margin:0;">
                    Jl. Ahmad Yani No.20, Batam
                </p>

            </td>

            <!-- Kolom kosong -->
        <td style="border:none; width:20%;"></td>

        </tr>
    </table>

    <hr>

    <h3 style="text-align:center;">
    LAPORAN BOOKING HOTEL
</h3>

</div>

    <!-- Informasi Laporan -->
    <table class="info">
        <tr>
            <td>
                <strong>Periode</strong> : Semua Data
            </td>

            <td class="text-right">
                <strong>Tanggal Cetak</strong> :
                {{ $tanggalCetak->format('d M Y') }}
            </td>
        </tr>
    </table>

    <!-- Tabel Booking -->
    <table>

        <thead>

            <tr>
                <th width="6%">No</th>
                <th width="22%">Nama</th>
                <th width="18%">Kamar</th>
                <th width="15%">Check In</th>
                <th width="15%">Status</th>
                <th width="24%">Total Harga</th>
            </tr>

        </thead>

        <tbody>

            @forelse($bookings as $booking)

                <tr>

                    <td class="text-center">
                        {{ $loop->iteration }}
                    </td>

                    <td>
                        {{ $booking->nama }}
                    </td>

                    <td>
                        {{ $booking->room_name ?? $booking->kamar }}
                    </td>

                    <td class="text-center">
                        {{ \Carbon\Carbon::parse($booking->check_in)->format('d M Y') }}
                    </td>

                    <td class="text-center">
                        {{ $booking->statusLabel() }}
                    </td>

                    <td class="text-right">
                        Rp {{ number_format($booking->total_price, 0, ',', '.') }}
                    </td>

                </tr>

            @empty

                <tr>
                    <td colspan="6" class="text-center">
                        Tidak ada data booking.
                    </td>
                </tr>

            @endforelse

        </tbody>

    </table>

    <!-- Total Booking -->
    <div class="footer">
        <strong>Total Booking :</strong>
        {{ $bookings->count() }} Data
    </div>

    <!-- Tanda Tangan -->
    <div class="signature">

        <p>
            Batam,
            {{ $tanggalCetak->format('d M Y') }}
        </p>

        <br><br><br>

        ______________________

        <br>

        <strong>Administrator</strong>

    </div>

</body>

</html>