<?php
require('inc/essentials.php');
require('inc/db_config.php');

session_start();
if ((isset($_SESSION['adminLogin']) && $_SESSION['adminLogin'] == true)) {
  redirect('dashboard.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Login Panel</title>
  <?php require('inc/links.php'); ?>
  <style>
    div.login-form {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      width: 400px;
      background-image: linear-gradient( 109.6deg,  rgba(61,245,167,1) 11.2%, rgba(9,111,224,1) 91.1% );
    }
    body{
      width: 100%;
      height: 100vh;
      background: linear-gradient(-225deg, #231557 0%, #44107A 29%, #FF1361 67%, #FFF800 100%);
    }
  </style>
</head>
<body>
  <div class="login-form text-center rounded  shadow overflow-hidden">
    <form method="POST">
      <h4 class="text-white py-3 fw-bold" style="background-image: linear-gradient( 179.4deg,  rgba(12,20,69,1) -16.9%, rgba(71,30,84,1) 119.9% );">ADMIN LOGIN PANEL</h4>
      <div class="p-4">
        <div class="mb-3 form-floating fw-bold ">
          <input name="admin_name" required type="text" class="form-control shadow-none fw-bold" id="floatingInput" placeholder="Username">
          <label for="floatingInput"><i class="bi bi-person-circle"></i> Username</label>
        </div>
        <div class="mb-4 form-floating fw-bold">
          <input name="admin_pass" required type="password" class="form-control shadow-none fw-bold" id="floatingPassword" placeholder="Password">
          <label for="floatingPassword"><i class="bi bi-key-fill"></i> Password</label>
        </div>
        <button name="login" type="submit" class="btn text-white btn-dark w-100 fw-bold shadow-none">LOGIN</button>
      </div>
    </form>
  </div>
  </div>

  <?php
  if (isset($_POST['login'])) {
    $frm_data = filteration($_POST);

    $query = "SELECT * FROM  `admin_cred` WHERE `admin_name`=? AND `admin_pass`=?";
    $values = [$frm_data['admin_name'], $frm_data['admin_pass']];

    $res = select($query, $values, "ss");
    if ($res->num_rows == 1) {
      $row = mysqli_fetch_assoc($res);
      $_SESSION['adminLogin'] = true;
      $_SESSION['adminId'] = $row['sr_no'];
      redirect('dashboard.php');
    } else {
      alert('error', 'Login failed - Invalid Credentials!');
    }
  }
  ?>
  <?php require('inc/scripts.php') ?>
</body>
</html>