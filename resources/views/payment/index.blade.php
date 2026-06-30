<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ __('messages.payment') }}</title>

    @vite(['resources/css/app.css'])

    <style>

    body{
        transition:.3s;
    }

    /* =========================
       DARK MODE
    ========================= */

    .dark-mode{
        background:#0f172a;
    }

    .dark-mode .bg-gray-100{
        background:#0f172a !important;
    }

    .dark-mode .bg-white{
        background:#1e293b !important;
        color:white;
    }

    .dark-mode h1,
    .dark-mode h2,
    .dark-mode h3,
    .dark-mode strong{
        color:white;
    }

    .dark-mode .text-gray-700,
    .dark-mode .text-gray-600,
    .dark-mode .text-gray-500{
        color:#cbd5e1 !important;
    }

    .dark-mode input{
        background:#334155;
        color:white;
        border:1px solid #475569;
    }

    .dark-mode label{
        color:white;
    }

    .dark-mode label.border{
        background:#334155;
        border-color:#475569;
        transition:.25s;
    }

    .dark-mode label.border:hover{
        border-color:#3b82f6;
    }

    .dark-mode hr{
        border-color:#475569;
    }

    .dark-mode .bg-red-100{
        background:#7f1d1d !important;
        color:white !important;
    }

    button{
        transition:.25s;
    }

    </style>

</head>

<body class="bg-gray-100">

<div class="max-w-7xl mx-auto py-10 px-4">

    <div class="grid md:grid-cols-3 gap-6">

        <!-- BOOKING SUMMARY -->
        <div class="bg-white rounded-2xl shadow-lg p-6">

            <h2 class="text-2xl font-bold mb-6">
                {{ __('messages.booking_summary') }}
            </h2>

            <div class="space-y-3 text-gray-700">

                <p>
                    <strong>{{ __('messages.guest_name') }} :</strong>
                    {{ $user->name }}
                </p>

                <p>
                    <strong>{{ __('messages.email') }} :</strong>
                    {{ $user->email }}
                </p>

                <p>
                    <strong>{{ __('messages.phone_number') }} :</strong>
                    {{ $user->phone ?? '-' }}
                </p>

                <hr>

                @if($booking)

                    <p>
                        <strong>{{ __('messages.room_type') }} :</strong>
                        {{ $booking->room_name }}
                    </p>

                    <p>
                        <strong>{{ __('messages.check_in') }} :</strong>
                        {{ \Carbon\Carbon::parse($booking->check_in)->format('d M Y') }}
                    </p>

                    <p>
                        <strong>{{ __('messages.check_out') }} :</strong>
                        {{ \Carbon\Carbon::parse($booking->check_out)->format('d M Y') }}
                    </p>

                @else

                    <p class="text-red-500">
                        {{ __('messages.no_booking') }}
                    </p>

                @endif

            </div>

            <div class="mt-8 border-t pt-4">

                <div class="flex justify-between items-center">

                    <span class="font-medium">
                        {{ __('messages.total_payment') }}
                    </span>

                    <span class="font-bold text-yellow-500 text-2xl">

                        @if($booking)

                            Rp{{ number_format($booking->total_price,0,',','.') }}

                        @else

                            Rp0

                        @endif

                    </span>

                </div>

            </div>

        </div>

        <!-- PAYMENT METHOD -->
        <div class="md:col-span-2 bg-white rounded-2xl shadow-lg p-6">

            <h2 class="text-2xl font-bold mb-6">
                {{ __('messages.payment_method') }}
            </h2>

            @if ($errors->any())

                <div class="bg-red-100 text-red-700 p-4 rounded-lg mb-5">

                    {{ $errors->first() }}

                </div>

            @endif

            <form action="{{ route('payment.process') }}"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf
                                <!-- PAYMENT METHOD -->

                <div class="grid md:grid-cols-2 gap-4">

                    <label class="border rounded-xl p-6 cursor-pointer hover:border-blue-500">

                        <input
                            type="radio"
                            name="payment_method"
                            value="QRIS"
                            class="mr-2">

                        QRIS

                    </label>

                    <label class="border rounded-xl p-6 cursor-pointer hover:border-blue-500">

                        <input
                            type="radio"
                            name="payment_method"
                            value="Transfer Bank"
                            class="mr-2">

                        {{ __('messages.bank_transfer') }}

                    </label>

                </div>

                <!-- BANK -->

                <div class="mt-8">

                    <h3 class="font-semibold mb-4">
                        {{ __('messages.choose_bank') }}
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
                    class="mt-8 bg-blue-900 hover:bg-blue-800 text-white px-8 py-3 rounded-xl font-semibold">

                    {{ __('messages.continue_payment') }}

                </button>

            </form>

        </div>

    </div>

</div>

<script>

window.addEventListener('load', function () {

    if(localStorage.getItem('theme') === 'dark'){

        document.body.classList.add('dark-mode');

    }

});

</script>

</body>
</html>