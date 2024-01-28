<?php
require('../../process/db.php');
require('../../process/secure.php');
require('../inc/top.php');
require('../inc/side.php');
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
            $insert = "INSERT INTO description(about_top,about_bottom,about_middle,skill,resume,portfolio,service,contact) VALUES('$about_top','$about_bottom','$about_middle','$skill','$resume','$portfolio','$service','$contact')";
            $insert_result = mysqli_query($conn, $insert);
            if ($insert_result) {
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
                    <textarea id="about_top" name="about_top" rows="10" required></textarea>
                    <label for="about_middle">About Middle:</label>
                    <textarea id="about_middle" name="about_middle" rows="10" required></textarea>
                    <label for="about_bottom">About Bottom:</label>
                    <textarea id="about_bottom" name="about_bottom" rows="10" required></textarea>
                    <label for="skill">skill:</label>
                    <textarea id="skill" name="skill" rows="10" required></textarea>
                </div>
                <div class="form-right form-same">
                    <label for="resume">Resume:</label>
                    <textarea id="resume" name="resume" rows="10" required></textarea>
                    <label for="service">Service:</label>
                    <textarea id="service" name="service" rows="10" required></textarea>
                    <label for="portfolio">portfolio:</label>
                    <textarea id="portfolio" name="portfolio" rows="10" required></textarea>
                    <label for="contact">Contact:</label>
                    <textarea id="contact" name="contact" rows="10" required></textarea>
                </div>
            </div>
            <button type="submit" class="btn" name="submit">Submit</button>
    </div>


    </form>
    </div>
</main>
</body>

</html>