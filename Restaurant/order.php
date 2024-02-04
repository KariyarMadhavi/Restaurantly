<?php
	$connection=mysqli_connect("localhost","root","", "eathouse"); 
	if($connection)
	{
		echo "connection succesfully"."<br>";
	}
	else
	{
		echo "Connection error";
	}
	
	$cname=$_POST['cname'];
	$pnum=$_POST['pnum'];
	$qtn=$_POST['qtn'];
	
	/*$query="CREATE TABLE customerorder(c_name VARCHAR(15) , c_num VARACHAR(15) , quantity VARCHAR(10);";
	if (mysqli_query($connection,$query))
	{
		echo "table is created";
	}
	else
	{
		echo "error".mysqli_error($connection);
	}*/
	$query="INSERT INTO customerorder VALUES('$cname', '$pnum', '$qtn');";
	if(mysqli_query($connection, $query))
	{
		echo "record inserted"."<br>";
	}
	else
	{
		echo "error".mysqli_error($connection)."<br>";
	}
	$query="SELECT * FROM customerorder;";
	$check=mysqli_query($connection, $query);
	if(mysqli_num_rows($check))
	{
		while($row=mysqli_fetch_assoc($check))
		{
			echo $row['c_name']." ".$row['c_num']." ".$row['quantity'];
		}
	}
	else
	{
		echo "table empty";
	}
	
	?>
