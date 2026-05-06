<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>

    <style>
        body {
            margin: 0;
            font-family: Arial;
            background: #f4f6f9;
            display: flex;
        }

        /* SIDEBAR */
        .sidebar {
            width: 240px;
            height: 100vh;
            background: #1e293b;
            color: white;
            padding: 20px;
            box-sizing: border-box;
        }

        .sidebar h2 {
            margin-bottom: 30px;
            font-size: 22px;
        }

        .sidebar a {
           display: block;
           padding: 12px 15px;
           border-radius: 10px;
           color: #cbd5e1;
           text-decoration: none;
           margin-bottom: 10px;
           transition: 0.3s;
        }

        .sidebar a:hover {
            background: #334155;
            color: white;
        }

        .sidebar a.active {
            background: #3b82f6;
            color: white;
            font-weight: bold;
        }

         /* LOGOUT BUTTON */
        .menu-link {
            width: 100%;
            text-align: left;
            padding: 12px 15px;
            border-radius: 10px;
            background: none;
            border: none;
            color: #cbd5e1;
            cursor: pointer;
            margin-bottom: 10px;
            font-size: 14px;
        }

        .menu-link:hover {
            background: #334155;
            color: white;
        }

        /* MAIN */
        .main {
              flex: 1; /* isi sisa layar */
              padding: 30px;
        }

        .topbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
        }

        .topbar h2 {
            margin: 0;
        }

        .badge {
            background: #e5e7eb;
            padding: 6px 14px;
            border-radius: 20px;
        }

        /* CARDS */
        .cards {
            display: flex;
            gap: 20px;
        margin-bottom: 30px;
        }

        .card {
            flex: 1;
            padding: 20px;
            border-radius: 12px;
            color: white;
        }

        .card h1 {
            margin: 10px 0 0;
        }

        .blue { background: #3b82f6; }
        .green { background: #10b981; }
        .orange { background: #f59e0b; }

        /* TABLE */
        .table-box {
            background: white;
            padding: 20px;
            border-radius: 12px;
        }

        .table-box h3 {
            margin-bottom: 15px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 12px;
            text-align: left;
        }

        th {
            background: #f1f5f9;
        }

        tr {
            border-bottom: 1px solid #ddd;
        }

        /* STATUS */
        .status {
            padding: 5px 10px;
            border-radius: 10px;
            font-size: 12px;
        }

        .confirmed {
            background: #d1fae5;
            color: #065f46;
        }

        .pending {
            background: #fef3c7;
            color: #92400e;
    }
    </style>
</head>
<body>

<!-- SIDEBAR -->
@auth
<div class="sidebar">
    <h2>Admin</h2>

    <a href="/dashboard" class="{{ request()->is('dashboard*') ? 'active' : '' }}">Dashboard</a>
    <a href="/user" class="{{ request()->is('user*') ? 'active' : '' }}">Data User</a>
    <a href="/kamar" class="{{ request()->is('kamar*') ? 'active' : '' }}">Kamar</a>
    <a href="/booking" class="{{ request()->is('booking*') ? 'active' : '' }}">Booking</a>
    <a href="/laporan" class="{{ request()->is('laporan*') ? 'active' : '' }}">Laporan</a>

    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit" class="menu-link">Logout</button>
    </form>
</div>
@endauth

<!-- MAIN -->
<div class="main">

    <!-- HEADER -->
    <div class="topbar">
        <h2>@yield('title')</h2>
        <span class="badge">Admin</span>
    </div>

    <!-- CONTENT -->
    @yield('content')

</div>

</body>
</html>