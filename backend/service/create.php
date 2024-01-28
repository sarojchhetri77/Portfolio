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
            $description = $_POST['description'];
            $insert = "INSERT INTO service(title,description) VALUES('$title','$description')";
            $insert_result = mysqli_query($conn, $insert);
            if ($insert_result) {
        ?>
                <div class="alert alert-primary" role="alert">
                Service submit successfully.
                </div>
        <?php
            }
        }
        ?>
        <div class="top-btn">
        <a href="manage.php" class="btn"><span style="padding: 2px;"><i class="fa-solid fa-eye"></i></span>view<span></span></a>
        </div>
        <h1>Enter Your Service</h1>
        <label for="title">Title</label>
        <input type="text" name="title" required>
        <label for="description">Description:</label>
        <textarea id="description" name="description" rows="10" required></textarea>

        <button type="submit" class="btn" name="submit">Submit</button>
    </form>
    </div>
</main>
</body>

</html>