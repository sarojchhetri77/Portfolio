<?php
require('../../process/db.php');
require('../inc/top.php');
require('../inc/side.php');
require('../../process/secure.php');
?>
<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $select = "SELECT * FROM education WHERE id='$id'";
    $select_result = mysqli_query($conn, $select);
    $result = $select_result->fetch_assoc();

?>
<main class="main-data">
    <form method="POST" class="mt-5">
        <?php
        if (isset($_POST['submit'])) {
            $cname = $_POST['cname'];
            $collage = $_POST['collage'];
            $duration = $_POST['duration'];
            $description = $_POST['description'];
            $update = "UPDATE  education SET title='$cname',duration='$duration',collage_name='$collage',description='$description'where id='$id'";
            $update_result = mysqli_query($conn, $update);
            if ($update_result) {
        ?>
                <div class="alert" role="alert">
                    Education details updated successfully.
                </div>
        <?php
            }
        }
        ?>
        <h1>Edit Your Education Details</h1>
        <label for="name">Course Name:</label>
        <input type="text"value="<?php echo $result['title'] ?>" name="cname">

        <label for="collage">Collage Name:</label>
        <input type="text"value="<?php echo $result['collage_name'] ?>" name="collage">

        <label for="subject">Course Duration:</label>
        <input type="text" id="subject"value="<?php echo $result['duration'] ?>" name="duration" >

        <label for="message">Description:</label>
        <textarea id="message" name="description" rows="10">value="<?php echo $result['description'] ?></textarea>

        <button type="submit" class="btn" name="submit">Submit</button>
<?php
}
?>

    </form>
</div>
</main>
</body>

</html>