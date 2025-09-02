<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />

    <title>Products List</title>
    <?php include("C:/xampp/htdocs/php/IFS/admin_panel/links.php"); ?>
</head>

<style>
    .products i {
        color: green !important;
    }

    .products h5 {
        color: green !important;
    }
</style>

<script>
    $(document).ready(() => {
        $(".product-list").DataTable();
    });
</script>

<?php

if (isset($_POST["submit"])) {
    if (isset($_FILES["img"]["name"]) && $_FILES["img"]["name"] != null) {
        if (str_contains($_FILES["img"]["name"], "'")) {
            $_FILES["img"]["name"] = explode("'", $_FILES["img"]["name"]);
            $_FILES["img"]["name"] = $_FILES["img"]["name"][0] . $_FILES["img"]["name"][1];
        }

        $in = $conn->prepare("INSERT INTO `service` VALUES('','" . $_POST["name"] . "','" . $_POST["category"] . "','" . $_POST["flavor"] . "','" . $_POST["price"] . "','" . $_POST["badge"] . "','" . $_POST["description"] . "','" . $_POST["protein"] . "','" . $_POST["bcaa"] . "','" . $_POST["size"] . "','" . $_FILES["img"]["name"] . "'");

        if ($in->execute()) {
            move_uploaded_file($_FILES["img"]["tmp_name"], DRIVE_PATH . "/img/products/" . $_FILES["img"]["name"] . "");

            $_SESSION["success"] = "Product Added Successfully";
        }
    } else {
        $_SESSION["error"] = "Please! Select the Product Image";
    }
} ?>

<body class="">
    <div class="wrapper ">
        <!-- // Sidebar -->
        <?php include(DRIVE_PATH . "/admin_panel/sidenav.php"); ?>

        <div class="main-panel">
            <?php include(DRIVE_PATH . "/admin_panel/header/header.php"); ?>

            <div class="content">
                <div class="container card p-3">
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

                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="row px-3 py-2">
                            <div class="col-md-6">
                                <span class="text-danger">Product Image <b>*</b></span>
                                <input type="file" class="form-control" id="img" name="img" required />
                            </div>
                        </div>
                        <div class="row px-3 py-2">
                            <div class="col-md-6">
                                <span class="text-danger">Name <b>*</b></span>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Product Name" required />
                            </div>
                            <div class="col-md-6">
                                <span class="text-danger">Category <b>*</b></span>
                                <input type="text" class="form-control" id="category" name="category" placeholder="Product Category" required />
                            </div>
                        </div>
                        <div class="row px-3 py-2">
                            <div class="col-md-6">
                                <span class="text-danger">Flavor</span>
                                <input type="text" class="form-control" id="flavor" name="flavor" placeholder="Product Flavor" required />
                            </div>
                            <div class="col-md-6">
                                <span class="text-danger">Price</span>
                                <input type="number" class="form-control" id="price" name="price" placeholder="Product Price (&#8377;)" />
                            </div>
                        </div>
                        <div class="row px-3 py-2">
                            <div class="col-md-6">
                                <span class="text-danger">Protein</span>
                                <input type="text" class="form-control" id="protein" name="protein" placeholder="25g per serving" />
                            </div>
                            <div class="col-md-6">
                                <span class="text-danger">Badge</span>
                                <input type="text" class="form-control" id="badge" name="badge" placeholder="Bestseller" />
                            </div>
                        </div>
                        <div class="row px-3 py-2">
                            <div class="col-md-6">
                                <span class="text-danger">Bcaa</span>
                                <input type="text" class="form-control" id="bcaa" name="bcaa" placeholder="5.5g per serving" />
                            </div>
                            <div class="col-md-6">
                                <span class="text-danger">Size <b>*</b></span>
                                <input type="text" class="form-control" id="size" name="size" placeholder="2 lbs (907g)" required />
                            </div>
                        </div>
                        <div class="row px-3 py-2">
                            <div class="col-md-12">
                                <span class="text-danger">Description</span>
                                <textarea class="form-control" id="description" name="description" placeholder="Product Description"></textarea>
                            </div>
                        </div>
                        <div class="row px-3 py-2">
                            <div class="col-md-12">
                                <button class="btn btn-danger" name="submit">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <footer class="footer footer-black  footer-white ">
                <?php include(DRIVE_PATH . "/admin_panel/footer/footer.php"); ?>
            </footer>
        </div>
    </div>
</body>

</html>