<?php
session_start();
require_once 'config.php';

// Protect page: check if logged in
if (!isset($_SESSION['Email']) || $_SESSION['Role'] !== 'trainer') {
    header("Location: trainer_login.php");
    exit();
}

// Get trainer details
$trainer_email = $_SESSION['Email'];
$trainer_sql = "SELECT * FROM trainer_registration WHERE Email = ?";
$stmt = $conn->prepare($trainer_sql);
$stmt->bind_param("s", $trainer_email);
$stmt->execute();
$trainer_result = $stmt->get_result();

if ($trainer_result->num_rows === 0) {
    header("Location: trainer_login.php");
    exit();
}

$trainer = $trainer_result->fetch_assoc();
$trainer_id = $trainer['ID'];

// Count total members assigned to this trainer
$member_count_sql = "SELECT COUNT(*) as total_members FROM member_registration WHERE TrainerID = ?";
$stmt = $conn->prepare($member_count_sql);
$stmt->bind_param("i", $trainer_id);
$stmt->execute();
$member_count_result = $stmt->get_result();
$member_count = $member_count_result->fetch_assoc()['total_members'];

// Get upcoming sessions - Check if sessions table exists first
$sessions_result = null;
$today_sessions = 0;

// Check if sessions table exists
$table_check = $conn->query("SHOW TABLES LIKE 'sessions'");
if ($table_check->num_rows > 0) {
    // Sessions table exists, run the query
    $sessions_sql = "SELECT s.*, m.Name as MemberName, m.Contact as MemberContact 
                     FROM sessions s 
                     JOIN memberregistration m ON s.MemberID = m.ID 
                     WHERE s.TrainerID = ? AND s.SessionDate >= CURDATE() 
                     AND s.Status = 'Scheduled'
                     ORDER BY s.SessionDate, s.SessionTime 
                     LIMIT 5";
    $stmt = $conn->prepare($sessions_sql);
    $stmt->bind_param("i", $trainer_id);
    $stmt->execute();
    $sessions_result = $stmt->get_result();

    // Count today's sessions
    $today_sessions_sql = "SELECT COUNT(*) as today_count FROM sessions 
                           WHERE TrainerID = ? AND SessionDate = CURDATE() AND Status = 'Scheduled'";
    $stmt = $conn->prepare($today_sessions_sql);
    $stmt->bind_param("i", $trainer_id);
    $stmt->execute();
    $today_result = $stmt->get_result();
    $today_data = $today_result->fetch_assoc();
    $today_sessions = $today_data['today_count'];
}

// Get recent members assigned to this trainer
$recent_members_sql = "SELECT Name, Email, Contact, Time as JoinDate 
                       FROM member_registration 
                       WHERE TrainerID = ? 
                       ORDER BY Time DESC 
                       LIMIT 5";
$stmt = $conn->prepare($recent_members_sql);
$stmt->bind_param("i", $trainer_id);
$stmt->execute();
$recent_members_result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trainer Dashboard</title>
    <link rel="stylesheet" href="design.css">
    <link rel="website icon" type="jpg" href="logo.jpg">
    <style>
        .dashboard-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }
        
        .stats-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }
        
        .stat-card {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            text-align: center;
            transition: transform 0.3s ease;
        }
        
        .stat-card:hover {
            transform: translateY(-5px);
        }
        
        .stat-number {
            font-size: 2em;
            font-weight: bold;
            color: #2c3e50;
            margin-bottom: 10px;
        }
        
        .stat-label {
            color: #7f8c8d;
            font-size: 1em;
            font-weight: 500;
        }
        
        .section {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            margin-bottom: 20px;
        }
        
        .section h3 {
            margin-top: 0;
            color: #2c3e50;
            border-bottom: 2px solid #3498db;
            padding-bottom: 10px;
        }
        
        .table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }
        
        .table th, .table td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ecf0f1;
        }
        
        .table th {
            background-color: #3498db;
            color: white;
            font-weight: 600;
        }
        
        .action-buttons {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
            gap: 15px;
            margin: 25px 0;
        }
        
        .btn {
            padding: 12px 20px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
            text-align: center;
            font-weight: 600;
            transition: all 0.3s ease;
            font-size: 0.9em;
        }
        
        .btn-primary {
            background: #3498db;
            color: white;
        }
        
        .btn-primary:hover {
            background: #2980b9;
            transform: translateY(-2px);
        }
        
        .btn-success {
            background: #27ae60;
            color: white;
        }
        
        .btn-success:hover {
            background: #219a52;
            transform: translateY(-2px);
        }
        
        .btn-warning {
            background: #f39c12;
            color: white;
        }
        
        .btn-warning:hover {
            background: #d68910;
            transform: translateY(-2px);
        }
        
        .empty-state {
            text-align: center;
            padding: 30px;
            color: #7f8c8d;
            font-style: italic;
        }
        
        .welcome-banner {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            padding: 25px;
            border-radius: 10px;
            margin-bottom: 25px;
            color: white;
            text-align: center;
        }
        
        .welcome-banner h2 {
            margin: 0;
            font-size: 1.8em;
        }
        
        .badge {
            padding: 4px 8px;
            border-radius: 12px;
            font-size: 0.7em;
            font-weight: 600;
        }
        
        .badge-info {
            background: #d1ecf1;
            color: #0c5460;
        }
        
        .setup-alert {
            background: #fff3cd;
            border: 1px solid #ffeaa7;
            padding: 15px;
            border-radius: 5px;
            margin: 15px 0;
            color: #856404;
        }
    </style>
