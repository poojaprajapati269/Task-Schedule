<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <script src="../assets/js/script.js"></script>
</head>
<body>
    <?php
        include('../includes/header.php');
        include('admin_get_users_list.php');
    ?>

    <div class="container">
        <h1>Admin Dashboard</h1>
        <!-- <a href="admin_logout.php" class="btn">Logout</a> -->

        <h2>Users</h2>
        <a href="create_user.php" class="btn">Add New User</a>

        <table border="1" cellpadding="10" cellspacing="0">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($user = $users->fetch_assoc()): ?>
                    <tr>
                        <td><?= $user['id'] ?></td>
                        <td><?= $user['first_name'] ?></td>
                        <td><?= $user['last_name'] ?></td>
                        <td><?= $user['email'] ?></td>
                        <td><?= $user['phone'] ?></td>
                        <td>
                            <a href="edit_user.php?id=<?= $user['id'] ?>" class="btn">Edit</a>
                            <a href="delete_user.php?id=<?= $user['id'] ?>" class="btn" onclick="return confirm('Are you sure?')">Delete</a>
                            <a href="view_user_tasks.php?user_id=<?= $user['id'] ?>" class="btn">View Tasks</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>

        <h2>Reports</h2>
        <a href="reports.php" class="btn">Download Tasks Report</a>
    </div>

    <?php include('../includes/footer.php'); ?>
</body>
</html>
