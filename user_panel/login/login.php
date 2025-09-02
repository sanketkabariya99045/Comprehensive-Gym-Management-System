<style>
    .alert {
        position: fixed;
        top: 6%;
        left: 50%;
        transform: translate(-50%, 0);
        font-weight: 700;
        filter: contrast(130%);
        z-index: 100;
    }

    .form-slider {
        display: none;
        position: fixed;
        top: 3%;
        left: 50%;
        transform: translate(-50%, 0);
        width: 70%;
        height: 95%;
        margin: auto;
        border-radius: 0.4rem;
        box-shadow: 0px 0px 10px 3px #282a35;
        background-color: white;
        z-index: 10000;
        overflow: hidden;
    }

    .form-slider .sliding-img {
        display: grid;
        place-items: center;
        position: absolute;
        left: 0;
        width: 50%;
        height: 100%;
        background-color: #111111;
        z-index: 1;
    }

    .form-slider img {
        width: 100%;
    }

    .form-slider form {
        position: absolute;
        width: 50%;
        height: 100%;
        display: flex;
        flex-direction: column;
        padding: 1rem 2rem;
        border-radius: 0.4rem;
        filter: brightness(150%);
    }

    .form-slider form>div {
        width: 100%;
        margin: 0 auto;
    }

    .form-slider #sign-form {
        display: none;
        left: 0;
    }

    .form-slider #login-form {
        right: 0;
    }

    .form-slider h1 {
        text-align: center;
        font-size: 35px;
    }

    .form-slider .row {
        width: 100%;
        position: relative;
        margin: 1.2rem auto;
    }

    .form-slider .fa-xmark {
        position: absolute;
        top: 2%;
        right: 1%;
        background-color: #d9d9d9;
        z-index: 2;
    }
    
    .form-slider .fa-xmark:hover {
        background-color: #f2f2f2;
        scale: 0.96;
    }
    
    .form-slider i:not(.fa-xmark) {
        position: absolute;
        top: 50%;
        right: 3%;
        transform: translate(0, -50%);
    }
    
    .form-slider input, .form-slider select {
        color: black !important;
        background-color: gray;
    }
    .form-slider input::placeholder {
        color: black;
    }

    .form-slider input[type="submit"] {
        font-size: 16px;
        width: 100%;
        color: white;
        cursor: pointer;
        font-weight: 600;
        margin-top: 1.5rem;
        padding: 0.6rem 1rem;
        background-color: #f36100;
        transition: all 0.1s linear;
    }

    .form-slider input[type="submit"]:hover {
        background-color: #999999;
    }

    .form-slider p {
        color: black;
        text-align: center;
    }

    .form-slider a {
        font-weight: 600;
        text-decoration: none;
    }

    @media (max-width: 1200px) {
        .form-slider {
            width: 85%;
        }
    }
    @media (max-width: 950px) {
        .form-slider {
            width: 95%;
        }
    }
    @media (max-width: 700px) {
        .form-slider {
            width: 80%;
        }
        .form-slider .sliding-img {
            display: none;
        }
        .form-slider>form {
            width: 100%;
            overflow: auto;
        }
    }
    @media (max-width: 400px) {
        .form-slider {
            top: 0;
            left: 0;
            transform: translate(0, 0);
            width: 100%;
            height: 100%;
            box-shadow: none;
            border-radius: 0px;
        }
        .form-slider>form {
            padding: 1rem;
        }
    }
</style>

<script>
    $(document).ready(function() {
        var left = true;

        $(".form-slider .sliding-img").mouseenter(function() {
            if (left) {
                $(".form-slider .sliding-img").animate({
                    left: "50%"
                }, 900);
                $(".form-slider #sign-form").fadeIn(1000);
                $(".form-slider #login-form").fadeOut(900);
                left = false;
            } else {
                $(".form-slider .sliding-img").animate({
                    left: "0"
                }, 1000);
                $(".form-slider #sign-form").fadeOut(900);
                $(".form-slider #login-form").fadeIn(1000);
                left = true;
            }
        });

        $(".form-slider input").focus(function() {
            $(this).prev().css("color", "black");
        });
        $(".form-slider input").blur(function() {
            $(this).prev().css("color", "white");
        });

        $(".form-slider #sign-btn").click(function() {
            $(".form-slider .sliding-img").animate({
                left: "50%"
            }, 1000);
            $(".form-slider #sign-form").fadeIn(1000);
            $(".form-slider #login-form").fadeOut(900);
        });
        $(".form-slider #login-btn").click(function() {
            $(".form-slider .sliding-img").animate({
                left: "0"
            }, 1000);
            $(".form-slider #sign-form").fadeOut(900);
            $(".form-slider #login-form").fadeIn(1000);
        });
    });
