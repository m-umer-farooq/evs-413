<?php
    include('session.php');
    include('functions.php');
    session_destroy();
    redirect('index.php','?message=Logout Successful&type=success');
?>