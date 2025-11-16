<?php
require_once 'config.php';

$messages = [];

// Create sessions table if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS sessions (
    ID INT AUTO_INCREMENT PRIMARY KEY,
    MemberID INT NOT NULL,
    TrainerID INT NOT NULL,
    SessionDate DATE NOT NULL,
    SessionTime TIME NOT NULL,
    SessionType VARCHAR(50) NOT NULL,
    Status ENUM('Scheduled', 'Completed', 'Cancelled') DEFAULT 'Scheduled',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
    $messages[] = "Sessions table created successfully!";
} else {
    $messages[] = "Error creating table: " . $conn->error;
}

// Add TrainerID column to memberregistration if it doesn't exist
$check_column = $conn->query("SHOW COLUMNS FROM memberregistration LIKE 'TrainerID'");
if ($check_column->num_rows == 0) {
    $alter_sql = "ALTER TABLE memberregistration ADD COLUMN TrainerID INT NULL";
    if ($conn->query($alter_sql)) {
        $messages[] = "TrainerID column added to memberregistration!";
    } else {
        $messages[] = "Error adding TrainerID column: " . $conn->error;
    }
} else {
    $messages[] = "TrainerID column already exists!";
}

// Store messages in session and redirect
session_start();
$_SESSION['setup_messages'] = $messages;
header("Location: trainer_dash.php");
exit();
?>