<?php
require('../../process/db.php');
require('../inc/top.php');
require('../inc/side.php');
require('../../process/secure.php');
?>
<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $select = "SELECT * FROM users WHERE id=$id";
    $select_result = mysqli_query($conn, $select);
    $result = $select_result->fetch_assoc();
?>

    <main class="main-data">
        <div class="padding">
            <form method="POST" enctype="multipart/form-data">
                <?php
                if (isset($_POST['submit'])) {
                    $name = $_POST['name'];
                    $email = $_POST['email'];
                    $phone = $_POST['phone'];
                    $age = $_POST['age'];
                    $birthday = $_POST['birthday'];
                    $city = $_POST['city'];
                    $degree = $_POST['degree'];
                    $file = $_FILES['profile_image']['name'];
                    $size = $_FILES['profile_image']['size'];

                    // Check if a new image is selected
                    if ($file !== '') {
                        $newname = str_replace(" ", "", $file);
                        $newname = explode(".", $newname);
                        $ext = end($newname);
                        $firstname = reset($newname);

                        if (in_array($ext, ["jpeg", "png", "jpg"])) {
                            if ($size <= 2097132) {
                                $finalname = $firstname . "-" . time() . "." . $ext;

                                if (move_uploaded_file($_FILES['profile_image']['tmp_name'], '../../uploads/' . $finalname)) {
                                    $image = $result['profile_image'];
                                    $folder = "../../uploads/";
                                    unlink($folder . $image);
                                } else {
                                    echo "Failed to move the uploaded file.";
                                    exit;
                                }
                            } else {
                                echo "Please upload a file less than 2 MB.";
                                exit;
                            }
                        } else {
                            echo "Photo format not supported.";
                            exit;
                        }
                    } else {
                        // No new image selected, use the previous image
                        $finalname = $result['profile_image'];
                    }

                    // Update user information
                    $update = "UPDATE users SET name='$name', email='$email', phone='$phone', city='$city', age='$age', birthday='$birthday', degree='$degree', profile_image='$finalname' WHERE id='$id'";
                    $update_result = mysqli_query($conn, $update);

                    if ($update_result) {
                        echo "Success";
                    } else {
                        echo "Failed to update user information.";
                    }
                }
                ?>
                <div class="top-btn">
                    <a href="manage.php" class="btn"><span style="padding: 2px;"><i class="fa-solid fa-eye"></i></span>view<span></span></a>
                </div>
                <h1>Enter Your Projects</h1>

                <label for="text">Name</label>
                <input type="text" name="name" value="<?php echo $result['name'] ?>">
                <label for="text">age</label>
                <input type="text" name="age" value="<?php echo $result['age'] ?>">

                <label for="inputEmail">email</label>
                <input type="email" name="email" value="<?php echo $result['email'] ?>">

                <label for="inputNumber" >Phone:</label>
                <input type="phone" name="phone" value="<?php echo $result['phone'] ?>">
                <label for="inputNumber">File Upload</label>
                <input value="<?php echo $result['profile_image'] ?>" name="profile_image" type="file" id="formFile">
                <label for="inputDate" >Date of Birth</label>
                <input type="date" name="birthday" value="<?php echo $result['birthday'] ?>">
                <label for="text" >Degree</label>
                <input type="text" name="degree" value="<?php echo $result['degree'] ?>">
                <label for="text" >City</label>
                <input type="text" name="city" value="<?php echo $result['city'] ?>">
               
                <?php }?>

            <button type="submit" class="btn" name="submit">Submit</button>
            </form>
        </div>
    </main>
    </body>

    </html>