</head>

<body>
    <!--NAV BAR SECTION-->
    <nav class="navbar" id="navbar">
        <a href="index.php" class="logo"><img src="logo.jpg" alt="Logo"></a>
        <ul id="nav-ul">
            <li><a href="index.php">Home</a></li>
            <li class="active"><a href="trainer_dash.php">Trainer Dashboard</a></li>
            <li><a href="trainer_logout.php">Logout</a></li>
        </ul>
    </nav>

    <section class="home">
        <div class="dashboard-container">
            <!-- Welcome Banner -->
            <div class="welcome-banner">
                <h2>Welcome, <?php echo htmlspecialchars($_SESSION['Name']); ?>! 👋</h2>
                <p>Trainer Dashboard - Manage Your Clients & Sessions</p>
            </div>

            <!-- Setup Alert -->
            <?php 
            $table_check = $conn->query("SHOW TABLES LIKE 'sessions'");
            if ($table_check->num_rows === 0): ?>
            <div class="setup-alert">
                <strong>⚠️ Setup Required:</strong> The sessions table is not set up yet. 
                <a href="setup_trainer_tables.php" style="color: #856404; text-decoration: underline;">
                    Click here to set up your dashboard
                </a>
            </div>
            <?php endif; ?>
            
            <!-- Statistics Cards -->
            <div class="stats-container">
                <div class="stat-card">
                    <div class="stat-number"><?php echo $member_count; ?></div>
                    <div class="stat-label">Total Members</div>
                </div>
                <div class="stat-card">
                    <div class="stat-number"><?php echo $today_sessions; ?></div>
                    <div class="stat-label">Today's Sessions</div>
                </div>
                <div class="stat-card">
                    <div class="stat-number"><?php echo $sessions_result ? $sessions_result->num_rows : 0; ?></div>
                    <div class="stat-label">Upcoming Sessions</div>
                </div>
            </div>
            
            <!-- Upcoming Sessions -->
            <div class="section">
                <h3>📋 Upcoming Sessions</h3>
                <?php if ($sessions_result && $sessions_result->num_rows > 0): ?>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Member</th>
                                <th>Date</th>
                                <th>Time</th>
                                <th>Type</th>
                                <th>Contact</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while($session = $sessions_result->fetch_assoc()): ?>
                            <tr>
                                <td><strong><?php echo htmlspecialchars($session['MemberName']); ?></strong></td>
                                <td><?php echo date('M j, Y', strtotime($session['SessionDate'])); ?></td>
                                <td><?php echo date('g:i A', strtotime($session['SessionTime'])); ?></td>
                                <td><span class="badge badge-info"><?php echo htmlspecialchars($session['SessionType']); ?></span></td>
                                <td><?php echo htmlspecialchars($session['MemberContact']); ?></td>
                            </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                <?php else: ?>
                    <div class="empty-state">
                        <p>No upcoming sessions scheduled.</p>
                        <?php if ($table_check->num_rows === 0): ?>
                            <p><small>Sessions table not set up. <a href="setup_trainer_tables.php">Set up now</a></small></p>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
            </div>
            
            <!-- Recent Members -->
            <div class="section">
                <h3>👥 Your Members</h3>
                <?php if ($recent_members_result->num_rows > 0): ?>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Contact</th>
                                <th>Join Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while($member = $recent_members_result->fetch_assoc()): ?>
                            <tr>
                                <td><strong><?php echo htmlspecialchars($member['Name']); ?></strong></td>
                                <td><?php echo htmlspecialchars($member['Email']); ?></td>
                                <td><?php echo htmlspecialchars($member['Contact']); ?></td>
                                <td><?php echo date('M j, Y', strtotime($member['JoinDate'])); ?></td>
                            </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                <?php else: ?>
                    <div class="empty-state">
                        <p>No members assigned to you yet.</p>
                        <p><small>Contact admin to assign members to your training program.</small></p>
                    </div>
                <?php endif; ?>
            </div>
        </div>
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