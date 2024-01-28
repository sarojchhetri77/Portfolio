<?php
require('../../process/db.php');
require('../../process/secure.php');
require('../inc/top.php');
require('../inc/side.php');
?>
<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $select = "SELECT * FROM description WHERE id='$id'";
    $select_result = mysqli_query($conn, $select);
    $result = $select_result->fetch_assoc();

?>

    <main class="main-data">
        <div class="padding">
            <div class="top-btn">
                <a href="manage.php" class="btn"><span style="padding: 2px;"><i class="fa-solid fa-eye"></i></span>view<span></span></a>
            </div>
            <form method="POST" class="mt-5">
                <?php
                if (isset($_POST['submit'])) {
                    $about_top = $_POST['about_top'];
                    $about_middle = $_POST['about_middle'];
                    $about_bottom = $_POST['about_bottom'];
                    $skill = $_POST['skill'];
                    $resume = $_POST['resume'];
                    $portfolio = $_POST['portfolio'];
                    $service = $_POST['service'];
                    $contact = $_POST['contact'];
                    $update = "UPDATE description  SET about_top='$about_top', about_bottom='$about_bottom', about_middle='$about_middle',skill='$skill', resume='$resume', portfolio='$portfolio', service='$service', contact='$contact' WHERE id = $id";
                    $update_result = mysqli_query($conn,$update);
                    if ($update_result) {
                ?>
                        <div class="alert">
                            Service submit successfully.
                        </div>
                <?php
                    }
                }
                ?>

                <div class="form-main">
                    <div class="form-left form-same">
                        <label for="about_top">About Top:</label>
                        <textarea id="about_top" name="about_top" ><?php echo $result['about_top'] ?></textarea>
                        <label for="about_middle">About Middle:</label>
                        <textarea id="about_middle" name="about_middle"><?php echo $result['about_middle'] ?></textarea>
                        <label for="about_bottom">About Bottom:</label>
                        <textarea id="about_bottom" name="about_bottom"><?php echo $result['about_bottom'] ?></textarea>
                        <label for="skill">skill:</label>
                        <textarea id="skill" name="skill"><?php echo $result['skill'] ?></textarea>
                    </div>
                    <div class="form-right form-same">
                        <label for="resume">Resume:</label>
                        <textarea id="resume" name="resume"><?php echo $result['resume'] ?></textarea>
                        <label for="service">Service:</label>
                        <textarea id="service" name="service"><?php echo $result['service'] ?></textarea>
                        <label for="portfolio">portfolio:</label>
                        <textarea id="portfolio" name="portfolio"><?php echo $result['portfolio'] ?></textarea>
                        <label for="contact">Contact:</label>
                        <textarea id="contact" name="contact"><?php echo $result['contact'] ?></textarea>
                    </div>
                </div>
            <?php } ?>
            <button type="submit" class="btn" name="submit">Submit</button>
        </div>


        </form>
        </div>
    </main>
    </body>

    </html>