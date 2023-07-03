<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php require('inc/links.php'); ?>
  <title><?php echo $settings_r['site_title'] ?> - BOOKINGS</title>
</head>

<body class="bg-light">
  <!-- Php code for login true and ID -->
  <?php
  require('inc/header.php');
  if (!(isset($_SESSION['login']) && $_SESSION['login'] == true)) {
    redirect('index.php');
  }
  if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM payment WHERE bkid = $id";
    $result = $con->query($sql);
    $data = $result->fetch_assoc();
  }
  ?>

<!-- Booking section -->
  <div class="container">
    <div class="row">
      <div class="col-12 my-5 px-4">
        <h2 class="fw-bold" style="font-family: 'Kaushan Script', cursive" data-aos="fade-right" data-aos-duration="2000">BOOKINGS</h2>
        <div style="font-size: 14px;" data-aos="fade-right" data-aos-duration="3000">
          <a href="index.php" class="text-secondary text-decoration-none">HOME</a>
          <span class="text-secondary"> > </span>
          <a href="#" class="text-secondary text-decoration-none">BOOKINGS</a>
        </div>
      </div>

      <!-- Table for booking -->
      <div class="table-responsive" data-aos="zoom-in" data-aos-duration="2000">
        <table class="table table-sm table-hover table-bordered">
          <thead class="fw-bold table-primary  text-center">
            <tr>
              <th>Slno</th>
              <th>Name</th>
              <th>Room name</th>
              <th>No of days</th>
              <th>Amount</th>
              <th>date of booking</th>
              <th>Payment-id</th>
              <th>Phone no</th>
              <!-- <th>Address</th> -->
              <th>Status</th>
              <th>Action</th>
            </tr>
          </thead>

          <tbody class="table-info table-group-divider align-middle text-center">
            <!-- From payment table to html table php code -->
            <?php
            //read data from payment
            $sql = "SELECT * FROM payment ORDER BY booking_date DESC";
            $result = $con->query($sql);
            if (!$result) {
              die("Invalid detail" . $con->error);
            }
            //data frm each row
            while ($row = $result->fetch_assoc()) {
              echo "<tr>
                      <td>" . $row["bkid"] . "</td>
                      <td>" . $row["name"] . "</td>
                      <td>" . $row["rname"] . "</td>
                      <td>" . $row["days"] . "</td>
                      <td>" . $row["amount"] . "</td>
                      <td>" . $row["booking_date"] . "</td>
                      <td>" . $row["payment_id"] . "</td>
                      <td>" . $row["phone_no"] . "</td>
                      <!-- <td>" . $row["adress"] . "</td> --->
                      <td class='d-none'>" . $row["arrival"] . "</td>
                      <td>" . $row["B_status"] . "</td>
                      <td>";

                      
              if ($row["B_status"] == 'cancelled') {
                echo "<button class='btn btn-sm btn-warning fw-bold cursor-na mt-1' disabled style='cursor:not-allowed !important'; >Refund processed</button>";
              }else if ($row["arrival"] == '1') {
                echo "<button class='btn btn-sm btn-success fw-bold cursor-na mt-1' disabled style='cursor:not-allowed !important'; >Assigned</button>";
              }
              else {
                echo "<button class='btn btn-sm btn-danger fw-bold mt-1' onclick='cancel_booking(" . $row['bkid'] . ")'>Cancel</button>";
              }   
              echo "<a href='admin\generate_pdf.php?gen_pdf&id=$row[bkid]' class='btn btn-sm btn-outline-danger fw-bold ms-1 mt-1'>Recipt PDF</a>
                      </td>
                  </tr>";
            }
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <?php require('inc/footer.php'); ?>
  <!-- JS code for cancel booking via Ajax post method -->
  <script>
    function cancel_booking(id) {
      if (confirm('Are you sure to cancel booking?')) {
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "ajax/cancel_booking.php", true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

        xhr.onload = function() {
          if (this.responseText == 1) {
            window.location.href = "bookings.php?cancel_status=true";
          } else {
            alert('error', 'Cancellation Failed!');
          }
        }
        xhr.send('cancel_booking&id=' + id);
      }
    }
  </script>
</body>
</html>