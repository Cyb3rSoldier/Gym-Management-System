<?php
session_start();
require_once 'config.php';

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

    <!--Trainer Registration Section-->
    <section class="form" id="trainer_reg">
        <div class="trainer_form">
            <h2><u>Add Trainer Here!</u></h2>

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
            <form action="trainer_control.php" method="post">
                <label>NAME: </label>
                <input type="text" name="Name" placeholder="Enter Your Full Name" required><br>
                <label>AGE: </label>
                <input type="number" name="Age" placeholder="Enter Your Age" required><br>
                <label>Contact: </label>
                <input type="number" name="Contact" placeholder="Enter Your Contact Number" required><br>
                <label>EMAIL: </label>
                <input type="email" name="Email" placeholder=" Enter Your Email" required><br>
                <label>ADDRESS</label>
                <input type="address" name="Address" placeholder="Enter your Adress" required><br>
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
                    <option value="Trainer">Trainer</option>
                </select><br>
                <button type="submit" name="register">Register</button>
            </form>
        </div>

    <!-- MANAGE TRAINER -->

    </section>

    <section class="table">
        <table border="1">
            <thead>
                <tr>
                    <th>Trainer ID</th>
                    <th>Trainer Name</th>
                    <th>Age</th>
                    <th>Contact</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Gender</th>
                    <th>Joined</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $query = " select * from trainer_registration ";
                $result = mysqli_query($conn, $query);

                if (!$result) {
                    die("Query Failed: " . mysqli_error());
                } else {
                    while ($row = mysqli_fetch_assoc($result)) {
                ?>
                        <tr>
                            <td><?php echo $row['ID']; ?></td>
                            <td><?php echo $row['Name']; ?></td>
                            <td><?php echo $row['Age']; ?></td>
                            <td><?php echo $row['Contact']; ?></td>
                            <td><?php echo $row['Email']; ?></td>
                            <td><?php echo $row['Address']; ?></td>
                            <td><?php echo $row['Gender']; ?></td>
                            <td><?php echo $row['created_at']; ?></td>
                        </tr>
                <?php
                    }
                }
                ?>
            </tbody>
        </table>
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