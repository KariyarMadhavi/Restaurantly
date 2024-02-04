<?php
	$connection=mysqli_connect("localhost","root","", "table"); 
	if($connection)
	{
		echo "connection succesfully"."<br>";
	}
	else
	{
		echo "Connection error";
	}
	$name=mysqli_real_escape_string($connection, $_POST['uname']);
	$pass=mysqli_real_escape_string($connection,$_POST['pwd']);
	$query="CREATE TABLE sample(username VARCHAR(15) NOT NULL, password CHAR(8) NOT NULL);";
	if(mysqli_query($connection, $query))
	{
		echo "table is created";
	}
	else
	{
		echo "error".mysqli_error($connection);
	}
	$query="INSERT INTO sample VALUES('$name', '$pass');";
	if(mysqli_query($connection, $query))
	{
		echo "record inserted"."<br>";
	}
	else
	{
		echo "error".mysqli_error($connection)."<br>";
	}
	$query="SELECT * FROM sample;";
	$check=mysqli_query($connection, $query);
	if(mysqli_num_rows($check))
	{
		while($row=mysqli_fetch_assoc($check))
		{
			echo $row['username']." ".$row['password'];
		}
	}
	else
	{
		echo "empty table";
	}
?>
