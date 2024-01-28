<?php
require('../../process/db.php');
require('../inc/top.php');
require('../inc/side.php');
require('../../process/secure.php');
?>

<main class="main-data">
    <div class="padding">
    <form method="POST" class="mt-5">
        <?php
        if (isset($_POST['submit'])) {
            $cname = $_POST['cname'];
            $collage = $_POST['collage'];
            $duration = $_POST['duration'];
            $description = $_POST['description'];
            $insert = "INSERT INTO education(title,collage_name,duration,description) VALUES('$cname','$collage','$duration','$description')";
            $insert_result = mysqli_query($conn, $insert);
            if ($insert_result) {
        ?>
                <div class="alert">
                    Education details submit successfully.
                </div>
        <?php
            }
        }
        ?>
        <div class="top-btn">
        <a href="manage.php" class="btn"><span style="padding: 2px;"><i class="fa-solid fa-eye"></i></span>view<span></span></a>
        </div>
        <h1>Enter Your Education Details</h1>
        <label for="name">Course Name:</label>
        <input type="text" name="cname" required>

        <label for="collage">Collage Name:</label>
        <input type="text" name="collage" required>

        <label for="subject">Course Duration:</label>
        <input type="text" id="subject" name="duration" required>

        <label for="message">Description:</label>
        <textarea id="message" name="description" rows="10" required></textarea>

        <button type="submit" class="btn" name="submit">Submit</button>
    </form>
    </div>
</main>
</body>

</html>