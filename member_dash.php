<?php
session_start();

// Protect page: check if logged in
if (!isset($_SESSION['Email']) || $_SESSION['Role'] !== 'member') {
    header("Location: member_login.php");
    exit();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Member Dashboard | Apex Fitness</title>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<style>
/* CSS Reset and Global Styles */
:root {
    --primary-color: #007bff; /* Deep Blue */
    --accent-color: #00bcd4; /* Cyan/Turquoise for dash */
    --background-dark: #0f1c2c;
    --background-light: #2c3e50;
    --card-bg: rgba(255, 255, 255, 0.05);
    --sidebar-bg: rgba(0, 0, 0, 0.85);
    --text-color: #e0f7fa;
    --glow-shadow: 0 0 15px rgba(0, 255, 255, 0.5), 0 0 10px rgba(0, 123, 255, 0.5);
    --inner-glow: inset 0 0 8px rgba(0, 255, 255, 0.3);
}

body {
    background: linear-gradient(135deg, var(--background-dark), var(--background-light), #1a273b);
    color: var(--text-color);
    font-family: 'Poppins', sans-serif;
    overflow-x: hidden;
    min-height: 100vh;
}

/* Glass Card Mixin */
.glass-card {
    border-radius: 20px;
    background: var(--card-bg);
    backdrop-filter: blur(15px);
    border: 1px solid rgba(255, 255, 255, 0.1);
    box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.37);
    transition: transform 0.3s, box-shadow 0.3s;
}

.glass-card:hover {
    transform: translateY(-3px);
    box-shadow: 0 12px 40px 0 rgba(31, 38, 135, 0.5), var(--glow-shadow);
}

/* Sidebar */
.sidebar {
    position: fixed;
    top: 0; left: 0;
    height: 100vh; width: 260px;
    background: var(--sidebar-bg);
    backdrop-filter: blur(15px);
    padding-top: 40px;
    box-shadow: 6px 0 15px rgba(0, 0, 0, 0.6);
    z-index: 1000;
}
.sidebar h4 {
    text-align: center;
    font-weight: 700;
    color: var(--accent-color);
    margin-bottom: 30px;
    letter-spacing: 1px;
    text-shadow: 0 0 5px rgba(0, 255, 255, 0.5);
}

.sidebar button {
    display: flex;
    align-items: center;
    gap: 10px;
    width: 100%;
    padding: 12px 25px;
    border: none;
    background: transparent;
    color: #b0c4de;
    text-align: left;
    cursor: pointer;
    transition: all 0.3s ease-in-out;
    border-left: 5px solid transparent;
    font-weight: 500;
}
.sidebar button:hover,
.sidebar button.active {
    background: rgba(0, 191, 255, 0.15);
    border-left: 5px solid var(--accent-color);
    color: #fff;
    transform: translateX(5px);
    text-shadow: 0 0 3px rgba(255, 255, 255, 0.5);
}

.sidebar a.text-danger {
    display: block;
    padding: 15px 25px;
    text-decoration: none;
    color: #ff4d4d; /* Brighter red */
    font-weight: 600;
    margin-top: 20px;
    border-top: 1px solid rgba(255, 255, 255, 0.1);
    transition: color 0.3s;
}
.sidebar a.text-danger:hover {
    color: #ff1a1a;
    background: rgba(255, 77, 77, 0.1);
}

/* Navbar */
.navbar-custom {
    margin-left: 260px;
    background: rgba(44, 62, 80, 0.7); /* Darker, more solid nav bar */
    backdrop-filter: blur(10px);
    padding: 20px 40px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    color: var(--text-color);
    position: sticky;
    top: 0;
    z-index: 10;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.4);
}
.navbar-custom h5 {
    margin: 0;
    font-weight: 600;
    color: #fff;
}
.navbar-custom a {
    text-decoration: none;
    color: #ff4d4d;
    font-weight: 600;
    transition: color 0.3s;
}
.navbar-custom a:hover {
    color: #ff1a1a;
}

/* Content */
.content {
    margin-left: 260px;
    padding: 40px;
    min-height: 100vh;
}

/* Cards - Apply Glass Effect */
.card {
    /* Inherits from .glass-card if the element has both classes, or defines a base */
    border-radius: 20px;
    background: var(--card-bg);
    backdrop-filter: blur(15px);
    color: var(--text-color);
    border: none;
    box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.37);
}
.card h3, .card h4 {
    color: var(--accent-color);
    font-weight: 700;
    text-shadow: 0 0 3px rgba(0, 255, 255, 0.3);
}

