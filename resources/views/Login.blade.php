<!DOCTYPE html>
<html lang="en">
<head>
  @vite(['resources/css/app.css', 'resources/js/app.js'])
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Sistem Booking Hotel | Login</title>

  <!-- Fonts & CSS -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700">
  <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-free/css/all.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/dist/css/adminlte.min.css') }}">

  <style>
    body {
        margin: 0;
        height: 100vh;
        background-image: url('https://images.unsplash.com/photo-1507525428034-b723cf961d3e');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
    }

    .overlay {
        background: rgba(0,0,0,0.4);
        height: 100vh;
    }

    .card {
        border-radius: 15px;
    }
  </style>
</head>

<body>

<div class="overlay d-flex justify-content-center align-items-center">

  <div class="card p-4 shadow" style="max-width: 450px; width: 100%;">
    
    <h3 class="mb-2"><b>Booking</b></h3>
    <p class="text-muted">Welcome back, glad to see you</p>

    <!-- FORM LOGIN -->
    <form method="POST" action="/login">
      @csrf

      <!-- EMAIL -->
      <div class="form-group mb-3">
        <label>Email</label>
        <input type="email" name="email" class="form-control" placeholder="Type your email" required>
      </div>

      <!-- PASSWORD -->
      <div class="form-group mb-3">
        <label>Password</label>
        <div class="input-group">
          <input type="password" name="password" class="form-control" id="password" required>
          <div class="input-group-append show-password" style="cursor:pointer;">
            <span class="input-group-text">
              <i class="fas fa-eye" id="password-lock"></i>
            </span>
          </div>
        </div>
      </div>

      <!-- REMEMBER -->
      <div class="form-check mb-3">
        <input type="checkbox" class="form-check-input" id="remember">
        <label class="form-check-label" for="remember">Remember me</label>
      </div>

      <!-- LOGIN BUTTON -->
      <button type="submit" class="btn btn-warning btn-block mb-3">
        Log In
      </button>

      <p class="text-center">Or</p>

      <!-- GOOGLE LOGIN -->
      <a href="/auth/google" class="btn btn-outline-danger btn-block mb-2">
        Continue with Google
      </a>

      <p class="text-center mt-3">
  Don't have account? 
  <a href="/register" class="text-warning">Register</a>
</p>

    </form>
  </div>

</div>

<!-- JS -->
<script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/dist/js/adminlte.min.js') }}"></script>

<script>
  $('.show-password').on('click', function(){
    if($('#password').attr('type') == 'password'){
        $('#password').attr('type', 'text');
        $('#password-lock').attr('class', 'fas fa-eye-slash');
    } else {
        $('#password').attr('type', 'password');
        $('#password-lock').attr('class', 'fas fa-eye');
    }
  });
</script>

</body>
</html>