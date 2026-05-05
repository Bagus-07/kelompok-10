<!DOCTYPE html>
<html>
<head>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Admin Login - StayEase</title>
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">

<div class="bg-white p-8 rounded-xl shadow-md w-80">

    <h2 class="text-2xl font-bold text-center mb-6">Admin Login</h2>

    <form method="POST" action="/login">
        @csrf

        <!-- ERROR MESSAGE DI SINI -->
    @if ($errors->any())
        <p class="text-red-500 text-sm mb-3">
            {{ $errors->first() }}
        </p>
    @endif

        <input type="email" name="email" placeholder="Email"
            class="w-full p-2 border rounded mb-3 focus:outline-none focus:ring-2 focus:ring-blue-400">

        <input type="password" name="password" placeholder="Password"
            class="w-full p-2 border rounded mb-4 focus:outline-none focus:ring-2 focus:ring-blue-400">

        <button type="submit"
            class="w-full bg-blue-500 hover:bg-blue-600 text-white py-2 rounded">
            Login
        </button>
    </form>

</div>

</body>
</html>