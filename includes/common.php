<?php
    session_start();
    require_once('database.php');

    // Check if the user is logged in
    function check_user_login() {
        return isset($_SESSION['user_id']) || isset($_SESSION['admin_id']) ? true : false;
    }

    // user login validation
    function user_login_verify() {
        if(!check_user_login()) {
            header('Location: login.php');
        }
    }

    function get_user_name() {
        user_login_verify();
        $name = "User";
        $user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : $_SESSION['admin_id']; //role

        $conn = getConnection();
        $query = "SELECT * FROM users WHERE id = " . $user_id;
        $user_info = $conn->query($query);

        // Check if the user exists
        if ($user_info->num_rows > 0) {
            $user = $user_info->fetch_assoc();
            $name = $user['first_name'] ." " . $user['last_name'];
        }
        $conn->close();
        return $name;
    }

    function get_user($id) {
        $conn = getConnection();        
        $sql = "SELECT * FROM users WHERE id = $id LIMIT 1";
        $result = $conn->query($sql);
        $conn->close();
        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();
            return $user;
        } else {
            echo "User not found!";
            exit;
        }
    }

    function get_user_tasks($user_id) {
        $conn = getConnection();

        // Fetch tasks submitted by the user
        $query = "SELECT * FROM tasks WHERE user_id = " . $user_id;
        $tasks = $conn->query($query);
        $conn->close();
        return $tasks;
    }
?>