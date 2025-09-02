<?php
session_start();

require("C:/xampp/htdocs/php/IFS/path.php");
include(DRIVE_PATH . "/database.php");

if (isset($_POST["update_pass"])) {

    $new_pass = $_POST["new_pass"];
    $conf_pass = $_POST["conf_pass"];

    if ($new_pass != $conf_pass) {
        $_SESSION["form_error"] = "New Password & Confirm Password is not same.";

        if (isset($_SERVER['HTTP_REFERER'])) {
            header("Location: " . $_SERVER['HTTP_REFERER'] . "");
        }
    }
    //

    else {
        // Get user email
        if (isset($_SESSION["user_email"])) {

            $update_user = $conn->prepare("UPDATE `member` SET password='$new_pass' WHERE email='" . $_SESSION["user_email"] . "'");
            $update_user->execute();

            $_SESSION["form_succ"] = "Password updated successfully";
            $_SESSION["pass_changed"] = true;
            unset($_SESSION["set_pass"]);

            if (isset($_SERVER['HTTP_REFERER'])) {
                header("Location: " . $_SERVER['HTTP_REFERER'] . "");
            }
        }

        // Get Admin email
        if (isset($_SESSION["admin_email"])) {

            $update_admin = $conn->prepare("UPDATE `admin` SET password='$new_pass' WHERE email='" . $_SESSION["admin_email"] . "'");
            $update_admin->execute();

            $_SESSION["form_succ"] = "Password updated successfully";
            $_SESSION["pass_changed"] = true;

            if (isset($_SERVER['HTTP_REFERER'])) {
                header("Location: " . $_SERVER['HTTP_REFERER'] . "");
            }
        }
    }
}
