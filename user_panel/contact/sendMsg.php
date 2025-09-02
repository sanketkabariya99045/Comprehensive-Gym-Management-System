<?php
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require("C:/xampp/htdocs/php/IFS/path.php");


function send_email($name, $email, $phone, $message)
{
    global $conn;
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

    $mail->setFrom($email);
    $mail->addAddress("sanketkabariyay8@gmail.com");

    $mail->isHTML(true);
    $mail->Subject = "$name sended a Message!";

    $msg = $message;

    $mail->Body = $msg;
    if ($mail->send()) {
        $_SESSION["success"] = "Message Sent Successfully";

        $notification = $conn->prepare("INSERT INTO notification VALUES ('','" . $_SESSION["email"] . "', '4', 'Congratulations! Your Message has been Sended Successfully.
            <br/><br/>Your Details:<br/>
            <b>Name: </b>$name<br/>
            <b>Phone: </b>$phone<br/>
            <b>Message: </b>$message<br/>', NOW(), 'Unread')");
        $notification->execute();
    }
    if (isset($_SERVER['HTTP_REFERER'])) {
        header("Location: " . $_SERVER['HTTP_REFERER'] . "");
    }
}

send_email($_POST["name"], $_POST["email"], $_POST["phone"], $_POST["message"]);
