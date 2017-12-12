<?php

	session_start();
	//Initialize variables
	$username = "";
	$email = "";
	$password = "";
	$password_1 = "";
	$password_2 = "";
	$errors = array();

	//Connect to database
	$con = mysqli_connect("localhost", "root", "", "lis161"
	);
	//Check if there are errors in connecting
	if (!$con) {
	echo "Connection error!";
	}

	//Register btn
	if (isset($_POST['register_user'])) {
		$username = mysqli_real_escape_string($con,$_POST['username']);
		$email = mysqli_real_escape_string($con,$_POST['email']);
		$password_1 = mysqli_real_escape_string($con,$_POST['password_1']);
		$password_2 = mysqli_real_escape_string($con,$_POST['password_2']);
		//Check if all fields have values
		if (empty($username)) {
			array_push($errors, "Username should not be blank");
		}
		if (empty($email)) {
			array_push($errors, "Email should not be blank");
		}
		if (empty($password_1)) {
			array_push($errors, "Password should not be blank");
		}
		if ($password_2 != $password_1) {
			array_push($errors, "Please retype password");
		}
		//If there are no errors
		if (count($errors)==0) {
			$password = md5($password_1); //encrypt pw
			//Prepare query statement
			$query = "INSERT INTO users(username, email, password)
			VALUES ('$username', '$email', '$password')";
			//Perform query
			mysqli_query($con,$query);
			//Set session variables
			$_SESSION['username'] = $username;
			$_SESSION['success'] = "You have successfully registered :)";
			//Redirect user
			header("location: index.php");
		}
	}

	//Login btn
	if (isset($_POST['login_user'])) {
		$username = mysqli_real_escape_string($con,$_POST['username']);
		$password = mysqli_real_escape_string($con,$_POST['password']);
		//User verification
		if (empty($username)) {
			array_push($errors, "Username should not be blank");
		}
		if (empty($password)) {
			array_push($errors, "Password should not be blank");
		}
		//If there are no errors
		if (count($errors)==0) {
			$password = md5($password); //encrypt pw
			//Prepare query statement
			$query = "SELECT * FROM users WHERE username = '$username' AND password = '$password' ";
			//Perform query
			$result = mysqli_query($con,$query);
			//Check for record returned by select statement
			if (mysqli_num_rows($result)==1) {
			//Set session variables
			$_SESSION['username'] = $username;
			$_SESSION['success'] = "You have successfully logged-in";
			//Redirect user
			header("location: index.php");
			} else {
				array_push($errors, "Wrong username/password combination");
			}
		}
	}

	//If log out btn is clicked
	if (isset($_GET['logout'])) {
		session_destroy(); //destroy session
		unset($_SESSION['username']); //unset session variable
		//redirect user
		header("location: index.php");
	}
?>