/* Profile Image */
.profile {
    width: 150px; height: 150px; /* Larger profile pic */
    border-radius: 50%;
    border: 5px solid var(--accent-color);
    object-fit: cover;
    margin-top: 15px;
    box-shadow: var(--glow-shadow);
}
.trainer-img {
    width: 80px; height: 80px;
    border-radius: 50%;
    object-fit: cover;
    border: 3px solid var(--primary-color);
    padding: 5px;
}

/* Forms */
.form-control {
    background: rgba(255, 255, 255, 0.1);
    border: 1px solid rgba(255, 255, 255, 0.2);
    color: var(--text-color);
    transition: all 0.3s;
}
.form-control:focus {
    background: rgba(255, 255, 255, 0.15);
    border-color: var(--accent-color);
    box-shadow: 0 0 0 0.25rem rgba(0, 255, 255, 0.25);
    color: #fff;
}
.btn-primary {
    background-color: var(--primary-color);
    border-color: var(--primary-color);
    transition: all 0.3s;
}
.btn-primary:hover {
    background-color: #0056b3;
    border-color: #0056b3;
}
.btn-success {
    background-color: var(--accent-color);
    border-color: var(--accent-color);
    transition: all 0.3s;
}
.btn-success:hover {
    background-color: #0097a7;
    border-color: #0097a7;
}

/* Table styling for Sessions */
.table-responsive .table {
    --bs-table-bg: transparent;
    --bs-table-color: var(--text-color);
}
.table-responsive .table-dark {
    --bs-table-bg: rgba(0, 0, 0, 0.5);
    --bs-table-border-color: rgba(255, 255, 255, 0.2);
}
.session-row {
    transition: background-color 0.3s;
}
.session-row:hover {
    background-color: rgba(0, 191, 255, 0.1);
}

/* Custom Text Gradient */
.text-gradient {
    background: linear-gradient(45deg, var(--accent-color), var(--primary-color));
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    color: transparent;
}

/* Hidden sections and Animation */
.section {
    display: none;
    padding: 20px;
    animation: fadeIn 0.6s ease-out; /* Slower and smoother */
}
.section.active { display: block; }

@keyframes fadeIn {
    from { opacity: 0; transform: translateY(20px); }
    to { opacity: 1; transform: translateY(0); }
}

/* Footer */
.footer {
    margin-top: 50px;
    padding: 20px;
    text-align: center;
    color: #8899aa;
    font-size: 13px;
    border-top: 1px solid rgba(255, 255, 255, 0.05);
}

/* Specific component tweaks */
#waterCount {
    font-size: 3rem;
    color: var(--accent-color);
    text-shadow: var(--glow-shadow);
}
#bmiResult {
    color: var(--accent-color);
    text-shadow: 0 0 5px rgba(0, 255, 255, 0.3);
}

</style>
</head>

<body>

<div class="sidebar">
    <h4><i class="fas fa-dumbbell"></i> Dashboard </h4>
    <button data-target="home" class="active"><i class="fas fa-home fa-fw"></i> Home</button>
    <button data-target="profile"><i class="fas fa-user-circle fa-fw"></i> Profile</button>
    <button data-target="membership"><i class="fas fa-credit-card fa-fw"></i> Membership</button>
    <button data-target="sessions"><i class="fas fa-calendar-alt fa-fw"></i> Sessions</button>
    <button data-target="trainer"><i class="fas fa-chalkboard-teacher fa-fw"></i> Trainer</button>
    <!-- <button data-target="progress"><i class="fas fa-chart-line fa-fw"></i> Progress</button> -->
    <button data-target="bmi"><i class="fas fa-weight fa-fw"></i> BMI</button>
    <!-- <button data-target="calorie"><i class="fas fa-fire-alt fa-fw"></i> Calorie Tracker</button> -->
    <button data-target="water"><i class="fas fa-tint fa-fw"></i> Water Intake</button>
    <button data-target="quotes"><i class="fas fa-comment-dots fa-fw"></i> Motivation</button>
    <button data-target="notifications"><i class="fas fa-bell fa-fw"></i> Notifications</button>
    <a href="member_logout.php" class="text-danger mt-3"><i class="fas fa-sign-out-alt fa-fw"></i> Logout</a>
