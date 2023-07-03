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
  <title>Admin Panel - Users</title>
  <?php require('inc/links.php'); ?>
</head>

<body style="background-color:#B2A4FF;">
  <?php require('inc/header.php'); ?>
  <div class="container-fluid" id="main-content">
    <div class="row">
      <div class="col-lg-10 ms-auto p-4 overflow-hidden">
        <h3 class="mb-4">USERS</h3>
        <!-- CArd -->
        <div class="card border-0  mb-4" style="background-color:#B2A4FF;">
          <div class="card-body">
            <div class="text-end mb-4">
              <!-- Search -->
              <input type="text" oninput="search_user(this.value)" class="form-control shadow-none w-25 ms-auto" placeholder="Type to search...">
            </div>
            <!-- Table -->
            <div class="table-responsive shadow-lg">
              <table class="table table-hover border text-center bg-light" style="min-width: 1300px;">
                <thead>
                  <tr class="bg-dark text-light">
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone no.</th>
                    <th scope="col">Location</th>
                    <th scope="col">DOB</th>
                    <th scope="col">Verified</th>
                    <th scope="col">Status</th>
                    <th scope="col">Date</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody id="users-data">
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php require('inc/scripts.php'); ?>
  <script src="scripts/users.js"></script>
</body>
</html>