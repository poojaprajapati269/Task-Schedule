<?php

    $conn = getConnection();
    $query = "SELECT id, first_name, last_name, email, phone FROM users WHERE is_admin = 0";
    $users = $conn->query($query);
    $conn->close();

    return $users;
?>