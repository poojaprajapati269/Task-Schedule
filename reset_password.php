<?php
session_start();
include('includes/database.php');

if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];

    // Check if the user is logged in
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $new_password = $_POST['new_password'];
        $confirm_password = $_POST['confirm_password'];

        // Validate new password and confirmation
        if ($new_password === $confirm_password) {
            $hashed_password = password_hash($new_password, PASSWORD_BCRYPT);

            // Update the password in the database
            $sql = "UPDATE users SET password = ?, last_password_change = NOW() WHERE id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("si", $hashed_password, $user_id);

            if ($stmt->execute()) {
                echo "<p>Password successfully updated. You can now <a href='user/login.php'>login</a> with your new password.</p>";
            } else {
                echo "<p>Error updating password. Please try again.</p>";
            }
        } else {
            echo "<p>Passwords do not match. Please try again.</p>";
        }
    }
} else {
    header("Location: user/login.php"); // Redirect if the user is not logged in
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <?php include('includes/header.php'); ?>

    <div class="container">
        <div class="reset-password-form">
            <h2>Reset Your Password</h2>
            <form action="reset_password.php" method="POST">
                <label for="new_password">New Password:</label>
                <input type="password" name="new_password" id="new_password" required>
                <label for="confirm_password">Confirm Password:</label>
                <input type="password" name="confirm_password" id="confirm_password" required>
                <button type="submit" class="btn">Reset Password</button>
            </form>
        </div>
    </div>

    <?php include('includes/footer.php'); ?>
</body>
</html>
