<?php
session_start();
require_once 'config.php';

// REGISTER
if (isset($_POST['register'])) {
    $name = $_POST['Name'];
    $age = $_POST['Age'];
    $contact = $_POST['Contact'];
    $email = $_POST['Email'];
    $address = $_POST['Address'];
    $gender = $_POST['Gender'];
    $password = password_hash($_POST['Password'], PASSWORD_DEFAULT);
    $role = $_POST['Role'];

    // Check if email exists
    $stmt = $conn->prepare("SELECT Email FROM trainer_registration WHERE Email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $_SESSION['register_error'] = "Email already exists! Please login.";
        $_SESSION['active_form'] = "register";
    } else {
        $stmt = $conn->prepare("INSERT INTO trainer_registration (Name, Age, Contact, Email, Address, Gender,  Password, Role) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sissssss", $name, $age, $contact, $email, $address, $gender, $password, $role);
        $stmt->execute();

        $_SESSION['register_success'] = "New Trainer Added Successfully!";
        $_SESSION['active_form'] = "login";
    }

    header("Location: manage_trainer.php#trainer_reg");
    exit();
}

// LOGIN
if (isset($_POST['login'])) {
    $email = $_POST['Email'];
    $password = $_POST['Password'];

    $stmt = $conn->prepare("SELECT * FROM trainer_registration WHERE Email = ?");
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
    header("Location: trainer_login.php");
    exit();
}
?>
