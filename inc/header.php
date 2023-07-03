<style>
  @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;700&display=swap');
  @import url('https://fonts.googleapis.com/css2?family=Kaushan+Script&display=swap');
  @import url('https://fonts.googleapis.com/css2?family=Courgette&display=swap');
  @import url('https://fonts.googleapis.com/css2?family=Rubik&display=swap');

  * {
    font-family: 'Montserrat', sans-serif;
  }

  .navbar .getstarted {
    background: #106eea;
    margin-left: 30px;
    border-radius: 4px;
    font-weight: 400;
    color: #fff;
    text-decoration: none;
    padding: .5rem 1rem;
    line-height: 2.3;
  }

  nav {
    box-shadow: 0 2px 4px 0 rgba(0, 0, 0, .2);
  }

  .navbar-nav a {
    font-size: 16px;
    text-transform: uppercase;
    font-weight: 600;
  }

  .navbar-light .navbar-brand {
    color: #D1B000;
    font-size: 28px;
    text-transform: uppercase;
    font-weight: bold;
    letter-spacing: 2px;
  }

  .navbar-light .navbar-brand:focus,
  .navbar-light .navbar-brand:hover {
    color: #106eea;
    transition: all 0.3;
  }

  .navbar-light .navbar-nav .nav-link {
    color: #000;
    transition: all 0.5s;
    position: relative;
    font-weight: 700;
  }

  .navbar-light .navbar-nav .nav-link::after {
    content: '';
    height: 2px;
    width: 100%;
    background-color: #4169e1;
    position: absolute;
    bottom: 0;
    left: 0;
    opacity: 0;
  }

  .navbar-light .navbar-nav .nav-link:focus,
  .navbar-light .navbar-nav .nav-link:hover {
    color: #4169e1;
  }

  .navbar-light .navbar-nav .nav-link:hover::after {
    opacity: 1;
  }

  .nav-btn {
    color: #fff;
    font-size: 18px !important;
    font-weight: 500;
  }

  /* Form style */
  .title {
    position: relative;
    font-size: 27px;
    font-weight: 600;
  }

  .title::before {
    content: '';
    position: absolute;
    left: 0;
    bottom: 0;
    height: 3px;
    width: 30px;
    background-color: #4070f4;
    border-radius: 25px;
  }

  /* input grp */
  .input-group {
    position: relative;
    height: 50px;
    width: 100%;
  }

  .input-group input {
    position: absolute;
    height: 100%;
    width: 100%;
    padding: 0 35px;
    border: none;
    outline: none;
    font-size: 18px;
    border-bottom: 2px solid #ccc;
    border-radius: 0;
    border-top: 2px solid transparent !important;
    transition: all 0.2s ease;
  }

  .input-group input:is(:valid, :focus) {
    border-bottom-color: #4070f4;
  }

  .input-group i {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    color: #999;
    font-size: 23px;
    z-index: 999;
    margin-left: 10px;
  }

  .input-group input:is(:focus, :valid)~i {
    color: #4070f4;
  }

  .input-group i.icon {
    left: 0;
  }

  .input-group i.showHidePw {
    right: 0;
    cursor: pointer;
    padding: 10px;
  }

  .checkbox-text {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-top: 20px;
  }

  .checkbox-text .checkbox-content {
    display: flex;
    align-items: center;
  }

  .checkbox-content input {
    margin: 0 8px -2px 4px;
    accent-color: #4070f4;
  }

  .button {
    margin-top: 35px;
  }

  .button input {
    border: none;
    color: #fff;
    letter-spacing: 1px;
    font-size: 17px;
    font-weight: 500;
    border-radius: 6px;
    background-color: #4070f4;
    cursor: pointer;
    transition: all 0.3s ease;
  }

  .button input:hover {
    background-color: #265df2;
  }

  .form-label {
    margin-bottom: 0;
  }
