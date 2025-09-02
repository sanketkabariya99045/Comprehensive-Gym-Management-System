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

<?php
if (isset($_SESSION["product_id"])) {
    unset($_SESSION["product_id"]);
}
if (isset($_SESSION["cat_success"])) {
    unset($_SESSION["cat_success"]);
}
if (isset($_SESSION["pr_img_suc"])) {
    unset($_SESSION["pr_img_suc"]);
}
if (isset($_SESSION["pr_details_suc"])) {
    unset($_SESSION["pr_details_suc"]);
}
?>


<style>
    tbody tr .edit-delete-btn a {
        display: none;
    }

    tbody tr:hover td {
        background-color: antiquewhite;
    }

    tbody tr:hover .edit-delete-btn a {
        display: block;
    }
</style>

<script>
    $(document).ready(() => {
        $(".product-list").DataTable();
    });
</script>

<body class="">
    <div class="wrapper ">
        <!-- // Sidebar -->
        <?php include(DRIVE_PATH . "/admin_panel/sidenav.php"); ?>

        <div class="main-panel">
            <?php include(DRIVE_PATH . "/admin_panel/header/header.php"); ?>

            <div class="content">
                <div class="card">
                    <div class="row">
                        <div class="col-md-10">
                            <h6 class="mx-5 py-4 text-danger">Products List</h6>
                        </div>
                        <div class="col-md-2 pt-2">
                            <a href="<?php echo HTTP_PATH . "/admin_panel/products/add.php"; ?>" class="btn btn-primary">Add Product</a>
                        </div>
                    </div>
                </div>
                <hr />

                <div class="card p-3">
                    <table class="product-list">
                        <thead class="bg-danger text-light">
                            <tr>
                                <th class="col-md-1 text-center">Product</th>
                                <th class="col-md-2 text-center">Name</th>
                                <th class="col-md-1 text-center">Category</th>
                                <th class="col-md-1 text-center">Flavor</th>
                                <th class="col-md-1 text-center">Price</th>
                                <th class="col-md-1 text-center">Badge</th>
                                <th class="col-md-3 text-center">Description</th>
                                <th class="col-md-1 text-center">Protein</th>
                                <th class="col-md-1 text-center">BCAA</th>
                                <th class="col-md-1 text-center">Size</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            $sel = $conn->prepare("SELECT * FROM `products`");
                            $sel->execute();
                            $sel = $sel->fetchAll();

                            foreach ($sel as $row) { ?>
                                <tr class="border-bottom">
                                    <td class="col-md-1 text-center"><img src="<?php echo HTTP_PATH . "/img/products/" . $row["img"]; ?>" /></td>
                                    <td class="col-md-2"><?php echo $row["name"]; ?></td>
                                    <td class="col-md-1"><?php echo $row["category"]; ?></td>
                                    <td class="col-md-1"><?php echo $row["flavor"]; ?></td>
                                    <td class="col-md-1 text-center">₹<?php echo $row["price"]; ?>
                                    </td>
                                    <td class="col-md-1 text-center"><?php echo $row["badge"]; ?></td>
                                    <td class="col-md-3"><?php echo $row["description"]; ?></td>
                                    <td class="col-md-1"><?php echo $row["protein"]; ?></td>
                                    <td class="col-md-1"><?php echo $row["bcaa"]; ?></td>
                                    <td class="col-md-1"><?php echo $row["size"]; ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>


                <!-- //* Categories -->
                <div class="card p-3 mt-5">
                    <h6>Categories</h6>
                </div>
                <div class="card p-3">
                    <div class="row">
                        <?php
                        $sel = $conn->prepare("SELECT * FROM `products` GROUP BY `category`");
                        $sel->execute();
                        $sel = $sel->fetchAll();

                        foreach ($sel as $row) { ?>
                            <div class="col-2 bg-light m-2"><img src="<?php echo HTTP_PATH . "/img/products/" . $row["img"]; ?>" alt="">
                                <h6 class="text-center"><?php echo $row["category"]; ?></h6>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>

            <footer class="footer footer-black  footer-white ">
                <?php include(DRIVE_PATH . "/admin_panel/footer/footer.php"); ?>
            </footer>
        </div>
    </div>
</body>

</html>