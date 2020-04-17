<?php

function connect(){
    // Set up connection and exception-based error handling
    $conn = new PDO("mysql:host=localhost;dbname=assign218;", "assign218", "iefiexae");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $conn;
}

function popUpError($e){
    echo '<script type="text/javascript">';
    echo 'alert("'.$e.'");';
    echo 'window.location.href="../";';
    echo '</script>';
}