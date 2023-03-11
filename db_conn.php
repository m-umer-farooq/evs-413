<?php
// Create connection
$conn = mysqli_connect('localhost', 'root', '', 'evs_413');
// Check connection

if (!$conn) {
    //die("Connection failed: " . mysqli_connect_error());
}else{
    //echo "Connection created \n";
}
?>