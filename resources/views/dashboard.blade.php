<!DOCTYPE html>
<html>
<head>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>StayEase Admin Dashboard</title>
    <style>
        body{
            margin:0;
            font-family: Arial, sans-serif;
            display:flex;
        }

        /* SIDEBAR */
        .sidebar{
            width:220px;
            height:100vh;
            background:#2c2c2c;
            color:white;
            padding:20px;
            box-sizing:border-box;
        }

        .sidebar h2{
            text-align:center;
            margin-bottom:30px;
        }

        .sidebar a{
            display:block;
            color:white;
            text-decoration:none;
            padding:12px;
            margin:8px 0;
            border-radius:6px;
            cursor:pointer;
        }

        .sidebar a:hover{
            background:#444;
        }

        /* CONTENT */
        .content{
            flex:1;
            padding:30px;
            background:#f5f5f5;
        }

        .section{
            display:none;
        }

        .active{
            display:block;
        }

        .card-container{
            display:flex;
            gap:20px;
            margin-top:20px;
            flex-wrap:wrap;
        }

        .card{
            width:200px;
            background:white;
            padding:20px;
            border-radius:10px;
            box-shadow:0 2px 5px rgba(0,0,0,0.1);
            text-align:center;
        }

        table{
            width:100%;
            border-collapse:collapse;
            margin-top:20px;
            background:white;
        }

        th, td{
            border:1px solid #ddd;
            padding:10px;
            text-align:center;
        }

        th{
            background:#333;
            color:white;
        }
        /* LOGOUT MODAL */
        .logout-modal {
            display: none;
            position: fixed;
            z-index: 2000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background: rgba(0,0,0,0.5);
        }

        .logout-box {
            background: white;
            width: 300px;
            margin: 150px auto;
            padding: 20px;
            border-radius: 10px;
            text-align: center;
        }

        .logout-box button {
            padding: 8px 15px;
            margin: 10px;
            border: none;
            cursor: pointer;
        }

        .btn-yes {
            background: #e74c3c;
            color: white;
        }

        .btn-no {
            background: #ccc;
        }
    </style>
</head>
<body>

    <!-- SIDEBAR -->
    <div class="bg-gray-900 text-white w-60 h-screen p-4">
        <h2 class="text-xl font-bold mb-6">StayEase</h2>
        <a class="block py-2 hover:bg-gray-700 rounded">Dashboard</a>
        <a class="block py-2 hover:bg-gray-700 rounded">Tipe Kamar</a>
        <a class="block py-2 hover:bg-gray-700 rounded">Data Kamar</a>
        <a class="block py-2 hover:bg-gray-700 rounded">Reservasi</a>
        <a class="block py-2 hover:bg-gray-700 rounded"</a>
        <button data-modal-target="logoutModal" data-modal-toggle="logoutModal"class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded mt-4 w-full">Logout</button>
    </div>

    <!-- CONTENT -->
    <div class="content">

        <!-- DASHBOARD -->
        <div id="dashboard" class="section active">
            <h1>Dashboard Admin</h1>

            <div class="card-container">
                <div class="card">
                    <h3>Kamar Tersedia</h3>
                    <p>20</p>
                </div>

                <div class="card">
                    <h3>Total Kamar</h3>
                    <p>20</p>
                </div>

                <div class="card">
                    <h3>Booking Hari Ini</h3>
                    <p>5</p>
                </div>
            </div>
        </div>

        <!-- TIPE KAMAR -->
        <div id="tipe" class="section">
            <h1>Tipe Kamar</h1>

            <table>
                <tr>
                    <th>ID</th>
                    <th>Tipe</th>
                    <th>Harga</th>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Deluxe</td>
                    <td>Rp 500.000</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Superior</td>
                    <td>Rp 350.000</td>
                </tr>
            </table>
        </div>

        <!-- DATA KAMAR -->
        <div id="kamar" class="section">
            <h1>Data Kamar</h1>

            <table>
                <tr>
                    <th>No Kamar</th>
                    <th>Tipe</th>
                    <th>Status</th>
                </tr>
                <tr>
                    <td>101</td>
                    <td>Deluxe</td>
                    <td>Tersedia</td>
                </tr>
                <tr>
                    <td>102</td>
                    <td>Superior</td>
                    <td>Dipesan</td>
                </tr>
            </table>
        </div>

        <!-- RESERVASI -->
        <div id="reservasi" class="section">
            <h1>Reservasi</h1>
            <p>Bagian ini masih dalam tahap pengembangan.</p>
        </div>

        <!-- LAPORAN -->
        <div id="laporan" class="section">
            <h1>Laporan</h1>
            <p>Bagian laporan akan dibuat pada tahap selanjutnya.</p>
        </div>
        <!-- LOGOUT POPUP -->
        <div id="logoutModal" tabindex="-1" class="hidden fixed top-0 left-0 right-0 z-50 justify-center items-center w-full h-full bg-black bg-opacity-50 flex">
            <div class="bg-white rounded-lg shadow p-6 w-full max-w-md text-center">

                <h3 class="text-lg font-semibold mb-4">Konfirmasi Logout</h3>
                <p class="mb-6">Apakah Anda yakin ingin keluar?</p>

                <button onclick="logout()" class="bg-red-600 text-white px-4 py-2 rounded mr-2">
                    Ya
                </button>

                <button data-modal-hide="logoutModal" class="bg-gray-300 px-4 py-2 rounded">
                    Batal
                </button>

            </div>
        </div>

    <script>
        // TAMPILKAN USERNAME
        let username = localStorage.getItem("adminUsername");
        if(username) {
            document.getElementById("adminName").innerText = "Admin: " + username;
        } else {
            document.getElementById("adminName").innerText = "Admin: Guest";
        }

        function showSection(sectionId){
            let sections = document.querySelectorAll('.section');

            sections.forEach(function(section){
                section.classList.remove('active');
            });

            document.getElementById(sectionId).classList.add('active');
        }

        function openLogoutModal() {
            document.getElementById('logoutModal').style.display = 'block';
        }

        function closeLogoutModal() {
            document.getElementById('logoutModal').style.display = 'none';
        }

        function logout() {
            localStorage.removeItem("adminUsername");
            window.location.href = "/login-admin";
        }

    </script>

</body>
</html>