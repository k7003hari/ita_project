<?php 
	session_start();
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
		$username = $_GET['username'];
		$email = $_GET['email'];
		$pid = $_GET['pid'];
		$pname = $_GET["pname"];
		$price = $_GET["price"];
		$quantity = $_GET['quantity'];
		$total = $_GET['total'];
		$address = $_GET['address'];
		$date = date("Y-m-d");
		$sql = "insert into orders (username, email, pid, pname, price, quantity, total, address, date) values 
								  	('$username', '$email', '$pid', '$pname', '$price', '$quantity', '$total', '$address', '$date')";
		if (mysqli_query($conn, $sql))
		{
			$_SESSION["user"] = $_GET['username'];
			echo "<script>window.alert('Order placed successfully!!')
			window.location.href='men.php?login=1 & username={$username}'</script>";
		}
		else
		{
			$_SESSION["user"] = $_GET['username'];
			echo "<script>window.alert('Could not place order')
			windo.location.href='men.php?login=1 & username={$username}'</script>";
		}
	}
?>