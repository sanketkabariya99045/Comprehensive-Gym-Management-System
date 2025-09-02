<?php
session_start();
require("C:/xampp/htdocs/php/IFS/path.php");

if (isset($_GET["MemberID"]))
    $_SESSION["MemberID"] = $_GET["MemberID"];
?>

<style>
    :root {
        --primary: #fd7e14;
        --primary-dark: #ff5e14;
        --secondary: #3182ce;
        --dark: #1a1a2e;
        --darker: #16213e;
        --light: #f8f9fa;
        --gray: #6c757d;
        --success: #28a745;
        --danger: #dc3545;
        --warning: #fd7e14;
    }

    .brightness {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100vh;
        opacity: 0.6;
        background-color: black;
        z-index: 9999;
    }

    .renew-modal {
        width: 50%;
        position: fixed;
        top: 20%;
        left: 50%;
        transform: translate(-50%, 0);
        z-index: 10000;
    }
</style>

<script>
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
</script>

<!-- //! Renew Form Modal -->
<div class="brightness"></div>
<div class="renew-modal card">
    <form action="<?php echo HTTP_PATH . "/user_panel/class/payment.php"; ?>" method="post" class="form-group">
        <h2 style="background-color: var(--primary);" class="text-light px-5 py-4">Are You Sure to Renew Your Membership?</h2>
        <div class="form-row px-5 pt-4">
            <input type="hidden" name="MemberID" value="<?php echo $_SESSION["MemberID"]; ?>" />
            <h5 style="color: var(--primary);" class="my-2">Start Date</h5>
            <input type="date" name="start_date" class="form-control" required />
        </div>
        <div class="form-row px-5 py-4">
            <h5 style="color: var(--primary);" class="my-2">Payment Type</h5>
            <select name="payment_type" class="form-control">
                <option disabled selected>Select Payment Type</option>
                <option value="Cash">Cash</option>
                <option value="Razorpay">Razorpay</option>
            </select>
        </div>
        <div class="form-row px-5">
            <button class="btn text-light mr-3" name="renew_submit" style="background-color: var(--primary);">Submit</button>
            <button class="btn btn-danger" name="renew_cancel">Cancel</button>
        </div>
    </form>
</div>