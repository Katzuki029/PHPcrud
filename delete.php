<?php

    include_once("connection.php");
    $con = connection();

    if(isset($_POST['delete']))
    {
        $id = $_POST['ID'];

        $sql = "delete from tbl_information where id = '$id'";
        $con->query($sql) or die($con->error);

        header("location: index.php");
    }
?>