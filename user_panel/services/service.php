<?php
require("C:/xampp/htdocs/php/IFS/path.php");
include(DRIVE_PATH . "/user_panel/header/header.php");

include(DRIVE_PATH . "/user_panel/login/login.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IFS Gym - Unleash Your Potential</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <style>
        /* Global Styles */
        :root {
            --primary: #f36100;
            --secondary: #000000;
            --accent: #C0C0C0;
            --light: #FFFFFF;
            --dark: #222222;
        }

        .container {
            width: 90%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 15px;
        }

        section {
            padding: 80px 0;
        }

        h1,
        h2,
        h3,
        h4 {
            color: var(--light);
            margin-bottom: 20px;
            font-weight: 700;
        }

        h1 {
            font-size: 3.5rem;
            line-height: 1.2;
        }

        h2 {
            font-size: 2.5rem;
            text-align: center;
            margin-bottom: 50px;
            position: relative;
        }

        h2::after {
            content: '';
            position: absolute;
            bottom: -15px;
            left: 50%;
            transform: translateX(-50%);
            width: 100px;
            height: 4px;
            background: var(--primary);
        }

        h3 {
            font-size: 1.8rem;
        }

        p {
            margin-bottom: 15px;
            font-size: 1.1rem;
        }

        .btn {
            display: inline-block;
            background: var(--primary);
            color: var(--light);
            padding: 12px 30px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            font-size: 1.1rem;
            font-weight: 600;
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .btn:hover {
            background: #6d0000;
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
        }

        .btn-secondary {
            background: transparent;
            border: 2px solid var(--light);
        }

        .btn-secondary:hover {
            background: var(--light);
            color: var(--secondary);
        }

        img {
            max-width: 100%;
            height: auto;
        }

        /* Hero Section */
        .hero {
            height: 100vh;
            background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('https://images.unsplash.com/photo-1571019613454-1cb2f99b2d8b?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80') no-repeat center center/cover;
            display: flex;
            align-items: center;
            text-align: center;
            position: relative;
        }

        .hero-content {
            max-width: 800px;
            margin: 0 auto;
        }

        .hero h1 {
            margin-bottom: 20px;
            animation: fadeInDown 1s ease;
        }

        .hero p {
            font-size: 1.3rem;
            margin-bottom: 30px;
            animation: fadeInUp 1s ease;
        }

        .hero-btns {
            display: flex;
            justify-content: center;
            gap: 20px;
            animation: fadeIn 1.5s ease;
        }

        .scroll-down {
            position: absolute;
            bottom: 30px;
            left: 50%;
            transform: translateX(-50%);
            color: var(--light);
            font-size: 2rem;
            animation: bounce 2s infinite;
            cursor: pointer;
        }

        /* Services Section */
        .services {
            background-color: var(--dark);
        }

        .services-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 30px;
        }

        .service-card {
            background: var(--secondary);
            border-radius: 10px;
            overflow: hidden;
            transition: all 0.3s ease;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .service-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.3);
        }

        .service-img {
            height: 200px;
            overflow: hidden;
        }

        .service-img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }

        .service-card:hover .service-img img {
            transform: scale(1.1);
        }

        .service-content {
            padding: 20px;
        }

        .service-price {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--primary);
            margin: 10px 0;
        }

        .service-meta {
            display: flex;
            justify-content: space-between;
            margin: 15px 0;
            font-size: 0.9rem;
            color: var(--accent);
        }

        .service-category {
            background: var(--primary);
            color: var(--light);
            padding: 3px 10px;
            border-radius: 20px;
            font-size: 0.8rem;
            display: inline-block;
            margin-bottom: 10px;
        }

        /* Features Section */
        .features {
            background: linear-gradient(rgba(0, 0, 0, 0.8), rgba(0, 0, 0, 0.8)), url('https://images.unsplash.com/photo-1534438327276-14e5300c3a48?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80') no-repeat center center/cover;
            background-attachment: fixed;
        }

        .features-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 40px;
        }

        .feature-item {
            text-align: center;
            padding: 30px;
            background: rgba(139, 0, 0, 0.2);
            border-radius: 10px;
            backdrop-filter: blur(5px);
            transition: all 0.3s ease;
        }

        .feature-item:hover {
            transform: translateY(-10px);
            background: rgba(139, 0, 0, 0.4);
        }

        .feature-icon {
            font-size: 3rem;
            color: var(--primary);
            margin-bottom: 20px;
        }

        /* Testimonials Section */
        .testimonials {
            background-color: var(--dark);
        }

        .testimonial-slider {
            max-width: 800px;
            margin: 0 auto;
            position: relative;
        }

        .testimonial {
            background: var(--secondary);
            padding: 30px;
            border-radius: 10px;
            text-align: center;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            display: none;
        }

        .testimonial.active {
            display: block;
            animation: fadeIn 0.5s ease;
        }

        .testimonial-img {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            margin: 0 auto 20px;
            overflow: hidden;
            border: 3px solid var(--primary);
        }

        .testimonial-img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .testimonial-rating {
            color: #FFD700;
            margin: 10px 0;
        }

        .testimonial-controls {
            display: flex;
            justify-content: center;
            margin-top: 30px;
        }

        .testimonial-dots {
            display: flex;
            gap: 10px;
        }

        .testimonial-dots .dot {
            width: 12px;
            height: 12px;
            border-radius: 50%;
            background: var(--accent);
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .testimonial-dots .dot.active {
            background: var(--primary);
            transform: scale(1.2);
        }

        /* Contact Section */
        .contact {
            background-color: var(--dark);
        }

        .contact-container {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 40px;
        }

        .contact-info {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .contact-item {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .contact-icon {
            font-size: 1.5rem;
            color: var(--primary);
        }

        .contact-form .form-group {
            margin-bottom: 20px;
        }

        .contact-form input,
        .contact-form textarea {
            width: 100%;
            padding: 12px 15px;
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 5px;
            color: var(--light);
            font-size: 1rem;
            transition: all 0.3s ease;
        }

        .contact-form input:focus,
        .contact-form textarea:focus {
            outline: none;
            border-color: var(--primary);
            background: rgba(139, 0, 0, 0.1);
        }

        .contact-form textarea {
            height: 150px;
            resize: none;
        }

        .error {
            color: #ff6b6b;
            font-size: 0.9rem;
            margin-top: 5px;
            display: none;
        }

        /* Modal */
        .modal {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.8);
            z-index: 2000;
            overflow-y: auto;
            padding: 20px;
        }

        .modal-content {
            background: var(--secondary);
            max-width: 800px;
            margin: 50px auto;
            padding: 30px;
            border-radius: 10px;
            position: relative;
            animation: modalFadeIn 0.3s ease;
        }

        .close-modal {
            position: absolute;
            top: 15px;
            right: 15px;
            font-size: 1.5rem;
            color: var(--accent);
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .close-modal:hover {
            color: var(--primary);
            transform: rotate(90deg);
        }

        .modal-header {
            margin-bottom: 20px;
        }

        .modal-body {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 30px;
        }

        .modal-img {
            border-radius: 10px;
            overflow: hidden;
        }

        .modal-img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .modal-details {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .modal-price {
            font-size: 1.8rem;
            color: var(--primary);
            font-weight: 700;
        }

        .modal-meta {
            display: flex;
            gap: 20px;
            margin: 10px 0;
        }

        .modal-meta-item {
            display: flex;
            align-items: center;
            gap: 5px;
            font-size: 0.9rem;
            color: var(--accent);
        }

        /* Animations */
        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        @keyframes fadeInDown {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes bounce {

            0%,
            20%,
            50%,
            80%,
            100% {
                transform: translateY(0) translateX(-50%);
            }

            40% {
                transform: translateY(-20px) translateX(-50%);
            }

            60% {
                transform: translateY(-10px) translateX(-50%);
            }
        }

        @keyframes modalFadeIn {
            from {
                opacity: 0;
                transform: translateY(-50px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Responsive Styles */
        @media (max-width: 992px) {
            .services-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .features-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .contact-container {
                grid-template-columns: 1fr;
            }

            .modal-body {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 768px) {
            h1 {
                font-size: 2.5rem;
            }

            h2 {
                font-size: 2rem;
            }

            nav ul {
                position: fixed;
                top: 0;
                right: -100%;
                width: 80%;
                max-width: 300px;
                height: 100vh;
                background: var(--secondary);
                flex-direction: column;
                align-items: center;
                justify-content: center;
                transition: all 0.5s ease;
                z-index: 1000;
                box-shadow: -5px 0 15px rgba(0, 0, 0, 0.3);
            }

            nav ul.active {
                right: 0;
            }

            nav ul li {
                margin: 15px 0;
            }

            .mobile-menu-btn {
                display: block;
                z-index: 1001;
            }

            .close-mobile-menu {
                position: absolute;
                top: 20px;
                right: 20px;
                font-size: 1.5rem;
                color: var(--light);
                cursor: pointer;
            }

            .hero-btns {
                flex-direction: column;
                align-items: center;
            }

            .hero-btns .btn {
                width: 80%;
                margin-bottom: 15px;
            }
        }

        @media (max-width: 576px) {
            .services-grid {
                grid-template-columns: 1fr;
            }

            .features-grid {
                grid-template-columns: 1fr;
            }

            section {
                padding: 60px 0;
            }
        }
    </style>
</head>

<script>
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
</script>

<body>
    <!-- Hero Section -->
    <section class="hero" id="home">
        <div class="container">
            <div class="hero-content" data-aos="fade-up">
                <h1>Unleash Your Potential</h1>
                <p>Join INVIGOR FITNESS STUDIO Gym and transform your body with our state-of-the-art facilities, expert trainers, and personalized workout programs designed to help you achieve your fitness goals.</p>
                <div class="hero-btns">
                    <a href="<?php echo HTTP_PATH . "/index.php"; ?>" class="btn">Start Your Journey Today</a>
                    <a href="#services" class="btn btn-secondary">Explore Services</a>
                </div>
            </div>
            <div class="scroll-down" id="scrollDown">
                <i class="fas fa-chevron-down"></i>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section class="services" id="services">
        <div class="container">
            <h2 data-aos="fade-up">Our Services</h2>
            <div class="services-grid">
                <?php
                $sel = $conn->prepare("SELECT * FROM `service`");
                $sel->execute();
                $sel = $sel->fetchAll();

                foreach ($sel as $r) { ?>
                    <div class="service-card" data-id="<?php echo $r["service_id"]; ?>" data-aos="fade-up" data-aos-delay="100">
                        <div class="service-img">
                            <img src="<?php echo HTTP_PATH . "/img/services/" . $r["img"]; ?>" alt="<?php echo $r["img"]; ?>">
                        </div>
                        <div class="service-content">
                            <span class="service-category"><?php echo $r["category"]; ?></span>
                            <h3><?php echo $r["name"]; ?></h3>
                            <p><?php echo $r["description"]; ?></p>
                            <div class="service-meta">
                                <span><i class="far fa-clock"></i> <?php echo $r["duration"]; ?></span>
                                <span><i class="far fa-calendar-alt"></i> Mon-Fri</span>
                            </div>
                            <div class="service-price ">
                                &#8377; <?php echo $r["price"]; ?>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="features" id="features">
        <div class="container">
            <h2 data-aos="fade-up">Why Choose INVIGOR FITNESS STUDIO</h2>
            <div class="features-grid">
                <div class="feature-item" data-aos="fade-up" data-aos-delay="100">
                    <div class="feature-icon">
                        <i class="fas fa-dumbbell"></i>
                    </div>
                    <h3>Top Equipment</h3>
                    <p>State-of-the-art fitness equipment from leading brands to ensure you have the best tools for your workout.</p>
                </div>
                <div class="feature-item" data-aos="fade-up" data-aos-delay="200">
                    <div class="feature-icon">
                        <i class="fas fa-user-tie"></i>
                    </div>
                    <h3>Expert Trainers</h3>
                    <p>Our certified trainers have years of experience and are dedicated to helping you achieve your fitness goals.</p>
                </div>
                <div class="feature-item" data-aos="fade-up" data-aos-delay="300">
                    <div class="feature-icon">
                        <i class="fas fa-heartbeat"></i>
                    </div>
                    <h3>Health Focus</h3>
                    <p>We prioritize your health and well-being with personalized programs and nutritional guidance.</p>
                </div>
                <div class="feature-item" data-aos="fade-up" data-aos-delay="100">
                    <div class="feature-icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <h3>Community</h3>
                    <p>Join a supportive community of like-minded individuals who motivate and inspire each other.</p>
                </div>
                <div class="feature-item" data-aos="fade-up" data-aos-delay="200">
                    <div class="feature-icon">
                        <i class="fas fa-calendar-alt"></i>
                    </div>
                    <h3>Flexible Hours</h3>
                    <p>Open 24/7 to fit your schedule, no matter how busy you are.</p>
                </div>
                <div class="feature-item" data-aos="fade-up" data-aos-delay="300">
                    <div class="feature-icon">
                        <i class="fas fa-trophy"></i>
                    </div>
                    <h3>Proven Results</h3>
                    <p>Thousands of success stories from members who transformed their bodies and lives with us.</p>
                </div>
            </div>
        </div>
    </section>



    <!-- Contact Section -->
    <section class="contact" id="contact">
        <div class="container">
            <h2 data-aos="fade-up">Get In Touch</h2>
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

            <div class="contact-container" data-aos="fade-up">
                <div class="contact-info">
                    <h3>Contact Information</h3>
                    <div class="contact-item">
                        <div class="contact-icon">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <div>
                            <h4>Address</h4>
                            <p>Nr.Shell petrol pump, f.f 109m Fortune Business hub, science city road, Ahmedabad, Gujarat - 380060</p>
                        </div>
                    </div>
                    <div class="contact-item">
                        <div class="contact-icon">
                            <i class="fas fa-phone-alt"></i>
                        </div>
                        <div>
                            <h4>Phone</h4>
                            <p>+91 98765 43210</p>
                        </div>
                    </div>
                    <div class="contact-item">
                        <div class="contact-icon">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <div>
                            <h4>Email</h4>
                            <p>Support.gymcenter@gmail.com</p>
                        </div>
                    </div>
                    <div class="contact-item">
                        <div class="contact-icon">
                            <i class="fas fa-clock"></i>
                        </div>
                        <div>
                            <h4>Hours</h4>
                            <p>Monday - Friday: 5:00 AM - 11:00 PM<br>
                                Saturday - Sunday: 7:00 AM - 9:00 PM</p>
                        </div>
                    </div>
                </div>
                <div class="contact-form">
                    <h3>Send Us a Message</h3>
                    <form action="<?php echo HTTP_PATH . "/user_panel/contact/sendMsg.php"; ?>" method="post" id="contactForm">
                        <div class="form-group">
                            <input type="text" id="name" name="name" placeholder="Your Name" required>
                            <div class="error" id="nameError">Please enter your name</div>
                        </div>
                        <div class="form-group">
                            <input type="email" id="email" name="email" placeholder="Your Email" required>
                            <div class="error" id="emailError">Please enter a valid email</div>
                        </div>
                        <div class="form-group">
                            <input type="tel" id="phone" name="phone" placeholder="Your Phone (optional)">
                        </div>
                        <div class="form-group">
                            <textarea id="message" name="message" placeholder="Your Message" required></textarea>
                            <div class="error" id="messageError">Please enter your message</div>
                        </div>
                        <button type="submit" class="btn">Send Message</button>
                    </form>
                </div>
            </div>
        </div>
    </section>


    <!-- Service Modals -->
    <?php
    $sel = $conn->prepare("SELECT * FROM `service`");
    $sel->execute();
    $sel = $sel->fetchAll();

    foreach ($sel as $r) { ?>
        <div class="modal <?php echo $r["service_id"]; ?>">
            <div class="modal-content">
                <span class="close-modal">&times;</span>
                <div class="modal-header">
                    <h2><?php echo $r["name"]; ?></h2>
                </div>
                <div class="modal-body">
                    <div class="modal-img">
                        <img src="<?php echo HTTP_PATH . "/img/services/" . $r["img"]; ?>" alt="<?php echo $r["name"]; ?>">
                    </div>
                    <div class="modal-details">
                        <p><?php echo $r["description"]; ?></p>
                        <div class="modal-price">&#8377;<?php echo $r["price"]; ?> <span>per session</span></div>
                        <div class="modal-meta">
                            <div class="modal-meta-item">
                                <i class="far fa-clock"></i>
                                <span><?php echo $r["duration"]; ?></span>
                            </div>
                            <div class="modal-meta-item">
                                <i class="fas fa-calendar-alt"></i>
                                <span>Mon-Fri</span>
                            </div>
                            <div class="modal-meta-item">
                                <i class="fas fa-tag"></i>
                                <span><?php echo ($r["availability"]) ? "Available" : "Not Available"; ?></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>

    <?php include(DRIVE_PATH . "/user_panel/footer/footer.php"); ?>

    <!-- Scripts -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        $(document).ready(function() {
            // Initialize AOS animation
            AOS.init({
                duration: 800,
                easing: 'ease-in-out',
                once: true
            });

            // Smooth scrolling for anchor links
            $('a[href*="#"]').on('click', function(e) {
                e.preventDefault();

                $('html, body').animate({
                        scrollTop: $($(this).attr('href')).offset().top - 80,
                    },
                    500,
                    'linear'
                );
            });

            // Scroll down button
            $('#scrollDown').click(function() {
                $('html, body').animate({
                    scrollTop: $('#services').offset().top - 80
                }, 800);
            });

            // Testimonial slider
            let currentSlide = 0;
            const testimonials = $('.testimonial');
            const dots = $('.testimonial-dots .dot');

            function showSlide(index) {
                testimonials.removeClass('active');
                dots.removeClass('active');

                $(testimonials[index]).addClass('active');
                $(dots[index]).addClass('active');
                currentSlide = index;
            }

            dots.click(function() {
                const slideIndex = $(this).data('slide');
                showSlide(slideIndex);
            });

            // Auto-rotate testimonials
            setInterval(function() {
                let nextSlide = (currentSlide + 1) % testimonials.length;
                showSlide(nextSlide);
            }, 5000);

            // Service modal functionality
            $('.btn-service-details, .service-link').click(function(e) {
                e.preventDefault();
                const serviceId = $(this).data('service');
                $(`#serviceModal${serviceId}`).fadeIn();
                $('body').css('overflow', 'hidden');
            });

            $('.close-modal').click(function() {
                $(this).closest('.modal').fadeOut();
                $('body').css('overflow', 'auto');
            });

            $(window).click(function(e) {
                if ($(e.target).hasClass('modal')) {
                    $('.modal').fadeOut();
                    $('body').css('overflow', 'auto');
                }
            });

            $(".service-card").click(function() {
                $(`.${$(this).data("id")}`).show();
            });
        });
    </script>
</body>

</html>