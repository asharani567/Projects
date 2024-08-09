<html>
<head>
<title>Admin Panel</title>
<style>
body {
  font-family: sans-serif;
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100px;
  width: 450px;
  margin-left: 35%;
  margin-top: 20%;
  background-image: url('img3.jpg');
  background-repeat: no-repeat;
  background-size: cover;
  
}

.container {
  display: flex;
  width: 500px;

}
div{

    width: 1000px;
}


.admin-panel {
  background-color: #f2f2f2;
  padding: 20px;
  border-radius: 5px;
   border: 1px solid aqua;

}

.admin-panel h2 {
  text-align: center;
  margin-bottom: 20px;
}

.admin-panel button {
  display: block;
  width: 100%;
  padding: 10px;
  margin-bottom: 10px;
  background-color: #008CBA;
  color: white;
  border: none;
  border-radius: 5px;
  cursor: pointer;
}
</style>
</head>
<body>

<div class="container">

  <div class="admin-panel">
    <h2>Admin Home</h2>
    <button onclick="window.location.href='add_student.php'">Add new student</button><br><br>
    <button onclick="window.location.href='download_details.php'">Download student details</button><br><br>
    <button onclick="window.location.href='admin_login.php'">Exit</button>
  </div>

</div>

</body>
</html>