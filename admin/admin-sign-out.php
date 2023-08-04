<?php 
	session_start();
	unset($_SESSION["user"]);
	session_destroy();
	echo "<script>window.alert('See you again!!')
							  window.location.href='../home.html'</script>";
?>