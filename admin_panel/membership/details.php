<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />

    <title>Membership Details</title>
    <?php include("C:/xampp/htdocs/php/IFS/admin_panel/links.php"); ?>
</head>

<style>
    .memberships i {
    color: green !important;
  }

  .memberships h5 {
    color: green !important;
  }
</style>

<?php
if (isset($_GET["MemberID"])) {
    $_SESSION["MemberID"] = $_GET["MemberID"];
}
?>

<body class="">
    <div class="wrapper ">
        <!-- // Sidebar -->
        <?php include(DRIVE_PATH . "/admin_panel/sidenav.php"); ?>

        <div class="main-panel">
            <?php include(DRIVE_PATH . "/admin_panel/header/header.php"); ?>

            <div class="content">
                <div class="card">
                    <h6 class="mx-5 py-3" style="color: red;">Membership Details of ID:- <?php echo $_SESSION["MemberID"]; ?></h6>
                </div>

                <?php
                $sel = $conn->prepare("SELECT * FROM membership JOIN member ON member.email=membership.email WHERE membership.MemberID=" . $_SESSION["MemberID"] . "");
                $sel->execute();
                $sel = $sel->fetchAll();
                $i = 1;

                foreach ($sel as $r) { ?>
                    <div class="card px-3 py-0 my-5 overflow-hidden">
                        <h4 class="text-center text-danger">Member Details</h4>
                        <div class="row text-light pt-4" style="background-color: #d9d9d9;">
                            <div class="col-md-2">
                                <h6>Name</h6>
                            </div>
                            <div class="col-md-2">
                                <h6>Email</h6>
                            </div>
                            <div class="col-md-2">
                                <h6>Phone</h6>
                            </div>
                            <div class="col-md-1">
                                <h6>Gender</h6>
                            </div>
                            <div class="col-md-2">
                                <h6>Date of Birth</h6>
                            </div>
                            <div class="col-md-1">
                                <h6>Weight</h6>
                            </div>
                            <div class="col-md-1">
                                <h6>Height</h6>
                            </div>
                        </div>
                        <div class="row py-3 border-bottom">
                            <div class="col-md-2"><?php echo $r["FirstName"] . " " . $r["LastName"]; ?></div>
                            <div class="col-md-2"><?php echo $r["email"]; ?></div>
                            <div class="col-md-2"><?php echo $r["phone"]; ?></div>
                            <div class="col-md-1"><?php echo $r["gender"]; ?></div>
                            <div class="col-md-2"><?php echo date("d/m/Y", strtotime($r["dob"])); ?></div>
                            <div class="col-md-1"><?php echo $r["weight"] . "KG"; ?></div>
                            <div class="col-md-1"><?php echo $r["height"] . "CM"; ?></div>
                        </div>


                        <h4 class="text-center text-danger">Membership Details</h4>
                        <div class="row text-light pt-4" style="background-color: #d9d9d9;">
                            <div class="col-md-1">
                                <h6>Membership ID</h6>
                            </div>
                            <div class="col-md-2">
                                <h6>Type</h6>
                            </div>
                            <div class="col-md-2">
                                <h6>Start Date - End Date</h6>
                            </div>
                            <div class="col-md-1">
                                <h6>Status</h6>
                            </div>
                            <div class="col-md-1">
                                <h6>Fees</h6>
                            </div>
                            <div class="col-md-2">
                                <h6>Timing</h6>
                            </div>
                            <div class="col-md-1">
                                <h6>Plan Duration</h6>
                            </div>
                            <div class="col-md-1">
                                <h6>Payment Type</h6>
                            </div>
                            <div class="col-md-1">
                                <h6>Payment Status</h6>
                            </div>
                        </div>

                        <div class="row py-3 border-bottom">
                            <div class="col-md-1"><?php echo $r["MemberID"]; ?></div>
                            <div class="col-md-2"><?php echo $r["membership_type"]; ?></div>
                            <div class="col-md-2"><?php echo date("d/m/Y", strtotime($r["start_date"])) . " - " . date("d/m/Y", strtotime($r["end_date"])); ?></div>
                            <div class="col-md-1"><?php echo $r["status"] ?></div>
                            <div class="col-md-1"><?php echo "&#8377; " . $r["membership_fee"]; ?></div>
                            <div class="col-md-2"><?php echo $r["timing"]; ?></div>
                            <div class="col-md-1"><?php echo $r["plan_duration"]; ?></div>
                            <div class="col-md-1"><?php echo $r["payment_type"]; ?></div>
                            <div class="col-md-1"><?php echo ($r["payment_type"] == "Razorpay") ? "Paid" : "Pending"; ?></div>
                        </div>



                        <h4 class="text-center text-danger">Other Information</h4>
                        <div class="row text-light pt-4" style="background-color: #d9d9d9;">
                            <div class="col-md-2">
                                <h6>Creation Time</h6>
                            </div>
                            <div class="col-md-2">
                                <h6>Updation Time</h6>
                            </div>
                            <div class="col-md-1">
                                <h6>Goal</h6>
                            </div>
                            <div class="col-md-2">
                                <h6>Medical Condition</h6>
                            </div>
                            <div class="col-md-2">
                                <h6>Experience</h6>
                            </div>
                            <div class="col-md-3">
                                <h6>Address</h6>
                            </div>
                        </div>

                        <div class="row py-3 border-bottom">
                            <div class="col-md-2"><?php echo date("d/m/Y h:ia", strtotime($r["created_at"])); ?></div>
                            <div class="col-md-2"><?php echo date("d/m/Y h:ia", strtotime($r["updated_at"])); ?></div>
                            <div class="col-md-1"><?php echo $r["goal"] ?></div>
                            <div class="col-md-2"><?php echo $r["medical_condition"]; ?></div>
                            <div class="col-md-2"><?php echo $r["experience"]; ?></div>

                            <?php $address = unserialize($r["address"])[0] . " " . unserialize($r["address"])[1] . " near " . unserialize($r["address"])[2] . ", " . unserialize($r["address"])[3] . " - " . unserialize($r["address"])[4]; ?>
                            <div class="col-md-3"><?php echo $address; ?></div>
                        </div>
                    </div>
                <?php $i++;
                } ?>
            </div>
        </div>

        <footer class="footer footer-black  footer-white ">
            <?php include(DRIVE_PATH . "/admin_panel/footer/footer.php"); ?>
        </footer>
    </div>
</body>

</html>