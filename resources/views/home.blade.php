<!DOCTYPE html>
<html>
<head>
    <title>StayEase Hotel</title>

        @vite(['resources/css/app.css', 'resources/js/app.js'])

<style>

    html {
        scroll-behavior: smooth;
    }

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

    .nav-auth {
        align-items : center;
    }

    .nav-auth a {
        border-radius: 2px;
        padding: 6px 18px;
    }

    /*hp */
    @media (max-width: 576px) {
        .nav-auth {
            width: 100%
        }

        .nav-auth a{
            width: 100%;
            text-align: center;
        }
    }

    @media (max-width: 992px) {
        .nav-auth {
            justify-content: center;
        }
    }

    @media (min-width: 993px) {
        .nav-auth {
            justify-content: flex-end;
        }
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
        color: rgb(0, 0, 0);
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
    <a href="#facilities">Fasilitas</a>
    <a href="#about">Tentang</a>
    <a href="#contact">kontak</a>
    </div>

    <div class="nav-auth flex flex-col md:flex-row gap-2 justify-end">
    <a href="/login" 
       class="border border-yellow-400 text-yellow-500 px-4 py-1 rounded-full text-sm text-center">
       Log in
    </a>

    <a href="/register" 
       class="bg-yellow-400 text-white px-4 py-1 rounded-full text-sm text-center">
       Sign up
    </a>
    </div>
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
    <div class="font-bold text-white drop-shadow-lg">
        <h2 class="text-4xl font-bold text-white drop-shadow-lg">
            SELAMAT DATANG DI STAYEASE HOTEL
        </h2>
        <button class="mt-4 px-4 py-2 bg-white text-black font-semibold rounded-full shadow block mx-auto">
            Jelajahi Kamar
        </button>
    </div>
</div>

<!-- FACILITIES -->
<div class="section py-10" id="facilities">
    <h3 class="text-2xl font-bold mb-6">Fasilitas</h3>
    <div class="grid">
        <div class="box">
            <img src="/photo/pool.jpg">
            <p class="font-semibold">
                Kolam Renang
            </p>
        </div>
        <div class="box">
            <img src="/photo/beach.jpg">
            <p class="font-semibold">
                Pantai
            </p>
        </div>
        <div class="box">
            <img src="/photo/hotel2.jpeg">
            <p class="font-semibold">
                Restoran
            </p>
        </div>
        <div class="box">
            <img src="/photo/hotel4.jpeg">
            <p class="font-semibold">
                Gym
            </p>
        </div>
    </div>
</div>


<div class="section py-10" id="about">
    <h3 class="text-2xl font-bold mb-6">Tentang Kami</h3>

    <p class="text-gray-600 mb-4">
        <strong>StayEase Hotel</strong> adalah hotel tepi pantai modern yang dirancang untuk kenyamanan dan relaksasi. Terletak hanya beberapa menit dari pantai, kami menawarkan tempat peristirahatan yang tenang dengan lingkungan yang indah.
    </p>

    <p class="text-gray-600 mb-4">
        Hotel kami menawarkan berbagai pilihan kamar yang sesuai untuk setiap tamu, mulai dari pilihan standar hingga deluxe, semuanya dilengkapi dengan fasilitas penting untuk kenyamanan selama menginap.
    </p>

    <p class="text-gray-600 mb-4">
        Nikmati fasilitas kami termasuk kolam renang, restoran, dan pusat kebugaran, semuanya dirancang untuk membuat kunjungan Anda lebih menyenangkan.
    </p>

    <p class="text-gray-600">
       Baik Anda berada di sini untuk liburan atau bisnis, StayEase Hotel adalah tempat menginap yang sempurna untuk Anda.
    </p>
</div>

<!-- CONTACT + FOOTER -->
<div class="bg-gray-800 text-white p-10" id="contact">

    <h2 class="text-2xl font-bold mb-4">Contact Us</h2>
    <p>Email: stayease@gmail.com</p>
    <p>No.hp: 08123456789</p>
    <p>Alamat: Batam, Indonesia</p>

    <hr style="margin:20px 0; border-color:#555;">

    <p style="text-align:center;">© 2026 StayEase Hotel</p>

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

</script>

</body>
</html>