<?php
require('../../process/db.php');
require('../inc/top.php');
require('../inc/side.php');
require('../../process/secure.php');
?>

<main class="main-data">
    <div class="padding">
    <form method="POST" class="mt-5" enctype="multipart/form-data">
    <?php
  if (isset($_POST['submit'])) {
    $title = $_POST['title'];
    $client = $_POST['client'];
    $project_date = $_POST['project_date'];
    $project_url = $_POST['url'];
    $description = $_POST['description'];
    $file = $_FILES['profile_image']['name'];
    $size = $_FILES['profile_image']['size'];
    $newname =  str_replace(" ", "", $file);
    $newname = explode(".", $newname);
    $ext = $newname[1];
    $firstname = $newname[0];
    if ($ext == "jpeg" || $ext == "png" || $ext == "jpg") {
      if ($size < 2097132) {
        $finalname = $firstname . "-" . time() . "." . $ext;
        if (move_uploaded_file($_FILES['profile_image']['tmp_name'], '../../uploads/' . $finalname)) {
          $insert = "INSERT INTO gallary(title,profile_image,client,project_date,project_url,description) VALUES('$title','$finalname','$client','$project_date','$project_url','$description')";
          $result = mysqli_query($conn, $insert);
          if ($result) {
            ?>
            <div class="alert">
          Project Details created successfully.
        </div>
        <?php
          } else
            echo "failed";
        } else
          echo "failed sorry";
      } else
        echo "please upload photo less than 2mb";
    } else
      echo "Photo not suppoted";
  }


  ?>
        <div class="top-btn">
        <a href="manage.php" class="btn"><span style="padding: 2px;"><i class="fa-solid fa-eye"></i></span>view<span></span></a>
        </div>
        <h1>Enter Your Projects</h1>
        <label for="title">Title</label>
        <input type="text" name="title" required>
        <label for="">Client Name:</label>
        <input type="text" name="client" required>
        <label for="">Project Url:</label>
        <input type="text" name="url" required>
        <label for="">Project date</label>
        <input type="date" name="project_date" required>
        <label for="">Description</label>
        <textarea name="description" id="" cols="30" rows="10"></textarea>
        <label for="">File upload</label>
        <input type="file" name="profile_image" required>
        <button type="submit" class="btn" name="submit">Submit</button>
    </form>
    </div>
</main>
</body>

</html>