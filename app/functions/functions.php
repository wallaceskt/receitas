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

function gerarSlug(string $str) {

    $str = mb_strtolower($str); //Vai converter todas as letras maiúsculas pra minúsculas
    $str = preg_replace('/(â|á|ã)/', 'a', $str);
    $str = preg_replace('/(ê|é)/', 'e', $str);
    $str = preg_replace('/(í|Í)/', 'i', $str);
    $str = preg_replace('/(ú)/', 'u', $str);
    $str = preg_replace('/(ó|ô|õ|Ô)/', 'o',$str);
    $str = preg_replace('/(_|\/|!|\?|#)/', '',$str);
    $str = preg_replace('/( )/', '-',$str);
    $str = preg_replace('/ç/','c',$str);
    $str = preg_replace('/(-[-]{1,})/','-',$str);
    $str = preg_replace('/(,)/','-',$str);
    $str = strtolower($str);

    return $str;
    /*Significa que vai procurar por  qualquer um desses â|á|ã ou as outras 
    letras e, i, o, u e caracteres especiais e vai trocar pela letra normal ou pelo -*/

}