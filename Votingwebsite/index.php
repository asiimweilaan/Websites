<?php
  session_start();
  
  if(empty($_SESSION["email_sesh"]) && empty($_SESSION["password_sesh"])){ 
    $_SESSION["email_sesh"]="";
    $_SESSION["password_sesh"]="";
  }

  include 'connection.php';
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
            background: radial-gradient(rgba(255, 255, 255, 0.2),rgba(1,1,1,0.8)), url("img/img2.jpg");
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
                    <a class="nav-link active fw-bold" aria-current="page" href="index.php">Home</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="login.php">Login</a>
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
            
            <h2 class="mb-4 text-center"
            style="font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
            color: rgb(110, 187, 255);
            "
            >Welcome to Cavendish Voting Platform!</h2>


            <?php 
              if(!empty($_SESSION["email_sesh"] && !empty($_SESSION["password_sesh"]))){ 
              // checking if the user is already logged in to determine what to display
            ?>
                <h4 style="line-height: 3.5rem; 
                font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
                width: 50rem;
                margin: auto;
                border-radius: 10px 10px 10px 10px;
                background: linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.8));
                " class="mt-5 text-center text-light">You are currently logged in. View profile <a href="vote.php">here</a> or <a href="logout.php">logout here</a>.
                </h4>

            <?php

              } else{
            ?>
                  <h4 style="line-height: 3.5rem; 
                  font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
                  width: 50rem;
                  margin: auto;
                  border-radius: 5%;
                  background: linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.8));
                  " class="mt-5 text-center text-light">If you're new to this platform, you must first sign up to be able to vote for 
                      the different positions avalaible. You are not allowed to vote again once you've already
                      cast your vote. you can <a href="login.php">login here</a> if you have already created an account to 
                      see your profile or <a href="signup.php">sign up here</a> if you are new here.
                  </h4>
            <?php
              }
            ?>


            
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