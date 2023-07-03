<?php 
  require('../inc/db_config.php');
  require('../inc/essentials.php');
  adminLogin();
  if(isset($_POST['get_bookings']))
  {
    $frm_data = filteration($_POST);
    $query = "SELECT * FROM `payment`
    WHERE (bkid LIKE ? OR phone_no LIKE ? OR name LIKE ?) 
    AND (B_status=? AND arrival=? ) ORDER BY bkid ASC";

    $res = select($query,["%$frm_data[search]%","%$frm_data[search]%","%$frm_data[search]%","Confirmed",0],'iissi');
    $i=1;
    $table_data = "";

    if(mysqli_num_rows($res)==0){
      echo"<b>No Data Found!</b>";
      exit;
    }
    while($data = mysqli_fetch_assoc($res))
    {
      //Table output
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
            <b>Price:</b> ₹$data[amount]
          </td>
          <td>
            <b>No of days</b> $data[days]
            <br>
            <b>Paid:</b> ₹$data[amount]
            <br>
            <b>Date:</b> $$data[booking_date]
          </td>
          <td>
            <button type='button' onclick='assign_room($data[bkid])' class='btn text-white btn-sm fw-bold custom-bg shadow-none' data-bs-toggle='modal' data-bs-target='#assign-room'>
              <i class='bi bi-check2-square'></i> Assign Room
            </button>
            <br>
            <button type='button' onclick='cancel_booking($data[bkid])' class='mt-2 btn btn-outline-danger btn-sm fw-bold shadow-none'>
              <i class='bi bi-trash'></i> Cancel Booking
            </button>
          </td>
        </tr>
      ";
      $i++;
    }
    echo $table_data;
  }
  //assign room
  if(isset($_POST['assign_room']))
  {
    $frm_data = filteration($_POST);
    $query = "UPDATE `payment` SET arrival = ?, room_no = ?  WHERE bkid = ?";
    $values = [1,$frm_data['room_no'],$frm_data['bkid']];
    $res = update($query,$values,'iii'); // it will update 2 rows so it will return 2
    echo ($res==1) ? 1 : 0;
  }
  //cancel booking
  if(isset($_POST['cancel_booking']))
  {
    $frm_data = filteration($_POST);
    $query = "UPDATE `payment` SET `B_status`=?, `refund`=? WHERE `bkid`=?";
    $values = ['cancelled',0,$frm_data['bkid']];
    $res = update($query,$values,'sii');
    echo $res;
  }
?>