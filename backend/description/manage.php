<?php
require('../../process/db.php');
require('../../process/secure.php');
require('../inc/top.php');
require('../inc/side.php');
?>

<main class="main-data">
  <div class="padding">
  <div class="top-btn">
        <a href="create.php" class="btn"><span style="padding: 2px;"><i class="fa-solid fa-plus"></i></span>Create<span></span></a>
        </div>
    <h2>Section Descriptions</h2>
    <table>
      <thead>
        <tr>
          <th>s.n</th>
          <th>about_top</th>
          <th>action</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $select = "SELECT * FROM description";
        $select_result = mysqli_query($conn, $select);
        $i = 1;
        while ($result = $select_result->fetch_assoc()) {


        ?>
          <tr>
            <td scope="row"><?php echo $i++ ?></td>
            <td><?php echo $result['about_top'] ?></td>
            <td>
              <a href="edit.php?id=<?php echo $result['id'] ?>"class="btn" style="background-color:green" ><span class="table-icon"><i class="fa-solid fa-pen-to-square"></i></span></a>
            </td>

          </tr>
        <?php
        } ?>
      </tbody>
    </table>
  </div>
</main>
</body>
</html>