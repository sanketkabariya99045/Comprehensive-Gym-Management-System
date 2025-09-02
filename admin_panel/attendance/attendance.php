<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IFS - Attendance Management</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

    <?php include("C:/xampp/htdocs/php/IFS/admin_panel/links.php"); ?>
    <style>
        :root {
            --primary: #4a6bff;
            --primary-dark: #3a56cc;
            --secondary: #ff6b6b;
            --dark: #2c3e50;
            --light: #f8f9fa;
            --success: #28a745;
            --warning: #ffc107;
            --danger: #dc3545;
            --gray: #6c757d;
        }

        [data-bs-theme="dark"] {
            --bs-body-bg: #1a1a2e;
            --bs-body-color: #f8f9fa;
            --card-bg: #16213e;
            --input-bg: #0f3460;
            --table-bg: #16213e;
        }

        [data-bs-theme="light"] {
            --bs-body-bg: #f8f9fa;
            --bs-body-color: #212529;
            --card-bg: #ffffff;
            --input-bg: #ffffff;
            --table-bg: #ffffff;
        }

        body {
            background-color: var(--bs-body-bg);
            color: var(--bs-body-color);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            transition: all 0.3s ease;
        }

        .attendance-container {
            padding-top: 200px;
        }

        .alert {
            width: fit-content;
            position: fixed;
            top: 5%;
            left: 50%;
            transform: translate(-50%, 0);
            font-weight: 700;
            filter: contrast(130%);
        }

        .alert-success {
            background-color: green !important;
        }

        .alert-danger {
            background-color: red !important;
        }

        .card {
            background-color: var(--card-bg);
            border: none;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            margin-bottom: 20px;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
        }

        .card-header {
            background-color: rgba(0, 0, 0, 0.03);
            border-bottom: 1px solid rgba(0, 0, 0, 0.1);
            font-weight: 600;
            padding: 15px 20px;
        }

        .form-control,
        .form-select {
            background-color: var(--input-bg);
            border: 1px solid rgba(0, 0, 0, 0.1);
            padding: 10px 15px;
            border-radius: 8px;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 0.25rem rgba(74, 107, 255, 0.25);
        }

        .btn-primary {
            background-color: var(--primary);
            border-color: var(--primary);
            padding: 10px 20px;
            border-radius: 8px;
            font-weight: 500;
        }

        .btn-primary:hover {
            background-color: var(--primary-dark);
            border-color: var(--primary-dark);
        }

        .btn-outline-primary {
            color: var(--primary);
            border-color: var(--primary);
        }

        .btn-outline-primary:hover {
            background-color: var(--primary);
            border-color: var(--primary);
        }

        .badge-present {
            background-color: var(--success);
        }

        .badge-absent {
            background-color: var(--danger);
        }

        .badge-late {
            background-color: var(--warning);
            color: var(--dark);
        }

        .stats-card {
            text-align: center;
            padding: 20px;
            border-radius: 10px;
            color: white;
        }

        .stats-card i {
            font-size: 2rem;
            margin-bottom: 10px;
        }

        .stats-card h3 {
            font-size: 1.8rem;
            font-weight: 700;
            margin-bottom: 5px;
        }

        .stats-card p {
            margin-bottom: 0;
            font-weight: 500;
        }

        #presentStats {
            background: linear-gradient(135deg, #4a6bff, #6a8bff);
        }

        #absentStats {
            background: linear-gradient(135deg, #ff6b6b, #ff8e8e);
        }

        #lateStats {
            background: linear-gradient(135deg, #ffc107, #ffd54f);
            color: var(--dark);
        }

        .dataTables_wrapper {
            padding: 0;
        }

        .dataTables_filter input {
            background-color: var(--input-bg);
            border: 1px solid rgba(0, 0, 0, 0.1);
            color: var(--bs-body-color);
        }

        table.dataTable {
            background-color: var(--table-bg);
            border-radius: 10px;
            overflow: hidden;
        }

        .dataTables_info,
        .dataTables_length select {
            color: var(--bs-body-color) !important;
        }

        .page-item.active .page-link {
            background-color: var(--primary);
            border-color: var(--primary);
        }

        .page-link {
            color: var(--primary);
        }

        .theme-toggle {
            cursor: pointer;
            font-size: 1.2rem;
            margin-left: 15px;
        }

        .toast {
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 1100;
        }

        @media (max-width: 768px) {
            .card-body {
                padding: 15px;
            }

            .stats-card {
                margin-bottom: 15px;
            }
        }
    </style>
</head>

