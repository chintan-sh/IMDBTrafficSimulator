<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/includes/common/constants.php";


setcookie("name", '', time() + (86400 * 30), "/");
setcookie("username", '', time() + (86400 * 30), "/");
setcookie("preferences", '', time() + (86400 * 30), "/");
setcookie("email", '', time() + (86400 * 30), "/");
setcookie("is_logged", false, time() + (86400 * 30), "/");
//session_destroy();
header("Location: " . $STATIC_URL);
?>