<?php
// session_start(); // Ensure session_start() is called
include_once('common.php');

// Get the current page name
$current_page = basename($_SERVER['PHP_SELF']);

// Optionally fetch the user name if logged in
$name = isset($_SESSION['user_id']) ? get_user_name() : null;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <script src="../assets/js/script.js"></script>
</head>
<body>
    <header>
        <div class="header-container">
            <h1 class="logo">Task Management Portal</h1>
            <nav>
                <?php if ($current_page === 'user/login.php'): ?>
                    <!-- Links for User Login page -->
                    <?php if (isset($_SESSION['user_id'])): ?>
                        <span>Welcome, <?= htmlspecialchars($name) ?></span>
                        <a href="../user/dashboard.php">Dashboard</a>
                        <a href="../user/user_logout.php" class="btn">Logout</a>
                    <?php else: ?>
                        <a href="../index.php">Home</a>
                        <a href="../user/login.php" class="btn">Login</a>
                    <?php endif; ?>
                <?php elseif ($current_page === 'admin/login.php'): ?>
                    <!-- Links for Admin Login page -->
                    <?php if (isset($_SESSION['admin_id'])): ?>
                        <a href="../admin/dashboard.php">Dashboard</a>
                        <a href="../admin/admin_logout.php" class="btn">Logout</a>
                    <?php else: ?>
                        <a href="../index.php">Home</a>
                        <a href="../admin/login.php" class="btn">Login</a>
                    <?php endif; ?>
                <?php elseif ($current_page !== 'index.php'): ?>
                    <?php if (isset($_SESSION['admin_id'])): ?>
                        <!-- Admin links -->
                        <a href="../admin/dashboard.php">Dashboard</a>
                        <a href="../admin/admin_logout.php" class="btn">Logout</a>
                    <?php elseif (isset($_SESSION['user_id'])): ?>
                        <!-- User-specific links -->
                        <span>Welcome, <?= htmlspecialchars($name) ?></span>
                        <a href="../user/dashboard.php">Dashboard</a>
                        <a href="../user/submit_task.php">Submit Task</a>
                        <a href="../user/user_logout.php" class="btn">Logout</a>
                    <?php endif; ?>
                <?php else: ?>
                    <!-- Links for index.php (no dashboard or logout) -->
                    <a href="index.php">Home</a>
                    <a href="user/login.php">User Login</a>
                    <a href="admin/login.php">Admin Login</a>
                <?php endif; ?>
            </nav>
        </div>
    </header>
</body>
</html>
