<?php
header("Cache-Control: no-cache, no-store, must-revalidate");
header("Pragma: no-cache");
header("Expires: 0"); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <link rel="icon" href="Partial/Images/harborLogo.png" type="image/png" />
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> 
    <title>Admin Login</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-color: #f2f2f2;
        }

        .login-container {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            padding: 40px;
            width: 350px;
            text-align: center;
        }

        .login-container h2 {
            margin-bottom: 20px;
            font-size: 24px;
            color: #333;
        }

        .input-field {
            margin-bottom: 20px;
        }

        .input-field input {
            width: 100%;
            padding: 10px;
            border: none;
            border-bottom: 2px solid #333;
            font-size: 16px;
        }

        .login-button {
            background-color: #333;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease-in-out;
        }

        .login-button:hover {
            background-color: #555;
        }
        .nav-link.myHover{
          color: #333 ;
        }
     </style>
      
</head>


<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary bg-light border border-success">
  <div class="container-fluid">
  
    <!-- Replace "Organ Donation" text with logo image -->
    <div class="siteLogo">
    <a class="navbar-brand my-3" href="/Organdonation/homepage.php">
      <img src="Partial/Images/harborLogo.png" alt="Logo" class="myImg" >  <!-- class="rounded-circle" -->
    </a>
    </div>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse my-3" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0"> 
      <li class="nav-item">
          <a class="nav-link active myHover" aria-current="page" href="/Organdonation/homepage.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link myHover" href="/Organdonation/Adminlogin.php">Admin</a></a>
        </li>
        <li class="nav-item">
          <a class="nav-link myHover" href="/Organdonation/patientsignup.php">Patient</a>
        </li>
        <li class="nav-item">
          <a class="nav-link myHover" href="/Organdonation/Donor.php">Donor</a>
        </li> 
      </ul>
      </form>
    </div>
  </div>
</nav>
    <div class="login-container">
        <h2>Admin Login</h2>
        <form action="Adminlogincon.php" method="post">
            <div class="input-field">
                <input type="text" name="username" placeholder="Username" required>
            </div>
            <div class="input-field">
                <input type="password" name="password" placeholder="Password" required>
            </div>
            <button class="login-button" type="submit">Login</button>
        </form>
    </div>
     <!-- Optional JavaScript; choose one of the two! -->
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
</body>
</html>
