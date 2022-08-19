<?php
$conn = new mysqli('localhost','root','','slms');

if ($conn){
    echo "connected";
}
else{
    echo "not connected";
}

?>