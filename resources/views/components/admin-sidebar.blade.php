<div class="sidebar">

    <div class="sidebar-menu">

        <a href="{{ url('/admin/dashboard') }}">
            {{ __('messages.dashboard') }}
        </a>

        <a href="{{ url('/admin/user') }}">
            {{ __('messages.user_data') }}
        </a>

        <a href="{{ url('/admin/kamar') }}">
            {{ __('messages.rooms') }}
        </a>

        <a href="{{ url('/admin/booking') }}">
            {{ __('messages.booking') }}
        </a>

        <a href="{{ url('/admin/laporan') }}">
            {{ __('messages.report') }}
        </a>

    </div>

    <form action="{{ route('logout') }}" method="POST" class="logout-form">
        @csrf

        <button type="submit" class="logout-btn">
            🚪 Logout
        </button>
    </form>

</div>