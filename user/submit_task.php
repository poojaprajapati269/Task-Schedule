

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submit Tasks</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <script>
        let taskIndex = 1; 
        
        function addTaskRow() {
            const container = document.getElementById('task-table-body');
            const newRow = document.createElement('tr');
            newRow.innerHTML = `
                <td><input type="datetime-local" name="tasks[${taskIndex}][start_time]" required></td>
                <td><input type="datetime-local" name="tasks[${taskIndex}][stop_time]" required></td>
                <td><textarea name="tasks[${taskIndex}][notes]" rows="4"></textarea></td>
                <td><textarea name="tasks[${taskIndex}][description]" rows="4"></textarea></td>
                <td><button type="button" onclick="removeTaskRow(this)">Remove</button></td>
            `;
            container.appendChild(newRow);
            taskIndex++;
        }

        // Function to remove a task row
        function removeTaskRow(button) {
            button.closest('tr').remove();
            taskIndex--;
        }

        // Function to validate stop time is greater than start time before submitting the form
        function validateForm() {
            const rows = document.querySelectorAll('#task-table-body tr');
            for (const row of rows) {
                const startTime = new Date(row.querySelector('[name$="[start_time]"]').value);
                const stopTime = new Date(row.querySelector('[name$="[stop_time]"]').value);

                // Check if stop time is greater than start time
                if (stopTime <= startTime) {
                    alert("Stop time must be greater than start time.");
                    return false; 
                }
            }
            return true; 
        }

    </script>
</head>
<body>
    <?php include('../includes/header.php'); ?>

    <div class="container">
        <h1>Submit New Tasks</h1>
        <?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>

        <form action="user_add_task.php" method="POST" onsubmit="return validateForm()">
            <table>
                <thead>
                    <tr>
                        <th>Start Time</th>
                        <th>Stop Time</th>
                        <th>Notes</th>
                        <th>Description</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="task-table-body">
                    <tr>
                        <td><input type="datetime-local" name="tasks[0][start_time]" required></td>
                        <td><input type="datetime-local" name="tasks[0][stop_time]" required></td>
                        <td><textarea name="tasks[0][notes]" rows="4"></textarea></td>
                        <td><textarea name="tasks[0][description]" rows="4"></textarea></td>
                        <!-- <td><button type="button" onclick="removeTaskRow(this)">Remove</button></td> -->
                    </tr>
                </tbody>
            </table>

            <button type="button" onclick="addTaskRow()">Add Another Task</button>
            <button type="submit">Submit Tasks</button>
        </form>

    </div>

    <?php include('../includes/footer.php'); ?>
</body>
</html>
