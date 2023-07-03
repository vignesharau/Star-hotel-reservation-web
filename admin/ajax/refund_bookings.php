<?php 
  require('../inc/db_config.php');
  require('../inc/essentials.php');
  adminLogin();
  if(isset($_POST['get_bookings']))
  {
    $frm_data = filteration($_POST);
    $query = "SELECT * FROM `payment`
    WHERE (bkid LIKE ? OR phone_no LIKE ? OR name LIKE ?) 
    AND (B_status=? AND refund=? ) ORDER BY bkid ASC";

    $res = select($query,["%$frm_data[search]%","%$frm_data[search]%","%$frm_data[search]%","cancelled",0],'sssss');
    $i=1;
    $table_data = "";

    if(mysqli_num_rows($res)==0){
      echo"<b>No Data Found!</b>";
      exit;
    }
    while($data = mysqli_fetch_assoc($res))
    {
      $table_data .="
        <tr>
          <td>$i</td>
          <td>
            <span class='badge bg-primary'>
              Order ID: $data[bkid]
            </span>
            <br>
            <b>Name:</b> $data[name]
            <br>
            <b>Phone No:</b> $data[phone_no]
          </td>
          <td>
            <b>Room:</b> $data[rname]
            <br>

            <b>Date:</b> $$data[booking_date]
          </td>
          <td>
            <b>₹$data[amount]</b> 
          </td>
          <td>
            <button type='button' onclick='refund_booking($data[bkid])' class='btn btn-success btn-sm fw-bold shadow-none'>
              <i class='bi bi-cash-stack'></i> Refund
            </button>
          </td>
        </tr>
      ";
      $i++;
    }
    echo $table_data;
  }
  //Refund
  if(isset($_POST['refund_booking']))
  {
    $frm_data = filteration($_POST);
    $query = "UPDATE `payment` SET `refund`=? WHERE `bkid`=?";
    $values = [1,$frm_data['bkid']];
    $res = update($query,$values,'ii'); 
    echo $res;
  }
?>