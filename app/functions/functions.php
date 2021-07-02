<?php
function dd($param = []) {
    
    echo "<pre>";
    print_r($param);
    echo "</pre>";
    die();

}

function redirect($url) {

    header('Location: ' . $url);

}

function getCurrentDate($format = 'Y-m-d H:i:s') {

    date_default_timezone_set('America/Sao_Paulo');
    return date($format);

}

function convertDate($date, string $format = 'd/m/Y H:i:s') {

    return date($format, strptime($date));

}