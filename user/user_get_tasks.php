<?php
    include_once('../includes/common.php');
    
    user_login_verify();
    $conn = getConnection();
    $user_id = isset($_GET['id']) ? $GET['id'] : $_SESSION['user_id'];

    // Fetch tasks submitted by the user
    $query = "SELECT * FROM tasks WHERE user_id = " . $user_id;
    $tasks = $conn->query($query);
    $conn->close();
    return $tasks;
?>