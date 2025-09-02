<?php
require("C:/xampp/htdocs/php/IFS/path.php");
include(DRIVE_PATH . "../database.php");

if (isset($_POST["NotificationID"])) {
    $up = $conn->prepare("UPDATE `notification` SET `status`='Read' WHERE `NotificationID`='" . $_POST["NotificationID"] . "'");
    $up->execute();
}
