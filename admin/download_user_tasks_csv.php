<?php
    include('../includes/database.php');
    include('../includes/common.php');

    $user = get_user($_GET['user_id']);

    $filename = "task_report_for_{$user['first_name']}_{$user['last_name']}.csv";
    header('Content-Type: text/csv');
    header("Content-Disposition: attachment; filename=$filename");

    $output = fopen('php://output', 'w');               

    fputcsv($output, ['Start Time', 'Stop Time', 'Notes', 'Description']);
    
    $tasks = get_user_tasks($_GET['user_id']);

    while ($task = $tasks->fetch_assoc()) {
        fputcsv($output, [$task['start_time'], $task['stop_time'], $task['notes'], $task['description']]);
    }

    fclose($output);
    
    exit; 
    header("Location: view_user_tasks.php?user_id=".$_GET['user_id']);
?>