<?php
    session_start();
    include('../includes/database.php');

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $conn = getConnection();
        $query = "SELECT * FROM users WHERE email = '" . $email . "' AND is_admin = 1;";
        $result = $conn->query($query);

        if ($result->num_rows === 1) {
            $admin = $result->fetch_assoc();
            $conn->close();
            if (password_verify($password, $admin['password'])) {
                $_SESSION['admin_id'] = $admin['id'];
                header('Location: dashboard.php');
                exit;
            } else {
                $error = "Invalid password";
            }
        } else {
            $error = "Invalid email";
        }
    } else {
        die('Invalid Request Method');
    }
?>