<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="../assets/css/style.css">
    <script src="../assets/js/script.js"></script>
</head>
<body>
<?php 
    include('../includes/header.php');
    $user = get_user($_GET['id']);
?>
<a href="dashboard.php" class="btn">Back to Admin Dashboard</a>

<form method="POST" action="admin_update_user.php">
    <h2>Edit User</h2>

    <label for="first_name">First Name</label>
    <input type="text" name="first_name" id="first_name" value="<?= $user['first_name'] ?>" required>

    <label for="last_name">Last Name</label>
    <input type="text" name="last_name" id="last_name" value="<?= $user['last_name'] ?>" required>

    <label for="email">Email</label>
    <input type="email" name="email" id="email" value="<?= $user['email'] ?>" required>

    <label for="phone">Phone</label>
    <input type="text" name="phone" id="phone" value="<?= $user['phone'] ?>" required>

    <label for="password">Password (leave blank to keep current password)</label>
    <input type="text" name="password" id="password" placeholder="Enter new password">

    <label for="auto_generate_password">
        <input type="checkbox" name="auto_generate_password" id="auto_generate_password" <?= isset($_POST['auto_generate_password']) ? 'checked' : '' ?>>
        Auto-generate password
    </label>
    <input type="hidden" name="user_id" value="<?= $user['id'] ?>">
    <button type="submit" name="submit">Update User</button>
</form>
<?php include('../includes/footer.php'); ?>
</body>
</html>