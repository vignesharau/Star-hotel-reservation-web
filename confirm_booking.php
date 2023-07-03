<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php require('inc/links.php'); ?>
  <title><?php echo $settings_r['site_title'] ?> - CONFIRM BOOKING</title>
</head>

<body class="bg-light">
  <?php require('inc/header.php'); ?>

  <?php
  /*Php code for Login is true and get id*/
  if (!isset($_GET['id']) || $settings_r['shutdown'] == true) {
    redirect('rooms.php');
  } else if (!(isset($_SESSION['login']) && $_SESSION['login'] == true)) {
    redirect('rooms.php');
  }

  if (isset($_GET['id'])) {
    // Get the 'id' parameter from the URL
    $id = $_GET['id'];
  }
  // filter and get room and user data
  $data = filteration($_GET);
  $room_res = select("SELECT * FROM `rooms` WHERE `id`=? AND `status`=? AND `removed`=?", [$data['id'], 1, 0], 'iii');

  if (mysqli_num_rows($room_res) == 0) {
    redirect('rooms.php');
  }
  $room_data = mysqli_fetch_assoc($room_res);

  $_SESSION['room'] = [
    "id" => $room_data['id'],
    "name" => $room_data['name'],
    "price" => $room_data['price'],
    "payment" => null,
    "available" => false,
  ];

  $user_res = select("SELECT * FROM `user_cred` WHERE `id`=? LIMIT 1", [$_SESSION['uId']], "i");
  $user_data = mysqli_fetch_assoc($user_res);
  ?>