<body class="admin-dashboard" data-bs-theme="light">
    <?php if (isset($_SESSION["error"])) { ?>
        <div class="alert alert-danger">
            <?php echo $_SESSION["error"];
            unset($_SESSION["error"]); ?>
        </div>
    <?php } ?>
    <?php if (isset($_SESSION["success"])) { ?>
        <div class="alert alert-success"><?php echo $_SESSION["success"]; ?></div>
    <?php unset($_SESSION["success"]);
    } ?>


    <?php include(DRIVE_PATH . "/admin_panel/header/header.php"); ?>

    <main class="container-fluid attendance-container">
        <?php
        $sel = $conn->prepare("SELECT * FROM attendance JOIN member ON member.email=attendance.email");
        $sel->execute();
        $sel = $sel->fetchAll();

        $present = 0;
        $absent = 0;
        $late = 0;
        $lastYear = ((int)date("Y", strtotime($sel[0]["date"])));
        foreach ($sel as $r) {

            if (date('Y-m-d', strtotime($r["date"])) === date('Y-m-d', strtotime("today"))) {
                ($r["attendance_status"] == "Present") ? $present++ : (($r["attendance_status"] == "Absent") ? $absent++ : $late++);
            }
            if (((int)date("Y", strtotime($r["date"]))) < $lastYear) {
                $lastYear = ((int)date("Y", strtotime($r["date"])));
            }
        }
        ?>
        <div class="row mb-4">
            <div class="col-md-4">
                <div class="stats-card" id="presentStats">
                    <i class="fas fa-check-circle"></i>
                    <h3 id="presentCount"><?php echo $present; ?></h3>
                    <p>Present Today</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="stats-card" id="absentStats">
                    <i class="fas fa-times-circle"></i>
                    <h3 id="absentCount"><?php echo $absent; ?></h3>
                    <p>Absent Today</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="stats-card" id="lateStats">
                    <i class="fas fa-clock"></i>
                    <h3 id="lateCount"><?php echo $late; ?></h3>
                    <p>Late Arrivals</p>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-4">

                <div class="row">
                    <!-- //! Check-in Form -->
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <span><i class="fas fa-user-clock me-2"></i>Record Attendance</span>
                            <button class="btn btn-sm btn-outline-primary" id="quickCheckinBtn">
                                <i class="fas fa-bolt me-1"></i> Quick Check-in
                            </button>
                        </div>
                        <div class="card-body">
                            <form action="doAttendance.php" method="post" id="attendanceForm">
                                <div class="mb-3">
                                    <label for="memberEmail" class="form-label">Email</label>
                                    <input type="email" class="form-control" name="email" id="email" placeholder="Member Email" required />
                                </div>
                                <div class="mb-3">
                                    <label for="attendanceStatus" class="form-label">Status</label>
                                    <select class="form-select" name="attendance_status" id="attendanceStatus" required>
                                        <option disabled selected>Select Status</option>
                                        <option value="Present">Present</option>
                                        <option value="Absent">Absent</option>
                                        <option value="Late">Late</option>
                                    </select>
                                    <div class="invalid-feedback">Please select attendance status</div>
                                </div>
                                <div class="d-grid gap-2">
                                    <button type="submit" class="btn btn-primary" name="submit">
                                        <i class="fas fa-save me-1"></i> Save Attendance
                                    </button>
                                    <button type="button" class="btn btn-outline-secondary" id="resetForm">
                                        <i class="fas fa-undo me-1"></i> Reset
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- //! Check-Out Form -->
                <div class="row">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <span><i class="fas fa-user-clock me-2"></i>Check Out Here</span>
                        </div>
                        <div class="card-body">
                            <form action="checkOut.php" method="post">
                                <div class="mb-3">
                                    <label for="memberEmail" class="form-label">Email</label>
                                    <input type="email" class="form-control" name="email" id="email" placeholder="Member Email" required />
                                </div>
                                <div class="d-grid gap-2">
                                    <button type="submit" class="btn btn-primary" name="submit">
                                        <i class="fas fa-save me-1"></i> Check Out Now
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-8">
                <div class="card">
                    <div class="row py-4 px-5 align-items-center">
                        <div class="col-md-6">
                            <span><i class="fas fa-history me-2"></i>Attendance Records</span>
                        </div>
                        <form action="<?php echo HTTP_PATH . "/admin_panel/attendance/genPDF.php"; ?>" method="post" class="col-md-6">
                            <select name="year" class="form-select my-2">
                                <option disabled selected>Select Year</option>
                                <?php for ($i = ((int)date("Y", strtotime("today"))); $i >= $lastYear; $i--) { ?>
                                    <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                <?php } ?>
                            </select>

                            <select name="month" class="form-select my-2">
                                <option disabled selected>Select Month</option>
                                <?php
                                $months = $conn->prepare("SELECT * FROM `attendance` GROUP BY MONTH(date)");
                                $months->execute();
                                $months = $months->fetchAll();

                                foreach($months as $key=>$m) { ?>
                                    <option value="<?php echo $key+1; ?>"><?php echo $key+1; ?></option>
                                <?php } ?>
                            </select>

                            <button class="btn btn-sm btn-outline-primary my-2" id="exportPDF">
                                <i class="fas fa-file-pdf me-1"></i> PDF
                            </button>
                        </form>
                    </div>
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="dateRangeFilter" class="form-label">Date Range</label>
                                <input type="text" class="form-control" id="dateRangeFilter" placeholder="Select date range">
                            </div>
                            <div class="col-md-6">
                                <label for="statusFilter" class="form-label">Status Filter</label>
                                <select class="form-select" id="statusFilter">
                                    <option value="">All Statuses</option>
                                    <option value="Present">Present</option>
                                    <option value="Absent">Absent</option>
                                    <option value="Late">Late</option>
                                </select>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table id="attendanceTable" class="table table-hover w-100">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Date</th>
                                        <th>Check-in</th>
                                        <th>Check-out</th>
                                        <th>Duration</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($sel as $r) { ?>
                                        <tr class="<?php echo date("Y-m-d", strtotime($r["date"])); ?>" data-date="<?php echo date("Y-m-d", strtotime($r["date"])); ?>">
                                            <td><?php echo $r["attendance_id"]; ?></td>
                                            <td><?php echo $r["FirstName"] . " " . $r["LastName"]; ?></td>
                                            <td><?php echo $r["email"]; ?></td>
                                            <td><?php echo $r["date"]; ?></td>
                                            <td><?php echo $r["check_in_time"]; ?></td>
                                            <td><?php echo $r["check_out_time"]; ?></td>
                                            <td><?php echo ($r["session_duration"]>0)?$r["session_duration"]."min":"-"; ?></td>
                                            <td><?php echo $r["attendance_status"]; ?></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.28/jspdf.plugin.autotable.min.js"></script>

    <script>
        $(document).ready(function() {
            $(".alert").fadeOut(10000);


            $("body").hover(function() {
                $(".sidebar").css("transition", "1s all ease");
                $(".sidebar").css("margin-left", "-100%");
            });
            $("body").click(function() {
                $(".sidebar").css("transition", "1s all ease");
                $(".sidebar").css("margin-left", "-100%");
            });
            // Theme toggle functionality
            const themeToggle = $('#themeToggle');
            const body = $('body');
            const currentTheme = localStorage.getItem('theme') || 'light';

            body.attr('data-bs-theme', currentTheme);
            updateThemeIcon(currentTheme);

            themeToggle.on('click', function() {
                const newTheme = body.attr('data-bs-theme') === 'light' ? 'dark' : 'light';
                body.attr('data-bs-theme', newTheme);
                localStorage.setItem('theme', newTheme);
                updateThemeIcon(newTheme);
            });

            function updateThemeIcon(theme) {
                themeToggle.find('i').removeClass('fa-moon fa-sun').addClass(theme === 'light' ? 'fa-moon' : 'fa-sun');
            }

            // Initialize date pickers
            flatpickr("#dateRangeFilter", {
                mode: "range",
                dateFormat: "Y-m-d",
                defaultDate: [new Date(), new Date()]
            });

            // Initialize DataTable
            const attendanceTable = $('#attendanceTable').DataTable();

            // Filter by date range
            $('#dateRangeFilter').on('change', function() {
                const dates = $(this).val().split(' to ');
                if (dates.length === 2) {
                    $("tbody tr").hide();

                    $("tbody tr").each(function() {
                        if ($(this).data("date") >= dates[0] && $(this).data("date") <= dates[1]) {
                            $(this).show();
                        }
                    });
                }
            });

            // Filter by status
            $('#statusFilter').on('change', function() {
                attendanceTable.column(7).search(this.value).draw();
            });

            // Quick check-in button
            $('#quickCheckinBtn').on('click', function() {
                $('#attendanceStatus').val('Present');
                let now = new Date();
                $('#sessionDuration').val(60);

                // Focus on member ID field
                $('#email').focus();
            });

            // Reset form
            $('#resetForm').on('click', function() {
                $('#email').val("");
                $('#attendanceForm').find('.is-invalid').removeClass('is-invalid');
                $('#sessionDuration').val(0);
                $("#attendanceStatus").val("Select Status");
            });
        });
    </script>
</body>

</html>