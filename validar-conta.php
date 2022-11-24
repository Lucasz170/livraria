<?php
    require 'banco.php';
    require 'funcoes.php';

    //Ler o json encapsulado no cabeçalho da requisição
    $dados = file_get_contents('php://input');

    //Transformar os dados recebidos em um objeto
    $objeto = json_decode($dados);
    
    //Montar o comando sql que será executado
    $sql = "select * from cliente where email = :email and senha = :senha";

    //Preparar o comando sql que será executado
    $qry = $con->prepare($sql);

    $senha = md5($objeto->senha);
    
    //Substituir os parâmetros pelos valores
    $qry->bindParam(":email", $objeto->email, PDO::PARAM_STR);
    $qry->bindParam(":senha", $senha, PDO::PARAM_STR);

    //Executar o comando sql
    $qry->execute();

    if ($qry->rowCount() == 0){
        echo "";
    }
    else {
        $registro = $qry->fetch(PDO::FETCH_OBJ);
        echo gerarApiKey($con, $registro->idcliente);
    }

?>