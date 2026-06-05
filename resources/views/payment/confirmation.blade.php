<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konfirmasi Pembayaran</title>
    @vite(['resources/css/app.css'])
</head>

<body class="bg-gray-100">

<div class="max-w-5xl mx-auto py-10 px-4">

    <div class="bg-white rounded-2xl shadow-lg p-8">

        <h1 class="text-3xl font-bold text-gray-800 mb-6">
            Instruksi Pembayaran
        </h1>

        <div class="bg-green-50 border border-green-200 rounded-xl p-6 mb-6">

            @if($payment_method == 'QRIS')

    <h2 class="text-xl font-semibold text-green-700 mb-4">
        Pembayaran QRIS
    </h2>

    <div class="text-center">
        <img src="{{ asset('images/qris.jpg.jpeg') }}"
             class="w-64 mx-auto">
        <p class="mt-4 text-gray-600">
            Scan QR Code menggunakan aplikasi pembayaran Anda.
        </p>
    </div>

@else

    <h2 class="text-xl font-semibold text-green-700 mb-4">
        Transfer Bank {{ $bank }}
    </h2>

    <div class="grid md:grid-cols-2 gap-6">
        <div>
            <p class="text-gray-500">Nomor Rekening</p>
            <p class="font-bold text-lg">
                1234567890
            </p>
        </div>

        <div>
            <p class="text-gray-500">Atas Nama</p>
            <p class="font-bold text-lg">
                STAYEASE HOTEL
            </p>
        </div>
    </div>

@endif
        <div class="bg-yellow-50 border border-yellow-200 rounded-xl p-5 mb-6">

            <h3 class="font-semibold text-yellow-700 mb-2">
                Penting
            </h3>

            <ul class="list-disc ml-5 text-gray-700">
                <li>Transfer sesuai nominal pembayaran.</li>
                <li>Simpan bukti transfer Anda.</li>
                <li>Pembayaran akan diverifikasi maksimal 1x24 jam.</li>
            </ul>

        </div>

        <div class="border rounded-xl p-6">

            <h3 class="text-xl font-semibold mb-4">
                Upload Bukti Transfer
            </h3>

            <input
                type="file"
                class="w-full border rounded-lg p-3"
            >

            <textarea
                class="w-full border rounded-lg p-3 mt-4"
                rows="4"
                placeholder="Tambahkan catatan jika diperlukan..."
            ></textarea>

        </div>

        <div class="mt-8 flex justify-end">
            
        <form action="{{ route('payment.success') }}" method="GET">

            <button
                type="submit"
                class="bg-blue-900 hover:bg-blue-800 text-white px-8 py-3 rounded-lg shadow">

                Saya Sudah Transfer

            </button>
        </form>
    </div>

    </div>

</div>

</body>
</html>