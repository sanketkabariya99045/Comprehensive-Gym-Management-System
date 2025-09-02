<?php
session_start();
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

include("C:/xampp/htdocs/php/IFS/database.php");

$sel = $conn->prepare("SELECT * FROM membership WHERE `email`='" . $_SESSION["email"] . "' ORDER BY ".$_POST["sort"]."");
$sel->execute();
$sel = $sel->fetchAll();

foreach ($sel as $r) {
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
                <a href="<?php echo "http://localhost/php/IFS/user_panel/membership/PDF/genReceipt.php?MemberID=" . $r["MemberID"] . "" ?>" class="action-btn secondary mb-2">
                    <i class="fas fa-print"></i> Print
                </a>
                <a href="<?php echo "http://localhost/php/IFS/user_panel/membership/renew.php?MemberID=" . $r["MemberID"]; ?>" class="action-btn">
                    <i class="fas fa-sync-alt"></i> Renew
                </a>
            </div>
        </div>
    </div>
<?php } ?>