<?php
    $connection=mysqli_connect("localhost", "root", "", "Details");
    if($connection)
    {
        echo "connection established"."<br>";
    }
    else
    {
        echo "error";
    }
    $EMPID=mysqli_real_escape_string($connection, $_POST['empid']);
    $NAME=mysqli_real_escape_string($connection, $_POST['ename']);
    $MANAGERID=mysqli_real_escape_string($connection, $_POST['mid']);
    $DATEOFJOINING=mysqli_real_escape_string($connection, $_POST['doj']);
    $CITY=mysqli_real_escape_string($connection, $_POST['city']);
    $PROJECT=mysqli_real_escape_string($connection, $_POST['pro']);
    $SALARY=mysqli_real_escape_string($conection, $_POST['sal']);
    $query="CREATE TABLE EMPLOYEE_TABLE(EMPID INT ,NAME VARCHAR(15), MANAGERID INT, DATEOFJOINING DATE, CITY VARCHAR(15), PROJECT VARCHAR(5), SALARY INT);";
    if(mysqli_query($connection, $query))
    {
        echo "table created"."<br>";
    }
    else
    {
        echo "error:".mysqli_error($connection);
    }
    $query="INSERT INTO EMPLOYEE_TABLE VALUES('$EMPID','$NAME', '$MANAGERID', '$DATEOFJOINING', '$CITY', '$PROJECT', '$SALARY');";
    if(mysqli_query($coonection, $query))
    {
        echo "record inserted"."<br>";
    }
    else
    {
        echo "error:".mysqli_error($connection)."<br>";
    }
?>
<table border="1">
    <tr>
        <th>EMPID</th>
        <th>NAME</th>
        <th>MANAGERID</th>
        <th>DATEOFJOINING</th>
        <th>CITY</th>
        <th>PROJECT</th>
        <th>SALARY</th>
    </tr>
    <?php
        $query="SELECT * FROM EMPLOYEE_TABLE;";
        $check=mysqli_query($connection, $query);
        if(mysqli_num_rows($check))
        {
            while($row=mysqli_fetch_assoc($check))
            {
                <tr>
                <td><?php echo $row['EMPID'];?></td>
                <td><?php echo $row['NAME'];?></td>
                <td><?php echo $row['MANAGERID'];?></td>
                <td><?php echo $row['DATEOFJOINING'];?></td>
                <td><?php echo $row['CITY'];?></td>
                <td><?php echo $row['PROJECT'];?></td>
                <td><?php echo $row['SALARY'];?></td>
                </tr>
                <?php
            }
        }
        else
        {
            echo "table is empty";
        }
    ?>
