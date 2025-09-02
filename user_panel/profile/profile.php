<?php
require("C:/xampp/htdocs/php/IFS/path.php");
include(DRIVE_PATH . "/user_panel/header/header.php");

include(DRIVE_PATH . "/user_panel/login/login.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile | INVIGOR FITNESS STUDIO</title>
    <style>
        :root {
            --primary: #2a4365;
            --primary-light: #3182ce;
            --secondary: #e53e3e;
            --dark: #1a202c;
            --light: #f7fafc;
            --gray: #e2e8f0;
            --success: #38a169;
            --warning: #dd6b20;
            --danger: #e53e3e;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background-color: var(--dark);
            color: var(--dark);
            line-height: 1.6;
        }

        .profile-container {
            max-width: 1200px;
            margin: 10rem auto 2rem auto;
            padding: 20px;
            display: flex;
            flex-direction: column;
            gap: 30px;
        }

        .profile-header {
            display: flex;
            flex-direction: column;
            align-items: center;
            background-color: white;
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            position: relative;
            overflow: hidden;
        }

        .profile-header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 5px;
            background: linear-gradient(90deg, var(--primary), var(--secondary));
        }

        .profile-pic {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            object-fit: cover;
            border: 5px solid white;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        .profile-actions {
            position: absolute;
            top: 20px;
            right: 20px;
            display: flex;
            gap: 10px;
        }

        .btn {
            padding: 8px 16px;
            border-radius: 5px;
            border: none;
            cursor: pointer;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-edit {
            background-color: var(--primary);
            color: white;
        }

        .btn-edit:hover {
            background-color: var(--primary-light);
        }

        .btn-qr {
            background-color: var(--light);
            color: var(--dark);
            border: 1px solid var(--gray);
        }

        .btn-qr:hover {
            background-color: var(--gray);
        }

        .user-name {
            font-size: 28px;
            font-weight: 700;
            margin-bottom: 5px;
        }

        .user-title {
            color: var(--primary-light);
            font-weight: 600;
            margin-bottom: 15px;
        }

        .membership-badge {
            padding: 5px 15px;
            border-radius: 20px;
            font-weight: 600;
            font-size: 14px;
            margin-bottom: 20px;
        }

        .badge-active {
            background-color: rgba(56, 161, 105, 0.1);
            color: var(--success);
        }

        .profile-content {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
        }

        .card {
            background-color: white;
            border-radius: 10px;
            padding: 25px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 1px solid var(--gray);
        }

        .card-title {
            font-size: 18px;
            font-weight: 700;
            color: var(--primary);
        }

        .info-group {
            margin-bottom: 15px;
        }

        .info-label {
            font-size: 14px;
            color: #718096;
            margin-bottom: 5px;
        }

        .info-value {
            font-weight: 600;
        }

        .qr-code {
            width: 150px;
            height: 150px;
            margin: 20px auto;
            display: block;
            background-color: #f0f0f0;
            padding: 10px;
            border-radius: 5px;
        }

        .emergency-contact {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-bottom: 15px;
        }

        .contact-icon {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: rgba(234, 88, 12, 0.1);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--warning);
        }

        .quick-actions {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 15px;
            margin-top: 20px;
        }

        .action-btn {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 15px;
            border-radius: 8px;
            background-color: var(--light);
            color: var(--primary);
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .action-btn:hover {
            background-color: var(--gray);
            transform: translateY(-3px);
        }

        .action-icon {
            font-size: 24px;
            margin-bottom: 8px;
        }

        .action-text {
            font-size: 14px;
            font-weight: 600;
        }

        /* Dark mode styles */
        body.dark-mode {
            background-color: #121212;
            color: #e0e0e0;
        }

        body.dark-mode .profile-header,
        body.dark-mode .card {
            background-color: #1e1e1e;
            color: #e0e0e0;
        }

        body.dark-mode .info-label {
            color: #a0a0a0;
        }

        body.dark-mode .action-btn {
            background-color: #2d2d2d;
            color: #e0e0e0;
        }

        body.dark-mode .action-btn:hover {
            background-color: #3d3d3d;
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .profile-header {
                padding: 20px;
            }

            .profile-content {
                grid-template-columns: 1fr;
            }

            .quick-actions {
                grid-template-columns: repeat(4, 1fr);
            }
        }

        @media (max-width: 480px) {
            .quick-actions {
                grid-template-columns: repeat(2, 1fr);
            }

            .profile-actions {
                position: static;
                justify-content: center;
                margin-top: 15px;
            }

            .user-name {
                font-size: 24px;
                text-align: center;
            }
        }


        /* //! Edit Profile Info. */
        .edit-profile-container {
            max-width: 900px;
            margin: 0 auto;
            border-radius: var(--border-radius);
            box-shadow: var(--box-shadow);
            overflow: hidden;
        }

        .edit-profile-header {
            background: linear-gradient(90deg, var(--primary), var(--primary-light));
            color: white;
            padding: 20px;
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .edit-profile-header i {
            font-size: 24px;
        }

        .edit-profile-header h2 {
            color: white;
            font-size: 22px;
            font-weight: 600;
        }

        .profile-form {
            padding: 25px;
            background-color: white;
        }

        .form-section {
            margin-bottom: 30px;
        }

        .section-header {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 1px solid var(--gray);
            color: var(--primary);
        }

        .section-header i {
            font-size: 18px;
        }

        .section-header h3 {
            font-size: 18px;
            font-weight: 600;
        }

        .form-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(45%, 1fr));
            gap: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
            font-size: 14px;
            color: var(--dark);
        }

        .form-control {
            width: 100%;
            border: 1px solid var(--gray-dark);
            border-radius: var(--border-radius);
            font-size: 15px;
            transition: var(--transition);
            background-color: white;
        }

        .form-control:focus {
            outline: none;
            border-color: var(--primary-light);
            box-shadow: 0 0 0 3px rgba(49, 130, 206, 0.2);
        }

        .form-control[readonly] {
            background-color: var(--gray);
            cursor: not-allowed;
        }

        .select-wrapper {
            position: relative;
        }

        .select-wrapper::after {
            content: '\f078';
            font-family: 'Font Awesome 6 Free';
            font-weight: 900;
            position: absolute;
            top: 50%;
            right: 15px;
            transform: translateY(-50%);
            pointer-events: none;
            color: var(--dark);
        }

        .form-select {
            appearance: none;
            padding-right: 40px;
        }

        .badge {
            display: inline-block;
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 14px;
            font-weight: 600;
        }

        .badge-expired {
            background-color: rgba(229, 62, 62, 0.1);
            color: var(--danger);
        }

        .badge-suspended {
            background-color: rgba(221, 107, 32, 0.1);
            color: var(--warning);
        }

        .photo-upload {
            display: flex;
            align-items: center;
            gap: 20px;
            margin-bottom: 20px;
        }

        .photo-preview {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            object-fit: cover;
            border: 3px solid white;
            box-shadow: var(--box-shadow);
        }

        .upload-btn {
            position: relative;
            overflow: hidden;
            display: inline-block;
        }

        .btn {
            padding: 10px 20px;
            border-radius: var(--border-radius);
            border: none;
            font-weight: 600;
            cursor: pointer;
            transition: var(--transition);
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .btn-primary {
            background-color: var(--primary);
            color: white;
        }

        .btn-primary:hover {
            background-color: var(--primary-light);
        }

        .btn-outline {
            background-color: transparent;
            border: 1px solid var(--gray-dark);
            color: var(--dark);
        }

        .btn-outline:hover {
            background-color: var(--gray);
        }

        .btn-danger {
            background-color: var(--danger);
            color: white;
        }

        .btn-danger:hover {
            background-color: #c53030;
        }

        .upload-btn input[type="file"] {
            position: absolute;
            left: 0;
            top: 0;
            opacity: 0;
            width: 100%;
            height: 100%;
            cursor: pointer;
        }

        .collapse-section {
            margin-top: 30px;
        }

        .collapse-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 12px 15px;
            background-color: var(--gray);
            border-radius: var(--border-radius);
            cursor: pointer;
            transition: var(--transition);
        }

        .collapse-header:hover {
            background-color: var(--gray-dark);
        }

        .collapse-header h4 {
            font-size: 16px;
            font-weight: 600;
            color: var(--dark);
        }

        .collapse-content {
            padding: 20px;
            background-color: white;
            border-radius: 0 0 var(--border-radius) var(--border-radius);
            box-shadow: var(--box-shadow);
            margin-top: 5px;
            display: none;
        }

        .collapse-content.show {
            display: block;
        }

        .form-actions {
            display: flex;
            justify-content: flex-end;
            gap: 15px;
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid var(--gray);
        }

        .error-message {
            color: var(--danger);
            font-size: 13px;
            margin-top: 5px;
            display: none;
        }

        .has-error .form-control {
            border-color: var(--danger);
        }

        .has-error .error-message {
            display: block;
        }

        .toast {
            position: fixed;
            bottom: 20px;
            right: 20px;
            padding: 15px 20px;
            background-color: var(--success);
            color: white;
            border-radius: var(--border-radius);
            box-shadow: var(--box-shadow);
            display: flex;
            align-items: center;
            gap: 10px;
            transform: translateY(100px);
            opacity: 0;
            transition: var(--transition);
            z-index: 1000;
        }

        .toast.show {
            transform: translateY(0);
            opacity: 1;
        }

        .loading-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 999;
            display: none;
        }

        .spinner {
            width: 50px;
            height: 50px;
            border: 5px solid rgba(255, 255, 255, 0.3);
            border-radius: 50%;
            border-top-color: white;
            animation: spin 1s ease-in-out infinite;
        }

        @keyframes spin {
            to {
                transform: rotate(360deg);
            }
        }

        .cropper-modal {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.8);
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            z-index: 1001;
            display: none;
        }

        .cropper-container {
            width: 80%;
            max-width: 500px;
            background-color: white;
            padding: 20px;
            border-radius: var(--border-radius);
        }

        .cropper-actions {
            display: flex;
            justify-content: flex-end;
            gap: 10px;
            margin-top: 15px;
        }

        #imagePreview {
            max-width: 100%;
            max-height: 400px;
        }

        /* Dark mode styles */
        body.dark-mode {
            background-color: #121212;
            color: #e0e0e0;
        }

        body.dark-mode .edit-profile-container,
        body.dark-mode .form-control,
        body.dark-mode .collapse-content {
            background-color: #1e1e1e;
            color: #e0e0e0;
        }

        body.dark-mode .form-control {
            border-color: #444;
            background-color: #2d2d2d;
            color: #e0e0e0;
        }

        body.dark-mode .form-control:focus {
            box-shadow: 0 0 0 3px rgba(49, 130, 206, 0.3);
        }

        body.dark-mode .form-control[readonly] {
            background-color: #2d2d2d;
        }

        body.dark-mode .section-header {
            border-bottom-color: #444;
        }

        body.dark-mode label {
            color: #e0e0e0;
        }

        body.dark-mode .collapse-header {
            background-color: #2d2d2d;
            color: #e0e0e0;
        }

        body.dark-mode .btn-outline {
            border-color: #444;
            color: #e0e0e0;
        }

        body.dark-mode .btn-outline:hover {
            background-color: #2d2d2d;
        }

        body.dark-mode .form-actions {
            border-top-color: #444;
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .form-grid {
                grid-template-columns: 1fr;
            }

            .profile-form {
                padding: 15px;
            }
        }

        @media (max-width: 480px) {
            .form-actions {
                flex-direction: column;
            }

            .btn {
                width: 100%;
                justify-content: center;
            }

            .photo-upload {
                flex-direction: column;
                align-items: flex-start;
            }
        }
    </style>
