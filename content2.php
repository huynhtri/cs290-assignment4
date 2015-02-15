<?php
	session_start();

	if(isset($_SESSION['username'])){
			echo 'Hello ' . $_SESSION['username'] . '. Click <a href="content1.php">here</a> to go to the content 2 page.';
	} else{
		header('Location: http://web.engr.oregonstate.edu/~huynhtri/Assignment4/login.php');
		exit;
	}

?>