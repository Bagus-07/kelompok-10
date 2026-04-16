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

        /* ROOM CARD */
        .room-card {
            width: 220px;
            padding: 20px;
            background: #ddd;
            cursor: pointer;
            border-radius: 8px;
        }

        /* MODAL */
        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background: rgba(0,0,0,0.5);
        }

        .modal-content {
            background: white;
            width: 400px;
            margin: 100px auto;
            padding: 20px;
            text-align: center;
            border-radius: 10px;
        }

        .modal-content img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .close {
            float: right;
            font-size: 24px;
            cursor: pointer;
        }

        .booking-btn {
            padding: 10px 20px;
            background: #333;
            color: white;
            border: none;
            cursor: pointer;
            margin-top: 10px;
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
        <a href="/login">Log In</a>
        <a href="/register">Sign In</a>
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