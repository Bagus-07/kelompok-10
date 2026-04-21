<!DOCTYPE html>
<html>
<head>
    <title>StayEase Hotel</title>
<style>
    body {
        font-family: Arial;
        margin: 0;
        background: #ffffff;
    }

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
    backdrop-filter: blur(10px);
    z-index: 1000;
}

    .navbar a {
        color: #333;
        margin-left: 20px;
        text-decoration: none;
    }

    .navbar a:hover {
    color: #3b82f6;
}

    .logo {
        justify-self: start;
    }

    .logo img {
        height: 60px;
        object-fit: contain;
    }

    /* Menu Tengah */
    .nav-menu {
    display: flex;
    justify-content: center;
    gap: 45px;
}

.nav-menu a {
    text-decoration: none;
    font-size: 18px;
    font-weight: 600;
    color: #333;
}

    .nav-links {
    display: flex;
    gap: 25px;
    margin-left: auto;
    }

    .nav-links a {
        margin-left: 20px;
        text-decoration: none;
        color: #333;
    }
  /* Login signup */
    .auth {
        justify-self: end;display: flex;
        gap: 12px;
    }

    .auth button {
        padding: 8px 18px;
        font-weight: 600;
        background: #FF13F0;
        border: none;
        border-radius: 20px;
        cursor: pointer;
    }

    /* Login */
    .auth button:first-child {
    padding: 8px 18px;
    border-radius: 20px;
    border: none;
    background: #FF13F0;
    color: white;
    cursor: pointer;
}

/* SIGNUP */
.auth button:last-child {
    padding: 8px 18px;
    border-radius: 20px;
    border: none;
    background: #FF13F0;
    color: white;
    cursor: pointer;
}

    /* BOOK NOW BUTTON */
    .booking-btn {
        padding: 8px 18px;
        border-radius: 20px;
        border: none;
        background: linear-gradient(to right, #f9a8d4, #fcd34d); /* pink → yellow */
        color: #333;
        font-weight: bold;
        cursor: pointer;
    }

    /* HERO */
    .hero {
    position: relative;
    height: 90vh;
    overflow: hidden;

    display: flex;
    justify-content: center;
    align-items: center;
}

/* CAROUSEL */
.carousel {
    position: absolute;
    width: 100%;
    height: 100%;
}

.slide {
    position: absolute;
    width: 100%;
    height: 100%;
    object-fit: cover;

    opacity: 0;
    transition: opacity 1s ease-in-out;
}

.slide.active {
    opacity: 1;
}

/* GRADIENT OVERLAY (your exact colors) */
.hero::after {
    content: "";
    position: absolute;
    inset: 0;
    background: linear-gradient(
        135deg,
        rgba(255, 216, 168, 0.3),
        rgba(245, 198, 170, 0.3),
        rgba(229, 184, 165, 0.3)
    );
}

/* TEXT */
.hero-content {
    position: relative;
    z-index: 2;
    text-align: center;
    color: white;
}

.hero h2 {
    text-shadow: 0 2px 10px rgba(0,0,0,0.5);
    }

    /* EXPLORE BUTTON */
    .hero button {
        margin-top: 20px;
        padding: 12px 25px;
        border-radius: 25px;
        border: none;
        background: white;
        color: #FF13F0;
        font-weight: 600;
        cursor: pointer;
    }

    /* SECTION */
    .section {
        padding: 40px;
        text-align: center;
    }

    .grid {
        display: flex;
        gap: 30px;
        justify-content: center;
        flex-wrap: wrap;
    }

    .box {
    width: 280px;
    border-radius: 12px;
    overflow: hidden;   /* ✅ VERY IMPORTANT */
    background: #f5f5f5;
    cursor: pointer;
    text-align: center;
    box-shadow: 0 4px 10px rgba(0,0,0,0.1);
    }

    .box img {
        width: 100%;
        height: 180px;
        object-fit: cover;
        display: block;
    }

    .box p {
        padding: 15px;
        font-weight: bold;
    }

    .modal {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0,0,0,0.6);
    z-index: 9999;

    /* ✅ center everything */
    justify-content: center;
    align-items: center;
    }

    .modal.show {
    display: flex;
    }

    .modal-content {
    background: white;
    width: 70%;
    max-width: 800px;   /* ✅ prevents it from being too big */
    max-height: 90vh;   /* ✅ prevent overflow */
    overflow-y: auto;   /* scroll if content too long */
    padding: 20px;
    border-radius: 10px;
    }

    .modal-content img {
    width: 100%;
    height: auto;
    border-radius: 8px;
    }

    .modal-body {
    display: flex;
    gap: 20px;
    align-items: flex-start;
    }

    .modal-body img {
        width: 50%;
    }

    .room-info {
        width: 50%;
    }

    .close {
        float: right;
        font-size: 24px;
        cursor: pointer;
    }

    #about {
    max-width: 800px;
    margin: auto;
    text-align: center;
    line-height: 1.6;
}

    #about p {
        margin-bottom: 15px;
        color: #555;
    }

    /* FOOTER */
    .footer {
        background: #f3f4f6;
        padding: 30px;
        text-align: center;
    }
