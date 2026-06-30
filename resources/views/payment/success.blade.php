<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ __('messages.payment_success') }}</title>

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

.dark-mode .text-gray-600{
    color:#cbd5e1 !important;
}

.dark-mode h1{
    color:#4ade80;
}

button,
a{
    transition:.3s;
}

</style>

</head>

<body class="bg-gray-100">

<div class="min-h-screen flex items-center justify-center px-4">

    <div class="bg-white p-10 rounded-3xl shadow-xl text-center max-w-lg">

        <div class="text-7xl mb-5">
            ✅
        </div>

        <h1 class="text-3xl font-bold mb-4">

            {{ __('messages.payment_success') }}

        </h1>

        <p class="text-gray-600 mb-8 leading-relaxed">

            {{ __('messages.payment_waiting') }}

        </p>

        <div class="flex flex-col md:flex-row gap-4 justify-center">

            <a href="/profile"
               class="bg-blue-900 hover:bg-blue-800 text-white px-6 py-3 rounded-xl">

                {{ __('messages.view_booking') }}

            </a>

            <a href="/home"
               class="bg-gray-300 hover:bg-gray-400 text-gray-800 px-6 py-3 rounded-xl">

                {{ __('messages.back_home') }}

            </a>

        </div>

    </div>

</div>

<script>

window.addEventListener('load', function(){

    if(localStorage.getItem('theme') === 'dark'){

        document.body.classList.add('dark-mode');

    }

});

</script>

</body>
</html>