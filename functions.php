<?php

function redirect($url,$query_str){
    header("Location: ".$url.$query_str);
}

?>