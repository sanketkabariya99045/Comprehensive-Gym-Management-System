<?php
session_start();
require("C:/xampp/htdocs/php/IFS/path.php");

include(DRIVE_PATH . "../database.php");

// This is for signUp Form
if (isset($_POST["sign"])) {


    class User
    {
        public $FirstName;
        public $LastName;
        public $email;
        public $password;
        public $phone;
        public $gender;
        public $dob;
        public $address;

        function setValue()
        {
            $this->FirstName = $_POST["FirstName"];
            $this->LastName = $_POST["LastName"];
            $this->email = $_POST["email"];
            $this->password = $_POST["password"];
            $this->phone = $_POST["phone"];
            $this->gender = $_POST["gender"];
            $this->dob = $_POST["dob"];

            $this->address = [$_POST["house-number"], $_POST["apartment"], $_POST["suite"], $_POST["city"], $_POST["pincode"]];
        }

        function insertValue()
        {
            global $conn;

            $insert = $conn->prepare("INSERT INTO `member` VALUES ('','" . $this->FirstName . "', '" . $this->LastName . "','" . $this->email . "','" . $this->password . "','" . $this->phone . "','" . $this->gender . "','" . $this->dob . "','" . serialize($this->address) . "','','','')");
            $insert->execute();
        }
    }

    $contain_email = "";

    $sel_email = $conn->prepare("SELECT email FROM `member` WHERE email='" . $_POST["email"] . "'");
    $sel_email->execute();
    $sel_email = $sel_email->fetchAll();

    foreach ($sel_email as $row) {

        if ($row["email"] == $_POST["email"] && $row["status"] == "Blocked") {
            $_SESSION["form_error"] = "You are blocked, So you can't signUp";
            if (isset($_SERVER['HTTP_REFERER'])) {
                header("Location: " . $_SERVER['HTTP_REFERER'] . "");
            }
            return;
        }
        $contain_email = $row["email"];
    }

    if ($contain_email != $_POST["email"]) {

        $U = new User();
        //! Set values of user
        $U->setValue();

        //! Insert it into database.
        $U->insertValue();

        $_SESSION["form_succ"] = "signUp Successfully";

        if (isset($_SESSION["form_error"])) {
            unset($_SESSION["form_error"]);
        }

        if (isset($_SERVER['HTTP_REFERER'])) {
            header("Location: " . $_SERVER['HTTP_REFERER'] . "");
        }
        return;
    } else {
        $_SESSION["form_error"] = "Email Id is already Exist";

        if (isset($_SESSION["form_succ"])) {
            unset($_SESSION["form_succ"]);
        }
        if (isset($_SERVER['HTTP_REFERER'])) {
            header("Location: " . $_SERVER['HTTP_REFERER'] . "");
        }
        //
    }
}









// This is for Login Form
if (isset($_POST["login"])) {
    $login_email = $_POST["email"];
    $login_password = $_POST["password"];

    //! Select Admin
    $sel_admin = $conn->prepare("SELECT * FROM `admin`");
    $sel_admin->execute();
    $sel_admin = $sel_admin->fetchAll();

    foreach ($sel_admin as $row_admin) {

        if ($login_email == $row_admin["email"] && $login_password == $row_admin["password"]) {

            $_SESSION["admin_email"] = $row_admin["email"];

            if (isset($_SESSION["form_error"])) {
                unset($_SESSION["form_error"]);
            }

            header("Location: " . HTTP_PATH . "/admin_panel/index.php");
            return;
        }
        //
        else if ($login_email == $row_admin["email"] && $login_password != $row_admin["password"]) {
            $_SESSION["form_error"] = "Invalid password";

            if (isset($_SESSION["form_succ"])) {
                unset($_SESSION["form_succ"]);
            }
        }
        //
        else {
            $_SESSION["form_error"] = "Invalid Email ID";

            if (isset($_SESSION["form_succ"])) {
                unset($_SESSION["form_succ"]);
            }
        }
    }

    //! Select user
    $sel_user = $conn->prepare("SELECT * FROM `member` WHERE email='$login_email'");
    $sel_user->execute();
    $sel_user = $sel_user->fetchAll();

    foreach ($sel_user as $row_user) {
        if ($login_email == $row_user["email"] && $login_password == $row_user["password"]) {
            $_SESSION["email"] = $row_user["email"];
            $_SESSION["name"] = $row_user["FirstName"] . " " . $row_user["LastName"];
            $_SESSION["phone"] = $row_user["phone"];
            $_SESSION["gender"] = $row_user["gender"];
            $_SESSION["dob"] = date("d/m/Y", strtotime($row_user["dob"]));

            $_SESSION["form_succ"] = "Login Successfully";

            if (isset($_SESSION["form_error"])) {
                unset($_SESSION["form_error"]);
            }
            if (isset($_SERVER["HTTP_REFERER"])) {
                header("Location: " . $_SERVER["HTTP_REFERER"]);
            }
            return;
        }
        //
        else if ($login_email == $row_user["email"] && $login_password != $row_user["password"]) {
            $_SESSION["form_error"] = "Invalid password";

            if (isset($_SESSION["form_succ"])) {
                unset($_SESSION["form_succ"]);
            }
        }
        //
        else if ($login_email != $row_user["email"] && $login_password == $row_user["password"]) {
            $_SESSION["form_error"] = "Invalid Email ID";

            if (isset($_SESSION["form_succ"])) {
                unset($_SESSION["form_succ"]);
            }
        }
    }
    if (!isset($_SESSION["form_error"]))
        $_SESSION["form_error"] = "No Credential Found";
    if (isset($_SERVER['HTTP_REFERER'])) {
        header("Location: " . $_SERVER['HTTP_REFERER'] . "");
    }
}
