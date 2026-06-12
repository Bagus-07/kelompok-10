<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Hotel</title>
    @vite(['resources/css/app.css'])
</head>
<body class="bg-gray-100">

<div class="max-w-7xl mx-auto py-10 px-4">

    <div class="grid md:grid-cols-3 gap-6">

        <!-- Booking Summary -->
        <div class="bg-white rounded-xl shadow p-6">

            <h2 class="text-xl font-bold mb-6">
                Ringkasan Pemesanan
            </h2>

            <div class="space-y-3 text-gray-700">

    <p><strong>Nama Tamu :</strong> {{ $user->name }}</p>

    <p><strong>Email :</strong> {{ $user->email }}</p>

    <p><strong>No Telepon :</strong>
        {{ $user->phone ?? '-' }}
    </p>

    <hr>

    @if($booking)

        <p>
            <strong>Tipe Kamar :</strong>
            {{ $booking->room_name }}
        </p>

        <p>
            <strong>Check In :</strong>
            {{ \Carbon\Carbon::parse($booking->check_in)->format('d M Y') }}
        </p>

        <p>
            <strong>Check Out :</strong>
            {{ \Carbon\Carbon::parse($booking->check_out)->format('d M Y') }}
        </p>

    @else

        <p class="text-red-500">
            Belum ada data booking.
        </p>

    @endif

</div>

            <div class="mt-8 border-t pt-4">
    <div class="flex justify-between">
        <span>Total Pembayaran</span>

        <span class="font-bold text-yellow-600 text-lg">

            @if($booking)
                Rp{{ number_format($booking->total_price,0,',','.') }}
            @else
                Rp0
            @endif

        </span>
    </div>
</div>

        </div>

        <!-- Payment -->
        <div class="md:col-span-2 bg-white rounded-xl shadow p-6">

            <h2 class="text-xl font-bold mb-6">
                Metode Pembayaran
            </h2>
            
            @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-4 rounded mb-4">
        {{ $errors->first() }}
    </div>
    @endif

            <form action="{{ route('payment.process') }}"
      method="POST"
      enctype="multipart/form-data">
                @csrf

                <!-- Payment Method -->

                <div class="grid md:grid-cols-2 gap-4">

                    <label
                        class="border rounded-xl p-6 cursor-pointer hover:border-blue-500">

                        <input type="radio"
                               name="payment_method"
                               value="QRIS"
                               class="mr-2">

                        QRIS
                    </label>

                    <label
                        class="border rounded-xl p-6 cursor-pointer hover:border-blue-500">

                        <input type="radio"
                               name="payment_method"
                               value="Transfer Bank"
                               class="mr-2">

                        Transfer Bank
                    </label>

                </div>

                <!-- Bank -->

                <div class="mt-8">

                    <h3 class="font-semibold mb-4">
                        Pilih Bank
                    </h3>

                    <div class="grid md:grid-cols-3 gap-4">

                        <label class="border p-4 rounded-lg">
                            <input type="radio" name="bank" value="BCA">
                            BCA
                        </label>

                        <label class="border p-4 rounded-lg">
                            <input type="radio" name="bank" value="BRI">
                            BRI
                        </label>

                        <label class="border p-4 rounded-lg">
                            <input type="radio" name="bank" value="BNI">
                            BNI
                        </label>

                        <label class="border p-4 rounded-lg">
                            <input type="radio" name="bank" value="Mandiri">
                            Mandiri
                        </label>

                        <label class="border p-4 rounded-lg">
                            <input type="radio" name="bank" value="BSI">
                            BSI
                        </label>

                    </div>

                </div>

                <button
                    type="submit"
                    class="mt-8 bg-blue-900 hover:bg-blue-800 text-white px-8 py-3 rounded-lg">

                    Lanjutkan Pembayaran

                </button>

            </form>

        </div>

    </div>

</div>

</body>
</html>