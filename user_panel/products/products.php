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
    <title>IronForce Gym | Premium Protein Supplements</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        :root {
            --primary: #121212;
            --secondary: #1e1e1e;
            --accent: #f8c537;
            --accent-dark: #d9a82a;
            --text: #ffffff;
            --text-secondary: #b0b0b0;
            --neon: #00f0ff;
            --success: #28a745;
            --radius: 8px;
            --shadow: 0 10px 20px rgba(0, 0, 0, 0.3);
            --transition: all 0.3s ease;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: var(--primary);
            color: var(--text) !;
            line-height: 1.6;
        }

        .container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 20px;
        }

        /* Header & Hero Section */
        .header-img {
            background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)),
                url('https://images.unsplash.com/photo-1571019613454-1cb2f99b2d8b?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80') no-repeat center center/cover;
            height: 500px;
            display: flex;
            align-items: center;
            text-align: center;
            position: relative;
        }

        h1 {
            color: white;
        }

        /* Filters Section */
        .filters {
            background-color: var(--secondary);
            padding: 20px 0;
            position: sticky;
            top: 0;
            z-index: 100;
            box-shadow: var(--shadow);
        }

        .filter-container {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
            align-items: center;
        }

        .filter-group {
            display: flex;
            align-items: center;
        }

        .filter-group h3 {
            margin-right: 10px;
            font-size: 0.9rem;
            color: var(--text-secondary);
            font-weight: 500;
        }

        select,
        .price-range {
            padding: 8px 15px;
            border-radius: var(--radius);
            border: 1px solid #333;
            background-color: var(--primary);
            color: var(--text);
            cursor: pointer;
            transition: var(--transition);
        }

        select:hover,
        select:focus {
            border-color: var(--accent);
            outline: none;
        }

        .price-range {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .price-range input {
            width: 80px;
            padding: 8px;
            background-color: var(--primary);
            border: 1px solid #333;
            color: var(--text);
            border-radius: var(--radius);
        }

        .reset-filters {
            margin-left: auto;
            background: none;
            border: none;
            color: var(--text-secondary);
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 5px;
            transition: var(--transition);
        }

        .reset-filters:hover {
            color: var(--accent);
        }

        /* Products Grid */
        .products-section {
            padding: 60px 0;
        }

        .section-title {
            text-align: center;
            margin-bottom: 40px;
        }

        .section-title h2 {
            font-size: 2rem;
            position: relative;
            display: inline-block;
        }

        .section-title h2:after {
            content: '';
            position: absolute;
            width: 50px;
            height: 3px;
            background-color: var(--accent);
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
        }

        .products-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 30px;
        }

        .product-card {
            background-color: var(--secondary);
            border-radius: var(--radius);
            overflow: hidden;
            transition: var(--transition);
            box-shadow: var(--shadow);
            position: relative;
        }

        .product-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.4);
        }

        .product-badge {
            position: absolute;
            top: 15px;
            left: 15px;
            background-color: var(--neon);
            color: var(--primary);
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 0.7rem;
            font-weight: 600;
            text-transform: uppercase;
            z-index: 2;
        }

        .product-image {
            height: 250px;
            overflow: hidden;
            position: relative;
        }

        .product-image img {
            display: block;
            height: 100%;
            transition: var(--transition);
            margin: auto;
        }

        .product-card:hover .product-image img {
            transform: scale(1.05);
        }

        .product-info {
            padding: 20px;
        }

        .product-category {
            color: var(--accent);
            font-size: 0.8rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 5px;
        }

        .product-title {
            color: white;
            font-size: 1.2rem;
            margin-bottom: 10px;
            font-weight: 600;
        }

        .product-description {
            color: var(--text-secondary);
            font-size: 0.9rem;
            margin-bottom: 15px;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .product-specs {
            color: white;
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-bottom: 15px;
        }

        .spec-item {
            background-color: rgba(255, 255, 255, 0.1);
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 0.8rem;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .spec-item i {
            color: var(--accent);
            font-size: 0.7rem;
        }

        .product-price {
            font-size: 1.5rem;
            font-weight: 700;
            margin: 15px 0;
            color: var(--accent);
        }

        .product-actions {
            display: flex;
            gap: 10px;
        }

        .btn {
            padding: 10px 20px;
            border-radius: var(--radius);
            border: none;
            font-weight: 600;
            cursor: pointer;
            transition: var(--transition);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        .btn-primary {
            background-color: var(--accent);
            color: var(--primary);
            flex: 1;
        }

        .btn-primary:hover {
            background-color: var(--accent-dark);
        }

        .btn-secondary {
            background-color: transparent;
            color: var(--text);
            border: 1px solid var(--text-secondary);
        }

        .btn-secondary:hover {
            border-color: var(--accent);
            color: var(--accent);
        }

        /* Responsive Styles */
        @media (max-width: 992px) {
            .hero-content h1 {
                font-size: 2.8rem;
            }
        }

        @media (max-width: 768px) {
            .hero-content h1 {
                font-size: 2.2rem;
            }

            .hero-content p {
                font-size: 1rem;
            }

            .filter-container {
                flex-direction: column;
                align-items: flex-start;
            }

            .reset-filters {
                margin-left: 0;
                margin-top: 10px;
            }

            .products-grid {
                grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            }

            .badges-container {
                gap: 20px;
            }
        }

        @media (max-width: 576px) {
            .hero-content h1 {
                font-size: 1.8rem;
            }

            .products-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body>
    <!-- Header & Hero Section -->
    <div class="header-img">
        <div class="container">
            <div class="hero-content">
                <h1>Fuel Your <span>Gains</span></h1>
                <p>High-Quality Protein Supplements for Maximum Performance</p>
            </div>
        </div>
        <div class="scroll-down">
            <i class="fas fa-chevron-down"></i>
        </div>
    </div>

    <!-- Filters Section -->
    <section class="filters">
        <div class="container">
            <div class="filter-container">
                <div class="filter-group">
                    <h3>Protein Type: </h3>
                    <select id="category">
                        <option value="all">All Types</option>
                        <?php
                        include(DRIVE_PATH . "../database.php");

                        $sel = $conn->prepare("SELECT * FROM `products` GROUP BY `category`");
                        $sel->execute();
                        $sel = $sel->fetchAll();

                        foreach ($sel as $r) { ?>
                            <option value="<?php echo $r["category"]; ?>"><?php echo $r["category"]; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="filter-group">
                    <h3>Flavor: </h3>
                    <select id="flavor">
                        <option value="all">All Flavors</option>
                        <?php
                        $sel = $conn->prepare("SELECT * FROM `products` GROUP BY `flavor`");
                        $sel->execute();
                        $sel = $sel->fetchAll();
    
                        foreach ($sel as $r) { ?>
                            <option value="<?php echo $r["flavor"]; ?>"><?php echo $r["flavor"]; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <button class="reset-filters">
                    <i class="fas fa-sync-alt"></i>
                    Reset
                </button>
            </div>
        </div>
    </section>

    <!-- Products Section -->
    <section class="products-section" id="products">
        <div class="container">
            <div class="section-title">
                <h2>What We Provide at Gym</h2>
            </div>
            <div class="products-grid">

                <?php
                $sel = $conn->prepare("SELECT * FROM `products`");
                $sel->execute();
                $sel = $sel->fetchAll();

                foreach ($sel as $r) { ?>
                    <div class="product-card <?php echo $r["category"]; ?> <?php echo $r["flavor"]; ?>">
                        <?php echo ($r["badge"]) ? "<div class='product-badge'>" . $r["badge"] . "</div>" : ""; ?>
                        <div class="product-image">
                            <img src="<?php echo HTTP_PATH . "/img/products/" . $r["img"]; ?>" alt="<?php echo $r["name"]; ?>">
                        </div>
                        <div class="product-info">
                            <p class="product-category"><?php echo $r["category"]; ?></p>
                            <h3 class="product-title"><?php echo $r["name"]; ?></h3>
                            <p class="product-description"><?php echo $r["description"]; ?></p>
                            <div class="product-specs">
                                <div class="spec-item">
                                    <i class="fas fa-weight"></i>
                                    <?php echo $r["size"]; ?>
                                </div>
                                <div class="spec-item">
                                    <i class="fas fa-bolt"></i>
                                    <?php echo $r["protein"]; ?>
                                </div>
                                <div class="spec-item">
                                    <i class="fas fa-dna"></i>
                                    <?php echo $r["bcaa"]; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </section>

    <?php include(DRIVE_PATH . "/user_panel/footer/footer.php"); ?>
    <script>
        $(document).ready(function() {

            // Filter functionality
            function filterProducts() {
                const category = $('#category').val();
                const flavor = $('#flavor').val();

                $(".product-card").hide();
                $(`.${category}`).show();
                $(`.${flavor}`).show();

                (category=="all" && flavor=="all")?$(".product-card").show():"";
            }

            // Event listeners for filters
            $('#category, #flavor').change(filterProducts);

            // Reset filters
            $('.reset-filters').click(function() {
                $('#category, #flavor').val('all');
                filterProducts();
            });

            // Scroll to products
            $('.scroll-down').click(function() {
                $('html, body').animate({
                    scrollTop: $('#products').offset().top - 20
                }, 800);
            });
        });
    </script>
</body>

</html>