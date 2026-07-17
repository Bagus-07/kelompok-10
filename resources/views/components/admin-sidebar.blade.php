<div class="sidebar">

    <!-- Logo -->
    <div style="text-align:center;margin-bottom:20px;">

        <img
            src="{{ asset('photo/new logo.jpeg') }}"
            width="95"
            style="
            border-radius:18px;
             box-shadow:0 8px 20px rgba(0,0,0,.25);">

        <h2
            style="
                margin-top:18px;
                margin-bottom:6px;
                font-size:28px;
                font-weight:700;">

            StayEase

        </h2>

        <p
            style="
                color:#94a3b8;
                font-size:15px;
                letter-spacing:.5px;">

            Administrator

        </p>

    </div>

    <p class="menu-title">MENU</p>

    <div class="sidebar-menu">
        <a href="{{ url('/admin/dashboard') }}"
   class="{{ request()->is('admin/dashboard') ? 'active' : '' }}">

    📊 Dashboard

</a>

<a href="{{ url('/admin/user') }}"
   class="{{ request()->is('admin/user*') ? 'active' : '' }}">

    👤 {{ __('messages.user_data') }}

</a>

<a href="{{ url('/admin/kamar') }}"
   class="{{ request()->is('admin/kamar*') ? 'active' : '' }}">

    🛏 {{ __('messages.room_data') }}

</a>

<a href="{{ url('/admin/booking') }}"
   class="{{ request()->is('admin/booking*') ? 'active' : '' }}">

    📅 Booking

</a>

<a href="{{ url('/admin/laporan') }}"
   class="{{ request()->is('admin/laporan*') ? 'active' : '' }}">

    📄 {{ __('messages.report') }}

</a>
    </div>

    <div
        style="
        margin-top:25px;
        padding:20px;
        border-top:1px solid rgba(255,255,255,.15);">

        <div
            style="
                color:white;
                font-weight:700;
                font-size:18px;">

            {{ auth()->user()->name }}

        </div>

        <div
            style="
            color:#94a3b8;
            font-size:15px;
            margin-top:5px;">

            {{ auth()->user()->email }}

        </div>

        <div
            style="
            margin-top:12px;
            display:inline-block;
            background:#16a34a;
            color:white;
            padding:7px 12px;
            border-radius:20px;
            font-size:12px;
            font-weight:600;">

            🟢 Administrator {{ __('messages.active') }}

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

            🚪 {{ __('messages.logout') }}

        </button>

    </form>

</div>