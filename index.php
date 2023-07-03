<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Link to all css -->
  <?php require('inc/links.php'); ?>
  <!-- Title of website -->
  <title><?php echo $settings_r['site_title'] ?> - HOME</title>
  <style>
    /* Chrome scroll bar */
    ::-webkit-scrollbar {
      width: 10px;
      position: fixed;
    }

    /* Track */
    ::-webkit-scrollbar-track {
      background: #f1f1f1;
    }

    /* Handle */
    ::-webkit-scrollbar-thumb {
      background: rgb(36, 36, 36);
    }

    /* Handle on hover */
    ::-webkit-scrollbar-thumb:hover {
      background: #4169e1;
    }

    /* Body */
    body {
      background: #f1fbff;
      scroll-behavior: smooth;
    }

    /* Section */
    .section-padding {
      padding: 50px 0;
    }

    /* 100% width and height */
    .w-100 {
      height: 100vh;
    }

    /* CArousel */
    .carousel-item {
      height: 92vh;
      min-height: 300px;
    }

    .carousel-caption {
      bottom: 220px;
      z-index: 2;
    }

    .carousel-caption h5 {
      font-size: 45px;
      text-transform: uppercase;
      letter-spacing: 2px;
      margin-top: 25px;
      font-family: 'Kaushan Script', cursive;
    }

    .carousel-caption p {
      width: 60%;
      margin: auto;
      font-size: 18px;
      line-height: 1.9;
    }

    .carousel-caption .btn {
      color: #fff;
      font-size: 21px;
      font-weight: 500;
    }

    .carousel-inner:before {
      content: '';
      position: absolute;
      width: 100%;
      height: 100%;
      top: 0;
      left: 0;
      background: rgba(0, 0, 0, 0.7);
      z-index: 1;
    }

    /* Booking slot css */
    .booking-slot {
      background: #4169e1;
      margin-top: -80px;
      padding: 50px 30px;
      position: relative;
      z-index: 999;
      box-shadow: 15px 15px 40px rgba(0, 0, 0, 0.5);
    }

    .slot-heading {
      color: #fff;
      margin-bottom: 15px;
      position: absolute;
      top: 18px;
      font-weight: 900;
      max-width: 320px;
      font-size: 28px;

    }

    .slot-heading::after {
      content: '';
      height: 2px;
      width: 80%;
      background-color: #fff;
      position: absolute;
      left: 10px;
      bottom: 0;
    }

    label {
      color: #f1fbff;
      font-size: 18px;
      font-weight: 700;
    }

    #Submit-btn {
      background-color: #fff;
      font-weight: 700;
    }

    #Submit-btn:hover {
      background: rgb(111, 225, 65);
      border: none;
      color: #fff;
    }

    /*  About*/
    .about h1 {
      font-family: 'kaushan Script', cursive;
      font-weight: 800;
    }

    .about .btn {
      color: #fff;
      font-size: 18px;
      font-weight: 500;
      border: none;
    }

    .about .btn:hover {
      background: rgb(111, 225, 65);

    }

    /* HIGHLIGHT Card*/
    .facility-card {
      background: #FFF94F;
      text-transform: uppercase;
      box-shadow: 15px 15px 40px rgba(0, 0, 0, 0.45) !important;
    }

    .facility-card:hover {
      background: linear-gradient(90deg, #f8ff00 0%, #3ad59f 100%);
      transform: scale(1.15);
      transition: all 0.9s ease;
    }

    .icon-svg {
      width: 60px;
    }

    .icon-text {
      font-size: 20px;
      text-align: center;
      padding-top: 10px;
    }
  </style>
</head>

<body class="bg-light">
  <?php require('inc/header.php'); ?>
  <!-- Carousel section(slider) -->
  <div class="carousel slide" data-bs-ride="carousel" id="carouselExampleIndicators">
    <div class="carousel-indicators">
      <button aria-label="Slide 1" class="active" data-bs-slide-to="0" data-bs-target="#carouselExampleIndicators" type="button"></button> <button aria-label="Slide 2" data-bs-slide-to="1" data-bs-target="#carouselExampleIndicators" type="button"></button> <button aria-label="Slide 3" data-bs-slide-to="2" data-bs-target="#carouselExampleIndicators" type="button"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img alt="Hotel banner image 1" class="d-block w-100" src="images\carousel\c1.jpg">
        <div class="carousel-caption">
          <h5>Star Paradise</h5>
          <p>A complete 5-Star Luxury Hotel with Premium<br><b><i>Quality and Service</i></b></p>
          <p><a class="btn btn-outline-primary mt-3" href="#about">Explore</a></p>
        </div>
      </div>
      <div class="carousel-item">
        <img alt="Hotel banner image 2" class="d-block w-100" src="images\carousel\c2.jpg">
        <div class="carousel-caption">
          <h5>Star Paradise</h5>
          <p>Experience luxury in the lap of nature<br><b><i>Best view with the best food</i></b></p>
          <p><a class="btn btn-outline-primary mt-3" href="#about">Explore</a></p>
        </div>
      </div>
      <div class="carousel-item">
        <img alt="Hotel banner image 3" class="d-block w-100" src="images\carousel\c3.jpg">
        <div class="carousel-caption">
          <h5>Star Paradise</h5>
          <p>Spend your vacation luxuriously<br><b><i>An iconic Experience…let's feel it</i></b></p>
          <p><a class="btn btn-outline-primary mt-3" href="#about">Explore</a></p>
        </div>
      </div>
    </div>
    <button class="carousel-control-prev" data-bs-slide="prev" data-bs-target="#carouselExampleIndicators" type="button"><span aria-hidden="true" class="carousel-control-prev-icon"></span> <span class="visually-hidden">Previous</span></button> <button class="carousel-control-next" data-bs-slide="next" data-bs-target="#carouselExampleIndicators" type="button"><span aria-hidden="true" class="carousel-control-next-icon"></span> <span class="visually-hidden">Next</span></button>
  </div>

  <!-- check availability form -->
  <div class="container booking-slot availability-form" data-aos="fade-in" data-aos-duration="2000">
    <div class="row">
      <h3 class="slot-heading">Reservation Slot</h3>
      <form class="row align-items-center col-lg pt-2" action="rooms.php">
        <div class="col-lg mb-3 mb-lg-0">
          <label for="date" class="ps-2">Check in:</label>
          <input type="date" placeholder="Date" name="checkin" class="form-control text-center text-uppercase" required>
        </div>
        <div class="col-lg mb-3 mb-lg-0">
          <label for="date" class="ps-2">Check out:</label>
          <input type="date" placeholder="Date" class="form-control text-center text-uppercase" name="checkout" required>
        </div>
        <div class="col-lg mb-3 mb-lg-0">
          <label for="Adult" class="ps-2">No of Adult:</label>
          <select name="adult" class="form-select">
            <?php
            $guests_q = mysqli_query($con, "SELECT MAX(adult) AS `max_adult`, MAX(children) AS `max_children` 
              FROM `rooms` WHERE `status`='1' AND `removed`='0'");
            $guests_res = mysqli_fetch_assoc($guests_q);

            for ($i = 1; $i <= $guests_res['max_adult']; $i++) {
              echo "<option value='$i'>$i</option>";
            }
            ?>
          </select>
        </div>
        <div class="col-lg mb-3 mb-lg-0">
          <label for="children" class="ps-2">No of children:</label>
          <select class="form-select" name="children">
            <?php
            for ($i = 1; $i <= $guests_res['max_children']; $i++) {
              echo "<option value='$i'>$i</option>";
            }
            ?>
          </select>
        </div>
        <input type="hidden" name="check_availability">
        <div class="col-lg mb-3 mb-lg-0">
          <button type="submit" class="btn mt-4" id="Submit-btn">Check Availablity</button>
        </div>
      </form>
    </div>
  </div>
  <!-- Slot booking Ends -->

  <!-- about section starts -->
  <section class="about section-padding" id="about">
    <div class="container">
      <div class="row">
        <h1 class="text-center" data-aos="fade-down" data-aos-duration="2000">About us</h1>
        <div class="col-lg-4 col-md-12 col-12 mb-sm-1">
          <div data-aos="fade-right" data-aos-duration="2000" class="about-img"><img alt="" class="img-fluid" src="images\A-2.jpeg"></div>
        </div>
        <div class="col-lg-8 col-md-12 col-12 ps-lg-5 mt-md-5 mt-sm-5">
          <div class="about-text " data-aos="fade-left" data-aos-duration="2000">
            <h2 class="text-muted"><b>Welcome to Star Paradise</b></h2>
            <p class="p-font">Star Paradise is a luxurious 5-star hotel located in the bustling city of Chennai, India. The hotel offers guests a variety of amenities, including a state-of-the-art fitness center, an outdoor swimming pool, and several on-site dining options. The spacious guest rooms and suites are elegantly appointed and feature comfortable bedding, flat-screen TVs, and complimentary Wi-Fi. Guests can also take advantage of the hotel's business center and on-site meeting and event spaces. The hotel's prime location in Chennai puts guests within easy reach of many popular attractions and destinations, including beaches, temples, and shopping districts.</p>
            <a class="btn btn-primary " href="about.php" data-aos="fade-up" data-aos-duration="2000">More about us</a>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- about section Ends -->

  <!-- Our Facilities -->
  <h2 class="mt-4 pt-3 mb-2 text-center text-uppercase fw-bold h-font" style="font-family: 'Kaushan Script', cursive" data-aos="fade-down" data-aos-duration="2000">Hotel Highlight</h2>
  <div class="h-line bg-dark" data-aos="fade-down" data-aos-duration="2000"></div>
  <h4 class=" mb-4 text-muted text-center pt-2" data-aos="fade-down" data-aos-duration="2000">Facilities and Amenities</h4>
  <div class="container">
    <div class="row justify-content-evenly px-lg-0 px-md-0 px-5">
      <?php
      $res = mysqli_query($con, "SELECT * FROM `facilities` ORDER BY `id` DESC LIMIT 5");
      $path = FACILITIES_IMG_PATH;

      while ($row = mysqli_fetch_assoc($res)) {
        echo <<<data
            <div class="col-lg-2 col-md-2 text-center rounded shadow py-2 my-3  facility-card" data-aos="flip-left" data-aos-easing="ease-out-cubic" data-aos-duration="1500">
              <img src="$path$row[icon]" class="icon-svg mt-4 pb-2" >
              <p  class="mt-3 mb-3 text-dark fw-bold icon-text" >$row[name]</p>
            </div>
          data;
      }
      ?>

      <div class="col-lg-12 text-center mt-5">
        <a href="facilities.php" class="btn btn-primary rounded fw-bold shadow-none" data-aos="fade-up" data-aos-duration="2000">More Facilities >>></a>
      </div>
    </div>
  </div>
  <!-- Our facilities end -->


  <!-- Our Rooms -->
  <h2 class="mt-5 pt-4  text-center fw-bold h-font" data-aos="fade-down" data-aos-duration="2000" style="font-family: 'Kaushan Script', cursive">OUR ROOMS</h2>
  <div class="h-line bg-dark mb-4" data-aos="fade-down" data-aos-duration="2000"></div>
  <div class="container">
    <div class="row">
      <?php
      $room_res = select("SELECT * FROM `rooms` WHERE `status`=? AND `removed`=? ORDER BY `id` DESC LIMIT 3", [1, 0], 'ii');
      while ($room_data = mysqli_fetch_assoc($room_res)) {

        // get features of room
        $fea_q = mysqli_query($con, "SELECT f.name FROM `features` f 
            INNER JOIN `room_features` rfea ON f.id = rfea.features_id 
            WHERE rfea.room_id = '$room_data[id]'");
        $features_data = "";
        while ($fea_row = mysqli_fetch_assoc($fea_q)) {
          $features_data .= "<span class='badge rounded-pill text-bg-danger text-wrap me-1 mb-1'>
              $fea_row[name]
            </span>";
        }
        // get facilities of room
        $fac_q = mysqli_query($con, "SELECT f.name FROM `facilities` f 
            INNER JOIN `room_facilities` rfac ON f.id = rfac.facilities_id 
            WHERE rfac.room_id = '$room_data[id]'");
        $facilities_data = "";
        while ($fac_row = mysqli_fetch_assoc($fac_q)) {
          $facilities_data .= "<span class='badge rounded-pill text-bg-danger text-wrap me-1 mb-1'>
              $fac_row[name]
            </span>";
        }
        // get thumbnail of image
        $room_thumb = ROOMS_IMG_PATH . "thumbnail.jpg";
        $thumb_q = mysqli_query($con, "SELECT * FROM `room_images` 
            WHERE `room_id`='$room_data[id]' 
            AND `thumb`='1'");
        if (mysqli_num_rows($thumb_q) > 0) {
          $thumb_res = mysqli_fetch_assoc($thumb_q);
          $room_thumb = ROOMS_IMG_PATH . $thumb_res['image'];
        }
        $book_btn = "";
        if (!$settings_r['shutdown']) {
          $login = 0;
          if (isset($_SESSION['login']) && $_SESSION['login'] == true) {
            $login = 1;
          }
          $book_btn = "<button onclick='checkLoginToBook($login,$room_data[id])' class='btn btn-primary fw-bold text-white  shadow-none'>Book Now</button>";
        }
        

        // print room card
        echo <<<data
            <div class="col-lg-4 col-md-6 my-3" data-aos="zoom-in" data-aos-duration="2000">
              <div class="card border-0 shadow" style="max-width: 350px; margin: auto;">
                <img src="$room_thumb" class="card-img-top">
                <div class="card-body">
                  <h2 style="font-family: 'Courgette', cursive;" class="fw-bold">$room_data[name]</h2>
                  <h6 class="mb-4 fw-bold">₹$room_data[price] per night</h6>
                  <div class="features mb-4">
                    <h5 class="mb-1 fw-bold">Features</h5>
                  
                    $features_data
                  </div>
                  <div class="facilities mb-4">
                    <h5 class="mb-1 fw-bold">Facilities</h5>
                    $facilities_data
                  </div>
                  <div class="guests mb-4">
                    <h4 class="mb-1 fw-bold">Guests</h4>
                    <span class="badge rounded-pill text-bg-danger text-wrap">
                      $room_data[adult] Adults
                    </span>
                    <span class="badge rounded-pill text-bg-danger text-wrap">
                      $room_data[children] Children
                    </span>
                  </div>
                  <div class="d-flex justify-content-evenly mb-2">
                    $book_btn
                    <a href="room_details.php?id=$room_data[id]" class="btn fw-bold btn-outline-dark shadow-none">More details</a>
                  </div>
                </div>
              </div>
            </div>
          data;
      }
      ?>
      <div class="col-lg-12 text-center mt-5">
        <a href="rooms.php" class="btn btn-primary fw-bold shadow-none">More Rooms</a>
      </div>
    </div>
  </div>

  <!-- Password reset modal and code -->
  <div class="modal fade" id="recoveryModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <form id="recovery-form">
          <div class="modal-header">
            <h5 class="modal-title d-flex align-items-center">
              <i class="bi bi-shield-lock fs-3 me-2"></i> Set up New Password
            </h5>
          </div>
          <div class="modal-body">
            <div class="mb-4">
              <label class="form-label">New Password</label>
              <input type="password" name="pass" required class="form-control shadow-none">
              <input type="hidden" name="email">
              <input type="hidden" name="token">
            </div>
            <div class="mb-2 text-end">
              <button type="button" class="btn shadow-none me-2" data-bs-dismiss="modal">CANCEL</button>
              <button type="submit" class="btn btn-primary fw-bold shadow-none">SUBMIT</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>


  <?php require('inc/footer.php'); ?>
  <!-- Account recovery -->
  <?php
  if (isset($_GET['account_recovery'])) {
    $data = filteration($_GET);
    $t_date = date("Y-m-d");
    $query = select(
      "SELECT * FROM `user_cred` WHERE `email`=? AND `token`=? AND `t_expire`=? LIMIT 1",
      [$data['email'], $data['token'], $t_date],
      'sss'
    );

    if (mysqli_num_rows($query) == 1) {
      echo <<<showModal
          <script>
            var myModal = document.getElementById('recoveryModal');
            myModal.querySelector("input[name='email']").value = '$data[email]';
            myModal.querySelector("input[name='token']").value = '$data[token]';
            var modal = bootstrap.Modal.getOrCreateInstance(myModal);
            modal.show();
          </script>
        showModal;
    } else {
      alert("error", "Invalid or Expired Link !");
    }
  }
  ?>
  <script>
    // recover account
    let recovery_form = document.getElementById('recovery-form');

    recovery_form.addEventListener('submit', (e) => {
      e.preventDefault();

      let data = new FormData();

      data.append('email', recovery_form.elements['email'].value);
      data.append('token', recovery_form.elements['token'].value);
      data.append('pass', recovery_form.elements['pass'].value);
      data.append('recover_user', '');

      var myModal = document.getElementById('recoveryModal');
      var modal = bootstrap.Modal.getInstance(myModal);
      modal.hide();

      let xhr = new XMLHttpRequest();
      xhr.open("POST", "ajax/login_register.php", true);

      xhr.onload = function() {
        if (this.responseText == 'failed') {
          alert('error', "Account reset failed!");
        } else {
          alert('success', "Account Reset Successful !");
          recovery_form.reset();
        }
      }
      xhr.send(data);
    });
  </script>
</body>
</html>