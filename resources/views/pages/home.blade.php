@extends('layouts.guest')

@section('title', 'Home')

@section('content')

<!-- HERO -->
<div class="hero" id="home">
    <div class="carousel">
        <img src="/photo/hotel1.jpeg" class="slide active">
        <img src="/photo/hotel2.jpeg" class="slide">
        <img src="/photo/hotel3.jpeg" class="slide">
        <img src="/photo/hotel4.jpeg" class="slide">
        <img src="/photo/hotel5.jpg" class="slide">
        <img src="/photo/hotel6.jpeg" class="slide">
    </div>

    <div class="hero-content">

    <h2>WELCOME TO STAYEASE HOTEL</h2>

    <p class="hero-subtitle">
    Luxury rooms, modern facilities, and unforgettable experiences.
    </p>

    <form action="/rooms" method="GET" class="hero-search">

    <div class="search-field">
        <label>Check In</label>
        <input type="date" name="check_in" required>
    </div>

    <div class="search-field">
        <label>Check Out</label>
        <input type="date" name="check_out" required>
    </div>

    <div class="search-field">
        <label>Guests</label>
        <input
            type="number"
            name="guests"
            min="1"
            value="1"
        >
    </div>

    <div class="search-field">
        <label>Room Type</label>
        <select name="room_type">
            <option value="">All Rooms</option>
            <option>Standard</option>
            <option>Superior</option>
            <option>Deluxe</option>
        </select>
    </div>

    <button type="submit">
        Search Rooms
    </button>

</form>

</div>

    </div>

    
</div>

<!-- FACILITIES -->
<div class="section" id="facilities">
    <h2>Facilities</h2>
    <div class="grid">
        <div class="box"><img src="/photo/pool.jpg"><p>Swimming Pool</p></div>
        <div class="box"><img src="/photo/beach.jpg"><p>Beach</p></div>
        <div class="box"><img src="/photo/hotel2.jpeg"><p>Restaurant</p></div>
        <div class="box"><img src="/photo/hotel4.jpeg"><p>Fitness Center</p></div>
    </div>
</div>

<!-- ABOUT -->
<div class="section" id="about">
    <h2>About Us</h2>
    <p><strong>StayEase Hotel</strong> is a modern beachfront hotel designed for comfort and relaxation. Located just minutes from the beach, we offer a peaceful retreat with a beautiful environment.</p>
    
    <p class="text-gray-600 mb-4"> Our hotel offers a variety of room options suitable for every guest, ranging from standard to deluxe choices, all equipped with essential facilities for comfort during the stay. </p>
    
    <p class="text-gray-600 mb-4"> Enjoy our facilities including a swimming pool, restaurant, and fitness center, all designed to make your visit more enjoyable. </p>

    <p class="text-gray-600"> Whether you are here for vacation or business, StayEase Hotel is the perfect place for you to stay. </p>
</div>

<!-- REVIEWS -->
<div class="section bg-gray-50" id="reviews">

    @auth
<div class="max-w-xl mx-auto mb-10 bg-white p-6 rounded-xl shadow">

    <h3 class="text-xl font-bold mb-4">Leave a Review</h3>

    <form action="/review" method="POST">
        @csrf

        <textarea 
            name="review"
            placeholder="Write your review..."
            class="w-full border rounded-lg p-3 mb-4"
            required
        ></textarea>

        <select 
            name="rating"
            class="w-full border rounded-lg p-3 mb-4"
        >
            <option value="5">⭐⭐⭐⭐⭐ (5)</option>
            <option value="4">⭐⭐⭐⭐ (4)</option>
            <option value="3">⭐⭐⭐ (3)</option>
            <option value="2">⭐⭐ (2)</option>
            <option value="1">⭐ (1)</option>
        </select>

        <button class="px-5 py-2 bg-yellow-500 text-white rounded-lg">
            Submit Review
        </button>

    </form>
</div>
@endauth

    <h3 class="text-2xl font-bold mb-8">
        What Our Guests Say
    </h3>

    <div class="grid">

@forelse($reviews as $review)

<div class="bg-white rounded-2xl shadow-md p-6 w-[380px] text-left hover:shadow-xl transition duration-300">

    <!-- TOP -->
    <div class="flex items-center gap-4 mb-4">

        <!-- PROFILE -->
        <img 
    src="{{ $review->user && $review->user->profile_photo
        ? asset('uploads/' . $review->user->profile_photo)
        : 'https://via.placeholder.com/60' }}"
        
    style="
        width:56px;
        height:56px;
        border-radius:50%;
        object-fit:cover;
        display:block;
    "
>

        <!-- NAME + STARS -->
        <div>

            <h4 class="font-semibold text-lg text-gray-800">
                {{ $review->name }}
            </h4>

            <div class="flex items-center gap-1 text-yellow-400 text-sm">

                @for($i = 0; $i < $review->rating; $i++)
                    ★
                @endfor

                <span class="text-gray-500 ml-2">
                    {{ $review->rating }}.0
                </span>

            </div>

        </div>

    </div>

    <!-- REVIEW -->
    <p class="text-gray-600 leading-relaxed">
        {{ $review->review }}
    </p>

    <!-- DATE -->
    <p class="text-gray-400 text-sm mt-4">
        {{ $review->created_at->diffForHumans() }}
    </p>

</div>

@empty

<p>No reviews yet.</p>

@endforelse

</div>

</div>


<script>
let slides = document.querySelectorAll(".slide");
let index = 0;

function showSlide() {
    slides.forEach(slide => slide.classList.remove("active"));
    slides[index].classList.add("active");
    index = (index + 1) % slides.length;
}
setInterval(showSlide, 3000);
</script>
@endsection