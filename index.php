<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Management Portal</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <?php include('includes/header.php'); ?>

    <div class="container">
        <div class="welcome-message">
            <h2>Welcome to the Task Management Portal</h2>
            <p>Please choose an option to proceed:</p>
            <div class="login-options">
                <a href="user/login.php" class="btn">User Login</a>
                <a href="admin/login.php" class="btn">Admin Login</a>
            </div>
        </div>
    </div>

    <?php include('includes/footer.php'); ?>
</body>
</html>
