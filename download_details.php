<?php
include 'db_connection.php';

header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="student_details.csv"');

$output = fopen('php://output', 'w');
fputcsv($output, array('Roll No', 'Student Name', 'Parent Name', 'Email', 'Gender', 'Contact Number', 'Department Name', 'Academic Year', 'Password'));

$query = "SELECT * FROM Student";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        fputcsv($output, $row);
    }
}

fclose($output);
exit;
?>