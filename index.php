<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gym Management System</title>
    <link rel="stylesheet" href="design.css">
</head>

<body>

    <!--NAV BAR SECTION-->

    <nav class="navbar">
        <!--<a href="#" class="logo"><b><big>OMAR.</big></b></a>-->
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
                echo "<p align='center' style='color: red; font-weight: bold;'>" . $_SESSION['register_error'] . "</p>";
                unset($_SESSION['register_error']); // clear message after showing
            }
            if (isset($_SESSION['register_success'])) {
                echo "<p align='center' style='color: green; font-weight: bold;'>" . $_SESSION['register_success'] . "</p>";
                unset($_SESSION['register_success']);
            }

            ?>
            <br>
            <form action="" method="post">
                <label>NAME: </label>
                <input type="text" name="Name" placeholder="Enter Your Full Name" required><br><br>
                <label>AGE: </label>
                <input type="number" name="Age" placeholder="Enter Your Age" required><br><br>
                <label>EMAIL: </label>
                <input type="email" name="Email" placeholder=" Enter Your Email" required><br><br>
                <label>ADDRESS</label>
                <input type="adress" name="Adress" placeholder="Enter your Adress" required><br><br>
                <label>GENDER: </label>
                <div class="gender">
                    <input type="radio" value="male" name="gender"><label for="male">MALE</label>
                    <input type="radio" value="female" name="gender"><label for="female">FEMALE</label>
                </div>
                <br><br>
                <label>PASSWORD: </label>
                <input type="password" name="Password" placeholder="Enter Password" required><br><br>
                <select name="Role" placeholder="Select Your Role" required>
                    <option value="">--Select Role--</option>
                    <option value="User">Member</option>
                </select><br><br>
                <button type="submit" name="register">Register</button>
            </form>
            <br>
            <p>Already have Account? <a href="login.php">login </a>here!</p>
        </div>
    </section>
</body>

</html>