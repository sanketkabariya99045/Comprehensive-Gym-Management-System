<?php
session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require("C:/xampp/htdocs/php/IFS/path.php");
include(DRIVE_PATH . "/database.php");

// ! Function to send an email
function send_email($name, $email)
{
    require DRIVE_PATH . "/user_panel/class/phpmailer/src/Exception.php";
    require DRIVE_PATH . "/user_panel/class/phpmailer/src/PHPMailer.php";
    require DRIVE_PATH . "/user_panel/class/phpmailer/src/SMTP.php";

    $mail = new PHPMailer(true);

    $mail->isSMTP();
    $mail->Host = "smtp.gmail.com";
    $mail->SMTPAuth = true;
    $mail->Username = "sanketkabariyay8@gmail.com";
    $mail->Password = "ydgc yntf zfuk cutl";
    $mail->SMTPSecure = "tls";
    $mail->Port = 587;

    $mail->setFrom("sanketkabariyay8@gmail.com");
    $mail->addAddress($email);

    $mail->isHTML(true);
    $mail->Subject = "For One Time Password(OTP)";
    $otp = mt_rand(100000, 999999);


    $msg = "Hey! " . $name . ". Your One Time Password(OTP) is $otp. If you want to reset password, then paste it on forget password form.";


    $mail->Body = $msg;

    if ($mail->send()) {
        $_SESSION["otp"] = $otp;
    }
}


// Check email exist or not

if (isset($_POST["send_otp"])) {

    $_SESSION["forget_pass_email"] = $email = $_POST["email"];

    $sel_user = $conn->prepare("SELECT * FROM `member`");
    $sel_user->execute();
    $sel_user = $sel_user->fetchAll();

    foreach ($sel_user as $row_user) {
        if ($email == $row_user["email"]) {
            $_SESSION["user_email"] = $row_user["email"];

            send_email($row_user["FirstName"]." ".$row_user["LastName"], $email);

            $_SESSION["form_succ"] = "OTP send Successfully";

            if (isset($_SERVER['HTTP_REFERER'])) {
                header("Location: " . $_SERVER['HTTP_REFERER'] . "");
            }
            return;
        }
        //
        else {
            $_SESSION["form_error"] = "Email ID is not Exist";
        }
    }

    $sel_admin = $conn->prepare("SELECT * FROM `admin`");
    $sel_admin->execute();
    $sel_admin = $sel_admin->fetchAll();

    foreach ($sel_admin as $row_admin) {
        if ($email == $row_admin["email"]) {
            $_SESSION["admin_email"] = $row_admin["email"];

            send_email($row_admin["name"], $email);

            $_SESSION["form_succ"] = "OTP send Successfully";

            if (isset($_SERVER['HTTP_REFERER'])) {
                header("Location: " . $_SERVER['HTTP_REFERER'] . "");
            }
            return;
        }
        //
        else {
            $_SESSION["form_error"] = "Email ID is not Exist";
        }
    }

    if (isset($_SERVER['HTTP_REFERER'])) {
        header("Location: " . $_SERVER['HTTP_REFERER'] . "");
    }
}
