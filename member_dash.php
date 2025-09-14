<?php
session_start();

// Protect page: check if logged in
if (!isset($_SESSION['Email']) || $_SESSION['Role'] !== 'member') {
    header("Location: member_login.php");
    exit();
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Member Dashboard</title>
    <link rel="stylesheet" href="design.css">
</head>

<body>
    <h2 align="center" style="color:antiquewhite;">
        Hello, <?php echo htmlspecialchars($_SESSION['Name']); ?>!
    </h2>
    <h2 align="center" style="color:antiquewhite;">Welcome to Member Page!</h2>
    <a class="backHome" href="member_logout.php">Logout</a>
</body>

</html>