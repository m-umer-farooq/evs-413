<?php

function redirect($url,$query_str = ''){
    header("Location: ".$url.$query_str);
}

function check_session(){

    if(!isset($_SESSION['user_id']) && empty($_SESSION['user_id'])){
        redirect('index.php','?message=Session Expired&type=error');
    }
}

?>