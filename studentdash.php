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
    <link rel="stylesheet" href="style.css"/>
    <style>
        center{
            color:white;
            border: 10px;
            border-radius: 2px solid black;
        }
      a{
        color: white;
        font-size: 20px;
        margin-right:50px;
        padding:10px;
      }
      marquee{
        width: 100%;
   height: 8%;
   color: white;
   position: fixed;
   padding:5px;

      }
      #left_side{
        height: 75%;
        width: 15%;
        top: 25%;
        position:fixed;
        padding : 20px;
        margin :10px;
      }
      td{
        padding: 15px;
      }
      #right_side{
        height: 75%;
        width: 80%;
        background-color:whitesmoke;
        position:fixed;
        left:17%;
        top:21%;
        color: red;
        border: 2px solid black;
      }
      body{
        background-image:url(./Images/bgrs.jpg);
      }
    </style>
    <?php
      session_start();
      $conn= new mysqli("localhost","root","","slms");

    ?>
  </head>
  <body>
  <center><h1>Student Management System </h1><a href="logout.php">Logout</a></center>
   
      
      <marquee> Name:<?php echo $_SESSION['name'];?>&nbsp;&nbsp; Email: <?php echo $_SESSION['email']; ?> </marquee>
      
      <div id="left_side">
<form action="" method="post">
  <table>
    <tr>
      <td>
        <input type="submit" name="show" value="Show Details" id="">
      </td>
    </tr>
    <tr>
      <td>
        <input type="submit" name="edit_details" value="Edit Details" id="">
      </td>
    </tr>
    
  </table>
</form>
    </div>
    <div id="right_side"> <br><br>
    <div id="demo">
        <?php
        if(isset($_POST['show']))
        {
            $query = "SELECT * from student where email = '$_SESSION[email]'";
            $query_run = mysqli_query($conn,$query);
            while($row = mysqli_fetch_assoc($query_run)){
                ?>
                <table>
                    <tr>
                        <td>
                            <b>Student ID:</b>
                        </td>
                        <td>
                            <input type="text" value="<?php echo $row['id'] ?>"disabled>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <b>Name:</b>
                        </td>
                        <td>
                            <input type="text" value="<?php echo $row['name'] ?>"disabled>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <b>Parents Name:</b>
                        </td>
                        <td>
                            <input type="text" value="<?php echo $row['pname'] ?>"disabled>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <b>Class:</b>
                        </td>
                        <td>
                            <input type="text" value="<?php echo $row['class'] ?>"disabled>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <b>Email:</b>
                        </td>
                        <td>
                            <input type="email" value="<?php echo $row['email'] ?>"disabled>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <b>Password:</b>
                        </td>
                        <td>
                            <input type="text" value="<?php echo $row['password'] ?>"disabled>
                        </td>
                    </tr>
                </table>
                <?php 
            }
        }
        ?>
        <?php
        if(isset($_POST['edit_details'])){
            $query = "SELECT * from student where email = '$_SESSION[email]'";
            $query_run = mysqli_query($conn,$query);
            while($row = mysqli_fetch_assoc($query_run)){
                ?>
                <form action="edit_student.php" method="post">
                <table>
                    <tr>
                        <td>
                            <b>Student ID:</b>
                        </td>
                        <td>
                            <input type="text" name="id" value="<?php echo $row['id'] ?>" >
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <b>Name:</b>
                        </td>
                        <td>
                            <input type="text" name="name" value="<?php echo $row['name'] ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <b>Parents Name:</b>
                        </td>
                        <td>
                            <input type="text" name="pname" value="<?php echo $row['pname'] ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <b>Email:</b>
                        </td>
                        <td>
                            <input type="email" name="email" value="<?php echo $row['email'] ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <b>Class:</b>
                        </td>
                        <td>
                            <input type="text" name="class" value="<?php echo $row['class'] ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <b>Password:</b>
                        </td>
                        <td>
                            <input type="text" name="password" value="<?php echo $row['password'] ?>"disabled>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><input type="submit" name="save" value="Save"></td>
                    </tr>
                </table>
                </form>
                <?php
            }
        }
                ?>
    </div>

    </div>
</body>
</html>