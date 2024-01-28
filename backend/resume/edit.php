<?php
require('../../process/db.php');
require('../inc/top.php');
require('../inc/side.php');
require('../../process/secure.php');
?>
<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $select = "SELECT * FROM resume WHERE id='$id'";
    $select_result = mysqli_query($conn, $select);
    $result = $select_result->fetch_assoc();

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
            $update = "UPDATE  resume SET title='$title',duration='$duration',address='$address',description='$description'";
            $update_result = mysqli_query($conn, $update);
            if ($update_result) {
        ?>
                <div class="alert alert-primary" role="alert">
                    professional details updated successfully.
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
        <input type="text" value="<?php echo $result['title'] ?>"  name="title" required>

        <label for="address">Address:</label>
        <input type="text"value="<?php echo $result['address'] ?>"  name="address" required>

        <label for="duration">Duration:</label>
        <input type="text"value="<?php echo $result['duration'] ?>"  id="duration" name="duration" required>

        <label for="message">Description:</label>
        <textarea id="message" name="description" rows="10" required><?php echo $result['description'] ?></textarea>

        <button type="submit" class="btn" name="submit">Submit</button>
    </form>
    <?php
}
?>
    </div>
</main>
</body>

</html>