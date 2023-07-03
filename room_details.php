<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php require('inc/links.php'); ?>
  <title><?php echo $settings_r['site_title'] ?> - ROOM DETAILS</title>
</head>

<body class="bg-light">
  <?php require('inc/header.php'); ?>
  <?php
  if (!isset($_GET['id'])) {
    redirect('rooms.php');
  }
  $data = filteration($_GET);
  $room_res = select("SELECT * FROM `rooms` WHERE `id`=? AND `status`=? AND `removed`=?", [$data['id'], 1, 0], 'iii');
  if (mysqli_num_rows($room_res) == 0) {
    redirect('rooms.php');
  }
  $room_data = mysqli_fetch_assoc($room_res);
  ?>
  <!-- Room detail section -->
  <div class="container">
    <div class="row">
      <div class="col-12 my-5 mb-4 px-4">
        <h2 class="fw-bold" style="font-family: 'Kaushan Script', cursive" data-aos="fade-down" data-aos-duration="1500"><?php echo $room_data['name'] ?></h2>
        <div style="font-size: 14px;" data-aos="fade-right" data-aos-duration="1500">
          <a href="index.php" class="text-secondary text-decoration-none">HOME</a>
          <span class="text-secondary"> > </span>
          <a href="rooms.php" class="text-secondary text-decoration-none">ROOMS</a>
        </div>
      </div>
      <!-- room image slider bootstrap -->
      <div class="col-lg-7 col-md-12 px-4" data-aos="fade-down" data-aos-duration="2000">
        <div id="roomCarousel" class="carousel slide" data-bs-ride="carousel">
          <div class="carousel-inner">
            <?php
            $room_img = ROOMS_IMG_PATH . "thumbnail.jpg";
            $img_q = mysqli_query($con, "SELECT * FROM `room_images` 
                     WHERE `room_id`='$room_data[id]'");
            if (mysqli_num_rows($img_q) > 0) {
              $active_class = 'active';
              while ($img_res = mysqli_fetch_assoc($img_q)) {
                echo "
                    <div class='carousel-item $active_class'>
                      <img src='" . ROOMS_IMG_PATH . $img_res['image'] . "' class='d-block w-100 rounded'>
                    </div>
                  ";
                $active_class = '';
              }
            } else {
              echo "<div class='carousel-item active'>
                  <img src='$room_img' class='d-block w-100'>
                </div>";
            }
            ?>
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#roomCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#roomCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
      </div>

      <!-- Room detail card -->
      <div class="col-lg-5 col-md-12 px-4">
        <div class="card mb-4 border-0 shadow rounded-3" data-aos="fade-left" data-aos-duration="2000">
          <div class="card-body">
            <?php
            // price
            echo <<<price
                <h4 class="fw-bold">₹$room_data[price] per night</h4>
              price;

            $fea_q = mysqli_query($con, "SELECT f.name FROM `features` f 
                INNER JOIN `room_features` rfea ON f.id = rfea.features_id 
                WHERE rfea.room_id = '$room_data[id]'");
            $features_data = "";
            while ($fea_row = mysqli_fetch_assoc($fea_q)) {
              $features_data .= "<span class='badge rounded-pill bg-danger text-white text-wrap me-1 mb-1'>
                  $fea_row[name]
                </span>";
            }
            // features
            echo <<<features
                <div class="mb-3">
                  <h6 class="mb-1 fw-bold">Features</h6>
                  $features_data
                </div>
              features;
            $fac_q = mysqli_query($con, "SELECT f.name FROM `facilities` f 
                INNER JOIN `room_facilities` rfac ON f.id = rfac.facilities_id 
                WHERE rfac.room_id = '$room_data[id]'");
            $facilities_data = "";
            while ($fac_row = mysqli_fetch_assoc($fac_q)) {
              $facilities_data .= "<span class='badge rounded-pill bg-danger text-white text-wrap me-1 mb-1'>
                  $fac_row[name]
                </span>";
            }
            // facilities
            echo <<<facilities
                <div class="mb-3">
                  <h6 class="mb-1 fw-bold">Facilities</h6>
                  $facilities_data
                </div>
              facilities;
              // geust
            echo <<<guests
                <div class="mb-3">
                  <h6 class="mb-1 fw-bold">Guests</h6>
                  <span class="badge rounded-pill bg-danger text-white text-wrap">
                    $room_data[adult] Adults
                  </span>
                  <span class="badge rounded-pill bg-danger text-white text-wrap">
                    $room_data[children] Children
                  </span>
                </div>
              guests;
              // area
            echo <<<area
                <div class="mb-3">
                  <h6 class="mb-1 fw-bold">Area</h6>
                  <span class='badge rounded-pill bg-danger text-white text-wrap me-1 mb-1'>
                    $room_data[area] sq. ft.
                  </span>
                </div>
              area;
            if (!$settings_r['shutdown']) {
              $login = 0;
              if (isset($_SESSION['login']) && $_SESSION['login'] == true) {
                $login = 1;
              }
              echo <<<book
                  <button onclick='checkLoginToBook($login,$room_data[id])' class="btn w-100 fw-bold btn-outline-danger shadow-none mb-1">Book Now</button>
                book;
            }
            ?>
          </div>
        </div>
      </div>
      <!-- description -->
      <div class="col-12 mt-4 px-4" data-aos="fade-in" data-aos-duration="1500">
        <div class="mb-5">
          <h5>Description</h5>
          <p>
            <?php echo $room_data['description'] ?>
          </p>
        </div>
      </div>
    </div>
  </div>
  <?php require('inc/footer.php'); ?>
</body>
</html>