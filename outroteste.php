<?php
    include('conexao.php');
    $nomeVeiculo = 'carro normal';
    $descricao = 'mae do renan';
    $ano = 2;
    $preco = 4;
    
if(isset($_FILES['arquivodeimg'], $_POST['enviarform'])){
    $arquivo = $_FILES['arquivodeimg'];
    var_dump($_FILES);
    $arquivo = $_FILES['arquivodeimg'];
    if($arquivo['error']){
        echo "erro:".$arquivo['error'];}
    $pasta = "./upload/arquivos/imagensCarros/";
    $nomeDoArquivo = $arquivo['name'];
    $novoNomeDoArquivo = uniqid();
    $extensao = strtolower(pathinfo($nomeDoArquivo, PATHINFO_EXTENSION));
    if($extensao != "png" && $extensao != "jpg"){
        echo 'apenas png ou jpg';
    }
    $path = $pasta . $novoNomeDoArquivo . "." . $extensao;
    
    $final = move_uploaded_file($arquivo['tmp_name'], $path);
    if($final){
        //PARA EXCLUIR
        $query = mysqli_query($con, "INSERT INTO informacoes (nomeVeiculo, descricao, ano, preco, nomeimg, caminhoimg) VALUES ('$nomeVeiculo','$descricao','$ano','$preco', '$nomeDoArquivo','$path')");
        echo "ARQUIVO ENVIADO COM SUCESSO!";
        /*$query = mysqli_query($con,"INSERT INTO informacoes (nomeimg, caminhoimg) VALUES('$nomeDoArquivo','$path')");*/
    }else{
        echo "falhou";
    };
};