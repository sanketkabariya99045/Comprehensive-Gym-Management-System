<?php
require("C:/xampp/htdocs/php/IFS/path.php");
include(DRIVE_PATH . "/user_panel/header/header.php");

include(DRIVE_PATH . "/user_panel/login/login.php");
?>

<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Gym Template">
    <meta name="keywords" content="Gym, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contact US</title>
</head>

<script>
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
</script>

<body>
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="<?php echo HTTP_PATH . "/img/breadcrumb-bg.jpg"; ?>">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb-text">
                        <h2>Contact Us</h2>
                        <div class="bt-option">
                            <a href="./index.html">Home</a>
                            <a href="#">Pages</a>
                            <span>Contact us</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Contact Section Begin -->
    <section class="contact-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <?php
                    if (isset($_SESSION["success"])) { ?>
                        <div class="alert alert-success"><?php echo $_SESSION["success"]; ?></div>
                        <script>
                            $(document).ready(function() {
                                $(".alert").fadeOut(10000);
                                <?php unset($_SESSION["success"]); ?>
                            });
                        </script>
                    <?php } ?>
                    <div class="section-title contact-title">
                        <span>Contact Us</span>
                        <h2>GET IN TOUCH</h2>
                    </div>
                    <div class="contact-widget">
                        <div class="cw-text">
                            <i class="fa fa-map-marker"></i>
                            <p>Nr.Shell petrol pump, f.f 109m Fortune Business hub, science city road, Ahmedabad, Gujarat - 380060</p>
                        </div>
                        <div class="cw-text">
                            <i class="fa fa-mobile"></i>
                            <ul>
                                <li>+91 98765 43210</li>
                            </ul>
                        </div>
                        <div class="cw-text email">
                            <i class="fa fa-envelope"></i>
                            <p>Support.gymcenter@gmail.com</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="leave-comment">
                        <form action="<?php echo HTTP_PATH . "/user_panel/contact/sendMsg.php"; ?>" method="post">
                            <input type="text" name="name" placeholder="Name">
                            <input type="text" name="email" placeholder="Email">
                            <input type="text" name="phone" placeholder="Phone">
                            <textarea placeholder="Message"></textarea>
                            <button type="submit">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3670.4815435060905!2d72.4980183747719!3d23.079461714203905!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x395e9d7d0ea41449%3A0x87a1351a9fbd4e0a!2sShell%20Petrol%20Pump!5e0!3m2!1sen!2sin!4v1743504705591!5m2!1sen!2sin" height="550" style="border:0;border-radius: 10px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </section>
    <!-- Contact Section End -->

    <?php
    include(DRIVE_PATH . "/user_panel/footer/footer.php");
    ?>
</body>

</html>