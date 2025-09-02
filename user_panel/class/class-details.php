<?php
require("C:/xampp/htdocs/php/IFS/path.php");
include(DRIVE_PATH . "/user_panel/header/header.php");

include(DRIVE_PATH . "/user_panel/login/login.php");
?>

<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Gym Template">
    <meta name="keywords" content="Gym, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Class Details</title>
</head>

<body>

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="<?php echo HTTP_PATH . "/img/breadcrumb-bg.jpg"; ?>">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb-text">
                        <h2>Classes detail</h2>
                        <div class="bt-option">
                            <a href="<?php echo HTTP_PATH . "/index.php"; ?>">Home</a>
                            <a href="#">Classes</a>
                            <span>Body building</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Class Details Section Begin -->
    <section class="class-details-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="class-details-text">
                        <div class="cd-pic">
                            <img src="img/classes/class-details/class-detailsl.jpg" alt="">
                        </div>
                        <div class="cd-text">
                            <div class="cd-single-item">
                                <h3>Body buiding</h3>
                                <p><b>Transform Your Physique with Elite Bodybuilding Training</b><br />At IronForce Gym, we specialize in serious bodybuilding—helping athletes, competitors, and fitness enthusiasts sculpt their ideal physique through science-backed training, expert coaching, and premium facilities.</p>
                            </div>
                            <div class="cd-single-item">
                                <h3>Trainer</h3>
                                <p><b>Train With the Best - Achieve Extraordinary Results</b><br />
                                    At IronForce Gym, our certified trainers are more than just coaches—they're your strategists, motivators, and partners in success. Whether you're training for strength, fat loss, athletic performance, or bodybuilding, our expert team delivers personalized, science-backed programs to maximize your potential.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-8">
                    <div class="sidebar-option">
                        <div class="so-categories">
                            <h5 class="title">Categories</h5>
                            <ul>
                                <li><a href="#">Yoga <span>12</span></a></li>
                                <li><a href="#">Runing <span>32</span></a></li>
                                <li><a href="#">Weightloss <span>86</span></a></li>
                                <li><a href="#">Cario <span>25</span></a></li>
                                <li><a href="#">Body buiding <span>36</span></a></li>
                                <li><a href="#">Nutrition <span>15</span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Class Details Section End -->


    <!-- Class Timetable Section Begin -->
    <section class="class-timetable-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="section-title">
                        <span>Find Your Time</span>
                        <h2>Find Your Time</h2>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="table-controls">
                        <ul>
                            <li class="active" data-tsfilter="all">All event</li>
                            <li data-tsfilter="fitness">Fitness tips</li>
                            <li data-tsfilter="motivation">Motivation</li>
                            <li data-tsfilter="workout">Workout</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="class-timetable">
                        <table>
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Monday</th>
                                    <th>Tuesday</th>
                                    <th>Wednesday</th>
                                    <th>Thursday</th>
                                    <th>Friday</th>
                                    <th>Saturday</th>
                                    <th>Sunday</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="class-time">6.00am - 8.00am</td>
                                    <td class="dark-bg hover-bg ts-meta" data-tsmeta="workout">
                                        <h5>WEIGHT LOOSE</h5>
                                        <span>RLefew D. Loee</span>
                                    </td>
                                    <td class="hover-bg ts-meta" data-tsmeta="fitness">
                                        <h5>Cardio</h5>
                                        <span>RLefew D. Loee</span>
                                    </td>
                                    <td class="dark-bg hover-bg ts-meta" data-tsmeta="workout">
                                        <h5>Yoga</h5>
                                        <span>Keaf Shen</span>
                                    </td>
                                    <td class="hover-bg ts-meta" data-tsmeta="fitness">
                                        <h5>Fitness</h5>
                                        <span>Kimberly Stone</span>
                                    </td>
                                    <td class="dark-bg blank-td"></td>
                                    <td class="hover-bg ts-meta" data-tsmeta="motivation">
                                        <h5>Boxing</h5>
                                        <span>Rachel Adam</span>
                                    </td>
                                    <td class="dark-bg hover-bg ts-meta" data-tsmeta="workout">
                                        <h5>Body Building</h5>
                                        <span>Robert Cage</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="class-time">10.00am - 12.00am</td>
                                    <td class="blank-td"></td>
                                    <td class="dark-bg hover-bg ts-meta" data-tsmeta="fitness">
                                        <h5>Fitness</h5>
                                        <span>Kimberly Stone</span>
                                    </td>
                                    <td class="hover-bg ts-meta" data-tsmeta="workout">
                                        <h5>WEIGHT LOOSE</h5>
                                        <span>RLefew D. Loee</span>
                                    </td>
                                    <td class="dark-bg hover-bg ts-meta" data-tsmeta="motivation">
                                        <h5>Cardio</h5>
                                        <span>RLefew D. Loee</span>
                                    </td>
                                    <td class="hover-bg ts-meta" data-tsmeta="workout">
                                        <h5>Body Building</h5>
                                        <span>Robert Cage</span>
                                    </td>
                                    <td class="dark-bg hover-bg ts-meta" data-tsmeta="motivation">
                                        <h5>Karate</h5>
                                        <span>Donald Grey</span>
                                    </td>
                                    <td class="blank-td"></td>
                                </tr>
                                <tr>
                                    <td class="class-time">5.00pm - 7.00pm</td>
                                    <td class="dark-bg hover-bg ts-meta" data-tsmeta="fitness">
                                        <h5>Boxing</h5>
                                        <span>Rachel Adam</span>
                                    </td>
                                    <td class="hover-bg ts-meta" data-tsmeta="motivation">
                                        <h5>Karate</h5>
                                        <span>Donald Grey</span>
                                    </td>
                                    <td class="dark-bg hover-bg ts-meta" data-tsmeta="workout">
                                        <h5>Body Building</h5>
                                        <span>Robert Cage</span>
                                    </td>
                                    <td class="blank-td"></td>
                                    <td class="dark-bg hover-bg ts-meta" data-tsmeta="workout">
                                        <h5>Yoga</h5>
                                        <span>Keaf Shen</span>
                                    </td>
                                    <td class="hover-bg ts-meta" data-tsmeta="motivation">
                                        <h5>Cardio</h5>
                                        <span>RLefew D. Loee</span>
                                    </td>
                                    <td class="dark-bg hover-bg ts-meta" data-tsmeta="fitness">
                                        <h5>Fitness</h5>
                                        <span>Kimberly Stone</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="class-time">7.00pm - 9.00pm</td>
                                    <td class="hover-bg ts-meta" data-tsmeta="motivation">
                                        <h5>Cardio</h5>
                                        <span>RLefew D. Loee</span>
                                    </td>
                                    <td class="dark-bg blank-td"></td>
                                    <td class="hover-bg ts-meta" data-tsmeta="fitness">
                                        <h5>Boxing</h5>
                                        <span>Rachel Adam</span>
                                    </td>
                                    <td class="dark-bg hover-bg ts-meta" data-tsmeta="workout">
                                        <h5>Yoga</h5>
                                        <span>Keaf Shen</span>
                                    </td>
                                    <td class="hover-bg ts-meta" data-tsmeta="motivation">
                                        <h5>Karate</h5>
                                        <span>Donald Grey</span>
                                    </td>
                                    <td class="dark-bg hover-bg ts-meta" data-tsmeta="fitness">
                                        <h5>Boxing</h5>
                                        <span>Rachel Adam</span>
                                    </td>
                                    <td class="hover-bg ts-meta" data-tsmeta="workout">
                                        <h5>WEIGHT LOOSE</h5>
                                        <span>RLefew D. Loee</span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Class Timetable Section End -->


    <style>
        .class-form-section {
            width: 100%;
            background-color: #111111;
        }

        .membership-form.form-container {
            width: 80%;
            margin: auto;
            border-radius: 12px;
            background-color: white;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
            overflow: hidden;
        }

        .membership-form .form-header {
            background-color: #f36100;
            padding: 2rem;
            text-align: center;
        }

        .membership-form .form-header h1 {
            color: white;
        }

        .membership-form .form-header p {
            color: white;
            opacity: 0.9;
        }

        .membership-form .form-body {
            padding: 2rem;
        }

        .membership-form .form-section {
            margin-bottom: 2rem;
        }

        .membership-form .section-title {
            color: #f36100;
            font-size: 1.25rem;
            margin-bottom: 1rem;
            padding-bottom: 0.5rem;
            border-bottom: 2px solid #EEE;
            font-weight: 600;
        }

        .membership-form .form-row {
            display: flex;
            flex-wrap: wrap;
            margin: 0 -0.75rem;
        }

        .membership-form .form-group {
            flex: 1 0 calc(50% - 1.5rem);
            margin: 0 0.75rem 1.5rem;
            min-width: 250px;
        }

        .membership-form .form-group.full-width {
            flex: 1 0 100%;
        }

        .membership-form label {
            color: black;
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 600;
        }

        .membership-form .required::after {
            content: " *";
            color: red;
        }

        .membership-form input,
        .membership-form select,
        .membership-form textarea {
            width: 100%;
            padding: 0.75rem 1rem;
            border: 1px solid #E2E8F0;
            border-radius: 8px;
            font-family: inherit;
            font-size: 0.95rem;
            transition: all 0.3s ease;
        }

        .membership-form input:focus,
        .membership-form select:focus,
        .membership-form textarea:focus {
            outline: none;
            border-color: #f36100;
            box-shadow: 0 0 0 3px rgba(108, 99, 255, 0.2);
        }

        .membership-form .radio-group,
        .membership-form .checkbox-group {
            display: flex;
            gap: 1.5rem;
            margin-top: 0.5rem;
        }

        .membership-form .radio-option,
        .membership-form .checkbox-option {
            display: flex;
            align-items: center;
        }

        .membership-form .radio-option input,
        .membership-form .checkbox-option input {
            width: auto;
            margin-right: 0.5rem;
        }

        .membership-form .address-row {
            display: flex;
            flex-wrap: wrap;
            gap: 1rem;
        }

        .membership-form .address-row .form-group {
            flex: 1;
            min-width: 200px;
        }

        .membership-form .btn {
            display: inline-block;
            padding: 0.75rem 2rem;
            background: #f36100;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 1rem;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .membership-form .btn:hover {
            background: rgb(218, 87, 1);
            transform: translateY(-2px);
        }

        .membership-form .btn-block {
            display: block;
            width: 100%;
        }

        @media (max-width: 768px) {
            .membership-form .form-group {
                flex: 1 0 100%;
            }

            .membership-form .radio-group,
            .membership-form .checkbox-group {
                flex-direction: column;
                gap: 0.5rem;
            }
        }

        /* Animation */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .membership-form .form-section {
            animation: fadeIn 0.5s ease forwards;
        }

        .membership-form .form-section:nth-child(1) {
            animation-delay: 0.1s;
        }

        .membership-form .form-section:nth-child(2) {
            animation-delay: 0.2s;
        }

        .membership-form .form-section:nth-child(3) {
            animation-delay: 0.3s;
        }

        .membership-form .form-section:nth-child(4) {
            animation-delay: 0.4s;
        }
    </style>

    <script>
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
    </script>

    <section class="class-form-section">
        <div class="membership-form form-container">
            <div class="form-header">
                <h1>Get Membership</h1>
                <p>Start your fitness journey with us today!</p>
            </div>

            <?php
            if (isset($_SESSION["email"])) {
                $sel = $conn->prepare("SELECT * FROM member WHERE `email`='" . $_SESSION["email"] . "'");
                $sel->execute();
                $sel = $sel->fetchAll();

                foreach ($sel as $r) {
                    $name = $r["FirstName"] . " " . $r["LastName"];
                    $email = $r["email"];
                    $phone = $r["phone"];
                    $gender = $r["gender"];
                    $dob = $r["dob"];
                    $house_number = ($r["address"] != null) ? unserialize($r["address"])[0] : "";
                    $apartment = ($r["address"] != null) ? unserialize($r["address"])[1] : "";
                    $suite = ($r["address"] != null) ? unserialize($r["address"])[2] : "";
                    $city = ($r["address"] != null) ? unserialize($r["address"])[3] : "";
                    $pincode = ($r["address"] != null) ? unserialize($r["address"])[4] : "";
                }
            } ?>

            <form action="<?php echo HTTP_PATH . "/user_panel/class/payment.php"; ?>" method="post" id="gymForm" class="form-body">
                <!-- Personal Information Section -->
                <div class="form-section">
                    <h2 class="section-title">Personal Information</h2>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="name" class="required">Full Name</label>
                            <input type="text" id="name" name="name" value="<?php echo (isset($name)) ? $name : ""; ?>" required placeholder="John Doe">
                        </div>
                        <div class="form-group">
                            <label for="email" class="required">Email ID</label>
                            <input type="email" id="email" name="email" value="<?php echo (isset($email)) ? $email : ""; ?>" disabled required placeholder="john@example.com">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="phone" class="required">Phone Number</label>
                            <input type="tel" id="phone" name="phone" value="<?php echo (isset($phone)) ? $phone : ""; ?>" minlength="10" maxlength="10" required placeholder="+91 98989 89898">
                        </div>
                        <div class="form-group">
                            <label class="required">Gender</label>
                            <div class="radio-group">
                                <div class="radio-option">
                                    <input type="radio" id="male" name="gender" value="male" <?php echo ((isset($gender)) && $gender == "Male") ? "checked" : ""; ?>>
                                    <label for="male">Male</label>
                                </div>
                                <div class="radio-option">
                                    <input type="radio" id="female" name="gender" <?php echo ((isset($gender)) && $gender == "Female") ? "checked" : ""; ?>value="female">
                                    <label for="female">Female</label>
                                </div>
                                <div class="radio-option">
                                    <input type="radio" id="other" name="gender" <?php echo ((isset($gender)) && $gender == "Other") ? "checked" : ""; ?> value="other">
                                    <label for="other">Other</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="dob" class="required">Date of Birth</label>
                            <?php if (isset($dob) && $dob != "30/11/-0001") { ?>
                                <input type="text" id="dob" value="<?php echo date("d/m/Y", strtotime($dob)); ?>" name="dob" />
                            <?php } else { ?>
                                <input type="date" id="dob" name="dob" required>
                            <?php } ?>
                        </div>
                    </div>
                </div>

                <!-- Fitness Goals Section -->
                <div class="form-section">
                    <h2 class="section-title">Fitness Information</h2>
                    <?php
                    if (isset($_GET["type"])) {
                        $_SESSION["membership_type"] = $_GET["type"];
                    }
                    if (isset($_GET["fee"])) {
                        $_SESSION["membership_fee"] = $_GET["fee"];
                    }
                    ?>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="goal" class="required">Primary Fitness Goal</label>
                            <select id="goal" name="goal" required>
                                <option value="" disabled selected>Select your goal</option>
                                <option value="weight-loss">Weight Loss</option>
                                <option value="muscle-gain">Muscle Gain</option>
                                <option value="endurance">Endurance Training</option>
                                <option value="toning">Body Toning</option>
                                <option value="flexibility">Flexibility</option>
                                <option value="rehabilitation">Rehabilitation</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="experience">Gym Experience</label>
                            <select id="experience" name="experience" required>
                                <option value="" disabled selected>Select your experience level</option>
                                <option value="beginner">Beginner (0-6 months)</option>
                                <option value="intermediate">Intermediate (6 months - 2 years)</option>
                                <option value="advanced">Advanced (2+ years)</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="weight" class="required">Weight (kg)</label>
                            <input type="number" id="weight" name="weight" min="30" max="200" placeholder="e.g. 75" required>
                        </div>
                        <div class="form-group">
                            <label for="height" class="required">Height (cm)</label>
                            <input type="number" id="height" name="height" min="100" max="250" placeholder="e.g. 175" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group full-width">
                            <label for="medical">Medical Conditions (if any)</label>
                            <textarea id="medical" name="medical_condition" rows="3" placeholder="Please list any medical conditions, injuries, or allergies we should be aware of..."></textarea>
                        </div>
                    </div>
                </div>

                <!-- Membership Details Section -->
                <div class="form-section">
                    <h2 class="section-title">Membership Details</h2>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="payment" class="required">Start Date</label>
                            <input type="date" name="start_date" required />
                        </div>
                        <div class="form-group">
                            <label class="required">Preferred Timing</label>
                            <div class="radio-group">
                                <div class="radio-option">
                                    <input type="radio" id="morning" name="timing" value="1" checked required>
                                    <label for="morning">Morning (6AM-12PM)</label>
                                </div>
                                <div class="radio-option">
                                    <input type="radio" id="evening" name="timing" value="2">
                                    <label for="evening">Evening (4PM-10PM)</label>
                                </div>
                                <div class="radio-option">
                                    <input type="radio" id="anytime" name="timing" value="3">
                                    <label for="anytime">Anytime</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="payment" class="required">Payment Type</label>
                            <select id="payment" name="payment_type" required>
                                <option value="" disabled selected>Select payment method</option>
                                <option value="Cash">Cash</option>
                                <option value="Razorpay">Razorpay</option>
                            </select>
                        </div>

                    </div>
                </div>

                <!-- Address Section -->
                <div class="form-section">
                    <h2 class="section-title">Address Information</h2>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="house-number" class="required">House Number</label>
                            <input type="text" id="house-number" name="house-number" value="<?php echo (isset($house_number)) ? $house_number : ""; ?>" placeholder="D/302" required>
                        </div>
                        <div class="form-group">
                            <label for="apartment" class="required">Apartment Name</label>
                            <input type="text" id="apartment" name="apartment" value="<?php echo (isset($apartment)) ? $apartment : ""; ?>" placeholder="Amrakunj" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="suite">Suite/Apt Number</label>
                            <input type="text" id="suite" name="suite" value="<?php echo (isset($suite)) ? $suite : ""; ?>" placeholder="KB Royal" />
                        </div>
                        <div class="form-group">
                            <label for="city" class="required">City</label>
                            <input type="text" id="city" name="city" value="<?php echo (isset($city)) ? $city : ""; ?>" required placeholder="Ahmedabad">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="pincode" class="required">Postal/Zip Code</label>
                            <input type="text" id="pincode" name="pincode" value="<?php echo (isset($pincode)) ? $pincode : ""; ?>" required placeholder="382424">
                        </div>
                    </div>
                </div>
                <?php
                if (isset($_SESSION["email"])) { ?>
                    <button type="submit" name="fresh_submit" class="btn btn-block">Submit Application</button>
                <?php } ?>
            </form>

            <div class="px-4 pb-3">
                <?php
                if (!isset($_SESSION["email"])) { ?>
                    <button class="btn btn-block login-btn">Submit Application</button>
                <?php } ?>
            </div>
        </div>
    </section>

    <?php
    include(DRIVE_PATH . "/user_panel/footer/footer.php");
    ?>
</body>

</html>