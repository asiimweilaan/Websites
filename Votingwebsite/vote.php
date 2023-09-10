<?php
    session_start();

    include 'connection.php';

    if(!empty($_SESSION["email_sesh"])){
        $email_sesh = $_SESSION["email_sesh"];

        $status_sql = "SELECT stat FROM `student` WHERE stemail = '$email_sesh'"; // checking if current user has already voted
        $status_query = mysqli_query($status,$status_sql);
        $status_row = mysqli_fetch_array($status_query); 

    }
    

    if(!empty($_SESSION["email_sesh"])&&!empty($_SESSION["password_sesh"])&& $status_row[0]!="voted"){

        echo "
    <script>
        alert('Welcome!');
    </script>
    ";

?>
<!DOCTYPE html>
            <html lang="en">
                <head>
                    <meta charset="UTF-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <title>Voting Website</title>
                    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
                    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
                    <link rel="stylesheet" href="tablestylesheet.css">
                    <style>
                        .content{
                            /* background: url("img/img1.jpg"); */
                            background: radial-gradient(rgba(255, 255, 255, 0.2),rgba(1,1,1,0.8)), url("img/img6.jpg");
                            background-size: cover;
                            background-position: center;
                            width: 100%;
                            height: 700px;
                        }
                    </style>
                    <script
                        src="https://code.jquery.com/jquery-3.7.1.min.js"
                        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo="
                        crossorigin="anonymous">
                    </script>
                    <script>
                        
                        let prevbtn = $("");
                        let arrmap = new Map();
                        let runonce = true;
                        $(document).ready(function() {
                            

                            $(".btns").on("click",function(e){
                                e.preventDefault();
                                
                                let btn = $(this);

                                if(prevbtn.closest("div").attr("value")==btn.closest("div").attr("value")){
                                // checking if previous btn and current button are in the same category b4 changing it 
                                    
                                    prevbtn.html("Vote");
                                    prevbtn.removeClass("btn-success");

                                    if(arrmap!=null){

                                        arrmap.set(btn.closest("div").attr("value"),btn.val()
                                                );
                                        
                                    }
                                    
                                }

                                else{ // checks if the category id is already in list so that if we go back
                                    // to vote another person, it doesn't add to voted buttons
                                    
                                    if(arrmap!=null){
                                        console.log("else block has run");
                                        $("button").each(function(x,y){
                                            // console.log($(y).val());

                                            var currval = $(y).val();
                                            var parentval = $(y).closest("div").attr("value");
                                            // console.log(parentval);

                                            arrmap.forEach((k,v)=>{
                                                if(btn.closest("div").attr("value")==parentval){
                                                    
                                                        $(y).removeClass("btn-success");
                                                        $(y).html("Vote");
                                                        console.log(5);
                                                }
                                                // console.log(k,v);
                                            }); 
                                        });

                                        arrmap.set(btn.closest("div").attr("value"),btn.val()
                                                );
                                        
                                        
                                    }
                                    
                                }


                                prevbtn = btn;
                                // console.log(btn.val());
                                // console.log(btn.closest("div").attr("value"));
                                btn.html("Voted");
                                btn.addClass("btn-success");
                                // arrmap.forEach((k,v)=>{
                                //     console.log(k,v)
                                // });

                            });
                            $("#sub").click(function(){
                                var result = confirm("Do you want to Submit. You cannot change your vote after submission");
                                if(result){

                                    let arr = [];
                                    arrmap.forEach((k,v)=>{
                                        arr.push(k);
                                    });

                                    $.ajax({
                                        type:'POST',
                                        url:'http://localhost:80/Votingwebsite/applyvotes.php',
                                        data:{arrArray:arr},
                                        success: function (result){
                                            // $("#resp").html("Congratulations");
                                            // console.log(arr);
                                            alert("Thank you for voting. You'll not be able to access this page now");
                                            window.location.href = "index.php";

                                        },
                                        error: function(exception){
                                            // $("#resp").html("Failed");
                                            alert(exception);
                                        }
                                    });
                                }
                            });
                            
                        });
                    </script>
                </head>
                
                <body style="background-color:#111111">
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
                            
                            <?php

                            $dataSQL = "SELECT * FROM `prefect`";
                            $dataSQL2 = "SELECT * FROM `post`";

                            $sqlquery = mysqli_query($status,$dataSQL);
                            $sqlquery2 = mysqli_query($status,$dataSQL2);
                            
                            $sqlarray = mysqli_fetch_all($sqlquery,MYSQLI_ASSOC);
                            $sqlarray2 = mysqli_fetch_all($sqlquery2,MYSQLI_ASSOC);


                            foreach ($sqlarray2 as $var2) { // looping through available positions

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
                                <?php 

                                  print($var2["postname"]);  
                                
                                ?>
                            </h4>
                                
                                <!-- <form > -->
                                    <table style="border: black solid 1px;">
                                        <th>Candidate</th>
                                        <th>Post</th>
                                        <th>Course</th>
                                        <th>Action</th>
                                    <?php 
                                    
                                    foreach ($sqlarray as $var1 ) { // looping through available candidates
                                        if($var1["postid"]==$var2["postid"]){ // checking to see what is put in this exact table
                                            // they must all have the same position id since it is a category
                                    ?>
                                        <tr>
                                            <td><?php print($var1["prefname"]) ?></td>
                                            <td><?php print($var2["postname"]) ?></td>
                                            <td><?php 
                                            
                                            $course_name = $var1["cid"];
                                            $sql_ = mysqli_query($status,"SELECT cname FROM course WHERE cid = '$course_name'");
                                            $sql_res = mysqli_fetch_array($sql_);
                                            print($sql_res[0]);
                                            
                                            ?></td>
                                            
                                            <td >
                                                <div value="<?php print($var2['postid']); ?>">
                                                    <button type="submit" name="vote" value="<?php print($var1['pid']) ?>" class="btn btn-primary btns">Vote</button>
                                                </div>
                                            </td> 
                                        </tr>
                                    <?php
                                        }}     
                                    ?>
                                    </table>
                                <!-- </form> -->
                            </div>
                            

                <?php 
            }
                ?>
                        <div class="text-center"><button type="submit" id="sub" class="btn btn-success" style="margin:auto; width: 10rem;">Submit</button></div>
                        </div>

                    <footer class="bg-black">
                        <h4 class="pt-3 mb-3 text-center text-white mt-3"
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
    }else if(!empty($_SESSION["email_sesh"])&&!empty($_SESSION["password_sesh"])&& $status_row[0]=="voted"){

    ?>
         <!DOCTYPE html>
            <html lang="en">
                <head>
                    <meta charset="UTF-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <title>Voting Website</title>
                    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
                    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
                    <link rel="stylesheet" href="tablestylesheet.css">
                    <style>
                        .content{
                            /* background: url("img/img1.jpg"); */
                            background: radial-gradient(rgba(255, 255, 255, 0.2),rgba(1,1,1,0.8)), url("img/img6.jpg");
                            background-size: cover;
                            background-position: center;
                            width: 100%;
                            height: 700px;
                        }
                    </style>
                </head>
                
                <body style="background-color:#181818">
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
                            
                            <h4 class="mb-4 text-center py-2"
                    style="font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
                    border-radius: 10px 10px 10px 10px;
                    background: linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.8));
                    color: #00ff0d;
                    "
                        > You have already voted. You cannot access the voting page and vote again
                        
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
    }else{
    ?>
            <!DOCTYPE html>
            <html lang="en">
                <head>
                    <meta charset="UTF-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <title>Voting Website</title>
                    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
                    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
                    <link rel="stylesheet" href="tablestylesheet.css">
                    <style>
                        .content{
                            /* background: url("img/img1.jpg"); */
                            background: radial-gradient(rgba(255, 255, 255, 0.2),rgba(1,1,1,0.8)), url("img/img6.jpg");
                            background-size: cover;
                            background-position: center;
                            width: 100%;
                            height: 700px;
                        }
                    </style>
                </head>
                
                <body style="background-color:#181818">
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
                            
                            <h4 class="mb-4 text-center py-2"
                    style="font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
                    border-radius: 10px 10px 10px 10px;
                    background: linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.8));
                    color: #ff0000;
                    "
                        > You have to login first before accessing the contents of this page. You can login 
                        <a href="login.php">here</a>
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