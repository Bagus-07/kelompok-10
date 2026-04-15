<!DOCTYPE html>
<html>
<head>
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
    </style>
</head>
<body>

    <!-- SIDEBAR -->
    <div class="sidebar">
        <h2>StayEase</h2>

        <a onclick="showSection('dashboard')">Dashboard</a>
        <a onclick="showSection('tipe')">Tipe Kamar</a>
        <a onclick="showSection('kamar')">Data Kamar</a>
        <a onclick="showSection('reservasi')">Reservasi</a>
        <a onclick="showSection('laporan')">Laporan</a>
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

    </div>

    <script>
        function showSection(sectionId){
            let sections = document.querySelectorAll('.section');

            sections.forEach(function(section){
                section.classList.remove('active');
            });

            document.getElementById(sectionId).classList.add('active');
        }
    </script>

</body>
</html>