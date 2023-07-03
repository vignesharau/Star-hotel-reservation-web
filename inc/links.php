<!--Google Font online -->
<link href="https://fonts.googleapis.com/css2?family=Merienda:wght@400;700&family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
<!-- Common css -->
<link rel="stylesheet" href="css\common.css">
<!-- Icon cdn(font-awesome,iconscout,bootstrap) -->
<link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css"> 
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css"> 
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"> 
<!-- Bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- Animation on scroll -->
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<!-- Offline files -->
<link rel="stylesheet" href="inc\link-css\bootstrap.min.css">
<link rel="stylesheet" href="inc\link-css\bootstrap-icons.css">
<link rel="stylesheet" href="inc\link-css\all.min.css">
<link rel="stylesheet" href="inc\link-css\aos.css">
<link rel="shortcut icon" href="images\iconnn.png">

<?php
session_start();
date_default_timezone_set("Asia/Kolkata");
require('admin/inc/db_config.php');
require('admin/inc/essentials.php');
// Get the values from contact detail and setting table in mysql
$contact_q = "SELECT * FROM `contact_details` WHERE `sr_no`=?";
$settings_q = "SELECT * FROM `settings` WHERE `sr_no`=?";
$values = [1];
$contact_r = mysqli_fetch_assoc(select($contact_q, $values, 'i'));
$settings_r = mysqli_fetch_assoc(select($settings_q, $values, 'i'));

if ($settings_r['shutdown']) {
  // Shutdown alert
  echo <<<alertbar
      <div class='bg-danger text-center p-2 fw-bold'>
        <i class="bi bi-exclamation-triangle-fill"></i>
        Bookings are temporarily closed!
      </div>
    alertbar;
}
?>