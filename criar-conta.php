<?php
    //require 'banco.php';
    
    //Ler o json encapsulado no cabeçalho da requisição
    $dados = file_get_contents('php://input');

    //Transformar os dados recebidos em um objeto
    $objeto = json_decode($dados);
    
    //Conexão com o banco de dados
    $con = new PDO("mysql:host=localhost;dbname=livraria;charset=utf8", "root", "");

    //Montar o comando sql que será executado
    $sql = "insert into conta (nome, email, cpf, senha) values (:nome, :email, :cpf, :senha)";

    //Preparar o comando sql que será executado
    $qry = $con->prepare($sql);

    $senha = md5($objeto->senha);
    
    //Substituir os parâmetros pelos valores
    $qry->bindParam(":nome", $objeto->nome, PDO::PARAM_STR);
    $qry->bindParam(":email", $objeto->email, PDO::PARAM_STR);
    $qry->bindParam(":cpf", $objeto->cpf, PDO::PARAM_STR);
    $qry->bindParam(":senha", $senha, PDO::PARAM_STR);

    //Executar o comando sql
    $qry->execute();

    //$idcliente = $con->lastInsertId();

    //echo gerarApiKey($con, $idcliente);
?>