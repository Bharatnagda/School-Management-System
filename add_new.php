<?php
  session_start();
  $conn= new mysqli("localhost","root","","slms");
  $query= "INSERT into student values('','$_POST[name]','$_POST[pname]','$_POST[email]','$_POST[class]','$_POST[password]')";
echo $query;
$query_run = mysqli_query($conn,$query);
?>

<script>
    alert("Details have been update successfully");
    window.location.href="admindash.php";
</script>