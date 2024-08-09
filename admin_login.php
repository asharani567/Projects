<?php
include 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM Admin WHERE username='$username' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        header('Location: admin_home.php');
    } else {
        echo "Invalid username or password";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Admin Login</title>
    <style type="text/css">
        
        .container{
            font-family: Arial;
            border: 2px solid blue;
            margin-top: 10%;
            margin-left: 33%;
            width: 60vh;
            height: 50vh;
           background-color: powderblue;
            border-radius: 1px;
        }
        button {
  padding: 10px 20px;
  background-color: #008CBA;
  color: white;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  border: 1px solid navajowhite;
  width: 150px;

}
input{
    border: 2px solid black;
}
        h2{

            text-align: center;
            border: 2px solid black;
           background-color: floralwhite;
            margin: 20px;
            border-radius: 10px;
        }
        form{
             text-align: center;
        }
    </style>
</head>
<body bgcolor="#228cdc">
    <div class="container">
    <h2 style="background-color: papayawhip;">Admin Login</h2>
    <br><br>
    <form method="POST">
        <label for="username">Admin User ID:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="text" id="username" name="username" autocomplete="off" required><br><br>
        <label for="password">Admin Password:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="password" id="password" name="password" required><br><br>
        <br><br><br>
        <button type="submit">Admin Login</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <button type="button" onclick="thankYou()">Exit</button>
    </form>

    <script>
        function thankYou() {
            alert("Thank you!");
            window.location.href = 'http://localhost/LITPROJECT/';
        }
    </script>
</div>
</body>
</html>