<?php
    include('../includes/database.php');

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $user_id = $_POST['user_id'];
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $password = $_POST['password'];
        $auto_generate_password = isset($_POST['auto_generate_password']) ? 1 : 0;

        // If password is auto-generated, we create a random password
        if ($auto_generate_password) {
            $password = generateRandomPassword();
        }
        $conn = getConnection();
        // If password is not empty, hash the password
        if (!empty($password)) {
            $password_hash = password_hash($password, PASSWORD_DEFAULT);
            $sql_update = "UPDATE users SET first_name = '$first_name', last_name = '$last_name', email = '$email', phone = '$phone', password = '$password_hash' WHERE id = $user_id";
        } else {
            $sql_update = "UPDATE users SET first_name = '$first_name', last_name = '$last_name', email = '$email', phone = '$phone' WHERE id = $user_id";
        }

        if ($conn->query($sql_update) === TRUE) {
            echo "User updated successfully!";
            // Redirect to the admin dashboard or user list page
            header("Location: dashboard.php");
            exit;
        } else {
            echo "Error updating user: " . $conn->error;
        }
    }

    // Function to generate a random password
    function generateRandomPassword($length = 10) {
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789!@#$%^&*()';
        $randomPassword = '';
        for ($i = 0; $i < $length; $i++) {
            $randomPassword .= $characters[rand(0, strlen($characters) - 1)];
        }
        return $randomPassword;
    }
?>