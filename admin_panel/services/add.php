<?php //session_start(); 
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Service</title>
    <?php include("C:/xampp/htdocs/php/IFS/admin_panel/links.php"); ?>

    <style>
        /* Admin Panel Styles */
        :root {
            --primary: #f36100;
            --light: #ECF0F1;
        }

        .services i {
            color: green !important;
        }

        .services h5 {
            color: green !important;
        }

        /* Form Styles */
        .card {
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            padding: 25px;
            margin-bottom: 30px;
        }

        .card-header {
            margin-bottom: 20px;
            padding-bottom: 15px;
            border-bottom: 1px solid #eee;
        }

        .card-header h2 {
            font-size: 1.5rem;
            color: var(--primary);
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group h6 label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: var(--primary);
        }

        .form-control {
            width: 100%;
            padding: 12px 15px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 1rem;
            transition: all 0.3s;
        }

        .form-control:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(139, 0, 0, 0.1);
            outline: none;
        }

        textarea.form-control {
            min-height: 120px;
            resize: vertical;
        }

        .form-row {
            display: flex;
            flex-wrap: wrap;
            margin: 0 -15px;
        }

        .form-col {
            flex: 1;
            padding: 0 15px;
            min-width: 250px;
        }

        /* Button Styles */
        .btn {
            display: inline-block;
            padding: 12px 24px;
            border: none;
            border-radius: 4px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            text-align: center;
            text-decoration: none;
            transition: all 0.3s;
        }

        .btn-primary {
            background: var(--primary);
            color: white;
        }

        .btn-primary:hover {
            background: #6d0000 !important;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .form-actions {
            display: flex;
            justify-content: flex-end;
            gap: 15px;
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid #eee;
        }

        /* Responsive Styles */
        @media (max-width: 768px) {
            .form-col {
                flex: 0 0 100%;
                margin-bottom: 15px;
            }

            .form-actions {
                flex-direction: column;
            }

            .btn {
                width: 100%;
                margin-bottom: 10px;
            }
        }
    </style>
</head>

<?php

if (isset($_POST["save_service"])) {
    if (isset($_FILES["img"]["name"]) && $_FILES["img"]["name"] != null) {
        if (str_contains($_FILES["img"]["name"], "'")) {
            $_FILES["img"]["name"] = explode("'", $_FILES["img"]["name"]);
            $_FILES["img"]["name"] = $_FILES["img"]["name"][0] . $_FILES["img"]["name"][1];
        }

        $in = $conn->prepare("INSERT INTO `service` VALUES('','" . $_FILES["img"]["name"] . "','" . $_POST["name"] . "','" . $_POST["description"] . "'," . $_POST["price"] . ",'" . $_POST["duration"] . "','" . $_POST["category"] . "','" . $_POST["availability"] . "',NOW(), NOW())");

        if ($in->execute()) {
            move_uploaded_file($_FILES["img"]["tmp_name"], DRIVE_PATH . "/img/services/" . $_FILES["img"]["name"] . "");

            $_SESSION["success"] = "Service Added Successfully";
        }
    } else {
        $_SESSION["error"] = "Please! Select the Service Image";
    }
} ?>

<body>
    <div class="wrapper ">
        <?php include(DRIVE_PATH . "/admin_panel/sidenav.php"); ?>

        <div class="main-panel">
            <!-- Navbar -->
            <?php include(DRIVE_PATH . "/admin_panel/header/header.php"); ?>

            <div class="content">

                <div class="card">
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
                    <div class="card-header">
                        <h2>Service Information</h2>
                    </div>

                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="row px-3 py-2">
                            <div class="col-md-6">
                                <h6 class="text-danger" for="serviceName">Service Image *</h6 class="text-danger">
                                <input type="file" name="img" placeholder="Choose Service Image" class="form-control" required>
                            </div>

                            <div class="col-md-6">
                                <h6 class="text-danger" for="serviceName">Service Name *</h6 class="text-danger">
                                <input type="text" name="name" id="serviceName" class="form-control" required>
                            </div>
                        </div>

                        <div class="row px-3 py-2">
                            <div class="col-md-6">
                                <h6 class="text-danger" for="serviceCategory">Category *</h6 class="text-danger">
                                <input type="text" name="category" id="" class="form-control" />
                            </div>

                            <div class="col-md-6">
                                <h6 class="text-danger" for="servicePrice">Price *</h6 class="text-danger">
                                <div class="input-group">
                                    <span class="input-group-text">&#8377;</span>
                                    <input type="number" name="price" id="servicePrice" class="form-control" min="0" step="0.01" required>
                                </div>
                            </div>
                        </div>

                        <div class="row px-3 py-2">
                            <div class="col-md-6">
                                <h6 class="text-danger" for="serviceDuration">Duration (Months) *</h6 class="text-danger">
                                <input type="text" name="duration" id="serviceDuration" class="form-control" min="5" required>
                            </div>
                            <div class="col-md-6">
                                <h6 class="text-danger" for="serviceDuration">Availability *</h6 class="text-danger">
                                <select name="availability" class="form-control">
                                    <option value="1">Available Now</option>
                                    <option value="0">Not Available Now</option>
                                </select>
                            </div>
                        </div>

                        <div class="row px-3 py-2">
                            <div class="col-md-12">
                                <h6 class="text-danger" for="serviceDescription">Description *</h6 class="text-danger">
                                <textarea id="serviceDescription" name="description" class="form-control" required></textarea>
                            </div>
                        </div>

                        <div class="form-actions">
                            <button type="button" class="btn btn-secondary">Cancel</button>
                            <button type="submit" name="save_service" class="btn btn-primary">Save Service</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            // Toggle switch functionality
            $('#serviceStatus').change(function() {
                if ($(this).is(':checked')) {
                    $('#statush6 class="text-danger"').text('Active');
                } else {
                    $('#statush6 class="text-danger"').text('Inactive');
                }
            });
            $('#serviceImage').change(function() {
                if (this.files && this.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        $('#previewImage').attr('src', e.target.result);
                        $('#imagePreview').show();
                        $('#imageUpload').hide();
                    }

                    reader.readAsDataURL(this.files[0]);
                }
            });

            $('#removeImage').click(function() {
                $('#serviceImage').val('');
                $('#previewImage').attr('src', '#');
                $('#imagePreview').hide();
                $('#imageUpload').show();
            });

            // Input validation
            $('.form-control[required]').on('input', function() {
                if ($(this).val() === '') {
                    $(this).addClass('is-invalid');
                } else {
                    $(this).removeClass('is-invalid');
                }
            });
        });
    </script>
</body>

</html>