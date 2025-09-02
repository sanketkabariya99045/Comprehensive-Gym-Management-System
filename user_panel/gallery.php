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
    <title>Gym Gallery</title>
</head>

<style>
    /* Base Styles */
    :root {
        --primary-color: #121212;
        --secondary-color: #1a1a1a;
        --accent-color: #f36100;
        --accent-secondary: #ff6b00;
        --text-color: #ffffff;
        --text-secondary: #b3b3b3;
        --transition: all 0.3s ease;
    }

    /* Gallery Section */
    .filter-buttons {
        display: flex;
        justify-content: center;
        flex-wrap: wrap;
        gap: 10px;
        margin-bottom: 40px;
    }

    .filter-btn {
        padding: 10px 25px;
        background-color: transparent;
        color: var(--text-color);
        border: 1px solid var(--text-secondary);
        border-radius: 30px;
        cursor: pointer;
        transition: var(--transition);
        font-weight: 600;
        text-transform: uppercase;
        font-size: 0.8rem;
        letter-spacing: 1px;
    }

    .filter-btn:hover,
    .filter-btn.active {
        background-color: var(--accent-color);
        color: var(--primary-color);
        border-color: var(--accent-color);
        box-shadow: 0 0 15px rgba(0, 255, 157, 0.3);
    }

    .gallery-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
        gap: 25px;
        margin-bottom: 50px;
    }

    .gallery-item {
        position: relative;
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        transition: var(--transition);
        aspect-ratio: 1/1;
    }

    .gallery-item:hover {
        transform: translateY(-10px);
        box-shadow: 0px 0px 10px 1px var(--accent-secondary);
    }

    .gallery-item img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
        transition: var(--transition);
    }

    .item-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.7);
        opacity: 0;
        transition: var(--transition);
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .gallery-item:hover .item-overlay {
        opacity: 1;
    }

    .overlay-content {
        text-align: center;
        padding: 20px;
    }

    .overlay-content h3 {
        color: white;
        font-size: 1.5rem;
        margin-bottom: 15px;
    }

    .overlay-content i {
        font-size: 2rem;
        color: var(--accent-color);
        transition: var(--transition);
    }

    .overlay-content i:hover {
        transform: scale(1.2);
    }

    /* Lightbox Styles */
    .lightbox {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.9);
        z-index: 2000;
        display: flex;
        align-items: center;
        justify-content: center;
        opacity: 0;
        visibility: hidden;
        transition: var(--transition);
    }

    .lightbox.show {
        opacity: 1;
        visibility: visible;
    }

    .lightbox-content {
        position: relative;
        max-width: 90%;
        max-height: 90%;
        width: auto;
        height: auto;
    }

    .close-btn {
        position: absolute;
        top: -40px;
        right: 0;
        font-size: 2rem;
        color: var(--text-color);
        cursor: pointer;
        transition: var(--transition);
    }

    .close-btn:hover {
        color: var(--accent-color);
    }

    .lightbox-img {
        max-height: 80vh;
        max-width: 90vw;
        border-radius: 8px;
        box-shadow: 0 0 30px rgba(0, 0, 0, 0.8);
    }

    .lightbox-caption {
        position: absolute;
        bottom: -40px;
        left: 0;
        width: 100%;
        text-align: center;
        color: var(--text-color);
        font-size: 1.2rem;
        padding: 10px 0;
    }

    .lightbox-nav span {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        font-size: 2rem;
        color: var(--text-color);
        cursor: pointer;
        transition: var(--transition);
        padding: 0 20px;
    }

    .lightbox-nav span:hover {
        color: var(--accent-color);
    }

    .prev-btn {
        left: -80px;
    }

    .next-btn {
        right: -80px;
    }

    /* Responsive Styles */
    @media (max-width: 992px) {
        .gallery-grid {
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
        }
    }

    @media (max-width: 768px) {
        .lightbox-nav span {
            position: fixed;
            top: auto;
            bottom: 20px;
        }

        .prev-btn {
            left: 20px;
        }

        .next-btn {
            right: 20px;
        }
    }

    @media (max-width: 576px) {
        .gallery-grid {
            grid-template-columns: 1fr;
        }

        .filter-buttons {
            gap: 5px;
        }

        .filter-btn {
            padding: 8px 15px;
            font-size: 0.7rem;
        }
    }
