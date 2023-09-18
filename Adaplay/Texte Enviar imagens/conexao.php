<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "img";

$mysqli = new mysqli($host,$user,$pass,$db);

function formatar_data($data){
    return implode('/', array_reverse(explode('-', $data)));
}

function formatar_telefone($telefone){
    $ddd = substr($telefone,0 ,2);
    $part1 = substr($telefone,2 ,5);
    $part2 = substr($telefone,7);
    return"($ddd) $part1-$part2";
}
?>