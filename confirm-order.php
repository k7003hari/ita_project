<?php 
	session_start();
	$_SESSION["user"] = $_GET['username'];
	include("login_header.php");
	$conn = mysqli_connect("localhost","root","");
	if (mysqli_connect_errno())
	{
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	mysqli_select_db($conn,"ita");
	if(isset($_GET['submit']))
	{
		$_SESSION["user"] = $_GET['username'];
		$pid = $_GET['pid'];
		$username = $_GET['username'];
		$quantity = $_GET['quantity'];

		$sql = "select * from products where pid = '$pid'";
		$res = $conn->query($sql);
		$row = mysqli_fetch_row($res);

		$sql1 = "select * from users where name='$username'";
		$result = $conn->query($sql1);
		$row1 = mysqli_fetch_row($result);

		$total = $row[3]*$quantity;
	}
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
    	font-weight: normal;
    	align-items: center;
    	align-content: center;
	}

	th {
		padding: 30px;
	}

	td input {
		margin-right: auto;
		margin-left: 130px;
		align-self: center;
		align-content: center;
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
		<form action="place-order.php" method="get">
			<input type="hidden" name="username" value="<?php echo $row1[0] ?>">
			<input type="hidden" name="email" value="<?php echo $row1[1] ?>">
			<input type="hidden" name="pid" value="<?php echo $pid ?>">
			<input type="hidden" name="pname" value="<?php echo $row[2] ?>">
			<input type="hidden" name="price" value="<?php echo $row[3] ?>">
			<input type="hidden" name="quantity" value="<?php echo $quantity ?>">
			<input type="hidden" name="total" value="<?php echo $total ?>">
			<input type="hidden" name="address" value="<?php echo $row1[4] ?>">
			<table align="center">
				<tr>
					<th rowspan="100">
						<?php 
							if($row[1][0]=='1')
								echo "<div class = 'box'><img src = 'images/men/{$row[4]}' alt = '{$pid}'></div>";
							else if($row[1][0]=='2')
								 echo "<div class = 'box'><img src = 'images/women/{$row[4]}' alt = '{$pid}'></div>";
							else if($row[1][0]=='3')
								 echo "<div class = 'box'><img src = 'images/books/{$row[4]}' alt = '{$pid}'></div>";
							else if($row[1][0]=='4')
								 echo "<div class = 'box'><img src = 'images/gadgets/{$row[4]}' alt = '{$pid}'></div>";
							else if($row[1][0]=='5')
								 echo "<div class = 'box'><img src = 'images/sports/{$row[4]}' alt = '{$pid}'></div>";
						?>
					</th>
				</tr>
				<tr>
					<td>Name</td>
					<td><?php echo $row[2]; ?></td>
				</tr>
				<tr>
					<td>Price</td>
					<td><b>Rs.<?php echo $row[3]; ?></td>
				</tr>
				<tr>
					<td>Quantity</td>
					<td><?php echo $quantity; ?></td>
				</tr>
				<tr>
					<td>Product ID</td>
					<td><?php echo $row[1]; ?></td>
				</tr>
				<tr>
					<td>Total Prize</td>
					<td><b><?php echo "Rs.",$total; ?></b></td>
				</tr>
				<tr>
					<td>Address</td>
					<td><?php echo $row1[0].'<br>';echo $row1[4]; ?></td>
				</tr>
				<tr>
					<td colspan="2"><input type="submit" name="submit" class="btn btn-primary" value="Confirm Order"></td>
				</tr>
			</table>
		</form>
			<br><br><br><br>
		<!--</div>-->
	<!--</div>-->
</body>
</html>
<?php 
	include('footer.php');
?>