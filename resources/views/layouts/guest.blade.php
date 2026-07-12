<!DOCTYPE html>
<html>
<head>
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
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

/*new*/
.profile-menu{

    display:none;

    position:absolute;

    right:0;
    top:75px;

    width:180px;

    background:white;

    border-radius:15px;

    box-shadow:0 10px 25px rgba(0,0,0,.2);

    overflow:hidden;

    z-index:10000;
}

.profile-menu.show{
    display:block;
}

.profile-menu a,
.profile-menu button{

    display:block;

    width:100%;

    padding:12px;

    background:none;

    border:none;

    text-align:left;

    text-decoration:none;

    color:#333;

    cursor:pointer;
}

.profile-menu a:hover,
.profile-menu button:hover{
    background:#f5f5f5;
}


.profile-icon{
    border:none;
    background:none;
    cursor:pointer;
}

.profile-avatar{
    width:55px;
    height:55px;
    border-radius:50%;
    object-fit:cover;
    cursor:pointer;
}


.profile-icon img{
    width:55px;
    height:55px;
    border-radius:50%;
    object-fit:cover;
}


.profile-dropdown{
    position:relative;
}


.profile-dropdown.show{
    display:block;
}


.profile-dropdown a,
.profile-dropdown button{

    display:block;

    width:100%;

    padding:12px;

    background:none;

    border:none;

    text-align:left;

    text-decoration:none;

    color:#333;

    cursor:pointer;

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

.dark-mode .review-card{
    background:#1e293b;
    color:white;
}

.dark-mode .reviews-section{
    background:#111827;
}

.dark-mode #reviews{
    background:#0f172a;
}

.dark-mode #reviews .bg-white{
    background:#1e293b !important;
    color:white !important;
}

.dark-mode #reviews .bg-gray-50{
    background:#0f172a !important;
}

.dark-mode #reviews .text-gray-800{
    color:white !important;
}

.dark-mode #reviews .text-gray-600{
    color:#cbd5e1 !important;
}

.dark-mode #reviews .text-gray-500{
    color:#94a3b8 !important;
}

.dark-mode #reviews .text-gray-400{
    color:#94a3b8 !important;
}

.dark-mode #reviews textarea,
.dark-mode #reviews select{
    background:#334155;
    color:white;
    border:1px solid #475569;
}

.dark-mode #reviews textarea::placeholder{
    color:#cbd5e1;
}

.dark-mode .nav-menu a{
    color:white;
}

.dark-mode .nav-menu a:hover{
    color:#fbbf24;
}

.dark-mode .box{
    background:#1e293b;
}

