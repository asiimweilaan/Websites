<?php 
    
    session_start();

    // session_destroy();

    include '../connection.php';
    
    unset($_SESSION['adminemail_sesh']);
    unset($_SESSION['adminpassword_sesh']);

    header('Location:index.php');


?>