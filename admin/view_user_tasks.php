<?php
    include_once('../includes/common.php');
    $user_id = $_GET['user_id'];
    $user = get_user($user_id);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Report for <?= $user['first_name'] . ' ' . $user['last_name'] ?></title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <script src="../assets/js/script.js"></script>
</head>
<body>
    <?php
        include('../includes/header.php');
        $tasks = get_user_tasks($user_id);
    ?>

    <div class="container">
        <h1>Task Report for <?= $user['first_name'] . ' ' . $user['last_name'] ?></h1>

        <a href="dashboard.php" class="btn">Back to Admin Dashboard</a>

        <a href="download_user_tasks_csv.php?user_id=<?= $user_id ?>" class="btn">Download CSV</a>

        <h2>Tasks Submitted</h2>

        <table border="1" cellpadding="10" cellspacing="0">
            <thead>
                <tr>
                    <th>Start Time</th>
                    <th>Stop Time</th>
                    <th>Notes</th>
                    <th>Description</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($task = $tasks->fetch_assoc()): ?>
                    <tr>
                        <td><?= $task['start_time'] ?></td>
                        <td><?= $task['stop_time'] ?></td>
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
