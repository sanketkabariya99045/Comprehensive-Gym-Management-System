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
    <title>IronForce Gym - Member Feedback</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary: #f36100;
            --primary-light: rgba(243, 97, 0, 0.1);
            --dark: #111111;
            --dark-light: #444;
            --light: #f2f2f2;
            --general: #4CAF50;
            --complaint: #F44336;
            --suggestion: #2196F3;
            --card-bg: #ffffff;
            --transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
            --secondary: #004E89;
            --secondary-light: #0066a7;
            --accent: #FFD166;
            --success: #4CAF50;
            --error: #F44336;
        }

        body {
            background-color: #111111;
        }

        .feedback-container {
            padding: 12rem 0 2rem 0;
        }

        h1 {
            font-size: 1.8rem;
            margin-bottom: 10px;
            font-weight: 600;
        }

        .subtitle {
            color: var(--dark-light);
            max-width: 600px;
            margin: 0 auto;
        }

        .filters-container {
            background-color: var(--card-bg);
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 30px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        }

        .filters {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 10px;
        }

        .filter-btn {
            padding: 10px 20px;
            background: var(--card-bg);
            border: 1px solid #ddd;
            border-radius: 30px;
            cursor: pointer;
            transition: var(--transition);
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .filter-btn:hover {
            background: var(--primary-light);
            border-color: var(--primary);
            color: var(--primary);
        }

        .filter-btn.active {
            background: var(--primary);
            color: white;
            border-color: var(--primary);
        }

        .filter-btn i {
            font-size: 0.9rem;
        }

        .feedback-grid {
            position: relative;
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
            gap: 25px;
            margin-bottom: 50px;
            padding-bottom: 5rem;
        }

        .load-more {
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translate(-50%, 0);
            margin: auto;
            z-index: 10;
        }

        .feedback-card {
            background: var(--card-bg);
            border-radius: 12px;
            padding: 25px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
            transition: var(--transition);
            border-top: 4px solid var(--primary);
            position: relative;
            overflow: hidden;
        }

        .feedback-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.12);
        }

        .feedback-card::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 4px;
            background: var(--primary);
        }

        .feedback-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
        }

        .user-email {
            font-weight: 600;
            color: var(--primary);
            font-size: 0.95rem;
        }

        .feedback-type {
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: 600;
            color: white;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .type-general {
            background: var(--general);
        }

        .type-complaint {
            background: var(--complaint);
        }

        .type-suggestion {
            background: var(--suggestion);
        }

        .service-name {
            font-size: 1.25rem;
            font-weight: 700;
            margin-bottom: 8px;
            color: var(--dark);
        }

        .service-desc {
            font-size: 0.85rem;
            color: var(--dark-light);
            margin-bottom: 15px;
            line-height: 1.5;
        }

        .stars {
            color: var(--primary);
            margin-bottom: 20px;
            font-size: 1.1rem;
            letter-spacing: 2px;
        }

        .feedback-message {
            font-size: 0.95rem;
            line-height: 1.6;
            color: var(--dark);
            position: relative;
            padding-left: 15px;
            border-left: 3px solid var(--primary-light);
        }

        .feedback-date {
            display: block;
            font-size: 0.75rem;
            color: #999;
            margin-top: 15px;
            text-align: right;
        }

        .empty-state {
            grid-column: 1 / -1;
            text-align: center;
            padding: 50px 20px;
            background-color: var(--card-bg);
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        }

        .empty-state i {
            font-size: 3rem;
            color: #ddd;
            margin-bottom: 20px;
        }

        .empty-state h3 {
            font-size: 1.3rem;
            margin-bottom: 10px;
            color: var(--dark);
        }

        .empty-state p {
            color: var(--dark-light);
            max-width: 500px;
            margin: 0 auto;
        }

        @media (max-width: 768px) {
            .feedback-grid {
                grid-template-columns: 1fr;
            }

            .filters {
                flex-direction: column;
                align-items: stretch;
            }

            .filter-btn {
                width: 100%;
                justify-content: center;
            }
        }


        /* Particle background */
        .particles {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
            opacity: 0.15;
        }

        .particle {
            position: absolute;
            background-color: var(--primary);
            border-radius: 50%;
            opacity: 0.7;
        }

        /* Fitness icons */
        .fitness-icon {
            position: absolute;
            opacity: 0.1;
            z-index: -1;
            font-size: 10rem;
            color: var(--secondary);
        }

        .icon-dumbbell {
            top: 10%;
            left: 5%;
            transform: rotate(-15deg);
        }

        .icon-heart {
            bottom: 10%;
            right: 5%;
            transform: rotate(15deg);
        }

        .feedback-card {
            background: white;
            border-radius: 16px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
            width: 100%;
            overflow: hidden;
            transform: translateY(20px);
            opacity: 0;
            animation: fadeInUp 0.6s forwards 0.3s;
            position: relative;
            z-index: 1;
        }

        @keyframes fadeInUp {
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        .feedback-header h2 {
            font-size: 2rem;
            margin-bottom: 10px;
            font-weight: 700;
            position: relative;
            z-index: 2;
        }

        .feedback-header p {
            font-size: 1rem;
            opacity: 0.9;
            position: relative;
            z-index: 2;
        }

        #feedbackForm {
            padding: 30px;
            display: flex;
            flex-direction: column;
            gap: 25px;
        }

        @keyframes fadeIn {
            to {
                opacity: 1;
            }
        }

        .form-group:nth-child(1) {
            animation-delay: 0.4s;
        }

        .form-group:nth-child(2) {
            animation-delay: 0.5s;
        }

        .form-group:nth-child(3) {
            animation-delay: 0.6s;
        }

        .form-group:nth-child(4) {
            animation-delay: 0.7s;
        }

        .form-group:nth-child(5) {
            animation-delay: 0.8s;
        }

        .form-group:nth-child(6) {
            animation-delay: 0.9s;
        }

        .form-group:nth-child(7) {
            animation-delay: 1.0s;
        }

        .form-group:nth-child(8) {
            animation-delay: 1.1s;
        }

        label {
            font-weight: 600;
            color: var(--dark);
            font-size: 0.9rem;
        }

        .form-control {
            border: 2px solid #e0e0e0;
            border-radius: 8px;
            font-family: 'Montserrat', sans-serif;
            font-size: 0.95rem;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(255, 107, 53, 0.2);
        }

        textarea.form-control {
            min-height: 100px;
            resize: vertical;
        }

        /* Rating stars */
        .stars {
            display: flex;
        }

        .star {
            font-size: 2rem;
            color: #e0e0e0;
            cursor: pointer;
            transition: all 0.2s ease;
            position: relative;
        }

        .star-selected {
            font-size: 2rem;
            color: #e0e0e0;
            cursor: pointer;
            transition: all 0.2s ease;
            position: relative;
        }

        .star:hover,
        .star.hover {
            color: var(--accent);
            transform: scale(1.1);
        }

        .star.selected {
            color: var(--accent);
        }

        /* Service details - initially hidden */
        .service-details {
            display: none;
            flex-direction: column;
            gap: 15px;
            padding: 15px;
            background-color: #f9f9f9;
            border-radius: 8px;
            border-left: 4px solid var(--secondary);
            animation: slideDown 0.4s ease-out;
        }

        @keyframes slideDown {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Submit button */
        .submit-btn {
            background: linear-gradient(to right, var(--primary) 0%, var(--primary-light) 100%);
            color: white;
            border: none;
            padding: 15px;
            border-radius: 8px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 10px;
            position: relative;
            overflow: hidden;
        }

        .submit-btn:hover {
            background: linear-gradient(to right, var(--primary-light) 0%, var(--primary) 100%);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(255, 107, 53, 0.3);
        }

        .submit-btn:active {
            transform: translateY(0);
        }

        .loading-spinner {
            display: none;
            width: 20px;
            height: 20px;
            border: 3px solid rgba(255, 255, 255, 0.3);
            border-radius: 50%;
            border-top-color: white;
            animation: spin 1s ease-in-out infinite;
        }

        @keyframes spin {
            to {
                transform: rotate(360deg);
            }
        }

        /* Validation styles */
        .error-message {
            color: var(--error);
            font-size: 0.8rem;
            margin-top: 5px;
            display: none;
        }

        .form-control.error {
            border-color: var(--error);
        }

        .form-control.success {
            border-color: var(--success);
        }

        /* Confirmation modal */
        .modal-overlay {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.7);
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 1000;
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
        }

        .modal-overlay.active {
            opacity: 1;
            visibility: visible;
        }

        .modal-content {
            background: white;
            padding: 30px;
            border-radius: 12px;
            max-width: 500px;
            width: 90%;
            text-align: center;
            transform: scale(0.9);
            transition: all 0.3s ease;
            position: relative;
        }

        .modal-overlay.active .modal-content {
            transform: scale(1);
        }

        .modal-icon {
            font-size: 4rem;
            color: var(--success);
            margin-bottom: 20px;
            animation: bounceIn 0.6s;
        }

        .modal-content h3 {
            font-size: 1.5rem;
            margin-bottom: 15px;
            color: var(--dark);
        }

        .modal-content p {
            margin-bottom: 25px;
            color: #666;
        }

        .modal-close {
            position: absolute;
            top: 15px;
            right: 15px;
            background: none;
            border: none;
            font-size: 1.5rem;
            cursor: pointer;
            color: #999;
            transition: color 0.2s;
        }

        .modal-close:hover {
            color: var(--dark);
        }

        /* Responsive adjustments */
        @media (max-width: 480px) {
            .pagination {
                gap: 0.25rem;
            }

            .pagination a,
            .pagination span {
                width: 32px;
                height: 32px;
                font-size: 0.875rem;
            }
        }


        /* Responsive adjustments */
        @media (max-width: 768px) {
            .feedback-header h2 {
                font-size: 1.5rem;
            }

            .feedback-header p {
                font-size: 0.9rem;
            }

            #feedbackForm {
                padding: 20px;
            }

            .star {
                font-size: 1.8rem;
            }
        }

        @media (max-width: 480px) {
            body {
                padding: 10px;
            }

            .feedback-card {
                border-radius: 12px;
            }

            .feedback-header {
                padding: 20px;
            }

            .form-control {
                padding: 10px 12px;
            }
        }
    </style>
