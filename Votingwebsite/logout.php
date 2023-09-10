<?php 

    include 'connection.php';

    session_start();

    // session_destroy();
    unset($_SESSION['email_sesh']);
    unset($_SESSION['password_sesh']);





    header('Location:index.php');


?>