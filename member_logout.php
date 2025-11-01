<?php
session_start();

session_unset();   // remove all session variables
session_destroy(); // Destroy the session

header("Location: member_login.php");
exit();
?>