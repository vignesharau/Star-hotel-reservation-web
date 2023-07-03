<?php 
  require('../admin/inc/db_config.php');
  require('../admin/inc/essentials.php');
  date_default_timezone_set("Asia/Kolkata");
  session_start();
  if(!(isset($_SESSION['login']) && $_SESSION['login']==true)){
    redirect('index.php');
  }
  // update the booking status to cancelled
  if(isset($_POST['cancel_booking']))
  {
    $frm_data = filteration($_POST);
    $query = "UPDATE `payment` SET `B_status`=?, `refund`=? 
      WHERE `bkid`=?";
    $values = ['cancelled',0,$frm_data['id']];
    $result = update($query,$values,'sii');
    echo $result;
  }
?>