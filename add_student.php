<?php
include 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $rollNo = $_POST['rollNo'];
    $name = $_POST['name'];
    $departmentName = $_POST['departmentName'];
    $academicYear = $_POST['academicYear'];
    $password = $_POST['password'];

    $sql = "INSERT INTO Student (rollNo, studentName, departmentName, academicYear, password)
            VALUES ('$rollNo', '$name', '$departmentName', '$academicYear', '$password')";

    if ($conn->query($sql) === TRUE) {
        echo "New student added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Add New Student</title>
    <style type="text/css">
        .container{
            border: 5px solid blueviolet;
            height: 60vh;
            width: 60vh;
            text-align: center;
            background-image: linear-gradient(to left,blueviolet,violet);
            b

        }
        button{
            border-radius: 5px;
        }
    </style>
</head>
<body style="display: flex;
            justify-content: center; margin-top: 8%; background-image: linear-gradient(to left,purple,blue);">
    <div class="container">
    <h2>Add New Student</h2>
    <form method="POST">
        <label for="rollNo">Student Roll No:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="text" id="rollNo" name="rollNo" autocomplete="off" required><br><br>
        <label for="name"> Student Name:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="text" id="name" name="name" autocomplete="off" required><br><br>
        
        <label for="academicYear">Academic Year:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <select id="academicYear" name="academicYear" required>
            <option value="2022-2025">2021-2024</option>
            <option value="2023-2026">2022-2025</option>
            <option value="2024-2027">2023-2026</option>
        </select><br><br>
        
        <label for="departmentName">Department Name:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <select id="departmentName" name="departmentName" required>
            <option value="ITM">ITM</option>
            <option value="CS">CS</option>
            <option value="BCA">BCA</option>
        </select><br><br>
        <label for="password">Password:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="password" id="password" name="password" required><br>
        <br><br><br><br>
        <button type="submit">ADD STUDENT</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
         <button type="reset" onclick="window.location.href='add_student.php'">RESET</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <button type="button" onclick="window.location.href='admin_home.php'">EXIT</button>
    </form>
</div>
</body>
</html>