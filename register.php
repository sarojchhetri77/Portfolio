<?php require('process/db.php'); ?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>login</title>
    <script src="https://kit.fontawesome.com/ae6df88903.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
   <link rel="stylesheet" href="assets/css/login.css">
</head>

<body>
    <section class="main-register">
        <div class="login-container ">
            <form action="#" method="POST">
                <?php
                if(isset($_POST['register'])){
                    $name=$_POST['name'];
                    $email=$_POST['email'];
                    $password=$_POST['password'];
                    $cpassword=$_POST['cpassword'];
                    if($name!="" && $email!="" && $password!=""){
                        if($password==$cpassword){
                            if(strlen($password) >=8){
                                $password=md5($password);
                                $insert="INSERT INTO users(name,email,password) VALUES('$name','$email','$password')";
                                $insert_result=mysqli_query($conn,$insert);
                                if($insert){
                                    ?>
                                    <script>
                                        location.replace("http://localhost/portfolio/login.php");
                                    </script>
                                    <?php
                                }
                                else
                                echo"registration failed. please try again";

                            }
                            else
                            echo "enter password character greater than 8";

                        }
                        else
                        echo "enter the same password";

                    }
                    else
                    echo "please enter all the details";
                }
                ?>
                <h2>Register</h2>
                <div class="input">
                    <span class="icons"><i class="fa-solid fa-user"></i></span>
                    <input type="text" name="name" required>
                    <label for="">Name</label>
                </div>
                <div class="input">
                    <span class="icons"><i class="fa-solid fa-envelope"></i></span>
                    <input type="email" name="email" required>
                    <label for="">Email</label>
                </div>
                <div class="input">
                    <span class="icons"><i class="fa-solid fa-key"></i></span>
                    <input type="password" name="password" required>
                    <label for="">Password</label>
                </div>
                <div class="input">
                    <span class="icons"><i class="fa-solid fa-key"></i></span>
                    <input type="password" name="cpassword" required>
                    <label for="">Confirm Password</label>
                </div>

                <div class="w-50 mx-auto my-3">
                    <button class="w-100 btn-light login-btn" name="register" type="submit">register</button>

                </div>

            </form>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>

</html>