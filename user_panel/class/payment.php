<?php
session_start();

use Razorpay\Api\Api;
use function PHPSTORM_META\map;

require("C:/xampp/htdocs/php/IFS/path.php");

function setValues($membership_type, $name, $phone, $gender, $dob, $start_date, $end_date, $membership_fee, $goal, $weight, $height, $medical_condition, $experience, $plan_duration, $payment_type, $address, $timing)
{
    $_SESSION["membership_type"] = $membership_type;
    $_SESSION["name"] = $name;
    $_SESSION["phone"] = $phone;
    $_SESSION["gender"] = $gender;
    $_SESSION["dob"] = $dob;
    $_SESSION["start_date"] = $start_date;
    $_SESSION["end_date"] = $end_date;
    $_SESSION["status"] = 1;
    $_SESSION["membership_fee"] = $membership_fee;
    $_SESSION["goal"] = $goal;
    $_SESSION["weight"] = $weight;
    $_SESSION["height"] = $height;
    $_SESSION["medical_condition"] = $medical_condition;
    $_SESSION["experience"] = $experience;
    $_SESSION["plan_duration"] = $plan_duration;
    $_SESSION["payment_type"] = $payment_type;

    ($_SESSION["payment_type"] == "Razorpay") ? $_SESSION["payment_status"] = "Paid" : "Pending";
    $_SESSION["address"] = $address;
    $_SESSION["timing"] = $timing;
}


if (isset($_POST["renew_submit"])) {
    $sel = $conn->prepare("SELECT * FROM membership JOIN member ON member.email=membership.email WHERE membership.MemberID=" . $_POST["MemberID"] . "");
    $sel->execute();
    $sel = $sel->fetchAll();
    $sel = $sel[0];

    setValues($sel["membership_type"], $sel["FirstName"] . " " . $sel["LastName"], $sel["phone"], $sel["gender"], $sel["dob"], $_POST["start_date"], $sel["end_date"], $sel["membership_fee"], $sel["goal"], $sel["weight"], $sel["height"], $sel["medical_condition"], $sel["experience"], $sel["plan_duration"], $_POST["payment_type"], $sel["address"], $sel["timing"]);

    $_SESSION["renew"] = true;
}
//
else if (isset($_POST["renew_cancel"])) {
    unset($_SESSION["renew"]);
?>
    <script>
        history.go(-3);
    </script>
<?php
}
//
else if (isset($_POST["fresh_submit"])) {
    unset($_SESSION["renew"]);

    if (str_contains($_POST["dob"], "-")) {
        $_POST["dob"] = date("Y/m/d", strtotime($_POST["dob"]));
    } else {
        $_POST["dob"] = explode("/", $_POST["dob"]);
        $_POST["dob"] = $_POST["dob"][2] . "/" . $_POST["dob"][1] . "/" . $_POST["dob"][0];
    }

    $_POST["start_date"] = date("Y/m/d", strtotime($_POST["start_date"]));

    if ($_SESSION["membership_type"] == 1) {
        $_POST["end_date"] = date("Y/m/d", strtotime("+1 day"));
    } else if ($_SESSION["membership_type"] == 2) {
        $_POST["end_date"] = date("Y/m/d", strtotime("+12 months"));
    } else {
        $_POST["end_date"] = date("Y/m/d", strtotime("+6 months"));
    }

    if ($_SESSION["membership_type"] == 1) {
        $_POST["plan_duration"] = "1 Day";
    } else if ($_SESSION["membership_type"] == 2) {
        $_POST["plan_duration"] = "12 Months";
    } else {
        $_POST["plan_duration"] = "6 Months";
    }

    ($_POST["payment_type"] == "Razorpay") ? $payment_status = "Paid" : "Pending";

    $_POST["address"] = [$_POST["house-number"], $_POST["apartment"], $_POST["suite"], $_POST["city"], $_POST["pincode"]];

    setValues($_SESSION["membership_type"], $_POST["name"], $_POST["phone"], $_POST["phone"], $_POST["dob"], $_POST["start_date"], $_POST["end_date"], $_SESSION["membership_fee"], $_POST["goal"], $_POST["weight"], $_POST["height"], $_POST["medical_condition"], $_POST["experience"], $_POST["plan_duration"], $_POST["payment_type"], $_POST["address"], $_POST["timing"]);
} ?>

<input type="hidden" class="name" value="<?php echo $_SESSION["name"]; ?>" />
<input type="hidden" class="email" value="<?php echo $_SESSION["email"]; ?>" />
<input type="hidden" class="phone" value="<?php echo $_SESSION["phone"]; ?>" />
<input type="hidden" class="address" value="<?php echo $_SESSION["address"]; ?>" />





<?php //! Payment
if ($_POST["payment_type"] == "Razorpay") {
    require DRIVE_PATH . "/user_panel/class/payment/vendor/autoload.php";

    $api_key = "rzp_test_omt6wXyJiqN0lX";
    $api_secret = "7e63a7DNPonx2Rh3WoDMR3fj";

    $api = new Api($api_key, $api_secret);

    $res = $api->order->create(array(
        'receipt' => '123',
        'amount' => $_SESSION["membership_fee"] * 100,
        'currency' => 'INR'
    ));
    if (!empty($res["id"])) {
?>
        <script src="https://checkout.razorpay.com/v1/checkout.js"></script>

        <script>
            $(document).ready(function() {
                let name = $(".name").val();
                let email = $(".email").val();
                let phone = $(".phone").val();

                var options = {
                    "key": "rzp_test_omt6wXyJiqN0lX",
                    "amount": <?php echo $_SESSION["membership_fee"] * 100; ?>,
                    "currency": "INR",
                    "name": "INVIGOR FITNESS STUDIO",
                    "description": "INVIGOR FITNESS STUDIO is a fitness-focused website offering information about gym facilities, membership plans, training programs, and expert coaching.",
                    "image": "<?php echo HTTP_PATH . "/user_panel/darkLogo.png"; ?>",
                    "order_id": "<?php echo $res["id"]; ?>",
                    "handler": function(response) {
                        location.href = "insert.php";
                    },
                    "prefill": {
                        "name": name,
                        "email": email,
                        "contact": "+91 " + phone
                    },
                    "notes": {
                        "address": "123 Fitness Plaza, Near Shivranjani Crossroads Opposite Skyline Tower, Bodakdev Ahmedabad, Gujarat - 380054"
                    },
                    "theme": {
                        "color": "#f36100"
                    }
                };
                var rzp1 = new Razorpay(options);
                rzp1.open();
                rzp1.on('payment.failed', function(response) {
                    alert("Transaction Failed");
                });
            });
        </script>
    <?php
    }
} else { ?>
    <script>
        location.href = "insert.php";
    </script>
<?php } ?>

<script>
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
</script>