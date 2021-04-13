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
    $ID = $_GET['ID'];

    $sql = "select * from tbl_information where id = '$ID'";
    $information = $con->query($sql) or die($con->error);
    $row = $information->fetch_array();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Details</title>
</head>
<body>
<a href="index.php">BACK</a> <br/><br/>
<a href="edit.php?ID=<?php echo $row['id'];?>">Edit information</a>
&nbsp &nbsp <form action="delete.php" method="post">
                <button type="submit" name="delete">Delete Information</button>
                <input type="hidden" name="ID" value="<?php echo $row['id'];?>">
            </form>
    <h2>
    Name:<?php echo $row['name'];?> <br/><br/>
    Address: <?php echo $row['address'];?>
    </h2>
</body>
</html>