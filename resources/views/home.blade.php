<!DOCTYPE html>
<html>
<head>
    <title>StayEase Hotel</title>
    <style>
        body {
            font-family: Arial;
            margin: 0;
        }

        /* NAVBAR */
        .navbar {
            display: flex;
            justify-content: space-between;
            background: #333;
            color: white;
            padding: 15px;
        }

        .navbar a {
            color: white;
            margin-left: 15px;
            text-decoration: none;
        }

        /* HERO */
        .hero {
            background: #ccc;
            text-align: center;
            padding: 100px 20px;
        }

        .hero button {
            padding: 10px 20px;
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
            background: #ddd;
        }

        /* FOOTER */
        .footer {
            background: #eee;
            padding: 30px;
            text-align: center;
        }
    </style>
</head>
<body>

<!-- NAVBAR -->
<div class="navbar">
    <div><b>StayEase LOGO</b></div>
    <div>
        <a href="#home">Home</a>
        <a href="#about">About</a>
        <a href="#contact">Contact</a>
        <a href="#">Log In</a>
        <a href="#">Sign In</a>
    </div>
</div>

<!-- HOME -->
<div class="hero" id="home">
    <h2>WELCOME TO STAYEASE HOTEL</h2>
    <button>Explore Rooms</button>
</div>

<!-- PROMOTION -->
<div class="section">
    <h3>PROMOTIONS BANNER</h3>
</div>

<!-- ROOMS -->
<div class="section">
    <h3>OUR ROOMS</h3>
    <div class="grid">
        <div class="box"></div>
        <div class="box"></div>
        <div class="box"></div>
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

<!-- CONTACT -->
<div class="section" id="contact">
    <h3>CONTACT US</h3>
    <p>Email: stayease@gmail.com</p>
    <p>Phone: 08123456789</p>
</div>

<!-- FOOTER -->
<div class="footer">
    <p>© 2026 StayEase Hotel</p>
</div>

</body>
</html>