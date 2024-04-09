<!DOCTYPE html>
<html>
  <head>
  <style>
      /* Add CSS to style navigation links */
      .nav-link {
          color: #a3ed86; /* Change this to your desired color value */
      }

      /* .siteLogo {
        height: 100px;
        width: 100px;
        border-radius: 50%;

      }
*/
      .myImg {
        height: 300px;
        width: 300px;
        object-fit: cover;
        border-radius: 50%;
        display: flex;
        justify-content: center;
        align-items: center;
      } 

      .myHover:hover {
        border: 2px solid white;
      }

     
    
   </style>
  </head>
  <body>
<nav class="navbar navbar-expand-lg bg-body-tertiary bg-dark border border-success">
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
          <a class ="nav-link myHover" href="/Organdonation/Donor.php">Donor</a>
        </li> 
        <li class="nav-item">
          <a class ="nav-link myHover" href="/Organdonation/Contact_us.php">About Us</a>
        </li> 
      </ul>
      </form>
    </div>
  </div>
</nav>
  </body>
</html>