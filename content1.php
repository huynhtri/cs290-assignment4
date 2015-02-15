<?php
	error_reporting(E_ALL);
	ini_set('display_errors', 1);

	session_start();
	
	if(!(isset($_GET['logout']) || isset($_POST['username']) || isset($_SESSION['username']))){
		//Redirects user to login page if they have not attempted to login yet.
		header('Location: http://web.engr.oregonstate.edu/~huynhtri/Assignment4/login.php');
		exit;
	}

	//Logs the user out if the user clicks to logout.
	if(isset($_GET['logout'])){
		session_unset();
		session_destroy();
		header('Location: http://web.engr.oregonstate.edu/~huynhtri/Assignment4/login.php');
	}

	//Used for initial login procedures
	if(isset($_POST['username'])){
		$username = $_POST['username'];

		if($username != null){
			$_SESSION['username'] = $username;
			$_SESSION['count'] = 0;
		} else{
			//Gives an error that the user must enter a username in order to access the website
			echo 'A username must be entered. click
			<a href="http://web.engr.oregonstate.edu/~huynhtri/Assignment4/login.php">here</a>
			to return to the login screen.';
		}
	} 

	//Is accessed if the user has logged in already
	if(isset($_SESSION['username'])){
		echo 'Hello ' . $_SESSION['username'] . ' you have visited this page ' .
			$_SESSION['count'] . ' times before. Click <a href="content1.php?logout=1">here</a>
			to logout.';
		$_SESSION['count']++;
		echo '<br>Click <a href="content2.php">here</a> to go to the content 2 page.';
	}
?>