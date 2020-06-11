<?php
	
		// session_start();
		// if (isset($_SESSION['type'])) {
		//  if ($_SESSION['type'] == 'user') {
		// 	header('location: Home.php');
		//  	}
		//  else if ($_SESSION['type'] == 'admin') {
		//  	header('location: adminhome.php');
		// 	}
		// }

	
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "dbms";
	
	if(isset($_POST['sub'])){
		$con =  mysqli_connect($servername, $username, $password, $dbname);
		if(!$con)
		{
			die("Connection failed : ".$con->connect_error);
		}
		else{
		
		
			$user=$_POST['email'];
			$pass=$_POST['password'];
		
		
			$q = "SELECT * FROM user WHERE username='$user' AND password='$pass'";
			$result = mysqli_query($con,$q);


			if (mysqli_num_rows($result) > 0) 
			{
				session_start();
				$row = mysqli_fetch_assoc($result);
				$type = $row['type'];
				if($type == "admin")
				{

				   $_SESSION['type'] = "admin";
                  echo "<script>window.location.href='adminhome.php';</script>" ;
				}
				else
				{
					$_SESSION['type']="user";
                    echo"<script> window.location.href='Home.php'; </script>" ;
				}
				// $abc = $_SESSION['type'];
				// echo "<script type='text/javascript'>alert('$abc');window.location.href = 'Loginmain.php';</script>";
				// echo $_SESSION['type'];
				
			}
			else
			{
				echo "<script type='text/javascript'>alert('Invalid Email/Password!');window.location.href = 'Loginmain.php';</script>";
			}
		}
	}
			
?>