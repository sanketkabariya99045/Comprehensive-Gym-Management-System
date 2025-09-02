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
    <title>Blog Details | FitLife</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #FF6B6B;
            --secondary: #4ECDC4;
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

        .container {
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        /* Article Hero */
        .article-hero {
            background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)),
                var(--hero-image) no-repeat center center/cover;
            height: 85vh;
            display: flex;
            align-items: flex-end;
            color: var(--light);
            position: relative;
            padding-bottom: 4rem;
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

        .article-hero-content {
            max-width: 900px;
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

        .article-hero .category {
            display: inline-block;
            background: linear-gradient(90deg, var(--primary), var(--accent));
            color: var(--light);
            padding: 0.4rem 1.2rem;
            border-radius: 50px;
            font-size: 0.9rem;
            font-weight: 600;
            margin-bottom: 1.5rem;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .article-hero h1 {
            font-size: 2.8rem;
            margin-bottom: 1.5rem;
            line-height: 1.3;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
        }

        .article-meta {
            display: flex;
            align-items: center;
            margin-bottom: 1.5rem;
        }

        .article-meta img {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            margin-right: 1.2rem;
            border: 2px solid var(--primary);
            object-fit: cover;
        }

        .article-meta-info span {
            display: block;
            font-size: 0.95rem;
        }

        .article-meta-info .author {
            font-weight: 600;
            color: var(--light);
        }

        .article-meta-info .date {
            color: rgba(255, 255, 255, 0.7);
            font-size: 0.9rem;
        }

        .reading-time {
            display: flex;
            align-items: center;
            color: rgba(255, 255, 255, 0.8);
            font-size: 0.95rem;
            gap: 0.5rem;
        }

        /* Blog Content */
        .blog-detail-container {
            padding: 5rem 0;
            background-color: var(--dark-bg);
        }

        .blog-content {
            display: grid;
            grid-template-columns: 1fr 300px;
            gap: 3rem;
        }

        .article-body {
            background-color: var(--card-bg);
            padding: 3rem;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
        }

        .article-body h2 {
            font-size: 1.9rem;
            margin: 2.5rem 0 1.5rem;
            color: var(--light);
            position: relative;
            padding-bottom: 0.8rem;
        }

        .article-body h2::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 60px;
            height: 3px;
            background: linear-gradient(90deg, var(--primary), var(--secondary));
            border-radius: 2px;
        }

        .article-body h3 {
            font-size: 1.5rem;
            margin: 2rem 0 1.2rem;
            color: var(--light);
        }

        .article-body p {
            margin-bottom: 1.5rem;
            color: rgba(255, 255, 255, 0.8);
            font-size: 1.05rem;
            line-height: 1.8;
        }

        .article-body img {
            width: 100%;
            height: auto;
            border-radius: 10px;
            margin: 2rem 0;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2);
            transition: transform 0.5s;
        }

        .article-body img:hover {
            transform: scale(1.02);
        }

        .article-body blockquote {
            border-left: 4px solid var(--primary);
            padding: 1rem 1.5rem;
            margin: 2rem 0;
            font-style: italic;
            color: rgba(255, 255, 255, 0.8);
            background-color: rgba(255, 255, 255, 0.05);
            border-radius: 0 8px 8px 0;
        }

        .article-body ul,
        .article-body ol {
            margin: 1.8rem 0;
            padding-left: 2rem;
        }

        .article-body li {
            margin-bottom: 0.8rem;
            color: rgba(255, 255, 255, 0.8);
            line-height: 1.7;
        }

        /* Table of Contents */
        .toc {
            position: sticky;
            top: 100px;
            align-self: start;
            background-color: var(--card-bg);
            padding: 1.8rem;
            border-radius: 12px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
            max-height: 80vh;
            overflow-y: auto;
        }

        .toc-title {
            font-size: 1.3rem;
            margin-bottom: 1.5rem;
            padding-bottom: 0.8rem;
            border-bottom: 2px solid rgba(255, 255, 255, 0.1);
            color: var(--light);
            position: relative;
        }

        .toc-title::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 50px;
            height: 2px;
            background: linear-gradient(90deg, var(--primary), var(--secondary));
        }

        .toc-links {
            list-style: none;
        }

        .toc-links li {
            margin-bottom: 1rem;
            position: relative;
            padding-left: 1.2rem;
        }

        .toc-links li::before {
            content: '';
            position: absolute;
            left: 0;
            top: 50%;
            transform: translateY(-50%);
            width: 6px;
            height: 6px;
            background-color: var(--primary);
            border-radius: 50%;
        }

        .toc-links a {
            color: rgba(255, 255, 255, 0.7);
            text-decoration: none;
            transition: all 0.3s;
            font-size: 0.95rem;
            display: block;
        }

        .toc-links a:hover {
            color: var(--primary);
            transform: translateX(5px);
        }

        .toc-links .toc-subitem {
            padding-left: 1.5rem;
            margin-top: 0.8rem;
        }

        /* Article Footer */
        .article-footer {
            margin-top: 4rem;
            padding-top: 3rem;
            border-top: 2px solid rgba(255, 255, 255, 0.1);
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 2rem;
        }

        .btn {
            display: inline-block;
            background: linear-gradient(90deg, var(--primary), var(--accent));
            color: var(--light);
            padding: 1rem 2rem;
            border-radius: 50px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s;
            box-shadow: 0 4px 15px rgba(255, 107, 107, 0.3);
            border: none;
            cursor: pointer;
        }

        .btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(255, 107, 107, 0.4);
        }

        .social-share {
            display: flex;
            gap: 1rem;
        }

        .social-share a {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 45px;
            height: 45px;
            background-color: rgba(255, 255, 255, 0.08);
            border-radius: 50%;
            color: var(--light);
            transition: all 0.3s;
            font-size: 1.1rem;
        }

        .social-share a:hover {
            background-color: var(--primary);
            transform: translateY(-3px);
            box-shadow: 0 8px 15px rgba(255, 107, 107, 0.3);
        }

        /* Author Card */
        .author-card {
            display: flex;
            align-items: center;
            background-color: var(--card-bg);
            padding: 2rem;
            border-radius: 12px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
            margin-top: 3rem;
            transition: transform 0.4s;
        }

        .author-card:hover {
            transform: translateY(-5px);
        }

        .author-card img {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            margin-right: 2rem;
            border: 3px solid var(--primary);
            object-fit: cover;
        }

        .author-info h4 {
            font-size: 1.4rem;
            margin-bottom: 0.5rem;
            color: var(--light);
        }

        .author-info p {
            color: rgba(255, 255, 255, 0.7);
            margin-bottom: 1.2rem;
            font-size: 0.95rem;
            line-height: 1.7;
        }

        .author-social a {
            color: rgba(255, 255, 255, 0.6);
            margin-right: 1.2rem;
            transition: color 0.3s;
            font-size: 1.1rem;
        }

        .author-social a:hover {
            color: var(--primary);
        }

        /* Related Posts */
        .related-posts {
            margin-top: 5rem;
        }

        .related-posts h3 {
            font-size: 2rem;
            margin-bottom: 3rem;
            text-align: center;
            color: var(--light);
            position: relative;
            display: inline-block;
            left: 50%;
            transform: translateX(-50%);
        }

        .related-posts h3::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 3px;
            background: linear-gradient(90deg, var(--primary), var(--secondary));
            border-radius: 2px;
        }

        .related-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 2rem;
        }

        .related-card {
            background-color: var(--card-bg);
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
            transition: all 0.4s;
        }

        .related-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.25);
        }

        .related-img {
            height: 200px;
            overflow: hidden;
            position: relative;
        }

        .related-img::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, rgba(255, 107, 107, 0.1) 0%, rgba(78, 205, 196, 0.1) 100%);
            z-index: 1;
        }

        .related-img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.8s;
        }

        .related-card:hover .related-img img {
            transform: scale(1.1);
        }

        .related-content {
            padding: 1.8rem;
        }

        .related-content .category {
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

        .related-content h4 {
            font-size: 1.3rem;
            margin-bottom: 0.8rem;
            color: var(--light);
            line-height: 1.4;
        }

        .related-content .date {
            color: rgba(255, 255, 255, 0.6);
            font-size: 0.9rem;
            display: block;
            margin-bottom: 1.5rem;
        }

        /* Reading Progress */
        .reading-progress {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 5px;
            background-color: rgba(255, 255, 255, 0.1);
            z-index: 1000;
        }

        .reading-progress-bar {
            height: 100%;
            background: linear-gradient(90deg, var(--primary), var(--accent));
            width: 0%;
            transition: width 0.2s;
        }

        /* Back to Top Button */
        .back-to-top {
            position: fixed;
            bottom: 2.5rem;
            right: 2.5rem;
            width: 55px;
            height: 55px;
            background: linear-gradient(135deg, var(--primary), var(--accent));
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s;
            z-index: 999;
            box-shadow: 0 5px 20px rgba(255, 107, 107, 0.3);
        }

        .back-to-top.active {
            opacity: 1;
            visibility: visible;
        }

        .back-to-top:hover {
            transform: translateY(-5px) scale(1.1);
            box-shadow: 0 8px 25px rgba(255, 107, 107, 0.4);
        }

        /* Responsive Design */
        @media (max-width: 1200px) {
            .article-hero h1 {
                font-size: 2.5rem;
            }
        }

        @media (max-width: 992px) {
            .blog-content {
                grid-template-columns: 1fr;
            }

            .toc {
                position: static;
                order: -1;
                margin-bottom: 3rem;
                max-height: none;
            }

            .article-body {
                padding: 2.5rem;
            }
        }

        @media (max-width: 768px) {
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

            .article-hero {
                height: 50vh;
                padding-bottom: 3rem;
            }

            .article-hero h1 {
                font-size: 2.2rem;
            }

            .article-footer {
                flex-direction: column;
                align-items: flex-start;
            }

            .author-card {
                flex-direction: column;
                text-align: center;
            }

            .author-card img {
                margin-right: 0;
                margin-bottom: 1.5rem;
            }

            .back-to-top {
                bottom: 1.5rem;
                right: 1.5rem;
                width: 50px;
                height: 50px;
            }
        }

        @media (max-width: 576px) {
            .article-hero {
                height: 60vh;
            }

            .article-hero h1 {
                font-size: 2rem;
            }

            .article-body {
                padding: 1.8rem;
            }

            .article-body h2 {
                font-size: 1.7rem;
            }

            .article-body h3 {
                font-size: 1.4rem;
            }
        }
    </style>
</head>

<body>
    <!-- Reading Progress Bar -->
    <div class="reading-progress">
        <div class="reading-progress-bar" id="readingProgress"></div>
    </div>

    <!-- Back to Top Button -->
    <div class="back-to-top" id="backToTop">
        <i class="fas fa-arrow-up"></i>
    </div>

    <section class="article-hero" id="articleHero">
        <div class="article-hero-content">
            <span class="category" id="blogCategory">Workout</span>
            <h1 id="blogTitle">The Ultimate Guide to Building Muscle Mass</h1>
            <div class="article-meta">
                <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="Author" id="authorImage">
                <div class="article-meta-info">
                    <span class="author" id="authorName">John Smith</span>
                    <span class="date" id="publishDate">June 15, 2023</span>
                </div>
            </div>
            <div class="reading-time">
                <i class="far fa-clock"></i>
                <span id="readingTime">8 min read</span>
            </div>
        </div>
    </section>

    <div class="blog-detail-container">
        <div class="container">
            <div class="blog-content">
                <div class="article-body" id="articleBody">
                    <h2>Introduction</h2>
                    <p>Building muscle mass is a goal shared by many fitness enthusiasts, but achieving significant results requires more than just lifting weights. This comprehensive guide will walk you through the science-backed strategies to maximize muscle growth and help you achieve your dream physique.</p>

                    <img src="https://images.unsplash.com/photo-1538805060514-97d9cc17730c?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1374&q=80" alt="Muscle Building">

                    <h2>The Science of Muscle Growth</h2>
                    <p>Muscle growth, or hypertrophy, occurs when muscle fibers sustain damage or stress from resistance training. The body repairs these fibers by fusing them together, increasing their mass and size. Three primary mechanisms drive muscle growth:</p>

                    <ul>
                        <li><strong>Mechanical tension:</strong> The force generated by muscle contraction during weight lifting</li>
                        <li><strong>Muscle damage:</strong> Microscopic tears in muscle fibers that occur during exercise</li>
                        <li><strong>Metabolic stress:</strong> The buildup of metabolites like lactate during high-volume training</li>
                    </ul>

                    <h2>Optimal Training for Muscle Growth</h2>
                    <p>To maximize muscle growth, your training program should incorporate the following principles:</p>

                    <h3>1. Progressive Overload</h3>
                    <p>Gradually increase the demands on your musculoskeletal system by adding weight, increasing repetitions, or improving form. Aim for a 2-5% increase in load each week.</p>

                    <h3>2. Volume and Frequency</h3>
                    <p>Research suggests 10-20 sets per muscle group per week is optimal for hypertrophy. Split this volume across 2-3 sessions per week for each muscle group.</p>

                    <img src="https://images.unsplash.com/photo-1571019613454-1cb2f99b2d8b?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80" alt="Workout Routine">

                    <h3>3. Exercise Selection</h3>
                    <p>Focus on compound movements that target multiple muscle groups:</p>
                    <ul>
                        <li>Squats</li>
                        <li>Deadlifts</li>
                        <li>Bench press</li>
                        <li>Pull-ups</li>
                        <li>Overhead press</li>
                    </ul>

                    <p>Supplement these with isolation exercises to target specific muscles:</p>
                    <ul>
                        <li>Bicep curls</li>
                        <li>Tricep extensions</li>
                        <li>Lateral raises</li>
                        <li>Leg curls</li>
                    </ul>

                    <h2>Nutrition for Muscle Growth</h2>
                    <blockquote>
                        "You can't out-train a bad diet. Nutrition is just as important as your workout routine when it comes to building muscle."
                    </blockquote>

                    <h3>1. Caloric Surplus</h3>
                    <p>To build muscle, you need to consume more calories than you burn. Aim for a surplus of 250-500 calories per day to support muscle growth without excessive fat gain.</p>

                    <h3>2. Protein Intake</h3>
                    <p>Protein provides the building blocks for muscle repair and growth. Aim for 0.7-1 gram of protein per pound of body weight daily from sources like:</p>
                    <ul>
                        <li>Chicken breast</li>
                        <li>Lean beef</li>
                        <li>Fish</li>
                        <li>Eggs</li>
                        <li>Dairy products</li>
                        <li>Plant-based proteins (for vegetarians/vegans)</li>
                    </ul>

                    <img src="https://images.unsplash.com/photo-1545205597-3d9d02c29597?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80" alt="Healthy Nutrition">

                    <h3>3. Carbohydrates and Fats</h3>
                    <p>Carbohydrates provide energy for intense workouts, while fats support hormone production. Balance your macros with:</p>
                    <ul>
                        <li>40-50% of calories from carbs</li>
                        <li>25-35% of calories from protein</li>
                        <li>20-30% of calories from fats</li>
                    </ul>

                    <h2>Recovery and Rest</h2>
                    <p>Muscles grow during rest, not during workouts. Prioritize:</p>
                    <ul>
                        <li><strong>Sleep:</strong> Aim for 7-9 hours per night to optimize recovery and hormone production</li>
                        <li><strong>Rest days:</strong> Include at least 1-2 full rest days per week</li>
                        <li><strong>Active recovery:</strong> Light activity on rest days promotes blood flow and recovery</li>
                    </ul>

                    <h2>Sample Workout Plan</h2>
                    <p>Here's a sample 4-day split for muscle growth:</p>

                    <h3>Day 1: Upper Body (Push)</h3>
                    <ul>
                        <li>Bench press: 4 sets × 6-8 reps</li>
                        <li>Incline dumbbell press: 3 sets × 8-10 reps</li>
                        <li>Overhead press: 3 sets × 8-10 reps</li>
                        <li>Lateral raises: 3 sets × 12-15 reps</li>
                        <li>Tricep dips: 3 sets × 10-12 reps</li>
                    </ul>

                    <h3>Day 2: Lower Body</h3>
                    <ul>
                        <li>Squats: 4 sets × 6-8 reps</li>
                        <li>Romanian deadlifts: 3 sets × 8-10 reps</li>
                        <li>Leg press: 3 sets × 10-12 reps</li>
                        <li>Leg curls: 3 sets × 12-15 reps</li>
                        <li>Calf raises: 4 sets × 15-20 reps</li>
                    </ul>

                    <h3>Day 3: Rest or Active Recovery</h3>

                    <h3>Day 4: Upper Body (Pull)</h3>
                    <ul>
                        <li>Pull-ups: 4 sets × 6-8 reps</li>
                        <li>Bent-over rows: 3 sets × 8-10 reps</li>
                        <li>Face pulls: 3 sets × 12-15 reps</li>
                        <li>Barbell curls: 3 sets × 10-12 reps</li>
                        <li>Hammer curls: 3 sets × 12-15 reps</li>
                    </ul>

                    <h3>Day 5: Full Body</h3>
                    <ul>
                        <li>Deadlifts: 4 sets × 5 reps</li>
                        <li>Incline bench press: 3 sets × 8-10 reps</li>
                        <li>Lat pulldowns: 3 sets × 10-12 reps</li>
                        <li>Leg extensions: 3 sets × 12-15 reps</li>
                        <li>Plank: 3 sets × 60 seconds</li>
                    </ul>

                    <h3>Days 6-7: Rest</h3>

                    <div class="article-footer">
                        <a href="" class="btn" id="readFullArticle">Read Full Article</>
                            <div class="social-share">
                                <a href="#"><i class="fab fa-facebook-f"></i></a>
                                <a href="#"><i class="fab fa-twitter"></i></a>
                                <a href="#"><i class="fab fa-linkedin-in"></i></a>
                                <a href="#"><i class="fab fa-pinterest-p"></i></a>
                            </div>
                    </div>

                    <div class="author-card">
                        <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="John Smith">
                        <div class="author-info">
                            <h4>John Smith</h4>
                            <p>Certified personal trainer and nutrition specialist with over 10 years of experience helping clients achieve their fitness goals.</p>
                            <div class="author-social">
                                <a href="#"><i class="fab fa-facebook-f"></i></a>
                                <a href="#"><i class="fab fa-instagram"></i></a>
                                <a href="#"><i class="fab fa-twitter"></i></a>
                                <a href="#"><i class="fab fa-linkedin-in"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="toc">
                    <h3 class="toc-title">Table of Contents</h3>
                    <ul class="toc-links" id="tocLinks">
                        <!-- Table of contents will be generated by jQuery -->
                    </ul>
                </div>
            </div>

            <section class="related-posts">
                <h3>You Might Also Like</h3>
                <div class="related-grid" id="relatedPosts">
                    <!-- Related posts will be inserted here by jQuery -->
                </div>
            </section>
        </div>
    </div>

    <?php include(DRIVE_PATH . "/user_panel/footer/footer.php"); ?>

    <script>
        $(document).ready(function() {
            // Get blog ID from URL
            const urlParams = new URLSearchParams(window.location.search);
            const blogId = urlParams.get('id');

            // Mock API URLs
            const API_URL = `https://jsonplaceholder.typicode.com/posts/${blogId}`;
            const RELATED_POSTS_URL = 'https://jsonplaceholder.typicode.com/posts?_limit=3';

            // Fetch blog details from API
            function fetchBlogDetails() {
                $.ajax({
                    url: API_URL,
                    method: 'GET',
                    success: function(post) {
                        // Enhance post data with mock fitness-related content
                        const enhancedPost = {
                            ...post,
                            category: getRandomCategory(),
                            imageUrl: getRandomImageUrl(),
                            author: getRandomAuthor(),
                            date: getRandomDate(),
                            readingTime: calculateReadingTime(post.body),
                            originalUrl: getOriginalBlogUrl(post.id)
                        };

                        displayBlogDetails(enhancedPost);
                        generateTableOfContents();
                    },
                    error: function() {
                        $('#articleBody').html('<div class="error">Error loading blog post. Please try again later.</div>');
                    }
                });
            }

            function getOriginalBlogUrl(postId) {
                const workingUrls = [
                    `https://www.menshealth.com/fitness/posts/${postId}`,
                    `https://www.womenshealthmag.com/fitness/posts/${postId}`,
                    `https://www.bodybuilding.com/content/muscle-building-101-the-ultimate-guide.html?id=${postId}`,
                    `https://www.nerdfitness.com/blog/posts/${postId}`,
                    `https://www.healthline.com/nutrition/posts/${postId}`,
                    `https://www.yogajournal.com/practice/posts/${postId}`,
                    // Add more from the list above
                ];
                return workingUrls[postId % workingUrls.length];
            }

            // Fetch related posts
            function fetchRelatedPosts() {
                $.ajax({
                    url: RELATED_POSTS_URL,
                    method: 'GET',
                    success: function(posts) {
                        displayRelatedPosts(posts);
                    },
                    error: function() {
                        $('#relatedPosts').html('<p class="error">Error loading related posts.</p>');
                    }
                });
            }

            // Helper functions for mock data
            function getRandomCategory() {
                const categories = ['Workout', 'Nutrition', 'Lifestyle', 'Recovery'];
                return categories[Math.floor(Math.random() * categories.length)];
            }

            function getRandomImageUrl() {
                const images = [
                    'https://images.unsplash.com/photo-1538805060514-97d9cc17730c?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1374&q=80',
                    'https://images.unsplash.com/photo-1571019613454-1cb2f99b2d8b?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80',
                    'https://images.unsplash.com/photo-1571019614242-c5c5dee9f50b?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80',
                    'https://images.unsplash.com/photo-1579758629938-03607ccdbaba?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80',
                    'https://images.unsplash.com/photo-1545205597-3d9d02c29597?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80'
                ];
                return images[Math.floor(Math.random() * images.length)];
            }

            function getRandomAuthor() {
                const authors = ['John Smith', 'Sarah Johnson', 'Mike Davis', 'Emily Wilson', 'David Brown'];
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

            // Display blog details
            function displayBlogDetails(post) {
                $('#blogCategory').text(post.category);
                $('#blogTitle').text(post.title);
                $('#authorName').text(post.author);
                $('#publishDate').text(post.date);
                $('#readingTime').text(post.readingTime + ' min read');
                $('#authorImage').attr('src', `https://randomuser.me/api/portraits/${post.id % 2 === 0 ? 'men' : 'women'}/${post.id % 50}.jpg`);
                $("#readFullArticle").attr("href", post.originalUrl);

                // Set hero image
                $('#articleHero').css('background-image', `linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url(${post.imageUrl})`);
            }

            // Generate table of contents from headings
            function generateTableOfContents() {
                const headings = $('#articleBody h2, #articleBody h3');
                const tocLinks = $('#tocLinks');
                tocLinks.empty();

                if (headings.length > 0) {
                    headings.each(function(index) {
                        const id = 'section-' + index;
                        $(this).attr('id', id);

                        const tagName = $(this).prop('tagName').toLowerCase();
                        const text = $(this).text();

                        if (tagName === 'h2') {
                            tocLinks.append(`<li><a href="#${id}">${text}</a></li>`);
                        } else {
                            tocLinks.append(`<li class="toc-subitem"><a href="#${id}">${text}</a></li>`);
                        }
                    });
                } else {
                    tocLinks.append('<li>No headings available</li>');
                }
            }

            // Display related posts
            function displayRelatedPosts(posts) {
                const relatedPosts = $('#relatedPosts');
                relatedPosts.empty();

                posts.forEach(post => {
                    // Don't show the current post as a related post
                    if (post.id.toString() !== blogId) {
                        const relatedPost = {
                            ...post,
                            category: getRandomCategory(),
                            imageUrl: getRandomImageUrl(),
                            date: getRandomDate(),
                            readingTime: calculateReadingTime(post.body)
                        };

                        const relatedCard = `
                            <div class="related-card">
                                <div class="related-img">
                                    <img src="${relatedPost.imageUrl}" alt="${relatedPost.title}">
                                </div>
                                <div class="related-content">
                                    <span class="category">${relatedPost.category}</span>
                                    <h4>${relatedPost.title}</h4>
                                    <span class="date">${relatedPost.date}</span>
                                    <a href="http://localhost/php/IFS/user_panel/blog/blog-details.php?id=${relatedPost.id}" class="btn">Read More</a>
                                </div>
                            </div>
                        `;

                        relatedPosts.append(relatedCard);
                    }
                });
            }

            // Reading progress bar
            $(window).scroll(function() {
                const windowHeight = $(window).height();
                const documentHeight = $(document).height();
                const scrollTop = $(window).scrollTop();
                const progress = (scrollTop / (documentHeight - windowHeight)) * 100;

                $('#readingProgress').css('width', progress + '%');

                // Show/hide back to top button
                if (scrollTop > 300) {
                    $('#backToTop').addClass('active');
                } else {
                    $('#backToTop').removeClass('active');
                }
            });

            // Back to top button
            $('#backToTop').click(function() {
                $('html, body').animate({
                    scrollTop: 0
                }, 'smooth');
            });

            // // Read full article button
            // $('#readFullArticle').click(function() {
            //     window.location.href = `https://jsonplaceholder.typicode.com/posts/${blogId}`;
            // });

            // Smooth scrolling for table of contents links
            $(document).on('click', 'a[href^="#"]', function(e) {
                e.preventDefault();
                const target = $(this.getAttribute('href'));
                if (target.length) {
                    $('html, body').animate({
                        scrollTop: target.offset().top - 100
                    }, 600);
                }
            });

            // Initial fetch
            fetchBlogDetails();
            fetchRelatedPosts();
        });
    </script>
</body>

</html>