</div>

<div class="navbar-custom">
    <h5>Welcome, <?= htmlspecialchars($member['name'] ?? 'Member') ?> 👋</h5>
    <a href="member_logout.php">Logout</a>
</div>

<div class="content">

<div id="home" class="section active">
    <div class="card glass-card p-5 text-center">
        <h2 class="text-gradient mb-3">Welcome to Your Fitness Journey 💪</h2>
        <p class="lead">Stay motivated, smash your goals, and track your daily progress here.</p>
        <div class="my-4">
          <img src="<?= htmlspecialchars($member['profile_pic'] ?? 'https://cdn-icons-png.flaticon.com/512/1946/1946429.png') ?>" class="profile shadow" alt="Profile Picture">
        </div>
    </div>
</div>

<div id="profile" class="section">
    <div class="card glass-card p-4">
        <h3 class="text-gradient"><i class="fas fa-user-circle"></i> Profile Summary</h3><hr class="text-secondary">
        <div class="row">
          <div class="col-lg-6">
            <div class="p-3"> 
                <p><b>Name:</b> <?= htmlspecialchars($member['name'] ?? 'N/A') ?></p>
                <p><b>Email:</b> <?= htmlspecialchars($member['email'] ?? 'N/A') ?></p>
                <p><b>Age:</b> <?= htmlspecialchars($member['age'] ?? 'N/A') ?></p>
                <p><b>Gender:</b> <?= htmlspecialchars($member['gender'] ?? 'N/A') ?></p>
                <p><b>Height:</b> <?= htmlspecialchars($member['height'] ?? 'N/A') ?> cm</p>
                <p><b>Weight:</b> <?= htmlspecialchars($member['weight'] ?? 'N/A') ?> kg</p>
            </div>
          </div>
          <div class="col-lg-6">
            <h5 class="text-secondary mt-3 mt-lg-0">Update Profile Picture</h5>
            <form method="POST" enctype="multipart/form-data" class="mt-2"> 
                <label class="form-label">Select New Image</label><br> 
                <input type="file" name="profile_pic" class="form-control mb-3" accept="image/*"> 
                <button class="btn btn-primary">Upload Photo</button>
            </form> 
          </div>
        </div>
    </div>
</div>

<div id="membership" class="section">
    <h3 class="fw-bold mb-4 text-gradient"><i class="fas fa-credit-card"></i> Membership Plan Status</h3>
    <div class="card glass-card p-4 shadow-lg">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <h4 class="fw-bold mb-1 text-primary"><?= htmlspecialchars($member['membership_plan'] ?? 'Basic') ?></h4>
                <p class="mb-1 text-light"><b>Plan Type:</b> Premium Access</p>
                <p class="mb-1"><b>Expires on:</b> <?= htmlspecialchars($member['membership_expiry'] ?? '2025-12-31') ?></p>
                <?php
                  $days_left = ceil((strtotime($member['membership_expiry'] ?? '2025-12-31') - time()) / (60*60*24));
                  $color = $days_left < 10 ? 'text-danger' : 'text-success';
                  echo "<p class='fw-bold fs-5 {$color}'>⏳ {$days_left} days left</p>";
                ?>
            </div>
            <button class="btn btn-outline-light">Renew Now</button>
        </div>
    </div>
</div>

<div id="sessions" class="section">
    <h3 class="fw-bold mb-4 text-gradient"><i class="fas fa-calendar-alt"></i> Upcoming Sessions</h3>
    <?php if ($sessions->num_rows > 0): /* Assuming $sessions is a PHP result object */?>
    <div class="table-responsive glass-card p-4 shadow-lg">
        <table class="table align-middle table-hover text-center">
            <thead class="table-dark">
                <tr><th>🏋️ Class</th><th>📆 Date</th><th>⏰ Time</th><th>📍 Location</th></tr>
            </thead>
            <tbody>
            <?php while($s = $sessions->fetch_assoc()): /* Looping through sessions */ ?>
                <tr class="session-row">
                    <td><b><?= htmlspecialchars($s['class_name']) ?></b></td>
                    <td><?= $s['class_date'] ?></td>
                    <td><?= $s['class_time'] ?></td>
                    <td>Studio A</td>
                </tr>
            <?php endwhile; ?>
            </tbody>
        </table>
    </div>
    <?php else: ?><p class="text-muted mt-3">No upcoming sessions. Book a class today!</p><?php endif; ?>