</style>
<!-- Navigation Bar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light" id="nav-bar">
  <div class="container">
    <!-- Site heading & Logo -->
    <a class="navbar-brand" href="index.php" style="font-family: 'Kaushan Script', cursive"><img src="images\iconnn.png" alt="" width="40px" height="40px"><?php echo $settings_r['site_title'] ?></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" aria-controls="navbarSupportedContent" data-bs-target="#navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <!-- Link for other pages -->
      <ul class="navbar-nav me-auto ms-auto mb-2 mb-lg-0">
        <li class="nav-item pe-1">
          <a class="nav-link" href="index.php">Home</a>
        </li>
        <li class="nav-item pe-1">
          <a class="nav-link" href="about.php">About</a>
        </li>
        <li class="nav-item pe-1">
          <a class="nav-link" href="rooms.php">Rooms</a>
        </li>
        <li class="nav-item pe-1">
          <a class="nav-link" href="facilities.php">Facilities</a>
        </li>
        <li class="nav-item pe-1">
          <a class="nav-link" href="contact.php">Contact</a>
        </li>
      </ul>
      <div class="d-flex">
        <!-- User login n navigation bar -->
        <?php
        if (isset($_SESSION['login']) && $_SESSION['login'] == true) {
          $path = USERS_IMG_PATH;
          echo <<<data
              <div class="btn-group">
                <button type="button" class="btn btn-outline-primary shadow-none dropdown-toggle" data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false">
                  <img src="$path$_SESSION[uPic]" style="width: 25px; height: 25px;" class="me-1 rounded-circle">
                  $_SESSION[uName]
                </button>
                <ul class="dropdown-menu dropdown-menu-lg-end">
                  <li><a class="dropdown-item" href="profile.php">Profile</a></li>
                  <li><a class="dropdown-item" href="bookings.php">Bookings</a></li>
                  <li><a class="dropdown-item" href="logout.php"><i class="uil uil-signout"></i>Logout</a></li>
                </ul>
              </div>
            data;
        } else {
          echo <<<data
              <button type="button" class="btn btn-primary me-lg-3 me-2 nav-btn" data-bs-toggle="modal" data-bs-target="#loginModal">
                Login
              </button>
              <button type="button" class="btn btn-primary nav-btn" data-bs-toggle="modal" data-bs-target="#registerModal">
                Register
              </button>
          data;
        }
        ?>
      </div>
    </div>
  </div>
