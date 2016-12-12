<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/includes/common/constants.php";

session_destroy();
header("Location: " . $STATIC_URL);
?>