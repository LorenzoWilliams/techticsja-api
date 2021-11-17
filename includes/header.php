<?php
  include_once 'includes/sessions.php';
?>

<!doctype html>
<html lang="en">
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="css/site.css">
    <link rel="stylesheet" href="css/Login.css">
    
    <title>TechticsJa - <?php echo $title;?></title>
  </head>
  <body>
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark ">
        <div class="container-fluid" >
          <a class="navbar-brand" href="index.php"><img src="uploads/techticsja.png" alt="techticsja" height="50px"; width="50px">TechticsJa</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent" style="margin-left: 20px" id="navbar">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 nav-pills">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="index.php">Home</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle"  id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Services</a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="application-development.php">Application Development</a></li>
                  <li><a class="dropdown-item" href="graphics-design.php">Graphics Design</a>
                  <li><a class="dropdown-item" href="web-design.php">Web Development/Design</a></li>
                  <li><a class="dropdown-item" href="hosting.php">Website Hosting</a></li>
                  <li><a class="dropdown-item" href="building-plan.php">Building Designs</a></li>
                </ul>
              </li>
              <li class="nav-item">
              <li><a class="nav-link" href="pricing.php">Pricing</a></li>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Portfolio</a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="graphics-portfolio.php">Graphics Design</a></li>
                  <li><a class="dropdown-item" href="web-portfolio.php">Web Design</a></li>
                  <li><a class="dropdown-item" href="building-portfolio.php">Building Design</a></li>
                </ul>
              </li>
              <li class="nav-item">
              <a class="nav-link" href="about.php">About</a>
              </li>
              <li class="nav-item">
              <a class="nav-link" href="contact-us.php">Contact</a>
              </li>
            </ul>
            <ul class="navbar-nav me-auto mb-2 mb-lg-0" style="margin-left: 220px">
            <li class="nav-item">
              <a class="nav-link" href="contact-us.php" style="width:auto;">Sign Up</a>
              </li>
              <li class="nav-item">
              <a class="nav-link" onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Login</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>



      