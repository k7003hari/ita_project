<?php
	//header("Cache-Control", "no-cache, no-store, must-revalidate");
	session_start(); 
	$pid = $_GET['pid'];
	$login = $_GET['login'];
	$username = $_GET['username'];
	if($login==0 || $username=="Dummy")
		echo "<SCRIPT LANGUAGE='JavaScript'>
				window.alert('Login to SHOP!!!')
				window.location.href='sign-in.php'
				</SCRIPT>";

	include("login_header.php");

	$conn = mysqli_connect("localhost","root","");
	mysqli_select_db($conn,"ita");
	$sql = "SELECT * FROM products where pid = '$pid'"; 
	$result = $conn->query($sql);
	$row = mysqli_fetch_array($result);
	$pname = $row['pname'];
	$price = $row['price'];
	$info = $row['info'];
	$image = $row['image'];

	$sql1 = "SELECT username,email,review FROM reviews where pid = '$pid'";
	$result1 = $conn->query($sql1);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Men's Wear</title>
<style type="text/css">
	
	table,tr,td {
		border-style: solid;
		border-color: grey;
    	border-collapse: collapse;
    	padding: 10px;
    	max-width: 1000px;
    	background-color: #b3f3ef;
    	font-family: Helvetica;
    	font-weight: bold;
	}

	th {
		padding: 30px;
	}

	td input {
		margin-right: 5px;
		margin-left: auto; 
	}

	td p {
		font-family: verdana;
		font-weight: normal;
		color: blue;
	}
	div.box  {
		width: 350px;
		height: 350px;
		border-style: solid;
		border-radius: 15px;
		border-color: grey;
		padding: 25px;
		margin: 5px;
		text-align: center;
		background-color: #d6ebd9;
	}

	div.box img {
		width: 100%;
		height: 100%;
		-webkit-transition-duration: 0.4s; /* Safari */
    	transition-duration: 0.5s;
	}

	div.box img:hover {
		transform: scale(1.5);
	}
	div.box input {
		text-align: center;
		align-content: center;
		float: center;
		background-color: #4CAF50;
		-webkit-transition-duration: 0.4s; /* Safari */
   	 	transition-duration: 0.4s;
	}

	div.box input:hover {
		background-color: #367477; 
   	 	color: black;	
	}

	div.re {
		font-family: verdana;
		font-weight: normal;
		color: black;
	}
</style>
</head>
<body bgcolor="#d6ebd9">
	<br><br> 	
	<!--<div class='page'>-->
		<!--<div class='content'>-->
		<form action="confirm-order.php?action=0" method="get">
			<input type="hidden" name="pid" value="<?php echo $pid ?>">
			<input type="hidden" name="username" value="<?php echo $username ?>">  
			<table align="center">
				<tr>
					<th rowspan="100">
						<?php echo "<div class = 'box'><img src = 'images/gadgets/{$image}' alt = '{$pid}'></div>" ?>
						<h5 align="center">(hover over image to zoom in)</h6>
					</th>
				</tr>
				<tr>
					<td><b>Name</b></td>
					<td><?php echo $pname; ?></td>
				</tr>
				<tr>
					<td><b>Price</b></td>
					<td><b>Rs.<?php echo $price; ?></td>
				</tr>
				<tr>
					<td><b>Details</b></td>
					<td><?php echo $info; ?></td>
				</tr>
				<tr>
					<td>Rating</td>
					<td></td>
				</tr>
				<tr>
					<td>Quantity</td>
					<td>
						<input type="text" name="quantity">
						<input type="submit" class="btn btn-primary" name="submit" value="Place Order">
					</td>
				</tr>
				<tr>
					<td>Reviews</td>
					<td>

						<?php
						while($row1 = mysqli_fetch_assoc($result1))
						{
							echo "<br>";
							$username = $row1['username'];
							$review = $row1['review'];
							
							echo "<p><b>user: {$username}</b><br><div class='re'>{$review}</div</p><br>";
						}
						?>

					</td>
				</tr>
			</table>
		</form>
			<br><br><br>
		<!--</div>-->
	<!--</div>-->
</body>
</html>
<?php
	echo "<br>"; 
	include("footer.php");
?>