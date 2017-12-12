<?php include 'database.php'; 

  //Secure homepage
  if (!isset($_SESSION['username'])) {
    $_SESSION['warning'] = "You need to login to access this page";
    //redirect user
    header("location: login.php");
  }

  //Check if edit btn is clicked
  if (isset($_GET['edit'])) {
    $id = $_GET['edit']; //assign edit value to $id
    //Prepare query
    $query = "SELECT * FROM photographers WHERE id=$id";
    //Perform query
    $edit_record = mysqli_query($con,$query);
    //Convert record to array
    $edit_array = mysqli_fetch_array($edit_record);

    //Assign values
    $photographer = $edit_array['photographer'];
    $genre = $edit_array['genre'];
    $contact = $edit_array['contact'];
    $gender = $edit_array['gender'];

    //Set edit state to true
    $edit_state = true;
  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>VCJEP|Photographers</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="stylesheet.css">
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
  <?php if (isset($_SESSION['username'])) { ?>
    <p>Welcome,  <strong><?php echo $_SESSION['username']; ?></strong></p>
    <p><a href="server.php?logout=1" class="btn btn-warning">Logout</a></p>
  <?php } ?>
</div>

<!-- Form -->
<div class="well">
  <h2 class="text-center h_title">Add A Photographer</h2>
  <p class="p_title text-center">This is an open area for members where you can add your favourite photographer/s, photographer/s you admire, or a photographer/s you want to recommend. You can also add yourself if you're an aspring photographer so that others can check you out :)<p>
    <form method="POST" action="database.php">
      <div class="form-row">
        <div class="form-group col-md-6">
          <input type="hidden" name="id" value="<?php echo $id; ?>">
            <label for="photographer">Photographer Name</label>
            <input type="text" class="form-control" name="photographer" placeholder="Jane Smith" value="<?php echo $photographer; ?>" required>
        </div>
        <div class="form-group col-md-6">
            <label for="genre">Genre</label>
            <input type="text" class="form-control" name="genre" placeholder="Landscpae Photography" value="<?php echo $genre; ?>" required>
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-6">
            <label for="contact">Contact Information</label>
            <input type="text" class="form-control" name="contact" placeholder="Email, Website, Facebook, Twitter, etc." value="<?php echo $contact; ?>" required>
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-6">
            <label for="gender">Gender</label>
            <select class="form-control" name="gender" required>
              <option <?php if(!isset($gender)) echo "selected"; ?> >Choose...</option>
              <option value="M" <?php if($gender=='M') echo "selected"; ?> >Male</option>
              <option value="F" <?php if($gender=='F') echo "selected"; ?> >Female</option>
              <option value="U" <?php if($gender=='U') echo "selected"; ?> >Undisclosed</option>
            </select>
        </div>
      </div>
        <?php if($edit_state) { ?>
          <button type="submit" class="btn btn-primary" name="update">Update</button><a class="btn btn-warning" href="photographers.php?">Cancel</a>
        <?php } else { ?>
          <button type="submit" class="btn btn-primary" name="submit">Submit</button>
        <?php } ?>
    </form>
</div>

<!-- Search bar-->
  <div class="search-container">
    <form action="photographers.php" method="POST">
      <input type="text" placeholder="Search A Photographer" name="keyword">
      <button type="submit" name="search" class="btn btn-primary">Search</button>
    </form>
  </div>
<br>
<br>

<!-- Display Search Results -->
<?php if (isset($photog_results)) { ?>
  <div class="well">
    <p><h2>Search Results</h2></p>
    <table class="table table-hover table-bordered">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Name</th>
          <th scope="col">Genre</th>
          <th scope="col">Contact Information</th>
          <th scope="col">Gender</th>
        </tr>
      </thead>
      <tbody>
        <?php $i = 0;
         while ($row = mysqli_fetch_array($photog_results)) { ?>
        <tr>
          <td><?php echo ++$i; ?></td>
          <td><?php echo $row['photographer']; ?></td>
          <td><?php echo $row['genre']; ?></td>
          <td><?php echo $row['contact']; ?></td>
          <td><?php echo $row['gender']; ?></td>
        </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>
  <?php } ?>

<!-- Table Format -->
  <div class="well">
    <p><h2>List of Submitted Photographers</h2></p>
    <table class="table table-hover table-bordered">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Name</th>
          <th scope="col">Genre</th>
          <th scope="col">Contact Information</th>
          <th scope="col">Gender</th>
          <th scope="col">Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php $i = 0;
         while ($row = mysqli_fetch_array($photographers)) { ?>
        <tr>
          <td><?php echo ++$i; ?></td>
          <td><?php echo $row['photographer']; ?></td>
          <td><?php echo $row['genre']; ?></td>
          <td><?php echo $row['contact']; ?></td>
          <td><?php echo $row['gender']; ?></td>
          <td><a class="btn btn-warning" href="photographers.php?edit=<?php echo $row['id']; ?>">Edit</a>
              <a class="btn btn-danger" href="photographers.php?del=<?php echo $row['id']; ?>">Delete</a></td>
        </tr>
        <?php } ?>
    
      </tbody>
    </table>
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