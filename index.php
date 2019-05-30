<?php 
	session_start();
	require('logics.php');
	$obj = new regression();

	$_SESSION['b0'] = '';
	$_SESSION['b1'] = '';

	if(isset($_POST['model'])){

		$n = 12;

		$one = $_POST['one'];
		$two = $_POST['two'];
		$three = $_POST['three'];
		$four = $_POST['four'];
		$five = $_POST['five'];
		$six = $_POST['six'];
		$seven = $_POST['seven'];
		$eight = $_POST['eight'];
		$nine = $_POST['nine'];
		$ten = $_POST['ten'];
		$eleven = $_POST['eleven'];
		$twelve = $_POST['twelve'];

		//squaring all the numbers

		$data_x = array(1,2,3,4,5,6,7,8,9,10,11,12);

		$data_y = array($one,$two,$three,$four,$five,$six,$seven,$eight,$nine,$ten,$eleven,$twelve);

		$data_x_power = array(1,4,9,16,25,36,49,64,81,100,121,144);

		$data_x_y = array(1 * $one , 2 * $two , 3 * $three , 4 * $four , 5 * $five , 6 * $six , 7 * $seven
				, 8 * $eight , 9 * $nine , 10 * $ten , 11 * $eleven , 12 * $twelve);

		$b1 = $obj->b1($n,$data_x,$data_y,$data_x_y,$data_x_power);
		$b0 = $obj->b0($n,$data_x,$data_y,$data_x_y,$data_x_power);

		$_SESSION['b0'] = $b0;
		$_SESSION['b1'] = $b1;

	}


	//for a prediction 
	if (isset($_POST['predict'])) {

		$x = $_POST['any'];

		$y = $_POST['b0'] + $_POST['b1'] * $x;


	}
?>


<!doctype HTML>
<html>
	<head>
		<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
		<link href="css/w3.css" rel='stylesheet' type='text/css' />
		<title> SALES FORCASTING SYSTEM USING REGRESSION MODEL </title>
	</head>
	<body class="container-fluid w3-teal w3-text-black">
		<h1 class="w3-center w3-text-black w3-padding">SALES FORCASTING SYSTEM USING REGRESSION MODEL</h1>
		<form method="POST" action="">
			<table rows="12" cols="2" class="w3-padding table table-responsive w3-table w3-table-white w3-half table-hover">
				<tr>
					<th>MONTH : </th>
					<th>SALES (<span style="font-style:italic;">in naira</span>):</th>
				</tr>
				<tr>
					<td>1</td>
					<td>
						<input type="number" class="w3-input" name="one" min="0" />
					</td>
				</tr>
				<tr>
					<td>2</td>
					<td>
						<input type="number" class="w3-input" name="two" min="0"/>
					</td>
				</tr>
				<tr>
					<td>3</td>
					<td>
						<input type="number" class="w3-input" name="three" min="0"/>
					</td>
				</tr>
				<tr>
					<td>4</td>
					<td>
						<input type="number" class="w3-input" name="four" min="0"/>
					</td>
				</tr>
				<tr>
					<td>5</td>
					<td>
						<input type="number" class="w3-input" name="five" min="0"/>
					</td>
				</tr>
				<tr>
					<td>6</td>
					<td>
						<input type="number" class="w3-input" name="six" min="0"/>
					</td>
				</tr>
				<tr>
					<td>7</td>
					<td>
						<input type="number" class="w3-input" name="seven" min="0"/>
					</td>
				</tr>
				<tr>
					<td>8</td>
					<td>
						<input type="number" class="w3-input" name="eight" min="0"/>
					</td>
				</tr>
				<tr>
					<td>9</td>
					<td>
						<input type="number" class="w3-input" name="nine" min="0"/>
					</td>
				</tr>
				<tr>
					<td>10</td>
					<td>
						<input type="number" class="w3-input" name="ten" min="0"/>
					</td>
				</tr>
				<tr>
					<td>11</td>
					<td>
						<input type="number" class="w3-input" name="eleven" min="0"/>
					</td>
				</tr>
				<tr>
					<td>12</td>
					<td>
						<input type="number" class="w3-input" name="twelve" min="0"/>
					</td>
				</tr>
				<input type="submit" class="w3-btn" name="model" value="Get Model values">
			</table>
		
		<div class="w3-panel w3-half">
			<h3>Your Model for the next sale forecast is  </h3>
			<p>  Y = <?php 
						if(isset($b0)){
							echo $b0;
						}
					?> + 
					<?php 
						if(isset($b1)){
							echo $b1;
						}
					?> * x;
			</p>
			<br>
			<p> You can also find a value of x or Y in your Model for your next prediction </p>
			<div class="w3-black w3-border-white w3-text-white  w3-half  w3-padding-16">
				Y = <input type="number" class="w3-input w3-text-black" name="b0" readonly value="<?php 
						if(isset($b0)){
							echo $b0;
						}
					?>"/> + <input type="number" class="w3-input w3-text-black" name="b1" readonly value="<?php 
						if(isset($b1)){
							echo $b1;
						}
					?>"/>* 
					<input type="number" class="w3-input w3-right w3-text-black" name="any" min="0"/>
					<br>
					<input type="submit" class="w3-btn w3-hover-teal" name="predict" value="Get Sale Prediction values">
			
					<?php 
						if(isset($y)){
							echo $y;
						}
					?>
			</div>
		</div>
		</form>
		<script src="js/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
	</body>
</html>