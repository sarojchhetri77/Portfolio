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
        if(isset($_POST['submit'])){
            $title=$_POST['title'];
            $value=$_POST['value'];
            $insert="INSERT INTO skill(title,value) VALUES('$title','$value')";
            $insert_result=mysqli_query($conn,$insert);
            if($insert_result){
                ?>
                <div class="alert alert-primary" role="alert">
                    skills submit successfully.
                </div>
                <?php
            }
        }
        ?>
        <div class="top-btn">
        <a href="manage.php" class="btn"><span style="padding: 2px;"><i class="fa-solid fa-eye"></i></span>view<span></span></a>
        </div>
        <h1>Enter Your Skills</h1>
        <label for="title">Title</label>
        <input type="text" name="title" required>
        <label for="value">Value</label>
        <input type="number" name="value" required>
        
        <button type="submit" class="btn" name="submit">Submit</button>
    </form>
    </div>
</main>
</body>

</html>