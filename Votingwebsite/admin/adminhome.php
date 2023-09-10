<?php   

    include '../connection.php';
    session_start();

    if(!empty($_SESSION["adminemail_sesh"]) && !empty($_SESSION["adminpassword_sesh"])){ //checking so that user cannot jump straight this page without going to login page

?>
    
    <!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Admin</title>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
            <link rel="stylesheet" href="../tablestylesheet.css">
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
        
        <body  style="background-color:#111111">
            
        <nav class="navbar bg-dark border-bottom border-body" data-bs-theme="dark">

            <a href="./adminhome.php"><img src="../img/img1.jpg" style="object-fit: cover; width: 50px; height: 50px;
            border-radius: 100%;" class="ms-2" alt="cavendish logo"></a>

            <nav class="navbar navbar-expand-lg me-auto ms-auto w-50">
                <div class="container-fluid w-100">
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav justify-content-around" style="width: 100%;">
                        <li class="nav-item ">
                            <a class="nav-link active fw-bold" aria-current="page" href="./adminhome.php">Home</a>
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

                <?php 
                    $sql1 = "SELECT * FROM `prefect`";
                    $sql2 = "SELECT * FROM `course`";
                    $sql3 = "SELECT * FROM `post`";

                    $query1 = mysqli_query($status,$sql1);
                    $query2 = mysqli_query($status,$sql2);
                    $query3 = mysqli_query($status,$sql3);

                    $arr1 = mysqli_fetch_all($query1,MYSQLI_ASSOC);
                    $arr2 = mysqli_fetch_all($query2,MYSQLI_ASSOC);
                    $arr3 = mysqli_fetch_all($query3,MYSQLI_ASSOC);
                ?>
            
            <div style="
                    border-radius: 10px 10px 10px 10px;
                    background: linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.8));
                    width:50rem;
                    "
                    class="me-auto ms-auto py-3 mb-5"
                    
                    >
                    <h4 class="text-light text-center"
                        style="font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;"
                        > 
                        Available Candidates
                    </h4>
                        
                    <form action="deleteprefect.php" method="POST">
                        <table style="border: black solid 1px;">
                            <th>Candidate</th>
                            <th>Post</th>
                            <th>Course</th>
                            <th>Vote Count</th>
                            <th>Action</th>
                
                <?php
                    foreach($arr1 as $x){

                ?>
                        
                               
                    <tr>
                        <td><?php print($x["prefname"]) ?></td>
                        <td><?php 
                        
                        $val1 = $x['postid'];
                        $sql4 = "SELECT postname FROM post WHERE postid='$val1'";
                        $query4 = mysqli_query($status,$sql4);
                        $arr4 = mysqli_fetch_array($query4);

                        print($arr4[0]) ?></td>

                        <td><?php 
                        
                        $val2 = $x['cid'];
                        $sql5= "SELECT cname FROM course WHERE cid = '$val2'";
                        $query5 = mysqli_query($status,$sql5);
                        $arr5= mysqli_fetch_array($query5);
                        
                        print($arr5[0]);
                        
                        ?></td>
                        <td>
                        <?php 
                        $val3 = $x['count'];  
                        print($val3);                      
                        ?>
                        </td>
                        <td>
                            <button type="submit" name="prefid" value="<?php print($x['pid']) ?>" class="btn btn-primary">Remove Candidate</button>
                        </td> 
                    </tr>
                <?php
                    }   
                ?>
                </table>
                </form>
            </div>  
            
            <div style="
                    border-radius: 10px 10px 10px 10px;
                    background: linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.8));
                    width:50rem;
                    "
                    class="me-auto ms-auto py-3 mb-5"
                    
                    >
                    <h4 class="text-light text-center"
                        style="font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;"
                        > 
                        Available Courses
                    </h4>
                        
                    <form action="deletecourse.php" method="POST">
                        <table style="border: black solid 1px;">
                            <th>Course Name</th>
                            <th>Action</th>
                
                <?php
                    foreach($arr2 as $y){

                ?>
                        
                               
                    <tr>
                        <td><?php print($y["cname"]) ?></td>
                        <td>
                            <button type="submit" name="cid" value="<?php print($y['cid'])?>" class="btn btn-primary">Remove Course</button>
                        </td> 
                    </tr>
                <?php
                    }   
                ?>
                </table>
                </form>
            </div>

            <div style="
                    border-radius: 10px 10px 10px 10px;
                    background: linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.8));
                    width:50rem;
                    "
                    class="me-auto ms-auto py-3 mb-5"
                    
                    >
                    <h4 class="text-light text-center"
                        style="font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;"
                        > 
                        Available Posts
                    </h4>
                        
                    <form action="deletepost.php" method="POST">
                        <table style="border: black solid 1px;">
                            <th>Post Name</th>
                            <th>Action</th>
                
                <?php
                    foreach($arr3 as $z){

                ?>
                        
                               
                    <tr>
                        <td><?php print($z["postname"]) ?></td>
                        <td>
                            <button type="submit" name="pid" value="<?php print($z['postid'])?>" class="btn btn-primary">Remove Post</button>
                        </td> 
                    </tr>
                <?php
                    }   
                ?>
                </table>
                </form>
            </div>

            <div class="text-center"><a href="logout.php"><button type="submit" class="btn btn-success" style="margin:auto; width: 10rem;">Logout</button></a></div>
            </div>
            <footer class="bg-black">
                    <h4 class="pt-3 mb-3 mt-3 text-center text-white"
                    style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;"
                    >Contact us via email for any inquiries @ab88356@students.cavendish.ac.ug</h4>
                    <hr class="bg-light ms-auto me-auto" style="width: 70rem; height: 0.2rem;">
                    <nav class="pb-4" style="font-size: 30px; margin-left: 50%;">
                        <a href="https://mail.google.com"><i class="bi-envelope-at-fill"></i></a>
                    </nav>
            </footer>
        </div>
        
        </body>
    </html>
<?php 

}else{
?>
    <!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Admin</title>
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
                    > You have to login in first before accessing the contents of this page. You can login in 
                    <a href="./index.php">here</a>
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
                    

       