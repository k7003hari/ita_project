<?php
	session_start();
	//if(isset($_SESSION('user')))
	include("admin_login_header.php");
	$conn = mysqli_connect("localhost","root","");
	if (mysqli_connect_errno())
	{
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	mysqli_select_db($conn,"ita");
	if(isset($_POST['submit']))
	{
		$category = $_POST["category"];
		$pid = $_POST["pid"];
		$pname = $_POST["pname"];

		$sql="delete from products where category='$category' and pid='$pid' and pname='$pname'";
		$result = $conn->query($sql);
		if (mysqli_affected_rows($conn)==1) {
			echo ("<SCRIPT LANGUAGE='JavaScript'>
				window.alert('Product removed successfully!!')
				window.location.href='admin-delete-product.php'
				</SCRIPT>");
		}
		else
		{
			echo ("<SCRIPT LANGUAGE='JavaScript'>
				window.alert('Error!! No product found')
				window.location.href='admin-delete-product.php'
				</SCRIPT>");
		}
	}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin</title>
<style type="text/css">
	table,tr,td {

		border-style: solid;
		border-color: grey;
    	border-collapse: collapse;
    	padding: 20px;
    	max-width: 1000px;
    	background-color: #b3f3ef;
    	font-family: Helvetica;
    	font-weight: bold;
	}

	th {
		padding: 30px;
	}

	td input {
		margin-right: 10px;
		margin-left: 10px; 
	}

	td p {
		font-family: verdana;
		font-weight: normal;
		color: blue;
	}

	td button {
		padding: auto;
		margin-left: 200px;
		margin-right: auto;
		align-items: center;
		text-align: center;
		align-content: center;
		float: center;
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
<body>
<br><br>
		<form action="" method="post">
			<table align="center">
				<tr>
					<td><b>Category</b><br>(Men-1; Women-2; Books-3; Gadgets-4; Sports-5)</td>
					<td><input type="text" name="category"></td>
				</tr>
				<tr>
					<td><b>Product ID</b></td>
					<td><input type="text" name="pid"></td>
				</tr>
				<tr>
					<td><b>Product Name</b></td>
					<td><input type="text" name="pname"></td>
				</tr>
				<tr>
					<td colspan="2">
						<a href="ita-admin.php">
						<button type="button" class="btn btn-danger">Go Back</button></a>
						<input type="submit" class="btn btn-primary" value="Delete Product" name="submit">
					</td>
				</tr>
			</table>
		</form>
</body>
</html>
<?php 
	echo "<br><br><br><br>";
	include('admin-footer.php');
?>