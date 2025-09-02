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
    <title>FitFuel - Fitness Blog</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #f36100;
            --secondary: orange;
            --dark: #292F36;
            --light: #F7FFF7;
            --accent: #FF9F1C;
            --gray: #6C757D;
            --dark-bg: #1A1E23;
            --card-bg: #2D3439;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Open Sans', sans-serif;
            background-color: var(--dark-bg);
            color: var(--light);
            line-height: 1.6;
        }

        h1,
        h2,
        h3,
        h4 {
            color: white;
            font-family: 'Poppins', sans-serif;
            font-weight: 600;
        }

        /* Hero Section */
        .hero {
            background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)),
                url('https://images.unsplash.com/photo-1571019613454-1cb2f99b2d8b?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80') no-repeat center center/cover;
            height: 90vh;
            display: flex;
            align-items: center;
            text-align: center;
            color: var(--light);
            position: relative;
            animation: fadeIn 1s ease;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        .hero-content {
            max-width: 800px;
            margin: 0 auto;
            padding: 0 20px;
            transform: translateY(20px);
            opacity: 0;
            animation: slideUp 1s ease 0.3s forwards;
        }

        @keyframes slideUp {
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        .hero h1 {
            font-size: 3.2rem;
            margin-bottom: 1.5rem;
            line-height: 1.2;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
        }

        .hero p {
            font-size: 1.2rem;
            margin-bottom: 2.5rem;
            opacity: 0.9;
        }

        .btn {
            display: inline-block;
            background-color: var(--primary);
            color: var(--light);
            padding: 0.9rem 2rem;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s;
            border: none;
            cursor: pointer;
            font-size: 1rem;
            box-shadow: 0 4px 15px rgba(255, 107, 107, 0.3);
            position: relative;
            overflow: hidden;
        }

        .btn:hover {
            background-color: var(--accent);
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(255, 159, 28, 0.4);
        }

        .btn:active {
            transform: translateY(1px);
        }

        .btn::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(45deg, transparent 50%, rgba(255, 255, 255, 0.1) 50%);
            background-size: 300% 300%;
            transition: background-position 0.5s;
            mix-blend-mode: overlay;
        }

        .btn:hover::after {
            background-position: 100% 100%;
        }

        /* Featured Blog */
        .featured-blog {
            padding: 5rem 0 3rem;
            background-color: var(--dark-bg);
        }

        .section-title {
            text-align: center;
            margin-bottom: 3.5rem;
            position: relative;
        }

        .section-title h2 {
            font-size: 2.5rem;
            color: var(--light);
            display: inline-block;
            position: relative;
        }

        .section-title h2::after {
            content: '';
            display: block;
            width: 80px;
            height: 4px;
            background: linear-gradient(90deg, var(--primary), var(--secondary));
            margin: 1rem auto 0;
            border-radius: 2px;
        }

        .featured-card {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 2rem;
            background-color: var(--card-bg);
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            transition: transform 0.4s, box-shadow 0.4s;
        }

        .featured-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.3);
        }

        .featured-img {
            height: 100%;
            overflow: hidden;
            position: relative;
        }

        .featured-img::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, rgba(255, 107, 107, 0.2) 0%, rgba(78, 205, 196, 0.2) 100%);
            z-index: 1;
        }

        .featured-img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.8s;
        }

        .featured-card:hover .featured-img img {
            transform: scale(1.1);
        }

        .featured-content {
            padding: 2.5rem;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .featured-content .category {
            display: inline-block;
            background: linear-gradient(90deg, var(--primary), var(--accent));
            color: var(--light);
            padding: 0.4rem 1rem;
            border-radius: 50px;
            font-size: 0.85rem;
            font-weight: 600;
            margin-bottom: 1.2rem;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .featured-content h3 {
            font-size: 1.9rem;
            margin-bottom: 1.2rem;
            color: var(--light);
            line-height: 1.3;
        }

        .featured-content p {
            margin-bottom: 1.8rem;
            color: rgba(255, 255, 255, 0.8);
            font-size: 1rem;
        }

        .meta {
            display: flex;
            align-items: center;
            margin-bottom: 2rem;
        }

        .meta img {
            width: 45px;
            height: 45px;
            border-radius: 50%;
            margin-right: 1.2rem;
            border: 2px solid var(--primary);
            object-fit: cover;
        }

        .meta-info span {
            display: block;
            font-size: 0.9rem;
        }

        .meta-info .author {
            font-weight: 600;
            color: var(--light);
        }

        .meta-info .date {
            color: rgba(255, 255, 255, 0.6);
            font-size: 0.85rem;
        }

        /* Blog Listings */
        .blog-listings {
            padding: 4rem 0;
            background-color: var(--dark-bg);
        }

        .filters {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2.5rem;
            flex-wrap: wrap;
            gap: 1.5rem;
        }

        .search-box {
            position: relative;
            flex: 1;
            min-width: 250px;
            max-width: 450px;
        }

        .search-box input {
            width: 100%;
            padding: 0.9rem 1.5rem 0.9rem 3.5rem;
            border: 2px solid rgba(255, 255, 255, 0.1);
            border-radius: 50px;
            font-size: 1rem;
            transition: all 0.3s;
            background-color: var(--card-bg);
            color: var(--light);
        }

        .search-box input:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 4px rgba(255, 107, 107, 0.2);
        }

        .search-box i {
            position: absolute;
            left: 1.5rem;
            top: 50%;
            transform: translateY(-50%);
            color: var(--gray);
            font-size: 1.1rem;
        }

        .category-filter {
            position: relative;
        }

        .category-filter select {
            padding: 0.9rem 1.5rem;
            border: 2px solid rgba(255, 255, 255, 0.1);
            border-radius: 50px;
            font-size: 1rem;
            background-color: var(--card-bg);
            cursor: pointer;
            color: var(--light);
            appearance: none;
            padding-right: 3rem;
            transition: all 0.3s;
        }

        .category-filter select:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 4px rgba(255, 107, 107, 0.2);
        }

        .category-filter::after {
            content: '\f078';
            font-family: 'Font Awesome 6 Free';
            font-weight: 900;
            position: absolute;
            top: 50%;
            right: 1.5rem;
            transform: translateY(-50%);
            color: var(--gray);
            pointer-events: none;
        }

        .blogs-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
            gap: 2rem;
            margin-bottom: 3rem;
        }

        .blog-card {
            background-color: var(--card-bg);
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
            transition: all 0.4s;
            position: relative;
        }

        .blog-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.25);
        }

        .blog-img {
            height: 220px;
            overflow: hidden;
            position: relative;
        }

        .blog-img::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, rgba(255, 107, 107, 0.1) 0%, rgba(78, 205, 196, 0.1) 100%);
            z-index: 1;
        }

        .blog-img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.8s;
        }

        .blog-card:hover .blog-img img {
            transform: scale(1.1);
        }

        .blog-content {
            padding: 1.8rem;
        }

        .blog-content .category {
            display: inline-block;
            background-color: var(--secondary);
            color: var(--dark);
            padding: 0.4rem 1rem;
            border-radius: 50px;
            font-size: 0.8rem;
            font-weight: 700;
            margin-bottom: 1.2rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .blog-content h3 {
            font-size: 1.4rem;
            margin-bottom: 1rem;
            color: var(--light);
            line-height: 1.4;
        }

        .blog-content p {
            margin-bottom: 1.5rem;
            color: rgba(255, 255, 255, 0.7);
            font-size: 0.95rem;
            line-height: 1.6;
        }

        .blog-content .btn {
            padding: 0.7rem 1.5rem;
            font-size: 0.9rem;
            width: fit-content;
        }

        /* Pagination */
        .pagination {
            display: flex;
            justify-content: center;
            gap: 1.2rem;
            margin-top: 4rem;
        }

        .pagination button {
            padding: 0.9rem 1.8rem;
            background-color: var(--card-bg);
            color: var(--light);
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.3s;
            font-weight: 600;
            font-size: 1rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .pagination button:hover:not(:disabled) {
            background-color: var(--primary);
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(255, 107, 107, 0.3);
        }

        .pagination button:disabled {
            opacity: 0.5;
            cursor: not-allowed;
            background-color: var(--card-bg);
        }

        /* Sidebar */
        .sidebar {
            background-color: var(--card-bg);
            padding: 2.2rem;
            border-radius: 12px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
            margin-bottom: 2rem;
        }

        .sidebar-title {
            font-size: 1.5rem;
            margin-bottom: 1.8rem;
            padding-bottom: 1rem;
            border-bottom: 2px solid rgba(255, 255, 255, 0.1);
            color: var(--light);
            position: relative;
        }

        .sidebar-title::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 60px;
            height: 2px;
            background: linear-gradient(90deg, var(--primary), var(--secondary));
        }

        .recent-posts .post {
            display: flex;
            margin-bottom: 1.5rem;
            padding-bottom: 1.5rem;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            transition: all 0.3s;
        }

        .recent-posts .post:hover {
            transform: translateX(5px);
        }

        .recent-posts .post:last-child {
            margin-bottom: 0;
            padding-bottom: 0;
            border-bottom: none;
        }

        .recent-posts .post-img {
            width: 90px;
            height: 90px;
            border-radius: 8px;
            overflow: hidden;
            margin-right: 1.2rem;
            flex-shrink: 0;
        }

        .recent-posts .post-img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s;
        }

        .recent-posts .post:hover .post-img img {
            transform: scale(1.1);
        }

        .recent-posts .post-content h4 {
            font-size: 1.05rem;
            margin-bottom: 0.6rem;
            color: var(--light);
        }

        .recent-posts .post-content .date {
            font-size: 0.85rem;
            color: rgba(255, 255, 255, 0.6);
        }

        .newsletter-form {
            margin-top: 2.5rem;
        }

        .newsletter-form input {
            width: 100%;
            padding: 0.9rem 1.2rem;
            margin-bottom: 1.2rem;
            border: 2px solid rgba(255, 255, 255, 0.1);
            border-radius: 8px;
            font-size: 1rem;
            background-color: rgba(255, 255, 255, 0.05);
            color: var(--light);
            transition: all 0.3s;
        }

        .newsletter-form input:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 4px rgba(255, 107, 107, 0.2);
        }

        .newsletter-form .btn {
            width: 100%;
            padding: 0.9rem;
            font-size: 1rem;
        }

        /* Loading Spinner */
        .loading-spinner {
            display: none;
            text-align: center;
            padding: 3rem 0;
        }

        .spinner {
            width: 60px;
            height: 60px;
            border: 5px solid rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            border-top-color: var(--primary);
            animation: spin 1s linear infinite;
            margin: 0 auto 1.5rem;
        }

        .loading-spinner p {
            color: rgba(255, 255, 255, 0.8);
            font-size: 1.1rem;
        }

        /* Animations */
        @keyframes spin {
            to {
                transform: rotate(360deg);
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

        /* Responsive Design */
        @media (max-width: 1200px) {
            .hero h1 {
                font-size: 2.8rem;
            }
        }

        @media (max-width: 992px) {
            .featured-card {
                grid-template-columns: 1fr;
            }

            .featured-img {
                height: 350px;
            }

            .hero h1 {
                font-size: 2.5rem;
            }
        }

        @media (max-width: 768px) {
            .mobile-menu-btn {
                display: block;
            }

            .nav-links {
                position: fixed;
                top: 80px;
                left: -100%;
                width: 100%;
                height: calc(100vh - 80px);
                background-color: var(--dark-bg);
                flex-direction: column;
                align-items: center;
                padding: 3rem 0;
                transition: left 0.4s ease;
                backdrop-filter: blur(10px);
            }

            .nav-links.active {
                left: 0;
            }

            .nav-links li {
                margin: 1.2rem 0;
            }

            .nav-links a {
                font-size: 1.2rem;
            }

            .filters {
                flex-direction: column;
                align-items: stretch;
            }

            .search-box {
                max-width: 100%;
            }

            .category-filter {
                width: 100%;
            }

            .hero {
                height: 60vh;
            }

            .hero h1 {
                font-size: 2.2rem;
            }

            .hero p {
                font-size: 1.1rem;
            }

            .section-title h2 {
                font-size: 2rem;
            }
        }

        @media (max-width: 576px) {
            .hero {
                height: 70vh;
            }

            .hero h1 {
                font-size: 2rem;
            }

            .pagination {
                flex-direction: column;
                align-items: center;
            }

            .pagination button {
                width: 100%;
                justify-content: center;
            }

            .featured-content {
                padding: 1.8rem;
            }

            .featured-content h3 {
                font-size: 1.6rem;
            }

            .recent-posts .post {
                flex-direction: column;
            }

            .recent-posts .post-img {
                width: 100%;
                height: 150px;
                margin-right: 0;
                margin-bottom: 1rem;
            }
        }
    </style>
</head>

<body>
    <div class="blog-container">
        <section class="hero">
            <div class="hero-content">
                <h1>Fuel Your Fitness Journey With Expert Guidance</h1>
                <p>Discover the latest workout routines, nutrition tips, and fitness strategies to transform your body and mind</p>
                <a href="#" class="btn">Explore Articles</a>
            </div>
        </section>

        <section class="featured-blog">
            <div class="container">
                <div class="section-title">
                    <h2>Featured Post</h2>
                </div>
                <div class="featured-card">
                    <div class="featured-img">
                        <img src="https://images.unsplash.com/photo-1571019614242-c5c5dee9f50b?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80" alt="Featured Blog">
                    </div>
                    <div class="featured-content">
                        <span class="category">Workout</span>
                        <h3>The Science of Muscle Growth: How to Maximize Hypertrophy</h3>
                        <p>Learn the scientific principles behind muscle growth and discover evidence-based strategies to optimize your hypertrophy training for faster results...</p>
                        <div class="meta">
                            <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="Author">
                            <div class="meta-info">
                                <span class="author">Dr. Michael Johnson</span>
                                <span class="date">June 15, 2023</span>
                            </div>
                        </div>
                        <a href="http://localhost/php/IFS/user_panel/blog/blog-details.php?id=1" class="btn">Read More</a>
                    </div>
                </div>
            </div>
        </section>

        <section class="blog-listings">
            <div class="container">
                <div class="filters">
                    <div class="search-box">
                        <i class="fas fa-search"></i>
                        <input type="text" placeholder="Search articles..." id="searchInput">
                    </div>
                    <div class="category-filter">
                        <select id="categoryFilter">
                            <option value="">All Categories</option>
                            <option value="workout">Workout</option>
                            <option value="nutrition">Nutrition</option>
                            <option value="lifestyle">Lifestyle</option>
                            <option value="recovery">Recovery</option>
                        </select>
                    </div>
                </div>

                <div class="loading-spinner" id="loadingSpinner">
                    <div class="spinner"></div>
                    <p>Loading articles...</p>
                </div>

                <div class="blogs-grid" id="blogsContainer">
                    <!-- Blog cards will be inserted here by jQuery -->
                </div>

                <div class="pagination">
                    <button id="prevBtn" disabled>
                        <i class="fas fa-chevron-left"></i> Previous
                    </button>
                    <button id="nextBtn">
                        Next <i class="fas fa-chevron-right"></i>
                    </button>
                </div>
            </div>
        </section>
    </div>

    <?php include(DRIVE_PATH . "/user_panel/footer/footer.php"); ?>

    <script>
        $(document).ready(function() {
            // Mobile menu toggle
            $('.mobile-menu-btn').click(function() {
                $('.nav-links').toggleClass('active');
                $(this).html($(this).html().includes('bars') ?
                    '<i class="fas fa-times"></i>' : '<i class="fas fa-bars"></i>');
            });

            // Close mobile menu when clicking a link
            $('.nav-links a').click(function() {
                $('.nav-links').removeClass('active');
                $('.mobile-menu-btn').html('<i class="fas fa-bars"></i>');
            });

            // Mock API URL (using JSONPlaceholder)
            const API_URL = 'https://jsonplaceholder.typicode.com/posts';
            let currentPage = 1;
            const postsPerPage = 10;
            let allPosts = [];
            let filteredPosts = [];

            // Fetch all posts from API
            function fetchPosts() {
                $('#loadingSpinner').show();
                $('#blogsContainer').hide();

                $.ajax({
                    url: API_URL,
                    method: 'GET',
                    success: function(posts) {
                        // Enhance posts with fitness-related mock data
                        allPosts = posts.map(post => ({
                            ...post,
                            category: getRandomCategory(),
                            excerpt: generateExcerpt(post.body),
                            imageUrl: getRandomImageUrl(),
                            author: getRandomAuthor(),
                            date: getRandomDate(),
                            readingTime: calculateReadingTime(post.body)
                        }));

                        filteredPosts = [...allPosts];
                        renderPosts();
                        $('#loadingSpinner').hide();
                        $('#blogsContainer').fadeIn();
                    },
                    error: function() {
                        $('#loadingSpinner').html('<p class="error">Error loading posts. Please try again later.</p>');
                    }
                });
            }

            // Helper functions for mock data
            function getRandomCategory() {
                const categories = ['workout', 'nutrition', 'lifestyle', 'recovery'];
                return categories[Math.floor(Math.random() * categories.length)];
            }

            function generateExcerpt(body) {
                const sentences = body.split('. ');
                const excerpt = sentences.slice(0, 2).join('. ') + '...';
                return excerpt.charAt(0).toUpperCase() + excerpt.slice(1);
            }

            function getRandomImageUrl() {
                const images = [
                    'https://images.unsplash.com/photo-1538805060514-97d9cc17730c?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA',
                    'https: //images.unsplash.com/photo-1571019613454-1cb2f99b2d8b?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80',
                    'https://images.unsplash.com/photo-1571019614242-c5c5dee9f50b?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80',
                    'https://images.unsplash.com/photo-1579758629938-03607ccdbaba?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80',
                    'https://images.unsplash.com/photo-1545205597-3d9d02c29597?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80',
                    'https://images.unsplash.com/photo-1551632436-cbf8dd35adfa?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1471&q=80'
                ];
                return images[Math.floor(Math.random() * images.length)];
            }

            function getRandomAuthor() {
                const authors = [
                    'Dr. Sarah Johnson',
                    'Mike Roberts',
                    'Emily Wilson',
                    'David Chen',
                    'Jessica Martinez',
                    'James Peterson',
                    'Lisa Wong'
                ];
                return authors[Math.floor(Math.random() * authors.length)];
            }

            function getRandomDate() {
                const start = new Date(2022, 0, 1);
                const end = new Date();
                const randomDate = new Date(start.getTime() + Math.random() * (end.getTime() - start.getTime()));
                return randomDate.toLocaleDateString('en-US', {
                    year: 'numeric',
                    month: 'long',
                    day: 'numeric'
                });
            }

            function calculateReadingTime(text) {
                const wordsPerMinute = 200;
                const wordCount = text.split(/\s+/).length;
                return Math.ceil(wordCount / wordsPerMinute);
            }

            // Render posts based on current page and filters
            function renderPosts() {
                const startIndex = (currentPage - 1) * postsPerPage;
                const endIndex = startIndex + postsPerPage;
                const postsToShow = filteredPosts.slice(startIndex, endIndex);

                $('#blogsContainer').empty();

                if (postsToShow.length === 0) {
                    $('#blogsContainer').html(`
                        <div class="no-results" style="grid-column: 1/-1; text-align: center; padding: 3rem;">
                            <i class="fas fa-search" style="font-size: 3rem; color: var(--gray); margin-bottom: 1.5rem;"></i>
                            <h3 style="color: var(--light); margin-bottom: 1rem;">No articles found</h3>
                            <p style="color: rgba(255,255,255,0.7);">Try adjusting your search or filter criteria</p>
                        </div>`);
                } else {
                    postsToShow.forEach(post => {
                        const blogCard = `
                            <div class="blog-card">
                                <div class="blog-img">
                                    <img src="${post.imageUrl}" alt="${post.title}">
                                </div>
                                <div class="blog-content">
                                    <span class="category ${post.category}">
                                        ${post.category.charAt(0).toUpperCase() + post.category.slice(1)}
                                    </span>
                                    <h3>${post.title}</h3>
                                    <p>${post.excerpt}</p>
                                    <div class="meta">
                                        <img src="https://randomuser.me/api/portraits/${post.id % 2 === 0 ? 'men' : 'women'}/${post.id % 50}.jpg" alt="${post.author}">
                                        <div class="meta-info">
                                            <span class="author">${post.author}</span>
                                            <span class="date">${post.date} • ${post.readingTime} min read</span>
                                        </div>
                                    </div>
                                    <a href="http://localhost/php/IFS/user_panel/blog/blog-details.php?id=${post.id}" class="btn">Read More</a>
                                </div>
                            </div>
                        `;
                        $('#blogsContainer').append(blogCard);
                    });
                }

                // Update pagination buttons
                updatePagination();
            }

            function updatePagination() {
                const startIndex = (currentPage - 1) * postsPerPage;
                const endIndex = startIndex + postsPerPage;

                $('#prevBtn').prop('disabled', currentPage === 1);
                $('#nextBtn').prop('disabled', endIndex >= filteredPosts.length);
            }

            // Pagination handlers
            $('#nextBtn').click(function() {
                currentPage++;
                renderPosts();
                $('html, body').animate({
                    scrollTop: $('.blog-listings').offset().top - 100
                }, 500);
            });

            $('#prevBtn').click(function() {
                currentPage--;
                renderPosts();
                $('html, body').animate({
                    scrollTop: $('.blog-listings').offset().top - 100
                }, 500);
            });

            // Search functionality
            $('#searchInput').on('input', function() {
                const searchTerm = $(this).val().toLowerCase();
                filterPosts(searchTerm);
            });

            // Category filter
            $('#categoryFilter').change(function() {
                const category = $(this).val();
                filterPosts('', category);
            });

            function filterPosts(searchTerm = '', category = '') {
                if (searchTerm || category) {
                    filteredPosts = allPosts.filter(post => {
                        const matchesSearch = searchTerm ?
                            (post.title.toLowerCase().includes(searchTerm)) ||
                            (post.body.toLowerCase().includes(searchTerm)) : true;

                        const matchesCategory = category ?
                            (post.category === category) : true;

                        return matchesSearch && matchesCategory;
                    });
                } else {
                    filteredPosts = [...allPosts];
                }
                currentPage = 1;
                renderPosts();
            }

            // Initial fetch
            fetchPosts();

            // Add animation to blog cards when they come into view
            function animateOnScroll() {
                const blogCards = $('.blog-card');
                const windowHeight = $(window).height();

                blogCards.each(function() {
                    const cardPosition = $(this).offset().top;
                    const scrollPosition = $(window).scrollTop() + windowHeight;

                    if (cardPosition < scrollPosition - 100) {
                        $(this).css({
                            'opacity': '1',
                            'transform': 'translateY(0)'
                        });
                    }
                });
            }

            // Set initial state for animation
            $('.blog-card').css({
                'opacity': '0',
                'transform': 'translateY(30px)',
                'transition': 'all 0.6s ease-out'
            });

            // Run on load and scroll
            $(window).on('load scroll', animateOnScroll);
        });
    </script>
</body>

</html>