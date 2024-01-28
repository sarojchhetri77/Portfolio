<?php require('../process/db.php');
require('../process/secure.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
     <!-- link of fontawsome -->
     <script src="https://kit.fontawesome.com/ae6df88903.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="assets/css/backend.css">
</head>
<body>
<div class="sidebar">
            <div class="profile-image">
                <img src="../uploads/image2.jpg" alt="my image" width="100%">
            </div>
            <div class="name" style=" color: white;">
                <p style="padding-left: 81px;">Saroj Chhetri</p>
            </div>
            <div class="listdown">
                <ul>
                    <li class="<?= (strpos($_SERVER['REQUEST_URI'], '/dashboard.php') !== false) ? 'active' : '' ?>">
                        <a href="http://localhost/portfolio/backend/dashboard.php">
                            <span>
                                <i class="fa-solid fa-home"></i>
                            </span>
                            Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="http://localhost/portfolio/backend/users/manage.php">
                            <span>
                                <i class="fa-solid fa-user"></i>
                            </span>
                            User
                        </a>
                    </li>
                    <li>
                        <a href="http://localhost/portfolio/backend/education/manage.php">
                            <span>
                                <i class="fa-solid fa-file"></i>
                            </span>
                            Education
                        </a>
                    </li>
                    <li>
                        <a href="http://localhost/portfolio/backend/gallary/manage.php">
                            <span>
                                <i class="fa-solid fa-film"></i>
                            </span>
                            Portfolio
                        </a>
                    </li>
                    <li>
                        <a href="http://localhost/portfolio/backend/service/manage.php">
                            <span>
                                <i class="fa-solid fa-server"></i>
                            </span>
                            Service
                        </a>
                    </li>
                    <li>
                        <a href="http://localhost/portfolio/backend/experience/manage.php">
                            <span>
                                <i class="fa-solid fa-address-book"></i>
                            </span>
                            Experience
                        </a>
                    </li>
                    <li>
                        <a href="http://localhost/portfolio/process/logout.php">
                            <span>
                            <i class="fa-solid fa-right-from-bracket"></i>
                            </span>
                           logout
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <main class="main-data ">
            <div class="section-title">

                <h3>Dashboard</h3>
            </div>
       <div class="main-dashboard padding">
        <div class="dashboard-item">
            <p>Users</p>
            <a href="users/manage.php">Manage User</a>
        </div>
        <div class="dashboard-item">
            <p>Education</p>
            <a href="education/manage.php">Manage Eucation</a>
        </div>
        <div class="dashboard-item">
            <p>Resume</p>
            <a href="users/manage.php">Manage resume</a>
        </div>
        <div class="dashboard-item">
            <p>skills</p>
            <a href="skill/manage.php">Manage Skills</a>
        </div>
        <div class="dashboard-item">
            <p>Servie</p>
            <a href="service/manage.php">Manage Service</a>
        </div>
        <div class="dashboard-item">
            <p>Description</p>
            <a href="description/manage.php">Manage description</a>
        </div>
        <div class="dashboard-item">
            <p>Setting</p>
            <a href="side_config/create.php">Manage</a>
        </div>
       </div>
       <div class="message">
    
    <h2>Message Data</h2>
    <table>
      <thead>
        <tr>
          <th>S.N</th>
          <th>Title</th>
          <th>email</th>
          <th>subject</th>
          <th>action</th>
        </tr>
      </thead>
      <tbody>
      <?php
    $select = "SELECT * FROM contact";
    $select_result = mysqli_query($conn,$select);
    $i = 1;
    while ($result = $select_result->fetch_assoc()) {


    ?>
      <tr>
        <td><?php echo $i++ ?></td>
        <td><?php echo $result['name'] ?></td>
        <td><?php echo $result['email'] ?></td>
        <td><?php echo $result['subject'] ?></td>
        <td>
              <a href="message/view.php?id=<?php echo $result['id'] ?>"class="btn" style="background-color:green" ><span class="table-icon"><i class="fa-solid fa-pen-to-square"></i></span></a>
              <a href="message/delete.php?id=<?php echo $result['id'] ?>"  onclick="return confirm('Are you want to delete')" class="btn" ><span class="table-icon" ><i class="fa-solid fa-trash"></i></span></a>
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