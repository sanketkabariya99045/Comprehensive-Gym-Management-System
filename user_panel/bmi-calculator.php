<?php
require("C:/xampp/htdocs/php/IFS/path.php");
include(DRIVE_PATH . "/user_panel/header/header.php");

include(DRIVE_PATH . "/user_panel/login/login.php");
?>

<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Gym Template">
    <meta name="keywords" content="Gym, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>BMI Calculator</title>
</head>

<body>
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="<?php echo HTTP_PATH . "/img/breadcrumb-bg.jpg"; ?>">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb-text">
                        <h2>BMI calculator</h2>
                        <div class="bt-option">
                            <a href="./index.html">Home</a>
                            <a href="#">Pages</a>
                            <span>BMI calculator</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- BMI Calculator Section Begin -->
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>IronForce Gym - BMI Calculator</title>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
        <style>
            :root {
                --primary-dark: #1a1a1a;
                --primary-light: #2d2d2d;
                --accent: #ff5e00;
                --accent-light: #ff8c42;
                --text-light: #ffffff;
                --text-gray: #cccccc;
                --underweight: #4fc3f7;
                --normal: #66bb6a;
                --overweight: #ffee58;
                --obese: #ef5350;
            }

            .bmi-calculator {
                background: linear-gradient(135deg, var(--primary-dark), var(--primary-light));
                padding: 2.5rem;
                border-radius: 16px;
                width: 50%;
                margin: 4rem auto;
                box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
                position: relative;
                overflow: hidden;
            }

            .bmi-calculator::before {
                content: "";
                position: absolute;
                top: -50px;
                right: -50px;
                width: 200px;
                height: 200px;
                background-color: var(--accent);
                opacity: 0.1;
                border-radius: 50%;
                z-index: 0;
            }

            .bmi-header {
                text-align: center;
                margin-bottom: 2rem;
                position: relative;
                z-index: 1;
            }

            .bmi-title {
                color: var(--accent);
                font-size: 1.8rem;
                margin: 0;
                font-weight: 700;
                text-transform: uppercase;
                letter-spacing: 1px;
            }

            .bmi-subtitle {
                color: var(--text-gray);
                font-size: 0.9rem;
                margin-top: 0.5rem;
                font-weight: 300;
            }

            .input-group {
                margin-bottom: 1.5rem;
                position: relative;
                z-index: 1;
            }

            .input-group label {
                display: block;
                color: var(--text-light);
                margin-bottom: 0.5rem;
                font-size: 0.9rem;
                font-weight: 500;
            }

            .input-group input {
                width: 100%;
                padding: 12px 15px;
                border: 2px solid #333;
                border-radius: 8px;
                background-color: rgba(255, 255, 255, 0.1);
                color: var(--text-light);
                font-size: 1rem;
                transition: all 0.3s;
            }

            .input-group input:focus {
                outline: none;
                border-color: var(--accent);
                background-color: rgba(255, 255, 255, 0.15);
            }

            .unit-toggle {
                display: flex;
                background-color: rgba(0, 0, 0, 0.3);
                border-radius: 8px;
                padding: 4px;
                margin-top: 8px;
            }

            .unit-toggle button {
                flex: 1;
                background: none;
                border: none;
                color: var(--text-gray);
                padding: 8px;
                cursor: pointer;
                font-size: 0.8rem;
                border-radius: 6px;
                transition: all 0.3s;
            }

            .unit-toggle button.active {
                background-color: var(--accent);
                color: white;
                font-weight: 600;
            }

            .bmi-result {
                text-align: center;
                margin: 2rem 0;
                opacity: 0;
                transform: translateY(20px);
                transition: all 0.5s ease-out;
            }

            .bmi-result.show {
                opacity: 1;
                transform: translateY(0);
            }

            .bmi-value {
                font-size: 3.5rem;
                font-weight: 700;
                margin: 0;
                line-height: 1;
            }

            .bmi-category {
                font-size: 1.2rem;
                margin: 0.5rem 0;
                font-weight: 600;
            }

            .bmi-message {
                color: var(--text-gray);
                font-size: 0.9rem;
                margin-top: 0.5rem;
            }

            .progress-container {
                width: 100%;
                height: 8px;
                background-color: rgba(255, 255, 255, 0.1);
                border-radius: 4px;
                margin: 1.5rem 0;
                overflow: hidden;
            }

            .progress-bar {
                height: 100%;
                width: 0;
                border-radius: 4px;
                transition: width 0.5s ease-out;
            }

            .bmi-scale {
                display: flex;
                justify-content: space-between;
                margin-bottom: 1.5rem;
                font-size: 0.7rem;
                color: var(--text-gray);
            }

            .bmi-scale span {
                position: relative;
                padding-top: 15px;
                text-align: center;
                flex: 1;
            }

            .bmi-scale span::before {
                content: "";
                position: absolute;
                top: 0;
                left: 50%;
                transform: translateX(-50%);
                width: 2px;
                height: 10px;
                background-color: var(--text-gray);
            }

            .btn {
                display: block;
                width: 100%;
                padding: 14px;
                border: none;
                border-radius: 8px;
                font-size: 1rem;
                font-weight: 600;
                cursor: pointer;
                transition: all 0.3s;
                text-align: center;
                text-decoration: none;
            }

            .btn-primary {
                background-color: var(--accent);
                color: white;
                margin-bottom: 1rem;
            }

            .btn-primary:hover {
                background-color: var(--accent-light);
                transform: translateY(-2px);
                box-shadow: 0 5px 15px rgba(255, 94, 0, 0.3);
            }

            .btn-secondary {
                background-color: transparent;
                color: var(--accent);
                border: 2px solid var(--accent);
            }

            .btn-secondary:hover {
                background-color: rgba(255, 94, 0, 0.1);
            }

            .icon {
                margin-right: 8px;
            }

            @media (max-width: 480px) {
                .bmi-calculator {
                    padding: 1.5rem;
                }

                .bmi-title {
                    font-size: 1.5rem;
                }
            }
        </style>
    </head>

    <body>
        <div class="bmi-calculator">
            <div class="bmi-header">
                <h1 class="bmi-title">BMI CALCULATOR</h1>
                <p class="bmi-subtitle">Know Your Numbers, Crush Your Goals!</p>
            </div>

            <div class="input-group">
                <label for="weight">Weight</label>
                <input type="number" id="weight" placeholder="Enter your weight">
                <div class="unit-toggle">
                    <button class="active" data-unit="kg">kg</button>
                    <button data-unit="lbs">lbs</button>
                </div>
            </div>

            <div class="input-group">
                <label for="height">Height</label>
                <input type="number" id="height" placeholder="Enter your height">
                <div class="unit-toggle">
                    <button class="active" data-unit="cm">cm</button>
                    <button data-unit="ft">ft/in</button>
                </div>
            </div>

            <div class="progress-container">
                <div class="progress-bar"></div>
            </div>

            <div class="bmi-scale">
                <span>Underweight<br>&lt; 18.5</span>
                <span>Normal<br>18.5 - 24.9</span>
                <span>Overweight<br>25 - 29.9</span>
                <span>Obese<br>30+</span>
            </div>

            <div class="bmi-result">
                <h2 class="bmi-value">0.0</h2>
                <p class="bmi-category">Enter your details</p>
                <p class="bmi-message">Calculate your BMI to see where you stand</p>
            </div>

            <a href="<?php echo HTTP_PATH . "/user_panel/class/class-details.php"; ?>" class="btn btn-primary" id="cta-btn">
                <i class="fas fa-dumbbell icon"></i>GET YOUR CUSTOM WORKOUT PLAN
            </a>
            <a href="<?php echo HTTP_PATH . "/user_panel/services/service.php"; ?>" class="btn btn-secondary">
                <i class="fas fa-calendar-check icon"></i>BOOK FREE CONSULTATION
            </a>
        </div>

        <script>
            $(document).ready(function() {
                let weightUnit = 'kg';
                let heightUnit = 'cm';

                // Unit toggle functionality
                $('.unit-toggle button').click(function() {
                    const parent = $(this).parent();
                    parent.find('button').removeClass('active');
                    $(this).addClass('active');

                    if (parent.prev().attr('id') === 'weight') {
                        weightUnit = $(this).data('unit');
                        $('#weight').attr('placeholder', weightUnit === 'kg' ? 'e.g., 70' : 'e.g., 154');
                    } else {
                        heightUnit = $(this).data('unit');
                        $('#height').attr('placeholder', heightUnit === 'cm' ? 'e.g., 175' : 'e.g., 5 9');
                    }

                    calculateBMI();
                });

                // Real-time calculation
                $('#weight, #height').on('input', function() {
                    calculateBMI();
                });

                function calculateBMI() {
                    let weight = parseFloat($('#weight').val());
                    let height = parseFloat($('#height').val());

                    if (isNaN(weight) || isNaN(height) || height <= 0) {
                        $('.bmi-result').removeClass('show');
                        $('.progress-bar').css('width', '0');
                        return;
                    }

                    // Convert units if needed
                    if (weightUnit === 'lbs') {
                        weight = weight * 0.453592; // lbs to kg
                    }

                    if (heightUnit === 'ft') {
                        // Assuming input is in format "5 9" for 5 feet 9 inches
                        const feet = Math.floor(height);
                        const inches = (height - feet) * 100;
                        height = feet * 30.48 + inches * 2.54; // ft+in to cm
                    }

                    // Convert height from cm to m
                    height = height / 100;

                    // Calculate BMI
                    const bmi = weight / (height * height);
                    const roundedBMI = Math.round(bmi * 10) / 10;

                    // Display result
                    $('.bmi-value').text(roundedBMI);

                    // Determine category
                    let category, message, color;

                    if (bmi < 18.5) {
                        category = "Underweight";
                        message = "Consider a muscle-building program with proper nutrition.";
                        color = "var(--underweight)";
                    } else if (bmi >= 18.5 && bmi < 25) {
                        category = "Normal Weight";
                        message = "Great job! Maintain a balanced diet and workout routine.";
                        color = "var(--normal)";
                    } else if (bmi >= 25 && bmi < 30) {
                        category = "Overweight";
                        message = "Focus on cardio and strength training to improve fitness.";
                        color = "var(--overweight)";
                    } else {
                        category = "Obese";
                        message = "Consult with our trainers for a personalized fitness plan.";
                        color = "var(--obese)";
                    }

                    $('.bmi-category').text(category);
                    $('.bmi-message').text(message);
                    $('.bmi-value, .bmi-category').css('color', color);

                    // Update progress bar
                    const progressWidth = Math.min(100, (bmi / 40) * 100);
                    $('.progress-bar').css({
                        'width': progressWidth + '%',
                        'background-color': color
                    });

                    // Show result with animation
                    $('.bmi-result').addClass('show');
                }
            });
        </script>
    </body>

    </html>
    <!-- BMI Calculator Section End -->

    <?php
    include(DRIVE_PATH . "/user_panel/footer/footer.php");
    ?>
</body>

</html>