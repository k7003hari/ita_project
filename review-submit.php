<?php 
	session_start();
	include("login_header.php");
	$conn = mysqli_connect("localhost","root","");
	if (mysqli_connect_errno())
	{
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	mysqli_select_db($conn,"ita");
	if(isset($_POST['submit']))
	{
		$_SESSION["user"] = $_GET['username'];
		$username = $_GET['username'];
		$pid = $_GET['pid'];
		//$pname = $_GET['pname'];

		$prod = "select * from products where pid='$pid'";
		$res = mysqli_query($conn, $prod);
		$row1 = mysqli_fetch_array($res);
		$pname = $row1[2];

		$email = $_GET['email'];
		$review = htmlspecialchars($_POST['comment']);
		$ip = "10.100.12.34";

		/*
		function get_client_ip_server() 
		{
   			$ipaddress = '';
    		if ($_SERVER['HTTP_CLIENT_IP'])
        		$ipaddress = $_SERVER['HTTP_CLIENT_IP'];
    		else if($_SERVER['HTTP_X_FORWARDED_FOR'])
        		$ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
    		else if($_SERVER['HTTP_X_FORWARDED'])
        		$ipaddress = $_SERVER['HTTP_X_FORWARDED'];
    		else if($_SERVER['HTTP_FORWARDED_FOR'])
       			$ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
    		else if($_SERVER['HTTP_FORWARDED'])
        		$ipaddress = $_SERVER['HTTP_FORWARDED'];
    		else if($_SERVER['REMOTE_ADDR'])
        		$ipaddress = $_SERVER['REMOTE_ADDR'];
    		else
        		$ipaddress = 'UNKNOWN';

    		return $ipaddress;
		}
		*/

		function get_client_ip_env() 
		{
    		$ipaddress = '';
    		if (getenv('HTTP_CLIENT_IP'))
        		$ipaddress = getenv('HTTP_CLIENT_IP');
    		else if(getenv('HTTP_X_FORWARDED_FOR'))
        		$ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    		else if(getenv('HTTP_X_FORWARDED'))
        		$ipaddress = getenv('HTTP_X_FORWARDED');
   			else if(getenv('HTTP_FORWARDED_FOR'))
        		$ipaddress = getenv('HTTP_FORWARDED_FOR');
    		else if(getenv('HTTP_FORWARDED'))
        		$ipaddress = getenv('HTTP_FORWARDED');
    		else if(getenv('REMOTE_ADDR'))
        		$ipaddress = getenv('REMOTE_ADDR');
    		else
        		$ipaddress = 'UNKNOWN';

    		return $ipaddress;
		}

		$ip = get_client_ip_env();
		$sql = "insert into reviews (pid, pname, username, email, review, ip) values ('$pid', '$pname', '$username', '$email', '$review', '$ip')";
		if (mysqli_query($conn, $sql))
		{
			echo "review submitted";
			$_SESSION["user"] = $_GET['username'];
			echo "<script>window.alert('Review submitted successfully!!')</script>";
			//window.location.href='review-product.php?login=1 & username={$username}'</script>";
		}
		else
		{
			$_SESSION["user"] = $_GET['username'];
			echo "<script>window.alert('Could not submit review')
			windo.location.href='review-product.php?login=1 & username={$username}'</script>";
		}
	}
?>