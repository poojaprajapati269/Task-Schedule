<?php
session_start();

// Check if it's an admin or a regular user
if (isset($_SESSION['admin_id'])) {
    session_destroy();  // Destroy the session for admin
    header('Location: ../admin/login.php');  // Redirect to admin login page
} elseif (isset($_SESSION['user_id'])) {
    session_destroy();  // Destroy the session for user
    header('Location: ../user/login.php');  // Redirect to user login page
} else {
    header('Location: ../index.php');  // Redirect to home if no session
}
exit;
?>
