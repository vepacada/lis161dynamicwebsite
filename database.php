<?php 

	session_start();

	//Initialize variables
	$photographer = "";
	$genre = "";
	$contact = "";
	$gender = "";
	$id = 0;
	$edit_state = false;

	//Connect to database
	$con = mysqli_connect("localhost","root","","lis161");
	if ($con){
		//echo "Connection successful";
	} else {
		echo "Connection error :(";
	}

	//Search
	if (isset($_POST['search'])) {
		$keyword = $_POST['keyword'];
		$query = "SELECT * FROM photographers WHERE photographer LIKE '%".$keyword."%'";
		$photog_results = mysqli_query($con,$query);
	}

	//Create record
	if (isset($_POST['submit'])) {
		$photographer = $_POST['photographer'];
		$genre = $_POST['genre'];
		$contact = $_POST['contact'];
		$gender = $_POST['gender'];

		$query = "INSERT INTO photographers(photographer, genre, contact, gender)
		VALUES ('$photographer','$genre','$contact','$gender')";

		mysqli_query($con,$query);
		header("location: photographers.php");
	}

	//Read records
	$photographers = mysqli_query($con,"SELECT * FROM photographers");

	//UPDATE record
	if (isset($_POST['update'])) {
		$photographer = $_POST['photographer'];
		$genre = $_POST['genre'];
		$contact = $_POST['contact'];
		$gender = $_POST['gender'];
		$id = $_POST['id'];

		$query = "UPDATE photographers SET
		photographer = '$photographer',
		genre = '$genre',
		contact = '$contact',
		gender = '$gender'
		WHERE id=$id";

		//Perform query
		mysqli_query($con,$query);

		//Set status message
		$_SESSION['message'] = "Photographer information updated";
		
		//Redirect to homepage
		header("location: photographers.php");
	}

	//DELETE record
	if (isset($_GET['del'])) {
		$id = $_GET['del'];

		//Prepare query
		$query = "DELETE FROM photographers WHERE id=$id";

		//Perform query
		mysqli_query($con,$query);

		//Set status message
		$_SESSION['message'] = "Photographer deleted";

		//Redirect to homepage
		header("location: photographers.php");

	}
 ?>