</style>

<body>

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="<?php echo HTTP_PATH . "/img/breadcrumb-bg.jpg"; ?>">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb-text">
                        <h2>Gallery</h2>
                        <div class="bt-option">
                            <a href="<?php echo HTTP_PATH . "/index.php"; ?>">Home</a>
                            <a href="<?php echo HTTP_PATH . "/index.php"; ?>">Pages</a>
                            <span>Gallery</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->


    <!-- Gallery Section -->
    <section class="gallery-section" id="gallery">

        <div class="container">
            <!-- Filter Buttons -->
            <div class="filter-buttons">
                <button class="filter-btn active" data-filter="all">All</button>
                <button class="filter-btn" data-filter="equipment">Equipment</button>
                <button class="filter-btn" data-filter="facilities">Facilities</button>
                <button class="filter-btn" data-filter="classes">Classes</button>
                <button class="filter-btn" data-filter="athletes">Athletes</button>
            </div>

            <!-- Gallery Grid -->
            <div class="gallery-grid">
                <!-- Equipment Images -->
                <div class="gallery-item equipment" data-category="equipment">
                    <img src="<?php echo HTTP_PATH . "/img/gallery/gallery-1.jpg"; ?>" />
                    <div class="item-overlay">
                        <div class="overlay-content">
                            <h3>Premium Equipment</h3>
                            <i class="fas fa-expand"></i>
                        </div>
                    </div>
                </div>
                <div class="gallery-item equipment" data-category="equipment">
                    <img src="<?php echo HTTP_PATH . "/img/gallery/gallery-2.jpg"; ?>" />
                    <div class="item-overlay">
                        <div class="overlay-content">
                            <h3>Premium Equipment</h3>
                            <i class="fas fa-expand"></i>
                        </div>
                    </div>
                </div>
                <div class="gallery-item equipment" data-category="equipment">
                    <img src="<?php echo HTTP_PATH . "/img/gallery/gallery-3.jpg"; ?>" />
                    <div class="item-overlay">
                        <div class="overlay-content">
                            <h3>Premium Equipment</h3>
                            <i class="fas fa-expand"></i>
                        </div>
                    </div>
                </div>
                <div class="gallery-item equipment" data-category="equipment">
                    <img src="<?php echo HTTP_PATH . "/img/gallery/gallery-4.jpg"; ?>" />
                    <div class="item-overlay">
                        <div class="overlay-content">
                            <h3>Premium Equipment</h3>
                            <i class="fas fa-expand"></i>
                        </div>
                    </div>
                </div>
                <div class="gallery-item equipment" data-category="equipment">
                    <img src="<?php echo HTTP_PATH . "/img/gallery/gallery-5.jpg"; ?>" />
                    <div class="item-overlay">
                        <div class="overlay-content">
                            <h3>Premium Equipment</h3>
                            <i class="fas fa-expand"></i>
                        </div>
                    </div>
                </div>
                <div class="gallery-item equipment" data-category="equipment">
                    <img src="<?php echo HTTP_PATH . "/img/gallery/gallery-6.jpg"; ?>" />
                    <div class="item-overlay">
                        <div class="overlay-content">
                            <h3>Premium Equipment</h3>
                            <i class="fas fa-expand"></i>
                        </div>
                    </div>
                </div>
                <div class="gallery-item equipment" data-category="equipment">
                    <img src="<?php echo HTTP_PATH . "/img/gallery/gallery-7.jpg"; ?>" />
                    <div class="item-overlay">
                        <div class="overlay-content">
                            <h3>Premium Equipment</h3>
                            <i class="fas fa-expand"></i>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        </div>
    </section>

    <!-- Lightbox Modal -->
    <div class="lightbox">
        <div class="lightbox-content">
            <span class="close-btn">&times;</span>
            <img src="" alt="" class="lightbox-img">
            <div class="lightbox-caption"></div>
            <div class="lightbox-nav">
                <span class="prev-btn"><i class="fas fa-chevron-left"></i></span>
                <span class="next-btn"><i class="fas fa-chevron-right"></i></span>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            // Mobile Menu Toggle
            $('.menu-toggle').click(function() {
                $(this).toggleClass('active');
                $('.main-nav').toggleClass('active');
            });

            // Smooth Scrolling for Navigation Links
            $('.nav-link').on('click', function(e) {
                if (this.hash !== '') {
                    e.preventDefault();
                    const hash = this.hash;
                    $('html, body').animate({
                        scrollTop: $(hash).offset().top - 80
                    }, 800);

                    // Close mobile menu if open
                    $('.menu-toggle').removeClass('active');
                    $('.main-nav').removeClass('active');
                }
            });

            // Header Scroll Effect
            $(window).scroll(function() {
                if ($(this).scrollTop() > 100) {
                    $('.header').addClass('scrolled');
                } else {
                    $('.header').removeClass('scrolled');
                }
            });

            // Gallery Filtering
            $('.filter-btn').on('click', function() {
                // Update active button
                $('.filter-btn').removeClass('active');
                $(this).addClass('active');

                const filterValue = $(this).data('filter');

                if (filterValue === 'all') {
                    $('.gallery-item').fadeIn(300);
                } else {
                    $('.gallery-item').each(function() {
                        if ($(this).data('category') === filterValue) {
                            $(this).fadeIn(300);
                        } else {
                            $(this).fadeOut(300);
                        }
                    });
                }
            });

            // Lightbox Functionality
            let currentImageIndex = 0;
            const images = [];
            const captions = [];

            // Prepare lightbox data
            $('.gallery-item').each(function(index) {
                const imgSrc = $(this).find('img').attr('src');
                const caption = $(this).find('h3').text();

                images.push(imgSrc);
                captions.push(caption);

                $(this).on('click', function() {
                    openLightbox(index);
                });
            });

            function openLightbox(index) {
                currentImageIndex = index;
                updateLightbox();
                $('.lightbox').addClass('show');
                $('body').css('overflow', 'hidden');
            }

            function updateLightbox() {
                $('.lightbox-img').attr('src', images[currentImageIndex]);
                $('.lightbox-caption').text(captions[currentImageIndex]);
            }

            $('.close-btn').on('click', function() {
                closeLightbox();
            });

            $('.lightbox').on('click', function(e) {
                if (e.target === this) {
                    closeLightbox();
                }
            });

            $(document).keyup(function(e) {
                if (e.key === "Escape") {
                    closeLightbox();
                } else if (e.key === "ArrowLeft") {
                    navigateLightbox(-1);
                } else if (e.key === "ArrowRight") {
                    navigateLightbox(1);
                }
            });

            function closeLightbox() {
                $('.lightbox').removeClass('show');
                $('body').css('overflow', 'auto');
            }

            function navigateLightbox(direction) {
                currentImageIndex += direction;

                if (currentImageIndex < 0) {
                    currentImageIndex = images.length - 1;
                } else if (currentImageIndex >= images.length) {
                    currentImageIndex = 0;
                }

                updateLightbox();
            }

            $('.prev-btn').on('click', function() {
                navigateLightbox(-1);
            });

            $('.next-btn').on('click', function() {
                navigateLightbox(1);
            });

            // Initialize gallery with all items visible
            $('.gallery-item').fadeIn(300);
        });
    </script>

</body>

</html>

<?php
include(DRIVE_PATH . "/user_panel/footer/footer.php");
?>
</body>

</html>