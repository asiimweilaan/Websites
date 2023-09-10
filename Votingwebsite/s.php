<?php 
    
    include 'connection.php';

    $sql = mysqli_query($status,"SELECT * from `prefect`");

    $res = mysqli_fetch_all($sql,);

    foreach($res as $x){
        $res2 = $x["postid"]; 
        echo $res2;
    }

?>