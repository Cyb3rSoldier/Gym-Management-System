<?php
session_start();
$_SESSION = array();  // remove all session variables
session_destroy(); // destroy the session
header("Location: admin_login.php"); // back to login
exit();
