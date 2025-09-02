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
    <title>My Attendance | INVIGOR FITNESS STUDIO</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.css">
</head>

<style>
    :root {
        --primary-color: #4a6bff;
        --secondary-color: #ff6b6b;
        --accent-color: #6bffb4;
        --text-color: #333;
        --text-light: #777;
        --bg-color: #f8f9fa;
        --card-bg: #ffffff;
        --border-color: #e0e0e0;
        --shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
        --transition: all 0.3s ease;
    }

    [data-theme="dark"] {
        --primary-color: #5d7aff;
        --secondary-color: #ff7b7b;
        --accent-color: #7bffc4;
        --text-color: #f0f0f0;
        --text-light: #b0b0b0;
        --bg-color: #121212;
        --card-bg: #1e1e1e;
        --border-color: #333;
        --shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
    }

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    body {
        background-color: #111111;
        color: var(--text-color);
        transition: var(--transition);
        line-height: 1.6;
    }

    .blog-container {
        margin: 12rem auto 2rem auto;
        padding: 0 20px;
    }

    /* Welcome Section */
    .welcome-section {
        margin: 30px 0;
    }

    .welcome-card {
        background: linear-gradient(135deg, var(--primary-color), #6a5acd);
        color: white;
        padding: 30px;
        border-radius: 12px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        box-shadow: var(--shadow);
        animation: fadeIn 0.5s ease;
    }

    .welcome-text h1 {
        color: white;
        font-size: 2rem;
        margin-bottom: 10px;
    }

    .section-title {
        color: white !important;
    }

    .welcome-text .highlight {
        color: var(--accent-color);
        font-weight: 700;
    }

    .welcome-text p {
        font-size: 1rem;
        opacity: 0.9;
    }

    .profile-pic img {
        width: 100px;
        height: 100px;
        border-radius: 50%;
        object-fit: cover;
        border: 3px solid white;
    }

    /* Stats Section */
    .stats-section {
        margin: 30px 0;
    }

    .stats-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 20px;
    }

    .stat-card {
        background-color: var(--card-bg);
        border-radius: 12px;
        padding: 20px;
        box-shadow: var(--shadow);
        display: flex;
        align-items: center;
        gap: 15px;
        transition: var(--transition);
    }

    .stat-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
    }

    .stat-icon {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        background-color: rgba(74, 107, 255, 0.1);
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--primary-color);
        font-size: 1.5rem;
    }

    .stat-info h3 {
        font-size: 1.8rem;
        margin-bottom: 5px;
    }

    .stat-info p {
        color: var(--text-light);
        font-size: 0.9rem;
    }

    .trend {
        font-size: 0.8rem;
        margin-top: 5px;
        display: flex;
        align-items: center;
        gap: 5px;
    }

    .trend.up {
        color: #4caf50;
    }

    .trend.down {
        color: #f44336;
    }

    /* Calendar Section */
    .calendar-section {
        margin: 40px 0;
    }

    .section-title {
        font-size: 1.5rem;
        margin-bottom: 20px;
        color: var(--text-color);
        position: relative;
        padding-bottom: 10px;
    }

    .section-title::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 50px;
        height: 3px;
        background-color: var(--primary-color);
    }

    #attendance-calendar {
        background-color: var(--card-bg);
        border-radius: 12px;
        padding: 20px;
        box-shadow: var(--shadow);
    }

    /* Records Section */
    .records-section {
        margin: 40px 0;
    }

    .section-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 20px;
        flex-wrap: wrap;
        gap: 15px;
    }

    .actions {
        display: flex;
        align-items: center;
        gap: 15px;
    }

    .search-box {
        position: relative;
    }

    .search-box input {
        padding: 10px 15px 10px 35px;
        border-radius: 25px;
        border: 1px solid var(--border-color);
        background-color: var(--card-bg);
        color: var(--text-color);
        width: 200px;
        transition: var(--transition);
    }

    .search-box input:focus {
        outline: none;
        border-color: var(--primary-color);
        width: 250px;
    }

    .search-box i {
        position: absolute;
        left: 12px;
        top: 50%;
        transform: translateY(-50%);
        color: var(--text-light);
    }

    .btn-primary {
        background-color: var(--primary-color);
        color: white;
        border: none;
        padding: 10px 20px;
        border-radius: 25px;
        cursor: pointer;
        display: flex;
        align-items: center;
        gap: 8px;
        transition: var(--transition);
        font-weight: 600;
    }

    .btn-primary:hover {
        background-color: #3a5bef;
        transform: translateY(-2px);
    }

    .date-range-picker {
        background-color: var(--card-bg);
        padding: 15px;
        border-radius: 8px;
        margin-bottom: 20px;
        box-shadow: var(--shadow);
        display: flex;
        align-items: center;
        gap: 15px;
        flex-wrap: wrap;
    }

    .date-inputs {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .date-input {
        padding: 8px 12px;
        border-radius: 5px;
        border: 1px solid var(--border-color);
        background-color: var(--card-bg);
        color: var(--text-color);
    }

    /* Table Styles */
    .table-container {
        overflow-x: auto;
        border-radius: 8px;
        box-shadow: var(--shadow);
        background-color: var(--card-bg);
    }

    #attendance-table {
        width: 100%;
        border-collapse: collapse;
    }

    #attendance-table th,
    #attendance-table td {
        padding: 12px 15px;
        text-align: left;
        border-bottom: 1px solid var(--border-color);
    }

    #attendance-table th {
        background-color: rgba(74, 107, 255, 0.1);
        color: var(--primary-color);
        font-weight: 600;
        cursor: pointer;
        user-select: none;
    }

    #attendance-table th i {
        margin-left: 5px;
        font-size: 0.8rem;
    }

    #attendance-table tr:hover {
        background-color: rgba(74, 107, 255, 0.05);
    }

    /* Pagination */
    .pagination {
        display: flex;
        justify-content: center;
        margin-top: 20px;
        gap: 5px;
    }

    .btn-pagination {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        border: none;
        background-color: var(--card-bg);
        color: var(--text-color);
        cursor: pointer;
        transition: var(--transition);
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .btn-pagination:hover:not(:disabled) {
        background-color: var(--primary-color);
        color: white;
    }

    .btn-pagination.active {
        background-color: var(--primary-color);
        color: white;
    }

    .btn-pagination:disabled {
        opacity: 0.5;
        cursor: not-allowed;
    }

    /* Charts Section */
    .charts-section {
        margin: 40px 0;
    }

    .chart-container {
        background-color: var(--card-bg);
        border-radius: 12px;
        padding: 20px;
        box-shadow: var(--shadow);
        height: 400px;
    }

    /* Animations */
    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(20px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Responsive Styles */
    @media (max-width: 768px) {
        .welcome-card {
            flex-direction: column;
            text-align: center;
            gap: 20px;
        }

        .section-header {
            flex-direction: column;
            align-items: flex-start;
        }

        .actions {
            width: 100%;
            justify-content: space-between;
        }

        .search-box input {
            width: 100%;
        }

        .date-range-picker {
            flex-direction: column;
            align-items: flex-start;
        }
    }

    @media (max-width: 480px) {
        .user-controls {
            width: 100%;
            justify-content: space-between;
        }

        .stats-grid {
            grid-template-columns: 1fr;
        }

        .btn-primary {
            width: 100%;
            justify-content: center;
        }
    }
</style>

<body>
    <div class="blog-container container">

        <?php
        include(DRIVE_PATH . "../database.php");

        $sel = $conn->prepare("SELECT * FROM attendance WHERE email='" . $_SESSION["email"] . "' AND attendance_status='Present' ORDER BY attendance_id DESC");
        $sel->execute();
        $sel = $sel->fetchAll();

        $streak = 0;
        $prev = date("Y-m-d");
        $totalPresents = [];

        foreach ($sel as $key => $r) {
            if ($prev == date("Y-m-d", strtotime($r["date"]))) {
                $streak++;
            } else {
                break;
            }
        }

        $trend = $conn->prepare("SELECT EXTRACT(YEAR FROM date) AS year, EXTRACT(MONTH FROM date) AS month, MONTHNAME(date) AS month_name, COUNT(*) AS total_attendance FROM attendance WHERE email='" . $_SESSION["email"] . "' GROUP BY EXTRACT(YEAR FROM date),EXTRACT(MONTH FROM date) ORDER BY year, month");
        $trend->execute();
        $trend = $trend->fetchAll();
        $total_days_month = 0;
        $total_days_prev_month = 0;


        foreach ($trend as $tr) {
            if (((int) date("m")) === $tr["month"]) {
                $total_days_month = $tr["total_attendance"];
            }
            if ((((int) date("m") - 1) % 12) === $tr["month"]) {
                $total_days_prev_month = $tr["total_attendance"];
            }
        }


        $sel = $conn->prepare("SELECT * FROM attendance JOIN member ON member.email=attendance.email WHERE attendance.email='" . $_SESSION["email"] . "' AND attendance_status='Present'");
        $sel->execute();
        $sel = $sel->fetchAll();

        ?>
        <!-- Main Content -->
        <main class="main-content">
            <!-- Welcome Section -->
            <section class="welcome-section">
                <div class="welcome-card">
                    <div class="welcome-text">
                        <h1>Welcome back, <span
                                class="highlight"><?php echo $sel[0]["FirstName"] . " " . $sel[0]["LastName"]; ?></span>!
                        </h1>
                        <p><?php echo ($streak > 10) ? "You're crushing your fitness goals. Keep it up!" : ""; ?></p>
                    </div>
                    <div class="profile-pic">
                        <img src="<?php echo HTTP_PATH . "/img/profile/" . (isset($sel[0]["img"]) && $sel[0]["img"] != null) ? $sel[0]["img"] : "avtar.png"; ?>"
                            alt="Profile Picture">
                    </div>
                </div>
            </section>

            <!-- Stats Cards -->
            <section class="stats-section">
                <div class="stats-grid">
                    <div class="stat-card">
                        <div class="stat-icon">
                            <i class="fas fa-calendar-check"></i>
                        </div>
                        <div class="stat-info">
                            <h3><?php echo $total_days_month;
                            ?></h3>
                            <p>This Month</p>
                            <span class="trend up"><i
                                    class="fas fa-arrow-up"></i><?php echo ($total_days_month > $total_days_prev_month) ? ($total_days_month - $total_days_prev_month) . " more than last month" : abs($total_days_prev_month - $total_days_month) . " less than last month"; ?></span>
                        </div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-icon">
                            <i class="fas fa-fire"></i>
                        </div>
                        <div class="stat-info">
                            <h3><?php echo $streak; ?></h3>
                            <p>Current Streak</p>
                            <span class="trend up"><i class="fas fa-arrow-up"></i> Keep going!</span>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Calendar Section -->
            <section class="calendar-section">
                <h2 class="section-title">Your Attendance Calendar</h2>

                <!-- //! All Attendance -->
                <?php
                $allAttendance = $conn->prepare("SELECT * FROM attendance JOIN member ON member.email=attendance.email WHERE attendance.email='" . $_SESSION["email"] . "'");
                $allAttendance->execute();
                $allAttendance = $allAttendance->fetchAll();

                foreach ($allAttendance as $all) { ?>
                    <input type="hidden" class="all-dates" id="<?php echo $all["attendance_status"]; ?>"
                        value="<?php echo date("Y-m-d", strtotime($all["date"])); ?>" />
                <?php } ?>
                <div id="attendance-calendar"></div>
            </section>

            <!-- Attendance Records -->
            <section class="records-section">
                <div class="section-header">
                    <h2 class="section-title">Attendance Records</h2>
                    <div class="actions">
                        <div class="search-box">
                            <input type="text" placeholder="Search records..." id="search-records">
                            <i class="fas fa-search"></i>
                        </div>
                        <button id="download-pdf" class="btn-primary">
                            <i class="fas fa-file-pdf"></i> Download PDF
                        </button>
                    </div>
                </div>

                <form action="<?php echo HTTP_PATH . "/user_panel/attendance/genPDF.php"; ?>" method="post"
                    class="date-range-picker" id="date-range-picker" style="display: none;">
                    <div class="date-inputs">
                        <input type="date" name="start_date" id="start-date" class="date-input">
                        <span>to</span>
                        <input type="date" name="end_date" id="end-date" class="date-input">
                    </div>
                    <button id="generate-pdf" name="submit" class="btn-primary">Generate PDF</button>
                </form>

                <div class="table-container">
                    <table id="attendance-table">
                        <thead>
                            <tr>
                                <th>Date <i class="fas fa-sort"></i></th>
                                <th>Check In Time <i class="fas fa-sort"></i></th>
                                <th>Check Out Time <i class="fas fa-sort"></i></th>
                                <th>Duration</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($sel as $r) { ?>
                                <tr>
                                    <td><?php echo date("Y-m-d", strtotime($r["date"])); ?></td>
                                    <td><?php echo date("H:i A", strtotime($r["check_in_time"])); ?></td>
                                    <td><?php echo date("H:i A", strtotime($r["check_out_time"])); ?></td>
                                    <td><?php echo ($r["session_duration"] > 0) ? $r["session_duration"] . " Minutes" : 0; ?>
                                    </td>
                                    <td><?php echo $r["attendance_status"]; ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>

                <div class="pagination">
                    <button class="btn-pagination" disabled><i class="fas fa-chevron-left"></i></button>
                    <button class="btn-pagination active">1</button>
                    <button class="btn-pagination">2</button>
                    <button class="btn-pagination">3</button>
                    <button class="btn-pagination"><i class="fas fa-chevron-right"></i></button>
                </div>
            </section>

            <!-- Charts Section -->
            <section class="charts-section">
                <?php
                $min = $trend[0]["month"];
                $max = 0;
                foreach ($trend as $tr) {
                    if ($tr["month"] > $max)
                        $max = $tr["month"];
                    if ($tr["month"] < $min)
                        $min = $tr["month"]; ?>
                    <input type="hidden" class="<?php echo $tr["month"]; ?>"
                        value="<?php echo $tr["total_attendance"]; ?>" />
                <?php }
                $i = 1;
                while ($i <= 12) {
                    if ($i < $min) { ?>
                        <input type="hidden" class="<?php echo $i; ?>" value="0" />
                    <?php }
                    if ($i > $max) { ?>
                        <input type="hidden" class="<?php echo $i; ?>" value="0" />
                    <?php }
                    ?>
                    <?php $i++;
                } ?>
                <h2 class="section-title">Your Attendance Trends (<?php echo date("Y"); ?>)</h2>
                <div class="chart-container">
                    <canvas id="attendance-chart"></canvas>
                </div>
            </section>
        </main>
    </div>


    <?php include(DRIVE_PATH . "/user_panel/footer/footer.php"); ?>

    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="js/html2pdf.bundle.min.js"></script>
    <script>
        $(document).ready(function () {
            // Theme Toggle
            const themeToggle = $('#theme-toggle');
            const body = $('body');
            const currentTheme = localStorage.getItem('theme') || 'light';

            // Set initial theme
            body.attr('data-theme', currentTheme);
            updateThemeIcon(currentTheme);

            themeToggle.on('click', function () {
                const currentTheme = body.attr('data-theme');
                const newTheme = currentTheme === 'light' ? 'dark' : 'light';

                body.attr('data-theme', newTheme);
                localStorage.setItem('theme', newTheme);
                updateThemeIcon(newTheme);
            });

            function updateThemeIcon(theme) {
                const icon = theme === 'light' ? 'fa-moon' : 'fa-sun';
                themeToggle.html(`<i class="fas ${icon}"></i>`);
            }

            // Initialize Calendar
            let allAttendance = [];

            $(".all-dates").each(function () {
                allAttendance.push({
                    title: $(this).attr("id"),
                    start: $(this).val(),
                    color: ($(this).attr("id") == "Present") ? "#4a6bff" : "#ff6b6b"
                });
            });
            $('#attendance-calendar').fullCalendar({
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'month'
                },
                defaultView: 'month',
                editable: false,
                eventLimit: true,
                events: allAttendance,
                dayRender: function (date, cell) {
                    const today = moment().format('YYYY-MM-DD');
                    const dateStr = date.format('YYYY-MM-DD');

                    if (dateStr === today) {
                        cell.css('background-color', 'rgba(74, 107, 255, 0.1)');
                    }
                }
            });

            // Table Sorting
            let sortDirection = 1;
            $('th').on('click', function () {
                const table = $(this).parents('table').eq(0);
                const rows = table.find('tr:gt(0)').toArray().sort(comparator($(this).index()));

                sortDirection *= -1;

                if (!$(this).hasClass('sorted')) {
                    $('th').removeClass('sorted ascending descending');
                    $(this).addClass('sorted');
                }

                $(this).toggleClass('ascending descending');

                for (let i = 0; i < rows.length; i++) {
                    table.append(rows[i]);
                }
            });

            function comparator(index) {
                return function (a, b) {
                    const valA = getCellValue(a, index);
                    const valB = getCellValue(b, index);

                    if ($.isNumeric(valA) && $.isNumeric(valB)) {
                        return (valA - valB) * sortDirection;
                    } else {
                        return valA.toString().localeCompare(valB) * sortDirection;
                    }
                };
            }

            function getCellValue(row, index) {
                return $(row).children('td').eq(index).text();
            }

            // Search Functionality
            $('#search-records').on('keyup', function () {
                const value = $(this).val().toLowerCase();
                $('#attendance-table tbody tr').filter(function () {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
                });
            });

            // PDF Generation
            $('#download-pdf').on('click', function () {
                $('#date-range-picker').slideToggle();
            });

            function formatDate(dateStr) {
                return moment(dateStr).format('MMMM D, YYYY');
            }

            function generateTableRows(startDate, endDate) {
                // In a real app, this would filter the actual data
                // For demo, we're using the static table data
                let rows = '';
                $('#attendance-table tbody tr').each(function () {
                    const date = $(this).find('td').eq(0).text();
                    if (date >= startDate && date <= endDate) {
                        rows += `
                    <tr>
                        <td style="padding: 8px; border: 1px solid #ddd;">${formatDate(date)}</td>
                        <td style="padding: 8px; border: 1px solid #ddd;">${$(this).find('td').eq(1).text()}</td>
                        <td style="padding: 8px; border: 1px solid #ddd;">${$(this).find('td').eq(2).text()}</td>
                        <td style="padding: 8px; border: 1px solid #ddd;">${$(this).find('td').eq(3).text()}</td>
                    </tr>
                `;
                    }
                });
                return rows || '<tr><td colspan="4" style="padding: 8px; border: 1px solid #ddd; text-align: center;">No attendance records for this period</td></tr>';
            }

            function calculateTotalSessions(startDate, endDate) {
                let count = 0;
                $('#attendance-table tbody tr').each(function () {
                    const date = $(this).find('td').eq(0).text();
                    if (date >= startDate && date <= endDate) {
                        count++;
                    }
                });
                return count;
            }

            // Initialize Chart
            const ctx = document.getElementById('attendance-chart').getContext('2d');
            const attendanceChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                    datasets: [{
                        label: 'Workout Sessions',
                        data: [$(".1").val(), $(".2").val(), $(".3").val(), $(".4").val(), $(".5").val(), $(".6").val(), $(".7").val(), $(".8").val(), $(".9").val(), $(".10").val(), $(".11").val(), $(".12").val()],
                        backgroundColor: 'rgba(74, 107, 255, 0.7)',
                        borderColor: 'rgba(74, 107, 255, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: {
                                stepSize: 2
                            }
                        }
                    },
                    plugins: {
                        legend: {
                            position: 'top',
                        },
                        tooltip: {
                            callbacks: {
                                label: function (context) {
                                    return `${context.parsed.y} session${context.parsed.y !== 1 ? 's' : ''}`;
                                }
                            }
                        }
                    }
                }
            });
        });
    </script>
</body>

</html>