<?php include "server.php"; ?>

<!DOCTYPE html>
<html>
<head>
	<title>VCJEP|Member Login</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/stylesheet.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/custom.css">
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

<!-- Form -->
<div class="header">
	<h2>Member Login</h2>
</div>
	
<form method="POST" action="login.php">

	<!-- Alert Message -->
  	<?php if (isset($_SESSION['warning'])) { ?>
    <div class="error">
      <?php 
      echo $_SESSION['warning'];
      unset ($_SESSION['warning']);
      ?>
   	</div>
  	<?php } ?>
  	
	<?php include "errors.php"; ?>
		<div class="input-group">
			<label>Username</label>
			<input type="text" name="username">
		</div>
		<div class="input-group">
			<label>Password</label>
			<input type="password" name="password">
		</div>
		<div class="input-group">
			<button type="submit" class="btn" name="login_user">Login</button>
		</div>
		<p>
			Not a member yet? <a href="register.php">Register as a Member</a>
		</p>
</form>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>

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