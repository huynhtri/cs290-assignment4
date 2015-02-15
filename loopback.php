<?php
	error_reporting(E_ALL);
	ini_set('display_errors', 1);

	class UserInfo {
		public $Type = 'POST';
		public $parameters = null;
	}

	$user = new UserInfo();

	if(isset($_POST['name'], $_POST['age'])){
		$user->parameters['name'] = htmlentities($_POST['name'], ENT_QUOTES, 'UTF-8');
		$user->parameters['age'] = (int)$_POST['age'];

		echo json_encode($user);
	} else
		echo json_encode($user);
?>

<form action="loopback.php" method="post">
	Enter a name: <input type="text" name="name" placeholder="Name"><br>
	Enter an age: <input type="text" name="age" placeholder="Age"><br>
	<input type="submit">
</form>









