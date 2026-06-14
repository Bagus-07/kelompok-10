
@extends('layouts.guest')

@section('title', 'Profile')

@section('content')

<style>

.profile-wrapper{
    padding: 80px 40px;
    background:#f3f4f6;
    min-height:100vh;
}

.profile-card{
    max-width:1000px;
    margin:auto;
    background:white;
    border-radius:28px;
    padding:40px;
    box-shadow:0 4px 20px rgba(0,0,0,0.08);

    margin-bottom:80px; /* IMPORTANT */
}

.profile-title{
    font-size:36px;
    font-weight:bold;
    margin-bottom:40px;
    text-align:center;
}

.profile-top{
    display:flex;
    gap:40px;
    align-items:flex-start;
}

/* LEFT SIDE */
.profile-left{
    width:220px;
}

.profile-image{
    width:140px;
    height:140px;
    border-radius:50%;
    object-fit:cover;
    box-shadow:0 4px 15px rgba(0,0,0,0.1);
}

.edit-btn{
    margin-top:25px;
    padding:14px 24px;
    border:none;
    border-radius:12px;
    background:#3b82f6;
    color:white;
    font-size:18px;
    cursor:pointer;
}

/* RIGHT SIDE */
.profile-right{
    flex:1;
}

.info-grid-top{
    display:grid;
    grid-template-columns:1fr 1fr;
    gap:30px;
    margin-bottom:40px;
}

.info-grid-bottom{
    display:grid;
    grid-template-columns:1fr 1fr;
    gap:30px;
    padding-top:30px;
    border-top:2px solid #e5e7eb;
}

.info-box h4{
    color:#6b7280;
    font-size:16px;
    margin-bottom:8px;
    font-weight:500;
}

.info-box p{
    font-size:22px;
    font-weight:bold;
    color:#111827;
}

/* BOOKING */
.booking-history{
    margin-top:50px;
    padding-top:30px;
    border-top:2px solid #e5e7eb;
}

.booking-history h3{
    font-size:28px;
    margin-bottom:20px;
}

.booking-history p{
    color:#6b7280;
    font-size:18px;
}

/* DARK MODE PROFILE */

.dark-mode .profile-wrapper{
    background:#0f172a;
}

.dark-mode .profile-card{
    background:#1e293b;
    color:white;
}

.dark-mode .profile-title{
    color:white;
}

.dark-mode .info-box h4{
    color:#cbd5e1;
}

.dark-mode .info-box p{
    color:white;
}

.dark-mode .info-grid-bottom{
    border-top:2px solid #475569;
}

.dark-mode .booking-history{
    border-top:2px solid #475569;
}

.dark-mode .booking-history h3{
    color:white;
}

.dark-mode .booking-history p{
    color:#cbd5e1;
}

.dark-mode .edit-btn{
    background:#2563eb;
}

.dark-mode input,
.dark-mode textarea,
.dark-mode select{
    background:#334155;
    color:white;
    border:1px solid #475569;
}

/* EDIT PROFILE MODAL DARK MODE */

.dark-mode #editModal > div{
    background:#1e293b;
    color:white;
}

.dark-mode #editModal h2,
.dark-mode #editModal label{
    color:white;
}

.dark-mode #editModal input{
    background:#334155;
    color:white;
    border:1px solid #475569;
}

.dark-mode #editModal input::placeholder{
    color:#cbd5e1;
}

.dark-mode .account-actions p{
    color:#cbd5e1;
}

.dark-mode .bg-gray-300{
    background:#475569 !important;
    color:white !important;
}

.dark-mode .bg-gray-300:hover{
    background:#64748b !important;
}


</style>


<div class="profile-wrapper">

    <div class="profile-card">

        @if(session('success'))
            <div class="mb-4 p-3 bg-green-100 text-green-700 rounded-lg">
                {{ session('success') }}
            </div>
        @endif

        <h1 class="profile-title">Profile</h1>

        <div class="profile-top">

            <!-- LEFT -->
            <div class="profile-left">

                <img 
                    src="{{ auth()->user()->profile_photo 
                        ? '/uploads/' . auth()->user()->profile_photo 
                        : '/photo/user-icon.png'  }}"
                    class="profile-image"
                >

                <button onclick="openModal()" class="edit-btn">
                    Edit Profile
                </button>

            </div>

            <!-- RIGHT -->
            <div class="profile-right">

                <!-- TOP -->
                <div class="info-grid-top">

                    <div class="info-box">
                        <h4>Name</h4>
                        <p>{{ auth()->user()->name }}</p>
                    </div>

                    <div class="info-box">
                        <h4>Email</h4>
                        <p>{{ auth()->user()->email }}</p>
                    </div>

                </div>

                <!-- BOTTOM -->
                <div class="info-grid-bottom">

                    <div class="info-box">
                        <h4>Phone</h4>
                        <p>{{ auth()->user()->phone ?? '-' }}</p>
                    </div>

                    <div class="info-box">
                        <h4>Address</h4>
                        <p>{{ auth()->user()->address ?? '-' }}</p>
                    </div>

                </div>

            </div>

        </div>

        <!-- BOOKING HISTORY -->
        <div class="booking-history">

            <h3>Booking History</h3>

            @forelse($bookings as $booking)

                <div class="bg-gray-100 p-4 rounded-lg mb-3">

                    <p class="font-semibold">
                        {{ $booking->room_name }}
                    </p>

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

                <p>No bookings yet.</p>

            @endforelse

        </div>

    </div>