<!-- Confirm booking section -->
  <div class="container">
    <div class="row">
      <div class="col-12 my-5 mb-4 px-4">
        <h2 class="fw-bold" style="font-family: 'Kaushan Script', cursive">CONFIRM BOOKING</h2>
        <div style="font-size: 14px;">
          <a href="index.php" class="text-secondary text-decoration-none">HOME</a>
          <span class="text-secondary"> > </span>
          <a href="rooms.php" class="text-secondary text-decoration-none">ROOMS</a>
          <span class="text-secondary"> > </span>
          <a href="#" class="text-secondary text-decoration-none">CONFIRM</a>
        </div>
      </div>
      <div class="col-lg-7 col-md-12 px-4">
        <!-- Tog= get the image from table -->
        <?php
        $room_thumb = ROOMS_IMG_PATH . "thumbnail.jpg";
        $thumb_q = mysqli_query($con, "SELECT * FROM `room_images` 
            WHERE `room_id`='$room_data[id]' 
            AND `thumb`='1'");

        if (mysqli_num_rows($thumb_q) > 0) {
          $thumb_res = mysqli_fetch_assoc($thumb_q);
          $room_thumb = ROOMS_IMG_PATH . $thumb_res['image'];
        }

        echo <<<data
            <div class="card p-3 shadow-sm rounded">
              <img src="$room_thumb" class="img-fluid rounded mb-3">
              <h3 class="fw-bold" style="font-family: 'Kaushan Script', cursive">$room_data[name]</h3>
              <h5 class="fw-bold">₹$room_data[price] per night</h5>
            </div>
          data;

        ?>
      </div>
      <!-- To get the USer and room data -->
      <div class="col-lg-5 col-md-12 px-4">
        <div class="card mb-4 border-0 shadow rounded-3">
          <div class="card-body">
            <form action="#" method="POST" id="booking_form">
              <h4 class="mb-3 fw-bold" style="font-family: 'Kaushan Script', cursive">BOOKING DETAILS</h4>
              <div class="row">
                <div class="col-md-6 mb-3">
                  <label class="form-label fw-bold">Name</label>
                  <input name="name" type="text" value="<?php echo $user_data['name'] ?>" id="name" class="form-control shadow-none" required>
                </div>
                <div class="col-md-6 mb-3 d-none">
                  <label class="form-label fw-bold">Room Name</label>
                  <input name="rname" type="text" value="<?php echo $room_data['name'] ?>" id="rname" class="form-control shadow-none" required disabled>
                </div>
                <div class="col-md-6 mb-3">
                  <label class="form-label fw-bold">Phone Number</label>
                  <input name="phonenum" type="number" id="phonenum" value="<?php echo $user_data['phonenum'] ?>" class="form-control shadow-none" required>
                </div>
                <div class="col-md-12 mb-3">
                  <label class="form-label fw-bold">Address</label>
                  <textarea name="address" class="form-control shadow-none" rows="3" id="adress" required><?php echo $user_data['address'] ?></textarea>
                </div>
                <div class="col-md-6 mb-3">
                  <label class="form-label fw-bold">Check-in</label>
                  <input name="checkin" id="check-in" onchange="check_availability()" type="date" class="form-control shadow-none" required>
                </div>
                <div class="col-md-6 mb-4">
                  <label class="form-label fw-bold">Check-out</label>
                  <input name="checkout" id="check-out" onchange="check_availability()" type="date" class="form-control shadow-none" required>
                </div>
                <div class="col-12">
                  <div class="spinner-border text-info mb-3 d-none" id="info_loader" role="status">
                    <span class="visually-hidden">Loading...</span>
                  </div>
                  <div class="mb-3">
                    <label for="pwd" class="form-label fw-bold">Amount:</label>
                    <input type="text" class="form-control shadow-none fw-bold" id="amount" placeholder="Enter the Amount in Rupees" name="amount">
                    <input type="text" class="form-control shadow-none fw-bold d-none " id="days" name="days">
                  </div>
                  <h6 class="mb-3 text-danger fw-bold" id="pay_info">Provide check-in & check-out date !</h6>
                  <button type="button" class="btn btn-primary w-100 fw-bold" id="rzp-button1" onclick="paye_now()">Pay Now</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="container mt-3" style="width: 50%;">
    <form action="#">
    </form>
  </div>
</body>
</html>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script type="text/javascript">
  // Razor pay codes
  function paye_now() {
    //get the input from the form
    var name = $("#name").val();
    var phonenum = $("#phonenum").val();
    var amount = $("#amount").val();
    var actual_amount = amount * 100;
    var adress = $("#adress").val();
    var rname = $("#rname").val();
    var days = $("#days").val();
    var options = {
      "key": "rzp_test_4Nu86yCUrJGyZe", // Enter the Key ID generated from the Dashboard
      "amount": actual_amount, // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
      "currency": "INR",
      "name": name,
      "image": "razorpay.png",
      "handler": function(response) {
        console.log(response);
        $.ajax({
          url: 'process_payment.php',
          'type': 'POST',
          'data': {
            'payment_id': response.razorpay_payment_id,
            'amount': amount,
            'name': name,
            'phonenum': phonenum,
            'adress': adress,
            'rname': rname,
            'days': days
          },
          success: function(data) {
            console.log(data);
            window.location.href = 'thank_you.php';
          }
        });
      },
    };
    var rzp1 = new Razorpay(options);
    rzp1.on('payment.failed', function(response) {
      alert(response.error.code);
      alert(response.error.description);
      alert(response.error.source);
      alert(response.error.step);
      alert(response.error.reason);
      alert(response.error.metadata.order_id);
      alert(response.error.metadata.payment_id);
    });
    document.getElementById('rzp-button1').onclick = function(e) {
      rzp1.open();
      e.preventDefault();
    }
  }
</script>

<?php require('inc/footer.php'); ?>
<!-- javascript code for form payment only the chk-in & out is provided and validation -->
<script>
  let booking_form = document.getElementById('booking_form');
  let info_loader = document.getElementById('info_loader');
  let pay_info = document.getElementById('pay_info');

  function check_availability() {
    let checkin_val = booking_form.elements['checkin'].value;
    let checkout_val = booking_form.elements['checkout'].value;

    if (checkin_val != '' && checkout_val != '') {
      pay_info.classList.add('d-none');
      pay_info.classList.replace('text-dark', 'text-danger');
      info_loader.classList.remove('d-none');

      let data = new FormData();

      data.append('check_availability', '');
      data.append('check_in', checkin_val);
      data.append('check_out', checkout_val);

      let xhr = new XMLHttpRequest();
      xhr.open("POST", "ajax/confirm_booking.php", true);

      xhr.onload = function() {
        let data = JSON.parse(this.responseText);

        if (data.status == 'check_in_out_equal') {
          pay_info.innerText = "You cannot check-out on the same day!";
        } else if (data.status == 'check_out_earlier') {
          pay_info.innerText = "Check-out date is earlier than check-in date!";
        } else if (data.status == 'check_in_earlier') {
          pay_info.innerText = "Check-in date is earlier than today's date!";
        } else if (data.status == 'unavailable') {
          pay_info.innerText = "Room not available for this check-in date!";
        } else {
          var dataPay = data.payment;
          pay_info.innerHTML = "No. of Days: " + data.days + "<br>Total Amount to Pay: ₹" + dataPay;
          pay_info.classList.replace('text-danger', 'text-dark');
          document.getElementById('amount').value = dataPay;
          document.getElementById('days').value = data.days;
          pay_info.classList.add('d-none');
        }
        pay_info.classList.remove('d-none');
        info_loader.classList.add('d-none');
      }
      xhr.send(data);
    }
  }
</script>
</body>
</html>