<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />

    <title>Trainer's List</title>
    <?php include("C:/xampp/htdocs/php/IFS/admin_panel/links.php"); ?>
</head>

<style>
    td img {
        width: 100px;
        height: 100px;
    }

    .trainer-form {
        display: none;
    }

    .trainers i {
        color: green !important;
    }

    .trainers h5 {
        color: green !important;
    }
</style>

<script>
    $(document).ready(function() {
        $(".add-trainer").click(function() {
            $(".trainer-form").show();
            $(".trainers-list").hide();
        });
        $(".cancel-btn").click(function() {
            $(".trainer-form").hide();
            $(".trainers-list").show();
        });

        $(".trainer-list").DataTable();

    });
</script>

<body class="">
    <div class="wrapper ">
        <?php include(DRIVE_PATH . "/admin_panel/sidenav.php"); ?>

        <div class="main-panel">
            <!-- Navbar -->
            <?php include(DRIVE_PATH . "/admin_panel/header/header.php"); ?>

            <div class="content">
                <?php if (isset($_SESSION["success"])) { ?>
                    <div class="alert alert-success"><?php echo $_SESSION["success"]; ?></div>
                    <script>
                        $(document).ready(function() {
                            $(".alert").fadeOut(10000);
                            <?php unset($_SESSION["success"]); ?>
                        });
                    </script>
                <?php } ?>
                <?php if (isset($_SESSION["error"])) { ?>
                    <div class="alert alert-danger"><?php echo $_SESSION["error"]; ?></div>
                    <script>
                        $(document).ready(function() {
                            $(".alert").fadeOut(10000);
                            <?php unset($_SESSION["error"]); ?>
                        });
                    </script>
                <?php } ?>


                <!-- //! Trainer's List -->
                <div class="card">
                    <div class="row">
                        <div class="col-md-10">
                            <h6 class="mx-5 py-3 text-danger">Trainer's List</h6>
                        </div>
                        <div class="col-md-2">
                            <button class="btn btn-danger add-trainer">Add Trainer</button>
                        </div>
                    </div>
                </div>
                <hr />



                <!-- //! Add New Trainer -->
                <div class="card p-4 trainer-form">
                    <div class="card-header">
                        <h2>Trainer's Information</h2>
                    </div>

                    <form action="add.php" method="post" enctype="multipart/form-data">
                        <div class="row px-3 py-2">
                            <div class="col-md-6">
                                <h6 class="text-danger" for="trainerName">Trainer's Image *</h6 class="text-danger">
                                <input type="file" name="img" placeholder="Choose Service Image" class="form-control" required>
                            </div>
                        </div>

                        <div class="row px-3 py-2">
                            <div class="col-md-6">
                                <h6 class="text-danger" for="trainerName">First Name *</h6 class="text-danger">
                                <input type="text" name="FirstName" id="trainerName" class="form-control" required>
                            </div>
                            <div class="col-md-6">
                                <h6 class="text-danger" for="trainerName">Last Name *</h6 class="text-danger">
                                <input type="text" name="LastName" id="trainerName" class="form-control" required>
                            </div>
                        </div>


                        <div class="row px-3 py-2">
                            <div class="col-md-6">
                                <h6 class="text-danger" for="trainerName">Phone *</h6 class="text-danger">
                                <input type="number" name="phone" id="trainerName" class="form-control" required>
                            </div>
                            <div class="col-md-6">
                                <h6 class="text-danger" for="trainerName">Specialization *</h6 class="text-danger">
                                <input type="text" name="specialization" id="trainerName" class="form-control" required>
                            </div>
                        </div>

                        <div class="row px-3 pt-2">
                            <div class="col-md-12">
                                <button type="submit" name="save_trainer" class="btn btn-danger">Save Service</button>
                            </div>
                        </div>
                    </form>
                    <button class="btn btn-dark cancel-btn mx-3">Cancel</button>
                </div>



                <div class="card p-3 trainers-list">
                    <table class="trainer-list">
                        <thead class="bg-danger text-light">
                            <tr>
                                <th class="col-md-1">Sr.</th>
                                <th class="col-md-1">Trainer ID</th>
                                <th class="col-md-1">Profile</th>
                                <th class="col-md-2 text-center">First Name</th>
                                <th class="col-md-2 text-center">Last Name</th>
                                <th class="col-md-3">Specialization</th>
                                <th class="col-md-2">Phone</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            $sel_user = $conn->prepare("SELECT * FROM `trainer`");
                            $sel_user->execute();
                            $sel_user = $sel_user->fetchAll();
                            $i = 1;

                            foreach ($sel_user as $r) { ?>
                                <tr class="border-bottom">
                                    <td class="col-md-1"><?php echo $i . ")"; ?></td>
                                    <td class="col-md-1"><?php echo $r["TrainerID"]; ?></td>
                                    <td class="col-md-1"><img style="border-radius: 50%;" src="<?php echo HTTP_PATH . "/img/trainer/" . $r["img"]; ?>" /></td>
                                    <td class="col-md-2 text-center"><?php echo $r["FirstName"]; ?></td>
                                    <td class="col-md-2 text-center"><?php echo $r["LastName"]; ?></td>
                                    <td class="col-md-3"><?php echo $r["Specialization"]; ?></td>
                                    <td class="col-md-2"><?php if ($r["Phone"] != 0) {
                                                                echo $r["Phone"];
                                                            } else {
                                                                echo "-";
                                                            } ?></td>
                                </tr>
                            <?php $i++;
                            } ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <footer class="footer footer-black  footer-white ">
                <?php include(DRIVE_PATH . "/admin_panel/footer/footer.php"); ?>
            </footer>
        </div>
    </div>

</body>

</html>