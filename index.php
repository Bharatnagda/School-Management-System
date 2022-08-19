<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    
    <!-- CSS only -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx"
      crossorigin="anonymous"
    />
    <title>Student Management</title>
    <link rel="stylesheet" href="style.css" />
    <style> -->
      center{
            color:white;
            border: 5px;
            border-radius: 2px solid black;
        }
      body{
        background-image:url(./Images/bgrs.jpg);
      }
    </style>
  </head>
  <body>
  <h1>Student Management System </h1>
<marquee<h3>Welcome to University</h3></marquee>
</center>
    <form action="" method="post">
    <div class="main">
      <img src="./Images/admin.png" alt="">
       <input type="submit" name="admin" value="admin">

      <img src="./Images/student.png" alt="">
      <input type="submit" name="student" value="student">

    </div>
  </form>

  </body>
</html>
<?php
if(isset($_POST['admin'])){
  header("location:admin.php");
}
if(isset($_POST['student'])){
  header("location:student.php");
}


?>