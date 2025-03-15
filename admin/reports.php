<?php
include('../includes/database.php');

header('Content-Type: text/csv');
header('Content-Disposition: attachment;filename=tasks_report.csv');

$output = fopen('php://output', 'w');
fputcsv($output, ['Start Time', 'Stop Time', 'Notes', 'Description']);

$conn = getConnection();
$query = "SELECT start_time, stop_time, notes, description FROM tasks";
$result = $conn->query($query);

while ($row = $result->fetch_assoc()) {
    fputcsv($output, $row);
}
fclose($output);
?>
