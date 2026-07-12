<!DOCTYPE html>
<html lang="id">

<head>

    <style>
    body {
        margin: 0;
        height: 100vh;
        background-image: url('https://images.unsplash.com/photo-1507525428034-b723cf961d3e');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
    }

    </style>
    
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1">

    <title>Login Admin | StayEase Hotel</title>

    @vite(['resources/css/app.css','resources/js/app.js'])

    <link rel="preconnect"
          href="https://fonts.googleapis.com">

    <link rel="preconnect"
          href="https://fonts.gstatic.com"
          crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
          rel="stylesheet">

</head>

<body
class="bg-slate-100 min-h-screen flex items-center justify-center font-[Poppins]">

<div class="w-full max-w-md">

    <div
        class="bg-white rounded-3xl shadow-2xl p-10">

        <div class="text-center mb-8">

            <h1
            class="text-3xl font-bold text-slate-800">

                StayEase Hotel

            </h1>

            <p
            class="text-gray-500 mt-2">

                Sistem Manajemen Hotel

            </p>

        </div>

        <div class="mb-8">

            <h2
            class="text-xl font-semibold text-slate-800">

                Selamat Datang, Administrator

            </h2>

            <p
            class="text-gray-500 text-sm mt-1">

                Silakan masuk menggunakan akun administrator.

            </p>

        </div>

        @if($errors->any())

            <div
            class="mb-5 rounded-xl bg-red-100 text-red-700 p-3">

                {{ $errors->first() }}

            </div>

        @endif

        <form
            method="POST"
            action="/admin/login">

            @csrf

            <div class="mb-5">

                <label
                class="block mb-2 text-sm font-medium">

                    Email

                </label>

                <input
                    type="email"
                    name="email"
                    required

                    class="w-full rounded-xl border border-gray-300
                           px-4 py-3
                           focus:ring-2
                           focus:ring-blue-500
                           focus:outline-none">

            </div>

            <div class="mb-7">

                <label
                class="block mb-2 text-sm font-medium">

                    Password

                </label>

                <input
                    type="password"
                    name="password"
                    required

                    class="w-full rounded-xl border border-gray-300
                           px-4 py-3
                           focus:ring-2
                           focus:ring-blue-500
                           focus:outline-none">

            </div>

            <button
                type="submit"

                class="w-full bg-blue-600
                       hover:bg-blue-700
                       text-white
                       py-3
                       rounded-xl
                       font-semibold
                       transition">

                Masuk ke Dashboard

            </button>

        </form>

    </div>

    <p
    class="text-center text-gray-500 text-sm mt-6">

        © {{ date('Y') }} StayEase Hotel

    </p>

</div>

</body>

</html>