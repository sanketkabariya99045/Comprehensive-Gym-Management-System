<?php
include("C:/xampp/htdocs/php/IFS/database.php");

$total = $conn->prepare("SELECT COUNT(*) AS total FROM `service`");
$total->execute();
$total = $total->fetchAll();

$total_records = $total[0]["total"];
?>
<input type="hidden" id="total_records" value="<?php echo $total_records; ?>" />

<?php
$sel = $conn->prepare("SELECT service.name, service.description, feedback.* FROM feedback JOIN service ON service.service_id=feedback.service_id LIMIT ".$_POST["last"].", " . $_POST["limit"] . "");
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
<?php }