</div>

<div id="trainer" class="section">
    <h3 class="fw-bold mb-4 text-gradient"><i class="fas fa-chalkboard-teacher"></i> Your Assigned Trainer</h3>
    <?php if ($trainer): /* Assuming $trainer is a PHP array/object */ ?>
    <div class="card glass-card p-4 shadow-lg">
        <div class="d-flex align-items-center">
            <img src="https://cdn-icons-png.flaticon.com/512/4322/4322995.png" alt="trainer" class="trainer-img me-4 shadow-lg">
            <div>
                <p class="mb-1"><b>Name:</b> <span class="text-primary"><?= htmlspecialchars($trainer['name']) ?></span></p>
                <p class="mb-1"><b>Specialization:</b> <span class="text-light"><?= htmlspecialchars($trainer['specialization']) ?></span></p>
                <p class="mb-1"><b>Contact:</b> <span class="text-light"><?= htmlspecialchars($trainer['phone']) ?></span></p>
                <button class="btn btn-sm btn-outline-primary mt-2">Message Trainer</button>
            </div>
        </div>
    </div>
    <?php else: ?><p class="text-muted mt-3">No trainer assigned yet. Contact management to get started!</p><?php endif; ?>
</div>

<!-- <div id="progress" class="section">
    <h3 class="fw-bold mb-4 text-gradient"><i class="fas fa-chart-line"></i> Fitness Progress Tracker</h3>
    <div class="card glass-card p-4 shadow-lg">
      <p class="text-light">Visual representation of your weight or muscle gain over time.</p>
      <canvas id="progressChart" style="height: 350px;" class="mt-3"></canvas>
    </div>
</div> -->

<div id="bmi" class="section">
    <div class="card glass-card p-4">
        <h3 class="text-gradient"><i class="fas fa-weight"></i> BMI Calculator</h3>
        <p class="text-light">Quickly determine your Body Mass Index.</p>
        <div class="row mt-3 g-3">
            <div class="col-md-6">
                <label class="form-label">Height (cm)</label>
                <input type="number" id="bmiHeight" class="form-control" value="<?= $member['height'] ?? '175' ?>" placeholder="Enter Height in cm">
            </div>
            <div class="col-md-6">
                <label class="form-label">Weight (kg)</label>
                <input type="number" id="bmiWeight" class="form-control" value="<?= $member['weight'] ?? '70' ?>" placeholder="Enter Weight in kg">
            </div>
        </div>
        <button class="btn btn-primary mt-4" onclick="calculateBMI()">Calculate BMI</button>
        <p id="bmiResult" class="mt-4 fs-4 fw-bold"></p>
    </div>
</div>

<!-- <div id="calorie" class="section">
    <div class="card glass-card p-4">
        <h3 class="text-gradient"><i class="fas fa-fire-alt"></i> Daily Calorie Tracker</h3>
        <p class="text-light">Log your consumed calories to stay on target. (Target: 2000 kcal)</p>
        <form method="POST" class="mt-3">
            <div class="input-group">
                <input type="number" name="calories" class="form-control" placeholder="Enter calories consumed today" required>
                <button class="btn btn-success">Update Log</button>
            </div>
        </form>
        <canvas id="calorieChart" style="height: 350px;" class="mt-4"></canvas>
    </div>
</div> -->

<div id="water" class="section">
    <div class="card glass-card p-5 text-center">
        <h3 class="text-gradient mb-3"><i class="fas fa-tint"></i> Water Intake Tracker</h3>
        <p class="lead">Stay hydrated! Aim for 8 glasses a day.</p>
        <h2 id="waterCount" class="my-4">0 / 8 💧</h2>
        <button class="btn btn-success btn-lg mt-2" onclick="addWater()">+ Add Glass of Water</button>
    </div>
</div>

<div id="quotes" class="section" >
    <div class="card glass-card p-5 text-center position-relative">
        <h3 class="text-gradient"><i class="fas fa-comment-dots"></i> Daily Motivation</h3>
        <div class="p-3">
          <p id="quoteText" class="mt-3 fs-4 fst-italic text-light">"Push yourself, because no one else is going to do it for you."</p>
        </div>
        <button id="prevQuote" class="btn btn-outline-primary btn-lg" style="position:absolute; top:50%; left:20px; transform:translateY(-50%); opacity: 0.8;">&lt;</button>
        <button id="nextQuote" class="btn btn-outline-primary btn-lg" style="position:absolute; top:50%; right:20px; transform:translateY(-50%); opacity: 0.8;">&gt;</button>
    </div>
