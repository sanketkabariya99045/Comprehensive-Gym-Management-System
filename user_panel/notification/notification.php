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
    <title>IronForce Gym - Notifications</title>
    <style>
        * {
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            background-color: #111111;
            transition: background 0.3s ease;
        }

        a {
            color: black;
        }

        a:hover {
            color: black;
        }

        .notifications.container {
            margin: 10rem auto 2rem auto;
            padding: 2rem;
        }

        .notifications-list {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .notification-card {
            position: relative;
            background-color: #f9f9f9;
            border-radius: 8px;
            padding: 40px 20px 10px 20px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s ease, box-shadow 0.2s ease;
            position: relative;
        }

        body.dark-mode .notification-card {
            background-color: #1e1e1e;
            color: #f5f5f5;
        }

        .notification-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
        }

        .notification-card .unread-dot {
            position: absolute;
            top: 12%;
            left: 1%;
            width: 8px;
            height: 8px;
            background-color: red;
            border-radius: 50%;
        }

        .notification-header {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
            align-items: center;
        }

        .notifications .member-id {
            font-weight: 600;
            color: #f36100;
        }

        .notification-date {
            font-size: 14px;
            color: #777;
        }

        body.dark-mode .notification-date {
            color: #aaa;
        }

        .notification-message {
            margin-bottom: 15px;
            line-height: 1.5;
        }

        .notification-actions {
            display: flex;
            justify-content: flex-end;
        }

        .notifications button {
            color: white;
            border: none;
            padding: 8px 16px;
            border-radius: 4px;
            cursor: pointer;
            font-weight: 500;
            transition: background 0.2s ease;
        }

        .mark-as-read {
            background-color: #f36100;
        }

        .mark-as-read:hover {
            background-color: #e05500;
        }

        @media (max-width: 768px) {
            .controls {
                width: 100%;
                justify-content: space-between;
            }
        }
    </style>
</head>

<body>
    <div class="notifications container">
        <div class="notifications-list">
            <?php

            $sel = $conn->prepare("SELECT * FROM `notification` WHERE `email`='" . $_SESSION["email"] . "' ORDER BY `NotificationID` DESC");
            $sel->execute();
            $sel = $sel->fetchAll();

            foreach ($sel as $key => $r) { ?>
                <a href="<?php echo HTTP_PATH . "/user_panel/" . $r["type"] . "/" . $r["type"] . ".php"; ?>">
                    <!-- Notification 1 (Unread) -->
                    <div class="notification-card <?php echo ($r["status"] == "Unread") ? "unread" : ""; ?>">
                        <?php if ($r["status"] == "Unread") { ?>
                            <b class="unread-dot"></b>
                        <?php } ?>
                        <div class="notification-header">
                            <span class="member-id">Notification ID: <?php echo $r["NotificationID"]; ?></span>
                            <span class="notification-date"><?php echo date("d M, Y h:i A", strtotime($r["NotificationDate"])); ?></span>
                        </div>
                        <div class="notification-message">
                            <?php echo $r["Message"]; ?>
                        </div>
                        <div class="notification-actions">
                            <?php
                            if ($r["status"] == "Unread") { ?>
                                <button class="mark-as-read" value="<?php echo $r["NotificationID"]; ?>">Mark as Read</button>
                            <?php } else { ?>
                                <button style="background-color: #4CAF50;">✓ Read</button>
                            <?php } ?>
                        </div>
                    </div>
                </a>
            <?php } ?>
        </div>
    </div>

    <?php
    include(DRIVE_PATH . "/user_panel/footer/footer.php");
    ?>

    <script>
        $(document).ready(function() {
            // Mark as Read
            $(".mark-as-read").click(function() {
                let NotificationID = $(this).val();

                $.ajax({
                    type: "POST",
                    url: "read.php",
                    data: {
                        NotificationID: NotificationID
                    },
                    success: function() {
                        location.reload();
                    }
                });
            });
        });
    </script>
</body>

</html>