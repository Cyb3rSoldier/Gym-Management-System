<?php
session_start();

// Protect page: check if logged in
if (!isset($_SESSION['Email']) || $_SESSION['Role'] !== 'admin') {
    header("Location: admin_login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="design.css">
    <link rel="website icon" type="jpg" href="logo.jpg">
</head>

<body>

    <!--NAV BAR SECTION-->

    <nav class="navbar" id="navbar">
        <a href="index.php" class="logo"><img src="logo.jpg" alt="Logo"></a>
        <ul id="nav-ul">
            <li class="active"><a href="index.php">Home</a></li>
            <li id="nav-li"><a href="admin_dash.php">Admin Dashboard</a></li>
            <li id="nav-li"><a href="admin_logout.php">Logout</a></li>
        </ul>
    </nav>

    <section class="home">
        <h2 align="center" style="color:antiquewhite;">
            Hello, <?php echo htmlspecialchars($_SESSION['Name']); ?>!
        </h2>
        <h2 align="center" style="color:antiquewhite;">Welcome to Admin Page!</h2>
    </section>

    <section class="backHome">
        <a href="manage_member.php">Manage Members</a><br>
        <a href="manage_trainer.php">Manage Trainers</a><br>
    </section>
         

    <!-- FOOTER -->

   <?php include 'footer.php' ?>

   <!-- NAVBAR SCROLL EFFECT SCRIPT -->
    <script>
        const navbar = document.getElementById('navbar');

        window.addEventListener('scroll', function() {
            if (window.scrollY > 50) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });
    </script>

</body>

</html>