<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Member Login Page</title>
    <link rel="stylesheet" href="design.css">
    <link rel="website icon" type="jpg" href="logo.jpg">
</head>

<body>

    <!-- NAV BAR -->
    <?php include 'header.php' ?>

    <div class="form" id="login">
        <h2><b><u>Member Login!</u></b></h2><br>

        <!-- Show session messages -->
        <?php
        if (isset($_SESSION['login_error'])) {
            echo "<p align='center' style='color: darksalmon; font-weight: bold;'>" . $_SESSION['login_error'] . "</p>";
            unset($_SESSION['login_error']); // clear message after showing
        }

        ?>
        <br>
        <form action="member_control.php" method="post">
            <input type="Email" name="Email" placeholder="Email" required><br><br>
            <input type="Password" name="Password" placeholder="Password" required><br><br>
            <button type="submit" name="login">login</button>
        </form>
        <br>
        <p align="center">Don't have Account? <a href="index.php#mem_reg"><u><b> <big>Register</big></b></u> </a>here!</p>
    </div>
    <br><br>
    <a class="backHome" href="index.php"><u>Back to HOME</u></a>

    <!-- FOOTER -->
    <?php include 'footer.php' ?>

</body>

</html>