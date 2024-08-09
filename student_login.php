<?php
include 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $rollNo = $conn->real_escape_string($_POST['rollNo']);
    $password = $conn->real_escape_string($_POST['password']);

    $sql = "SELECT * FROM Student WHERE rollNo='$rollNo' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        header('Location: student_home.php?rollNo='.$rollNo);
    } else {
        echo "Invalid roll number or password";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Student Login</title>
    <style type="text/css">
        body{
            display: flex;
            justify-content: center;
             margin-top: 8%; 
            background-image: url('img5.jpg');
            background-repeat: no-repeat;
            background-size: 100% 150%;
            
        }
        .container{
            border: 5px solid darkgrey;
            height: 60vh;
            width: 60vh;
            text-align: center;
           background-image: url('img6.jpg');
           background-size: cover;
            

        }
        button{
            border-radius: 5px;
            width: 100px;
            height: 40px;
            color: white;
            background-color: navy;
        }
        
    </style>
</head>
<body>
    <div class="container">
        <button style="width: 200px; margin-top: 10px; text-align: center;">
    <h2 style="color: floralwhite; margin: 2px;">STUDENT LOGIN</h2>
</button>
<br><br>
    <form method="POST">
        <label for="rollNo" style="color: white;">Student Roll Number:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="text" id="rollNo" name="rollNo" autocomplete="off" required>
        <br><br>
         <label for="academicYear" style="color: white;">Academic Year:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <select id="academicYear" name="academicYear" required>
            <option value="2022-2025">2021-2024</option>
            <option value="2023-2026">2022-2025</option>
            <option value="2024-2027">2023-2026</option>
        </select><br><br>
        <label for="password" style="color: white;">Password:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="password" id="password" name="password" autocomplete="off" required>
        <br><br><br><br>
        <button type="submit">Login</button>

         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <button type="reset" onclick="window.location.href='student_home.php'">RESET</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <button type="button" onclick="window.location.href='admin_login.php'">EXIT</button>
    </form>
</div>
</body>
</html>