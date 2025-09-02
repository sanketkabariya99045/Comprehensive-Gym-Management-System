<?php
require(__DIR__ . "/path.php");
include(DRIVE_PATH . "/user_panel/header/header.php");

if (isset($_SESSION["logout"])) {
    unset($_SESSION["logout"]);
}
if (isset($_SESSION["set_pass"])) {
    unset($_SESSION["set_pass"]);
}
if (isset($_SESSION["otp"])) {
    unset($_SESSION["otp"]);
}

include(DRIVE_PATH . "/user_panel/login/login.php");

include(DRIVE_PATH . "/database.php");
?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Gym Template">
    <meta name="keywords" content="Gym, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Invigor Fitness Studio</title>
</head>

<body>
    <?php
    if (isset($_SESSION["email"])) {
        $sel = $conn->prepare("SELECT * FROM `member` WHERE `email`='" . $_SESSION["email"] . "'");
        $sel->execute();
        $sel = $sel->fetchAll();

        foreach ($sel as $r) {
            $_SESSION["name"] = $r["FirstName"] . " " . $r["LastName"];
            $_SESSION["phone"] = $r["phone"];
            $_SESSION["gender"] = $r["gender"];
            $_SESSION["dob"] = date("d/m/Y", strtotime($r["dob"]));
        }
    }
    ?>

    <!-- Hero Section Begin -->
    <section class="hero-section">
        <div class="hs-slider owl-carousel">
            <div class="hs-item set-bg" data-setbg="img/hero/hero-1.jpg">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 offset-lg-6">
                            <div class="hi-text">
                                <span>Shape your body</span>
                                <h1>Be <strong>strong</strong> traning hard</h1>
                                <a href="#pricing-section" class="primary-btn">Get Membership</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="hs-item set-bg" data-setbg="img/hero/hero-2.jpg">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 offset-lg-6">
                            <div class="hi-text">
                                <span>Shape your body</span>
                                <h1>Be <strong>strong</strong> traning hard</h1>
                                <a href="#pricing-section" class="primary-btn">Get Membership</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- ChoseUs Section Begin -->
    <style>
        :root {
            --primary: #e63946;
            --secondary: #f1faee;
            --dark: #1d3557;
            --light: #f1faee;
            --accent: #a8dadc;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Roboto', sans-serif;
            background-color: #0a0a0a;
            color: var(--light);
            overflow-x: hidden;
        }

        .what-we-offer {
            padding: 80px 20px;
            max-width: 1400px;
            margin: 0 auto;
        }

        .section-header {
            text-align: center;
            margin-bottom: 60px;
        }

        .section-header h2 {
            font-family: 'Oswald', sans-serif;
            font-size: 3.5rem;
            text-transform: uppercase;
            color: var(--primary);
            margin-bottom: 20px;
            letter-spacing: 2px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
        }

        .section-header p {
            font-size: 1.2rem;
            max-width: 800px;
            margin: 0 auto;
            line-height: 1.6;
        }

        .classes-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
            margin-bottom: 60px;
        }

        .class-card {
            background: linear-gradient(135deg, #1a1a1a 0%, #2d2d2d 100%);
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            position: relative;
            border: 1px solid rgba(230, 57, 70, 0.3);
        }

        .class-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 35px rgba(230, 57, 70, 0.2);
        }

        .class-image {
            height: 250px;
            background-size: cover;
            background-position: center;
            position: relative;
        }

        .class-image::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            height: 100px;
            background: linear-gradient(to top, rgba(10, 10, 10, 0.9), transparent);
        }

        .class-icon {
            position: absolute;
            top: 20px;
            right: 20px;
            font-size: 2.5rem;
            z-index: 2;
        }

        .class-content {
            padding: 25px;
        }

        .class-content h3 {
            font-family: 'Oswald', sans-serif;
            font-size: 1.8rem;
            margin-bottom: 15px;
            color: var(--primary);
            text-transform: uppercase;
        }

        .class-content p {
            line-height: 1.6;
            margin-bottom: 20px;
            color: #ccc;
        }

        .why-stand-out {
            background: linear-gradient(135deg, #1d1d1d 0%, #2a2a2a 100%);
            padding: 60px;
            border-radius: 10px;
            margin-bottom: 60px;
            border: 1px solid rgba(230, 57, 70, 0.3);
        }

        .why-stand-out h3 {
            font-family: 'Oswald', sans-serif;
            font-size: 2.5rem;
            text-align: center;
            margin-bottom: 40px;
            color: var(--primary);
            text-transform: uppercase;
        }

        .features {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 30px;
        }

        .feature {
            text-align: center;
            padding: 20px;
        }

        .feature i {
            font-size: 2.5rem;
            color: var(--primary);
            margin-bottom: 20px;
        }

        .feature h4 {
            font-family: 'Oswald', sans-serif;
            font-size: 1.5rem;
            margin-bottom: 15px;
            color: var(--light);
        }

        .feature p {
            color: #ccc;
            line-height: 1.6;
        }

        .cta-section {
            text-align: center;
            padding: 60px 20px;
            background: linear-gradient(135deg, rgba(230, 57, 70, 0.1) 0%, rgba(10, 10, 10, 0.8) 100%);
            border-radius: 10px;
            border: 1px solid rgba(230, 57, 70, 0.3);
        }

        .cta-section h3 {
            font-family: 'Oswald', sans-serif;
            font-size: 2.5rem;
            margin-bottom: 30px;
            color: var(--primary);
            text-transform: uppercase;
        }

        .cta-button {
            display: inline-block;
            padding: 15px 40px;
            background-color: var(--primary);
            color: var(--light);
            font-family: 'Oswald', sans-serif;
            font-size: 1.2rem;
            text-transform: uppercase;
            text-decoration: none;
            border-radius: 50px;
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
            box-shadow: 0 5px 15px rgba(230, 57, 70, 0.4);
            letter-spacing: 1px;
        }

        .cta-button:hover {
            background-color: #c1121f;
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(230, 57, 70, 0.6);
        }

        @media (max-width: 768px) {
            .section-header h2 {
                font-size: 2.5rem;
            }

            .why-stand-out {
                padding: 30px 20px;
            }

            .cta-section h3 {
                font-size: 2rem;
            }
        }
    </style>

    <section class="what-we-offer">
        <div class="section-header">
            <h2>WHAT WE OFFER?</h2>
            <p>At IronForce Gym, we provide premium group classes designed to push your limits and deliver real results. Our expert-led sessions combine cutting-edge techniques with unbeatable energy to transform your fitness journey.</p>
        </div>

        <div class="classes-container">
            <div class="class-card">
                <div class="class-image" style="background-image: url('https://images.unsplash.com/photo-1571019613454-1cb2f99b2d8b?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80');">
                    <div class="class-icon">🔥</div>
                </div>
                <div class="class-content">
                    <h3>HIIT Training</h3>
                    <p>Torch fat and boost endurance with explosive 30-minute sessions that maximize calorie burn and metabolic conditioning.</p>
                </div>
            </div>

            <div class="class-card">
                <div class="class-image" style="background-image: url('https://images.unsplash.com/photo-1534258936925-c58bed479fcb?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1631&q=80');">
                    <div class="class-icon">💪</div>
                </div>
                <div class="class-content">
                    <h3>Strength & Conditioning</h3>
                    <p>Build raw power with barbells, kettlebells, and functional movements designed to increase strength and athleticism.</p>
                </div>
            </div>

            <div class="class-card">
                <div class="class-image" style="background-image: url('https://images.unsplash.com/photo-1547347298-4074fc3086f0?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80');">
                    <div class="class-icon">🥊</div>
                </div>
                <div class="class-content">
                    <h3>Combat Fitness</h3>
                    <p>Boxing, MMA drills, and battle ropes for next-level stamina, coordination, and full-body conditioning.</p>
                </div>
            </div>

            <div class="class-card">
                <div class="class-image" style="background-image: url('https://images.unsplash.com/photo-1545205597-3d9d02c29597?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80');">
                    <div class="class-icon">🧘</div>
                </div>
                <div class="class-content">
                    <h3>Mobility & Recovery</h3>
                    <p>Yoga and foam rolling to enhance flexibility, reduce injury risk, and improve overall movement quality.</p>
                </div>
            </div>
        </div>

        <div class="why-stand-out">
            <h3>Why Our Classes Stand Out</h3>
            <div class="features">
                <div class="feature">
                    <i class="fas fa-trophy"></i>
                    <h4>Elite Certified Trainers</h4>
                    <p>Our instructors are industry leaders with proven track records of transforming bodies and lives.</p>
                </div>
                <div class="feature">
                    <i class="fas fa-sliders-h"></i>
                    <h4>All Fitness Levels</h4>
                    <p>Every class is scalable to challenge beginners while still pushing elite athletes to their limits.</p>
                </div>
                <div class="feature">
                    <i class="fas fa-dumbbell"></i>
                    <h4>Cutting-Edge Equipment</h4>
                    <p>We invest in the best tools to ensure you get the most effective workouts possible.</p>
                </div>
                <div class="feature">
                    <i class="fas fa-users"></i>
                    <h4>Community Vibe</h4>
                    <p>Train alongside like-minded warriors who will push you to be your best version.</p>
                </div>
            </div>
        </div>

        <div class="cta-section">
            <h3>Ready to transform?</h3>
            <a href="<?php echo HTTP_PATH . "/user_panel/services/service.php"; ?>" class="cta-button">Claim your FREE class pass today!</a>
        </div>
    </section>

    <script>
        $(document).ready(function() {
            // Add animation to class cards on scroll
            $(window).scroll(function() {
                $('.class-card').each(function() {
                    var cardPosition = $(this).offset().top;
                    var scrollPosition = $(window).scrollTop() + $(window).height();

                    if (scrollPosition > cardPosition) {
                        $(this).css({
                            'opacity': '1',
                            'transform': 'translateY(0)'
                        });
                    }
                });
            });

            // Trigger animation for cards in view on page load
            $(window).trigger('scroll');

            // Smooth scroll for anchor links
            $('a[href^="#"]').on('click', function(event) {
                var target = $(this.getAttribute('href'));
                if (target.length) {
                    event.preventDefault();
                    $('html, body').stop().animate({
                        scrollTop: target.offset().top
                    }, 1000);
                }
            });

            // Button hover effect
            $('.cta-button').hover(
                function() {
                    $(this).css('transform', 'translateY(-3px)');
                },
                function() {
                    $(this).css('transform', 'translateY(0)');
                }
            );
        });
    </script>
    <!-- ChoseUs Section End -->

    <!-- Classes Section Begin -->
    <section class="classes-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <span>Our Classes</span>
                        <h2>WHAT WE CAN OFFER</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="class-item">
                        <div class="ci-pic">
                            <img src="img/classes/class-1.jpg" alt="">
                        </div>
                        <div class="ci-text">
                            <span>STRENGTH</span>
                            <h5>Weightlifting</h5>
                            <a href="<?php echo HTTP_PATH . "/user_panel/services/service.php"; ?>"><i class="fa fa-angle-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="class-item">
                        <div class="ci-pic">
                            <img src="img/classes/class-2.jpg" alt="">
                        </div>
                        <div class="ci-text">
                            <span>Cardio</span>
                            <h5>Indoor cycling</h5>
                            <a href="<?php echo HTTP_PATH . "/user_panel/services/service.php"; ?>"><i class="fa fa-angle-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="class-item">
                        <div class="ci-pic">
                            <img src="img/classes/class-3.jpg" alt="">
                        </div>
                        <div class="ci-text">
                            <span>STRENGTH</span>
                            <h5>Kettlebell power</h5>
                            <a href="<?php echo HTTP_PATH . "/user_panel/services/service.php"; ?>"><i class="fa fa-angle-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="class-item">
                        <div class="ci-pic">
                            <img src="img/classes/class-4.jpg" alt="">
                        </div>
                        <div class="ci-text">
                            <span>Cardio</span>
                            <h4>Indoor cycling</h4>
                            <a href="<?php echo HTTP_PATH . "/user_panel/services/service.php"; ?>"><i class="fa fa-angle-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="class-item">
                        <div class="ci-pic">
                            <img src="img/classes/class-5.jpg" alt="">
                        </div>
                        <div class="ci-text">
                            <span>Training</span>
                            <h4>Boxing</h4>
                            <a href="<?php echo HTTP_PATH . "/user_panel/services/service.php"; ?>"><i class="fa fa-angle-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ChoseUs Section End -->

    <!-- Banner Section Begin -->
    <?php if (!isset($_SESSION["email"])) { ?>
        <section class="banner-section set-bg" data-setbg="img/banner-bg.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <div class="bs-text">
                            <h2>registration now to get more deals</h2>
                            <div class="bt-tips">Where health, beauty and fitness meet.</div>
                            <a class="btn primary-btn login-btn btn-normal">Appointment</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php } ?>
    <!-- Banner Section End -->

    <!-- Pricing Section Begin -->
    <section class="pricing-section spad" id="pricing-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <span>Our Plan</span>
                        <h2>Choose your pricing plan</h2>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-8">
                    <div class="ps-item">
                        <h3>Class drop-in</h3>
                        <div class="pi-price">
                            <h2>&#8377; 3500</h2>
                            <span>SINGLE CLASS</span>
                        </div>
                        <ul>
                            <li>Free riding</li>
                            <li>Unlimited equipments</li>
                            <li>Personal trainer</li>
                            <li>Weight losing classes</li>
                            <li>Month to mouth</li>
                            <li>No time restriction</li>
                        </ul>
                        <a href="<?php echo HTTP_PATH . "/user_panel/class/class-details.php?type=1&fee=3500"; ?>" class="primary-btn pricing-btn">Enroll now</a>
                        <a href="#" class="thumb-icon"><i class="fa fa-picture-o"></i></a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-8">
                    <div class="ps-item">
                        <h3>12 Month unlimited</h3>
                        <div class="pi-price">
                            <h2>&#8377; 8500</h2>
                            <span>SINGLE CLASS</span>
                        </div>
                        <ul>
                            <li>Free riding</li>
                            <li>Unlimited equipments</li>
                            <li>Personal trainer</li>
                            <li>Weight losing classes</li>
                            <li>Month to mouth</li>
                            <li>No time restriction</li>
                        </ul>
                        <a href="<?php echo HTTP_PATH . "/user_panel/class/class-details.php?type=2&fee=8500"; ?>" class="primary-btn pricing-btn">Enroll now</a>
                        <a href="#" class="thumb-icon"><i class="fa fa-picture-o"></i></a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-8">
                    <div class="ps-item">
                        <h3>6 Month unlimited</h3>
                        <div class="pi-price">
                            <h2>&#8377; 5000</h2>
                            <span>SINGLE CLASS</span>
                        </div>
                        <ul>
                            <li>Free riding</li>
                            <li>Unlimited equipments</li>
                            <li>Personal trainer</li>
                            <li>Weight losing classes</li>
                            <li>Month to mouth</li>
                            <li>No time restriction</li>
                        </ul>
                        <a href="<?php echo HTTP_PATH . "/user_panel/class/class-details.php?type=3&fee=5000"; ?>" class="primary-btn pricing-btn">Enroll now</a>
                        <a href="#" class="thumb-icon"><i class="fa fa-picture-o"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Pricing Section End -->

    <!-- Gallery Section Begin -->
    <div class="gallery-section">
        <div class="gallery">
            <div class="grid-sizer"></div>
            <div class="gs-item grid-wide set-bg" data-setbg="img/gallery/gallery-1.jpg">
                <a href="img/gallery/gallery-1.jpg" class="thumb-icon image-popup"><i class="fa fa-picture-o"></i></a>
            </div>
            <div class="gs-item set-bg" data-setbg="img/gallery/gallery-2.jpg">
                <a href="img/gallery/gallery-2.jpg" class="thumb-icon image-popup"><i class="fa fa-picture-o"></i></a>
            </div>
            <div class="gs-item set-bg" data-setbg="img/gallery/gallery-3.jpg">
                <a href="img/gallery/gallery-3.jpg" class="thumb-icon image-popup"><i class="fa fa-picture-o"></i></a>
            </div>
            <div class="gs-item set-bg" data-setbg="img/gallery/gallery-4.jpg">
                <a href="img/gallery/gallery-4.jpg" class="thumb-icon image-popup"><i class="fa fa-picture-o"></i></a>
            </div>
            <div class="gs-item set-bg" data-setbg="img/gallery/gallery-5.jpg">
                <a href="img/gallery/gallery-5.jpg" class="thumb-icon image-popup"><i class="fa fa-picture-o"></i></a>
            </div>
            <div class="gs-item grid-wide set-bg" data-setbg="img/gallery/gallery-6.jpg">
                <a href="img/gallery/gallery-6.jpg" class="thumb-icon image-popup"><i class="fa fa-picture-o"></i></a>
            </div>
        </div>
    </div>
    <!-- Gallery Section End -->

    <!-- Team Section Begin -->
    <section class="team-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="team-title">
                        <div class="section-title">
                            <span>Our Team</span>
                            <h2>TRAIN WITH EXPERTS</h2>
                        </div>
                        <?php if (!isset($_SESSION["email"])) { ?>
                            <a class="btn primary-btn login-btn btn-normal appoinment-btn">appointment</a>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="ts-slider owl-carousel">
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
                </div>
            </div>
        </div>
    </section>
    <!-- Team Section End -->


    <div class="testimonials-section" style="background-image: url('img/gallery/gym-background.jpg'); background-size: cover; background-position: center; padding: 60px 20px; text-align: center; color: white; position: relative;">

        <!-- Dark overlay for better text visibility -->
        <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0,0,0,0.7); z-index: 1;"></div>

        <div style="position: relative; z-index: 2; max-width: 1200px; margin: 0 auto;">
            <h2 style="font-size: 2.5rem; margin-bottom: 40px; color: #ff5e00; font-weight: 700;">WHAT OUR CUSTOMERS SAY</h2>

            <div style="display: flex; flex-wrap: wrap; justify-content: space-around; gap: 30px;">

                <?php
                $sel = $conn->prepare("SELECT * FROM feedback JOIN member ON member.email = feedback.email LIMIT 3");
                $sel->execute();
                $sel = $sel->fetchAll();

                foreach ($sel as $r) { ?>
                    <div style="background-color: rgba(255,255,255,0.1); backdrop-filter: blur(5px); border-radius: 10px; padding: 25px; max-width: 350px; border-top: 3px solid #ff5e00;">
                        <div style="font-size: 1.1rem; font-style: italic; margin-bottom: 20px;">
                            "<?php echo $r["comments"]; ?>"
                        </div>
                        <div style="font-weight: bold; color: #ff5e00;"><?php echo $r["FirstName"] . " " . $r["LastName"]; ?></div>
                        <div style="font-size: 0.9rem;"><?php echo str_repeat("★", $r["rating"]) . str_repeat("☆", 5 - $r["rating"]); ?></div>
                    </div>
                <?php } ?>
            </div>

            <a href="<?php echo HTTP_PATH . "/user_panel/feedback/feedback.php"; ?>" style="display: block;margin: 50px auto; width: fit-content; padding: 12px 30px; background-color: #ff5e00; color: white; border: none; border-radius: 5px; font-weight: bold; font-size: 1rem; cursor: pointer; transition: all 0.3s;">
                SEE MORE
            </a>
        </div>
    </div>

    <?php include(DRIVE_PATH . "/user_panel/footer/footer.php"); ?>
</body>

</html>