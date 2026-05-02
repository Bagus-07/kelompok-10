<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Register | Hotel Booking</title>

<link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-free/css/all.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/dist/css/adminlte.min.css') }}">

<style>
body {
    margin: 0;
    font-family: 'Segoe UI', sans-serif;
}

/* LEFT SIDE */
.left-side {
    background: url('https://images.unsplash.com/photo-1566073771259-6a8506099945') no-repeat center;
    background-size: cover;
    height: 100vh;
    color: white;
    position: relative;
}

.overlay {
    background: rgba(0,0,0,0.5);
    height: 100%;
    padding: 50px;
}

.brand-text {
    position: absolute;
    bottom: 50px;
}

/* RIGHT SIDE */
.right-side {
    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
    background: #f8f9fa;
}

.card-register {
    width: 100%;
    max-width: 400px;
    padding: 30px;
    border-radius: 15px;
    background: white;
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
}

.input-group-text {
    background: #fff;
}

.btn-gold {
    background: #d4af37;
    color: white;
}

.btn-gold:hover {
    background: #c19b2e;
}
</style>

</head>
<body>

<div class="container-fluid">
<div class="row">

    <!-- LEFT (IMAGE / BRANDING) -->
    <div class="col-md-6 d-none d-md-block left-side">
        <div class="overlay">
            <h2><b>Hotel Booking</b></h2>
            <p>Find your perfect stay anywhere in the world</p>

            <div class="brand-text">
                <h3>Luxury & Comfort</h3>
                <p>Experience the best hotels with us</p>
            </div>
        </div>
    </div>

    <!-- RIGHT (FORM) -->
    <div class="col-md-6 right-side">
        <div class="card-register">

            <h3 class="mb-2"><b>Create Account</b></h3>
            <p class="text-muted">Join us and start booking</p>

            <form method="POST" action="/register">
                @csrf

                <!-- NAME -->
                <div class="input-group mb-3">
                    <input type="text" name="name" class="form-control" placeholder="Full Name" required>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                    </div>
                </div>

                <!-- EMAIL -->
                <div class="input-group mb-3">
                    <input type="email" name="email" class="form-control" placeholder="Email" required>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>

                <!-- PASSWORD -->
                <div class="input-group mb-3">
                    <input type="password" name="password" class="form-control" placeholder="Password" required>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>

                <!-- CONFIRM PASSWORD -->
                <div class="input-group mb-3">
                    <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm Password" required>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>

                <!-- BUTTON -->
                <button type="submit" class="btn btn-gold btn-block mb-3">
                    Register
                </button>

                <p class="text-center">or</p>

                <!-- GOOGLE -->
                <a href="/auth/google" class="btn btn-outline-danger btn-block mb-3">
                    Continue with Google
                </a>

                <p class="text-center">
                    Already have an account?
                    <a href="/login" class="text-warning">Login</a>
                </p>

            </form>

        </div>
    </div>

</div>
</div>

<script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/dist/js/adminlte.min.js') }}"></script>

</body>
</html>

