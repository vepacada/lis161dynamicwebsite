<?php include 'database.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>VCJEP</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="css/custom.css">
  <link rel="stylesheet" type="text/css" href="css/stylesheet.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>
<!-- Navbar -->
<nav class="navbar navbar-default">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="index.php">VCJEP</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li><a href="index.php?#aboutme">ABOUT ME</a></li>
        <li><a href="gallery.html">GALLERY</a></li>
        <li><a href="contact.html">CONTACT ME</a></li>
        <li><a href="photographers.php">PHOTOGRAPHERS</a></li>
      </ul>
    </div>
    <br>
  </div>
  </div>
</nav>

<div class="container">
<!-- Alert Message -->
  <?php if (isset($_SESSION['message'])) { ?>
    <div class="alert alert-success">
      <?php 
      echo $_SESSION['message'];
      unset ($_SESSION['message']);
      ?>
   </div>
  <?php } ?>

<!-- Alert Message -->
  <?php if (isset($_SESSION['success'])) { ?>
    <div class="alert alert-success">
      <?php 
      echo $_SESSION['success'];
      unset ($_SESSION['success']);
      ?>
   </div>
  <?php } ?>

<!-- Dashboard -->
<div class="well">
<?php if($_SESSION) { ?>
      <p>Welcome,  <strong><?php echo $_SESSION['username']; ?></strong></p>
    <p><a href="server.php?logout=1" class="btn btn-warning">Logout</a></p>
<?php } else { ?>
  <p>Welcome to my website! <strong></strong></p>
    <p><a href="login.php" class="btn btn-primary">Login</a>
    <a href="register.php" class="btn btn-primary">Register</a></p>
<?php } ?>
</div>
</div>

<!-- Home -->
<section id="home" class="section1">
<div class="container-fluid">
  <img src="pics/website.jpg" class="mx-auto d-block" style="display:inline;width:1375px;height:725px;" alt="VCJEP Home">
</div>
</section>

<!-- About Me -->
<section id="aboutme" class="section2">
<div class="container-fluid bg-1 text-center">
  <h3 class="margin">ABOUT ME</h3>
  <img src="pics/AboutMe.png" alt="aboutme" style="width:334.2px;height:250.6px;" align="center">
    <p>My name is Vikka Crystal Janela Erguiza Pacada. Most people call me Vikka, Viks, V, or CJ. I am currently a student of Bachelor of Library and Information Science at the University of the Philippines Diliman. People close to me describe me as humorous, timid, observant, and caring.<br>I like listening to music, reading books, playing my guitar, writing lyrics or poems, and most of all, taking pictures of different things that catch my eyes.</p>
    <p>I've been into photography ever since I was young. I guess it started when my mom bought me a camera when I was 7 or 8. She bought one of those cameras with films that you had to get developed to see what the photos you took. Then my mom bought me a digital camera when I was 10. When I was around 12, she bought a Canon EOS1100D for our family but I was the one who ended up using it the most</p>
    <p>Now, I use phone more than the SLR because it's easier to bring. I use the SLR mostly when I travel, when there are special occasions, or if I see an eye-catching view and I have it with me. I am also the family's "designated photographer" when we have occasions like family outings.</p>
</div>
</section>

<!-- Devices I Use -->
<div class="container-fluid text-center">
  <h3 class="margin">Devices I Use</h3><br>
  <div class="row">
    <div class="col-sm-4">
      <h3>Canon EOS 1100D</h3>
      <p>I use this camera with either the EF-S 15-85mm f/3.5-5.6 IS USM or the EF-S 18-135mm f/3.5-5.6 IS lenses both by Canon.</p>
      <img src="pics/Canon.jpg" class="img-responsive margin" style="width:100%" alt="Image">
    </div>
    <div class="col-sm-4">
      <img src="pics/iPhoneSE.jpg" class="img-responsive margin" style="width:100%" alt="Image">
      <h3>iPhone SE</h3>
      <p>The iPhone SE is my current phone and I always have it with me, so if I see something I think is picture-worthy, I just snap it with my phone.</p>
    </div>
    <div class="col-sm-4">
      <h3>iPhone 4S</h3>
      <p>I have a back-up phone which is the iPhone 4S, and I sometimes use it to take pictures if both my camera or current phone isn't available.</p>
      <img src="pics/iPhone4S.jpg" class="img-responsive margin" style="width:100%" alt="Image">
    </div>
  </div>
</div>

<!-- Footer -->
<footer class="container-fluid bg-2 text-center">
  <p>E-mail Me: vikka_crystal_janela.pacada@upd.edu.ph
    <br>Social Media:
  <a href="https://www.facebook.com/vikka.pacada" class="btn btn-primary" role="button">Facebook</a>
  <a href="https://www.twitter.com/bluecrystal_08" class="btn btn-primary" role="button">Twitter</a>
  <a href="https://www.instagram.com/bluecrystal_08/" class="btn btn-primary" role="button">Instagram</a>
  </p>
</footer>

</body>
</html>
