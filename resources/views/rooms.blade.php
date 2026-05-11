<!DOCTYPE html>
<html>
    <head>
        <title>
        Rooms - StayEase Hotel
    </title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>

        html {
            scroll-behavior: smooth;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #ffffff;
            padding-top: 90px;
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
        /* SEARCH */
        .search-container {
            display: flex;
            justify-content: center;
            margin-bottom: 40px;
        }

        .search-bar {
            width: 60%;
            padding: 15px 20px;
        
            border: none;
            border-radius: 30px;
        
            background: #f5f5f5;
        
            font-size: 16px;
        
            box-shadow: 0 4px 10px rgba(0,0,0,0.08);
        }

        /* room section */
        .rooms-container {
            width: 90%;
            margin: auto;

            display: flex;
            flex-direction: column;

            gap: 30px;

            padding-bottom: 80px;
        }

        /* ROOM CARD */
        .room-card {
            background: white;
        
            display: flex;
            align-items: center;
            justify-content: space-between;
        
            padding: 20px;
        
            border-radius: 20px;
        
            box-shadow: 0 6px 20px rgba(0,0,0,0.08);
        
            transition: 0.3s;
        }

        .room-image img {
            width: 220px;
            height: 150px;

            object-fit: cover;

            border-radius: 15px;
        }

        .room-card:hover {
             transform: translateY(-5px);
        }

        /* DETAILS */
        .room-details {
            flex: 1;
            margin-left: 30px;
        }

        .room-details h2 {
            margin-bottom: 10px;
            font-size: 28px;
            color: #222;
        }

        .room-details p {
            color: #666;
            line-height: 1.6;
            width: 85%;
        }

        /* STARS */
        .stars {
            margin-top: 15px;
            color: #E9C46A;
            font-size: 20px;
        }

        .price {
            color: #1d4ed8;
            font-size: 20px;
            font-weight: bold;
        }

        .room-price {
            text-align: right;
        }

        .room-price h3 {
            color: #444;
            margin-bottom: 20px;
        }

        .room-price button,
        .book-btn {
            border: none;
        
            padding: 12px 24px;
        
            border-radius: 30px;
        
            background: linear-gradient(45deg, #F4A261, #E9C46A);
        
            color: white;
        
            font-weight: bold;
        
            cursor: pointer;
        
            transition: 0.3s;
        }
        
        .room-price button:hover,
        .book-btn:hover {
            transform: scale(1.05);
        }

        /* modal */
        .modal {
            display: none;

            position: fixed;
            top: 0;
            left: 0;

            width: 100%;
            height: 100vh;

            background: rgba(0,0,0,0.6);

            justify-content: center;
            align-items: center;

            z-index: 99999;
        }

        .modal-content {
            width: 500px;
            max-width: 90%;

            background: white;

            border-radius: 20px;

            overflow: hidden;

            animation: popup 0.3s ease;
        }

        @keyframes popup {
            from {
                transform: scale(0.8);
                opacity: 0;
            }
            to {
                transform: scale(1);
                opacity: 1;
            }
        }

        .modal-content img {
            width: 100%;
            height: 260px;
            object-fit: cover;}

        .modal-body {
            padding: 25px;
        }

        .close {
            float: right;
            font-size: 28px;
            cursor: pointer;
        }

        .book-btn {
            background: #1d4ed8;
            color: white;
            border: none;
            padding: 12px 25px;
            border-radius: 8px;
            cursor: pointer;
            font-size: 16px;
            margin-top: 15px;
        }

        .book-btn:hover {
            background: #2563eb;
        }

        /* CONTACT */
.contact {
    background: #1f2937;
    color: white;

    padding: 50px;
    text-align: center;
}

.contact h2 {
    margin-bottom: 20px;
}

/* FOOTER */
.footer {
    background: #e5e7eb;
    padding: 18px;
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
        <a href="/home">Home</a>
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

    <!-- SEARCH -->
    <div class="search-container">
        <input type="text" id="searchInput" class="search-bar" placeholder="Search rooms...">
    </div>

    <div class="rooms-container">

    <!-- ROOM CARD -->
    <div class="room-card"
     data-name="Deluxe Room"
     data-price="IDR 999999 / NIGHT"
     data-desc="Luxury room with king-sized bed and sea view."
     data-img="https://images.unsplash.com/photo-1566073771259-6a8506099945">

        <!-- IMAGE -->
        <div class="room-image">
            <img src="https://images.unsplash.com/photo-1566073771259-6a8506099945">
        </div>

        <!-- ROOM INFO -->
        <div class="room-details">
            <h2>Deluxe Room</h2>

            <p>
                Luxury room with king-sized bed,
                sea view, free breakfast,
                and premium facilities.
            </p>

            <div class="stars">
                ★ ★ ★ ★ ★
            </div>
        </div>

        <!-- PRICE -->
        <div class="room-price">
            <h3>IDR 999999 / NIGHT</h3>

            <button>
                BOOK NOW
            </button>
        </div>

    </div>


    <!-- SECOND ROOM -->
    <div class="room-card"
     data-name="Family Suite"
     data-price="IDR 799999 / NIGHT"
     data-desc="Perfect for family vacation
                with spacious living area
                and modern interior."
     data-img="https://images.unsplash.com/photo-1582719508461-905c673771fd">

        <div class="room-image">
            <img src="https://images.unsplash.com/photo-1582719508461-905c673771fd">
        </div>

        <div class="room-details">
            <h2>Family Suite</h2>

            <p>
                Perfect for family vacation
                with spacious living area
                and modern interior.
            </p>

            <div class="stars">
                ★ ★ ★ ★ ★
            </div>
        </div>

        <div class="room-price">
            <h3>IDR 799999 / NIGHT</h3>

            <button>
                BOOK NOW
            </button>
        </div>

    </div>

</div>
    
    <!-- MODAL -->
    <div class="modal" id="roomModal">
        <div class="modal-content">

            <img id="modalImg" src="">

            <div class="modal-body">
                <span class="close">&times;</span>

                <h2 id="modalTitle"></h2>
                <p id="modalDesc"></p>
                <h3 id="modalPrice"></h3>

                <a href="{{ route('payment') }}">
                    <button class="book-btn">Book Now</button>
                </a>
            </div>
        </div>
    </div>

    <!-- CONTACT -->
<div class="contact" id="contact">
    <h2>Contact Us</h2>

    <p>Email: stayease@gmail.com</p>
    <p>Phone Number: 08123456789</p>
    <p>Address: Batam, Indonesia</p>
</div>

<!-- FOOTER -->
<div class="footer">
    © 2026 StayEase Hotel
</div>

    <script>
            // SEARCH FUNCTION
    const searchInput = document.getElementById('searchInput');
    const roomCards = document.querySelectorAll('.room-card');

    searchInput.addEventListener('keyup', function() {
        let value = this.value.toLowerCase();

        roomCards.forEach(card => {
            let roomName = card.dataset.name.toLowerCase();

            if(roomName.includes(value)) {
                card.style.display = 'block';
            } else {
                card.style.display = 'none';
            }
        });
    });

        // MODAL FUNCTION
    const modal = document.getElementById('roomModal');
    const modalImg = document.getElementById('modalImg');
    const modalTitle = document.getElementById('modalTitle');
    const modalDesc = document.getElementById('modalDesc');
    const modalPrice = document.getElementById('modalPrice');
    const closeBtn = document.querySelector('.close');

    roomCards.forEach(card => {
        card.addEventListener('click', () => {
            modal.style.display = 'flex';

            modalImg.src = card.dataset.img;
            modalTitle.innerText = card.dataset.name;
            modalDesc.innerText = card.dataset.desc;
            modalPrice.innerText = card.dataset.price;
        });
    });

        closeBtn.onclick = function() {
        modal.style.display = 'none';
    }

    window.onclick = function(event) {
        if(event.target == modal) {
            modal.style.display = 'none';
        }
    }
    </script>
    </body>
    

</html>