.dark-mode .box p{
    color:white;
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

    align-items:end; /* <-- ADD THIS */
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




/*new*/
.dark-mode .hero-search input,
.dark-mode .hero-search select{
    background:#334155;
    color:white;
    border:1px solid #475569;
}

.dark-mode .hero-search{
    background:#1e293b;
}

.dark-mode .search-field label{
    color:#f8fafc;
}

.dark-mode .search-field small{
    color:#cbd5e1;
}

.hero-search button{
    width:100%;
    height:55px;

    margin:0 0 22px 0; /* pushes it down to line up with the inputs */

    display:flex;
    justify-content:center;
    align-items:center;

    border:none;
    border-radius:14px;

    background:linear-gradient(45deg,#F4A261,#E9C46A);

    color:white;
    font-size:18px;
    font-weight:700;

    cursor:pointer;
    transition:.25s;
}

.hero-search button:hover{
    transform:translateY(-2px);
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
    width:100%;
    height:55px;
    padding:0 16px;
    border:1px solid #ddd;
    border-radius:14px;
    background:#fff;
    color:#333;
    font-size:16px;
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

.contact-buttons{
    display:flex;
    justify-content:center;
    gap:25px;
    margin-top:35px;
}

.contact-buttons a{
    font-size:40px;     
    color:#000;
    transition:0.3s;
}

.contact-buttons a:hover{
    transform:scale(1.2);
}

.contact-buttons .whatsapp i{
    color:#25D366 !important;
}

.contact-buttons .instagram i{
    color:#E1306C !important;
}

.contact-buttons .facebook i{
    color:#1877F2 !important;
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

.dark-mode .contact-modal-content{
    background:#1e293b;
    color:#f8fafc;
}

.dark-mode .contact-modal-content h2{
    color:#f8fafc;
}

.dark-mode .contact-modal-content p{
    color:#cbd5e1;
}

.dark-mode .close-modal{
    color:white;
}

.dark-mode .wa-btn{
    background:#25D366;
    color:white;
}

.dark-mode .contact-modal{
    background:rgba(0,0,0,.8);
}

/*new modal*/
.settings-modal{
    display:none;

    position:fixed;
    inset:0;

    background:rgba(0,0,0,.5);

    z-index:10000;

    justify-content:center;
    align-items:center;
}

.settings-content{

    background:white;

    width:400px;
    max-width:90%;

    padding:30px;

    border-radius:20px;

    position:relative;
}

.close-settings{
    position:absolute;

    top:15px;
    right:20px;

    font-size:28px;

    cursor:pointer;
}

.settings-content h2{
    margin-top:0;
}

.settings-content button{
    width:100%;

    margin-top:10px;

    padding:12px;

    border:none;

    border-radius:10px;

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

.dark-mode{
    background:#0f172a;
    color:#f8fafc;
}

.dark-mode .navbar{
    background:rgba(15,23,42,0.95);
}

.dark-mode .box{
    background:#222;
    color:white;
}

.dark-mode .footer{
    background:#1e1e1e;
    color:white;
}

.dark-mode #about{
    background:#0f172a;
    color:#f8fafc;
}

.dark-mode .profile-card,
.dark-mode .box,
.dark-mode .settings-content{
    background:#1e293b;
}

.dark-mode p{
    color:#cbd5e1;
}

.dark-mode #languageSelect{
    background:#334155;
    color:white;
    border:1px solid #475569;
}

.dark-mode select{
    background:#334155;
    color:white;
    border:1px solid #475569;
}

.dark-mode input:not([type="date"]),
.dark-mode textarea,
.dark-mode select{
    background:#334155;
    color:white;
}

.dark-mode .settings-content{
    background:#1e293b;
    color:white;
}

.dark-mode .settings-content h2,
.dark-mode .settings-content h3{
    color:white;
}

.dark-mode .settings-content hr{
    border-color:#475569;
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
    .grid{
        display:flex !important;
        flex-wrap:nowrap !important;
        justify-content:flex-start !important;

        overflow-x:auto !important;
        overflow-y:hidden;

        gap:15px;
        padding:10px 15px;

        -webkit-overflow-scrolling:touch;
    }

    .grid::-webkit-scrollbar{
        display:none;
    }

    .box{
        flex:0 0 260px !important;
        width:auto !important;
        max-width:none !important;
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

    /* MOBILE MENU DARK MODE */

.dark-mode .mobile-menu{
    background:#1e293b;
}

.dark-mode .mobile-menu a{
    color:white;
    border-bottom:1px solid #475569;
}

.dark-mode .mobile-logout{
    color:white;
    background:#1e293b;
}

/* SETTINGS MODAL DARK MODE */

.dark-mode .settings-content{
    background:#1e293b;
    color:white;
}

.dark-mode .settings-content h2,
.dark-mode .settings-content h3{
    color:white;
}

.dark-mode .settings-content select{
    background:#334155;
    color:white;
    border:1px solid #475569;
}

.dark-mode .settings-content option{
    background:#334155;
    color:white;
}

.dark-mode .settings-content hr{
    border-color:#475569;
}

/* CONTACT MODAL DARK MODE */

.dark-mode .contact-modal-content{
    background:#1e293b;
    color:white;
}

.dark-mode .contact-modal-content h2{
    color:white;
}

.dark-mode .contact-modal-content p{
    color:#e2e8f0;
}

.dark-mode .close-modal{
    color:white;
}

/* MOBILE NAVBAR */

.dark-mode .navbar{
    background:rgba(15,23,42,0.9);
}

.dark-mode .navbar a{
    color:white;
}

.dark-mode .menu-toggle{
    color:white;
    background:none;
}

/* FOOTER */

.dark-mode .footer{
    background:#0f172a;
    color:white;
    border-top:1px solid #334155;
}

/* FACILITIES DARK MODE */

.dark-mode #facilities{
    background:#0f172a;
}

.dark-mode #facilities h2{
    color:white;
}

.dark-mode .box{
    background:#1e293b;
}

.dark-mode .box p{
    color:white;
}

.dark-mode #facilities h2,
.dark-mode #about h2,
.dark-mode #reviews h3{
    color:white;
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

            <div class="profile-dropdown">
            
                <img
                    src="{{ auth()->user()->profile_photo
                        ? asset('uploads/' . auth()->user()->profile_photo)
                        : '/photo/user-icon.png' }}"
                    class="profile-avatar"
                    onclick="toggleProfileMenu()"
                >
            
                <div id="profileMenu" class="profile-menu">
                
                    <a href="/profile">Profile</a>
                
                    <a href="#" onclick="openSettingsModal()">
                        Settings
                    </a>
                
                    <form action="/logout" method="POST">
                        @csrf
                        <button type="submit">
                            Logout
                        </button>
                    </form>
                
                </div>
            
            </div>
        
            @else
        
            <a href="/login" class="login-btn">
                Log in
            </a>
        
            <a href="/register" class="signup-btn">
                Sign up
            </a>
        
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

        <a href="javascript:void(0)"
           onclick="toggleMenu(); openSettingsModal();">
            Settings
        </a>

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
            <a href="https://wa.me/6281234567890" target="_blank" class="whatsapp">
                <i class="fab fa-whatsapp"></i>
            </a>
        
            <a href="https://instagram.com/yourhotel" target="_blank" class="instagram">
                <i class="fab fa-instagram"></i>
            </a>
        
            <a href="https://facebook.com/yourhotel" target="_blank" class="facebook">
                <i class="fab fa-facebook-f"></i>
            </a>
        </div>
    </div>

</div>

<script>
function toggleProfileMenu(){
    document
        .getElementById("profileMenu")
        .classList.toggle("show");
}

function openSettingsModal(){
    document.getElementById('settingsModal').style.display = 'flex';
}

function closeSettingsModal(){
    document.getElementById('settingsModal').style.display = 'none';
}

function setTheme(theme){

    if(theme === 'dark'){
        document.body.classList.add('dark-mode');
    }else{
        document.body.classList.remove('dark-mode');
    }

    localStorage.setItem('theme', theme);
}

window.addEventListener('load', function(){

    const savedTheme =
        localStorage.getItem('theme');

    if(savedTheme === 'dark'){
        document.body.classList.add('dark-mode');
    }

});


function changeLanguage(url){
    window.location.href = url;
}

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



function toggleMenu() {
    document
        .getElementById('mobileMenu')
        .classList.toggle('show');
}


</script>

<div id="settingsModal" class="settings-modal">

    <div class="settings-content">

        <span class="close-settings"
              onclick="closeSettingsModal()">
            &times;
        </span>

        <h2>Settings</h2>

        <hr>

       <h3>Language</h3>

            <select onchange="changeLanguage(this.value)">
                <option value="/language/en"
                    {{ app()->getLocale() == 'en' ? 'selected' : '' }}>
                    English
                </option>
            
                <option value="/language/id"
                    {{ app()->getLocale() == 'id' ? 'selected' : '' }}>
                    Indonesia
                </option>
            </select>

        <hr>

        <h3>Theme</h3>

        <button onclick="setTheme('light')">
            ☀ Light Mode
        </button>

        <button onclick="setTheme('dark')">
            🌙 Dark Mode
        </button>

    </div>

</div>
</body>
</html>