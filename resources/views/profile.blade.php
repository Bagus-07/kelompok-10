<!DOCTYPE html>
<html>
<head>
    <title>Profile - StayEase</title>
    <style>
        body {
            font-family: Arial;
            margin: 0;
        }

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

        .profile-container {
            padding: 40px;
            text-align: center;
        }

        .profile-card {
            width: 300px;
            margin: auto;
            padding: 20px;
            background: #eee;
        }

        .dropdown {
            position: relative;
            display: inline-block;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            right: 0;
            background: #ddd;
            padding: 10px;
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }
    </style>
</head>
<body>

<!-- NAVBAR -->
<div class="navbar">
    <div><b>StayEase LOGO</b></div>
    <div>
        <a href="/home">Home</a>
        <a href="#">Rooms</a>
        <a href="/contact">Contact</a>

        <!-- PROFILE DROPDOWN -->
        <div class="dropdown">
            <span style="cursor:pointer;">User Name ⬇</span>
            <div class="dropdown-content">
                <p>Profile</p>
                <p>Edit Profile</p>
                <p>Purchase History</p>
                <p>Logout</p>
            </div>
        </div>
    </div>
</div>

<!-- PROFILE CONTENT -->
<div class="profile-container">
    <h2>My Profile</h2>

    <div class="profile-card">
        <p><b>Name:</b> John Doe</p>
        <p><b>Email:</b> johndoe@gmail.com</p>
        <p><b>Phone:</b> 08123456789</p>
    </div>
</div>

</body>
</html>
