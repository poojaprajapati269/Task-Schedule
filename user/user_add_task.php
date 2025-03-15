<?php
include('../includes/database.php');
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_id = $_SESSION['user_id'];
    $error = '';

    // Check if 'tasks' is set and loop through each task
    if (isset($_POST['tasks']) && is_array($_POST['tasks'])) {
        foreach ($_POST['tasks'] as $task) {
            // Check if necessary fields are set
            if (!isset($task['start_time'], $task['stop_time'], $task['notes'], $task['description'])) {
                echo 'Missing fields: ';
                print_r($task);  // Debugging line to show which task fields are missing
                exit;  
            }

            // Check if fields are empty
            if (empty($task['start_time']) || empty($task['stop_time']) || empty($task['notes']) || empty($task['description'])) {
                echo 'One or more fields are empty: ';
                print_r($task);  // Debugging line to show which task fields are empty
                exit;  // Exit if any fields are empty
            }

            $start_time = $task['start_time'];
            $stop_time = $task['stop_time'];
            $notes = $task['notes'];
            $description = $task['description'];

            // Validate stop_time is greater than start_time
            if ($stop_time <= $start_time) {
                $error = "Stop time must be greater than start time.";
                break;  // Exit loop on validation failure
            }

            $conn = getConnection();
            // Prepare and execute the SQL query to insert the task into the database
            $query = "INSERT INTO tasks (user_id, start_time, stop_time, notes, description) VALUES (?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("issss", $user_id, $start_time, $stop_time, $notes, $description);
            if (!$stmt->execute()) {
                $error = "Failed to submit some tasks.";
                break;  // Exit loop if database insertion fails
            }
            header('Location: ../user/dashboard.php');
        }

        // If no error occurred, show success and redirect to dashboard
        if (!isset($error)) {
            header('Location: ../user/dashboard.php');
            exit;
        }
    } else {
        $error = "No tasks submitted.";
    }
} else {
    die('Invalid Request Method');
}
?>