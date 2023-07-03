<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php require('inc/links.php'); ?>
  <title><?php echo $settings_r['site_title'] ?> - FACILITIES</title>
  <style>
    /* Section */
    .section-padding {
      padding: 50px 0;
    }
    /* 100% width and height */
    .w-100 {
      height: 100vh;
    }

    .facility-card {
      background: #FFF94F;
      box-shadow: 15px 15px 40px rgba(0, 0, 0, 0.45) !important;
      height: 100%;
      width: 250px;
    }

    .facility-card:hover {
      background: linear-gradient(90deg, #f8ff00 0%, #3ad59f 100%);
      transform: scale(1.09);
      transition: all 0.9s ease;
    }

    .desc-f {
      font-size: 16px;
      font-weight: 500;
      align-items: center;
      justify-content: center;
      padding-top: 5px;
    }

    .sample {
      width: 100%;
      height: 100%;
      border: 0;
      border-radius: 15px;
      position: relative;

    }

    .img-align {
      justify-content: center;
      padding: 10px 180px;
      border: none;
    }

    .images {
      object-fit: fill;
      box-shadow: 15px 15px 40px rgba(0, 0, 0, 0.55) !important;
    }


    .event-desc {
      width: 80%;
      position: absolute;
      bottom: 0;
      left: 50%;
      opacity: 0;
      transform: translateX(-50%);
      transition: 1s;
      text-align: center;
    }

    hr {
      background: #fff;
      height: 4px;
      border: 0;
      margin: 15px auto;
      width: 60%;
    }

    .event-desc p {
      font-size: 14px;
      color: #fff;
    }

    .sample:hover .event-desc {
      bottom: 15%;
      opacity: 1;
      background: rgba(0, 0, 0, 0.85)
    }

    @media only screen and (max-width: 842px) {
      .img-align {
        padding: 0px 30px !important;
      }

      .images {
        margin-top: 30px;
      }
    }

    @media only screen and (max-width: 960px) {
      .img-align {
        padding: 0px !important;
      }

      .images {
        margin-top: 30px;
      }
    }

    @media only screen and (max-width: 1350px) {
      .img-align {
        padding: 0px 120px;
      }

      .images {
        margin-top: 30px;
      }
    }
  </style>
</head>

<body class="bg-light">

  <?php require('inc/header.php'); ?>
<!-- Our facilties section -->
  <div class="my-5 px-4">
    <h2 class="fw-bold h-font text-center" style="font-family: 'Kaushan Script', cursive" data-aos="fade-up" data-aos-duration="1500">OUR FACILITIES</h2>
    <div class="h-line bg-dark" data-aos="zoom-in-up" data-aos-duration="2000"></div>
    <p class="text-center mt-3 fw-bold" data-aos="zoom-in-up" data-aos-duration="2500">
      Star Paradise 5-star hotel boasts world-class facilities including a luxurious spa, outdoor swimming pool,<br> and fully-equipped fitness center for guests to enjoy. The hotel also offers<br> top-notch dining options and conference rooms for business meetings or special events.
    </p>
  </div>

  <div class="container">
    <div class="row">
      <!-- Getting facilities detail from the table -->
      <?php
      $res = selectAll('facilities');
      $path = FACILITIES_IMG_PATH;
      while ($row = mysqli_fetch_assoc($res)) {
        echo <<<data
            <div class="col-lg-3 col-md-6 mb-5 px-4" data-aos="flip-left" data-aos-duration="2000" >
              <div class=" rounded-3 shadow p-4  facility-card" >
                <div class="d-flex align-items-center mb-2">
                  <img src="$path$row[icon]" width="40px">
                  <h5 class="m-0 ms-3 fw-bold">$row[name]</h5>
                </div>
                <p class="desc-f">$row[description]</p>
              </div>
            </div>
          data;
      }
      ?>
    </div>
  </div>
  <section class="section-padding">
    <!-- Our Event section -->
    <div class="event">
      <h2 class="fw-bold h-font text-center" style="font-family: 'Kaushan Script', cursive" data-aos="fade-up" data-aos-duration="1500">OUR EVENT</h2>
      <div class="h-line bg-dark" data-aos="zoom-in-up" data-aos-duration="2000"></div>
      <p class="text-center mt-3 fw-bold" data-aos="zoom-in-up" data-aos-duration="2500">
        At Star Paradise 5-star hotel, we offer exceptional event
        services for weddings, conferences, and other special occasions. <br> dolore commodi repudiandae
        Our experienced event planning team works closely with clients to ensure that every <br>
        detail is taken care of, from catering to audiovisual equipment, to make your event a memorable success.
      </p>
    </div>
    <div class="container">
      <div class="row img-align pt-3">
        <div class="col-lg-6 col-md-12">
          <div class="sample" data-aos="fade-down-right" data-aos-duration="2000">
            <img src="images\event\c-5.jpg" alt="img1" class="img-fluid rounded-4 images">
            <div class="event-desc">
              <h3 class="text-white fw-bold pt-2">Carnival</h3>
              <hr>
              <p class="text-white fw-bold">Experience the vibrant energy of Carnival at Star Paradise 5-star hotel, with festive parades, live music, and colorful costumes.</p>
            </div>
          </div>
        </div>
        <div class="col-lg-6 col-md-12">
          <div class="sample" data-aos="fade-down-left" data-aos-duration="2000">
            <img src="images\event\c-2.jpg" alt="img1" class="img-fluid rounded-4 images">
            <div class="event-desc">
              <h3 class="text-white fw-bold pt-2">Conference room</h3>
              <hr>
              <p class="text-white fw-bold">Our conference room offers ample space, state-of-the-art technology and amenities for successful meetings, seminars and events.</p>
            </div>
          </div>
        </div>
      </div>
      <div class="row pt-2 img-align pt-3">

        <div class="col-lg-7 col-md-12 align-items-center">
          <div class="sample" data-aos="zoom-in" data-aos-duration="2000">
            <img src="images\event\c-4.jpg" alt="img1" class="img-fluid rounded-4 images">
            <div class="event-desc">
              <h3 class="text-white fw-bold pt-2">Ambassador meeting</h3>
              <hr>
              <p class="text-white fw-bold">"Exclusive Ambassador meetings with personalized service and luxurious amenities in a private, upscale setting."</p>
            </div>
          </div>
        </div>
      </div>
      <div class="row pt-2 img-align pt-3">
        <div class="col-lg-6 col-md-12">
          <div class="sample" data-aos="fade-up-right" data-aos-duration="2000">
            <img src="images\event\c-8.jpg" alt="img1" class="img-fluid rounded-4 images">
            <div class="event-desc">
              <h3 class="text-white fw-bold pt-2">Wedding</h3>
              <hr>
              <p class="text-white fw-bold">Unforgettable weddings in a stunning setting, with exceptional catering and personalized service for your special day.</p>
            </div>
          </div>
        </div>
        <div class="col-lg-6 col-md-12">
          <div class="sample" data-aos="fade-up-left" data-aos-duration="2000">
            <img src="images\event\c-3.jpg" alt="img1" class="img-fluid rounded-4 images">
            <div class="event-desc">
              <h3 class="text-white fw-bold pt-2">Business meeting</h3>
              <hr>
              <p class="text-white fw-bold">"Professional business meetings with modern amenities, comfortable settings, and attentive service for successful outcomes."</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <?php require('inc/footer.php'); ?>
</body>
</html>