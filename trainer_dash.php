<?php
session_start();

// Protect page: check if logged in
if (!isset($_SESSION['Email']) || $_SESSION['Role'] !== 'trainer') {
    header("Location: trainer_login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trainer Dashboard</title>
    <link rel="stylesheet" href="design.css">
    <link rel="website icon" type="jpg" href="logo.jpg">
</head>

<body>
    <!--NAV BAR SECTION-->

    <nav class="navbar" id="navbar">
        <a href="index.php" class="logo"><img src="logo.jpg" alt="Logo"></a>
        <ul id="nav-ul">
            <li class="active"><a href="index.php">Home</a></li>
            <li id="nav-li"><a href="trainer_dash.php">Trainer Dashboard</a></li>
            <li id="nav-li"><a href="trainer_logout.php">Logout</a></li>
        </ul>
    </nav>
    <section class="home">
    <h2 align="center" style="color:antiquewhite;">Welcome to Trainer Page!</h2>
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