<!DOCTYPE html>
<html>
<head>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>StayEase Hotel</title>

<style>

html {
    scroll-behavior: smooth;
}

body {
    font-family: Arial;
    margin: 0;
    background: #ffffff;
    padding-top: 70px;
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
    backdrop-filter: blur(12px);
    z-index: 1000;
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

/* AUTH BUTTON */
.nav-auth {
    justify-self: end;
    display: flex;
    align-items: center;
    gap: 12px;
}

/* LOGIN */
.login-btn {
    padding: 8px 18px;
    border-radius: 20px;
    background: linear-gradient(45deg, #F4A261, #E9C46A);
    color: white;
    font-size: 14px;
    font-weight: 600;
}

/* SIGNUP */
.signup-btn {
    padding: 8px 18px;
    border-radius: 20px;
    background: linear-gradient(45deg, #F4A261, #E9C46A);
    color: white;
    font-size: 14px;
    font-weight: 600;
}

/* HOVER */
.login-btn:hover,
.signup-btn:hover {
    transform: scale(1.05);
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
    transition: opacity 1s;
}

.slide.active {
    opacity: 1;
}

/* OVERLAY */
.hero::after {
    content: "";
    position: absolute;
    inset: 0;
    background: rgba(255,255,255,0.35); 
}

/* TEXT */
.hero-content {
    position: relative;
    z-index: 2;
    text-align: center;
    color: white;
}

.hero h2 {
    font-size: 40px;
    font-weight: bold;
}

/* BUTTON */
.hero button {
    margin-top: 20px;
    padding: 12px 25px;
    border-radius: 30px;
    border: none;

    background: linear-gradient(45deg, #F4A261, #E9C46A);
    color: white;

    font-weight: bold;
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
    overflow: hidden;
    background: #f5f5f5;
    box-shadow: 0 4px 10px rgba(0,0,0,0.1);
}

.box img {
    width: 100%;
    height: 180px;
    object-fit: cover;
}

.box p {
    padding: 15px;
    font-weight: bold;
}

/* ABOUT */
#about {
    max-width: 800px;
    margin: auto;
}

/* CONTACT */
#contact {
    background: #1f2937;
    color: white;
    padding: 40px;
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

<body>

<!-- NAVBAR -->
<div class="navbar">

    <div class="logo">
        <img src="/photo/new logo.jpeg">
    </div>

    <div class="nav-menu">
        <a href="#home">Home</a>
        <a href="#facilities">Facilities</a>
        <a href="#about">About</a>
        <a href="#contact">Contact</a>
    </div>

    <div class="nav-auth">
        <a href="/login" class="login-btn">Log in</a>
        <a href="/register" class="signup-btn">Sign up</a>
    </div>

</div>

<!-- HERO -->
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

<!-- FACILITIES -->
<div class="section" id="facilities">
    <h3>Facilities</h3>
    <div class="grid">
        <div class="box"><img src="/photo/pool.jpg"><p>Swimming Pool</p></div>
        <div class="box"><img src="/photo/beach.jpg"><p>Beach</p></div>
        <div class="box"><img src="/photo/hotel2.jpeg"><p>Restaurant</p></div>
        <div class="box"><img src="/photo/hotel4.jpeg"><p>Fitness Center</p></div>
    </div>
</div>

<!-- ABOUT -->
<div class="section" id="about">
    <h3>About Us</h3>
    <p><strong>StayEase Hotel</strong> is a modern beachfront hotel designed for comfort and relaxation. Located just minutes from the beach, we offer a peaceful retreat with a beautiful environment.</p>
    
    <p class="text-gray-600 mb-4"> Our hotel offers a variety of room options suitable for every guest, ranging from standard to deluxe choices, all equipped with essential facilities for comfort during the stay. </p>
    
    <p class="text-gray-600 mb-4"> Enjoy our facilities including a swimming pool, restaurant, and fitness center, all designed to make your visit more enjoyable. </p>

    <p class="text-gray-600"> Whether you are here for vacation or business, StayEase Hotel is the perfect place for you to stay. </p>
</div>

<!-- CONTACT -->
<div id="contact">
    <h2>Contact Us</h2>
    <p>Email: stayease@gmail.com</p>
    <p>Phone Number : 08123456789</p>
    <p>Address: Batam, Indonesia</p>
</div>

<!-- FOOTER -->
<div class="footer">
    © 2026 StayEase Hotel
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

</body>
</html>