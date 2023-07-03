<!-- top nav bar -->
<div class="container-fluid  text-light p-3 d-flex align-items-center justify-content-between sticky-top" style="background-color:#2c1608;">
  <h3 class="mb-0 h-font fw-bold">Star Paradise</h3>
  <!-- logout -->
  <a href="logout.php" class="btn btn-light btn-md">LOG OUT</a>
</div>
<!-- Sidenav bar -->
<div class="col-lg-2  text-white border-top border-3 border-secondary" id="dashboard-menu" style="background-color:#2c1608;">
  <nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container-fluid flex-lg-column align-items-stretch">
      <h4 class="mt-2 text-light">ADMIN PANEL</h4>
      <button class="navbar-toggler shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#adminDropdown" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse flex-column align-items-stretch mt-2" id="adminDropdown">
        <ul class="nav nav-pills flex-column">
          <li class="nav-item">
            <a class="nav-link text-white" href="dashboard.php">Dashboard</a>
          </li>
          <li class="nav-item">
            <button class="btn fw-bold text-white px-3 w-100 shadow-none text-start d-flex align-items-center justify-content-between" type="button" data-bs-toggle="collapse" data-bs-target="#bookingLinks">
              <span>Bookings</span>
              <span><i class="bi bi-caret-down-fill"></i></span>
            </button>
            <div class="collapse show px-3 small mb-1" id="bookingLinks">
              <ul class="nav nav-pills flex-column fw-bold rounded   border bg-light  border-danger">
                <li class="nav-item">
                  <a class="nav-link fw-bold text-dark" href="new_bookings.php">New Bookings</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link fw-bold text-dark" href="refund_bookings.php">Refund Bookings</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link fw-bold text-dark" href="booking_records.php">Booking Records</a>
                </li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="users.php">Users</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="user_queries.php">User Queries</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="rooms.php">Rooms</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="features_facilities.php">Features & Facilities</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="settings.php">Settings</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
</div>