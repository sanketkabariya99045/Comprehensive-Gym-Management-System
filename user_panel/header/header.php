<?php session_start();

if (isset($_SESSION["logout"])) {
    header("Location: " . HTTP_PATH . "/index.php");
}
?>
<style>
    body {
        background-color: #111111;
    }

    .fa-bell {
        font-size: 20px;
    }

    .dot {
        position: absolute;
        top: 25%;
        right: 0;
        width: 8px;
        height: 8px;
        background-color: red;
        border-radius: 50%;
    }

    @media (max-width: 990px) {
        .logo {
            width: 30%;
        }
    }

    @media (max-width: 580px) {
        .logo {
            width: 35%;
        }
    }

    @media (max-width: 450px) {
        .logo {
            width: 50%;
        }
    }
</style>
<script>
    $(document).ready(function() {
        $(".login-btn").click(function() {
            $(".form-slider").toggle(200);
        });
        $(".form-slider .fa-xmark").click(function() {
            $(".form-slider").toggle(200);
        });
    });
</script>

<?php if (isset($_SESSION["mem_succ"])) {
?>
    <div class="alert alert-success"><?php echo $_SESSION["mem_succ"]; ?></div>
    <script>
        $(document).ready(function() {
            $(".alert").fadeOut(20000);
            <?php unset($_SESSION["mem_succ"]); ?>
        });
    </script>
<?php }

if (isset($_SESSION["email"])) {
    $sel = $conn->prepare("SELECT COUNT(email) AS total_notification FROM notification WHERE `email`='" . $_SESSION["email"] . "' AND `status`='Unread'");
    $sel->execute();
    $sel = $sel->fetchAll();
    $sel = $sel[0];
}
?>

<!-- Page Preloder -->
<div id="preloder">
    <div class="loader"></div>
</div>

<!-- Offcanvas Menu Section Begin -->
<div class="offcanvas-menu-overlay"></div>
<div class="offcanvas-menu-wrapper">
    <div class="canvas-close">
        <i class="fa fa-close"></i>
    </div>
    <div class="canvas-search search-switch">
        <i class="fa fa-search"></i>
    </div>
    <nav class="canvas-menu mobile-menu">
        <ul>
            <li><a href="<?php echo HTTP_PATH . "/index.php"; ?>">Home</a></li>
            <li><a href="<?php echo HTTP_PATH . "/user_panel/about-us.php"; ?>">About Us</a></li>
            <li><a href="#">Get Membership</a>
                <ul class="dropdown">
                    <li><a href="<?php echo HTTP_PATH . "/user_panel/class/class-details.php?type=1&fee=3500"; ?>">Class drop-in</a></li>
                    <li><a href="<?php echo HTTP_PATH . "/user_panel/class/class-details.php?type=2&fee=8500"; ?>">12 Month unlimited</a></li>
                    <li><a href="<?php echo HTTP_PATH . "/user_panel/class/class-details.php?type=3&fee=5000"; ?>">6 Month unlimited</a></li>
                </ul>
            </li>
            <li><a href="<?php echo HTTP_PATH . "/user_panel/class/class-details.php"; ?>">Classes</a></li>
            <li><a href="<?php echo HTTP_PATH . "/user_panel/services/service.php"; ?>">Services</a></li>
            <li><a href="<?php echo HTTP_PATH . "/user_panel/team.php"; ?> ">Our Team</a></li>
            <li><a href="<?php echo HTTP_PATH . "/user_panel/contact/contact.php"; ?>">Contact</a></li>

            <li><a href="#">More</a>
                <ul class="dropdown">
                    <?php if (isset($_SESSION["email"])) { ?>
                        <li><a href="<?php echo HTTP_PATH . "/user_panel/profile/profile.php"; ?>">Account</a></li>
                        <li><a href="<?php echo HTTP_PATH . "/user_panel/membership/membership.php"; ?>">My Membership</a></li>
                        <li><a href="<?php echo HTTP_PATH . "/user_panel/attendance/attendance.php"; ?>">My Attendance</a></li>
                    <?php } else { ?>
                        <li><a href="#" class="login-btn">Account</a></li>
                        <li><a href="#" class="login-btn">My Membership</a></li>
                        <li><a href="#" class="login-btn">My Attendance</a></li>
                    <?php } ?>
                    <li><a href="<?php echo HTTP_PATH . "/user_panel/bmi-calculator.php"; ?>">Bmi calculate</a></li>
                    <li><a href="<?php echo HTTP_PATH . "/user_panel/gallery.php"; ?>">Gallery</a></li>
                    <li><a href="<?php echo HTTP_PATH . "/user_panel/blog/blog.php"; ?>">Our blogs</a></li>
                    <li><a href="<?php echo HTTP_PATH . "/user_panel/products/products.php"; ?>">Products</a></li>
                </ul>
            </li>

            <li><a href="#" class="login-btn">Login</a></li>
        </ul>
    </nav>
    <div id="mobile-menu-wrap"></div>
