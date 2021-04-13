<?php

    function connection()
    {
        $con = new mysqli("localhost","root","","db_information");

        if($con->connect_error)
        {
            echo $con->connect_error;
        }
        else
        {
            return $con;
        }
    }

?>