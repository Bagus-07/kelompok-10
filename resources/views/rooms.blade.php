<!DOCTYPE html>
<html>
<head>
    <title>Rooms - StayEase</title>

    <style>
        body { font-family: Arial; margin: 0; }

        .section { padding: 40px; text-align: center; }

        .grid {
            display: flex;
            gap: 20px;
            justify-content: center;
        }

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

<div class="section">
    <h2>OUR ROOMS</h2>

    <div class="grid">
        <div class="room-card" onclick="showRoom('Deluxe Room','Rp 500.000','Spacious room with king bed')">
            Deluxe Room
        </div>

        <div class="room-card" onclick="showRoom('Superior Room','Rp 350.000','Comfortable for couples')">
            Superior Room
        </div>

        <div class="room-card" onclick="showRoom('Standard Room','Rp 250.000','Affordable basic room')">
            Standard Room
        </div>
    </div>
</div>

<!-- MODAL -->
<div id="roomModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeModal()">&times;</span>

        <h2 id="roomTitle"></h2>
        <p id="roomPrice"></p>
        <p id="roomDesc"></p>

        <button class="booking-btn">Booking</button>
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