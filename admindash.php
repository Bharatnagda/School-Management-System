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
      body{
        background-image:url(./Images/bgrs.jpg);
      }
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
        <input type="submit" name="search" value="Search Student" id="">
      </td>
    </tr>
    <tr>
      <td>
        <input type="submit" name="edit" value="Edit Student Details" id="">
      </td>
    </tr>
    <tr>
      <td>
        <input type="submit" name="add_new" value="Add Student" id="">
      </td>
    </tr>
    <tr>
      <td>
        <input type="submit" name="delete" value="Delete Student" id="">
      </td>
    </tr>
  </table>
</form>
    </div>
    <div id="right_side"> <br><br>
    <div id="demo">
<!-- to search the data....
     
-->
<?php
if(isset($_POST['search'])){
?>
<center>
  <form action="" method="post">
    Enter Your Email: <input type="email" name="email">
    <input type="submit" name="search_email" value="search">
  </form>
</center>
<?php
}
if(isset($_POST['search_email'])){

  $query= "SELECT * FROM student WHERE email = '$_POST[email]'";
    $query_run = mysqli_query($conn,$query);
    while($row= mysqli_fetch_assoc($query_run)){
      ?>
      <table>
      <tr>
          <td>
            <b> Student ID: &nbsp;&nbsp;</b>
          </td>
          <td><input type="text" value="<?php echo $row['id'];?>"disabled></td>
        </tr>
        <tr>
          <td>
            <b>Name: &nbsp;&nbsp;&nbsp;</b>
          </td>
          <td><input type="text" value="<?php echo $row['name'];?>"disabled></td>
        </tr>
        <tr>
          <td>
            <b>Parents Name: &nbsp;&nbsp;&nbsp;</b>
          </td>
          <td><input type="text" value="<?php echo $row['pname'];?>"disabled></td>
        </tr>
        <tr>
          <td>
            <b>Email Address: &nbsp;&nbsp;&nbsp;</b>
          </td>
          <td><input type="email" value="<?php echo $row['email'];?>"disabled></td>
        </tr>
        <tr>
          <td>
            <b>Class: &nbsp;&nbsp;&nbsp;</b>
          </td>
          <td><input type="text" value="<?php echo $row['class'];?>"disabled></td>
        </tr>
      </table>
      <?php
    }
}
?>
<!-- to update or edit the data....

-->

<?php
if(isset($_POST['edit'])){
?>
<center>
  <form action="" method="post">
    Enter Your Email: <input type="email" name="email">
    <input type="submit" name="edit_email" value="search">
  </form>
</center>
<?php
}
if(isset($_POST['edit_email'])){

  $query= "SELECT * FROM student WHERE email = '$_POST[email]'";
    $query_run = mysqli_query($conn,$query);
    while($row= mysqli_fetch_assoc($query_run)){
      ?>
      <form action="admin_edit_student.php" method="post">
      <table>
      <tr>
          <td>
            <b> Student ID: &nbsp;</b>
          </td>
          <td><input type="text" name="id" value="<?php echo $row['id'];?>"></td>
        </tr>
        <tr>
          <td>
            <b>Name: &nbsp;&nbsp;&nbsp;</b>
          </td>
          <td><input type="text"name="name" value="<?php echo $row['name'];?>"></td>
        </tr>
        <tr>
          <td>
            <b>Parents Name: &nbsp;&nbsp;&nbsp;</b>
          </td>
          <td><input type="text" name="pname" value="<?php echo $row['pname'];?>"></td>
        </tr>
        <tr>
          <td>
            <b>Email Address: &nbsp;&nbsp;&nbsp;</b>
          </td>
          <td><input type="email" name="email" value="<?php echo $row['email'];?>"></td>
        </tr>
        <tr>
          <td>
            <b>Class: &nbsp;&nbsp;&nbsp;</b>
          </td>
          <td><input type="text" name="class" value="<?php echo $row['class'];?>"></td>
        </tr>
        <tr>
          <td></td>
          <td><input type="submit" name="edit" value="save"></td>
        </tr>
      </table>
      </form>
      <?php
    }
}
?>
<!-- to Add new student in the list -->
<?php
if(isset($_POST['add_new'])){
?>
<h3>Please Fill the Required Details</h3>
<form action="add_new.php" method="post">
  <table>
    <tr>
      <td>Name</td>
      <td><input type="text" name="name" Required></td>
    </tr>
    <tr>
      <td>Parents Name</td>
      <td><input type="text" name="pname" Required></td>
    </tr>
    <tr>
      <td>Email</td>
      <td><input type="email" name="email" Required></td>
    </tr>
    <tr>
      <td>Class</td>
      <td><input type="text" name="class" Required></td>
    </tr>
    <tr>
      <td>Password</td>
      <td><input type="password" name="password" Required></td>
    </tr>
    <tr>
      <td></td>
      <td><input type="submit" name="add" value="save"></td>
    </tr>
  </table>
</form>
<?php
}
?>
<!-- to delete the student record -->
<?php
if(isset($_POST['delete'])){
  ?>
 
  <center>
  <h4>Please enter the email to delete the record</h4><br>
    <form action="delete.php" method="post">
        Email:
       <input type="email" name="email">
        <input type="submit" name="delete_student" value="delete student" >
    </center>
  </form>
  <?php
}

?>
    </div>

    </div>
</body>
</html>