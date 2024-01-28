<?php
require('../../process/db.php');
require('../inc/top.php');
require('../inc/side.php');
require('../../process/secure.php');
?>
<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $select = "SELECT * FROM service WHERE id=$id";
    $select_result = mysqli_query($conn, $select);
    $result = $select_result->fetch_assoc();
   
?>

<main class="main-data">
    <div class="padding">
    <form method="POST" class="mt-5">
    <?php
        if (isset($_POST['submit'])) {
            $title = $_POST['title'];
            $description = $_POST['description'];
            $update = "UPDATE service SET title='$title', description='$description' WHERE id='$id'";
            $update_result = mysqli_query($conn, $update);
            if ($update_result) {
        ?>
                <div class="alert">
                Service edit successfully.
                </div>
        <?php
            }
        }
        ?>
        <div class="top-btn">
        <a href="manage.php" class="btn"><span style="padding: 2px;"><i class="fa-solid fa-eye"></i></span>view<span></span></a>
        </div>
        <h1>Edit Your Service</h1>
        <label for="title">Title</label>
        <input type="text" name="title" value="<?php echo $result['title'] ?>" required>
        <label for="description">Description:</label>
        <textarea id="description" name="description" rows="10" required><?php echo $result['description'] ?></textarea>

        <button type="submit" class="btn" name="submit">Submit</button>
    </form>
    <?php } ?>
    </div>
</main>
</body>

</html>