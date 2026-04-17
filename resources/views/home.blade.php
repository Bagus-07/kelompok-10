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
        display: flex;
        align-items: center;;
        padding: 20px 60px;

        position: fixed;
        top: 0;
        width: 100%;
        z-index: 1000;

        background: rgba(255, 255, 255, 0.6); /* transparent white */
        backdrop-filter: blur(10px);
        -webkit-backdrop-filter: blur(10px);
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
        margin-right: 1000px;
    }

    .logo img {
        height: 70px;
        object-fit: contain;
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

    .auth {
        margin-left: 20px;
    }

    .auth button {
        padding: 12px 25px;
        font-size: 16px;
        background: #FF13F0;
        border: none;
        border-radius: 20px;
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
        gap: 20px;
        justify-content: center;
    }

    .box {
        width: 200px;
        height: 150px;
        background: #f3f4f6;
        border-radius: 10px;
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
        <img src="/photo/lofo.jpeg" alt="StayEase Logo">
    </div>
    <div>
        <a href="#home">Home</a>
        <a href="#about">About</a>
        <a href="#contact">Contact</a>
    </div>
    <div class="auth">
        <button> log in </button>
        <button> sign up </button>
    </div>
</div>

<!-- HOME -->
<div class="hero" id="home">
    <div class="carousel">
        <img src="/photo/hotel1.jpeg" class="slide active">
        <img src="/photo/hotel2.jpeg" class="slide">
        <img src="/photo/hotel3.jpeg" class="slide">
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
        <div class="room-card" onclick="showRoom('Deluxe Room', 'Rp 500.000', 'Spacious room with king-size bed')">
            Deluxe Room
        </div>

        <div class="room-card" onclick="showRoom('Superior Room', 'Rp 350.000', 'Comfortable room for couples')">
            Superior Room
        </div>

        <div class="room-card" onclick="showRoom('Standard Room', 'Rp 250.000', 'Affordable room with basic facilities')">
            Standard Room
        </div>
    </div>
</div>

<!-- ABOUT -->
<div class="section" id="about">
    <h3>ABOUT US</h3>
    <p>StayEase Hotel provides comfortable and affordable rooms for your stay.</p>
</div>

<!-- FACILITIES -->
<div class="section">
    <h3>FACILITIES</h3>
    <div class="grid">
        <div class="box"></div>
        <div class="box"></div>
        <div class="box"></div>
    </div>
</div>

<!-- CONTACT + FOOTER -->
<div style="background:#333; color:white; padding:40px;">

    <h2>Contact Us</h2>
    <p>Email: stayease@gmail.com</p>
    <p>Phone: 08123456789</p>
    <p>Address: Batam, Indonesia</p>

    <hr style="margin:20px 0; border-color:#555;">

    <p style="text-align:center;">© 2026 StayEase Hotel</p>

</div>
<!-- ROOM POPUP MODAL -->
<div id="roomModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeModal()">&times;</span>

        <h2 id="roomTitle">Room Name</h2>

        <img src="https://images.unsplash.com/photo-1505693416388-ac5ce068fe85?w=800" alt="Room Image">

        <p id="roomPrice">Harga</p>
        <p id="roomDesc">Deskripsi kamar</p>

        <a href="/login" class="booking-btn">Booking</a>
        
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
    document.getElementById('roomModal').style.display = 'block';
}

function closeModal() {
    document.getElementById('roomModal').style.display = 'none';
}
</script>

</body>
</html>