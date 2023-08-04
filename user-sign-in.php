<?php   
				//session_start();
				//header("Cache-Control", "no-cache, no-store, must-revalidate");
				$conn = mysqli_connect("localhost","root","");
				if (mysqli_connect_errno())
				{
					echo "Failed to connect to MySQL: " . mysqli_connect_error();
				}
				mysqli_select_db($conn,"ita");
				$entry = 1;
				if(isset($_POST['submit']))
				{
					$password=$_POST["password"];
					$email=$_POST["email"];

					$check = "select * from users where email='$email' and password='$password'";
					$res = $conn->query($check);
					
					if (mysqli_num_rows($res) > 0)
					{
						
						$row = mysqli_fetch_assoc($res);
						$user = $row['name'];
						
						session_start();
						$_SESSION["user"] = $user;
						echo ("<SCRIPT LANGUAGE='JavaScript'>
							window.alert('Welcome {$user}')
							window.location.href='men.php?login=1'
							</SCRIPT>");
					}
					else
					{
						echo "<script>window.alert('Invlaid Credentials!!')
							  window.location.href='sign-in.php'</script>";
					}
					
				}
?>