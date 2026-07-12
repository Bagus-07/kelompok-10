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

        hr {
            margin: 10px 0;
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

        .info td {
            border: none;
            padding: 3px;
        }

        .label {
            width: 35%;
            font-weight: bold;
            background: #f3f4f6;
        }

        .section-title {
            background: #e5e7eb;
            font-weight: bold;
            text-align: center;
        }

        .footer {
            margin-top: 25px;
        }

        .signature {
            width: 220px;
            float: right;
            text-align: center;
            margin-top: 40px;
        }

        .status-box {
            margin-top: 20px;
            border: 2px solid #000;
            text-align: center;
            padding: 12px;
        }

        .status-box h3 {
            margin: 0;
            font-size: 18px;
        }

        .status-box p {
            margin-top: 10px;
            font-size: 16px;
            font-weight: bold;
        }

    </style>

</head>

<body>

    <div class="header">
        <table style="width:100%;border:none;">
            <tr>
                <td style="border:none;width:20%;text-align:left;">
                    <img src="{{ public_path('photo/new logo.jpeg') }}" width="120">
                </td>

                <td style="border:none;text-align:center;">
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
                <td style="border:none;width:20%;"></td>
            </tr>
        </table>

        <hr>

        <h3>
            BUKTI RESERVASI
        </h3>
    </div>

    <table class="info">
        <tr>
            <td>
                <strong>Nomor Kuitansi :</strong>

                {{ $receiptNumber }}
            </td>

            <td style="text-align:right;">
                <strong>Tanggal Booking :</strong>

                {{ $booking->created_at->format('d M Y H:i') }}
            </td>
        </tr>
    </table>

    <br>

    <table>
        <tr>
            <td colspan="2" class="section-title">
                Informasi Tamu
            </td>
        </tr>

        <tr>
            <td class="label">
                Nama Tamu
            </td>

            <td>
                {{ $booking->nama }}
            </td>
        </tr>

        <tr>
            <td class="label">
                Email
            </td>

            <td>
                {{ $booking->user->email ?? '-' }}
            </td>
        </tr>

        <tr>
            <td class="label">
                Sumber Booking
            </td>

            <td>

                {{ $booking->booking_source == 'walk_in'
? 'Walk In'
: 'Online Booking' }}

            </td>
        </tr>
    </table>

    <br>

    <table>
        <tr>
            <td colspan="2" class="section-title">
                Informasi Kamar Hotel
            </td>
        </tr>

        <tr>
            <td class="label">
                Tipe Kamar
            </td>

            <td>
                {{ $booking->room_name }}
            </td>
        </tr>

        <tr>
            <td class="label">
                Nomor Kamar
            </td>

            <td>
                {{ $booking->kamar }}
            </td>
        </tr>

        <tr>
            <td class="label">
                Check-In
            </td>

            <td>
                {{ $booking->check_in->format('d M Y H:i') }}
            </td>
        </tr>

        <tr>
            <td class="label">
                Check-Out
            </td>

            <td>
                {{ $booking->check_out->format('d M Y H:i') }}
            </td>
        </tr>

        <tr>
            <td class="label">
                Durasi
            </td>

            <td>
                {{ $booking->check_in->diffInDays($booking->check_out) }}

                Malam
            </td>
        </tr>
    </table>

    <br>

    <table>
        <tr>
            <td colspan="2" class="section-title">
                Pembayaran
            </td>
        </tr>

        <tr>
            <td class="label">
                Metode Pembayaran
            </td>

            <td>
                {{ $booking->payment_method }}
            </td>
        </tr>

        <tr>
            <td class="label">
                Total Pembayaran
            </td>
            <td>
                Rp {{ number_format($booking->total_price,0,',','.') }}
            </td>
        </tr>
    </table>

    <br>

    <table>
        <tr>
            <td colspan="2" class="section-title">
                Administrasi
            </td>
        </tr>

        <tr>
            <td class="label">
                Dibuat Oleh Akun
            </td>

            <td>
                {{ optional($booking->creator)->name ?? 'Administrator' }}
            </td>
        </tr>
    </table>
    <div class="status-box">
        <h3>
            STATUS
        </h3>
        <p>
            {{ strtoupper($booking->statusLabel()) }}
        </p>
    </div>

    <div class="signature">
        <p>

            Batam,

            {{ now()->format('d M Y') }}

        </p>

        <br><br><br>

        ______________________

        <br>
        <strong>Administrator</strong>
    </div>
</body>
</html>
