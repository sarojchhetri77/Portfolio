<?php
require('../../process/db.php');
require('../inc/top.php');
require('../inc/side.php');
require('../../process/secure.php');
?>
<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $select = "SELECT * FROM skill WHERE id=$id";
    $select_result = mysqli_query($conn, $select);
    $result = $select_result->fetch_assoc();
?>
<main class="main-data">
    <div class="padding">
    <form method="POST" class="mt-5">
    <?php
        if (isset($_POST['submit'])) {
            $title = $_POST['title'];
            $value = $_POST['value'];
            $update = "UPDATE skill SET title='$title',value='$value' where id='$id'";
            $update_result = mysqli_query($conn, $update);
            if ($update_result) {

        ?>
                <div class="alert" role="alert">
                    skills details updated successfully.
                </div>
                <!-- <script>
                    location.replace('http://localhost/portfolio/backend/skills/manage.php');
                </script> -->
        <?php
            }
        }
        ?>
        <div class="top-btn">
        <a href="manage.php" class="btn"><span style="padding: 2px;"><i class="fa-solid fa-eye"></i></span>view<span></span></a>
        </div>
        <h1>Enter Your Skill</h1>
        <label for="title">Title</label>
        <input type="text" name="title" value="<?php echo $result['title'] ?>" required>
        <label for="value">Value</label>
        <input type="number" name="value"  value="<?php echo $result['value'] ?>" required>
        
        <button type="submit" class="btn" name="submit">Submit</button>
    </form>
    <?php } ?>
    </div>
</main>
</body>

</html>