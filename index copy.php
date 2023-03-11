<?php
// Create connection
$conn = mysqli_connect('localhost', 'root', '', 'evs_413');
// Check connection

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}else{
    echo "Connection created \n";
}


// DELETE QUERY
/* $sql = "DELETE FROM `users` WHERE id = 4 LIMIT 1";
$result = mysqli_query($conn, $sql);
if($result){
    echo "Record deleted successfully";
}else{
    echo "Unable to delete record";
}  */



/* // UPDATE QUERY
$sql = "UPDATE `users` SET `username` = 'Amir_123',`email` = 'Amir@gmail.com' where id = 4 ";
$result = mysqli_query($conn, $sql);
if($result){
    echo "Record updated successfully";
}else{
    echo "Unable to update record";
}  */


/*
// INSERT QUERY
$sql = "INSERT INTO `users` SET `first_name` = 'Amir',`last_name` = 'Amir',`password` = '1234567',`is_active` = '1' ";
$result = mysqli_query($conn, $sql);
if($result){
    echo "Record added successfully";
}else{
    echo "Unable to add record";
} */



/* 
// FETCH ALL RECORD

$sql = "SELECT * FROM `users` where id = 3";

if($result = mysqli_query($conn, $sql)){
    
    while($row = $result->fetch_object()){
        echo "ID: $row->id First Name: $row->first_name Last Name: $row->last_name \n";
    }

    $result -> free_result();

}else{
    echo "No Record Found \n";
} */




$conn -> close();
?>