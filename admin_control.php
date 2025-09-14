<?php
session_start();
require_once 'config.php';


// LOGIN
if (isset($_POST['login'])) {
    $email = $_POST['Email'];
    $password = $_POST['Password'];

    $stmt = $conn->prepare("SELECT * FROM admin_registration WHERE Email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($row = $result->fetch_assoc()) {
        if (password_verify($password, $row['Password'])) {
            // store session
            $_SESSION['Name']  = $row['Name'];
            $_SESSION['Email'] = $row['Email'];
            $_SESSION['Role']  = $row['Role'];

            // redirect by role
            if ($row['Role'] === 'member') {
                header("Location: member_dash.php");
                exit();
            }
            else if ($row['Role'] === 'admin') {
                header("Location: admin_dash.php");
                exit();
            }
            else if ($row['Role'] === 'trainer') {
                header("Location: trainer_dash.php");
                exit();
            }
        }
    }

    // login failed
    $_SESSION['login_error'] = 'Incorrect email or password';
    $_SESSION['active_form'] = "login";
    header("Location: admin_login.php");
    exit();
}
?>
