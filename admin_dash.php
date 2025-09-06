<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="design.css">
</head>

<body>

    <!--Trainer Registration Section-->
    <section class="form" id="trainer_reg">
        <div class="trainer_form">
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
                <input type="text" name="Name" placeholder="Enter Your Full Name" required><br>
                <label>AGE: </label>
                <input type="number" name="Age" placeholder="Enter Your Age" required><br>
                <label>Contact: </label>
                <input type="number" name="Contact" placeholder="Enter Your Contact Number" required><br>
                <label>EMAIL: </label>
                <input type="email" name="Email" placeholder=" Enter Your Email" required><br>
                <label>ADDRESS</label>
                <input type="adress" name="Adress" placeholder="Enter your Adress" required><br>
                <label>GENDER: </label>
                <div class="gender">
                    <input type="radio" value="male" name="gender"><label for="male">MALE</label>
                    <input type="radio" value="female" name="gender"><label for="female">FEMALE</label>
                </div>
                <br>
                <label>PASSWORD: </label>
                <input type="password" name="Password" placeholder="Enter Password" required><br>
                <select name="Role" placeholder="Select Your Role" required>
                    <option value="">--Select Role--</option>
                    <option value="User">Trainer</option>
                </select><br>
                <button type="submit" name="register">Register</button>
            </form>
        </div>
    </section>
</body>

</html>