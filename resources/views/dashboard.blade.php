<!DOCTYPE html>
<html>
<head>
  <title>Hotel Dashboard(placeholders)<</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
<div class="container mt-4">

  <h2>Hotel Dashboard(placeholders)</h2>

  <!-- Summary Cards -->
  <div class="row text-center">
    <div class="col-md-3">
      <div class="card p-3">
        <h5>Bookings</h5>
        <h3>120</h3>
      </div>
    </div>
    <div class="col-md-3">
      <div class="card p-3">
        <h5>Kamar yang tersedia</h5>
        <h3>30</h3>
      </div>
    </div>
    <div class="col-md-3">
      <div class="card p-3">
        <h5>Kamar yang ditempati</h5>
        <h3>70</h3>
      </div>
    </div>
    <div class="col-md-3">
      <div class="card p-3">
        <h5>Pendapatan</h5>
        <h3>$5,000</h3>
      </div>
    </div>
  </div>

  <!-- Booking Table -->
  <div class="mt-4">
    <h4>Booking yang sedang berlangsung</h4>
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>Tamu</th>
          <th>Kamar</th>
          <th>Check-in</th>
          <th>Status</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>John Doe</td>
          <td>Deluxe</td>
          <td>20 Mar 2026</td>
          <td>Booked</td>
        </tr>
      </tbody>
    </table>
  </div>

  <!-- Room Cards -->
  <div class="mt-4">
    <h4>Kamar</h4>
    <div class="row">
      <div class="col-md-4">
        <div class="card">
          <img src="https://via.placeholder.com/300x150" class="card-img-top">
          <div class="card-body">
            <h5>Deluxe Room</h5>
            <p>$100 / malam</p>
            <span class="badge bg-success">tersedia</span>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>
</body>
</html>