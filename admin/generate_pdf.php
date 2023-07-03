<?php 
require('inc/essentials.php');
require('inc/db_config.php');
require('inc/mpdf/vendor/autoload.php');
adminLogin();
$mpdf = new \Mpdf\Mpdf();
//check if booking ID is present in URL
if (!isset($_GET["id"])) {
    die("Booking ID not specified");
}
//get booking ID from URL parameter
$bkid = $_GET["id"];
//read data from payment for the specified booking ID
$sql="SELECT * FROM payment WHERE bkid = $bkid";
$result = $con->query($sql);
if(!$result){
    die("Invalid detail" . $con->error);
}
//generate receipt for the specified booking ID
$html = '<h1>Receipt</h1>';
$row = $result->fetch_assoc();
$bkid = $row["bkid"];
$name = $row["name"];
$rname = $row["rname"];
$days = $row["days"];
$amount = $row["amount"];
$booking_date = $row["booking_date"];
$payment_id = $row["payment_id"];
$phone_no = $row["phone_no"];
$B_status = $row["B_status"];
$html .= '<table style="border-collapse: collapse; width: 100%;">';
$html .= '<tr><th style="border: 1px solid black; padding: 5px;">Booking ID:</th><td style="border: 1px solid black; padding: 5px;">' . $bkid . '</td></tr>';
$html .= '<tr><th style="border: 1px solid black; padding: 5px;">Name:</th><td style="border: 1px solid black; padding: 5px;">' . $name . '</td></tr>';
$html .= '<tr><th style="border: 1px solid black; padding: 5px;">Room Name:</th><td style="border: 1px solid black; padding: 5px;">' . $rname . '</td></tr>';
$html .= '<tr><th style="border: 1px solid black; padding: 5px;">Days:</th><td style="border: 1px solid black; padding: 5px;">' . $days . '</td></tr>';
$html .= '<tr><th style="border: 1px solid black; padding: 5px;">Amount:</th><td style="border: 1px solid black; padding: 5px;">' . $amount . '</td></tr>';
$html .= '<tr><th style="border: 1px solid black; padding: 5px;">Booking Date:</th><td style="border: 1px solid black; padding: 5px;">' . $booking_date . '</td></tr>';
$html .= '<tr><th style="border: 1px solid black; padding: 5px;">Payment ID:</th><td style="border: 1px solid black; padding: 5px;">' . $payment_id . '</td></tr>';
$html .= '<tr><th style="border: 1px solid black; padding: 5px;">Phone Number:</th><td style="border: 1px solid black; padding: 5px;">' . $phone_no . '</td></tr>';
$html .= '<tr><th style="border: 1px solid black; padding: 5px;">Booking Status:</th><td style="border: 1px solid black; padding: 5px;">' . $B_status . '</td></tr>';
$html .= '</table>';
$mpdf->WriteHTML($html);
$mpdf->Output($row['bkid'] . '_' . $row['payment_id'] . '_receipt.pdf', 'D')
?>
