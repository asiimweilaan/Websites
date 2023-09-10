<?php
//   session_start();
  
//   if(empty($_SESSION["email_sesh"]) && empty($_SESSION["password_sesh"])){ 
//     $_SESSION["email_sesh"]="";
//     $_SESSION["password_sesh"]="";
//   }

  include '../connection.php';
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
            background: radial-gradient(rgba(255, 255, 255, 0.2),rgba(1,1,1,0.8)), url("../img/img7.jpg");
            background-size: cover;
            background-position: center;
            width: 100%;
            height: 700px;
        }
        .form_bgcolor{
            background-color: #2c2c2c;
        }
    </style>

</head>
<body>
    <nav class="navbar bg-dark border-bottom border-body justify-content-center" data-bs-theme="dark">
        
        <a href="../admin/index.php"><img src="../img/img1.jpg" style="object-fit: cover; width: 50px; height: 50px;
        border-radius: 100%;" alt="cavendish logo"></a>
        

    </nav>
    
    <div class="content pt-5">
        <div class="container-fluid" style="width: 50rem;">
            
            <div class="mb-4 text-center text-light">
                <h2>Admin</h2>
            </div>

            <form method="POST" action="adminlogin.php" class="form_bgcolor py-4 px-3" style="border-radius: 10px 10px 10px 10px;"> 
                <div class="row mb-3">
                  <label for="inputEmail3" class="col-sm-2 col-form-label fw-bold text-white">Email</label>
                  <div class="col-sm-10">
                    <input name="email" type="email" class="form-control" id="inputEmail3"
                    placeholder="enter your email here">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputPassword3" class="col-sm-2 col-form-label fw-bold text-white">Password</label>
                  <div class="col-sm-10">
                    <input name="password" type="password" class="form-control" id="inputPassword3"
                    placeholder="enter your password here">
                  </div>
                </div>
               
                <button type="submit" class="btn btn-primary">Login</button>
            </form>
            
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