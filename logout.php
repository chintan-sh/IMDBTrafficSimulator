<?php
include_once "/var/www/mdb/includes/common/constants.php";

session_destroy();
header("Location: " . $STATIC_URL);
?>