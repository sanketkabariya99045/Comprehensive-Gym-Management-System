<?php
session_start();
require("C:/xampp/htdocs/php/IFS/path.php");

if (isset($_SESSION["pass_changed"])) {
    unset($_SESSION["pass_changed"]);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Something?</title>
</head>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100..700;1,100..700&family=Mukta:wght@200;300;400;500;600;700;800&family=Noto+Sans:ital,wght@0,100..900;1,100..900&family=Rubik:ital,wght@0,300..900;1,300..900&display=swap');

    body {
        background-color: #111111;
    }

    /* Forget Password Form Main */
    .forgot-main-form {
        position: absolute;
        top: 10%;
        left: 50%;
        transform: translate(-50%, 0);
        width: 70%;
        margin: auto;
        border-radius: 0.4rem;
        box-shadow: 0px 0px 10px 3px #282a35;
        background-color: white;
        overflow: hidden;
    }

    .forgot-main-form>div {
        display: inline-block;
        width: 48%;
        padding: 3%;
        position: relative;
        font-family: "Mukta", sans-serif;
    }

    /* //! Left Image */
    .left_img {
        width: 100%;
    }

    .left_img img {
        width: 100%;
    }

    /* //! Forget password Form */
    #forgot_pass_form {
        position: relative;
        padding: 3%;
    }
    .alert {
        width: 100%;
        position: absolute;
        top: 3%;
        left: 2%;
        font-weight: 700;
        filter: contrast(110%);
    }

    #forgot_pass_form span {
        display: block;
    }

    #forgot_pass_form #heading {
        color: black;
        font-size: 22px;
        font-weight: 600;
        padding-top: 2.5rem;
    }

    #forgot_pass_form #definition {
        color: gray;
        font-size: 19px;
        font-weight: 500;
        line-height: 1.2;
        margin: 1.5% 0;
    }

    #forgot_pass_form form {
        padding: 2% 0;
    }

    #forgot_pass_form label {
        color: #2a7189;
        display: block;
        font-size: 17px;
        margin-top: 5%;
        line-height: 1;
    }

    #forgot_pass_form input {
        width: 100%;
        padding: 1% 2%;
        font-size: 15px;
        border: 1px solid gray;
        outline: none;
        border-bottom: 3px solid gray;
        border-radius: 3px;
    }

    #forgot_pass_form input[name="otp"] {
        width: 50%;
    }

    /* //! Form Buttons */
    #forgot_pass_form .btns {
        padding: 3% 0;
    }

    #forgot_pass_form input[type="submit"],
    #forgot_pass_form input[type="reset"] {
        font-size: 17px;
        color: white;
        width: fit-content;
        padding: 0.8% 4%;
        margin-right: 1.5%;
        border: none;
        background-color: black;
    }

    #forgot_pass_form input[type="submit"]:hover,
    #forgot_pass_form input[type="reset"]:hover {
        scale: 0.98;
    }


    /* //! Media Queries */
    @media (max-width: 1100px) {
        .forgot-main-form {
            width: 75%;
        }
    }

    @media (max-width: 950px) {
        .forgot-main-form {
            width: 85%;
        }
    }

    @media (max-width: 850px) {
        .forgot-main-form {
            width: 95%;
            box-shadow: 0px 0px 3px 2px #f2f2f2;
            border-radius: 6px;
        }
    }

    @media (max-width: 550px) {
        .forgot-main-form {
            width: 100%;
            margin-top: 5%;
            box-shadow: none;
            border-radius: none;
        }
    }

    @media (max-width: 450px) {
        .forgot-main-form {
            display: block;
            width: 85%;
            margin: auto;
        }
    }
</style>

<script>
    $(document).ready(function() {
        $(".alert").fadeOut(10000);
    });
</script>

<body>

    <div class="forgot-main-form">
        <div class="left_img">
            <img src="<?php echo HTTP_PATH . "/user_panel/login/forgot_pass/forget_pass.jpg"; ?>" alt="img not found">
        </div>

        <div id="forgot_pass_form">
            <?php if (isset($_SESSION["form_error"])) { ?>
                <div class="alert alert-danger"><?php echo $_SESSION["form_error"]; ?></div>
            <?php unset($_SESSION["form_error"]);
            } ?>
            <?php if (isset($_SESSION["form_succ"])) { ?>
                <div class="alert alert-success"><?php echo $_SESSION["form_succ"]; ?></div>
            <?php unset($_SESSION["form_succ"]);
            } ?>


            <!-- //! IF $_SESSION["set_pass"] is not set then display send otp form -->
            <?php
            if (!isset($_SESSION["set_pass"])) {
                if (!isset($_SESSION["otp"])) { ?>

                    <span id="heading">Forget Something?</span>
                    <span id="definition">If you are forget your password, write your email here to change with new one.</span>

                    <form action="<?php echo HTTP_PATH . "/user_panel/login/forgot_pass/send_otp.php"; ?>" method="post" enctype="multipart/form-data">
                        <label for="email">Email:</label>
                        <input type="email" name="email" placeholder="example123@gmail.com" required />

                        <div class="btns">
                            <input type="submit" value="Send OTP" name="send_otp" />
                            <input type="reset" value="Reset" />
                        </div>
                    </form>
                <?php } ?>

                <?php
                if (isset($_SESSION["otp"])) { ?>
                    <span id="heading">Forget Something?</span>
                    <span id="definition">Write down OTP here to change your password with new one.</span>

                    <form action="<?php echo HTTP_PATH . "/user_panel/login/forgot_pass/submit_form.php"; ?>" method="post" enctype="multipart/form-data">
                        <label for="otp">OTP:</label>
                        <input type="text" name="otp" placeholder="OTP Here..." required />

                        <div class="btns">
                            <input type="submit" name="submit_form" value="Submit" />
                            <input type="reset" value="Reset" />
                        </div>
                    </form>
            <?php }
            } ?>

            <!-- //! IF $_SESSION["set_pass"] is not set then display update pass form -->
            <?php
            if (isset($_SESSION["set_pass"])) { ?>
                <span id="heading">OTP Submitted?</span>
                <span id="definition">If you are submitted the OTP, Now you have chance to change the password</span>

                <form action="<?php echo HTTP_PATH . "/user_panel/login/forgot_pass/update_pass.php"; ?>" method="post" enctype="multipart/form-data">
                    <label for="new_pass">New Password:</label>
                    <input type="text" name="new_pass" placeholder="New Password" required />

                    <label for="conf_pass">Confirm Password:</label>
                    <input type="text" name="conf_pass" placeholder="Confirm Password" required />

                    <div class="btns">
                        <input type="submit" name="update_pass" value="Update" />
                        <input type="reset" value="Reset" />
                    </div>
                </form>
            <?php } ?>
        </div>
    </div>
</body>

</html>