</div>
<!-- Offcanvas Menu Section End -->

<!-- Header Section Begin -->
<header class="header-section">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-2">
                <div class="logo">
                    <a href="./index.php">
                        <img src="<?php echo HTTP_PATH . "/user_panel/logo.png"; ?>" alt="" />
                    </a>
                </div>
            </div>
            <div class="col-lg-8">
                <nav class="nav-menu">
                    <ul>
                        <li class="active"><a href="<?php echo HTTP_PATH . "/index.php"; ?>">Home</a></li>
                        <li><a href="<?php echo HTTP_PATH . "/user_panel/about-us.php"; ?>">About Us</a></li>
                        <li><a href="#">Get Membership</a>
                            <ul class="dropdown">
                                <li><a href="<?php echo HTTP_PATH . "/user_panel/class/class-details.php?type=1&fee=3500"; ?>">Class drop-in</a></li>
                                <li><a href="<?php echo HTTP_PATH . "/user_panel/class/class-details.php?type=2&fee=8500"; ?>">12 Month unlimited</a></li>
                                <li><a href="<?php echo HTTP_PATH . "/user_panel/class/class-details.php?type=3&fee=5000"; ?>">6 Month unlimited</a></li>
                            </ul>
                        </li>
                        <li><a href="<?php echo HTTP_PATH . "/user_panel/services/service.php"; ?>">Services</a></li>
                        <li><a href="<?php echo HTTP_PATH . "/user_panel/team.php"; ?>">Our Team</a></li>
                        <li><a href="<?php echo HTTP_PATH . "/user_panel/contact/contact.php"; ?>">Contact</a></li>

                        <li><a href="#">More</a>
                            <ul class="dropdown">
                                <?php if (isset($_SESSION["email"])) { ?>
                                    <li><a href="<?php echo HTTP_PATH . "/user_panel/profile/profile.php"; ?>">Account</a></li>
                                    <li><a href="<?php echo HTTP_PATH . "/user_panel/membership/membership.php"; ?>">My Membership</a></li>
                                    <li><a href="<?php echo HTTP_PATH . "/user_panel/attendance/attendance.php"; ?>">My Attendance</a></li>
                                <?php } else { ?>
                                    <li><a href="#" class="login-btn">Account</a></li>
                                    <li><a href="#" class="login-btn">My Membership</a></li>
                                    <li><a href="#" class="login-btn">My Attendance</a></li>
                                <?php } ?>
                                <li><a href="<?php echo HTTP_PATH . "/user_panel/bmi-calculator.php"; ?>">Bmi calculate</a></li>
                                <li><a href="<?php echo HTTP_PATH . "/user_panel/gallery.php"; ?>">Gallery</a></li>
                                <li><a href="<?php echo HTTP_PATH . "/user_panel/blog/blog.php"; ?>">Our blogs</a></li>
                                <li><a href="<?php echo HTTP_PATH . "/user_panel/products/products.php"; ?>">Products</a></li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
            <?php if (!isset($_SESSION["email"])) { ?>
                <div class="col-lg-2">
                    <nav class="nav-menu">
                        <ul>
                            <li><button class="btn login-btn primary-btn">Login</button></li>
                        </ul>
                    </nav>
                </div>
            <?php } ?>
            <?php if (isset($_SESSION["email"])) { ?>
                <div class="col-lg-2">
                    <nav class="nav-menu">
                        <ul>
                            <li><a href="<?php echo HTTP_PATH . "/user_panel/login/logout.php"; ?>" class="btn logout-btn primary-btn px-3 text-light">Logout</a></li>
                            <?php if (isset($_SESSION["email"])) { ?>
                                <li>
                                    <a href="<?php echo HTTP_PATH . "/user_panel/notification/notification.php"; ?>">
                                        <?php echo ($sel["total_notification"] > 0) ? "<div class='dot'></div>" : ""; ?>
                                        <i class="fa-solid fa-bell text-light" style="cursor: pointer;"></i>
                                    </a>
                                </li>
                            <?php } ?>
                        </ul>
                    </nav>
                </div>
            <?php } ?>
        </div>
        <div class="canvas-open">
            <i class="fa fa-bars"></i>
        </div>
    </div>
</header>
<!-- Header End -->