<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="design.css">
</head>

<body>
    <nav class="navbar" id="navbar">
        <a href="index.php" class="logo"><img src="logo.jpg" alt="Logo"></a>
        <ul id="nav-ul">
            <li class="active"><a href="index.php#home">Home</a></li>
            <li id="nav-li"><a href="index.php#mem_reg">Member Registration</a></li>
            <li id="nav-li"><a href="member_login.php">Member Dashboard</a></li>
            <li id="nav-li"><a href="trainer_login.php">Trainer Dashboard</a></li>
            <li id="nav-li"><a href="admin_login.php">Admin Dashboard</a></li>
        </ul>
    </nav>

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