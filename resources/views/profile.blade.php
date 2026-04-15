<!DOCTYPE html>
<html>
<head>
    <title>Profile - StayEase</title>
    <style>
        body {
            font-family: Arial;
            margin: 0;
            background: #f4f4f4;
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

        /* CONTAINER */
        .container {
            padding: 40px;
        }

        .card {
            background: white;
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 10px;
        }

        .btn {
            padding: 8px 15px;
            background: #333;
            color: white;
            border: none;
            cursor: pointer;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table, th, td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: left;
        }
    </style>
</head>
<body>

<!-- NAVBAR -->
<div class="navbar">
    <div><b>StayEase</b></div>
    <div>
        <a href="/home">Home</a>
        <a href="/profile">Profile</a>
    </div>
</div>

<div class="container">

    <!-- PROFILE INFO -->
    <div class="card">
        <h2>My Profile</h2>
        <p><b>Name:</b> John Doe</p>
        <p><b>Email:</b> johndoe@gmail.com</p>
        <p><b>Phone:</b> 08123456789</p>

        <button class="btn">Edit Profile</button>
    </div>

    <!-- PURCHASE HISTORY -->
    <div class="card">
        <h2>Purchase History</h2>

        <table>
            <tr>
                <th>No</th>
                <th>Room</th>
                <th>Date</th>
                <th>Status</th>
            </tr>

            <tr>
                <td>1</td>
                <td>Deluxe Room</td>
                <td>12 March 2026</td>
                <td>Completed</td>
            </tr>

            <tr>
                <td>2</td>
                <td>Suite Room</td>
                <td>20 March 2026</td>
                <td>Pending</td>
            </tr>

        </table>
    </div>

</div>

</body>
</html>