</head>

<body>
    <div class="feedback-container container">
        <div class="filters-container">
            <div class="filters">
                <button class="filter-btn active" data-filter="all">
                    <i class="fas fa-comments"></i> All Feedback
                </button>
                <button class="filter-btn" data-filter="general">
                    <i class="fas fa-thumbs-up"></i> General
                </button>
                <button class="filter-btn" data-filter="complaint">
                    <i class="fas fa-exclamation-triangle"></i> Complaints
                </button>
                <button class="filter-btn" data-filter="suggestion">
                    <i class="fas fa-lightbulb"></i> Suggestions
                </button>
            </div>
        </div>

        <script>
            if (window.history.replaceState) {
                window.history.replaceState(null, null, window.location.href);
            }
        </script>

        <?php
        if (isset($_POST["submit"])) {
            $sel = $conn->prepare("SELECT * FROM `service` WHERE `name`='" . $_POST["service"] . "'");
            $sel->execute();
            $sel = $sel->fetchAll();
            $service = $sel[0];

            $in = $conn->prepare("INSERT INTO `feedback` VALUES('','" . $_POST["email"] . "','" . $service["service_id"] . "','" . $_POST["feedback_type"] . "','" . $_POST["rating"] . "','" . $_POST["comments"] . "',NOW())");
            $in->execute();

            $notification = $conn->prepare("INSERT INTO notification VALUES ('','" . $_SESSION["email"] . "', '3', 'Thank you for your valuable feedback! We appreciate you taking the time to share your thoughts with us.
            <br/><br/>Feedback Details:<br/>
            <b>Feedback Type: </b>" . $_POST["feedback_type"] . "<br/>
            <b>Rating: </b>" . $_POST["rating"] . "<br/>
            <b>Message: </b>" . $_POST["comments"] . "<br/>', NOW(), 'Unread')");
            $notification->execute();
        }
        ?>

        <!-- Feedback form card -->
        <div class="feedback-card m-4 mx-auto">
            <div class="feedback-header">
                <h2>Share Your Experience</h2>
                <p>Help us improve Invigor Fitness Studio</p>
            </div>

            <form action="" method="post" id="feedbackForm">
                <div class="row">
                    <!-- Email field -->
                    <div class="form-group col-md-6">
                        <label for="email">Email ID</label>
                        <?php if (isset($_SESSION["email"])) { ?>
                            <input type="email" id="email" name="email" class="form-control" value="<?php echo $_SESSION["email"]; ?>" readonly />
                        <?php } ?>
                        <?php if (!isset($_SESSION["email"])) { ?>
                            <input type="email" id="email" name="email" class="form-control" placeholder="Please! Login First" readonly />
                        <?php } ?>
                        <div class="error-message" id="email-error">Please enter a valid email address</div>
                    </div>

                    <!-- Rating field -->
                    <div class="form-group rating-container col-md-6">
                        <label>Your Rating</label>
                        <div class="stars">
                            <span class="star" data-value="1">★</span>
                            <span class="star" data-value="2">★</span>
                            <span class="star" data-value="3">★</span>
                            <span class="star" data-value="4">★</span>
                            <span class="star" data-value="5">★</span>
                        </div>
                        <input type="hidden" id="rating" name="rating" value="0" required />
                        <div class="error-message" id="rating-error">Please select a rating</div>
                    </div>
                </div>

                <div class="row">
                    <!-- Feedback type -->
                    <div class="form-group col-md-6">
                        <label for="feedbackType">Feedback Type</label>
                        <select id="feedbackType" name="feedback_type" class="form-control" required>
                            <option value="" disabled selected>Select feedback type</option>
                            <option value="General">General Feedback</option>
                            <option value="Suggestion">Suggestion</option>
                            <option value="Complaint">Complaint</option>
                        </select>
                        <div class="error-message" id="type-error">Please select a feedback type</div>
                    </div>
                    <div class="col-md-6">
                        <label for="visitDate">Service Name</label>
                        <select name="service" class="form-control" required>
                            <?php
                            $sel = $conn->prepare("SELECT * FROM `service`");
                            $sel->execute();
                            $sel = $sel->fetchAll();

                            foreach ($sel as $r) { ?>
                                <option value="<?php echo $r["name"]; ?>"><?php echo $r["name"]; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>

                <div class="row">
                    <!-- Comments -->
                    <div class="form-group col-md-12">
                        <label for="comments">Your Feedback</label>
                        <textarea id="comments" name="comments" class="form-control" placeholder="Share your thoughts about your experience..." required></textarea>
                        <div class="error-message" id="comments-error">Please provide your feedback</div>
                    </div>
                </div>

                <!-- Submit button -->
                <?php if (isset($_SESSION["email"])) { ?>
                    <button type="submit" name="submit" class="submit-btn">
                        <span class="btn-text">Submit Feedback</span>
                        <span class="loading-spinner"></span>
                    </button>
                <?php } ?>
            </form>
            <?php if (!isset($_SESSION["email"])) { ?>
                <button type="submit" class="submit-btn login-btn">
                    <span class="btn-text">Submit Feedback</span>
                    <span class="loading-spinner"></span>
                </button>
            <?php } ?>
        </div>

        <!-- Confirmation modal -->
        <div class="modal-overlay" id="confirmationModal">
            <div class="modal-content">
                <button class="modal-close" id="modalClose">&times;</button>
                <div class="modal-icon">
                    <i class="fas fa-check-circle"></i>
                </div>
                <h3>Thank You!</h3>
                <p>Your feedback has been submitted successfully. We appreciate your time and will use your input to improve our services.</p>
                <button class="submit-btn" id="modalOk" style="width: 100%;">OK</button>
            </div>
        </div>

        <div class="feedback-grid">
            <?php
            $total = $conn->prepare("SELECT COUNT(*) AS total FROM `service`");
            $total->execute();
            $total = $total->fetchAll();

            $total_records = $total[0]["total"];
            ?>
            <input type="hidden" id="total_records" value="<?php echo $total_records; ?>" />

            <?php
            $sel = $conn->prepare("SELECT service.name, service.description, feedback.* FROM feedback JOIN service ON service.service_id=feedback.service_id LIMIT 6");
            $sel->execute();
            $sel = $sel->fetchAll();

            foreach ($sel as $r) {
            ?>
                <div class="feedback-card <?php echo $r["feedback_type"]; ?>" data-type="<?php echo $r["feedback_type"]; ?>">
                    <div class="feedback-header">
                        <span class="user-email"><?php echo $r["email"]; ?></span>
                        <span class="feedback-type type-<?php echo $r["feedback_type"]; ?>">
                            <i class="fas <?php echo ($r["feedback_type"] === "General") ? 'fa-thumbs-up' : (($r["feedback_type"] === "Complaint") ? "fa-exclamation-triangle" : "fa-lightbulb"); ?>"></i> <?php echo $r["feedback_type"]; ?>
                        </span>
                    </div>
                    <h3 class="service-name"><?php echo $r["name"]; ?></h3>
                    <p class="service-desc"><?php echo $r["description"]; ?></p>
                    <div class="stars" title="<?php echo $r["rating"]; ?></div> out of 5 stars"><?php echo str_repeat("★", $r["rating"]) . str_repeat("☆", 5 - $r["rating"]); ?></div>
                    <p class="feedback-message">"<?php echo $r["comments"]; ?>"</p>
                    <span class="feedback-date"><?php echo date("d/m/Y h:i A", strtotime($r["created_at"])); ?></span>
                </div>
            <?php } ?>
            <button class="btn btn-danger load-more">Load More</button>
        </div>
    </div>


    <script>
        $(document).ready(function() {
            $(".stars .star").mouseover(function() {
                $(".stars .star").css("color", "#e0e0e0");
                $(this).prevAll().css("color", "var(--accent)");
                $(this).css("color", "var(--accent)");

            });
            $(".stars .star").mouseleave(function() {
                $(".stars .star").css("color", "#e0e0e0");
            });
            $(".stars .star").click(function() {
                $(this).prevAll().css("color", "var(--accent)");
                $(this).css("color", "var(--accent)");
                $(".stars .star").addClass("star-selected");
                $(".stars .star").removeClass("star");
                $("#rating").val($(this).data("value"));
            });


            let last = 6;
            let limit = 12;
            let total_records = $("#total_records").val();
            $(".load-more").click(function() {
                if (limit >= total_records) $(".load-more").hide();
                $.ajax({
                    type: "POST",
                    url: "load_more.php",
                    data: {
                        last: last,
                        limit: limit
                    },
                    success: function(res) {
                        if (limit <= total_records) {
                            last += 6;
                            limit += 6;
                        }
                        $(".feedback-grid").append(res);
                    }
                });
            });



            // Filter buttons click handler
            $('.filter-btn').click(function() {
                $(".feedback-card").hide();
                ($(this).data('filter') != "all") ? $(`.${$(this).data('filter')}`).show(): $(".feedback-card").show();

                $('.filter-btn').removeClass('active');
                $(this).addClass('active');

                // Smooth scroll to top of grid
                $('html, body').animate({
                    scrollTop: $('.feedback-grid').offset().top - 20
                }, 300);
            });
        });
    </script>

    <?php include(DRIVE_PATH . "/user_panel/footer/footer.php"); ?>
</body>

</html>