</style>
</head>
<body>

<!-- NAVBAR -->
<div class="navbar">

    <div class="logo">
        <img src="/photo/new logo.jpeg">
    </div>

   <div class="nav-menu">
    <a href="#home">Home</a>
    <a href="#about">About</a>
    <a href="#contact">Contact</a>
</div>

    <div class="auth">
        <a href="/login" class="booking-btn">Log in</a>
        <a href="/register" class="booking-btn">Sign up</a>
    </div>

</div>

<!-- HOME -->
<div class="hero" id="home">
    <div class="carousel">
        <img src="/photo/hotel1.jpeg" class="slide active">
        <img src="/photo/hotel2.jpeg" class="slide">
        <img src="/photo/hotel3.jpeg" class="slide">
        <img src="/photo/hotel4.jpeg" class="slide">
        <img src="/photo/hotel5.jpeg" class="slide">
        <img src="/photo/hotel6.jpeg" class="slide">
    </div>
    <div class="hero-content">
        <h2>WELCOME TO STAYEASE HOTEL</h2>
        <button>Explore Rooms</button>
    </div>
</div>

<!-- ROOMS -->
<div class="section">
    <h3>OUR ROOMS</h3>
    <div class="grid">
        <div class="box" onclick="showRoom('Deluxe Room', 'Rp 500.000', 'Spacious room with king-size bed')">
            <img src="https://images.unsplash.com/photo-1505693416388-ac5ce068fe85?w=800">
            Deluxe Room
        </div>

        <div class="box" onclick="showRoom('Superior Room', 'Rp 350.000', 'Comfortable room for couples')">
            <img src="https://images.unsplash.com/photo-1505693416388-ac5ce068fe85?w=800">
            Superior Room
        </div>

        <div class="box" onclick="showRoom('Standard Room', 'Rp 250.000', 'Affordable room with basic facilities')">
            <img src="https://images.unsplash.com/photo-1505693416388-ac5ce068fe85?w=800">
            Standard Room
        </div>
    </div>
</div>



<!-- FACILITIES -->
<div class="section">
    <h3>FACILITIES</h3>
    <div class="grid">
        <div class="box">
            <img src="/photo/pool.jpg">
            pool
        </div>
        <div class="box">
            <img src="/photo/beach.jpg">
            beach
        </div>
        <div class="box">
            <img src="/photo/hotel2.jpeg">
            restaurant
        </div>
        <div class="box">
            <img src="/photo/hotel4.jpeg">
            gym
        </div>
    </div>
</div>


<div class="section" id="about">
    <h3>ABOUT US</h3>

    <p>
        <strong>StayEase Hotel</strong> is a modern beachfront hotel designed for comfort and relaxation. 
        Located just minutes from the beach, we offer a peaceful escape with beautiful surroundings.
    </p>

    <p>
        Our hotel features a variety of rooms to suit every guest, from standard to deluxe options, 
        all equipped with essential amenities for a comfortable stay.
    </p>

    <p>
        Enjoy our facilities including a swimming pool, restaurant, and gym, all designed to make your stay more enjoyable.
    </p>

    <p>
        Whether you're here for vacation or business, StayEase Hotel is your perfect place to stay.
    </p>
</div>

<!-- CONTACT + FOOTER -->
<div style="background:#333; color:white; padding:40px;" id="contact">

    <h2>Contact Us</h2>
    <p>Email: stayease@gmail.com</p>
    <p>Phone: 08123456789</p>
    <p>Address: Batam, Indonesia</p>

    <hr style="margin:20px 0; border-color:#555;">

    <p style="text-align:center;">© 2026 StayEase Hotel</p>

</div>

<!-- ✅ ROOM POPUP MODAL -->
<div id="roomModal" class="modal">

    <div class="modal-content">

        <span class="close" onclick="closeModal()">&times;</span>

        <h2 id="roomTitle">Room Name</h2>

        <div class="modal-body">
            <img src="https://images.unsplash.com/photo-1505693416388-ac5ce068fe85?w=800">

            <div class="room-info">
                <p id="roomPrice">Harga</p>
                <p id="roomDesc">Deskripsi kamar</p>
                <a href="/login" class="booking-btn">Booking</a>
            </div>
        </div>

    </div>

</div>

<script>

let slides = document.querySelectorAll(".slide");
let index = 0;

function showSlide() {
    slides.forEach(slide => slide.classList.remove("active"));
    slides[index].classList.add("active");

    index++;
    if (index >= slides.length) index = 0;
}

setInterval(showSlide, 3000);


function showRoom(name, price, desc) {
    document.getElementById('roomTitle').innerText = name;
    document.getElementById('roomPrice').innerText = price;
    document.getElementById('roomDesc').innerText = desc;

    document.getElementById('roomModal').classList.add('show');
}

function closeModal() {
    document.getElementById('roomModal').classList.remove('show');
}
</script>

</body>
</html>