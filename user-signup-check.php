<?php   
				session_start();
				$conn = mysqli_connect("localhost","root","");
				if (mysqli_connect_errno())
				{
					echo "Failed to connect to MySQL: " . mysqli_connect_error();
				}
				mysqli_select_db($conn,"ita");
				if(isset($_POST['submit'])){

					$email=$_POST["email"];
					$password=$_POST["password"];
					$name=$_POST["uname"];
					$phone=$_POST["phone"];
					$address=$_POST["address"];


					$sql="select name from admin where username='$username' and password='$password'";
					
					
					$result = $conn->query($sql);
					
					$row2=mysqli_fetch_row($result);
					if (mysqli_num_rows($result) > 0) {
						
						$_SESSION['username'] = $username;
						
							echo ("<SCRIPT LANGUAGE='JavaScript'>
							window.alert('Welcome RTO Admin')
							window.location.href='rto_admin.php'
							</SCRIPT>");
					}
					else {
							echo ("<SCRIPT LANGUAGE='JavaScript'>
							window.alert('Invalid Credentials')
							window.location.href='admin_login.php'
							</SCRIPT>");
					}
				}
?>