<?php
//connect the database
include 'admin\inc\db_config.php';
//get the payment details from payment page by razor pay
if (isset($_POST['payment_id']) && isset($_POST['amount']) && isset($_POST['name'])) {
    $paymentId = $_POST['payment_id'];
    $amount = $_POST['amount'];
    $name = $_POST['name'];
    $phonenum = $_POST['phonenum'];
    $adress = $_POST['adress'];
    $rname = $_POST['rname'];
    $days = $_POST['days'];
    // $newCheckIn = date('Y-m-d', strtotime($chkin));
    //insert data into database
    $sql = "INSERT INTO payment(name,amount,rname,days,payment_id,phone_no,adress)VALUES('$name','$amount','$rname',$days,'$paymentId','$phonenum','$adress')";
    $stmt = $con->prepare($sql);
    $stmt->execute();
}
?>