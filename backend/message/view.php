<?php
require('../../process/db.php');
require('../inc/top.php');
require('../inc/side.php');
require('../../process/secure.php');
?>
<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $select = "SELECT * FROM contact WHERE id=$id";
    $select_result = mysqli_query($conn, $select);
    $result = $select_result->fetch_assoc();
   
?>
<main class="main-data">
    <div class="padding">
    
        <h1>View message from client</h1>
        <label for="name">Name</label>
        <input type="text" value="<?php echo $result['name'] ?>" name="name" disabled>
        <label for="email">Email</label>
        <input type="text" value="<?php echo $result['email'] ?>" name="email" disabled>
        <label for="title">Subject</label>
        <input type="text" value="<?php echo $result['subject'] ?>" name="title" disabled>
        <label for="description">Description:</label>
        <textarea id="description" name="description" rows="10" disabled><?php echo $result['description'] ?></textarea>
   

    </div>
    <?php } ?>
</main>
</body>

</html>