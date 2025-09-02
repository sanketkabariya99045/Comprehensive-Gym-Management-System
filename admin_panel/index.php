<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />

  <title>User's List</title>
  <?php include("C:/xampp/htdocs/php/IFS/admin_panel/links.php"); ?>
</head>

<style>
  .members i {
    color: green !important;
  }

  .members h5 {
    color: green !important;
  }
</style>

<script>
  $(document).ready(() => {
    $(".user-list").DataTable();

    $(".active-user").click(function() {
      let email = $(this).val();

      $.ajax({
        type: "POST",
        url: "http://localhost/php/IFS/admin_panel/index.php",
        data: {
          email: email,
          status: "Active"
        },
        success: function() {
          window.location.reload();
        }
      });
    });
    $(".block-user").click(function() {
      let email = $(this).val();

      $.ajax({
        type: "POST",
        url: "http://localhost/php/IFS/admin_panel/index.php",
        data: {
          email: email,
          status: "Blocked"
        },
        success: function() {
          window.location.reload();
        }
      });
    });
  });
</script>

<?php
if (isset($_POST["email"])) {
  $up = $conn->prepare("UPDATE `member` SET `status`='" . $_POST["status"] . "' WHERE `email`='" . $_POST["email"] . "'");
  $up->execute();
}
?>

<body class="">
  <div class="wrapper ">
    <?php include(DRIVE_PATH . "/admin_panel/sidenav.php"); ?>

    <div class="main-panel">
      <!-- Navbar -->
      <?php include(DRIVE_PATH . "/admin_panel/header/header.php"); ?>

      <div class="content">
        <div class="row">
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
              <div class="card-body ">
                <div class="row">
                  <div class="col-5 col-md-4">
                    <div class="icon-big text-center icon-warning">
                      <i class="nc-icon nc-money-coins text-success"></i>
                    </div>
                  </div>
                  <div class="col-7 col-md-8">
                    <div class="numbers">
                      <p class="card-category">Revenue</p>
                      <?php
                      $membership = $conn->prepare("SELECT * FROM `membership`");
                      $membership->execute();
                      $membership = $membership->fetchAll();
                      $total = 0;

                      foreach ($membership as $mem) {
                        $total += $mem["membership_fee"];
                      }
                      ?>
                      <p class="card-title">&#8377; <?php echo $total; ?>
                      <p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer ">
                <hr>
                <div class="stats">
                  <i class="fa-solid fa-rupee"></i>
                  Total Revenue From Members
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
              <div class="card-body ">
                <div class="row">
                  <div class="col-5 col-md-4">
                    <div class="icon-big text-center icon-warning">
                      <i class="nc-icon nc-favourite-28 text-primary"></i>
                    </div>
                  </div>
                  <div class="col-7 col-md-8">
                    <div class="numbers">
                      <p class="card-category">Members</p>
                      <?php
                      $members = $conn->prepare("SELECT * FROM `member`");
                      $members->execute();
                      $members = $members->fetchAll();
                      $total = 0;

                      foreach ($members as $m) {
                        $total++;
                      }
                      ?>
                      <p class="card-title"><?php echo $total; ?>
                      <p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer ">
                <hr>
                <div class="stats">
                  <i class="fa-solid fa-user"></i>
                  Users of the HealthGroup
                </div>
              </div>
            </div>
          </div>
        </div>


        <!-- //! User's List -->
        <div class="card">
          <div class="row">
            <h6 class="mx-5 py-3 text-danger">User's List</h6>
          </div>
        </div>
        <hr />

        <div class="card p-3">
          <table class="user-list">
            <thead class="bg-danger text-light">
              <tr>
                <th class="col-md-1">Sr.</th>
                <th class="col-md-1">First Name</th>
                <th class="col-md-1">Last Name</th>
                <th class="col-md-2">Email</th>
                <th class="col-md-1">Phone</th>
                <th class="col-md-1">Gender</th>
                <th class="col-md-1">Date of Birth</th>
                <th class="col-md-1">Membership Status</th>
                <th class="col-md-1">Status</th>
              </tr>
            </thead>

            <tbody>
              <?php
              $sel = $conn->prepare("SELECT * FROM `member`");
              $sel->execute();
              $sel = $sel->fetchAll();
              $i = 1;

              foreach ($sel as $r) { ?>
                <tr class="border-bottom">
                  <td class="col-md-1"><?php echo $i . ")"; ?></td>
                  <td class="col-md-1"><?php echo $r["FirstName"]; ?></td>
                  <td class="col-md-1"><?php echo $r["LastName"]; ?></td>
                  <td class="col-md-2"><?php echo $r["email"]; ?></td>
                  <td class="col-md-1"><?php if ($r["phone"] != 0) {
                                          echo $r["phone"];
                                        } else {
                                          echo "-";
                                        } ?></td>
                  <td class="col-md-1"><?php echo $r["gender"]; ?></td>
                  <td class="col-md-1"><?php $date = date("d/m/Y", strtotime($r["dob"]));
                                        echo ($date != "30/11/-0001") ? $date : "-"; ?></td>
                  <td class="col-md-1"><?php echo ($r["MembershipStatus"] != null) ? $r["MembershipStatus"] : "-"; ?></td>


                  <?php if ($r["status"] == "Active") { ?>
                    <td class="col-md-1 fw-bolder" style="color: green;"><?php echo $r["status"]; ?>&emsp;

                      <button class="btn block-user" style="background-color: #ff4d4d;" value="<?php echo $r["email"]; ?>">Block</button>
                    </td>
                  <?php } else { ?>
                    <td class="col-md-1 fw-bolder" style="color: red;"><?php echo $r["status"]; ?>&emsp;
                      <button class="btn btn-success active-user" value="<?php echo $r["email"]; ?>">Active</button>
                    </td>
                  <?php } ?>
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