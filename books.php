<?php
	session_start();
	header("Cache-Control", "no-cache, no-store, must-revalidate");
	$login = $_GET['login'];
	//$username = $_GET['username'];
	$username = "Dummy";
	if($login==0) 
		include("header.php");
	else if($login==1 && isset($_SESSION["user"]))
	{
		$username = $_SESSION["user"];
		//$_SESSION['username'] = $username;
		include("login_header.php");
	}
	//include("side_menu.php");
	//include("connect.php");
	$conn = mysqli_connect("localhost","root","");
	mysqli_select_db($conn,"ita");
	$sql = "SELECT * FROM products where pid like '3%' ORDER BY pid "; 
	$result = $conn->query($sql);
?>
<HTML>
<HEAD>
<TITLE>Booksr</TITLE>
<!--<link href="imageStyles.css" rel="stylesheet" type="text/css" />-->
<style>
div.box  {
	width: 300px;
	height: 430px;
	border-style: solid;
	border-radius: 15px;
	border-color: grey;
	padding-top: 15px;
	padding-right: 25px;
	padding-left: 25px;
	padding-bottom: 370px;
	margin: 5px;
	text-align: center;
	background-color: #d6ebd9;
}

div.box img {
	width: 100%;
	height: 200px;
	-webkit-transition-duration: 0.4s; /* Safari */
    transition-duration: 0.5s;
}

div.box img:hover {
	transform: scale(1.2);
}

div.box h3 {
	text-align: center;
	font-family: arial;
	padding-top: 20px; 
}
div.box h4 {
	text-align: center;
	font-family: Times New Roman;
	padding-top: 20px; 
}

div.box input {
	text-align: center;
	align-content: center;
	float: center;
	margin-bottom: 30px;
	background-color: #4CAF50;
	-webkit-transition-duration: 0.4s; /* Safari */
    transition-duration: 0.4s;
}

div.box input:hover {
	background-color: #367477; 
    color: white;	
}

.gallery {
	width: 200px;
	height: 200px;
	padding: 35px;
}

.sidenav {
    height: relative;
    width: 300px;
    position: fixed;
    z-index: 1;
    top: 0;
    left: 0;
    background-color: #458b3b;
    overflow-x: hidden;
    padding-top: 20px;
    margin-top: 160px;
    vertical-align: center;
    color: #FFF;
}

.sidenav a {
    padding: 10px 8px 10px 16px;
    text-decoration: none;
    font-size: 25px;
    color: #FFF;
    display: block;
}

.sidenav a:hover {
    color: #000;
}

.main {
    margin-left: 300px; /* Same as the width of the sidenav */
    font-size: 28px; /* Increased text to enable scrolling */
    padding: 0px 10px;
    text-align: center;
}

.sidenav h3 {
    font-weight: bold;
    color: white;
    font-family: "Lato", sans-serif;
    margin-left: 16px;
    width:200px;
    margin-bottom: 5px; 
}

@media screen and (max-height: 450px) {
    .sidenav {padding-top: 15px;}
    .sidenav a {font-size: 18px;}

}
</style>

</HEAD>
<BODY bgcolor="#E6E6FA">
<br><br>

<div class="sidenav">
  <h3><u>CATEGORIES</u></h3>
  <a href="men.php?login=<?php echo $login; ?>">Men</a>
  <a href="women.php?login=<?php echo $login; ?>">Women</a>
  <a href="">Books</a>
  <a href="sports.php?login=<?php echo $login; ?>">Sports</a>
  <a href="gadgets.php?login=<?php echo $login; ?>">Gadgets</a>
</div>

<div class="main">
<table align="center">
<?php
	$i=0;
	while($row = mysqli_fetch_assoc($result))
	{
		$pid = $row['pid'];
		$login = $_GET['login'];
		//echo "$name";
		if($i%3==0){
			echo"<tr>";
		}
		echo"<td><div class = 'box'><img src = 'images/books/{$row['image']}' alt = '{$row['pid']}'>
		<h4><b>{$row['pname']}<b></h4>
		<h3>Price: <b>Rs.{$row['price']}</b></h3>
		<br>
		<form action = 'books_shop.php?pid=$pid & login=$login & username=$username' method = 'post'>
		<input type='submit' class='btn btn-primary' align='center' name='{$pid}' value='Buy'></input></form></div></td>";
		if($i%3==2){
			echo"</tr>";
		}
		$i++;
	} 
/*{
	echo '<img src="data:image/jpeg;base64,'.base64_encode( $row['pic'] ).'"/>';
	//header("Content-type: " . $row["pic"]); 
	//echo $row["pic"]; 
}*/
?>
</table>
</div>

</BODY>
</HTML>
<?php
	echo "<br>"; 
	include("footer.php");
?>