</nav>
<!-- Login Modal(Pop-up) -->
<div class="modal fade" id="loginModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form id="login-form">
        <div class="modal-header">
          <span class="title">Login</span>
          <!-- Close Button in modal -->
          <button type="reset" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="mb-3">
            <!-- Email Input -->
            <label class="form-label text-primary">Email / Mobile</label>
            <div class="input-group">
              <input type="text" name="email_mob" required class="form-control shadow-none" placeholder="Enter your email or mobile no">
              <i class="uil uil-user icon"></i>
            </div>
          </div>
          <div class="mb-4">
            <!-- Password input -->
            <label class="form-label text-primary">Password</label>
            <div class="input-group">
              <input type="password" name="pass" required class="form-control password shadow-none" placeholder="Enter password">
              <i class="uil uil-lock icon"></i>
              <i class="uil uil-eye-slash showHidePw"></i>
            </div>
          </div>
          <div class="checkbox-text">
            <div class="checkbox-content">
              <input type="checkbox" id="logCheck">
              <label for="logCheck" class="text text-secondary">Remember me</label>
            </div>
            <a href="#" class="text text-decoration-none" data-bs-toggle="modal" data-bs-target="#forgotModal" data-bs-dismiss="modal">Forgot password?</a>
          </div>
          <div class="input-group button mb-3">
            <input type="submit" class="btn " value="Login Now">
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- Register -->
<div class="modal fade" id="registerModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <form id="register-form">
        <div class="modal-header">
          <i class="bi bi-person-lines-fill fs-3 me-2 text-primary"></i>
          <span class="title">Register</span>
          <button type="reset" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-6 mb-3 ">
                <!-- name input -->
                <label class="form-label text-primary">Name</label>
                <input name="name" type="text" class="form-control shadow-none" placeholder="Enter your name" required>
              </div>
              <div class="col-md-6 mb-3 ">
                <!-- Email input -->
                <label class="form-label text-primary">Email</label>
                <input name="email" type="email" class="form-control shadow-none" placeholder="Enter your email" required>
              </div>
              <div class="col-md-6 mb-3 ">
                <!-- Phone number input -->
                <label class="form-label text-primary">Phone Number</label>
                <input name="phonenum" type="number" class="form-control shadow-none" placeholder="Enter your mobile-no" required>
              </div>
              <div class="col-md-6 mb-3">
                <!-- Profile pic input -->
                <label class="form-label text-primary">Picture</label>
                <input name="profile" type="file" accept=".jpg, .jpeg, .png, .webp" class="form-control shadow-none" required>
              </div>
              <div class="col-md-12 mb-3 ">
                <!-- address input -->
                <label class="form-label text-primary">Address</label>
                <textarea name="address" class="form-control shadow-none" rows="1" placeholder="Enter your address" required></textarea>
              </div>
              <div class="col-md-6 mb-3 ">
                <!-- pincode input -->
                <label class="form-label text-primary">Pincode</label>
                <input name="pincode" type="number" class="form-control shadow-none" placeholder="Enter your pincode" required>
              </div>
              <div class="col-md-6 mb-3 ">
                <!-- DOB input -->
                <label class="form-label text-primary">Date of birth</label>
                <input name="dob" type="date" class="form-control shadow-none" required>
              </div>
              <div class="col-md-6 mb-3 ">
                <!-- password input -->
                <label class="form-label text-primary">Password</label>
                <input name="pass" type="password" class="form-control shadow-none" placeholder="Enter your name" required>
              </div>
              <div class="col-md-6 mb-3 ">
                <!-- Confirm password input -->
                <label class="form-label text-primary">Confirm Password</label>
                <input name="cpass" type="password" class="form-control shadow-none" placeholder="Enter your name" required>
              </div>
            </div>
          </div>
          <div class="text-center my-1">
            <!-- Register Button -->
            <button type="submit" class="btn btn-primary shadow-none">REGISTER</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- Forgot password modal -->
<div class="modal fade" id="forgotModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form id="forgot-form">
        <div class="modal-header">
          <h5 class="modal-title d-flex align-items-center">
            <i class="bi bi-person-circle fs-3 me-2"></i>
            <!-- Forgot heading -->
            <span class="title"> Forgot Password</span>
          </h5>
        </div>
        <div class="modal-body">
          <h4>
            <!-- Notification -->
            <span class="badge rounded-pill bg-light text-dark mb-3 text-wrap lh-base">
              Note: A link will be sent to your email to reset your password!
            </span>
          </h4>
          <div class="mb-4">
            <!-- Email-input -->
            <label class="form-label text-primary">Email</label>
            <input type="email" name="email" placeholder="Enter your email" required class="form-control shadow-none">
          </div>
          <div class="mb-2 text-end">
            <!-- Close input -->
            <button type="button" class="btn shadow-none p-0 me-2" data-bs-toggle="modal" data-bs-target="#loginModal" data-bs-dismiss="modal">
              CANCEL
            </button>
            <button type="submit" class="btn btn-primary shadow-none">SEND LINK</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

<script>
  const pwShowHide = document.querySelectorAll(".showHidePw"),
    pwFields = document.querySelectorAll(".password");
  //icon password 
  // changing the class from password to text using
  pwShowHide.forEach(eyeIcon => {
    eyeIcon.addEventListener("click", () => {
      pwFields.forEach(pwFields => {
        if (pwFields.type === "password") {
          pwFields.type = "text";
          pwShowHide.forEach(icon => {
            icon.classList.replace("uil-eye-slash", "uil-eye")
          })
        } else {
          pwFields.type = "password";
          pwShowHide.forEach(icon => {
            icon.classList.replace("uil-eye", "uil-eye-slash")
          })
        }
      })
    })
  })
</script>