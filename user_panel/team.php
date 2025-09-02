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
    <title>Gym | Template</title>
</head>

<body>

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="<?php echo HTTP_PATH . "/img/breadcrumb-bg.jpg"; ?>">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb-text">
                        <h2>Our Team</h2>
                        <div class="bt-option">
                            <a href="./index.html">Home</a>
                            <span>Our team</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Team Section Begin -->
    <section class="team-section team-page spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="team-title">
                        <div class="section-title">
                            <span>Our Team</span>
                            <h2>TRAIN WITH EXPERTS</h2>
                        </div>
                        <?php if (!isset($_SESSION["email"])) { ?>
                            <a class="btn primary-btn login-btn btn-normal appoinment-btn text-light">appointment</a>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php
                include(DRIVE_PATH . "/database.php");

                $trainer = $conn->prepare("SELECT * FROM `trainer`");
                $trainer->execute();
                $trainer = $trainer->fetchAll();

                foreach ($trainer as $tr) {
                ?>
                    <div class="col-lg-4">
                        <div class="ts-item set-bg" data-setbg="<?php echo HTTP_PATH . "/img/trainer/" . $tr["img"] . ""; ?>">
                            <div class="ts_text">
                                <h4><?php echo $tr["FirstName"] . " " . $tr["LastName"]; ?></h4>
                                <span><?php echo $tr["Specialization"]; ?></span>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <div class="col-lg-4 col-sm-6">
                    <div class="ts-item set-bg" data-setbg="<?php echo HTTP_PATH . "/img/trainer/" . $tr["img"] . ""; ?>">
                        <div class="ts_text">
                            <h4><?php echo $tr["FirstName"] . " " . $tr["LastName"]; ?></h4>
                            <span><?php echo $tr["Specialization"]; ?></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Team Section End -->

    <?php
    include(DRIVE_PATH . "/user_panel/footer/footer.php");
    ?>
</body>

</html>