<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />

  <title>Membership List</title>
  <?php include("C:/xampp/htdocs/php/IFS/admin_panel/links.php"); ?>
</head>

<style>
  tbody tr a {
    display: none;
    font-weight: 500;
  }

  tbody tr:hover td {
    background-color: antiquewhite;
  }

  tbody tr:hover a {
    display: block;
  }

  .memberships i {
    color: green !important;
  }

  .memberships h5 {
    color: green !important;
  }
</style>

<script>
  $(document).ready(() => {
    $(".membership-list").DataTable();
  });
</script>

<body class="">
  <div class="wrapper ">
    <?php include(DRIVE_PATH . "/admin_panel/sidenav.php"); ?>

    <div class="main-panel">
      <!-- Navbar -->
      <?php include(DRIVE_PATH . "/admin_panel/header/header.php"); ?>

      <div class="content">
        <!-- //! User's List -->
        <div class="card">
          <div class="row">
            <h6 class="mx-5 py-3 text-danger">Memberships</h6>
          </div>
        </div>
        <hr />

        <div class="card p-3">
          <table class="membership-list">
            <thead class="bg-danger text-light">
              <tr>
                <th class="col-md-1">ID</th>
                <th class="col-md-1">Type</th>
                <th class="col-md-1">Start Date</th>
                <th class="col-md-1">End Date</th>
                <th class="col-md-1">Status</th>
                <th class="col-md-1">Fees</th>
                <th class="col-md-2">Timing</th>
                <th class="col-md-1">Plan Duration</th>
                <th class="col-md-1">Payment Type</th>
                <th class="col-md-1">Payment Status</th>
                <th class="col-md-1">View</th>
              </tr>
            </thead>

            <tbody>
              <?php
              $sel_user = $conn->prepare("SELECT * FROM `membership`");
              $sel_user->execute();
              $sel_user = $sel_user->fetchAll();

              foreach ($sel_user as $r) { ?>
                <tr class="border-bottom">
                  <td class="col-md-1"><?php echo $r["MemberID"]; ?></td>
                  <td class="col-md-1"><?php echo $r["membership_type"]; ?></td>
                  <td class="col-md-1"><?php echo date("d/m/Y", strtotime($r["start_date"])); ?></td>
                  <td class="col-md-1"><?php echo date("d/m/Y", strtotime($r["end_date"])); ?></td>
                  <td class="col-md-1"><?php echo $r["status"] ?></td>
                  <td class="col-md-1"><?php echo "&#8377; " . $r["membership_fee"]; ?></td>
                  <td class="col-md-2"><?php echo $r["timing"]; ?></td>
                  <td class="col-md-1"><?php echo $r["plan_duration"]; ?></td>
                  <td class="col-md-1"><?php echo $r["payment_type"]; ?></td>
                  <td class="col-md-1"><?php echo ($r["payment_type"] == "Razorpay") ? "Paid" : "Pending"; ?></td>
                  <td class="col-md-1"><a href="<?php echo HTTP_PATH . "/admin_panel/membership/details.php?MemberID=" . $r["MemberID"] . ""; ?>">View</a></td>
                </tr>
              <?php } ?>
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