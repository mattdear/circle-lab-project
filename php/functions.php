<?php

function popUpError($e){
    echo '<script type="text/javascript">';
    echo 'alert("'.$e.'");';
    echo 'window.location.href="../";';
    echo '</script>';
}