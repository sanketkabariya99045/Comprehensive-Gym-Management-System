<?php
session_start();
require("C:/xampp/htdocs/php/IFS/path.php");
include(DRIVE_PATH . "../database.php");

if (isset($_GET["MemberID"])) {
    $_SESSION["MemberID"] = $_GET["MemberID"];
}

$sel = $conn->prepare("SELECT * FROM member JOIN membership WHERE member.email='" . $_SESSION["email"] . "' AND membership.MemberID='" . $_SESSION["MemberID"] . "'");
$sel->execute();
$sel = $sel->fetchAll();

$html = "";
foreach ($sel as $row) {
    $html = "<!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Download Invoice</title>
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

#header2 {
    padding: 0 1%;
}
#header2 span {
    display: block;
    font-size: 13px;
font-weight: 400;
}
#pdf #user_details {
    width: 50%;
}

#pdf #user_details #heading {
    display: inline;
    color: #f36100;
    font-size: 18px;
    font-weight: 700;
    line-height: 1.5;
}

#pdf #user_details #email {
    font-size: 13px;
    font-weight: 600;
    }
    
#pdf #invoice_details {
    width: 40%;
    text-align: right;
}
#pdf #invoice_details>span {
    font-size: 13px;
    line-height: 1.2;
}
#pdf #invoice_details>span:nth-of-type(odd) {
    font-size: 15px;
    font-weight: 600;
    padding-top: 2%;
}
#pdf #invoice_details>span:nth-of-type(even) {
    font-weight: 500;
}
.fs {
    font-size: 13px;
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
    <hr>";

    $address = ($row["address"] != null) ? unserialize($row["address"])[0] . " " . unserialize($row["address"])[1] . " near " . unserialize($row["address"])[2] . ", " . unserialize($row["address"])[3] . " - " . unserialize($row["address"])[4] : "";

    $html .= "<header id='header2'>
        <table>
            <tr>
                <td id='user_details'>
                    <span id='heading'>MEMBER INFO:</span>
                    <span id='email'>" . $_SESSION["email"] . "</span>
                    <span id='address'>" . $address . "</span>
                </td>
                <td id='invoice_details'>
                    <span>Membership ID</span>
                    <span>" . $row["MemberID"] . "</span>
                    <span>Membership Status</span>
                    <span>" . $row["status"] . "</span>
                    <span>Payment Type</span>
                    <span>" . $row["payment_type"] . "</span>
                    <span>Payment Status</span>
                    <span class='" . (($row["payment_status"] == "Pending") ? "text-danger" : "text-success") . "'>" . $row["payment_status"] . "</span>
                </td>
            </tr>
        </table>
    </header>
    <hr>

    <main>
        <h4 class='text-danger my-3'>Personal Information</h4>
        <table>
            <tr>
                <th class='border py-2 px-3 fs orange'>Name</th>
                <th class='border py-2 px-3 fs orange'>Phone</th>
                <th class='border py-2 px-3 fs orange'>Weight</th>
                <th class='border py-2 px-3 fs orange'>Height</th>
                <th class='border py-2 px-3 fs orange'>Goal</th>
                <th class='border py-2 px-3 fs orange'>Medical Condition</th>
                <th class='border py-2 px-3 fs orange'>Experience</th>
            </tr>

            <tr>
                <td class='border py-2 px-3 fs'>" . $row["FirstName"] . " " . $row["LastName"] . "</td>
                <td class='border py-2 px-3 fs'>" . $row["phone"] . "</td>
                <td class='border py-2 px-3 fs'>" . $row["weight"] . "KG</td>
                <td class='border py-2 px-3 fs'>" . $row["height"] . "CM</td>
                <td class='border py-2 px-3 fs'>" . $row["goal"] . "</td>
                <td class='border py-2 px-3 fs'>" . $row["medical_condition"] . "</td>
                <td class='border py-2 px-3 fs'>" . $row["experience"] . "</td>
            </tr>
        </table>


        <h4 class='text-danger mb-3 mt-5'>Membership Details</h4>
        <table>
            <tr>
                <th class='border py-2 px-3 fs orange'>SR.</th>
                <th class='border py-2 px-3 fs orange'>Membership Type</th>
                <th class='border py-2 px-3 fs orange'>Created At</th>
                <th class='border py-2 px-3 fs orange'>Updated At</th>
                <th class='border py-2 px-3 fs orange'>Fee</th>
                <th class='border py-2 px-3 fs orange'>Plan Duration</th>
                <th class='border py-2 px-3 fs orange'>Timing</th>
            </tr>

            <tr>
                <td class='border py-2 px-3 fs'>1.</td>
                <td class='border py-2 px-3 fs'>" . $row["membership_type"] . "</td>
                <td class='border py-2 px-3 fs'>" . $row["created_at"] . "</td>
                <td class='border py-2 px-3 fs'>" . $row["updated_at"] . "</td>
                <td class='border py-2 px-3 fs'>&#8377;" . $row["membership_fee"] . "</td>
                <td class='border py-2 px-3 fs'>" . $row["plan_duration"] . "</td>
                <td class='border py-2 px-3 fs'>&#8377;" . $row["timing"] . "</td>
            </tr>
        </table>
    </main>
</body>

</html>";
}
