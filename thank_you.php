<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php require('inc/links.php'); ?>
  <title><?php echo $settings_r['site_title'] ?> - BOOKING STATUS</title>
</head>

<body class="bg-light">
  <!-- Payment successful page -->
  <?php require('inc/header.php'); ?>
  <div class="container">
    <div class="row">
      <div class="alert alert-success alert-dismissible mt-5">
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        <strong>Success!</strong> Payment Paid Successfully.<br>
        <a href='bookings.php'>Go to Bookings</a>
      </div>
    </div>
  </div>
  </div>
  <div class="fixed-bottom">
    <?php require('inc/footer.php'); ?>
  </div>
</body>
</html>