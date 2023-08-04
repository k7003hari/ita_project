<?php
	session_start();
	//if(isset($_SESSION('user'))) 
		include("admin_login_header.php");
	/*else{
		echo("<SCRIPT LANGUAGE='JavaScript'
			window.alert('Login Error!')
			window.location.href='admin-login.php'
			</SCRIPT>");
	}*/
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
		$price = $_POST["price"];
		$image = $_POST["image"];
		$info = $_POST["info"];

		$check = "select * from products where pid = '$pid' or pname = '$pname'";
		$res = $conn->query($check);

		//$row = mysqli_fetch_row($res);
		if (mysqli_num_rows($res) > 0){
			echo ("<SCRIPT LANGUAGE='JavaScript'>
					window.alert('Product Already Exists!!')
					window.location.href='ita-admin.php'
					</SCRIPT>");
		}


		$sql = "insert into products (category,pid,pname,price,image,info) values ('$category','$pid','$pname','$price','$image','$info')";

		if (mysqli_query($conn, $sql))
		{
			echo "<script>window.alert('Product added successfully')
			window.location.href='admin-add-product.php'</script>";
		}
	}
	//include("admin-side-menu.php");
	//$action = $_GET['action'];
?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin</title>
<style type="text/css">
	table,tr,td {
		align-items: center;
		text-align: center;
		align-content: center;
		border-style: solid;
		border-color: grey;
    	border-collapse: collapse;
    	padding: 20px;
    	max-width: 1000px;
    	background-color: #b3f3ef;
    	font-family: Helvetica;
    	font-weight:normal;
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
		margin-left: 10px;
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
				<!--<tr>
					<th rowspan="100">
						<?php //echo "<div class = 'box'><img src = 'images/men/{$image}' alt = '{$pid}'></div>" ?>
						<h5 align="center">(hover over image to zoom in)</h6>
					</th>
				</tr>-->
				<tr>
					<td>Category<br>(Men-1; Women-2; Books-3; Gadgets-4; Sports-5)</td>
					<td><input type="text" name="category"></td>
				</tr>
				<tr>
					<td>Product ID</td>
					<td><input type="text" name="pid"></td>
				</tr>
				<tr>
					<td>Product Name</td>
					<td><input type="text" name="pname"></td>
				</tr>
				<tr>
					<td>Price</td>
					<td><input type="text" name="price"></td>
				</tr>
				<tr>
					<td>Image filename</td>
					<td>
						<input type="text" name="image">
					</td>
				</tr>
				<tr>
					<td>Description</td>
					<td>
						<input type="text" name="info">
					</td>
				</tr>
				<tr>
					<td colspan="2">
						<a href="ita-admin.php">
						<button type="button" class="btn btn-danger">Go Back</button></a>
						<button type="button" class="btn btn-primary">Reset</button>
						<input type="submit" class="btn btn-success" name="submit" value="Add Product" align="center">
					</td>
				</tr>
			</table>
		</form>
</body>
</html>
<?php 
	echo "<br><br><br>";
	include('admin-footer.php');
?>