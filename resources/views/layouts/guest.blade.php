<!DOCTYPE html>
<html>
<head>
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<style>

html {
    scroll-behavior: smooth;
    overflow-x: hidden;
}

body {
    overflow-y: auto;
    overflow-x: hidden;
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

    background: rgba(255,255,255,0.92);
    box-shadow:0 2px 10px rgba(0,0,0,.08);
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
.hero{
    position:relative;
    height:550px;

    overflow:hidden;

    display:flex;
    justify-content:center;
    align-items:center;

    z-index:1;
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



/* OVERLAY */
.hero::after {
    content: "";
    position: absolute;
    inset: 0;
    background: rgba(0,0,0,0.60);
    z-index: 1;
}

/* TEXT */

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
    padding: 40px 40px;
    text-align: center;
}

.section h2{
    font-size:36px;
    font-weight:700;
    margin-bottom:40px;
    color:#222;
}

.grid {
    display: flex;
    gap: 30px;
    justify-content: center;
    flex-wrap: wrap;
}

.box {
    width: 280px;
    border-radius: 16px;
    overflow: hidden;
    background: #f5f5f5;
    box-shadow: 0 8px 25px rgba(0,0,0,0.12);
    transition: all .3s ease;
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

.box {
    transition: 0.3s;
}

.box:hover {
    transform: translateY(-8px);
    box-shadow:0 15px 35px rgba(0,0,0,.15);
}

/* FOOTER */
.footer{
    background:#e5e7eb;
    padding:15px;
    text-align:center;
    border-top:2px solid #ccc;

    min-height:auto;
    height:auto;
}

/* REVIEW PROFILE FIX */
.review-profile {
    width: 56px !important;
    height: 56px !important;
    border-radius: 9999px !important;
    object-fit: cover !important;
    flex-shrink: 0;
}

/*new*/

.hero-content{
    position:relative;
    z-index:10;

    width:100%;
    max-width:1200px;

    text-align:center;

    color:white;

    padding:0 20px;
}

.hero-subtitle{
    font-size:22px;
    margin-bottom:25px;
    color:white;
}

.hero h2{
    font-size:64px;
    font-weight:800;
    margin-bottom:10px;

    text-shadow:0 4px 12px rgba(0,0,0,.5);
}


.hero-card h2{
    font-size: clamp(36px, 5vw, 48px);
    margin-bottom:15px;
}

.hero-card p{
    color:white;
    margin-bottom:25px;
    line-height:1.8;
}



.hero-search{
    background:rgba(255,255,255,.95);

    border-radius:18px;

    padding:18px;

    display:grid;
    grid-template-columns:
        1fr
        1fr
        1fr
        1fr
        180px;

    gap:12px;

    max-width:1150px;

    margin:auto;

    box-shadow:0 10px 25px rgba(0,0,0,.2);
}

.hero-search{
    box-sizing:border-box;
    width:100%;
}

.hero-search *{
    box-sizing:border-box;
}

.search-field{
    text-align: left;
}

.search-field label{
    display: block;
    margin-bottom: 8px;
    font-size: 14px;
    font-weight: 700;
    color: #555;
}

.search-field input,
.search-field select{
    width: 100%;
    height: 48px;
    padding: 0 15px;
    border: 1px solid #ddd;
    border-radius: 12px;
    box-sizing: border-box;
}

.hero-search input,
.hero-search select{
    height:50px;
    border:1px solid #ddd;
    border-radius:10px;
    padding:0 12px;
}

.hero-search button{
    height: 55px;
    align-self: end;

    border: none;
    border-radius: 12px;

    background: linear-gradient(
        45deg,
        #F4A261,
        #E9C46A
    );

    color: white;
    font-size: 18px;
    font-weight: 700;
    cursor: pointer;
}



.primary-btn{
    background:#c89b3c;
    color:white;
}

.secondary-btn{
    background:white;
    color:#8b6a29;
}



.booking-card h3{
    text-align:center;
    margin-bottom:25px;
    color:#8b6a29;
}



.booking-grid label{
    display:block;
    margin-bottom:8px;
    font-weight:600;
    color:#8b6a29;
}

.search-field input,
.search-field select{
    width: 100%;
    height: 55px;
    padding: 0 15px;

    border: 1px solid #ddd;
    border-radius: 12px;

    box-sizing: border-box;

    color: #333;          
    background: white;    
}

/*new contact */
.contact-modal{
    display:none;

    position:fixed;
    inset:0;

    background:rgba(0,0,0,.6);

    z-index:10000;

    justify-content:center;
    align-items:center;
}

.contact-modal-content{
    background:white;

    width:400px;
    max-width:90%;

    padding:30px;

    border-radius:20px;

    text-align:center;

    position:relative;
}

.close-modal{
    position:absolute;

    right:20px;
    top:10px;

    font-size:30px;

    cursor:pointer;
}

.contact-buttons{
    margin-top:20px;
}

.wa-btn{
    display:inline-block;

    padding:12px 25px;

    background:#25D366;

    color:white;

    text-decoration:none;

    border-radius:10px;

    font-weight:bold;
}

.menu-toggle{
    display:none;
}

.mobile-menu{
    display:none;
}

@media(max-width:768px){

    body{
        padding-top:60px;
    }

    /* NAVBAR */
    .navbar{
        height:60px;
        padding:0 15px;

        display:flex;
        justify-content:space-between;
        align-items:center;
    }

    .logo img{
        height:40px;
    }

    .nav-menu{
        display:none;
    }

    .menu-toggle{
        display:block;

        background:none;
        border:none;

        font-size:28px;
        cursor:pointer;
    }

    .nav-auth{
        display:none;
    }

    /* MOBILE MENU */
    .mobile-menu{
        display:none;

        position:fixed;
        top:60px;
        left:0;

        width:100%;

        background:white;

        box-shadow:0 5px 15px rgba(0,0,0,.15);

        z-index:9999;
    }

    .mobile-menu.show{
        display:block;
    }

    .mobile-menu a{
        display:block;

        padding:15px 20px;

        border-bottom:1px solid #eee;

        text-decoration:none;
        color:#333;
    }

    /* HERO */
    .hero{
        position:relative;

        height:auto;
        min-height:auto;

        padding:20px 10px 30px;

        display:flex;
        align-items:center;
        justify-content:center;
    }

    .hero-search input,
    .hero-search select{
        width:100%;
        height:50px;

        font-size:15px;
    }

    .hero-content{
        margin-top: 0;
        width:100%;
        padding:0 10px;
        box-sizing:border-box;
    }

    .hero h2{
        font-size:34px;
        line-height:1.1;
        margin-bottom:10px;
    }

    .hero-content{
        max-width:320px;
        margin:auto;
    }

    .hero-subtitle{
        font-size:15px;
        margin-bottom:20px;
    }

    /* SEARCH */
    .hero-search{
        width:100%;
        max-width:300px;
        margin:auto;

        display:grid;
        grid-template-columns:1fr;

        gap:10px;
        padding:12px;
    }

    .hero-search,
    .hero-search *{
        box-sizing:border-box;
    }

    .hero-search button{
        width:100%;
        height:48px;
        font-size:16px;
        white-space:nowrap;
    }

    .search-field label{
        font-size:14px;
        margin-bottom:6px;
    }

    /* FACILITIES */
    .box{
        width:90%;
        max-width:300px;
    }

    /* ABOUT */
    #about{
        max-width:1100px;
        margin:50px auto;
        text-align:center;
        background:#f8fafc;
        border-radius:20px;
        padding:60px;
    }

    #about h2{
        font-size:36px;
        margin-bottom:25px;
        color:#222;
    }

    #about p{
        font-size:18px;
        line-height:1.8;
        color:#555;
        max-width:800px;
        margin:20px auto;
    }

    #facilities{
        background:#f8fafc;
    }

    #about strong{
        color:#222;
    }

    .mobile-logout{
        width:100%;
        padding:15px 20px;

        border:none;
        background:none;

        text-align:left;

        font-size:16px;
        cursor:pointer;
    }

}
/*
*{
    outline:1px solid red;
}
    */

