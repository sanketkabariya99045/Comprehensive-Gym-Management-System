<style>
    img {
        mix-blend-mode: multiply !important;
    }

    .btn-group {
        width: 100% !important;
        height: 100% !important;
    }

    .btn-group button {
        position: relative;
    }

    .btn-group span {
        position: absolute;
        right: 15%;
        font-size: 17px;
        padding: 2.5% 3.5%;
        color: white;
        background-color: red;
        margin-left: 2%;
        border-radius: 10px;
    }

    .btn-group ul {
        width: 100% !important;
    }

    .btn-group li:hover {
        background-color: transparent !important;
    }

    .btn-group li a:hover i {
        color: white !important;
    }

    .dropdown-toggle {
        display: flex !important;
        align-items: center !important;
        background-color: transparent !important;
    }

    .dropdown-toggle:hover i {
        color: white !important;
    }

    .dropdown-toggle:focus i {
        color: white !important;
    }
</style>

<div class="sidebar" data-color="white" data-active-color="danger">
    <i class="fa-solid fa-arrow-left"></i>
    <div class="logo">
        <a class="simple-text logo-mini">
            <div class="logo-image-big">
                <img src="<?php echo HTTP_PATH . "/admin_panel/admin.png"; ?>" type="image/x-icon" />
            </div>
        </a>
        <a class="simple-text logo-normal">
            Admin Panel
        </a>
    </div>
    <div class="sidebar-wrapper">
        <ul class="nav">
            <li>
                <a href="<?php echo HTTP_PATH . "/admin_panel/index.php"; ?>" class="members">
                    <i class="fa-solid fa-user text-danger"></i>
                    <h5 class="text-danger">Members</h5>
                </a>
            </li>
            <li>
                <a href="<?php echo HTTP_PATH . "/admin_panel/trainer/trainer.php"; ?>" class="trainers">
                    <i class="fa-solid fa-user text-danger"></i>
                    <h5 class="text-danger">Trainers</h5>
                </a>
            </li>
            <li>
                <a href="<?php echo HTTP_PATH . "/admin_panel/membership/membership.php"; ?>" class="memberships">
                    <i class="fa-solid fa-id-card text-danger"></i>
                    <h5 class="text-danger">Memberships</h5>
                </a>
            </li>
            <li>
                <a href="<?php echo HTTP_PATH . "/admin_panel/services/service.php"; ?>" class="services">
                    <i class="fa-solid fa-robot text-danger"></i>
                    <h5 class="text-danger">Services</h5>
                </a>
            </li>
            <li>
                <a href="<?php echo HTTP_PATH . "/admin_panel/products/products.php"; ?>" class="text-danger products">
                    <i class="fa-solid fa-list text-danger"></i>
                    <h5 class="text-danger">Products</h5>
                </a>
            </li>
            <li>
                <a href="<?php echo HTTP_PATH . "/admin_panel/feedback/feedback.php"; ?>" class="reviews">
                    <i class="fa-solid fa-star text-danger"></i>
                    <h5 class="text-danger">Reviews</h5>
                </a>
            </li>
            <li>
                <a href="<?php echo HTTP_PATH . "/admin_panel/attendance/attendance.php"; ?>">
                    <i class="fa-solid fa-tachograph-digital text-danger"></i>
                    <h5 class="text-danger">Attendance</h5>
                </a>
            </li>
            <li>
                <a href="<?php echo HTTP_PATH . "/admin_panel/logout.php"; ?>">
                    <i class="fa-solid fa-right-from-bracket" style="color: red;"></i>
                    <h5 style="color: red;">Logout</h5>
                </a>
            </li>
        </ul>
    </div>
</div>