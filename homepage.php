<html>

<head>
  <link rel="icon" href="Partial/Images/harborLogo.png" type="image/png" />

  <!-- Add custom styles for the logo -->
  <style>
    .navbar-brand img {
      width: 90px;
      /* Adjust the width as needed */
      height: auto;
      margin-right: 10px;
      /* Add spacing between logo and text */
    }

    .container1 {
      /* margin-left: 40px; */
      align-items: center;
      justify-content: center;
      display: flex;

    }

    .list-unstyled.text-muted li a:hover {
      color: #a3ed86;
    }
  </style>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <title>Home</title>
</head>

<body>
  <?php require 'Partial/_nav.php' ?>

  <div class="container1 my-3">
    <div id="myCarousel" class="carousel slide mb-6" data-bs-ride="carousel">
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-label="Slide 1" aria-current="true"></button>
        <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2" class=""></button>
        <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3" class=""></button>
      </div>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="Partial/Images/slide2.jpg" class="bd-placeholder-img" width="1600px" height="672px" alt="Slide 1">
          <div class="container">

          
          </div>
        </div>

        <div class="carousel-item ">
          <img src="Partial/Images/slide1.jpg" class="bd-placeholder-img" width="1600px" height="672px" alt="Slide 2">
          <div class="container">
            <div class="carousel-caption">
              <p><a class="btn btn-lg btn-primary" href="Donor.php">Donate now</a></p>
            </div>
          </div>
        </div>
        <div class="carousel-item">
          <img src="Partial\Images\slide4.png" class="bd-placeholder-img" width="1600px" height="672px" alt="Slide 3">
          <div class="container">
            <div class="carousel-caption text-end">
              <h1>One more for good measure.</h1>
              <p>Some representative placeholder content for the third slide of this carousel.</p>
              <p><a class="btn btn-lg btn-primary" href="#">Browse gallery</a></p>
            </div>
          </div>
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
  </div>
  <div class="paragraphs">
    <p style="color:#a3ed86 ;text-align: center;">
      <font size="6"> Why Donate? </font>
    </p><br>
    <p style="text-align: center"> Nationally, there are more than 100,000 people waiting for an organ transplant.</p><br>
    <p style="text-align: center"> Every ten minutes, another person is added to the list.</p><br>
    <p style="text-align: center"> You can help by registering as an organ donor.</p><br>
  </div>
  <div class="image-container" style="text-align: center;">
    <img src="https://www.americantransplantfoundation.org/wp-content/uploads/2023/01/1520860_Infographics_1_4_010523.jpg" alt="" style="width: 700px; height: 350px;">
  </div><br>
  <div class="paragraphs">
    <p style="color: #a3ed86;text-align:center;">
      <font size="6">Why us?</font>
    </p><br>
    <p style="text-align: center">Passionate about organ transplantation as a life-saving right and a <br>miraculous example of kindness, resilience, and ultimate generosity?<br> Come join us in the fight!</p><br>

    <p style="color:#a3ed86 ;text-align: center;">
      <font size="5">INDEPENDENT </font>
    </p><br>
    <p style="text-align: center">Our important work is made entirely possible through grass-roots fundraising and donations.<br> We do not receive any funding from the government or big pharma.</p><br>
    <p style="color:#a3ed86 ;text-align: center;">
      <font size="5">THREE-TIRED </font>
    </p><br>
    <p style="text-align: center"> We are the only national nonprofit with a holistic approach to helping transplant patients.<br> Our three-tiered approach helps eliminate barriers to transplant by providing <br>educational, emotional, and financial support.</p><br>
    <p style="color:#a3ed86 ;text-align: center;">
      <font size="5">EQUITY </font>
    </p><br>
    <p style="text-align: center"> We work tirelessly to reduce inequities and improve transplant access, readiness, and outcomes <br>through our innovative programs and public policy efforts.</p><br>
    <p style="color:#a3ed86 ;text-align: center;">
      <font size="5">TRANSPARENCY </font>
    </p><br>
    <p style="text-align:center"> We provide an opportunity for our monthly donors to review and approve grant applications for<br> financial support – so they know exactly who benefits from their investments.</p><br>
    <p style="color:#a3ed86 ;text-align: center;">
      <font size="5">DEDICATION </font>
    </p><br>
    <p style="text-align: center"> We are a lean team putting a lot of muscle into saving lives, not an awareness-only organization.</p><br>

  </div><br>


  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  <!-- Option 2: Separate Popper and Bootstrap JS -->
  <!--
      <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  <footer class="w-100 py-4 flex-shrink-0">
    <link rel="stylesheet" href="sitefooter.css">
    <div class="container py-4">
      <div class="row gy-4 gx-5">
        <div class="col-lg-4 col-md-6">
          <h5 class="h1 text-white">Organharbor.</h5>
          <p class="small text-muted ; text-justify">Welcome to Organharbor <i>at our site </i>we are dedicated to promoting and facilitating organ donation to save lives and improve the quality of life for those in need.</p>
          <p class="small text-muted mb-0">&copy; Copyrights. All rights reserved. <a class="text-primary" href="homepage.php">Organharbor.com</a></p>
        </div>
        <div class="col-lg-2 col-md-6">
          <h5 class="text-white mb-3">Quick links</h5>
          <ul class="list-unstyled text-muted">
            <li><a href="/Organdonation/Adminlogin.php">Admin</a></li>
            <li><a href="/Organdonation/patientsignup.php">Patient</a></li>
            <li><a href="/Organdonation/Donor.php">Donor</a></li>
            <li><a href="/Organdonation/Privacy.php">Privacy Policy</a></li>
            <li><a href="/Organdonation/Contact_us.php">About us</a></li>
          </ul>
        </div>
        <div class="col-lg-2 col-md-6">
          <h5 class="text-white mb-3">Contact us</h5>
          <ul class="list-unstyled text-muted">
            <ul>
              <li> Mail: organdonation@xyz.com </li>
              <li>Phone: +91 0000000000000 </li>
            </ul>
          </ul>
        </div>
        <div class="col-lg-4 col-md-6">
          <h5 class="text-white mb-3">Newsletter</h5>
          <p class="small text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt.</p>
          <form action="#">
            <div class="input-group mb-3">
              <input class="form-control" type="text" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="button-addon2">
              <button class="btn btn-primary" id="button-addon2" type="button"><i class="fas fa-paper-plane"></i></button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </footer>
  </div>
  </div>
  </div>
  </footer>
</body>

</html>