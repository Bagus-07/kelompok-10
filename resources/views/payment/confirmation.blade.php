<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ __('messages.payment_instruction') }}</title>

    @vite(['resources/css/app.css'])

<style>

body{
    transition:.3s;
}

/* ===========================
   DARK MODE
=========================== */

.dark-mode{
    background:#0f172a;
}

.dark-mode .bg-white{
    background:#1e293b !important;
    color:white;
}

.dark-mode .bg-gray-100{
    background:#0f172a !important;
}

.dark-mode .bg-green-50{
    background:#14532d !important;
    border-color:#166534 !important;
}

.dark-mode .bg-yellow-50{
    background:#78350f !important;
    border-color:#92400e !important;
}

.dark-mode .text-gray-700,
.dark-mode .text-gray-600,
.dark-mode .text-gray-500,
.dark-mode .text-gray-800{
    color:#cbd5e1 !important;
}

.dark-mode input,
.dark-mode textarea{

    background:#334155;
    color:white;
    border:1px solid #475569;

}

.dark-mode input::placeholder,
.dark-mode textarea::placeholder{

    color:#94a3b8;

}

.dark-mode .border{
    border-color:#475569 !important;
}

.dark-mode .bg-red-100{

    background:#7f1d1d !important;
    color:white !important;

}

button{

    transition:.3s;

}

</style>

</head>

<body class="bg-gray-100">

<div class="max-w-5xl mx-auto py-10 px-4">

    <div class="bg-white rounded-2xl shadow-lg p-8">

        <h1 class="text-3xl font-bold text-gray-800 mb-6">
            {{ __('messages.payment_instruction') }}
        </h1>

        <!-- INFORMASI PEMBAYARAN -->
        <div class="bg-green-50 border border-green-200 rounded-xl p-6 mb-6">

            @if($payment_method == 'QRIS')

                <h2 class="text-xl font-semibold text-green-700 mb-4">
                    {{ __('messages.qris_payment') }}
                </h2>

                <div class="text-center">
                    <img src="{{ asset('images/qris.jpg.jpeg') }}"
                         class="w-64 mx-auto">

                    <p class="mt-4 text-gray-600">
                        {{ __('messages.scan_qr') }}
                    </p>
                </div>

            @else

                <h2 class="text-xl font-semibold text-green-700 mb-4">
                    {{ __('messages.bank_transfer') }} {{ $bank }}
                </h2>

                <div class="grid md:grid-cols-2 gap-6">

                    <div>
                        <p class="text-gray-500">{{ __('messages.account_number') }}</p>
                        <p class="font-bold text-lg">
                            1234567890
                        </p>
                    </div>

                    <div>
                        <p class="text-gray-500">{{ __('messages.account_name') }}</p>
                        <p class="font-bold text-lg">
                            STAYEASE HOTEL
                        </p>
                    </div>

                </div>

            @endif

        </div>

        <!-- INFORMASI -->
        <div class="bg-yellow-50 border border-yellow-200 rounded-xl p-5 mb-6">

            <h3 class="font-semibold text-yellow-700 mb-2">
                {{ __('messages.important') }}
            </h3>

            <ul class="list-disc ml-5 text-gray-700">
                <li>{{ __('messages.transfer_note_1') }}</li>
                <li>{{ __('messages.transfer_note_2') }}</li>
                <li>{{ __('messages.transfer_note_3') }}</li>
            </ul>

        </div>

        <!-- ERROR -->
        @if ($errors->any())
            <div class="bg-red-100 text-red-700 p-4 rounded mb-4">
                {{ $errors->first() }}
            </div>
        @endif

        <!-- FORM UPLOAD -->
        <form action="{{ route('payment.uploadProof') }}"
              method="POST"
              enctype="multipart/form-data">

            @csrf

            <input type="hidden"
                   name="payment_method"
                   value="{{ $payment_method }}">

            <div class="border rounded-xl p-6">

                <h3 class="text-xl font-semibold mb-4">
                    {{ __('messages.upload_proof') }}
                </h3>

                <input
                    type="file"
                    name="payment_proof"
                    class="w-full border rounded-lg p-3"
                    required>

                <textarea
                    name="note"
                    class="w-full border rounded-lg p-3 mt-4"
                    rows="4"
                    placeholder="{{ __('messages.add_note') }}"
                ></textarea>

            </div>

            <div class="mt-8 flex justify-end">

                <button
                    type="submit"
                    class="bg-blue-900 hover:bg-blue-800 text-white px-8 py-3 rounded-lg shadow">

                    {{ __('messages.already_paid') }}

                </button>

            </div>

        </form>

    </div>

</div>
<script>
window.addEventListener('load', function () {
    if (localStorage.getItem('theme') === 'dark') {
        document.body.classList.add('dark-mode');
    }
});

window.addEventListener('load', function(){

    if(localStorage.getItem('theme') === 'dark'){

        document.body.classList.add('dark-mode');

    }

});


</script>
</body>
</html>