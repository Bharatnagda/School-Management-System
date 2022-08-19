<script type="text/javascript">
    if(confirm("Are you sure you want to delete this record?")){
document.write("<?php
    session_start();
    $conn= new mysqli("localhost","root","","slms");
    $query= "DELETE from student WHERE email = '$_POST[email]'";
  $query_run = mysqli_query($conn,$query);
   ?>");
   window.location.href="admindash.php";
    }
    else{
        window.location.href="admindash.php";
    }
    
</script>

