<?php 
    include '../connection.php';

    $id = $_POST['cid'];

    $sql = "DELETE FROM `course` WHERE cid = '$id'";
    $query = mysqli_query($status,$sql);

    if($query){
        header('Location:adminhome.php');
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
                    background: radial-gradient(rgba(255, 255, 255, 0.2),rgba(1,1,1,0.8)), url("../img/img7.jpg");
                    background-size: cover;
                    background-position: center;
                    width: 100%;
                    height: 700px;
                }
            </style>
        </head>
        
        <body>
            
        <nav class="navbar bg-dark border-bottom border-body" data-bs-theme="dark">

            <a href="./adminhome.php"><img src="../img/img1.jpg" style="object-fit: cover; width: 50px; height: 50px;
            border-radius: 100%;" class="ms-2" alt="cavendish logo"></a>

            <nav class="navbar navbar-expand-lg me-auto ms-auto w-50">
                <div class="container-fluid w-100">
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav justify-content-around" style="width: 100%;">
                        <li class="nav-item ">
                            <a class="nav-link" aria-current="page" href="./adminhome.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./addcand.php">Add Candidate</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./addcourse.php">Add Course</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./addpos.php">Add Post</a>
                        </li>
                    </ul>
                </div>
                </div>
            </nav>

        </nav>
        <div class="content pt-5">
            <div class="container-fluid" style="width: 50rem;">

                <h4 class="mb-4 text-center py-2"
                style="font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
                border-radius: 10px 10px 10px 10px;
                background: linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.8));
                color: #ff0000;
                "
                    > Unable to Remove Course. Please try again
                    
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