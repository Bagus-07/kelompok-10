@extends('layouts.guest')

@section('title', 'Rooms')

@section('content')

<style>
.login-btn:hover,
.signup-btn:hover {
    transform: scale(1.05);
}

/* SEARCH */
.search-container {
    display: flex;
    justify-content: center;
    margin-bottom: 40px;
    padding-top: 40px;
}

.search-bar {
    width: 60%;
    padding: 15px 20px;
    border: none;
    border-radius: 30px;
    background: #f5f5f5;
    font-size: 16px;
    box-shadow: 0 4px 10px rgba(0,0,0,0.08);
}

/* ROOM SECTION */
.rooms-container {
    width: 90%;
    margin: auto;
    display: flex;
    flex-direction: column;
    gap: 30px;
    padding-bottom: 80px;
}

/* ROOM CARD */
.room-card {
    background: white;
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 20px;
    border-radius: 20px;
    box-shadow: 0 6px 20px rgba(0,0,0,0.08);
    transition: 0.3s;
    cursor: pointer;
}

.room-card:hover {
    transform: translateY(-5px);
}

.room-image img {
    width: 220px;
    height: 150px;
    object-fit: cover;
    border-radius: 15px;
}

.room-details {
    flex: 1;
    margin-left: 30px;
}

.room-details h2 {
    margin-bottom: 10px;
    font-size: 28px;
    color: #222;
}

.room-details p {
    color: #666;
    line-height: 1.6;
}

.stars {
    margin-top: 15px;
    color: #E9C46A;
    font-size: 20px;
}

.room-price {
    text-align: right;
}

.room-price h3 {
    margin-bottom: 20px;
}

.room-price button,
.book-btn {
    border: none;
    padding: 12px 24px;
    border-radius: 30px;
    background: linear-gradient(45deg, #F4A261, #E9C46A);
    color: white;
    font-weight: bold;
    cursor: pointer;
}

.modal {
    display: none;
    position: fixed;
    inset: 0;
    background: rgba(0,0,0,0.6);
    justify-content: center;
    align-items: center;
    z-index: 99999;
}

.modal-content {
    width: 500px;
    max-width: 90%;
    background: white;
    border-radius: 20px;
    overflow: hidden;
}

.modal-content img {
    width: 100%;
    height: 260px;
    object-fit: cover;
}

.modal-body {
    padding: 25px;
}

.close {
    float: right;
    font-size: 28px;
    cursor: pointer;
}
</style>

<!-- SEARCH -->
<div class="search-container">
    <input type="text"
           id="searchInput"
           class="search-bar"
           placeholder="Search rooms...">
</div>

<!-- ROOM LIST -->
<div class="rooms-container">

@foreach($rooms as $room)

<div class="room-card"
     data-name="{{ $room->nama_tipe }}"
     data-price="{{ $room->harga_per_malam }}"
     data-desc="{{ $room->deskripsi }}"
     data-img="{{ $room->gambar ? asset('storage/'.$room->gambar) : 'https://via.placeholder.com/220x150' }}">

    <div class="room-image">
        <img src="{{ $room->gambar ? asset('storage/'.$room->gambar) : 'https://via.placeholder.com/220x150' }}">
    </div>

    <div class="room-details">
        <h2>{{ $room->nama_tipe }}</h2>
        <p>{{ $room->deskripsi }}</p>

        <div class="stars">
            ★ ★ ★ ★ ★
        </div>
    </div>

    <div class="room-price">
        <h3>
            Rp {{ number_format($room->harga_per_malam,0,',','.') }}
            / NIGHT
        </h3>

        <button type="button">
            BOOK NOW
        </button>
    </div>

</div>

@endforeach

</div>

<!-- MODAL -->
<div class="modal" id="roomModal">
    <div class="modal-content">

        <img id="modalImg" src="">

        <div class="modal-body">

            <span class="close">&times;</span>

            <h2 id="modalTitle"></h2>
            <p id="modalDesc"></p>
            <h3 id="modalPrice"></h3>

            @auth

            <form action="{{ route('booking.store') }}" method="POST">

                @csrf

                <input type="hidden" name="room_name" id="bookingRoomName">
                <input type="hidden" name="total_price" id="bookingRoomPrice">

                <input type="hidden" name="check_in" value="{{ $check_in }}">
                <input type="hidden" name="check_out" value="{{ $check_out }}">

                <div class="mt-4 p-3 border rounded bg-gray-50">
                    <p>
                        <strong>Check In :</strong>
                        {{ $check_in }}
                    </p>

                    <p>
                        <strong>Check Out :</strong>
                        {{ $check_out }}
                    </p>
                </div>

                <button type="submit" class="book-btn">
                    Book Now
                </button>

            </form>

            @else

            <a href="{{ route('login') }}">
                <button class="book-btn">
                    Login to Book
                </button>
            </a>

            @endauth

        </div>

    </div>
</div>

<script>

const searchInput = document.getElementById('searchInput');
const roomCards = document.querySelectorAll('.room-card');

searchInput.addEventListener('keyup', function () {

    const value = this.value.toLowerCase();

    roomCards.forEach(card => {

        const roomName = card.dataset.name.toLowerCase();

        card.style.display =
            roomName.includes(value) ? 'flex' : 'none';

    });

});

const modal = document.getElementById('roomModal');
const modalImg = document.getElementById('modalImg');
const modalTitle = document.getElementById('modalTitle');
const modalDesc = document.getElementById('modalDesc');
const modalPrice = document.getElementById('modalPrice');

const bookingRoomName =
document.getElementById('bookingRoomName');

const bookingRoomPrice =
document.getElementById('bookingRoomPrice');

const closeBtn = document.querySelector('.close');

roomCards.forEach(card => {

    card.addEventListener('click', () => {

        modal.style.display = 'flex';

        modalImg.src = card.dataset.img;
        modalTitle.innerText = card.dataset.name;
        modalDesc.innerText = card.dataset.desc;

        modalPrice.innerText =
            'Rp ' +
            Number(card.dataset.price)
            .toLocaleString('id-ID');

        if (bookingRoomName)
            bookingRoomName.value = card.dataset.name;

        if (bookingRoomPrice)
            bookingRoomPrice.value = card.dataset.price;

    });

});

closeBtn.onclick = () => {
    modal.style.display = 'none';
};

window.onclick = (e) => {
    if (e.target === modal) {
        modal.style.display = 'none';
    }
};

</script>

@endsection