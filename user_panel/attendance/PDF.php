<?php
session_start();
require("C:/xampp/htdocs/php/IFS/path.php");

$sel = $conn->prepare("SELECT * FROM attendance JOIN member ON member.email=attendance.email WHERE member.email='" . $_SESSION["email"] . "' ORDER BY attendance_id");
$sel->execute();
$sel = $sel->fetchAll();

$currentDate = new DateTime();
$yesterday = new DateTime();
$lastDate = date("Y-m-d");
foreach ($sel as $r) {
    if ((new DateTime($r["date"]))->format('Y-m-d') === $yesterday->format('Y-m-d')) {
        $lastDate = date("Y-m-d", strtotime($r["date"]));
    }
    $yesterday = (new DateTime($r["date"]))->modify('-1 day');
}

$html = "";
foreach ($sel as $r) {
    $html = "<!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Download Attendance Sheet</title>
    <link rel='stylesheet' href='http://localhost/php/IFS/css/bootstrap.min.css' type='text/css'>
</head>

<style>
@import url('https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100..700;1,100..700&family=Mukta:wght@200;300;400;500;600;700;800&family=Noto+Sans:ital,wght@0,100..900;1,100..900&family=Rubik:ital,wght@0,300..900;1,300..900&family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap');
* {
    margin: 0;
    padding: 0;
    font-family: 'Ubuntu', sans-serif;
}

#pdf {
    width: 90%;
    padding: 2.5%;
    margin: 2.5%;
    border: 2px solid #f2f2f2;
}

#pdf table {
    width: 100%;
    padding: 1% 0;
}

#header1 {
    position: relative;
    width: 100%;
}
#header1 #logo {
    width: 30%;
}
#pdf #logo img {
    width: 40%;
}
#pdf #company_details {
    width: 30%;
}
#pdf #company_details span {
    display: block;
    font-size: 13px;
}
    
#pdf #company_details #company {
    color: #f36100;
    font-size: 18px;
    font-weight: 600;
    line-height: 1.5;
}
.orange {
    color: #f36100;
}
td {
    border 1px solid #f2f2f2;
}
</style>

