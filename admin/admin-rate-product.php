<?php
	//header("Cache-Control", "no-cache, no-store, must-revalidate");
	session_start();
		include("admin_login_header.php");
	$conn = mysqli_connect("localhost","root","");
	if (mysqli_connect_errno())
	{
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	$conn = mysqli_connect("localhost","root","");
	mysqli_select_db($conn,"ita");
	//$sql = "SELECT * FROM products where pid like '1%' ORDER BY pid "; 
	$sql = "select distinct(pid) from reviews";
	$result = $conn->query($sql);
?>
<HTML>
<HEAD>
<TITLE>Product Rating</TITLE>
<style>

table,tr,td {
		border-style: solid;
		border-color: grey;
    	border-collapse: collapse;
    	padding: 10px;
    	width: auto;
    	background-color: #fff;
    	font-family: Helvetica;
    	font-weight: normal;
    	align-items: center;
    	align-content: center;
	}

	th {
		border-style: solid;
		border-color: darkgreen;
		background-color: #49a03d;
		font-family: Arial;
    	font-weight: bold;
    	text-align: center;
		padding: 10px;
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

	a:active {
    	color: blue;
	}
	a:visited {
    	color: violet;
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

@media screen and (max-height: 450px) {
    .sidenav {padding-top: 15px;}
    .sidenav a {font-size: 18px;}
}

</style>

</HEAD>
<BODY bgcolor="#E6E6FA">
<br><br>

<div class="main">
	<br><br>
	<table align="center">

		<tr>
			<th><font color="white"><b>Product ID</td>
			<th><font color="white"><b>Product</td>
			<th><font color="white"><b>Review</td>
			<th><font color="white"><b>Action</td>
		</tr>

		<?php 
		while($row = mysqli_fetch_assoc($result))
		{	$pid =  $row['pid'];
			$pro = "select pname from products where pid='$pid'";
			$res = $conn->query($pro);
			$ro = mysqli_fetch_assoc($res);
			$pname = $ro['pname'];
			$sql1 = "select review from reviews where pid='$pid'";
			$result1 = $conn->query($sql1);
			$treview=" ";
			while($row1 = mysqli_fetch_assoc($result1)){
				$treview = $treview." ".$row1['review'];
			}
		?>

		<tr>
			<td><?php echo $pid; ?></td>
			<td><?php echo $pname; ?></td>
			<td><?php echo $treview; ?></td>
			<td><a href="admin-rate-confirm.php?pid=<?php echo $pid; ?> & treview=<?php echo $treview; ?>">Rate</a></td>
		</tr>

		<?php 
		}
		?>
				
		<tr>
			<th colspan="10"><a href="ita-admin.php"><button type="button" class="btn btn-default">Go Back</button></a></th>
		</tr>
	</table>
</div>

</BODY>
</HTML>
<?php
	echo "<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>"; 
	include("admin-footer.php");
?>
