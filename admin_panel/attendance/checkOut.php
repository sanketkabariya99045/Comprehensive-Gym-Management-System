<?php
session_start();

include("C:/xampp/htdocs/php/IFS/admin_panel/links.php");

if (isset($_POST["submit"])) {
    $sel = $conn->prepare("SELECT EXISTS(SELECT 1 FROM member WHERE email = '" . $_POST["email"] . "') AS email_exists");
    $sel->execute();
    $sel = $sel->fetchAll();
    
    if (isset($sel[0]["email_exists"])) {
        $sel = $sel[0];
        $today = date("Y-m-d");
        $sel = $conn->prepare("SELECT * FROM `attendance` WHERE DATE(check_in_time)='$today' AND `check_out_time`='0000-00-00 00:00:00' AND `email`='" . $_POST["email"] . "'");
        $sel->execute();
        $sel = $sel->fetchAll();
        $sel = $sel[0];
        $attendance_id = $sel["attendance_id"];
        
        date_default_timezone_set('Asia/Kolkata');
        $startTime = date("H:i", strtotime($sel["check_in_time"]));
        $endTime = date("H:i");
        
        $session_duration = calculateDurationInMinutes($startTime, $endTime);
        
        $up = $conn->prepare("UPDATE `attendance` SET `check_out_time`=CURRENT_TIME(), `session_duration`=$session_duration WHERE DATE(check_in_time)='$today' AND `check_out_time`='0000-00-00 00:00:00' AND `email`='" . $_POST["email"] . "'");
        $up->execute();
        $_SESSION["success"] = "Check Out Time Recorded Successfully for " . $_POST["email"];
        


        $sel = $conn->prepare("SELECT * FROM `attendance` WHERE `attendance_id`='$attendance_id'");
        $sel->execute();
        $sel = $sel->fetchAll();
        $sel = $sel[0];

        $notification = $conn->prepare("INSERT INTO notification VALUES ('','" . $_POST["email"] . "', '2', 'Your Check-Out at <strong>INVIGOR FITNESS STUDIO</strong> has been Successfully Recorded. Thank You for your valuable Time.
            <br/><br/>Your Attendance Details:<br/>
            <b>Attendance ID: </b>" . $attendance_id . "<br/>
            <b>Date: </b>" . date("m d, Y", strtotime($sel["date"])) . "<br/>
            <b>Check In Time: </b>" . date("H:i A", strtotime($sel["check_in_time"])) . "<br/>
            <b>Check Out Time: </b>" . date("H:i A", strtotime($sel["check_out_time"])) . "<br/>
            <b>Session Duration: </b>" . $sel["session_duration"] . "min<br/>', NOW(), 'Unread')");
        $notification->execute();
    }
    //
    else {
        $_SESSION["error"] = "This Member is not Exist";
    }

    if (isset($_SERVER["HTTP_REFERER"])) {
        header("Location: " . $_SERVER["HTTP_REFERER"]);
    }
}


function calculateDurationInMinutes($startTime, $endTime)
{
    // Create DateTime objects from the time strings
    $start = DateTime::createFromFormat('H:i', $startTime);
    $end = DateTime::createFromFormat('H:i', $endTime);

    // If creation failed (invalid format), try with seconds included
    if (!$start || !$end) {
        $start = DateTime::createFromFormat('H:i:s', $startTime);
        $end = DateTime::createFromFormat('H:i:s', $endTime);
    }

    // If still not valid, return false
    if (!$start || !$end) {
        return false;
    }

    // Handle case where end time is earlier than start time (overnight)
    if ($end < $start) {
        $end->modify('+1 day');
    }

    // Calculate the difference
    $interval = $start->diff($end);

    // Convert to total minutes
    $minutes = ($interval->h * 60) + $interval->i;

    return $minutes;
}
