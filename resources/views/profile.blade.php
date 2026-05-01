<!DOCTYPE html>
<html>
<head>
<<<<<<< Updated upstream
    <title>Profile - StayEase Hotel</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
=======
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Profile - StayEase</title>
    <style>
        body {
            font-family: Arial;
            margin: 0;
            background: #f4f4f4;
        }

        /* NAVBAR */
        .navbar {
            display: flex;
            justify-content: space-between;
            background: #333;
            color: white;
            padding: 15px;
        }

        .navbar a {
            color: white;
            margin-left: 15px;
            text-decoration: none;
        }

        /* CONTAINER */
        .container {
            padding: 40px;
        }

        .card {
            background: white;
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 10px;
        }

        .btn {
            padding: 8px 15px;
            background: #333;
            color: white;
            border: none;
            cursor: pointer;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table, th, td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: left;
        }
    </style>
>>>>>>> Stashed changes
</head>
<body class="bg-gray-100">

<!-- NAVBAR (same as home for consistency) -->
<div class="fixed top-0 w-full h-[70px] bg-white/70 backdrop-blur flex items-center justify-between px-10 z-50">

    <div>
        <img src="/photo/new logo.jpeg" class="h-[50px]">
    </div>

    <div class="flex gap-10">
        <a href="/home">Home</a>
        <a href="/home#about">About</a>
        <a href="/home#contact">Contact</a>
    </div>

    <div class="flex gap-3">
        <a href="/profile" class="px-4 py-2 bg-pink-500 text-white rounded-full">Profile</a>
    </div>

</div>

<!-- CONTENT -->
<div class="pt-[100px] px-6">

    <div class="max-w-4xl mx-auto bg-white p-8 rounded-2xl shadow">

        <!-- TITLE -->
        <h1 class="text-3xl font-bold mb-6">My Profile</h1>

        <!-- USER INFO -->
        <div class="grid grid-cols-2 gap-6">

            <div>
                <p class="text-gray-500">Name</p>
                <p class="font-semibold">John Doe</p>
            </div>

            <div>
                <p class="text-gray-500">Email</p>
                <p class="font-semibold">johndoe@email.com</p>
            </div>

            <div>
                <p class="text-gray-500">Phone</p>
                <p class="font-semibold">08123456789</p>
            </div>

            <div>
                <p class="text-gray-500">Address</p>
                <p class="font-semibold">Batam, Indonesia</p>
            </div>

        </div>

        <!-- BUTTON -->
        <div class="mt-6">
            <button class="px-5 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600">
                Edit Profile
            </button>
        </div>

        <!-- BOOKING HISTORY -->
        <div class="mt-10">

            <h2 class="text-xl font-bold mb-4">Booking History</h2>

            <div class="bg-gray-100 p-4 rounded-lg">
                <p class="font-semibold">Deluxe Room</p>
                <p class="text-sm text-gray-500">Check-in: 10 Aug 2026</p>
                <p class="text-sm text-gray-500">Check-out: 12 Aug 2026</p>
                <p class="text-sm text-green-600 font-semibold mt-2">Completed</p>
            </div>

        </div>

    </div>

</div>

</body>
</html>