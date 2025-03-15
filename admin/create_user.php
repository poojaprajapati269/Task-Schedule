<?php
session_start();
include('../includes/database.php');

// Check if the admin is logged in
if (!isset($_SESSION['admin_id'])) {
    header('Location: login.php');
    exit;
}

// Establish a database connection
$conn = getConnection();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'] ?: bin2hex(random_bytes(4)); 
    $hashed_password = password_hash($password, PASSWORD_BCRYPT);

    // Prepare and execute the SQL query
    $query = "INSERT INTO users (first_name, last_name, email, phone, password) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($query);

    if ($stmt) {
        $stmt->bind_param("sssss", $first_name, $last_name, $email, $phone, $hashed_password);

        if ($stmt->execute()) {
            echo "User created successfully. Password: $password";
        } else {
            echo "Error executing query: " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "Error preparing query: " . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="../assets/css/style.css">
    <script src="../assets/js/script.js"></script>
</head>
<body>
<a href="dashboard.php" class="btn">Back to Admin Dashboard</a>
    <form method="POST">
        <h2>Create User</h2>
        <input type="text" name="first_name" placeholder="First Name" required>
        <input type="text" name="last_name" placeholder="Last Name" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="text" name="phone" placeholder="Phone">
        <input type="text" name="password" placeholder="Password (leave blank to auto-generate)">
        <button type="submit">Create User</button>
    </form>
</body>
</html>