</style>

<body>

   <!-- NAVBAR -->
    <div class="navbar">

        <div class="logo">
            <img src="/photo/new logo.jpeg">
        </div>

        <button class="menu-toggle" onclick="toggleMenu()">
            ☰
        </button>

        <div class="nav-menu">
            <a href="/home#home">Home</a>
            <a href="/rooms">Rooms</a>
            <a href="javascript:void(0)" onclick="openContactModal()">
                Contact Us
            </a>
        </div>

        <div class="nav-auth desktop-auth">

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

                <form action="/logout" method="POST">
                    @csrf
                    <button class="signup-btn">Logout</button>
                </form>

            @else

                <a href="/login" class="login-btn">Log in</a>
                <a href="/register" class="signup-btn">Sign up</a>

            @endauth

        </div>

    </div>

    <div id="mobileMenu" class="mobile-menu">

    <a href="/home#home">Home</a>
    <a href="/rooms">Rooms</a>

    <a href="javascript:void(0)" onclick="openContactModal()">
        Contact Us
    </a>

    @guest
        <a href="/login">Login</a>
        <a href="/register">Sign Up</a>
    @endguest

    @auth
        <a href="/profile">Profile</a>

        <form action="/logout" method="POST">
            @csrf
            <button type="submit" class="mobile-logout">
                Logout
            </button>
        </form>
    @endauth

</div>

<!-- PAGE CONTENT -->
@yield('content')

<!-- FOOTER -->
<div class="footer">
    © 2026 StayEase Hotel
</div>

<div id="contactModal" class="contact-modal">

    <div class="contact-modal-content">

        <span class="close-modal"
              onclick="closeContactModal()">
            &times;
        </span>

        <h2>Contact Customer Service</h2>

        <p>📞 0812-3456-7890</p>

        <p>✉ stayease@gmail.com</p>

        <p>📍 Batam, Indonesia</p>

        <div class="contact-buttons">

            <a href="https://wa.me/6281234567890"
               target="_blank"
               class="wa-btn">
                WhatsApp
            </a>

        </div>

    </div>

</div>

<script>

function openContactModal() {
    document.getElementById('contactModal').style.display = 'flex';
}

function closeContactModal() {
    document.getElementById('contactModal').style.display = 'none';
}

window.addEventListener('click', function(event) {

    const modal = document.getElementById('contactModal');

    if(event.target === modal){
        modal.style.display = 'none';
    }

});

function toggleMenu(){

    const menu =
        document.getElementById('mobileMenu');

    if(menu.style.display === 'flex'){
        menu.style.display = 'none';
    }else{
        menu.style.display = 'flex';
    }

}

function toggleMenu() {
    document
        .getElementById('mobileMenu')
        .classList.toggle('show');
}


</script>
</body>
</html>