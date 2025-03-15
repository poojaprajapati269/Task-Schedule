<?php
session_start();
include('../includes/database.php');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $conn = getConnection();
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = "SELECT * FROM users WHERE email = '" . $email . "';";
    $result = $conn->query($query);

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];

            // Check if it's the first login or 30 days have passed since the last password change
            $last_password_change = strtotime($user['last_password_change']);
           
            if (!$last_password_change || (time() - $last_password_change) > (30 * 24 * 60 * 60)) {
                // Redirect to user dashboard if it's the first login or 30 days passed
                header('Location: ../user/dashboard.php');
                exit;
            }

            // Update last_login
            $update_query = "UPDATE users SET last_login = NOW() WHERE id = ?";
            $update_stmt = $conn->prepare($update_query);
            $update_stmt->bind_param("i", $user['id']);
            $update_stmt->execute();

            // Redirect to user dashboard after successful login
            header('Location: ../user/dashboard.php');
            exit;
        } else {
            $error = "Invalid password.";
        }
    } else {
        $error = "Invalid email.";
    }
    $conn->close();
    header('Location: ../user/dashboard.php');
}
?>
