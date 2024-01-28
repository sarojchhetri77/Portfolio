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
    // select data from table users
    $select = "SELECT * FROM users";
    $select_result = mysqli_query($conn, $select);
    $result = $select_result->fetch_assoc();
    ?>
    <div class="container">
        <div class="sidebar" data-reveal="left" data-reveal-delay="0.8s">
            <div class="profile-image">
                <img src="uploads/<?php echo $result['profile_image']; ?>" alt="my image" width="100%">
            </div>
            <div class="name" style=" color: white;">
                <p style="padding-left: 81px;margin-top: 9px; margin-bottom: 7px;"><?php echo $result['name'] ?></p>
            </div>
            <div class="profile-link">
                <?php
                $selectlink = "SELECT * FROM side_config";
                $linkresult = mysqli_query($conn, $selectlink);
                $facebook = $instragram = $linkedin = $twitter = "#";

                while ($linkdata = $linkresult->fetch_assoc()) {
                    $name = strtolower($linkdata['name']);

                    if ($name == "facebook") {
                        $facebook = $linkdata['url'];
                    } else if ($name == "instragram") {  // Corrected from "instragram" to "instagram"
                        $instragram = $linkdata['url'];
                    } else if ($name == "linkedin") {
                        $linkedin = $linkdata['url'];
                    } else if ($name == "twitter") {
                        $twitter = $linkdata['url'];
                    }
                }
                ?>
                <a href="<?php echo $instragram; ?>">
                    <i class="fa-brands circle fa-instagram"></i>
                </a>
                <a href="<?php echo $facebook; ?>">
                    <i class="fa-brands circle fa-facebook"></i>
                </a>
                <a href="<?php echo $linkedin; ?>">
                    <i class="fa-brands fa-linkedin"></i>
                </a>
                <a href="<?php echo $twitter; ?>">
                    <i class="fa-brands circle fa-twitter"></i>
                </a>
            </div>
            <div class="listdown">
                <ul>
                    <li>
                        <a href="#home">
                            <span>
                                <i class="fa-solid fa-house"></i>
                            </span>
                            Home
                        </a>
                    </li>
                    <li>
                        <a href="#about">
                            <span>
                                <i class="fa-solid fa-user"></i>
                            </span>
                            About
                        </a>
                    </li>
                    <li>
                        <a href="#resume">
                            <span>
                                <i class="fa-solid fa-file"></i>
                            </span>
                            Resume
                        </a>
                    </li>
                    <li>
                        <a href="#portfolio">
                            <span>
                                <i class="fa-solid fa-film"></i>
                            </span>
                            Portfolio
                        </a>
                    </li>
                    <li>
                        <a href="#service">
                            <span>
                                <i class="fa-solid fa-server"></i>
                            </span>
                            Service
                        </a>
                    </li>
                    <li>
                        <a href="#contact">
                            <span>
                                <i class="fa-solid fa-address-book"></i>
                            </span>
                            Contact
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="main-container" id="home">
            <div class="overlay"></div>
            <div class="main-content">
                <div class="main-name">
                    <h1 data-reveal="left" data-reveal-delay="0.5s"><?php echo $result['name']; ?></h1>
                </div>
                <div class="main1" class="typing-container">
                    <h1 data-reveal="right" data-reveal-delay="1s" class="typing-container">I'am Web Developer </h1>
                </div>
                <!-- <div class="typing-container">I am a designer</div> -->
                <div>
                    <a href="uploads/Myfinalcv.pdf" download="Myfinalcv.pdf">
                        <button data-reveal="right" data-reveal-delay="0.5s" class="cv">Download CV</button>

                    </a>
                </div>
            </div>
        </div>
    </div>
    <?php
    // select data from table users
    $select_description = "SELECT * FROM description";
    $select_des = mysqli_query($conn, $select_description);
    $des = $select_des->fetch_assoc();
    ?>
    <main class="main-data">
        <section class="about-section"data-reveal="bottom" data-reveal-delay="1s" id="about">
            <div class="about width">
                <div class="section-title blue">
                    <h3>About</h3>
                </div>
                <div class="aboutme">
                    <p class="description">
                        Hello! I'm Saroj, a passionate Full Stack Laravel Developer with a love for turning ideas into
                        digital reality. My journey in the world of coding began with a fascination for creating and optimizing.
                        From crafting seamless user experiences to diving into complex backend solutions, I thrive on challenges. Let's build something extraordinary together!
                    </p>
                </div>
                <div class="about-main">
                    <div class="about-left">
                        <div class="about-image">
                            <img data-reveal="left" data-reveal-delay="0.5s" src="uploads/<?php echo $result['profile_image']; ?>" width="100%" alt="">
                        </div>
                    </div>
                    <div class="about-right" data-reveal="right" data-reveal-delay="0.5s">
                        <div>
                            <h2 class="blue">Full Stack Developer</h2>
                            <p class="description">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Iste delectus qui fuga placeat quisquam
                                assumenda vel dolores sed fugit fugiat! Lorem ipsum dolor sit amet.
                            </p>
                        </div>
                        <div class="right-main">
                            <div class="left-child">
                                <ul>
                                    <li>
                                        <span>
                                            <i class="icon fa-solid fa-angles-right"></i>
                                        </span>
                                        <strong>Birthday:</strong>
                                        <span><?php echo $result['birthday'] ?></span>
                                    </li>
                                    <li>
                                        <span>
                                            <i class="icon fa-solid fa-angles-right"></i>
                                        </span>
                                        <strong>Phone:</strong>
                                        <span><?php echo $result['phone'] ?></span>
                                    </li>
                                    <li>
                                        <span>
                                            <i class="icon fa-solid fa-angles-right"></i>
                                        </span>
                                        <strong>City:</strong>
                                        <span><?php echo $result['city'] ?></span>
                                    </li>
                                </ul>
                            </div>
                            <div class="right-child">
                                <ul>
                                    <li>
                                        <span>
                                            <i class="icon fa-solid fa-angles-right"></i>
                                        </span>
                                        <strong>Age:</strong>
                                        <span><?php echo $result['age'] ?></span>
                                    </li>
                                    <li>
                                        <span>
                                            <i class="icon fa-solid fa-angles-right"></i>
                                        </span>
                                        <strong>Degree:</strong>
                                        <span><?php echo $result['degree'] ?></span>
                                    </li>
                                    <li>
                                        <span>
                                            <i class="icon fa-solid fa-angles-right"></i>
                                        </span>
                                        <strong>Email:</strong>
                                        <span><?php echo $result['email'] ?></span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div style="padding-top:30px">
                            <p class="description">
                                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Minus voluptate iure animi,
                                delectus ab
                                aliquid culpa magni sit commodi nemo voluptatem fuga quas porro. Ut sint nostrum architecto
                                odio
                                nisi?
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- --------------------skill section------------------------ -->
        <section class="skill width"id="skill" style="background: #f5f8fd;" data-reveal="bottom" data-reveal-delay="0.5s">
            <div>
                <h3 class="section-title blue">Skills</h3>
                <p class="skill-p description">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nulla, alias? Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facilis earum illum molestias sit! Quo quia repellat, minima harum mollitia saepe.</p>
            </div>
            <div class="skill-progress">
                <?php
                $select_skill = "SELECT * FROM skill";
                $skill_result = mysqli_query($conn, $select_skill);

                while ($skill_data = $skill_result->fetch_assoc()) {


                ?>
                    <div class="skill-left skill-same" style="width: 50%;">
                        <span class="skill-title">
                            <p><?php echo $skill_data['title'] ?></p>
                        </span>
                        <div class="progess">
                            <div class="progess-data" data-reveal="left" data-reveal-delay="0.5s" style="height:10px;width:<?php echo $skill_data['value'] ?>%"></div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </section>
        <!-- --------------resume section----------- -->
        <section class="resume" id="resume" data-reveal="bottom" data-reveal-delay="1s">
            <div>
                <h3 class="section-title blue">Resume</h3>
                <p class="skill-p description">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nulla, alias? Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facilis earum illum molestias sit! Quo quia repellat, minima harum mollitia saepe.</p>
            </div>
            <div class="resume-main">
                <div class="resume-same resume-left">
                    <h2 class="section-title blue">Education</h2>
                    <?php
                    $select_edu = "SELECT * FROM education";
                    $result_edu = mysqli_query($conn, $select_edu);

                    ?><?php while ($fetch_result = $result_edu->fetch_assoc()) {  ?>
                    <div class="education">
                        <h4><?php echo $fetch_result['title'] ?></h4>
                        <span style=" margin-left: 21px; background-color: #f5f8fd;"><?php echo $fetch_result['duration'] ?></span>
                        <p style="padding-left: 21px;"><em><?php echo $fetch_result['collage_name'] ?></em></p>
                        <div style="padding: 15px;">
                            <p class="description"><?php echo $fetch_result['description'] ?></p>
                        </div>
                    </div>
                <?php
                        }
                ?>
                </div>
                <div class="resume-same resume-right">
                    <h2 class="section-title blue">Professional Experience</h2>
                    <?php
                    $select_resume = "SELECT * FROM resume";
                    $resume_result = mysqli_query($conn, $select_resume);
                    while ($resume = $resume_result->fetch_assoc()) {
                    ?>
                        <div class="education">
                            <h4><?php echo $resume['title']; ?></h4>
                            <span style=" margin-left: 21px; background-color: #f5f8fd;"><?php echo $resume['duration']; ?></span>
                            <p style="padding-left: 21px;"><em><?php echo $resume['address']; ?></em></p>
                            <div style="padding: 15px;">
                                <p class="description"><?php echo $resume['description']; ?></p>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </section>
        <!-- ----portfolio section------------ -->
        <section class="portfolio" id="portfolio"data-reveal="bottom" data-reveal-delay="1s" style="background: #f5f8fd;">
            <div class="section-top">
                <h3 class="section-title blue">Portfolio</h3>
                <p class="padding description">Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio, mollitia dignissimos. Quam id cum eum quaerat blanditiis repudiandae explicabo commodi.</p>
            </div>
            <div class="cards padding">
                <?php
                $select_gallary = "SELECT * FROM gallary";
                $gallary_result = mysqli_query($conn, $select_gallary);
                while ($results = $gallary_result->fetch_assoc()) {
                ?>
                    <div class="project-card" style="width: 300px;">
                        <div class="image">
                            <img src="uploads/<?php echo $results['profile_image']; ?>" width="100%" height="300px" alt="">
                            <div class="detail">
                                <a href="details.php?id=<?php echo $results['id'] ?>" title="Project details"><i class="fa-solid fa-link"></i></a>
                            </div>
                        </div>

                    </div>
                <?php } ?>
            </div>

        </section>
        <!-- -----services section------------ -->
        <section class="service" data-reveal="bottom" data-reveal-delay="1s" id="service">
            <div class="section-top">
                <h3 class="section-title blue">Services</h3>
                <p class="description padding">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Assumenda libero voluptate officia. Totam soluta consectetur cum amet veniam inventore sit!</p>

            </div>

            <div class="services-content padding">
                <?php
                $select_service = "SELECT * FROM service";
                $service_result = mysqli_query($conn, $select_service);
                while ($service_results = $service_result->fetch_assoc()) { ?>
                    <div class="service-card">
                        <div class="service-title blue"><?php echo $service_results['title']; ?></div>
                        <div class="service-description"><?php echo $service_results['description']; ?></div>
                    </div>

                <?php } ?>
            </div>
        </section>
        <!-- ---------contact section------------- -->
        <section class="contact" id="contact" data-reveal="bottom" data-reveal-delay="1s">
            <div class="section-top">
                <h3 class="blue section-title">Contact</h3>
                <p class="description padding">Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita laboriosam quae aliquid? Perferendis rerum rem et, voluptate exercitationem molestias quis!</p>

            </div>
            <div class="contact-main padding">
                <div class="contact-same contact-left">
                    <div class="location">
                        <div class="location-icon">
                            <i class="fa-solid fa-location-dot"></i>
                        </div>
                        <div class="location-title">
                            <h3 class="marin">Location:</h3>
                            <p class="description">Lorem, ipsum dolor.</p>
                        </div>
                    </div>
                    <div class="location">
                        <div class="location-icon">
                            <i class="fa-solid fa-envelope"></i>
                        </div>
                        <div class="location-title">
                            <h3 class="marin">Email:</h3>
                            <p class="description">Chhetrisaroj150@gmail.com</p>
                        </div>
                    </div>
                    <div class="map">
                        <iframe width="100%" height="300px" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3514.825937084328!2d83.98174627455708!3d28.24296240166648!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x399595fb3df356a9%3A0x6214dced5f040c97!2sHari%20chowk!5e0!3m2!1sen!2snp!4v1705715589216!5m2!1sen!2snp" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
                <div class="contact-same contact-right">
                    <form action="#" method="POST">
                        <?php
                        if (isset($_POST['submit'])) {
                            $name = $_POST['name'];
                            $email = $_POST['email'];
                            $subject = $_POST['subject'];
                            $message = $_POST['message'];
                            $insert = " INSERT INTO contact(name,email,subject,description) VALUES('$name','$email','$subject','$message')";
                            $insert_result = mysqli_query($conn, $insert);
                            if ($insert_result) {
                        ?>
                                <div class="alert alert-primary" role="alert">
                                    Message Sent successfully.
                                </div>
                        <?php
                            }
                        }
                        ?>
                        <label for="name">Your Name:</label>
                        <input type="text" id="name" name="name" required>

                        <label for="email">Your Email:</label>
                        <input type="email" id="email" name="email" required>

                        <label for="subject">Subject:</label>
                        <input type="text" id="subject" name="subject" required>

                        <label for="message">Message:</label>
                        <textarea id="message" name="message" rows="6" required></textarea>

                        <button type="submit" name="submit">Send Message</button>
                    </form>
                </div>
            </div>
        </section>

    </main>
    <script src="assets/js/index.js"></script>
</body>

</html>