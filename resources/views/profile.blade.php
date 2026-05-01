<!DOCTYPE html>
<html>
<head>
<<<<<<< Updated upstream
    <title>Profile - StayEase Hotel</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">

<div class="navbar">

    <div class="logo">
        <img src="/photo/new logo.jpeg">
    </div>

   <div class="nav-menu">
    <a href="/home">Home</a>
    <a href="/home#facilities">Fasilitas</a>
    <a href="/home#about">Tentang</a>
    <a href="/home#contact">kontak</a>
    </div>

    <div class="flex gap-3">
        <a href="/profile" 
       class="bg-yellow-400 text-white px-4 py-1 rounded-full text-sm text-center">
       Profile
        </a>
    </div>

    </div>
</div>


<!-- CONTENT -->
<div class="pt-[100px] px-6">

    <div class="max-w-4xl mx-auto bg-white p-8 rounded-2xl shadow">

        <!-- TITLE -->
        <h1 class="text-3xl font-bold mb-6">Profile</h1>

        <!-- USER INFO -->
        <div class="grid grid-cols-2 gap-6">

            <div>
                <p class="text-gray-500">Nama</p>
                <p class="font-semibold">John Doe</p>
            </div>

            <div>
                <p class="text-gray-500">Email</p>
                <p class="font-semibold">johndoe@email.com</p>
            </div>

            <div>
                <p class="text-gray-500">No.hp</p>
                <p class="font-semibold">08123456789</p>
            </div>

            <div>
                <p class="text-gray-500">Alamat</p>
                <p class="font-semibold">Batam, Indonesia</p>
            </div>

        </div>

        <!-- BUTTON -->
        <div class="mt-6">
            <button onclick="openModal()" class="px-5 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600"> Edit Profile 
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

<!-- EDIT PROFILE MODAL -->
<div id="editModal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">

    <div class="bg-white w-full max-w-md p-6 rounded-2xl shadow-lg">

        <h2 class="text-xl font-bold mb-4">Edit Profile</h2>

        <form method="POST" action="/profile/update">
    @csrf

    <div class="mb-3">
        <label class="text-sm text-gray-500">Nama</label>
        <input type="text" name="name"
            value="{{ auth()->user()->name }}"
            class="w-full border rounded-lg px-3 py-2">
    </div>

    <div class="mb-3">
        <label class="text-sm text-gray-500">Email</label>
        <input type="email" name="email"
            value="{{ auth()->user()->email }}"
            class="w-full border rounded-lg px-3 py-2">
    </div>

    <div class="mb-3">
        <label class="text-sm text-gray-500">No.hp</label>
        <input type="text" name="phone"
            value="{{ auth()->user()->phone }}"
            class="w-full border rounded-lg px-3 py-2">
    </div>

    <div class="mb-3">
        <label class="text-sm text-gray-500">Alamat</label>
        <input type="text" name="address"
            value="{{ auth()->user()->address }}"
            class="w-full border rounded-lg px-3 py-2">
    </div>

    <div class="flex justify-end gap-2 mt-4">
        <button type="button" onclick="closeModal()" 
            class="px-4 py-2 bg-gray-300 rounded-lg">
            Cancel
        </button>

        <button type="submit" 
            class="px-4 py-2 bg-blue-500 text-white rounded-lg">
            Save
        </button>
    </div>
    </form>

    </div>
</div>

<script>
    function openModal() {
        document.getElementById('editModal').classList.remove('hidden');
        document.getElementById('editModal').classList.add('flex');
    }

    function closeModal() {
        document.getElementById('editModal').classList.add('hidden');
        document.getElementById('editModal').classList.remove('flex');
    }
</script>

</body>
</html>