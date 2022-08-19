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
  </head>
  <body>
    <div class="navbar">
      <h2>SCHOOL MANAGEMENT SYSTEM</h2>
      <ul>
        <li><a href="index.php">HOME</a></li>
        <li><a href="#company">BLOGS</a></li>
        <li><a href="#product">ABOUT US</a></li>
      </ul>
    </div>
    
    <div class="main">
    <form action="" method="post">
       <marquee> <h3>Admin Login Page</h3></marquee><br><br>
     Email:<input type="email" name="email" id="email" required><br><br>
     Password:<input type="password" name="password" id="" required><br><br>
     <input type="submit" name="submit" id="">
     </form>
    </div>


  </body>
</html>
<?php
session_start();
if(isset($_POST["submit"])){
    $conn= new mysqli("localhost","root","","slms");
    $query= "SELECT * FROM login WHERE email = '$_POST[email]'";
    $query_run = mysqli_query($conn,$query);
    while($row= mysqli_fetch_assoc($query_run))
    if($row['email']==$_POST['email']){
    if($row['password']==$_POST['password'])
    {
      $_SESSION['email']=$row['email'];
      $_SESSION['name']=$row['name'];
        header("location:admindash.php");
    }
    else{
        echo "email/password maybe wrong";
    }
}
}

?>