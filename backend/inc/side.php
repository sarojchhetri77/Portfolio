<div class="sidebar">
            <div class="profile-image">
                <img src="../../uploads/image2.jpg" alt="my image" width="100%">
            </div>
            <div class="name" style=" color: white;">
                <p style="padding-left: 81px;">Saroj Chhetri</p>
            </div>
            <div class="listdown">
                <ul>
                    <li>
                        <a href="http://localhost/portfolio/backend/dashboard.php">
                            <span>
                                <i class="fa-solid fa-home"></i>
                            </span>
                            Dashboard
                        </a>
                    </li>
                    <li class="<?= (strpos($_SERVER['REQUEST_URI'], '/user/manage.php') !== false) ? 'active' : '' ?>">
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
                        <a href="http://localhost/portfolio/backend/resume/manage.php">
                            <span>
                                <i class="fa-solid fa-address-book"></i>
                            </span>
                            Experience
                        </a>
                    </li>
                </ul>
            </div>
        </div>