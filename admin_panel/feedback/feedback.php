<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />

    <title>Ratings About Service</title>
    <?php include("C:/xampp/htdocs/php/IFS/admin_panel/links.php"); ?>
</head>

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
    }

    body {
        background-color: #111111;
    }

    .reviews i {
        color: green !important;
    }

    .reviews h5 {
        color: green !important;
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

    .type-General {
        background: var(--general);
    }

    .type-Complaint {
        background: var(--complaint);
    }

    .type-Suggestion {
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
</style>

<script>
    $(document).ready(() => {
        $(".product-list").DataTable();
    });
</script>

<body class="">
    <div class="wrapper ">
        <!-- // Sidebar -->
        <?php include(DRIVE_PATH . "/admin_panel/sidenav.php"); ?>

        <div class="main-panel">
            <?php include(DRIVE_PATH . "/admin_panel/header/header.php"); ?>

            <div class="content">
                <div class="card">
                    <div class="row">
                        <span class="mx-5 py-3 text-dark">Ratings / Reviews about Service</span>
                    </div>
                </div>
                <hr />

                <div class="feedback-container">
                    <div class="filters-container">
                        <div class="filters">
                            <button class="filter-btn active" data-filter="all">
                                <i class="fas fa-comments"></i> All Feedback
                            </button>
                            <button class="filter-btn" data-filter="General">
                                <i class="fas fa-thumbs-up"></i> General
                            </button>
                            <button class="filter-btn" data-filter="Complaint">
                                <i class="fas fa-exclamation-triangle"></i> Complaints
                            </button>
                            <button class="filter-btn" data-filter="Suggestion">
                                <i class="fas fa-lightbulb"></i> Suggestions
                            </button>
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
            </div>

            <script>
                $(document).ready(function() {
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

            <footer class="footer footer-black  footer-white ">
                <?php include(DRIVE_PATH . "/admin_panel/footer/footer.php"); ?>
            </footer>
        </div>
    </div>
</body>

</html>