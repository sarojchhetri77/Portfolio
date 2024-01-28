<?php
require('../../process/db.php');
require('../inc/top.php');
require('../inc/side.php');
require('../../process/secure.php');
?>

<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $select = "SELECT * FROM gallary WHERE id='$id'";
    $select_result = mysqli_query($conn, $select);
    $result = $select_result->fetch_assoc();
?>

    <main class="main-data">
        <div class="padding">
            <form method="POST" enctype="multipart/form-data">
                <?php
                if (isset($_POST['submit'])) {
                    $title = $_POST['title'];
                    $client = $_POST['client'];
                    $url = $_POST['url'];
                    $description = $_POST['description'];
                    $file = $_FILES['profile_image']['name'];
                    if (!empty($file)) {
                        $size = $_FILES['profile_image']['size'];
                        $newname =  str_replace(" ", "", $file);
                        $newname = explode(".", $newname);
                        $ext = $newname[1];
                        $firstname = $newname[0];
                        if ($ext == "jpeg" || $ext == "png" || $ext == "jpg") {
                            if ($size < 2097132) {
                                $finalname = $firstname . "-" . time() . "." . $ext;
                                if (move_uploaded_file($_FILES['profile_image']['tmp_name'], '../../uploads/' . $finalname)) {
                                    $update = "UPDATE gallary SET title='$title', client='$client', project_url='$url', project_date='{$_POST['project_date']}', description='$description', profile_image='$finalname' WHERE id='$id'";
                                    $update_result = mysqli_query($conn, $update);

                                    // Delete old image if the update is successful
                                    if ($update_result) {
                                        $image = $result['profile_image'];
                                        $folder = "../../uploads/";
                                        unlink($folder . $image);
                                           ?>
                                        <div class="alert" role="alert">
                                            updated successfully.
                                        </div>
                                        <?php
                                    } else {
                                        echo "failed";
                                    }
                                } else {
                                    echo "failed";
                                }
                            } else {
                                ?>
                                <div class="alert" role="alert">
                                   upload photo less than 2mb.
                                </div>
                                <?php
                            }
                        } else {
                            echo "photo not supported";
                        }
                    } else {
                        // If no new file is selected, keep the previous image data
                        $update = "UPDATE gallary SET title='$title', client='$client', project_url='$url', project_date='{$_POST['project_date']}', description='$description' WHERE id='$id'";
                        $update_result = mysqli_query($conn, $update);

                        if ($update_result) {
                            ?>
                            <div class="alert" role="alert">
                                updated successfully.
                            </div>
                            <?php
                        } else {
                            ?>
                            <div class="alert" role="alert">
                                updated failed.
                            </div>
                            <?php
                        }
                    }
                }
                ?>

                <div class="top-btn">
                    <a href="manage.php" class="btn"><span style="padding: 2px;"><i class="fa-solid fa-eye"></i></span>view<span></span></a>
                </div>
                <h1>Enter Your Projects</h1>
                <label for="title">Title</label>
                <input type="text" value="<?php echo $result['title'] ?>" name="title" required>
                <label for="">Client Name:</label>
                <input type="text" value="<?php echo $result['client'] ?>" name="client" required>
                <label for="">Project Url:</label>
                <input type="text" value="<?php echo $result['project_url'] ?>" name="url" required>
                <label for="">Project date</label>
                <input type="date" value="<?php echo $result['project_date'] ?>" name="project_date" required>
                <label for="">Description</label>
                <textarea name="description" id="" cols="30" rows="10"><?php echo $result['description'] ?></textarea>
                <label for="">File upload</label>
                <img width="100" height="100" src="../../uploads/<?php echo $result['profile_image']; ?>" alt="">
                <input type="file" name="profile_image">
                <button type="submit" class="btn" name="submit">Submit</button>
            </form>
        <?php } ?>
        </div>
    </main>
    </body>

    </html>