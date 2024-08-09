<?php
include 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Use isset() to avoid undefined index notices
    $rollNo = isset($_POST['rollNo']) ? $_POST['rollNo'] : '';
    $name = isset($_POST['name']) ? $_POST['name'] : '';
    $parentName = isset($_POST['parentName']) ? $_POST['parentName'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $gender = isset($_POST['gender']) ? $_POST['gender'] : '';
    $contactNumber = isset($_POST['contactNumber']) ? $_POST['contactNumber'] : '';
    $departmentName = isset($_POST['departmentName']) ? $_POST['departmentName'] : '';
    $academicYear = isset($_POST['academicYear']) ? $_POST['academicYear'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';
    $dob = isset($_POST['dob']) ? $_POST['dob'] : '';

    // Check if the rollNo already exists
    $checkSql = "SELECT * FROM Student WHERE rollNo=?";
    $stmt = $conn->prepare($checkSql);
    $stmt->bind_param("s", $rollNo);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Update the existing record
        $updateSql = "UPDATE Student SET studentName=?, parentName=?, email=?, gender=?, contactNumber=?, departmentName=?, academicYear=?, password=?, dob=? WHERE rollNo=?";
        $stmt = $conn->prepare($updateSql);
        // Correct the type definition string to "ssssssssss" (10 `s` characters)
        $stmt->bind_param("ssssssssss", $name, $parentName, $email, $gender, $contactNumber, $departmentName, $academicYear, $password, $dob, $rollNo);

        if ($stmt->execute()) {
            echo "Record updated successfully.";
        } else {
            echo "Error: " . $stmt->error;
        }
    } else {
        // Insert a new record
        $insertSql = "INSERT INTO Student (rollNo, studentName, parentName, email, gender, contactNumber, departmentName, academicYear, password, dob) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($insertSql);
        // Correct the type definition string to "ssssssssss" (10 `s` characters)
        $stmt->bind_param("ssssssssss", $rollNo, $name, $parentName, $email, $gender, $contactNumber, $departmentName, $academicYear, $password, $dob);

        if ($stmt->execute()) {
            echo "Record inserted successfully.";
        } else {
            echo "Error: " . $stmt->error;
        }
    }
    $stmt->close();
    $conn->close();
}
?>





<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Student Home</title>
    <style type="text/css">
         body{
            display: flex;
            justify-content: center;
             margin-top: 3%; 
            background-image: url('img8.jpg');
            background-repeat: no-repeat;
            background-size: cover;
            
            
        }
        .container{
            border: 2px solid black;
            height: 85vh;
            width: 90vh;
            text-align: center;
            
         background-color: lightskyblue;

        }
        button{
            border-radius: 5px;
            width: 100px;
            height: 40px;
            color: white;
            background-color: green;
        }
    </style>
</head>
<body>
    <div class="container">
        <button style="width: 200px; margin-top: 10px; text-align: center; background-color: darkblue;">
    <h2 style="color: floralwhite; margin: 2px;">Student Home</h2></button>
    <br><br><br>
    <form method="POST" action="student_home.php">
        <label for="rollNo">Roll Number:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="text" id="rollNo" name="rollNo" autocomplete="off" required>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <label for="name">Student Name:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="text" id="name" name="name" autocomplete="off" required><br><br><br><br>
        
        <label for="parentName">Parent Name:</label>&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="text" id="parentName" name="parentName" autocomplete="off" required>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <label for="contactNumber">Contact Number:</label>&nbsp;&nbsp;&nbsp;
        <input type="text" id="contactNumber" name="contactNumber" autocomplete="off" required><br><br><br><br>
        
        <label for="email">Email:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="email" id="email" name="email" autocomplete="off" required>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <label for="gender">Gender:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="radio" id="male" name="gender" value="M" required>
<label for="male">Male</label>&nbsp;&nbsp;&nbsp;&nbsp;
<input type="radio" id="female" name="gender" value="F" required>
<label for="female">Female</label><br><br><br><br>
        
        <label for="dob">DOB:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="date" id="dob" name="dob" autocomplete="off" required>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <label for="academicYear">Academic Year:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <select id="academicYear" name="academicYear" required>
            <option value="2022-2025">2021-2024</option>
            <option value="2023-2026">2022-2025</option>
            <option value="2024-2027">2023-2026</option>
        </select><br><br><br><br>
        
        <label for="departmentName">Department Name:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <select id="departmentName" name="departmentName" required>
            <option value="ITM">ITM</option>
            <option value="CS">CS</option>
            <option value="BCA">BCA</option>
        </select>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <label for="password">Password:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="password" id="password" name="password" required><br><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <br><br><br>
        <button type="submit">UPDATE</button>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <button type="reset" onclick="window.location.href='student_home.php'">RESET</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <button type="button" onclick="window.location.href='student_login.php'">EXIT</button>
    </form>
</div>
</body>
</html>
