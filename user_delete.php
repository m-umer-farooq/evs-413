<?php
require_once('db_conn.php');
include('functions.php');

try {
    $sql = "DELETE FROM `users` WHERE `id` = ".$_GET['id'];
    $response = mysqli_query($conn,$sql);
    
    if($response){
        redirect('users_list.php','?message=User Deleted Successfully&type=success');
    }else{
        redirect('users_list.php','?message=Unable to delete user&type=error');
    }

} catch (Exception $e) {
    redirect('users_list.php','?message='.$e->getMessage().'&type=error');
} 
?>