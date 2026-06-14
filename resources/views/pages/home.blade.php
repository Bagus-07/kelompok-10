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

    <h2>{{ __('messages.welcome') }}</h2>

    <p class="hero-subtitle">
        {{ __('messages.subtitle') }}
    </p>

    <form action="/rooms" method="GET" class="hero-search">

    <div class="search-field">
        <label>{{ __('messages.check_in') }}</label>
        <input type="date" name="check_in" required>
    </div>

    <div class="search-field">
        <label>{{ __('messages.check_out') }}</label>
        <input type="date" name="check_out" required>
    </div>

    <div class="search-field">
        <label>{{ __('messages.guests') }}</label>
        <input
            type="number"
            name="guests"
            min="1"
            value="1"
        >
    </div>

    <div class="search-field">
        <label>{{ __('messages.room_type') }}</label>
        <select name="room_type">
            <option value="">{{ __('messages.all_rooms') }}</option>
            <option>{{ __('messages.standard') }}</option>
            <option>{{ __('messages.superior') }}</option>
            <option>{{ __('messages.deluxe') }}</option>
        </select>
    </div>

    <button type="submit">
        {{ __('messages.search_rooms') }}
    </button>

</form>

</div>

    </div>

    
</div>

<!-- FACILITIES -->
<div class="section" id="facilities">
    <h2>{{ __('messages.facilities') }}</h2>
    <div class="grid">
        <div class="box">
    <img src="/photo/pool.jpg">
    <p>{{ __('messages.swimming_pool') }}</p>
</div>

<div class="box">
    <img src="/photo/beach.jpg">
    <p>{{ __('messages.beach') }}</p>
</div>

<div class="box">
    <img src="/photo/hotel2.jpeg">
    <p>{{ __('messages.restaurant') }}</p>
</div>

<div class="box">
    <img src="/photo/hotel4.jpeg">
    <p>{{ __('messages.fitness_center') }}</p>
</div>
    </div>
</div>

<!-- ABOUT -->
<div class="section" id="about">

    <h2>{{ __('messages.about_us') }}</h2>

    <p>
        {{ __('messages.about_text_1') }}
    </p>

    <p class="text-gray-600 mb-4">
        {{ __('messages.about_text_2') }}
    </p>

    <p class="text-gray-600 mb-4">
        {{ __('messages.about_text_3') }}
    </p>

    <p class="text-gray-600">
        {{ __('messages.about_text_4') }}
    </p>

</div>

<!-- REVIEWS -->
<div class="section bg-gray-50" id="reviews">

    @auth
<div class="max-w-xl mx-auto mb-10 bg-white p-6 rounded-xl shadow">

    <h3 class="text-xl font-bold mb-4">
        {{ __('messages.leave_review') }}
    </h3>

    <form action="/review" method="POST">
        @csrf

        <textarea 
            name="review"
            placeholder="{{ __('messages.write_review') }}"
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
            {{ __('messages.submit_review') }}
        </button>

    </form>
</div>
@endauth

    <h3 class="text-2xl font-bold mb-8">
        {{ __('messages.reviews') }}
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
        : '/photo/user-icon.png' }}"
        
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

        @if(auth()->check() && auth()->id() == $review->user_id)
    
    <form action="/review/{{ $review->id }}" method="POST"
          onsubmit="return confirm('Delete this review?')">
    
        @csrf
        @method('DELETE')
    
        <button
            type="submit"
            style="
                margin-top:10px;
                background:#ef4444;
                color:white;
                border:none;
                padding:8px 14px;
                border-radius:8px;
                cursor:pointer;
            ">
            Delete Review
        </button>
    
    </form>
    
    @endif

</div>

@empty

<p>{{ __('messages.no_reviews') }}</p>

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