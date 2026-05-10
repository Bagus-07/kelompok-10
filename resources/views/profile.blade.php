<!DOCTYPE html>
<html>
<head>
    <title>Profile - StayEase Hotel</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        /* NAVBAR */
.navbar {
    position: fixed;
    top: 0;
    width: 100%;
    height: 70px;

    display: grid;
    grid-template-columns: 1fr 1fr 1fr;
    align-items: center;

    padding: 0 40px;
    box-sizing: border-box;

    background: rgba(255,255,255,0.7);
    backdrop-filter: blur(12px);
    z-index: 9999;
}

.navbar a {
    color: #333;
    text-decoration: none;
}

/* LOGO */
.logo {
    justify-self: start;
}

.logo img {
    height: 60px;
}

/* MENU */
.nav-menu {
    display: flex;
    justify-content: center;
    gap: 40px;
}

.nav-menu a {
    font-size: 18px;
    font-weight: 600;
}

/* RIGHT */
.nav-auth {
    justify-self: end;
    display: flex;
    align-items: center;
    gap: 12px;
}

/* BUTTON */
.signup-btn {
    padding: 8px 18px;
    border-radius: 20px;
    border: none;
    background: linear-gradient(45deg, #F4A261, #E9C46A);
    color: white;
    font-size: 14px;
    font-weight: 600;
    cursor: pointer;
}

.signup-btn:hover {
    transform: scale(1.05);
}

/* FOOTER */
.footer {
    background: #e5e7eb;
    padding: 15px;
    text-align: center;
    border-top: 2px solid #ccc;
}
    </style>
</head>

<body style="
    padding-top:70px;
    overflow-y:auto;
    font-family:Arial;
    margin:0;
    background:#f3f4f6;
">

<!-- NAVBAR -->
<div class="navbar">

    <!-- LOGO -->
    <div class="logo">
        <img src="/photo/new logo.jpeg">
    </div>

    <!-- MENU -->
    <div class="nav-menu">
        <a href="/home">Home</a>
        <a href="/home#facilities">Facilities</a>
        <a href="/home#about">About</a>
        <a href="/home#contact">Contact</a>
    </div>

    <!-- RIGHT SIDE -->
    <div class="nav-auth">

        <!-- PROFILE -->
        <a href="/profile">
            <img 
                src="{{ auth()->user()->profile_photo 
                    ? asset('uploads/' . auth()->user()->profile_photo) 
                    : 'https://via.placeholder.com/50' }}"
                
                style="
                    width:50px;
                    height:50px;
                    border-radius:50%;
                    object-fit:cover;
                    display:block;
                    cursor:pointer;
                "
            >
        </a>

        <!-- LOGOUT -->
        <form action="/logout" method="POST">
            @csrf
            <button class="signup-btn">
                Logout
            </button>
        </form>

    </div>

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

<!-- CONTACT -->
<div id="contact" style="
    background:#1f2937;
    color:white;
    padding:40px;
    margin-top:60px;
">

    <h2 style="font-size:28px; font-weight:bold; margin-bottom:15px;">
        Contact Us
    </h2>

    <p class="mt-2">Email: stayease@gmail.com</p>
    <p class="mt-2">Phone Number: 08123456789</p>
    <p class="mt-2">Address: Batam, Indonesia</p>

</div>

<div class="footer">
    © 2026 StayEase Hotel. All Rights Reserved.
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