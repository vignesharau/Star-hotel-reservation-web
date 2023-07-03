<?php
require('inc/essentials.php');
require('inc/db_config.php');
adminLogin();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Panel - Dashboard</title>
  <?php require('inc/links.php'); ?>
</head>

<body style="background-color:#B2A4FF;">
  <?php
  require('inc/header.php');
  // Checking wether the site is shutdow or not
  $is_shutdown = mysqli_fetch_assoc(mysqli_query($con, "SELECT `shutdown` FROM `settings`"));
  //fetch the booking from the table
  $current_bookings = mysqli_fetch_assoc(mysqli_query($con, "SELECT 
      COUNT(CASE WHEN B_status='Confirmed' AND arrival=0 THEN 1 END) AS `new_bookings`,
      COUNT(CASE WHEN B_status='cancelled' AND refund=0 THEN 1 END) AS `refund_bookings`
      FROM `payment`"));
  //fetch Queries from table
  $unread_queries = mysqli_fetch_assoc(mysqli_query($con, "SELECT COUNT(sr_no) AS `count`
      FROM `user_queries` WHERE `seen`=0"));

  //Fetch the Use count
  $current_users = mysqli_fetch_assoc(mysqli_query($con, "SELECT 
      COUNT(id) AS `total`,
      COUNT(CASE WHEN `status`=1 THEN 1 END) AS `active`,
      COUNT(CASE WHEN `status`=0 THEN 1 END) AS `inactive`,
      COUNT(CASE WHEN `is_verified`=0 THEN 1 END) AS `unverified`
      FROM `user_cred`"));
  ?>

  <div class="container-fluid" id="main-content">
    <div class="row">
      <div class="col-lg-10 ms-auto p-4 overflow-hidden">

        <div class="d-flex align-items-center justify-content-between mb-4">
          <h3 class="">DASHBOARD</h3>
          <!-- Disply shutdown -->
          <?php
          if ($is_shutdown['shutdown']) {
            echo <<<data
                <h4 class="badge bg-danger py-2 px-3 rounded">Shutdown Mode is Active!</h4>
              data;
          }
          ?>
        </div>
        <!-- Tot new booking -->
        <div class="row mb-4">
          <div class="col-md-3 mb-4">
            <a href="new_bookings.php" class="text-decoration-none ">
              <div class="card text-center text-bg-success shadow-lg p-3 border-4 border-white  rounded-5">
                <h5 class="fw-bold">New Bookings</h5>
                <h1 class="mt-2 fw-bold mb-0"><?php echo $current_bookings['new_bookings'] ?></h1>
              </div>
            </a>
          </div>
          <!-- Tot refund booking -->
          <div class="col-md-3 mb-4">
            <a href="refund_bookings.php" class="text-decoration-none">
              <div class="card text-center shadow-lg text-bg-warning p-3 rounded-5 border-4 border-white ">
                <h5 class="fw-bold">Refund Bookings</h5>
                <h1 class="mt-2 mb-0"><?php echo $current_bookings['refund_bookings'] ?></h1>
              </div>
            </a>
          </div>
          <!-- Tot cancel booking -->
          <div class="col-md-3 mb-4">
            <a href="user_queries.php" class="text-decoration-none">
              <div class="card text-center shadow-lg text-bg-info p-3 rounded-5 border-4 border-white ">
                <h5 class="fw-bold">User Queries</h5>
                <h1 class="mt-2 mb-0"><?php echo $unread_queries['count'] ?></h1>
              </div>
            </a>
          </div>
        </div>

        <div class="d-flex align-items-center justify-content-between mb-3">
          <h4 class="fw-bold">Booking Analytics</h4>
          <select class="form-select shadow-lg fw-bold text-white bg-danger w-auto" onchange="booking_analytics(this.value)">
            <option value="1">Past 30 Days</option>
            <option value="2">Past 90 Days</option>
            <option value="3">Past 1 Year</option>
            <option value="4">All time</option>
          </select>
        </div>

        <div class="row mb-3">
          <div class="col-md-3 mb-4">
            <div class="card text-center shadow-lg text-primary rounded border-4  border-danger bg-dark p-3 rounded-pill">
              <h5 class="fw-bold mt-3">Total Bookings</h5>
              <h1 class="mt-2 pt-4 mb-0 fw-bold border-4 border-top border-white" id="total_bookings">0</h1>
              <h3 class="mt-2 mb-0 fw-bold" id="total_amt">₹0</h3>
            </div>
          </div>
          <div class="col-md-3 mb-4">
            <div class="card text-center shadow-lg text-primary p-3 border-4  border-danger bg-dark rounded-pill">
              <h5 class="fw-bold mt-3">Active Bookings</h5>
              <h1 class="mt-2 pt-4 mb-0 fw-bold border-4 border-top border-white" id="active_bookings">0</h1>
              <h3 class="mt-2 mb-0 fw-bold" id="active_amt">₹0</h3>
            </div>
          </div>
          <div class="col-md-3 mb-4">
            <div class="card text-center shadow-lg text-primary border-4  border-danger bg-dark p-3 rounded-pill">
              <h5 class="fw-bold mt-3">Cancelled Bookings</h5>
              <h1 class="mt-2 pt-4 mb-0 fw-bold border-4 border-top border-white" id="cancelled_bookings">0</h1>
              <h3 class="mt-2 mb-0 fw-bold" id="cancelled_amt">₹0</h3>
            </div>
          </div>
        </div>


        <div class="d-flex align-items-center justify-content-between mb-3">
          <h3 class="fw-bold">User, Queries</h3>
          <select class="form-select shadow-lg bg-danger text-white fw-bold w-auto" onchange="user_analytics(this.value)">
            <option value="1">Past 30 Days</option>
            <option value="2">Past 90 Days</option>
            <option value="3">Past 1 Year</option>
            <option value="4">All time</option>
          </select>
        </div>
        <!-- Tot new registration -->
        <div class="row mb-3">
          <div class="col-md-3 mb-4">
            <div class="card text-center shadow-lg text-bg-success border-4 border-white rounded-5 p-3">
              <h4 class="">New Registration</h4>
              <h1 class="mt-2 mb-0 " id="total_new_reg">0</h1>
            </div>
          </div>
          <!-- Tot queries -->
          <div class="col-md-3 mb-4">
            <div class="card text-center shadow-lg text-bg-primary border-4 border-white rounded-5 p-3">
              <h4>Queries</h4>
              <h1 class="mt-2 mb-0" id="total_queries">0</h1>
            </div>
          </div>
        </div>

        <h3 class="fw-bold">Users</h3>
        <div class="row mb-3">
          <!-- Total User -->
          <div class="col-md-3 mb-4">
            <div class="card text-center shadow-lg border-4 border-primary bg-dark rounded-5 text-info p-3">
              <h5 class="fw-bold">Total</h5>
              <h1 class="mt-2 mb-0 fw-bold"><?php echo $current_users['total'] ?></h1>
            </div>
          </div>
          <!-- Total Active user -->
          <div class="col-md-3 mb-4">
            <div class="card text-center shadow-lg border-4 border-primary bg-dark rounded-5 text-success p-3">
              <h5 class="fw-bold">Active</h5>
              <h1 class="mt-2 mb-0 fw-bold"><?php echo $current_users['active'] ?></h1>
            </div>
          </div>
          <!-- Total  Inactive-->
          <div class="col-md-3 mb-4">
            <div class="card text-center shadow-lg border-4 border-primary bg-dark rounded-5 text-warning p-3">
              <h5 class="fw-bold">Inactive</h5>
              <h1 class="mt-2 mb-0 fw-bold"><?php echo $current_users['inactive'] ?></h1>
            </div>
          </div>
          <!-- Total  Unverifed-->
          <div class="col-md-3 mb-4">
            <div class="card text-center shadow-lg border-4 border-primary bg-dark rounded-5 text-danger p-3">
              <h5 class="fw-bold">Unverified</h5>
              <h1 class="mt-2 mb-0 fw-bold"><?php echo $current_users['unverified'] ?></h1>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php require('inc/scripts.php'); ?>
  <script src="scripts/dashboard.js"></script>
</body>
</html>