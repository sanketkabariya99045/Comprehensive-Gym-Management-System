<?php
session_start();
require("C:/xampp/htdocs/php/IFS/path.php");

if (isset($_POST["save"])) {

    if (isset($_FILES["img"]["name"]) && $_FILES["img"]["name"] != null) {
        if (str_contains($_FILES["img"]["name"], "'")) {
            $_FILES["img"]["name"] = explode("'", $_FILES["img"]["name"]);
            $_FILES["img"]["name"] = $_FILES["img"]["name"][0] . $_FILES["img"]["name"][1];
        }
    }

    $address = [$_POST["house-number"], $_POST["apartment"], $_POST["suite"], $_POST["city"], $_POST["pincode"]];

    $up = $conn->prepare("UPDATE member SET `img`='" . $_FILES["img"]["name"] . "', `FirstName`='" . $_POST["FirstName"] . "', `LastName`='" . $_POST["LastName"] . "', `phone`='" . $_POST["phone"] . "', `gender`='" . $_POST["gender"] . "', `dob`='" . $_POST["dob"] . "', `address`='" . serialize($address) . "' WHERE `email`='".$_SESSION["email"]."'");

    if ($up->execute()) {
        move_uploaded_file($_FILES["img"]["tmp_name"], DRIVE_PATH . "/img/profile/" . $_FILES["img"]["name"] . "");

        $_SESSION["success"] = "Profile Details Updated Successfully";
    }

    $notification = $conn->prepare("INSERT INTO notification VALUES ('','" . $_SESSION["email"] . "', '5', 'Your Profile has been Updated Successfully.', NOW(), 'Unread')");
    $notification->execute();


    if (isset($_SERVER["HTTP_REFERER"])) {
        header("Location: " . $_SERVER["HTTP_REFERER"]);
    }
}
