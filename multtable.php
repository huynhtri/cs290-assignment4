<?php
	error_reporting(E_ALL);
	ini_set('display_errors', 1);

	//Error handles input
	function errorHandle(){
		if(!empty($_GET)){
			$topMin = $_GET['min-multiplicand'];
			$topMax = $_GET['max-multiplicand'];
			$leftMin = $_GET['min-multiplier'];
			$leftMax = $_GET['max-multiplier'];
		}

		if(empty($_GET)){
			return;
		} elseif(!is_numeric($topMin)|| !is_numeric($topMax) || !is_numeric($leftMin) || !is_numeric($leftMax)){
			echo "Error... all boxes must contain whole numbers...";
			return;
		} elseif($topMin > $topMax){
			echo "Error... min-multiplicand cannot be higher than the max-multiplicand";
			return;
		} elseif($leftMin > $leftMax){
			echo "Error... min-multiplier cannot be higher than the max-multiplier";
			return;
		} else{
			displayTable($topMin, $topMax, $leftMin, $leftMax);
			return;		
		}
	}

	//Function that displays the multiplication table
	function displayTable($topMin, $topMax, $leftMin, $leftMax){
		echo '
			<table style="border: 2px solid black; padding: 5px;">
				<caption>Multiplication Table</caption>
				<thead>
					<tr>
						<th style="border: 2px solid black; padding: 5px;"></th>';
						//Sets up the top header fields
					  for($i = $topMin; $i <= $topMax; $i++){
					  	echo '<th style="border: 2px solid black; padding: 5px;">' . $i . '</th>';
					  }
	  
		echo	'</tr>
				</thead>
				<tbody>';
						//Sets up the rows header fields as well as the multiplication table
						for($i = $leftMin; $i <= $leftMax; $i++){
							echo '<tr>';
							echo '<th style="border: 2px solid black; padding: 5px;">' . $i . '</th>';
							for($j = $topMin; $j <= $topMax; $j++){
								echo '<td style="border: 2px solid black; padding: 5px;">' . $j * $i . '</td>';
							}
							echo '</tr>';
						}
		echo
				'</tbody>
			</table>';

		return;
	}
?>

<!DOCTYPE html>
<html>
	<head>
			<meta charset="utf-8">
			<title>Assignment 4 multtable.php</title>
	</head>
	<body>
		<form action="multtable.php" method="get">
			Enter the min-multiplicand: <input type="number" name="min-multiplicand"><br>
			Enter the max-multiplicand: <input type="number" name="max-multiplicand"><br>
			Enter the min-multiplier: <input type="number" name="min-multiplier"><br>
			Enter the max-multiplier: <input type="number" name="max-multiplier"><br>
			<input type="submit">
		</form>
		<section>
			<?php errorHandle(); ?>
		</section>
	</body>
</html>