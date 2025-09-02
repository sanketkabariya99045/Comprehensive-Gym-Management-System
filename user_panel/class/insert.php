<?php
session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require("C:/xampp/htdocs/php/IFS/path.php");

class Membership
{
    public $name;
    public $email;
    public $phone;
    public $gender;
    public $dob;
    public $membership_type;
    public $start_date;
    public $end_date;
    public $status;
    public $membership_fee;
    public $created_at;
    public $updated_at;
    public $goal;
    public $weight;
    public $height;
    public $medical_condition;
    public $experience;
    public $plan_duration;
    public $payment_type;
    public $payment_status;
    public $address;
    public $timing;

    function setValue()
    {
        $this->name = $_SESSION["name"];
        $this->email = $_SESSION["email"];
        $this->phone = $_SESSION["phone"];
        $this->gender = $_SESSION["gender"];
        $this->dob = $_SESSION["dob"];
        $this->membership_type = $_SESSION["membership_type"];
        $this->start_date = $_SESSION["start_date"];
        $this->end_date = $_SESSION["end_date"];
        $this->status = 1;
        $this->membership_fee = $_SESSION["membership_fee"];
        $this->goal = $_SESSION["goal"];
        $this->weight = $_SESSION["weight"];
        $this->height = $_SESSION["height"];
        $this->medical_condition = $_SESSION["medical_condition"];
        $this->experience = $_SESSION["experience"];
        $this->plan_duration = $_SESSION["plan_duration"];

        $this->payment_type = $_SESSION["payment_type"];
        $this->payment_status = $_SESSION["payment_status"];

        $this->address = $_SESSION["address"];
        $this->timing = $_SESSION["timing"];
    }

    function insertValue()
    {
        global $conn;

        if (isset($_SESSION["renew"])) {
            $insert = $conn->prepare("INSERT INTO `membership` VALUES('', '" . $this->email . "','" . $this->membership_type . "', '" . $this->start_date . "', '" . $this->end_date . "', '" . $this->status . "', '" . $this->membership_fee . "', NOW(), NOW(), '" . $this->goal . "', '" . $this->weight . "', '" . $this->height . "', '" . $this->medical_condition . "', '" . $this->experience . "', '" . $this->plan_duration . "', '" . $this->payment_type . "', '" . $this->payment_status . "','" . $this->timing . "')");

            $notification = $conn->prepare("INSERT INTO notification VALUES ('','" . $_SESSION["email"] . "', '1', 'Congratulations! Your Membership has been Renewed Successfully.
            <br/><br/>Membership Details:<br/>
    <b>Plan: </b>" . $this->membership_type . "<br/>
    <b>Start Date: </b>" . $this->start_date . "<br/>
    <b>End Date: </b>" . $this->end_date . "<br/>
    <b>Access Hours: </b>" . $this->timing . "<br/>
    <b>Payment Type: </b>" . $this->payment_type . "<br/>
    <b>Payment Type: </b>" . $this->payment_status . "', NOW(), 'Unread')");
        }
        //
        else {
            $insert = $conn->prepare("INSERT INTO `membership` VALUES('', '" . $this->email . "','" . $this->membership_type . "', '" . $this->start_date . "', '" . $this->end_date . "', '" . $this->status . "', '" . $this->membership_fee . "', NOW(), '0000-00-00 00:00:00', '" . $this->goal . "', '" . $this->weight . "', '" . $this->height . "', '" . $this->medical_condition . "', '" . $this->experience . "', '" . $this->plan_duration . "', '" . $this->payment_type . "', '" . $this->payment_status . "','" . $this->timing . "')");

            $notification = $conn->prepare("INSERT INTO notification VALUES ('','" . $_SESSION["email"] . "', '1', 'Congratulations on taking the first step toward a stronger, healthier you! We are thrilled to welcome you to the INVIGOR FITNESS STUDIO family. Your membership is now active, and we can not wait to help you achieve your fitness goals.<br/><br/><b>Membership Details:</b><br/>
    <b>Plan: </b>" . $this->membership_type . "<br/>
    <b>Start Date: </b>" . $this->start_date . "<br/>
    <b>End Date: </b>" . $this->end_date . "<br/>
    <b>Access Hours: </b>" . $this->timing . "<br/>
    <b>Payment Type: </b>" . $this->payment_type . "<br/>
    <b>Payment Type: </b>" . $this->payment_status . "', NOW(), 'Unread')");
        }

        if ($insert->execute() && $notification->execute()) {
            $this->name = explode(" ", $this->name);

            $up = $conn->prepare("UPDATE `member` SET `FirstName`='" . $this->name[0] . "',`LastName`='" . $this->name[1] . "',`phone`='" . $this->phone . "',`gender`='" . $this->gender . "',`dob`='" . $this->dob . "',`address`='" . serialize($this->address) . "',`MembershipStatus`='Active',`JoinDate`='" . $this->start_date . "' WHERE `email`='" . $_SESSION["email"] . "'");

            $up->execute();

            send_email($this->name, $this->email, $this->membership_type, $this->start_date, $this->end_date, $this->timing);

            $_SESSION["mem_succ"] = "Congratulations! " . $this->name[0] . " " . $this->name[1] . ", Your Membership has been activated for " . $this->plan_duration;

            if (isset($_SESSION["renew"])) {
                header("Refresh:0, url=" . HTTP_PATH . "/user_panel/membership/membership.php");
            } else {
                header("Refresh:0, url=" . HTTP_PATH . "/user_panel/class/class-details.php");
            }
        }
    }
}
$membership = new Membership();
$membership->setValue();
$membership->insertValue();


//! Send Email
function send_email($name, $email, $membership_type, $start_date, $end_date, $timing)
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
    $mail->Subject = "Welcome to INVIGOR FITNESS STUDIO - Let's Crush Your Fitness Goals!";

    $msg = "Congratulations on taking the first step toward a stronger, healthier you! We're thrilled to welcome you to the INVIGOR FITNESS STUDIO family. Your membership is now active, and we can't wait to help you achieve your fitness goals.
    <br/><br/>
Here's what's next:<br/>
✅ Membership Details:<br/>
Plan: $membership_type<br/>
Start Date: $start_date<br/>
End Date: $end_date<br/>
Access Hours: $timing
<br/><br/>
Facilities: Full access to weightlifting zones, cardio equipment etc.
<br/><br/>
📍 Gym Location: 123 Fitness Plaza, Near Shivranjani Crossroads Opposite Skyline Tower, Bodakdev Ahmedabad, Gujarat - 380054
<br/><br/>
🔑 How to Access: Use your member ID (attached) at the front desk
<br/><br/>
Pro Tip: Check out our [class schedule/personal training options] to maximize your results. Book sessions via our Website or at the front desk!
<br/><br/>
Need help or have questions? Reply to this email or call us at +91 98765 43210. Our team is here to support you.
<br/><br/>
Let's make every rep count! 💪
<br/>
See you at the gym,<br/>
John Carter<br/>
Manager of the INVIGOR FITNESS STUDIO<br/>
INVIGOR FITNESS STUDIO<br/>
+91 98765 43210
<br/><br/>
Why this works:<br/>
Warm & motivating tone - Celebrates their decision and builds excitement.<br/>
Clear next steps - Avoids confusion with key details upfront.<br/>
Call-to-action - Encourages engagement (booking classes, asking questions).<br/>
Brand personality - Adjust emojis/formality to match your gym's vibe (e.g., more hardcore or community-focused).";

    $mail->Body = $msg;
    $mail->send();
}
