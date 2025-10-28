<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gym Management System</title>
    <link rel="stylesheet" href="design.css">
    <link rel="website icon" type="jpg" href="logo.jpg">
</head>

<body>

    <!--NAV BAR SECTION-->

    <nav class="navbar" id= "navbar">
        <a href="index.php" class="logo"><img src="logo.jpg" alt="Logo"></a>
        <ul id="nav-ul">
            <li class="active"><a href="#home">Home</a></li>
            <li id="nav-li"><a href="#mem_reg">Member Registration</a></li>
            <li id="nav-li"><a href="member_login.php">Member Dashboard</a></li>
            <li id="nav-li"><a href="trainer_login.php">Trainer Dashboard</a></li>
            <li id="nav-li"><a href="admin_login.php">Admin Dashboard</a></li>
        </ul>
    </nav>

    <!--HOME SECTION DESIGN-->
    <section class="home" id="home">
        <h2>Gym Management System</h2>
        <h4>Level Up Your Fitness — In a Smart Way</h4>
    </section>

    <!--Member Registration Section-->
    <section class="form" id="mem_reg">
        <div class="mem_form">
            <h2><u>Register here!</u></h2>

            <!-- Show session messages -->
            <?php
            if (isset($_SESSION['register_error'])) {
                echo "<p align='center' style='color: darksalmon; font-weight: bold;'>" . $_SESSION['register_error'] . "</p>";
                unset($_SESSION['register_error']); // clear message after showing
            }
            if (isset($_SESSION['register_success'])) {
                echo "<p align='center' style='color: darksalmon; font-weight: bold;'>" . $_SESSION['register_success'] . "</p>";
                unset($_SESSION['register_success']);
            }

            ?>
            <br>
            <form action="member_control.php" method="post">
                <label>NAME: </label>
                <input type="text" name="Name" placeholder="Enter Your Full Name" required><br>
                <label>AGE: </label>
                <input type="number" name="Age" placeholder="Enter Your Age" required><br>
                <label>Contact: </label>
                <input type="number" name="Contact" placeholder="Enter Your Contact Number" required><br>
                <label>EMAIL: </label>
                <input type="email" name="Email" placeholder=" Enter Your Email" required><br>
                <label>ADDRESS</label>
                <input type="text" name="Address" placeholder="Enter your Adress" required><br>
                <label>GENDER: </label>
                <div class="gender">
                    <input type="radio" value="male" name="Gender"><label for="male">MALE</label>
                    <input type="radio" value="female" name="Gender"><label for="female">FEMALE</label>
                </div>
                <br>
                <label>PASSWORD: </label>
                <input type="password" name="Password" placeholder="Enter Password" required><br>
                <select name="Role" placeholder="Select Your Role" required>
                    <option value="">--Select Role--</option>
                    <option value="Member">Member</option>
                </select><br><br>
                <button type="submit" name="register">Register</button>
            </form>
            <br>
            <p align="center">Already have Account? <a href="member_login.php"><u><b> <big>login</big></b></u> </a>here!</p>
        </div>
    </section>

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
            <p>© 2025 Gym Management System. All Rights Reserved. | <a href="#" style="color: burlywood;">Privacy Policy</a> | <a href="#" style="color: burlywood;">Terms & Conditions</a></p>
        </div>
    </footer>

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