<?php
    if(!isset($_SESSION))
    {
        session_start();
    }
    include_once("connection.php");
    $con = connection();

    if(isset($_POST['login']))
    {
        $user = mysqli_real_escape_string($con, $_POST['username']);
        $pass =mysqli_real_escape_string($con, $_POST['password']);

        $sql = "select * from tbl_user where username = '$user' and password = '$pass'";
        $user = $con->query($sql) or die($con->error);
        $row = $user->fetch_array();
        $total = $user->num_rows;


        if($total>0)
        {
            $_SESSION['UserLogin'] = $row['username'];
            $_SESSION['Access'] = $row['access'];

            header("location: index.php");
        }
        else
        {
            echo "No User Found!";
        }

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
<h1>Login Page</h1><br/><br/>
    <form action="" method="post">
    <label>Username: </label>
            <input type="text" name="username"><br/><br/>

        <label>Password: </label>
            <input type="password" name="password"><br/><br/>

        <input type="submit" name="login">
    
    </form>    
</body>
</html>