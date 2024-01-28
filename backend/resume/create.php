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
            $title = $_POST['title'];
            $address = $_POST['address'];
            $duration = $_POST['duration'];
            $description = $_POST['description'];
            $insert = "INSERT INTO resume(title,address,duration,description) VALUES('$title','$address','$duration','$description')";
            $insert_result = mysqli_query($conn, $insert);
            if ($insert_result) {
        ?>
                <div class="alert alert-primary" role="alert">
                Work Experience submit successfully.
                </div>
        <?php
            }
        }
        ?>
        <div class="top-btn">
        <a href="manage.php" class="btn"><span style="padding: 2px;"><i class="fa-solid fa-eye"></i></span>view<span></span></a>
        </div>
        <h1>Enter Your Work Experience Details</h1>
        <label for="title">Work as:</label>
        <input type="text" name="title" required>

        <label for="address">Address:</label>
        <input type="text" name="address" required>

        <label for="duration">Duration:</label>
        <input type="text" id="duration" name="duration" required>

        <label for="message">Description:</label>
        <textarea id="message" name="description" rows="10" required></textarea>

        <button type="submit" class="btn" name="submit">Submit</button>
    </form>
    </div>
</main>
</body>

</html>