<body id='pdf'>
    <header id='header1'>
        <table>
            <tr>
                <td id='logo'>
                    <img src='" . HTTP_PATH . "/user_panel/darkLogo.png' alt='Logo'/>
                </td>

                <td id='company_details'>
                    <span id='company'>INVIGOR FITNESS STUDIO</span>
                    <span id='address'>123 Fitness Plaza, Near Shivranjani Crossroads Opposite Skyline Tower, Bodakdev Ahmedabad, Gujarat</span>
                    <span id='pincode'>380054</span>
                </td>
            </tr>
        </table>
    </header>
    <hr>
    
    <main>
        <h4 class='text-danger my-5 text-center'>Attendance ";
    if (isset($_POST["start_date"]) && $_POST["start_date"] != null && (isset($_POST["end_date"])) && $_POST["end_date"] != null) {
        $html .= "(" . $_POST["start_date"] . " - " . $_POST["end_date"] . ")";
    } else if (isset($_POST["start_date"]) && $_POST["start_date"] != null) {
        $html .= "(" . $_POST["start_date"] . " - " . date("Y-m-d") . ")";
    } else if (isset($_POST["end_date"]) && $_POST["end_date"] != null) {
        $html .= "($lastDate - " . $_POST["end_date"] . ")";
    } else {
        $html .= "($lastDate - " . date("Y-m-d") . ")";
    }

    $html .= "</h4>
        <table id='attendanceTable' class='table table-hover w-100'>
            <thead>
                <tr>
                    <th class='border py-2 px-3 fs orange'>ID</th>
                    <th class='border py-2 px-3 fs orange'>Name</th>
                    <th class='border py-2 px-3 fs orange'>Email</th>
                    <th class='border py-2 px-3 fs orange'>Date</th>
                    <th class='border py-2 px-3 fs orange'>Check-in</th>
                    <th class='border py-2 px-3 fs orange'>Check-out</th>
                    <th class='border py-2 px-3 fs orange'>Duration</th>
                    <th class='border py-2 px-3 fs orange'>Status</th>
                </tr>
            </thead>
            <tbody>";

    $startDate = new DateTime($_POST["start_date"]);
    $endDate = new DateTime($_POST["end_date"]);
    $interval = new DateInterval('P1D');

    if (isset($_POST["start_date"]) && $_POST["start_date"] != null && (isset($_POST["end_date"])) && $_POST["end_date"] != null) {
        $period = new DatePeriod($startDate, $interval, $endDate->modify('+1 day'));
        foreach ($period as $date) {
            $datesArray[] = $date->format('Y-m-d');
        }

        foreach ($sel as $r) {
            if (in_array(date("Y-m-d", strtotime($r["date"])), $datesArray)) {
                $html .= "<tr>
                        <td class='border py-2 px-3 fs'>" . $r['attendance_id'] . "</td>
                        <td class='border py-2 px-3 fs'>" . $r['FirstName'] . ' ' . $r['LastName'] . "</td>
                        <td class='border py-2 px-3 fs'>" . $r['email'] . "</td>
                        <td class='border py-2 px-3 fs'>" . $r['date'] . "</td>
                        <td class='border py-2 px-3 fs'>" . $r['check_in_time'] . "</td>
                        <td class='border py-2 px-3 fs'>" . $r['check_out_time'] . "</td>
                        <td class='border py-2 px-3 fs'>";
                $html .= ($r['session_duration'] > 0) ? $r['session_duration'] . " Minutes" : "0";
                $html .= "</td>
                        <td class='border py-2 px-3 fs'>" . $r['attendance_status'] . "</td>
                    </tr>";
            }
        }
    } else if (isset($_POST["start_date"]) && $_POST["start_date"] != null) {
        $period = new DatePeriod($startDate, $interval, date("Y-m-d"));
        foreach ($period as $date) {
            $datesArray[] = $date->format('Y-m-d');
        }

        foreach ($sel as $r) {
            if (in_array(date("Y-m-d", strtotime($r["date"])), $datesArray)) {
                $html .= "<tr>
                        <td class='border py-2 px-3 fs'>" . $r['attendance_id'] . "</td>
                        <td class='border py-2 px-3 fs'>" . $r['FirstName'] . ' ' . $r['LastName'] . "</td>
                        <td class='border py-2 px-3 fs'>" . $r['email'] . "</td>
                        <td class='border py-2 px-3 fs'>" . $r['date'] . "</td>
                        <td class='border py-2 px-3 fs'>" . $r['check_in_time'] . "</td>
                        <td class='border py-2 px-3 fs'>" . $r['check_out_time'] . "</td>
                        <td class='border py-2 px-3 fs'>";
                $html .= ($r['session_duration'] > 0) ? $r['session_duration'] . " Minutes" : "0";
                $html .= "</td>
                        <td class='border py-2 px-3 fs'>" . $r['attendance_status'] . "</td>
                    </tr>";
            }
        }
    } else if (isset($_POST["end_date"]) && $_POST["end_date"] != null) {
        $period = new DatePeriod($lastDate, $interval, $endDate->modify('+1 day'));
        foreach ($period as $date) {
            $datesArray[] = $date->format('Y-m-d');
        }

        foreach ($sel as $r) {
            if (in_array(date("Y-m-d", strtotime($r["date"])), $datesArray)) {
                $html .= "<tr>
                        <td class='border py-2 px-3 fs'>" . $r['attendance_id'] . "</td>
                        <td class='border py-2 px-3 fs'>" . $r['FirstName'] . ' ' . $r['LastName'] . "</td>
                        <td class='border py-2 px-3 fs'>" . $r['email'] . "</td>
                        <td class='border py-2 px-3 fs'>" . $r['date'] . "</td>
                        <td class='border py-2 px-3 fs'>" . $r['check_in_time'] . "</td>
                        <td class='border py-2 px-3 fs'>" . $r['check_out_time'] . "</td>
                        <td class='border py-2 px-3 fs'>";
                $html .= ($r['session_duration'] > 0) ? $r['session_duration'] . " Minutes" : "0";
                $html .= "</td>
                        <td class='border py-2 px-3 fs'>" . $r['attendance_status'] . "</td>
                    </tr>";
            }
        }
    } else {
        foreach ($sel as $r) {
            $html .= "<tr>
                        <td class='border py-2 px-3 fs'>" . $r['attendance_id'] . "</td>
                        <td class='border py-2 px-3 fs'>" . $r['FirstName'] . ' ' . $r['LastName'] . "</td>
                        <td class='border py-2 px-3 fs'>" . $r['email'] . "</td>
                        <td class='border py-2 px-3 fs'>" . $r['date'] . "</td>
                        <td class='border py-2 px-3 fs'>" . $r['check_in_time'] . "</td>
                        <td class='border py-2 px-3 fs'>" . $r['check_out_time'] . "</td>
                        <td class='border py-2 px-3 fs'>";
            $html .= ($r['session_duration'] > 0) ? $r['session_duration'] . " Minutes" : "0";
            $html .= "</td>
                        <td class='border py-2 px-3 fs'>" . $r['attendance_status'] . "</td>
                    </tr>";
        }
    }
    $html .= "</tbody>
        </table>
    </main>
</body>

</html>";
}