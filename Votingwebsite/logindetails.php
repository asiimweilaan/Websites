<?php
    session_start(); // saving details when we log in to avoid logging in again if not logged out

    include 'connection.php';

    $email = $_POST["email"];
    $password = $_POST["password"];

    $insertsql = "SELECT * FROM student WHERE stemail = '$email' AND pass = '$password' ";

    
    $checksql = "SELECT * from `student` WHERE stemail='$email'";


    if(!empty($email) && !empty($password)){

        $sqlcheck = mysqli_query($status,$checksql);
        
        $row = mysqli_fetch_assoc($sqlcheck);
        
        if($row>0){

            $_SESSION["email_sesh"] = $email; 
            $_SESSION["password_sesh"] = $password;

            $sql = mysqli_query($status,$insertsql);
            $row2 = mysqli_fetch_array($sql);
            
            if($row2>0){
                header('Location:vote.php');

            }
            else{
        ?>
                <!DOCTYPE html>
            <html lang="en">
                <head>
                    <meta charset="UTF-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <title>Document</title>
                    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
                    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
                    <style>
                        .content{
                            /* background: url("img/img1.jpg"); */
                            background: radial-gradient(rgba(255, 255, 255, 0.2),rgba(1,1,1,0.8)), url("img/img3.jpg");
                            background-size: cover;
                            background-position: center;
                            width: 100%;
                            height: 700px;
                        }
                    </style>
                </head>
                
                <body>
                    <nav class="navbar bg-dark border-bottom border-body" data-bs-theme="dark">
                    
                    <a href="index.php"><img src="img/img1.jpg" style="object-fit: cover; width: 50px; height: 50px;
                    border-radius: 100%;" class="ms-2" alt="cavendish logo"></a>

                    <nav class="navbar navbar-expand-lg me-auto ms-auto w-50">
                        <div class="container-fluid w-100">
                        <div class="collapse navbar-collapse" id="navbarNav">
                            <ul class="navbar-nav justify-content-around" style="width: 100%;">
                            <li class="nav-item ">
                                <a class="nav-link" aria-current="page" href="index.php">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active fw-bold" href="login.php">Login</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="signup.php">Sign Up</a>
                            </li>
                            </ul>
                        </div>
                        </div>
                    </nav>
                    </nav>

                    <div class="content pt-5">
                        <div class="container-fluid">
                            
                            <h4 class="mb-4 text-center py-2"
                            style="font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
                            border-radius: 10px 10px 10px 10px;
                            background: linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.8));
                            color: #ff0000;
                            "
                                > Password does not match email. Please try again
                            </h4>
                        </div>
                    </div>
                    
                    <footer class="bg-black">
                            <h4 class="pt-3 mb-3 text-center text-white"
                            style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;"
                            >Contact us via email for any inquiries @ab88356@students.cavendish.ac.ug</h4>
                            <hr class="bg-light ms-auto me-auto" style="width: 70rem; height: 0.2rem;">
                            <nav class="pb-4" style="font-size: 30px; margin-left: 50%;">
                                <a href="https://mail.google.com"><i class="bi-envelope-at-fill"></i></a>
                            </nav>
                    </footer>

                </body>
            </html>
                    

        <?php
            }
        }

        else{
    ?>
            <!DOCTYPE html>
            <html lang="en">
                <head>
                    <meta charset="UTF-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <title>Voting Website</title>
                    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
                    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
                    <style>
                        .content{
                            /* background: url("img/img1.jpg"); */
                            background: radial-gradient(rgba(255, 255, 255, 0.2),rgba(1,1,1,0.8)), url("img/img3.jpg");
                            background-size: cover;
                            background-position: center;
                            width: 100%;
                            height: 700px;
                        }
                    </style>
                </head>
                
                <body>
                    <nav class="navbar bg-dark border-bottom border-body" data-bs-theme="dark">
                    
                    <a href="index.php"><img src="img/img1.jpg" style="object-fit: cover; width: 50px; height: 50px;
                    border-radius: 100%;" class="ms-2" alt="cavendish logo"></a>

                    <nav class="navbar navbar-expand-lg me-auto ms-auto w-50">
                        <div class="container-fluid w-100">
                        <div class="collapse navbar-collapse" id="navbarNav">
                            <ul class="navbar-nav justify-content-around" style="width: 100%;">
                            <li class="nav-item ">
                                <a class="nav-link" aria-current="page" href="index.php">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active fw-bold" href="login.php">Login</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="signup.php">Sign Up</a>
                            </li>
                            </ul>
                        </div>
                        </div>
                    </nav>
                    </nav>

                    <div class="content pt-5">
                        <div class="container-fluid">
                            
                            <h4 class="mb-4 text-center py-2"
                            style="font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
                            border-radius: 10px 10px 10px 10px;
                            background: linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.8));
                            color: #ff0000;
                            "
                                > Email doesn't exist. Are you sure
                                    you signed up?
                            </h4>
                        </div>
                    </div>

                <footer class="bg-black">
                    <h4 class="pt-3 mb-3 text-center text-white"
                    style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;"
                    >Contact us via email for any inquiries @ab88356@students.cavendish.ac.ug</h4>
                    <hr class="bg-light ms-auto me-auto" style="width: 70rem; height: 0.2rem;">
                    <nav class="pb-4" style="font-size: 30px; margin-left: 50%;">
                        <a href="https://mail.google.com"><i class="bi-envelope-at-fill"></i></a>
                    </nav>
                </footer>
                </body>
            </html>
        
        <?php
        
        }

    }
    else{
    ?>
        <!DOCTYPE html>
            <html lang="en">
                <head>
                    <meta charset="UTF-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <title>Voting Website</title>
                    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
                    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
                    <style>
                        .content{
                            /* background: url("img/img1.jpg"); */
                            background: radial-gradient(rgba(255, 255, 255, 0.2),rgba(1,1,1,0.8)), url("img/img3.jpg");
                            background-size: cover;
                            background-position: center;
                            width: 100%;
                            height: 700px;
                        }
                    </style>
                </head>
                
                <body>
                    <nav class="navbar bg-dark border-bottom border-body" data-bs-theme="dark">
                    
                    <a href="index.php"><img src="img/img1.jpg" style="object-fit: cover; width: 50px; height: 50px;
                    border-radius: 100%;" class="ms-2" alt="cavendish logo"></a>

                    <nav class="navbar navbar-expand-lg me-auto ms-auto w-50">
                        <div class="container-fluid w-100">
                        <div class="collapse navbar-collapse" id="navbarNav">
                            <ul class="navbar-nav justify-content-around" style="width: 100%;">
                            <li class="nav-item ">
                                <a class="nav-link" aria-current="page" href="index.php">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active fw-bold" href="login.php">Login</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="signup.php">Sign Up</a>
                            </li>
                            </ul>
                        </div>
                        </div>
                    </nav>
                    </nav>

                    <div class="content pt-5">
                        <div class="container-fluid">
                            
                            <h4 class="mb-4 text-center py-2"
                            style="font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
                            border-radius: 10px 10px 10px 10px;
                            background: linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.8));
                            color: #ff0000;
                            "
                                > Failed to Login. Please fill in both email and password fields and try again
                            </h4>
                        </div>
                    </div>
                    
                    <footer class="bg-black">
                        <h4 class="pt-3 mb-3 text-center text-white"
                        style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;"
                        >Contact us via email for any inquiries @ab88356@students.cavendish.ac.ug</h4>
                        <hr class="bg-light ms-auto me-auto" style="width: 70rem; height: 0.2rem;">
                        <nav class="pb-4" style="font-size: 30px; margin-left: 50%;">
                            <a href="https://mail.google.com"><i class="bi-envelope-at-fill"></i></a>
                        </nav>
                    </footer>
                </body>
            </html>

    <?php
    }
    

?>