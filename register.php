<?php
	$servername="localhost";
	$username="root";
	$password="";
	$dbname="dbms";

	$conn = mysqli_connect($servername, $username, $password, $dbname);
	if ($conn->connect_error) {
		die("Connection Failed : ".$conn->connect_error);
	}
	$em=$_POST['email'];
	$ps=$_POST['password'];

	$sql1="select username from user where username = '".$em."'";
	$result=$conn->query($sql1);
	if($result ->num_rows >0)
	{
		echo "<script type='text/javascript'>alert('Email already registered!');window.location.href = 'Registermain.php';</script>";
	}
	else{
		$sql="insert into user values('$em','$ps','user')";
		$result=$conn->query($sql);
		if($result)
		{
			header('Location: Loginmain.php');
		}
		else{
			die("connection failed");
		}
	}
?>