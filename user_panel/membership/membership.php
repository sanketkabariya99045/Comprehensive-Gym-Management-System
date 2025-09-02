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
    <title>IFS - My Membership</title>

    <style>
        :root {
            --primary: #fd7e14;
            --primary-dark: #ff5e14;
            --secondary: #3182ce;
            --dark: #1a1a2e;
            --darker: #16213e;
            --light: #f8f9fa;
            --gray: #6c757d;
            --success: #28a745;
            --danger: #dc3545;
            --warning: #fd7e14;
        }

        .membership-container {
            margin: 12rem auto 2rem auto;
        }

        /* Header Styles */
        .membership-header {
            display: flex;
            flex-direction: column;
            gap: 20px;
            margin-bottom: 30px;
            padding-bottom: 20px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .membership-header h1 {
            font-family: 'Oswald', sans-serif;
            font-size: 2.5rem;
            color: var(--primary);
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .header-controls {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
            justify-content: space-between;
            align-items: center;
        }

        .search-bar {
            flex: 1;
            min-width: 250px;
            position: relative;
        }

        .search-bar input {
            width: 100%;
            padding: 12px 15px 12px 40px;
            border-radius: 30px;
            border: none;
            background-color: var(--darker);
            color: var(--light);
            font-size: 0.9rem;
            transition: all 0.3s ease;
        }

        .search-bar input:focus {
            outline: none;
            box-shadow: 0 0 0 2px var(--primary);
        }

        .search-bar i {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--gray);
        }

        .filter-group {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }

        .filter-btn {
            padding: 10px 15px;
            border-radius: 30px;
            border: none;
            background-color: var(--darker);
            color: var(--light);
            cursor: pointer;
            font-weight: 500;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .filter-btn:hover {
            background-color: rgba(255, 255, 255, 0.1);
        }

        .filter-btn.active {
            background-color: var(--primary);
            color: white;
        }

        .sort-dropdown {
            position: relative;
        }

        .sort-btn {
            padding: 10px 15px;
            border-radius: 30px;
            border: none;
            background-color: var(--darker);
            color: var(--light);
            cursor: pointer;
            font-weight: 500;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .sort-btn:hover {
            background-color: rgba(255, 255, 255, 0.1);
        }

        .sort-options {
            position: absolute;
            top: 100%;
            right: 0;
            background-color: var(--darker);
            border-radius: 10px;
            padding: 10px 0;
            min-width: 200px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
            z-index: 10;
            display: none;
        }

        .sort-options.show {
            display: block;
        }

        .sort-option {
            color: white;
            padding: 10px 20px;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .sort-option:hover {
            background-color: rgba(255, 255, 255, 0.1);
        }

        /* Membership Cards */
        .membership-cards {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
            gap: 25px;
            margin-top: 20px;
        }

        .membership-card {
            background-color: var(--light);
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
            transition: all 0.3s ease;
            border-left: 4px solid var(--primary);
        }

        .membership-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.3);
        }

        .membership-card.active {
            border-left-color: var(--success);
        }

        .membership-card.expired {
            border-left-color: var(--danger);
        }

        .membership-card.suspended {
            border-left-color: var(--warning);
        }

        .card-header {
            padding: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .card-header h3 {
            font-family: 'Oswald', sans-serif;
            font-size: 1.4rem;
            color: var(--secondary);
            text-transform: uppercase;
        }

        .status-badge {
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .status-badge.active {
            background-color: rgba(40, 167, 69, 0.2);
            color: var(--success);
        }

        .status-badge.expired {
            background-color: rgba(220, 53, 69, 0.2);
            color: var(--danger);
        }

        .status-badge.suspended {
            background-color: rgba(253, 126, 20, 0.2);
            color: var(--warning);
        }

        .card-body {
            padding: 20px;
        }

        .card-section {
            margin-bottom: 20px;
        }

        .card-section:last-child {
            margin-bottom: 0;
        }

        .card-section h4 {
            font-size: 1rem;
            color: var(--primary);
            margin-bottom: 10px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .card-section h4 i {
            font-size: 0.9rem;
        }

        .info-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
        }

        .info-item {
            display: flex;
            flex-direction: column;
            gap: 3px;
        }

        .info-label {
            font-size: 0.8rem;
            color: var(--dark);
        }

        .info-value {
            color: var(--dark);
            font-weight: 500;
            font-size: 0.95rem;
        }

        .progress-container {
            margin-top: 15px;
        }

        .progress-label {
            display: flex;
            justify-content: space-between;
            font-size: 12px;
            color: var(--gray);
            margin-bottom: 5px;
        }

        .progress-bar {
            height: 8px;
            background: #e2e8f0;
            border-radius: 4px;
            overflow: hidden;
        }

        .progress-fill {
            height: 100%;
            background: var(--primary);
            border-radius: 4px;
            transition: width 0.5s ease;
        }

        .dates {
            display: flex;
            justify-content: space-between;
            font-size: 0.85rem;
            color: var(--gray);
            margin-top: 5px;
        }

        .health-metrics {
            display: flex;
            gap: 15px;
        }

        .metric {
            background-color: rgba(255, 255, 255, 0.05);
            padding: 10px;
            border-radius: 8px;
            flex: 1;
            text-align: center;
        }

        .metric-value {
            font-size: 1.2rem;
            font-weight: 600;
            color: var(--secondary);
        }

        .metric-label {
            font-size: 0.7rem;
            color: var(--gray);
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .card-footer {
            padding: 15px 20px;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .action-btn {
            padding: 8px 15px;
            border-radius: 5px;
            border: none;
            background-color: var(--primary);
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 5px;
            font-size: 0.85rem;
        }

        .action-btn:hover {
            background-color: var(--primary-dark);
        }

        .action-btn.secondary {
            background-color: transparent;
            border: 1px solid var(--gray);
        }

        .action-btn.secondary:hover {
            border-color: var(--primary);
            color: var(--primary);
        }

        .expand-btn {
            background: none;
            border: none;
            color: var(--primary);
            cursor: pointer;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .additional-details {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.5s ease;
        }

        .additional-details.show {
            max-height: 1000px;
        }

        /* Empty State */
        .empty-state {
            text-align: center;
            padding: 50px 20px;
            grid-column: 1 / -1;
        }

        .empty-state i {
            font-size: 3rem;
            color: var(--gray);
            margin-bottom: 20px;
        }

        .empty-state h3 {
            color: var(--light);
            margin-bottom: 10px;
        }

        .empty-state p {
            color: var(--gray);
            max-width: 500px;
            margin: 0 auto 20px;
        }

        /* Loading State */
        .loading {
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 50px;
            grid-column: 1 / -1;
        }

        .spinner {
            width: 40px;
            height: 40px;
            border: 4px solid rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            border-top-color: var(--primary);
            animation: spin 1s ease-in-out infinite;
        }

        @keyframes spin {
            to {
                transform: rotate(360deg);
            }
        }


        /* Responsive Styles */
        @media (max-width: 768px) {
            .membership-cards {
                grid-template-columns: 1fr;
            }

            .membership-header h1 {
                font-size: 2rem;
            }

            .info-grid {
                grid-template-columns: 1fr;
            }

            .header-controls {
                flex-direction: column;
                align-items: stretch;
            }

            .filter-group {
                justify-content: center;
            }
        }

        @media (max-width: 480px) {
            .card-footer {
                flex-direction: column;
                gap: 10px;
            }

            .action-btn {
                width: 100%;
                justify-content: center;
            }
        }
    </style>
</head>

<body>
    <div class="membership-container container">
        <div class="membership-header">
            <h1>Your INVIGOR FITNESS Membership</h1>
            <div class="header-controls">
                <div class="search-bar">
                    <i class="fas fa-search"></i>
                    <input type="text" placeholder="Search memberships...">
                </div>
                <div class="filter-group">
                    <button class="filter-btn active" data-filter="all">
                        <i class="fas fa-layer-group"></i> All
                    </button>
                    <button class="filter-btn" data-filter="active">
                        <i class="fas fa-check-circle"></i> Active
                    </button>
                    <button class="filter-btn" data-filter="expired">
                        <i class="fas fa-times-circle"></i> Expired
                    </button>
                    <button class="filter-btn" data-filter="suspended">
                        <i class="fas fa-pause-circle"></i> Suspended
                    </button>
                    <div class="sort-dropdown">
                        <button class="sort-btn" id="sortBtn">
                            <i class="fas fa-sort-amount-down"></i> Sort By
                        </button>
                        <div class="sort-options" id="sortOptions">
                            <div class="sort-option" data-sort="start_date">Start Date (Oldest)</div>
                            <div class="sort-option" data-sort="start_date DESC">Start Date (Newest)</div>
                            <div class="sort-option" data-sort="membership_fee">Price (Low to High)</div>
                            <div class="sort-option" data-sort="membership_fee DESC">Price (High to Low)</div>
                            <div class="sort-option" data-sort="plan_duration">Duration (Short to Long)</div>
                            <div class="sort-option" data-sort="plan_duration DESC">Duration (Long to Short)</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="membership-cards" id="membershipCards">
            <?php
            function calculateDaysPercentage($startDate, $endDate = null)
            {
                // Convert input dates to DateTime objects
                $start = new DateTime($startDate);
                $end = $endDate ? new DateTime($endDate) : new DateTime(); // Use current date if no end date provided

                // Calculate total days in the period
                $totalDays = $start->diff($end)->days;

                // Calculate days elapsed from start to now
                $now = new DateTime();
                if ($now < $start) {
                    $daysElapsed = 0;
                } else {
                    $daysElapsed = $start->diff($now)->days;
                }

                // Ensure we don't exceed the total period
                if ($daysElapsed > $totalDays) {
                    $daysElapsed = $totalDays;
                }

                // Calculate percentage (avoid division by zero)
                $percentage = $totalDays > 0 ? ($daysElapsed / $totalDays) * 100 : 0;

                return [
                    'percentage' => round($percentage, 2),
                    'days_elapsed' => $daysElapsed,
                    'days_remaining' => max(0, $totalDays - $daysElapsed),
                    'total_days' => $totalDays
                ];
            }

            include(DRIVE_PATH . "../database.php");

            $sel = $conn->prepare("SELECT * FROM membership WHERE `email`='" . $_SESSION["email"] . "'");
            $sel->execute();
            $sel = $sel->fetchAll();

            foreach ($sel as $r) {
                $startDate = strtotime($r["start_date"]);
                $endDate = strtotime($r["end_date"]);
            ?>
                <div class="membership-card <?php echo $r["status"]; ?>" data-id="<?php echo $r["MemberID"]; ?>" data-status="<?php echo $r["status"]; ?>">
                    <div class="card-header">
                        <h3><?php echo $r["membership_type"]; ?> Membership</h3>
                        <span class="status-badge <?php echo $r["status"]; ?>">
                            <?php echo strtoupper($r["status"][0]) . substr($r["status"], 1); ?>
                        </span>
                    </div>
                    <div class="card-body">
                        <div class="card-section">
                            <h4><i class="fas fa-user"></i> Member Information</h4>
                            <div class="info-grid">
                                <div class="info-item">
                                    <span class="info-label">Email</span>
                                    <span class="info-value"><?php echo $r["email"]; ?></span>
                                </div>
                                <div class="info-item">
                                    <span class="info-label">Membership Fee</span>
                                    <span class="info-value"><?php echo $r["membership_fee"]; ?></span>
                                </div>
                            </div>
                        </div>

                        <div class="card-section">
                            <h4><i class="fas fa-calendar-alt"></i> Membership Period</h4>
                            <div class="progress-container">
                                <div class="progress-label">
                                    <?php
                                    // Example usage:
                                    $membershipStart = date("Y-m-d", strtotime($r["start_date"]));
                                    $membershipEnd = date("Y-m-d", strtotime($r["end_date"]));

                                    $result = calculateDaysPercentage($membershipStart, $membershipEnd);

                                    // For your frontend display (like the progress bar):
                                    $progressWidth = $result['percentage'];
                                    $remainingDays = $result['days_remaining'];
                                    ?>
                                    <span><?php echo $progressWidth . "% completed"; ?></span>
                                    <span><?php echo $remainingDays; ?> days remaining</span>
                                </div>
                                <div class="progress-bar">
                                    <div class="progress-fill" style="width: <?php echo $progressWidth . "%"; ?>"></div>
                                </div>
                            </div>
                            <div class="dates">
                                <span><?php echo date("M d, Y", strtotime($r["start_date"])); ?></span>
                                <span><?php echo date("M d, Y", strtotime($r["end_date"])); ?></span>
                            </div>
                        </div>

                        <div class="card-section">
                            <h4><i class="fas fa-heartbeat"></i> Health Metrics</h4>
                            <div class="health-metrics">
                                <div class="metric">
                                    <div class="metric-value"><?php echo $r["height"]; ?></div>
                                    <div class="metric-label">Height</div>
                                </div>
                                <div class="metric">
                                    <div class="metric-value"><?php echo $r["weight"]; ?></div>
                                    <div class="metric-label">Weight</div>
                                </div>
                                <div class="metric">
                                    <div class="metric-value"><?php echo $r["experience"]; ?></div>
                                    <div class="metric-label">Experience</div>
                                </div>
                            </div>
                        </div>

                        <div class="additional-details">
                            <div class="card-section">
                                <h4><i class="fas fa-info-circle"></i> Additional Details</h4>
                                <div class="info-grid">
                                    <div class="info-item">
                                        <span class="info-label">Fitness Goal</span>
                                        <span class="info-value"><?php echo $r["goal"]; ?></span>
                                    </div>
                                    <div class="info-item">
                                        <span class="info-label">Medical Condition</span>
                                        <span class="info-value"><?php echo $r["medical_condition"]; ?></span>
                                    </div>
                                    <div class="info-item">
                                        <span class="info-label">Plan Duration</span>
                                        <span class="info-value"><?php echo $r["plan_duration"]; ?></span>
                                    </div>
                                    <div class="info-item">
                                        <span class="info-label">Preferred Timing</span>
                                        <span class="info-value"><?php echo $r["timing"]; ?></span>
                                    </div>
                                    <div class="info-item">
                                        <span class="info-label">Payment Type</span>
                                        <span class="info-value"><?php echo $r["payment_type"]; ?></span>
                                    </div>
                                    <div class="info-item">
                                        <span class="info-label">Payment Status</span>
                                        <span class="info-value"><?php echo ($r["payment_type"] == "Razorpay") ? "Paid" : "Pending"; ?></span>
                                    </div>
                                    <div class="info-item">
                                        <span class="info-label">Created At</span>
                                        <span class="info-value"><?php echo date("M d, Y", strtotime($r["created_at"])); ?></span>
                                    </div>
                                    <div class="info-item">
                                        <span class="info-label">Updated At</span>
                                        <span class="info-value"><?php echo date("M d, Y", strtotime($r["updated_at"])); ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button class="expand-btn">
                            <i class="fas fa-chevron-down"></i> Show Details
                        </button>
                        <div class="actions">
                            <a href="<?php echo HTTP_PATH . "/user_panel/membership/PDF/genReceipt.php?MemberID=" . $r["MemberID"] . "" ?>" class="action-btn secondary mb-2">
                                <i class="fas fa-print"></i> Print
                            </a>
                            <a href="<?php echo HTTP_PATH . "/user_panel/membership/renew.php?MemberID=" . $r["MemberID"]; ?>" class="action-btn">
                                <i class="fas fa-sync-alt"></i> Renew
                            </a>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>


    <?php include(DRIVE_PATH . "/user_panel/footer/footer.php"); ?>

    <script>
        $(document).ready(function() {
            // Initialize event handlers
            function initEventHandlers() {
                // Expand/collapse details
                $('.expand-btn').click(function() {
                    const card = $(this).closest('.membership-card');
                    const details = card.find('.additional-details');
                    const icon = $(this).find('i');

                    details.toggleClass('show');

                    if (details.hasClass('show')) {
                        $(this).html('<i class="fas fa-chevron-up"></i> Hide Details');
                    } else {
                        $(this).html('<i class="fas fa-chevron-down"></i> Show Details');
                    }
                });

                // Filter buttons
                $('.filter-btn').click(function() {
                    $('.filter-btn').removeClass('active');
                    $(this).addClass('active');

                    const filter = $(this).data('filter');
                    if (filter === 'all') {
                        $('.membership-card').show();
                    } else {
                        $('.membership-card').hide();
                        $(`.${filter}`).show();
                    }
                });

                // Sort dropdown toggle
                $('#sortBtn').click(function(e) {
                    e.stopPropagation();
                    $('#sortOptions').toggleClass('show');
                });

                $('.sort-option').click(function() {
                    let sort = $(this).data("sort");
                    $.ajax({
                        type: "POST",
                        url: "sort.php",
                        data: {
                            sort: sort
                        },
                        success: function(data) {
                            alert(sort);
                            $(".membership-cards").html(data);
                        }
                    });
                });

                // Close sort dropdown when clicking outside
                $(document).click(function() {
                    $('#sortOptions').removeClass('show');
                });

                // Search functionality
                $('.search-bar input').on('input', function() {
                    const searchTerm = $(this).val().toLowerCase();

                    $('.membership-card').each(function() {
                        const cardText = $(this).text().toLowerCase();
                        if (cardText.includes(searchTerm)) {
                            $(this).show();
                        } else {
                            $(this).hide();
                        }
                    });
                });
            }

            initEventHandlers();
        });
    </script>
</body>

</html>