</div>
<!-- MODAL -->
<div id="editModal" 
     class="fixed inset-0 bg-black/50 hidden items-center justify-center z-50 p-4 overflow-y-auto">

    <div class="bg-white w-full max-w-md rounded-2xl shadow-xl p-6 relative">

        <h2 class="text-2xl font-bold mb-5">
            Edit Profile
        </h2>

        <form method="POST" action="/profile/update" enctype="multipart/form-data">
            @csrf

            <!-- IMAGE -->
            <div class="mb-5 text-center">

                <img 
                    src="{{ auth()->user()->profile_photo 
                        ? '/uploads/' . auth()->user()->profile_photo 
                        : '/photo/user-icon.png'  }}"
                    class="w-28 h-28 rounded-full object-cover mx-auto shadow mb-4"
                >

                <input 
                    type="file" 
                    name="photo"
                    class="text-sm"
                >
            </div>

            <!-- NAME -->
            <div class="mb-4">
                <label class="block mb-1 font-medium">Name</label>

                <input 
                    type="text"
                    name="name"
                    value="{{ auth()->user()->name }}"
                    class="w-full border rounded-xl px-4 py-3"
                >
            </div>

            <!-- EMAIL -->
            <div class="mb-4">
                <label class="block mb-1 font-medium">Email</label>

                <input 
                    type="email"
                    name="email"
                    value="{{ auth()->user()->email }}"
                    class="w-full border rounded-xl px-4 py-3"
                >
            </div>

            <!-- PHONE -->
            <div class="mb-4">
                <label class="block mb-1 font-medium">Phone</label>

                <input 
                    type="text"
                    name="phone"
                    value="{{ auth()->user()->phone }}"
                    class="w-full border rounded-xl px-4 py-3"
                >
            </div>

            <!-- ADDRESS -->
            <div class="mb-6">
                <label class="block mb-1 font-medium">Address</label>

                <input 
                    type="text"
                    name="address"
                    value="{{ auth()->user()->address }}"
                    class="w-full border rounded-xl px-4 py-3"
                >
            </div>

            <!-- BUTTONS -->
            <div class="flex justify-end gap-3">
            
                <button
                    type="button"
                    onclick="closeModal()"
                    class="px-5 py-2 rounded-xl bg-gray-300"
                >
                    Cancel
                </button>
            
                <button
                    type="submit"
                    class="px-5 py-2 rounded-xl bg-blue-500 text-white"
                >
                    Save
                </button>
            
            </div>
            
            <hr class="my-6">
            
        </form>

        <hr class="my-6">

        <!-- ACCOUNT ACTIONS -->
        <div class="account-actions">
        
            <h3 class="text-red-600 font-bold text-lg mb-2">
                Account Actions
            </h3>
        
            <p class="text-gray-500 text-sm mb-4">
                Permanently delete your account and all reviews.
            </p>
        
            <form action="/profile/delete"
                  method="POST"
                  onsubmit="return confirm('Delete your account permanently? This action cannot be undone.')">
        
                @csrf
                @method('DELETE')
        
                <button
                    type="submit"
                    class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-xl"
                >
                    Delete Account
                </button>
            
            </form>
        
        </div>

            </div>
        </div>

<!-- CONTACT -->


<script>
function openModal() {
    document.getElementById('editModal').classList.remove('hidden');
    document.getElementById('editModal').classList.add('flex');
}

function closeModal() {
    document.getElementById('editModal').classList.add('hidden');
    document.getElementById('editModal').classList.remove('flex');
}

window.addEventListener('load', function(){

    if(localStorage.getItem('theme') === 'dark'){
        document.body.classList.add('dark-mode');
    }

});
</script>

@endsection