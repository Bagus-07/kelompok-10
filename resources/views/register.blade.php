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
    height: 100vh;
    font-family: 'Segoe UI', sans-serif;

    /* FULL BACKGROUND */
    background: url('https://images.unsplash.com/photo-1507525428034-b723cf961d3e') no-repeat center;
    background-size: cover;

    display: flex;
    justify-content: center;
    align-items: center;
}

/* OVERLAY  */
body::before {
    content: "";
    position: absolute;
    width: 100%;
    height: 100%;
    background: rgba(0,0,0,0.4);
    top: 0;
    left: 0;
}

/* CARD */
.register-card {
    position: relative;
    width: 100%;
    max-width: 420px;
    padding: 35px;
    border-radius: 15px;
    background: white;
    box-shadow: 0 10px 30px rgba(0,0,0,0.2);
    z-index: 1;
}

/* INPUT */
.input-group-text {
    background: #fff;
}

/* BUTTON GOLD */
.btn-gold {
    background: #ffc107;
    border: none;
    color: #000;
}

.btn-gold:hover {
    background: #e0a800;
}
</style>

</head>
<body>

<div class="register-card">

    <h3><b>Create Account</b></h3>
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

</body>
</html>