</head>

<?php
include(DRIVE_PATH . "../database.php");
?>

<body>
    <div class="container">
        <?php if (isset($_SESSION["error"])) { ?>
            <div class="alert alert-danger"><?php echo $_SESSION["error"]; ?></div>
            <script>
                $(document).ready(function() {
                    $(".alert").fadeOut(10000);
                    <?php unset($_SESSION["error"]); ?>
                });
            </script>
        <?php } ?>

        <?php if (isset($_SESSION["success"])) {
        ?>
            <div class="alert alert-success"><?php echo $_SESSION["success"]; ?></div>
            <script>
                $(document).ready(function() {
                    $(".alert").fadeOut(10000);
                    <?php unset($_SESSION["success"]); ?>
                });
            </script>
        <?php }

        $sel = $conn->prepare("SELECT * FROM member WHERE `email`='" . $_SESSION["email"] . "'");
        $sel->execute();
        $sel = $sel->fetchAll();
        ?>
        <div class="profile-container">
            <div class="profile-header">
                <div class="profile-actions">
                    <button class="btn btn-edit"><i class="fas fa-edit"></i> Edit</button>
                </div>
                <?php
                foreach ($sel as $r) { ?>
                    <img src="<?php echo HTTP_PATH . "/img/profile/" . ($r["img"] != null) ? $r["img"] : "avtar.png"; ?>" alt="Profile picture" class="profile-pic">
                    <h1 class="user-name"><?php echo $r["FirstName"] . " " . $r["LastName"]; ?></h1>
                    <p class="user-title"><?php echo $r["email"]; ?></p>
                    <span class="membership-badge badge-active"><?php echo $r["status"]; ?></span>
                <?php } ?>
            </div>

            <div class="profile-content">
                <div class="card">
                    <div class="card-header">
                        <h2 class="card-title">Personal Details</h2>
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="info-group">
                        <div class="info-label">First Name</div>
                        <div class="info-value"><?php echo $r["FirstName"]; ?></div>
                    </div>
                    <div class="info-group">
                        <div class="info-label">Last Name</div>
                        <div class="info-value"><?php echo $r["LastName"]; ?></div>
                    </div>
                    <div class="info-group">
                        <div class="info-label">Email</div>
                        <div class="info-value"><?php echo $r["email"]; ?></div>
                    </div>
                    <div class="info-group">
                        <div class="info-label">Phone</div>
                        <div class="info-value"><?php echo $r["phone"]; ?></div>
                    </div>
                    <div class="info-group">
                        <div class="info-label">Gender</div>
                        <div class="info-value"><?php echo $r["gender"]; ?></div>
                    </div>
                    <div class="info-group">
                        <div class="info-label">Date of Birth</div>
                        <div class="info-value"><?php echo date("d/m/Y", strtotime($r["dob"])); ?></div>
                    </div>
                    <div class="info-group">
                        <div class="info-label">Address</div>
                        <div class="info-value"><?php echo unserialize($r["address"])[0] . " " . unserialize($r["address"])[1] . " near " . unserialize($r["address"])[2] . ", " . unserialize($r["address"])[3] . " - " . unserialize($r["address"])[4]; ?></div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h2 class="card-title">Emergency Contact</h2>
                        <i class="fas fa-exclamation-triangle"></i>
                    </div>
                    <div class="emergency-contact">
                        <div class="contact-icon">
                            <i class="fas fa-user"></i>
                        </div>
                        <div>
                            <div class="info-value"><?php echo $r["FirstName"] . " " . $r["LastName"]; ?></div>
                            <div class="info-label"><?php echo $r["email"]; ?></div>
                            <div class="info-value"><?php echo $r["phone"]; ?></div>
                        </div>
                    </div>
                </div>
            </div>

            <?php
            $sel = $conn->prepare("SELECT * FROM membership WHERE `email`='" . $_SESSION["email"] . "' AND status='Active'");
            $sel->execute();
            $sel = $sel->fetchAll();
            $membership = false;

            foreach ($sel as $r) {
                $membership = true;
            }

            if ($membership) {
                $sel = $conn->prepare("SELECT * FROM membership WHERE email='" . $_SESSION["email"] . "' AND status='Active'");

                $sel->execute();
                $sel = $sel->fetchAll(); ?>
                <h3 class="text-light">Active Memberships</h3>
                <div class="profile-content">
                    <?php foreach ($sel as $r) {
                    ?>
                        <div class="card">
                            <div class="card-header">
                                <h2 class="card-title">Membership Details</h2>
                                <i class="fas fa-id-card"></i>
                            </div>

                            <?php
                            if ($membership) { ?>
                                <div class="info-group">
                                    <div class="info-label">Membership Type</div>
                                    <div class="info-value"><?php echo $r["membership_type"]; ?></div>
                                </div>
                                <div class="info-group">
                                    <div class="info-label">Membership Status</div>
                                    <div class="info-value"><?php echo $r["status"]; ?></div>
                                </div>
                                <div class="info-group">
                                    <div class="info-label">Join Date</div>
                                    <div class="info-value"><?php echo date("d M, Y", strtotime($r["start_date"])); ?></div>
                                </div>
                                <div class="info-group">
                                    <div class="info-label">Expiry Date</div>
                                    <div class="info-value"><?php echo date("d M, Y", strtotime($r["end_date"])); ?></div>
                                </div>
                                <div class="info-group">
                                    <div class="info-label">Membership Plan</div>
                                    <div class="info-value"><?php echo $r["plan_duration"]; ?></div>
                                </div>
                                <div class="info-group">
                                    <div class="info-label">Membership Fee</div>
                                    <div class="info-value">&#8377; <?php echo $r["membership_fee"]; ?></div>
                                </div>
                            <?php } else { ?>
                                <div class="alert alert-danger position-relative">You Have No Membership</div>
                            <?php } ?>
                        </div>
                    <?php } ?>
                </div>
            <?php } ?>

            <?php
            $sel = $conn->prepare("SELECT * FROM membership WHERE `email`='" . $_SESSION["email"] . "' AND status='Expired'");
            $sel->execute();
            $sel = $sel->fetchAll();
            $membership = false;

            foreach ($sel as $r) {
                $membership = true;
            }

            if ($membership) {
                $sel = $conn->prepare("SELECT * FROM membership WHERE email='" . $_SESSION["email"] . "' AND status='Expired'");

                $sel->execute();
                $sel = $sel->fetchAll(); ?>
                <h3 class="text-light">Expired Memberships</h3>
                <div class="profile-content">
                    <?php foreach ($sel as $r) {
                    ?>
                        <div class="card">
                            <div class="card-header">
                                <h2 class="card-title">Membership Details</h2>
                                <i class="fas fa-id-card"></i>
                            </div>

                            <?php
                            if ($membership) { ?>
                                <div class="info-group">
                                    <div class="info-label">Membership Type</div>
                                    <div class="info-value"><?php echo $r["membership_type"]; ?></div>
                                </div>
                                <div class="info-group">
                                    <div class="info-label">Membership Status</div>
                                    <div class="info-value"><?php echo $r["status"]; ?></div>
                                </div>
                                <div class="info-group">
                                    <div class="info-label">Join Date</div>
                                    <div class="info-value"><?php echo date("d M, Y", strtotime($r["start_date"])); ?></div>
                                </div>
                                <div class="info-group">
                                    <div class="info-label">Expiry Date</div>
                                    <div class="info-value"><?php echo date("d M, Y", strtotime($r["end_date"])); ?></div>
                                </div>
                                <div class="info-group">
                                    <div class="info-label">Membership Plan</div>
                                    <div class="info-value"><?php echo $r["plan_duration"]; ?></div>
                                </div>
                                <div class="info-group">
                                    <div class="info-label">Membership Fee</div>
                                    <div class="info-value">&#8377; <?php echo $r["membership_fee"]; ?></div>
                                </div>
                            <?php } else { ?>
                                <div class="alert alert-danger position-relative">You Have No Membership</div>
                            <?php } ?>
                        </div>
                    <?php } ?>
                </div>
            <?php } ?>

            <?php
            $sel = $conn->prepare("SELECT * FROM membership WHERE `email`='" . $_SESSION["email"] . "' AND status='Suspended'");
            $sel->execute();
            $sel = $sel->fetchAll();
            $membership = false;

            foreach ($sel as $r) {
                $membership = true;
            }
            if ($membership) {
                $sel = $conn->prepare("SELECT * FROM membership WHERE email='" . $_SESSION["email"] . "' AND status='Suspended'");

                $sel->execute();
                $sel = $sel->fetchAll(); ?>
                <h3 class="text-light">Suspended Memberships</h3>
                <div class="profile-content">
                    <?php foreach ($sel as $r) {
                    ?>
                        <div class="card">
                            <div class="card-header">
                                <h2 class="card-title">Membership Details</h2>
                                <i class="fas fa-id-card"></i>
                            </div>

                            <?php
                            if ($membership) { ?>
                                <div class="info-group">
                                    <div class="info-label">Membership Type</div>
                                    <div class="info-value"><?php echo $r["membership_type"]; ?></div>
                                </div>
                                <div class="info-group">
                                    <div class="info-label">Membership Status</div>
                                    <div class="info-value"><?php echo $r["status"]; ?></div>
                                </div>
                                <div class="info-group">
                                    <div class="info-label">Join Date</div>
                                    <div class="info-value"><?php echo date("d M, Y", strtotime($r["start_date"])); ?></div>
                                </div>
                                <div class="info-group">
                                    <div class="info-label">Expiry Date</div>
                                    <div class="info-value"><?php echo date("d M, Y", strtotime($r["end_date"])); ?></div>
                                </div>
                                <div class="info-group">
                                    <div class="info-label">Membership Plan</div>
                                    <div class="info-value"><?php echo $r["plan_duration"]; ?></div>
                                </div>
                                <div class="info-group">
                                    <div class="info-label">Membership Fee</div>
                                    <div class="info-value">&#8377; <?php echo $r["membership_fee"]; ?></div>
                                </div>
                            <?php } else { ?>
                                <div class="alert alert-danger position-relative">You Have No Membership</div>
                            <?php } ?>
                        </div>
                    <?php } ?>
                </div>
            <?php } ?>
        </div>

        <div class="edit-profile-container py-4" style="display: none;">
            <div class="edit-profile-header">
                <i class="fas fa-user-edit"></i>
                <h2>Edit Profile</h2>
            </div>

            <?php
            $sel = $conn->prepare("SELECT * FROM member WHERE email='" . $_SESSION["email"] . "'");
            $sel->execute();
            $sel = $sel->fetchAll();

            foreach ($sel as $r) { ?>
                <form action="<?php echo HTTP_PATH . "/user_panel/profile/update.php"; ?>" method="post" enctype="multipart/form-data" class="profile-form">
                    <!-- Personal Information Section -->
                    <div class="form-section">
                        <div class="section-header">
                            <i class="fas fa-user"></i>
                            <h3>Personal Information</h3>
                        </div>

                        <!-- Profile Photo Upload -->
                        <div class="photo-upload">
                            <img src="<?php echo HTTP_PATH . "/user_panel/img/profile/" . ($r["img"] != null) ? $r["img"] : "avtar.png"; ?>" alt="Profile picture" class="profile-pic">

                            <div class="upload-btn">
                                <button type="button" class="btn btn-outline">
                                    <i class="fas fa-camera"></i> Change Photo
                                </button>
                                <input type="file" name="img" accept="image/*">
                            </div>
                        </div>

                        <div class="form-grid">
                            <div class="form-group">
                                <label for="firstName">First Name</label>
                                <input type="text" id="firstName" name="FirstName" class="form-control" value="<?php echo $r["FirstName"]; ?>" required>
                            </div>

                            <div class="form-group">
                                <label for="lastName">Last Name</label>
                                <input type="text" id="lastName" name="LastName" class="form-control" value="<?php echo $r["LastName"]; ?>" required>
                            </div>

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" id="email" name="email" class="form-control" value="<?php echo $r["email"]; ?>" readonly />
                            </div>

                            <div class="form-group">
                                <label for="phone">Phone Number</label>
                                <input type="tel" id="phone" name="phone" class="form-control" value="<?php echo $r["phone"]; ?>">
                            </div>

                            <div class="form-group">
                                <label for="gender">Gender</label>
                                <div class="select-wrapper">
                                    <select id="gender" name="gender" class="form-control form-select">
                                        <option value="male" <?php echo ($r["gender"] == "Male") ? "selected" : ""; ?>>Male</option>
                                        <option value="female" <?php echo ($r["gender"] == "Female") ? "selected" : ""; ?>>Female</option>
                                        <option value="other" <?php echo ($r["gender"] == "Other") ? "selected" : ""; ?>>Other</option>
                                        <option value="prefer-not-to-say">Prefer not to say</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="dob">Date of Birth</label>
                                <input type="text" id="dob" name="dob" class="form-control" value="<?php echo date("Y-m-d", strtotime($r["dob"])); ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Address</label>
                            <div class="row py-2">
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="house-number" placeholder="House Number" value="<?php echo ($r["address"]!=null)?unserialize($r["address"])[0]:""; ?>" />
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="apartment" placeholder="Street" value="<?php echo ($r["address"]!=null)?unserialize($r["address"])[1]:""; ?>" />
                                </div>
                            </div>

                            <div class="row py-2">
                                <div class="col-md-4">
                                    <input type="text" class="form-control" name="suite" placeholder="Suite" value="<?php echo ($r["address"]!=null)?unserialize($r["address"])[2]:""; ?>">
                                </div>
                                <div class="col-md-4">
                                    <input type="text" class="form-control" name="city" placeholder="City" value="<?php echo ($r["address"]!=null)?unserialize($r["address"])[3]:""; ?>" />
                                </div>
                                <div class="col-md-4">
                                    <input type="number" minlength="6" maxlength="6" class="form-control" name="pincode" placeholder="Pincode" value="<?php echo ($r["address"]!=null)?unserialize($r["address"])[4]:""; ?>" />
                                </div>
                            </div>
                        </div>
                        <!-- Form Actions -->
                        <div class="form-actions">
                            <button type="submit" name="save" class="btn btn-primary">
                                <i class="fas fa-save"></i> Save Changes
                            </button>
                        </div>
                    </div>
                </form>
        </div>
    </div>
<?php } ?>
<?php include(DRIVE_PATH . "/user_panel/footer/footer.php"); ?>

<script>
    $(document).ready(function() {
        $(".btn-edit").click(function() {
            $(".profile-content").prev("h3").toggle();
            $(".profile-content").toggle();
            $(".edit-profile-container").toggle();
        });
    });
</script>
</body>

</html>