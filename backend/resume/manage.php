<?php
require('../../process/db.php');
require('../inc/top.php');
require('../inc/side.php');
require('../../process/secure.php');
?>

<main class="main-data">
  <div class="padding">
    <div class="top-btn">
      <a href="create.php" class="btn"><span style="padding: 2px;"><i class="fa-solid fa-plus"></i></span>Create<span></span></a>
    </div>
    <h2>Experience Data</h2>
    <table>
      <thead>
        <tr>
          <th>s.n</th>
          <th>work as</th>
          <th>address</th>
          <th>Duration</th>
          <th>action</th>
        </tr>
      </thead>
      <tbody>
      <?php
    $select = "SELECT * FROM resume";
    $select_result = mysqli_query($conn,$select);
    $i = 1;
    while ($result = $select_result->fetch_assoc()) {


    ?>
      <tr>
        <td><?php echo $i++ ?></td>
        <td><?php echo $result['title'] ?></td>
        <td><?php echo $result['address'] ?></td>
        <td><?php echo $result['duration'] ?></td>
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