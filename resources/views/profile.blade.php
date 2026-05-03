<!DOCTYPE html>
<html>
<head>
    <title>Profile - StayEase Hotel</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100">

<!-- NAVBAR -->
<div class="navbar flex justify-between items-center p-4 bg-white shadow">

    <div class="logo">
        <img src="/photo/new logo.jpeg" class="h-12">
    </div>

    <div class="flex gap-6">
        <a href="/home">Home</a>
        <a href="/home#facilities">Facilities</a>
        <a href="/home#about">About</a>
        <a href="/home#contact">Contact</a>
    </div>

    <a href="/profile">
        <img 
            src="{{ auth()->user()->profile_photo 
                ? '/uploads/' . auth()->user()->profile_photo 
                : 'https://via.placeholder.com/40' }}"
            class="w-10 h-10 rounded-full object-cover border-2 border-yellow-400 hover:scale-105 transition"
        >
    </a>

</div>

<!-- CONTENT -->
<div class="pt-[100px] px-6">

    <div class="max-w-4xl mx-auto bg-white p-8 rounded-2xl shadow">

        @if(session('success'))
            <div class="mb-4 p-3 bg-green-100 text-green-700 rounded-lg">
                {{ session('success') }}
            </div>
        @endif

        <h1 class="text-3xl font-bold mb-6">Profile</h1>

        <div class="flex gap-10 items-start">

    <!-- PROFILE IMAGE -->
    <div class="w-40 text-center">
        <img 
            src="{{ auth()->user()->profile_photo 
                ? '/uploads/' . auth()->user()->profile_photo 
                : 'https://via.placeholder.com/150' }}"
            class="w-40 h-40 rounded-full object-cover mx-auto shadow"
        >
    </div>

    <!-- USER INFO -->
    <div class="flex-1 grid grid-cols-2 gap-6">

        <div>
            <p class="text-gray-500">Name</p>
            <p class="font-semibold">{{ auth()->user()->name }}</p>
        </div>

        <div>
            <p class="text-gray-500">Email</p>
            <p class="font-semibold">{{ auth()->user()->email }}</p>
        </div>

        <div>
            <p class="text-gray-500">Phone</p>
            <p class="font-semibold">{{ auth()->user()->phone ?? '-' }}</p>
        </div>

        <div>
            <p class="text-gray-500">Address</p>
            <p class="font-semibold">{{ auth()->user()->address ?? '-' }}</p>
        </div>

    </div>

</div>

        <!-- BUTTON -->
        <div class="mt-6">
            <button onclick="openModal()" 
                class="px-5 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600">
                Edit Profile
            </button>
        </div>

        <!-- BOOKING HISTORY -->
<div class="mt-10">

    <h2 class="text-xl font-bold mb-4">Booking History</h2>

    @forelse($bookings as $booking)
        <div class="bg-gray-100 p-4 rounded-lg mb-3">
            <p class="font-semibold">{{ $booking->room_name }}</p>

            <p class="text-sm text-gray-500">
                Check-in: {{ $booking->check_in }}
            </p>

            <p class="text-sm text-gray-500">
                Check-out: {{ $booking->check_out }}
            </p>

            <p class="text-sm mt-2 
                {{ $booking->status == 'Completed' ? 'text-green-600' : 'text-yellow-600' }}">
                {{ $booking->status }}
            </p>
        </div>

    @empty
        <p class="text-gray-500">No bookings yet.</p>
    @endforelse

</div>

    </div>

</div>

<!-- MODAL -->
<div id="editModal" 
     class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">

    <div class="bg-white w-full max-w-md p-6 rounded-2xl shadow-lg">

        <h2 class="text-xl font-bold mb-4">Edit Profile</h2>

        <form method="POST" action="/profile/update" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label>Profile Photo</label>
                <input type="file" name="photo" class="w-full border rounded-lg px-3 py-2">
            </div>

            <div class="mb-6 text-center">
                <img 
                    src="{{ auth()->user()->profile_photo 
                        ? '/uploads/' . auth()->user()->profile_photo 
                        : 'https://via.placeholder.com/120' }}"
                    class="w-28 h-28 rounded-full object-cover mx-auto shadow"
                >
            </div>

            <div class="mb-3">
                <label>Nama</label>
                <input type="text" name="name"
                    value="{{ auth()->user()->name }}"
                    class="w-full border rounded-lg px-3 py-2">
            </div>

            <div class="mb-3">
                <label>Email</label>
                <input type="email" name="email"
                    value="{{ auth()->user()->email }}"
                    class="w-full border rounded-lg px-3 py-2">
            </div>

            <div class="mb-3">
                <label>No.hp</label>
                <input type="text" name="phone"
                    value="{{ auth()->user()->phone }}"
                    class="w-full border rounded-lg px-3 py-2">
            </div>

            <div class="mb-3">
                <label>Alamat</label>
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