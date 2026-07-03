@extends('layouts.guest')

@section('title', 'Home')

@section('content')
<style>
    .review-footer {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-top: 15px;
    }

    .review-date {
        color: #9ca3af;
        font-size: 14px;
    }

    .review-actions {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .review-actions form {
        margin: 0;
    }

    .review-grid {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        gap: 30px;
        max-width: 1200px;
        margin: 0 auto;
    }

    #reviews {
        padding-bottom: 80px;
    }

    .icon-btn {
        border: none;
        background: none;
        cursor: pointer;
        font-size: 18px;
        transition: 0.25s;
        padding: 6px;
    }

    .edit-btn {
        color: #3b82f6;
    }

    .edit-btn:hover {
        color: #2563eb;
        transform: scale(1.15);
    }

    .delete-btn {
        color: #ef4444;
    }

    .delete-btn:hover {
        color: #dc2626;
        transform: scale(1.15);
    }

    .modal {
        display: none;
        position: fixed;
        inset: 0;
        background: rgba(0, 0, 0, .5);
        justify-content: center;
        align-items: center;
        z-index: 9999;
    }

    .modal-box {
        width: 500px;
        max-width: 90%;
        background: white;
        padding: 30px;
        border-radius: 18px;
        position: relative;
    }

    #closeModal {
        position: absolute;
        right: 20px;
        top: 15px;
        font-size: 28px;
        cursor: pointer;
    }

    .save-btn {
        width: 100%;
        background: #3b82f6;
        color: white;
        border: none;
        padding: 12px;
        border-radius: 10px;
        cursor: pointer;
    }

</style>


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
                <input type="date" name="check_in" min="{{ now()->toDateString() }}" required>
                <small>Check-in dimulai pukul 14:00 WIB</small>
            </div>

            <div class="search-field">
                <label>{{ __('messages.check_out') }}</label>
                <input type="date" name="check_out" min="{{ now()->toDateString() }}" required>
                <small>Check-out maksimal pukul 12:00 WIB</small>
            </div>

            <div class="search-field">
                <label>{{ __('messages.guests') }}</label>
                <input type="number" name="guests" min="1" value="1">
            </div>

            <div class="search-field">
                <label>{{ __('messages.search_rooms') }}</label>
                <select name="room_type">

                    <option value="">
                        {{ __('messages.all_rooms') }}
                    </option>

                    @foreach($roomTypes as $roomType)

                    <option value="{{ $roomType->nama_tipe }}">
                        {{ $roomType->nama_tipe }}
                    </option>

                    @endforeach

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

            <textarea name="review" placeholder="{{ __('messages.write_review') }}"
                class="w-full border rounded-lg p-3 mb-4" required></textarea>

            <select name="tipe_kamar_id" class="w-full border rounded-lg p-3 mb-4" required>

                <option value="">
                    Select Room You Stayed In
                </option>

                @foreach($roomTypes as $room)

                <option value="{{ $room->id }}">
                    {{ $room->nama_tipe }}
                </option>

                @endforeach

            </select>

            <select name="rating" class="w-full border rounded-lg p-3 mb-4" required>
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

    <div class="review-grid">

        @forelse($reviews as $review)

        <div class="bg-white rounded-2xl shadow-md p-6 w-full max-w-md">

            <!-- TOP -->
            <div class="flex items-center gap-4 mb-4">

                <!-- PROFILE -->
                <img src="{{ $review->user && $review->user->profile_photo
        ? asset('uploads/' . $review->user->profile_photo)
        : '/photo/user-icon.png' }}" style="
        width:56px;
        height:56px;
        border-radius:50%;
        object-fit:cover;
        display:block;
    ">

                <!-- NAME + STARS -->
                <div>

                    <h4 class="font-semibold text-lg text-gray-800">
                        {{ $review->name }}
                    </h4>

                    <p class="text-blue-500 text-sm">
                        {{ $review->tipeKamar->nama_tipe ?? 'Unknown Room' }}
                    </p>

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

            <div class="review-footer">

                <!-- DATE -->
                <p class="review-date">
                    {{ $review->created_at->diffForHumans() }}
                </p>

                @if(auth()->check() && auth()->id() == $review->user_id)

                <div class="review-actions">

                    <!-- Edit -->
                    <button class="icon-btn edit-btn editReviewBtn" data-id="{{ $review->id }}"
                        data-review="{{ $review->review }}" data-rating="{{ $review->rating }}">
                        <i class="fas fa-pen-to-square"></i>
                    </button>

                    <!-- Delete -->
                    <form action="/review/{{ $review->id }}" method="POST"
                        onsubmit="return confirm('Delete this review?')">

                        @csrf
                        @method('DELETE')

                        <button type="submit" class="icon-btn delete-btn">
                            <i class="fas fa-trash"></i>
                        </button>

                    </form>

                </div>

                @endif

            </div>

        </div>

        @empty

        <p>{{ __('messages.no_reviews') }}</p>

        @endforelse

    </div>

</div>

<div id="editModal" class="modal">

    <div class="modal-box">

        <span id="closeModal">&times;</span>

        <h3>Edit Review</h3>

        <form id="editForm" method="POST">

            @csrf
            @method('PUT')

            <textarea id="editReview" name="review" class="w-full border rounded-lg p-3 mb-3" required></textarea>

            <select id="editRating" name="rating" class="w-full border rounded-lg p-3 mb-4">
                <option value="5">⭐⭐⭐⭐⭐ (5)</option>
                <option value="4">⭐⭐⭐⭐ (4)</option>
                <option value="3">⭐⭐⭐ (3)</option>
                <option value="2">⭐⭐ (2)</option>
                <option value="1">⭐ (1)</option>
            </select>

            <button class="save-btn">
                Save Changes
            </button>

        </form>

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

    const modal = document.getElementById("editModal");
    const closeModal = document.getElementById("closeModal");
    const editForm = document.getElementById("editForm");

    document.querySelectorAll(".editReviewBtn").forEach(btn => {

        btn.onclick = function () {

            modal.style.display = "flex";

            document.getElementById("editReview").value =
                this.dataset.review;

            document.getElementById("editRating").value =
                this.dataset.rating;

            editForm.action =
                "/review/" + this.dataset.id;

        }

    });

    closeModal.onclick = function () {
        modal.style.display = "none";
    }

    window.onclick = function (e) {

        if (e.target == modal) {

            modal.style.display = "none";

        }

    }

</script>
@endsection
