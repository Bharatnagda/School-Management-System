<!-- to update or edit the data -->


<?php
  session_start();
  $conn= new mysqli("localhost","root","","slms");
$query= "UPDATE student SET name ='$_POST[name]',pname ='$_POST[pname]',email='$_POST[email]',class ='$_POST[class]' WHERE id='$_POST[id]' ";
$query_run = mysqli_query($conn,$query);
?>

<script>
    alert("Details have been update successfully");
    window.location.href="admindash.php";
</script>