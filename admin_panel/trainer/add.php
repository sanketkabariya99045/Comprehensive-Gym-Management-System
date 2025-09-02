<?php
session_start();
include("C:/xampp/htdocs/php/IFS/admin_panel/links.php");

if (isset($_POST["save_trainer"])) {
    if (isset($_FILES["img"]["name"]) && $_FILES["img"]["name"] != null) {
        if (str_contains($_FILES["img"]["name"], "'")) {
            $_FILES["img"]["name"] = explode("'", $_FILES["img"]["name"]);
            $_FILES["img"]["name"] = $_FILES["img"]["name"][0] . $_FILES["img"]["name"][1];
        }

        $in = $conn->prepare("INSERT INTO `trainer` VALUES('', '".$_POST["FirstName"]."', '".$_POST["LastName"]."', '".$_POST["specialization"]."', '".$_POST["phone"]."', '".$_FILES["img"]["name"]."')");

        if ($in->execute()) {
            move_uploaded_file($_FILES["img"]["tmp_name"], DRIVE_PATH . "/img/trainer/" . $_FILES["img"]["name"] . "");

            $_SESSION["success"] = "Trainer Added Successfully";

            if (isset($_SERVER['HTTP_REFERER'])) {
                header("Location: " . $_SERVER['HTTP_REFERER'] . "");
            }
        }
    } else {
        $_SESSION["error"] = "Please! Select the Service Image";
    }
} ?>