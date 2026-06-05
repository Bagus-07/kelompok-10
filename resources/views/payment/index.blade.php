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
                <p><b>Nama Tamu :</b> Angel</p>
                <p><b>Email :</b> angel@gmail.com</p>
                <p><b>No Telepon :</b> 08123456789</p>

                <hr>

                <p><b>Tipe Kamar :</b> Deluxe Room</p>
                <p><b>Check In :</b> 10 Juni 2026</p>
                <p><b>Check Out :</b> 12 Juni 2026</p>
            </div>

            <div class="mt-8 border-t pt-4">
                <div class="flex justify-between">
                    <span>Total</span>
                    <span class="font-bold text-yellow-600">
                        Rp750.000
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
                  method="POST">

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