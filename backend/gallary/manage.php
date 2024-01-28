<?php
require('../../process/db.php');
require('../inc/top.php');
require('../inc/side.php');
require('../../process/secure.php');
?>
<main id="main" class="main-data">
  <div class="padding">
    <div class="top-btn">
      <a href="create.php" class="btn"><span style="padding: 2px;"><i class="fa-solid fa-plus"></i></span>Create<span></span></a>
    </div>
    <h2>Project Gallary </h2>

    <table>
      <thead>
        <tr>
          <th>s.n</th>
          <th>title</th>
          <th>project_date</th>
          <th>project_url</th>
          <th>image</th>
          <th>action</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $select_user = "SELECT * FROM gallary";
        $select_result = mysqli_query($conn, $select_user);
        $i = 1;
        while ($result = $select_result->fetch_assoc()) {


        ?>
          <tr>
            <td ><?php echo $i++ ?></td>
            <td><?php echo $result['title'] ?></td>
            <td><?php echo $result['project_date'] ?></td>
            <td><?php echo $result['project_url'] ?></td>
            <td><img width="100" height="100" src="../../uploads/<?php echo $result['profile_image']; ?>" alt=""></td>
            <td>
              <a href="edit.php?id=<?php echo $result['id'] ?>"class="btn" style="background-color:green" ><span class="table-icon"><i class="fa-solid fa-pen-to-square"></i></span></a>
              <a href="delete.php?id=<?php echo $result['id'] ?>"  onclick="return confirm('Are you want to delete')" class="btn" ><span class="table-icon" ><i class="fa-solid fa-trash"></i></span></a>
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