</div>

<div id="notifications" class="section">
    <div class="card glass-card p-4">
        <h3 class="text-gradient"><i class="fas fa-bell"></i> Notifications</h3>
        <ul class="list-group list-group-flush mt-3">
            <li class="list-group-item bg-transparent text-light border-bottom border-light-subtle">Your membership expires in 7 days. **Renew now!**</li>
            <li class="list-group-item bg-transparent text-light border-bottom border-light-subtle">New Yoga Class added every Friday at 6 PM.</li>
            <li class="list-group-item bg-transparent text-light">Great job on your last session! Keep up the good work.</li>
        </ul>
    </div>
</div>

<div class="footer"><p>© <?= date('Y') ?> Apex Fitness Management System | Designed with ❤️</p></div>

</div> <script>
    // --- Dashboard Navigation Logic ---
    document.addEventListener('DOMContentLoaded', () => {
        const buttons = document.querySelectorAll('.sidebar button[data-target]');
        const sections = document.querySelectorAll('.content .section');

        buttons.forEach(button => {
            button.addEventListener('click', function() {
                buttons.forEach(btn => btn.classList.remove('active'));
                sections.forEach(sec => sec.classList.remove('active'));

                this.classList.add('active');
                const targetId = this.getAttribute('data-target');
                document.getElementById(targetId).classList.add('active');

                // FIX: Destroy old chart instances and re-render only when the section is active
                if (targetId === 'progress') { initProgressChart(); } else if (progressChartInstance) { progressChartInstance.destroy(); progressChartInstance = null; }
                if (targetId === 'calorie') { initCalorieChart(); } else if (calorieChartInstance) { calorieChartInstance.destroy(); calorieChartInstance = null; }
            });
        });
        
        // --- Feature JS ---

        // 1. BMI Calculator (Logic Unchanged)
        window.calculateBMI = function() {
            const heightCm = parseFloat(document.getElementById('bmiHeight').value);
            const weightKg = parseFloat(document.getElementById('bmiWeight').value);
            const resultElement = document.getElementById('bmiResult');

            if (isNaN(heightCm) || isNaN(weightKg) || heightCm <= 0 || weightKg <= 0) {
                resultElement.innerHTML = "Please enter valid Height and Weight.";
                resultElement.style.color = '#ff4d4d';
                return;
            }

            const heightM = heightCm / 100;
            const bmi = (weightKg / (heightM * heightM)).toFixed(2);
            let category = '';
            let color = '';

            if (bmi < 18.5) {
                category = 'Underweight'; color = '#ffc107'; // Yellow
            } else if (bmi >= 18.5 && bmi < 24.9) {
                category = 'Normal weight'; color = '#28a745'; // Green
            } else if (bmi >= 25 && bmi < 29.9) {
                category = 'Overweight'; color = '#fd7e14'; // Orange
            } else {
                category = 'Obesity'; color = '#dc3545'; // Red
            }

            resultElement.innerHTML = `Your BMI is: ${bmi} (${category})`;
            resultElement.style.color = color;
        }

        // 2. Water Intake Tracker (Logic Unchanged)
        let waterCount = 0;
        const maxWater = 8;
        window.addWater = function() {
            if (waterCount < maxWater) {
                waterCount++;
                updateWaterDisplay();
            }
        }
        function updateWaterDisplay() {
            const waterDisplay = document.getElementById('waterCount');
            waterDisplay.textContent = `${waterCount} / ${maxWater} 💧`;
            if (waterCount >= maxWater) {
                waterDisplay.classList.remove('text-info');
                waterDisplay.classList.add('text-success');
            } else {
                waterDisplay.classList.remove('text-success');
                waterDisplay.classList.add('text-info');
            }
        }
        
        // 3. Motivational Quotes (Logic Unchanged)
        const quotes = [
            "The body achieves what the mind believes.",
            "Today's actions are tomorrow's results.",
            "Strive for progress, not perfection.",
            "No pain, no gain. (Except when injured!)",
            "Discipline is the bridge between goals and accomplishment.",
            "Don't limit your challenges. Challenge your limits."
        ];
        let currentQuoteIndex = 0;
        const quoteTextElement = document.getElementById('quoteText');
        
        function updateQuote() {
            quoteTextElement.textContent = quotes[currentQuoteIndex];
        }

        document.getElementById('nextQuote').addEventListener('click', () => {
            currentQuoteIndex = (currentQuoteIndex + 1) % quotes.length;
            updateQuote();
        });
        
        document.getElementById('prevQuote').addEventListener('click', () => {
            currentQuoteIndex = (currentQuoteIndex - 1 + quotes.length) % quotes.length;
            updateQuote();
        });
        
        // Initial quote load
        updateQuote();

       /*  // 4. Chart.js (Progress Chart Fix)
        let progressChartInstance = null;
        function initProgressChart() {
            const ctx = document.getElementById('progressChart').getContext('2d');
            if (progressChartInstance) { progressChartInstance.destroy(); }
            
            progressChartInstance = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: ['Month 1', 'Month 2', 'Month 3', 'Month 4', 'Month 5', 'Month 6'],
                    datasets: [{
                        label: 'Weight (kg)',
                        data: [75, 74, 73, 72, 71.5, 71],
                        borderColor: 'rgba(0, 188, 212, 1)', // Accent Color
                        backgroundColor: 'rgba(0, 188, 212, 0.2)',
                        pointBackgroundColor: 'rgba(0, 188, 212, 1)',
                        pointBorderColor: '#fff',
                        tension: 0.4, // Smoother line
                        fill: true
                    },
                    {
                        label: 'Muscle Mass (%)',
                        data: [35, 36, 37, 37.5, 38, 38.5],
                        borderColor: 'rgba(0, 123, 255, 1)', // Primary Color
                        backgroundColor: 'rgba(0, 123, 255, 0.2)',
                        pointBackgroundColor: 'rgba(0, 123, 255, 1)',
                        pointBorderColor: '#fff',
                        tension: 0.4,
                        fill: false
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        y: {
                            beginAtZero: false,
                            grid: { color: 'rgba(255, 255, 255, 0.1)' },
                            ticks: { color: '#e0f7fa' }
                        },
                        x: {
                            grid: { display: false },
                            ticks: { color: '#e0f7fa' }
                        }
                    },
                    plugins: {
                        legend: { labels: { color: '#fff' } },
                        title: { display: true, text: '6-Month Fitness Trend', color: '#fff' }
                    }
                }
            });
        }
        
        // 5. Chart.js (Calorie Chart Fix)
        let calorieChartInstance = null;
        function initCalorieChart() {
            const ctx = document.getElementById('calorieChart').getContext('2d');
            if (calorieChartInstance) { calorieChartInstance.destroy(); }
            
            calorieChartInstance = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
                    datasets: [{
                        label: 'Calories Consumed (kcal)',
                        data: [2200, 1850, 2100, 2500, 1900, 2450, 2050],
                        backgroundColor: (context) => {
                            const value = context.dataset.data[context.dataIndex];
                            return value > 2200 ? 'rgba(255, 99, 132, 0.8)' : 'rgba(0, 188, 212, 0.8)'; // Red if over 2200, else Cyan
                        },
                        borderColor: '#fff',
                        borderWidth: 1
                    },
                    {
                        type: 'line',
                        label: 'Target (2000 kcal)',
                        data: [2000, 2000, 2000, 2000, 2000, 2000, 2000],
                        borderColor: 'rgba(255, 255, 255, 0.5)',
                        borderDash: [5, 5],
                        pointRadius: 0,
                        fill: false,
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        y: {
                            beginAtZero: true,
                            max: 3000, // Set a fixed max for better comparison
                            grid: { color: 'rgba(255, 255, 255, 0.1)' },
                            ticks: { color: '#e0f7fa' }
                        },
                        x: {
                            grid: { display: false },
                            ticks: { color: '#e0f7fa' }
                        }
                    },
                    plugins: {
                        legend: { labels: { color: '#fff' } },
                        title: { display: true, text: 'Weekly Calorie Intake vs. Target', color: '#fff' }
                    }
                }
            });
        }
        
        // Initial chart setup (only for active sections on load)
        if (document.getElementById('progress').classList.contains('active')) { initProgressChart(); }
        if (document.getElementById('calorie').classList.contains('active')) { initCalorieChart(); } */

    });
</script>
</body>
</html>