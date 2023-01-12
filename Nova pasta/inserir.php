<?php
include 'conexao.php';
if(isset($_FILES['arquivodeimg1'], $_POST['enviarform'])){
    //ESQUEMA DE UPLOAD DE FOTOS --- INICIO

    //ESQUEMA DE CRIAÇÃO DE PASTA

    $nomePastaCarro = $_POST['carro']."-".$_POST['ano'];
    mkdir("./upload/". $nomePastaCarro ,1234,);
    
    //PRIMEIRA IMAGEM --- INICIO
    $arquivo = $_FILES['arquivodeimg1'];
    $pasta = "./upload/" . $nomePastaCarro;
    $nomeDoArquivo = $arquivo['name'];
    $novoNomeDoArquivo = uniqid();
    $extensao = strtolower(pathinfo($nomeDoArquivo, PATHINFO_EXTENSION));
    if($extensao != "png" && $extensao != "jpg"){
        echo 'apenas png ou jpg';
    }
    $path = $pasta . "/principal" . $novoNomeDoArquivo . "." . $extensao;
    
    $final = move_uploaded_file($arquivo['tmp_name'], $path);
    //PRIMEIRA IMAGEM --- FIM
      
    //ESQUEMA DE UPLOAD DE FOTOS --- FIM
    $nomeVeiculo = $_POST['carro'];
    $descricao = $_POST['descricao'];
    $ano = $_POST['ano'];
    $link = ($_POST['linksaibamais']=='')?'https://wa.me/5511974751366':$_POST['linksaibamais'];
    $preco = $_POST['preco'];
    $precoTernario = ($preco == '') ? 0 : $preco ;
    if($arquivo['error']){
        echo "erro:".$arquivo['error'];}
    if($final){
        $query = mysqli_query($con, "INSERT INTO informacoes (nomeVeiculo, descricao, ano, preco, nomeimg, caminhoimg, linkfotos) VALUES ('$nomeVeiculo','$descricao','$ano','$precoTernario', '$nomeDoArquivo','$path','$link')");
        
        //UPLOAD DE IMGAENS INICIO
                
                    //SEGUNDA IMAGEM --- INICIO
            if(isset($_FILES['arquivodeimg2'])){
                $arquivoSegundo = $_FILES['arquivodeimg2'];
                $pastaSegundo = "./upload/" . $nomePastaCarro;
                $nomeDoArquivoSegundo = $arquivoSegundo['name'];
                $novoNomeDoArquivoSegundo = uniqid();
                $extensaoSegundo = strtolower(pathinfo($nomeDoArquivoSegundo, PATHINFO_EXTENSION));
                if($extensaoSegundo != "png" && $extensaoSegundo != "jpg"){
                    echo 'apenas png ou jpg';
                }
                $pathSegundo = $pastaSegundo . "/" . $novoNomeDoArquivoSegundo . "." . $extensaoSegundo;
                
                move_uploaded_file($arquivoSegundo['tmp_name'], $pathSegundo);
            }
            //SEGUNDA IMAGEM --- FIM
            
            //TERCEIRA IMAGEM --- INICIO
            if(isset($_FILES['arquivodeimg3'])){
                $arquivoTerceiro = $_FILES['arquivodeimg3'];
                $pastaTerceiro = "./upload/" . $nomePastaCarro;
                $nomeDoArquivoTerceiro = $arquivoTerceiro['name'];
                $novoNomeDoArquivoTerceiro = uniqid();
                $extensaoTerceiro = strtolower(pathinfo($nomeDoArquivoTerceiro, PATHINFO_EXTENSION));
                if($extensaoTerceiro != "png" && $extensaoTerceiro != "jpg"){
                    echo 'apenas png ou jpg';
                }
                $pathTerceiro = $pastaTerceiro . "/" . $novoNomeDoArquivoTerceiro . "." . $extensaoTerceiro;
                
                move_uploaded_file($arquivoTerceiro['tmp_name'], $pathTerceiro);
            }
            //TERCEIRA IMAGEM --- FIM
            
            //QUARTA IMAGEM --- INICIO
            if(isset($_FILES['arquivodeimg4'])){
                $arquivoQuarto = $_FILES['arquivodeimg4'];
                $pastaQuarto = "./upload/" . $nomePastaCarro;
                $nomeDoArquivoQuarto = $arquivoQuarto['name'];
                $novoNomeDoArquivoQuarto = uniqid();
                $extensaoQuarto = strtolower(pathinfo($nomeDoArquivoQuarto, PATHINFO_EXTENSION));
                if($extensaoQuarto != "png" && $extensaoQuarto != "jpg"){
                    echo 'apenas png ou jpg';
                }
                $pathQuarto = $pastaQuarto . "/" . $novoNomeDoArquivoQuarto . "." . $extensaoQuarto;
                
                move_uploaded_file($arquivoQuarto['tmp_name'], $pathQuarto);
            }
            //QUARTA IMAGEM --- FIM
            
            //QUINTA IMAGEM --- INICIO
            if(isset($_FILES['arquivodeimg5'])){
                $arquivoQuinto = $_FILES['arquivodeimg5'];
                $pastaQuinto = "./upload/" . $nomePastaCarro;
                $nomeDoArquivoQuinto = $arquivoQuinto['name'];
                $novoNomeDoArquivoQuinto = uniqid();
                $extensaoQuinto = strtolower(pathinfo($nomeDoArquivoQuinto, PATHINFO_EXTENSION));
                if($extensaoQuinto != "png" && $extensaoQuinto != "jpg"){
                    echo 'apenas png ou jpg';
                }
                $pathQuinto = $pastaQuinto . "/" . $novoNomeDoArquivoQuinto . "." . $extensaoQuinto;
                
                move_uploaded_file($arquivoQuinto['tmp_name'], $pathQuinto);
            }
            //QUINTA IMAGEM --- FIM
            
            //SEXTA IMAGEM --- INICIO
            if(isset($_FILES['arquivodeimg6'])){
                $arquivoSexto = $_FILES['arquivodeimg6'];
                $pastaSexto = "./upload/" . $nomePastaCarro;
                $nomeDoArquivoSexto = $arquivoSexto['name'];
                $novoNomeDoArquivoSexto = uniqid();
                $extensaoSexto = strtolower(pathinfo($nomeDoArquivoSexto, PATHINFO_EXTENSION));
                if($extensaoSexto != "png" && $extensaoSexto != "jpg"){
                    echo 'apenas png ou jpg';
                }
                $pathSexto = $pastaSexto . "/" . $novoNomeDoArquivoSexto . "." . $extensaoSexto;
                
                move_uploaded_file($arquivoSexto['tmp_name'], $pathSexto);
            }
            //SEXTA IMAGEM --- FIM

        //UPLOAD DE IMGAENS FIM


        echo "<script>
            window.alert('deu certo! Carro criado');
            setTimeout(() => {
                window.location.href = window.location.href; 
            }, 3);
        </script>";
    }else{
        rmdir("./upload/". $nomePastaCarro);
        echo "<script>
        window.alert('FALHA NO PROCESSO!');
        setTimeout(() => {
            window.location.href = window.location.href; 
        }, 3);
        </script>";
    };
};

