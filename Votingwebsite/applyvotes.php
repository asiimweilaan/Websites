<?php 
    include 'connection.php';

    session_start();

    $email_sesh = $_SESSION["email_sesh"];

    $status_sql = "SELECT stat FROM `student` WHERE stemail = '$email_sesh'"; // checking if current user has already voted
    $status_query = mysqli_query($status,$status_sql);
    $status_row = mysqli_fetch_array($status_query);

    if($status_row[0]!="voted"){

        $sql = "UPDATE `student` SET stat='voted' WHERE stemail = '$email_sesh'";
        mysqli_query($status,$sql);


    }

    if(isset($_POST['arrArray'])){
        $values = $_POST['arrArray'];
        
        for ($i=0; $i <sizeof($values) ; $i++) { 

            $curr_value = $values[$i];

            $sql1 = "SELECT count FROM `prefect` WHERE pid = $curr_value";
            $query1 = mysqli_query($status,$sql1);
            $query1_row = mysqli_fetch_array($query1);

            if($query1_row>0){
                
                $num = $query1_row[0]; // storing the current number of votes under this candidate
                $num +=1; // adding one vote on the candidate

                // echo $num;

                $sql2 = "UPDATE `prefect` SET count=$num WHERE pid = $curr_value";
                
                mysqli_query($status,$sql2);

            }
        }
    }
?>