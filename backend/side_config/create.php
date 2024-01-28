<?php
require('../../process/db.php');
require('../inc/top.php');
require('../inc/side.php');
require('../../process/secure.php');
?>

<main class="main-data">
    <div class="padding">
  <form method="POST">
    <?php
    $fb = $li = $gh = $tw = $in = "";
    $select = "SELECT * FROM side_config";
    $result = mysqli_query($conn, $select);
    while ($results = $result->fetch_assoc()) {
      if ($results['name'] == 'facebook') {
        $fb = "hidden";
      }
      if ($results['name'] == 'linkedin') {
        $fb = "hidden";
      }
      if ($results['name'] == 'github') {
        $fb = "hidden";
      }
      if ($results['name'] == 'instragram') {
        $in = "hidden";
      }
    }



    if (isset($_POST['submit'])) {
      $name = $_POST['name'];
      $url = $_POST['url'];
      $insert = "INSERT INTO side_config(name,url) VALUES('$name','$url')";
      $insert_result = mysqli_query($conn, $insert);
      if ($insert_result) {
    ?>
        <div class="alert alert-primary" role="alert">
          links submit successfully.
        </div>
    <?php
      }
    }
    ?>


    <form>
      <div>
        <label for="inputNanme4" class="form-label">name</label>
        <select name="name" class="form-select form-select-lg" id="">
          <option selected value="">Select name</option>
          <option <?php echo $fb; ?> value="facebook">facebook</option>
          <option <?php echo $li; ?> value="linkedin">linkedin</option>
          <option <?php echo $gh; ?> value="github">github</option>
          <option <?php echo $in; ?> value="instragram">instragram</option>
        </select>
      </div>
      <div>
        <label for="value">link</label>
        <input type="url" name="url" id="value">
      </div>
      <button type="submit" class="btn" name="submit">Submit</button>
    </form>
    </div>
</main>
</body>

</html>