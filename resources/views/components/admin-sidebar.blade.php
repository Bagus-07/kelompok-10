<div class="sidebar">

    <!-- Logo -->
    <div style="text-align:center;margin-bottom:30px;">

        <img
            src="{{ asset('photo/new logo.jpeg') }}"
            width="90"
            style="border-radius:16px;">

        <h2
            style="
            margin-top:15px;
            margin-bottom:5px;
            font-size:26px;">

            StayEase

        </h2>

        <p
            style="
            color:#94a3b8;
            font-size:14px;">

            Administrator

        </p>

    </div>

    <div class="sidebar-menu">

        <a href="{{ url('/admin/dashboard') }}"
        class="{{ request()->is('admin/dashboard') ? 'active' : '' }}">

            📊 Dashboard

        </a>

        <a href="{{ url('/admin/user') }}"
        class="{{ request()->is('admin/user*') ? 'active' : '' }}">

            👤 Data Pengguna

        </a>

        <a href="{{ url('/admin/kamar') }}"
        class="{{ request()->is('admin/kamar*') ? 'active' : '' }}">

            🛏 Data Kamar

        </a>

        <a href="{{ url('/admin/booking') }}"
        class="{{ request()->is('admin/booking*') ? 'active' : '' }}">

            📅 Booking

        </a>

        <a href="{{ url('/admin/laporan') }}"
        class="{{ request()->is('admin/laporan*') ? 'active' : '' }}">

            📄 Laporan

        </a>

    </div>

    <div
        style="
        margin-top:auto;
        margin-bottom:18px;
        padding:16px;
        border-top:1px solid rgba(255,255,255,.15);">

        <div
            style="
            color:white;
            font-weight:600;">

            {{ auth()->user()->name }}

        </div>

        <div
            style="
            color:#94a3b8;
            font-size:13px;
            margin-top:4px;">

            {{ auth()->user()->email }}

        </div>

        <div
            style="
            margin-top:10px;
            display:inline-block;
            background:#16a34a;
            color:white;
            padding:6px 12px;
            border-radius:20px;
            font-size:12px;
            font-weight:600;">

            🟢 Administrator Aktif

        </div>

    </div>

    <form
        action="{{ route('logout') }}"
        method="POST"
        class="logout-form">

        @csrf

        <button
            type="submit"
            class="logout-btn">

            🚪 Keluar

        </button>

    </form>

</div>