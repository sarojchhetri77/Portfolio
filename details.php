<?php
require('process/db.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Portfolio</title>
    <!-- link of fontawsome -->
    <script src="https://kit.fontawesome.com/ae6df88903.js" crossorigin="anonymous"></script>
    <!-- link of external css -->
    <link rel="stylesheet" href="assets/css/index.css">
</head>

<body>
    <?php
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $select = "SELECT * FROM gallary WHERE id=$id";
        $select_result = mysqli_query($conn, $select);
        $result = $select_result->fetch_assoc();
    ?>
        <div class="sidebar">
            <div class="profile-image">
                <img src="uploads/image2.jpg" alt="my image" width="100%">
            </div>
            <div class="name" style=" color: white;">
                <p style="padding-left: 81px;">Saroj Chhetri</p>
            </div>
            <div class="profile-link">
                <a href="">
                    <i class="fa-brands circle fa-instagram"></i>
                </a>
                <a href="">
                    <i class="fa-brands circle fa-facebook"></i>
                </a>
                <a href="">
                    <i class="fa-brands circle fa-whatsapp"></i>
                </a>
                <a href="">
                    <i class="fa-brands circle fa-twitter"></i>
                </a>
            </div>
            <div class="listdown">
                <ul>
                    <li>
                        <a href="">
                            <span>
                                <i class="fa-solid fa-house"></i>
                            </span>
                            Home
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <span>
                                <i class="fa-solid fa-user"></i>
                            </span>
                            About
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <span>
                                <i class="fa-solid fa-file"></i>
                            </span>
                            Resume
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <span>
                                <i class="fa-solid fa-film"></i>
                            </span>
                            Portfolio
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <span>
                                <i class="fa-solid fa-server"></i>
                            </span>
                            Service
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <span>
                                <i class="fa-solid fa-address-book"></i>
                            </span>
                            Contact
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <main class="main-data">
            <section class="details padding">
                <div>
                    <h3 class="section-title blue">Details</h3>
                </div>
                <div class="detail-main">
                    <div class="detail-left detail-same">
                        <img width="100%" src="uploads/<?php echo $result['profile_image'] ?>" alt="">

                    </div>
                    <div class="detail-right detail-same">
                        <ul>
                            <li>
                                <span>
                                    <i class="icon fa-solid fa-angles-right"></i>
                                </span>
                                <strong>Project:</strong>
                                <span><?php echo $result['title'] ?></span>
                            </li>
                            <li>
                                <span>
                                    <i class="icon fa-solid fa-angles-right"></i>
                                </span>
                                <strong>Client:</strong>
                                <span><?php echo $result['client'] ?></span>
                            </li>
                            <li>
                                <span>
                                    <i class="icon fa-solid fa-angles-right"></i>
                                </span>
                                <strong>Project Date:</strong>
                                <span><?php echo $result['project_date'] ?></span>
                            </li>
                            <li>
                                <span>
                                    <i class="icon fa-solid fa-angles-right"></i>
                                </span>
                                <strong>Project Url:</strong>
                                <span><?php echo $result['project_url'] ?></span>
                            </li>

                        </ul>
                        <div class="demo">
                    <a href="https://github.com/sarojchhetri77/">
                        <button  class="demo-btn">Demo</button>

                    </a>
                </div>
                    </div>

                </div>
                <div class="description">
                    <p><?php echo $result['description'] ?></p>
                </div>


            </section>
        <?php } ?>
        </main>
        <script src="assets/js/index.js"></script>
</body>

</html>