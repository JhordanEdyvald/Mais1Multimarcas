<?php
include 'conexao.php';
if(isset($_FILES['arquivodeimg'], $_POST['enviarform'])){
    echo "<script>
            setTimeout(() => {
                window.location.href = window.location.href; 
            }, 3);
        </script>";
}
if(isset($_FILES['arquivodeimg'], $_POST['enviarform'])){
    $arquivo = $_FILES['arquivodeimg'];
    $nomeVeiculo = $_POST['carro'];
    $descricao = $_POST['descricao'];
    $ano = $_POST['ano'];
    $link = $_POST['linksaibamais'];
    $preco = $_POST['preco'];
    $precoTernario = ($preco == '') ? 0 : $preco ;
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
        $query = mysqli_query($con, "INSERT INTO informacoes (nomeVeiculo, descricao, ano, preco, nomeimg, caminhoimg, linkfotos) VALUES ('$nomeVeiculo','$descricao','$ano','$precoTernario', '$nomeDoArquivo','$path','$link')");
        echo "ARQUIVO ENVIADO COM SUCESSO!";
    }else{
        echo "falhou";
    };
};

