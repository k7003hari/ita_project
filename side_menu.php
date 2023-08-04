<?php 
    $login = $_GET['login'];
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
    font-family: "Lato", sans-serif;
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
</head>
<body>

<div class="sidenav">
  <h3><u>CATEGORIES</u></h3>
  <a href="men.php?login=$login">Men</a>
  <a href="women.php?login=$login">Women</a>
  <a href="books.php?login=$login">Books</a>
  <a href="sports.php?login=$login">Sports</a>
  <a href="gadgets.php?login=$login">Gadgets</a>
</div>

<div class="main">
  
</div>
     
</body>
</html> 
