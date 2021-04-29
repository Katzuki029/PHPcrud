<?php 
    if(!isset($_SESSION))
    {
        session_start();
    }

    if(isset($_SESSION['UserLogin']))
    {
        echo "Welcome ".$_SESSION['UserLogin'];
    }
    else
    {
        header("location: login.php");
    }
    include_once("connection.php");
    $con = connection();

    $sql = "select * from tbl_information";
    $information = $con->query($sql) or die($con->error);
    $row = $information->fetch_array();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Information </title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<center><h1>Information</h1></center><br/>
<?php if(($_SESSION['UserLogin'] =="user")){?>
<a href="add.php">Add information</a>
<?php }?>
&nbsp &nbsp <a href="logout.php">Logout</a>
<table>
    <thead>
        <tr>
            <th></th>
            <th>Name</th>
            <th>Address</th>
        </tr>
    </thead>
    <tbody>
    <?php while($row = $information->fetch_array()):?>
            <tr>
                <td><a href="details.php?ID=<?php echo $row['id'];?>">View</a></td>
                <td><?php echo $row['name'];?></td>
                <td><?php echo $row['address'];?></td>
            </tr>
        <?php endwhile?>
    </tbody>
</table>
</body>
</html>