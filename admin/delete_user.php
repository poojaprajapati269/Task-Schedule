<?php
include('../includes/database.php');

// Check if the user ID is provided in the URL
if (isset($_GET['id'])) {
    $user_id = $_GET['id'];

    $sql_delete = "DELETE FROM users WHERE id = $user_id";

    if ($conn->query($sql_delete) === TRUE) {
        echo "User deleted successfully!";
        header("Location: dashboard.php");
        exit;
    } else {
        echo "Error deleting user: " . $conn->error;
    }
} else {
    echo "No user ID provided!";
    exit;
}
?>
