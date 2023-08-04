<?php   
				session_start();
				header("Cache-Control", "no-cache, no-store, must-revalidate");
				$conn = mysqli_connect("localhost","root","");
				if (mysqli_connect_errno())
				{
					echo "Failed to connect to MySQL: " . mysqli_connect_error();
				}
				mysqli_select_db($conn,"ita");
				$entry = 1;
				if(isset($_POST['submit']))
				{
					$email=$_POST["email"];
					$password=$_POST["password"];
					$name=$_POST["uname"];
					$phone=$_POST["phone"];
					$address=$_POST["address"];

					$check = "select * from users WHERE email='$email'";
					$res = $conn->query($check);

					$row = mysqli_fetch_row($res);
					if (mysqli_num_rows($res) > 0)
					{
						$entry = 0;
						echo ("<SCRIPT LANGUAGE='JavaScript'>
							window.alert('User Already Exists!!Login to Shop')
							window.location.href='sign-in.php'
							</SCRIPT>");
					}
					
					if(strlen($password)<8){
						$entry = 0;
						echo "<script>window.alert('Password - Atleast 8 characters!!')
							  window.location.href='sign-up.php'</script>";
					}

					if($entry==1){
				$sql="insert into users(name, email, password, phone, address) values ('$name','$email','$password','$phone','$address')";
					if (mysqli_query($conn, $sql))
					{
						$_SESSION["user"] = $name;
						echo "<script>window.alert('Record created successfully')
							  window.location.href='men.php?login=1 & username=$name'</script>";
					}	
					else
					{
						echo "Error: " . $sql . "<br>" . mysqli_error($conn);
					}
				}
				}
?>