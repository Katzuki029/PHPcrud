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

    if(isset($_POST['submit']))
    {
        $name = $_POST['name'];
        $address = $_POST['address'];

        $sql = "update tbl_information set name = '$name', address = '$address' where id = '$ID'";
        $con->query($sql) or die($con->error);

        header("location: index.php");
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<a href="index.php">BACK</a> <br/><br/>
    <form action="" method="post">
    
        <label>Name: </label>
            <input type="text" name="name" value="<?php echo $row['name'];?>"><br/><br/>

        <label>Address: </label>
            <input type="text" name="address" value="<?php echo $row['address'];?>"><br/><br/>

        <input type="submit" name="submit">
    </form>
</body>
</html>