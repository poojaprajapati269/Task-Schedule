<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <?php
        include('../includes/header.php');
        include('user_get_tasks.php');
    ?>

    <div class="container">
        <h1>User Dashboard</h1>
        <a href="submit_task.php" class="btn">Submit New Task</a>

        <h2>Your Tasks</h2>
        <table border="1" cellpadding="10" cellspacing="0">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Start Time</th>
                    <th>Stop Time</th>
                    <th>Notes</th>
                    <th>Description</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($task = $tasks->fetch_assoc()): ?>
                    <tr>
                        <td><?= $task['id'] ?></td>
                        <td><?= date('d-m-Y H:i:s', strtotime($task['start_time'])) ?></td>
                        <td><?= date('d-m-Y H:i:s', strtotime($task['stop_time'])) ?></td>
                        <td><?= $task['notes'] ?></td>
                        <td><?= $task['description'] ?></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>

    <?php include('../includes/footer.php'); ?>
</body>
</html>
