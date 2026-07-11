<!DOCTYPE html>
<html>
<head>
    <title>@yield('title')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <style>

        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
            font-family:'Poppins', sans-serif;
        }

        body{
            background:#f4f7fe;
            display:flex;
        }

        /* SIDEBAR */

        .sidebar{
            width:270px;
            height:100vh;
            background:linear-gradient(180deg,#0f172a,#1e293b);
            color:white;
            padding:30px 20px;
            position:fixed;
            left:0;
            top:0;
            display:flex;
            flex-direction:column;
        }

        .sidebar-menu{
            display:flex;
            flex-direction:column;
        }
        
        .logout-form{
            margin-top:auto;
        }

        .logo{
            font-size:40px;
            margin-bottom:40px;
        }

        .sidebar h2{
            margin-bottom:40px;
            font-size:34px;
        }

        .menu-title{
            color:#94a3b8;
            margin:25px 0 15px;
            font-size:13px;
        }

        .sidebar a{
            display:flex;
            align-items:center;
            gap:14px;
            text-decoration:none;
            color:#cbd5e1;
            padding:16px 18px;
            border-radius:18px;
            margin-bottom:12px;
            transition:0.3s;
            font-size:16px;
            font-weight:500;
        }

        .sidebar a:hover{
            background:#334155;
            transform:translateX(5px);
        }

        .sidebar a.active{
            background:linear-gradient(90deg,#2563eb,#3b82f6);
            color:white;
            box-shadow:0 10px 25px rgba(37,99,235,0.4);
        }

        .menu-link{
            width:100%;
            border:none;
            background:none;
            color:#cbd5e1;
            padding:16px 18px;
            border-radius:18px;
            text-align:left;
            cursor:pointer;
            font-size:16px;
            transition:0.3s;
        }

        .menu-link:hover{
            background:#334155;
        }

        .logout-btn{
            width:100%;
            display:flex;
            align-items:center;
            gap:14px;

            padding:16px 18px;

            border:none;
            border-radius:18px;

            background:#dc2626;
            color:white;

            font-size:16px;
            font-weight:500;

            cursor:pointer;
            transition:.3s;
        }       

            .logout-btn:hover{
                background:#b91c1c;
                  transform:translateX(5px);
        }
        /* MAIN */

        .main{
            margin-left:270px;
            width:calc(100% - 270px);
            padding:35px;
        }

        .topbar{
            display:flex;
            justify-content:space-between;
            align-items:center;
            margin-bottom:35px;
        }

        .topbar h2{
            font-size:38px;
            color:#0f172a;
        }

        .badge{
            background:white;
            padding:12px 20px;
            border-radius:50px;
            box-shadow:0 5px 20px rgba(0,0,0,0.08);
            font-weight:600;
        }

        /* CARDS */

        .cards{
            display:grid;
            grid-template-columns:repeat(auto-fit,minmax(220px,1fr));
            gap:25px;
            margin-bottom:35px;
        }

        .card{
            padding:28px;
            border-radius:28px;
            color:white;
            position:relative;
            overflow:hidden;
            box-shadow:0 10px 30px rgba(0,0,0,0.1);
        }

        .card h4{
            font-size:18px;
            opacity:0.9;
        }

        .card h1{
            margin-top:15px;
            font-size:45px;
        }

        .card p{
            margin-top:10px;
            opacity:0.9;
        }

        .blue{
            background:linear-gradient(135deg,#2563eb,#3b82f6);
        }

        .green{
            background:linear-gradient(135deg,#10b981,#34d399);
        }

        .orange{
            background:linear-gradient(135deg,#f59e0b,#fbbf24);
        }

        .purple{
            background:linear-gradient(135deg,#7c3aed,#8b5cf6);
        }

        /* BOX */

        .box{
            background:white;
            border-radius:28px;
            padding:30px;
            margin-bottom:35px;
            box-shadow:0 10px 30px rgba(0,0,0,0.06);
        }

        .box-header{
            display:flex;
            justify-content:space-between;
            align-items:center;
            margin-bottom:25px;
        }

        .box-header h3{
            font-size:28px;
            color:#0f172a;
        }

        .box-header p{
            color:#64748b;
            margin-top:5px;
        }

        /* BUTTON */

        .btn{
            border:none;
            padding:14px 24px;
            border-radius:14px;
            color:white;
            cursor:pointer;
            font-weight:600;
            transition:0.3s;
        }

        .btn:hover{
            transform:translateY(-2px);
        }

        .btn-blue{
            background:#3b82f6;
        }

        .btn-green{
            background:#10b981;
        }

        .btn-red{
            background:#ef4444;
        }

        /* TABLE */

        table{
            width:100%;
            border-collapse:collapse;
        }

        th{
            background:#f1f5f9;
            padding:18px;
            text-align:left;
            color:#475569;
            font-size:15px;
        }

        td{
            padding:18px;
            border-bottom:1px solid #e2e8f0;
        }

        tr:hover{
            background:#f8fafc;
        }

        /* STATUS */

        .status{
            padding:8px 14px;
            border-radius:50px;
            font-size:13px;
            font-weight:600;
        }

        /* status booking*/
        .sukses{
            background:#dcfce7;
            color:#15803d;
        }

        .Tertunda{
            background:#fef3c7;
            color:#b45309;
        }

        .Bahaya{
            background:#fee2e2;
            color:#dc2626;
        }

        .tertunda {
            background: #fef3c7;
            color: #92400e;
        }

        .dibatalkan {
            background: #fee2e2;
            color: #991b1b;
        }

        .completed{
            background:#e5e7eb;
            color:#374151;
        }
        
        .rejected {
            background: #fee2e2;
            color: #991b1b;
        }

        .waiting {
            background: #dbeafe;
            color: #1e40af;
        }

        /* status kamar*/
        .status-available{
            color:green;
            font-weight:600;
        }

        .status-used{
            color:red;
            font-weight:600;
        }

        .tersedia{
            background:#dcfce7;
            color:#166534;
        }

        .dipakai{
            background:#fee2e2;
            color:#991b1b;
        }

        .cleaning{
            background:#cffafe;
            color:#155e75;
        }

        .maintenance{
            background:#36815a;
            color:#cddfd6;
        }

        /* FORM */

        input{
            padding:12px 18px;
            border-radius:12px;
            border:1px solid #dbeafe;
            outline:none;
        }

        .filter-box{
            display:flex;
            gap:15px;
            align-items:center;
        }

    </style>

</head>
<body>

    <x-admin-sidebar />

   <div class="main">

    <div style="display:flex;justify-content:flex-end;margin-bottom:20px;">
        <select onchange="window.location.href=this.value"
                style="padding:8px;border-radius:8px;">

            <option value="{{ url('/language/id') }}"
                {{ app()->getLocale() == 'id' ? 'selected' : '' }}>
                🇮🇩 Indonesia
            </option>

            <option value="{{ url('/language/en') }}"
                {{ app()->getLocale() == 'en' ? 'selected' : '' }}>
                🇬🇧 English
            </option>

        </select>
    </div>

    @yield('content')

</div>
</body>
</html>