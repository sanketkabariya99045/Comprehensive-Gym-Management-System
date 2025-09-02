<?php
session_start();

require("C:/xampp/htdocs/php/IFS/path.php");
include(DRIVE_PATH . "/database.php");

if (isset($_POST["submit_form"]) && isset($_POST["otp"])) {

    $otp = $_POST["otp"];

    if ($_SESSION["otp"] == $otp) {

        if (isset($_SESSION["user_email"])) {

            $_SESSION["set_pass"] = true;

            unset($_SESSION["otp"]);
            unset($_SESSION["form_error"]);

            if (isset($_SERVER['HTTP_REFERER'])) {
                header("Location: " . $_SERVER['HTTP_REFERER'] . "");
            }
        }

        if (isset($_SESSION["admin_email"])) {

            $_SESSION["set_pass"] = true;
            unset($_SESSION["otp"]);
            unset($_SESSION["form_error"]);

            if (isset($_SERVER['HTTP_REFERER'])) {
                header("Location: " . $_SERVER['HTTP_REFERER'] . "");
            }
        }


        //
    } else {
        $_SESSION["form_error"] = "Invalid OTP";

        if (isset($_SERVER['HTTP_REFERER'])) {
            header("Location: " . $_SERVER['HTTP_REFERER'] . "");
        }
    }
}
