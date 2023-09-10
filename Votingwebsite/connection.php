<?php 

    $hostname = "localhost";
    $username = "root";
    $dbname = "voting";

    $status = mysqli_connect($hostname,$username);

    mysqli_select_db($status,$dbname);

    

?>