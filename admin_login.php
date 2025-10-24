<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login Page</title>
    <link rel="stylesheet" href="design.css">
    <link rel="website icon" type="jpg" href="logo.jpg">
</head>

<body>

    <!--NAV BAR SECTION-->

    <nav class="navbar">
        <a href="index.php" class="logo"><img src="logo.jpg" alt="Logo"></a>
        <ul id="nav-ul">
            <li class="active"><a href="index.php">Home</a></li>
            <li id="nav-li"><a href="index.php#mem_reg">Member Registration</a></li>
            <li id="nav-li"><a href="member_login.php">Member Dashboard</a></li>
            <li id="nav-li"><a href="trainer_login.php">Trainer Dashboard</a></li>
            <li id="nav-li"><a href="admin_login.php">Admin Dashboard</a></li>
        </ul>
    </nav>
    <div class="form" id="login">
        <h2><b><u>Admin Login!</u></b></h2><br>

        <!-- Show session messages -->
        <?php
        if (isset($_SESSION['login_error'])) {
            echo "<p align='center' style='color: darksalmon; font-weight: bold;'>" . $_SESSION['login_error'] . "</p>";
            unset($_SESSION['login_error']); // clear message after showing
        }

        ?>
        <br>
        <form action="admin_control.php" method="post">
            <input type="Email" name="Email" placeholder="Email" required><br><br>
            <input type="Password" name="Password" placeholder="Password" required><br><br>
            <button type="submit" name="login">login</button>
        </form>
        <br>

    </div>
    <br><br>
    <a class="backHome" href="index.php"><u>Back to HOME</u></a>

     <!--FOOTER SECTION-->

    <footer class="footer">
        <div class="footer-container">

            <div class="footer-box">
                <h3>Gym Management System</h3>
                <p>Level-Up your fitness in a Smart Way!</p>
                <p>Transform your body, mind, and lifestyle with our comprehensive gym management platform.</p>
            </div>

            <div class="footer-box">
                <h3>Quick Links</h3>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="index.php#mem_reg">Member Registration</a></li>
                    <li><a href="member_login.php">Member Login</a></li>
                    <li><a href="trainer_login.php">Trainer Login</a></li>
                    <li><a href="admin_login.php">Admin Login</a></li>
                </ul>
            </div>

            <div class="footer-box">
                <h3>Services</h3>
                <ul>
                    <li><a href="#">Personal Training</a></li>
                    <li><a href="#">Group Classes</a></li>
                    <li><a href="#">Nutrition Plans</a></li>
                    <li><a href="#">Workout Programs</a></li>
                    <li><a href="#">Membership Plans</a></li>
                </ul>
            </div>

            <div class="footer-box">
                <h3>Contact Us</h3>
                <ul>
                    <li><a href="tel:+8801234567890">📞 +880 1234-567890</a></li> <!--tel: is used to direct call-->
                    <li><a href="mailto:info@gymsystem.com">✉️ info@gymsystem.com</a></li>
                    <li><a href="#">📍 Dhaka, Bangladesh</a></li>
                    <li><a href="#">⏰ Sat-Thu: 7AM - 11PM</a></li>
                </ul>
            </div>

            <div class="footer-box">
                <h3>Follow Us</h3>
                <div class="social-links">
                    <a href="#" class="social-icon">Facebook</a>
                    <a href="#" class="social-icon">Instagram</a>
                </div>
                <p style="margin-top: 15px; font-size: 0.9rem;">Stay connected for fitness tips, updates, and exclusive offers!</p>
            </div>

        </div>

        <div class="footer-bottom">
            <p>© 2025 Electroza. All Rights Reserved. | <a href="#" style="color: burlywood;">Privacy Policy</a> | <a href="#" style="color: burlywood;">Terms & Conditions</a></p>
        </div>
    </footer>
</body>

</html>