</script>


<?php if (isset($_SESSION["form_error"])) { ?>
    <div class="alert alert-danger"><?php echo $_SESSION["form_error"]; ?></div>
    <script>
        $(document).ready(function() {
            $(".alert").fadeOut(5000);
            <?php unset($_SESSION["form_error"]); ?>
        });
    </script>
<?php } ?>

<?php if (isset($_SESSION["form_succ"])) {
?>
    <div class="alert alert-success"><?php echo $_SESSION["form_succ"]; ?></div>
    <script>
        $(document).ready(function() {
            $(".alert").fadeOut(5000);
            <?php unset($_SESSION["form_succ"]); ?>
        });
    </script>
<?php }
?>

<div class="form-slider card">
    <i class="fa-solid fa-xmark p-2 rounded text-dark"></i>
    <div class="sliding-img">
        <img src="<?php echo HTTP_PATH . "/user_panel/logo.png"; ?>" alt="">
    </div>
    <form action="<?php echo HTTP_PATH . "/user_panel/login/verify.php"; ?>" id="sign-form" method="post">
        <h1>signUp</h1>
        <div>
            <div class="row">
                <i class="fa-solid fa-user"></i>
                <input type="text" class="form-control" name="FirstName" placeholder="First Name" required />
            </div>
            <div class="row">
                <i class="fa-solid fa-user"></i>
                <input type="text" class="form-control" name="LastName" placeholder="Last Name" required />
            </div>
            <div class="row">
                <i class="fa-solid fa-envelope"></i>
                <input type="email" class="form-control" name="email" placeholder="Email ID" required />
            </div>

            <div class="row">
                <i class="fa-solid fa-lock"></i>
                <input type="current-password" class="form-control" name="password" placeholder="Password" required />
            </div>
            <div class="row">
                <i class="fa-solid fa-phone"></i>
                <input type="number" class="form-control" name="phone" placeholder="Phone" required />
            </div>
            <div class="row">
                <div class="col-md-6 p-1">
                    <select name="gender" class="form-control" required>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                    </select>
                </div>

                <div class="col-md-6 p-1"><input type="date" class="form-control" name="dob" placeholder="Date of Birth" required /></div>
            </div>

            <div class="row">
                <div class="col-md-6 p-1">
                    <input type="text" name="house-number" class="form-control" placeholder="House Number" required />
                </div>
                <div class="col-md-6 p-1">
                    <input type="text" name="apartment" class="form-control" placeholder="Apartment Name" required />
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 p-1">
                    <input type="text" name="suite" class="form-control" placeholder="Suite" required />
                </div>
                <div class="col-md-4 p-1">
                    <input type="text" name="city" class="form-control" placeholder="City" required />
                </div>
                <div class="col-md-4 p-1">
                    <input type="number" name="pincode" minlength="6" maxlength="6" class="form-control" placeholder="Pincode" required />
                </div>
            </div>
            <div class="row">
                <input type="submit" class="btn" name="sign" value="signUp" />
                <p>Already have an Account?&ensp;<a href="#" class="text-primary" id="login-btn">Login</a></p>
            </div>
        </div>
    </form>

    <form action="<?php echo HTTP_PATH . "/user_panel/login/verify.php"; ?>" id="login-form" method="post">
        <h1>Login</h1>
        <div>
            <div class="row">
                <i class="fa-solid fa-envelope"></i>
                <input type="email" class="form-control" name="email" placeholder="Email ID" required />
            </div>

            <div class="row">
                <i class="fa-solid fa-lock"></i>
                <input type="password" class="form-control" name="password" placeholder="Password" required />
            </div>
            <div class="row">
                <a href="<?php echo HTTP_PATH."/user_panel/login/forgot_pass/forgot_pass.php"; ?>" class="text-primary forgot-pass-btn">Forget Password?</a>
            </div>

            <div class="row">
                <input type="submit" class="btn" name="login" value="Login" />
                <p>Don't have an Account?&ensp;<a href="#" class="text-primary" id="sign-btn">Register</a></p>
            </div>
        </div>
    </form>
</div>