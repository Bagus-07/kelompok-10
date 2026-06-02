<!DOCTYPE html>
<html>
<head>
    <title>@yield('title')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<style>

html {
    scroll-behavior: smooth;
}

body {
    overflow-y: auto;
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

    z-index: 1; /* ADD THIS */
}

/* CAROUSEL */
.carousel {
    position: absolute;
    width: 100%;
    height: 100%;
    pointer-events: none;
}

.slide {
    position: absolute;
    width: 100%;
    height: 100%;
    object-fit: cover;
    pointer-events: none;

    opacity: 0;
    transition: opacity 1s;
}

.slide.active {
    opacity: 1;
}

.hero-content {
    position: relative;
    z-index: 10;
    text-align: center;
    color: white;
}

/* OVERLAY */
.hero::after {
    pointer-events: none;
    content: "";
    position: absolute;
    inset: 0;
    background: rgba(255,255,255,0.35); 
}

/* TEXT */
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

.box > img {
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

.box {
    transition: 0.3s;
}

.box:hover {
    transform: translateY(-5px);
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

/* REVIEW PROFILE FIX */
.review-profile {
    width: 56px !important;
    height: 56px !important;
    border-radius: 9999px !important;
    object-fit: cover !important;
    flex-shrink: 0;
}

</style>

<body>

   <!-- NAVBAR -->
<div class="navbar">

    <div class="logo">
        <img src="/photo/new logo.jpeg">
    </div>

    <div class="nav-menu">
    <a href="/home#home">Home</a>
    <a href="/home#facilities">Facilities</a>
    <a href="/home#about">About</a>
    <a href="/home#contact">Contact</a>
</div>

    <div class="nav-auth">

@auth
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
            <button class="signup-btn">Logout</button>
        </form>

    </div>

@else
    <!-- NOT LOGGED IN -->
    <a href="/login" class="login-btn">Log in</a>
    <a href="/register" class="signup-btn">Sign up</a>
@endauth

</div>

</div>

</div>

<!-- PAGE CONTENT -->
    @yield('content')

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

</div>
</body>
</html>