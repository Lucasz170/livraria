<?php
header('Access-Control-Allow-Origin: *');  
header("Access-Control-Allow-Headers: Content-Type");

    //Conexão com o banco de dados
    $con = new PDO("mysql:host=localhost;dbname=livraria;charset=utf8", "root", "");

    //$con = new PDO("mysql:host=mysql.piway.com.br;dbname=bdm004;charset=utf8", "udt890", "1230808sjlkfjsdiweuro");
?>