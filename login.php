<?php require('process/db.php')?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="https://kit.fontawesome.com/ae6df88903.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title>login</title>
   <link rel="stylesheet" href="assets/css/login.css">
</head>

<body>
    <section class="main-login">
        <div class="login-container">
            <form action="#" method="POST">
            <?php
          if (isset($_POST['login'])) {
            $email = $_POST['email'];
            $password = md5($_POST['password']);
            $select = "SELECT * FROM users WHERE email='$email' and password='$password'";
            $select_result = mysqli_query($conn, $select);
            $data = $select_result->fetch_assoc();
            $count = mysqli_num_rows($select_result);
            
            if ($count == 1) {
                if($data['role'] == 1){
              session_start();
              $_SESSION['email'] = $data['email'];
              $_SESSION['name'] = $data['name'];
              $_SESSION['role'] = $data['role'];
                

          ?>
              <script>
                location.replace("http://localhost/portfolio/backend/dashboard.php");
              </script>
          <?php
                }
                else
                echo "You are not allow to login";
            } else
              echo "login failed";
          }

          ?>
                <h2>Login</h2>
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
                <div class="forget">
                    <label class=""><input class="" type="checkbox">Remember me</label>
                    <a href="" class="text-decoration-none ">Forget Password</a>
                </div>
                <div class="w-50 mx-auto mt-5">
                    <button class="w-100 btn-light login-btn" name="login" type="submit">Login</button>

                </div>
                <div class="register">
                    <p>Dont have an account?<a class="text-decoration-none" href="register.php">Register</a></p>
                </div>
            </form>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

</body>

</html>