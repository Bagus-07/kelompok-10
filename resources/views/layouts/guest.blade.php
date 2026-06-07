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

@media(max-width:992px){

    .hero{
        height:auto;
        min-height:unset;

        padding:30px 15px;
    }

    .hero-content{
        margin-top:40px;
    }

    .hero h2{
        font-size:40px;
        line-height:1.1;
    }

    .hero-subtitle{
        font-size:16px;
        margin-bottom:20px;
    }

    .hero-search{
        display:grid;

        grid-template-columns:1fr 1fr;

        gap:12px;

        padding:18px;

        max-width:95%;

        margin:auto;

        border-radius:16px;
    }

    .hero-search input,
    .hero-search select{
        height:50px;
        font-size:14px;
    }
    
    .hero-search button{
        grid-column:1 / -1;

        height:50px;

        margin-top:5px;
    }

}

@media(max-width:768px){

    body{
        padding-top:60px;
    }

    .navbar{
        padding:0 10px;
        height:60px;
    }

    .logo img{
        height:40px;
    }

    .nav-menu{
        gap:12px;
    }

    .nav-menu a{
        font-size:12px;
    }

    .login-btn,
    .signup-btn{
        padding:6px 10px;
        font-size:11px;
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

    <div class="nav-menu">
        <a href="/home#home">Home</a>
        <a href="/home#facilities">Facilities</a>
        <a href="/home#about">About</a>
        <a href="javascript:void(0)" onclick="openContactModal()">
            Contact
        </a>
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

</script>
</body>
</html>