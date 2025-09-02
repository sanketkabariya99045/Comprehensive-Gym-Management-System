<?php
session_start();

unset($_SESSION["email"]);

$_SESSION["logout"] = true;
if (isset($_SERVER["HTTP_REFERER"])) {
        header("Location: " . $_SERVER["HTTP_REFERER"]);
}
