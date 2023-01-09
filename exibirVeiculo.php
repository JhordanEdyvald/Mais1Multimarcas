<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VEICULOS | MAIS1</title>
    <link rel="stylesheet" href="./inicio.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="carros.css">
    <link rel="stylesheet" href="./exibir-veiculo.css">
</head>
<body>
    <nav class="navbar-menu tela-nav">
        <a href="./" class="logo-menu">
            <img src="imagens/logo.webp" alt="">
        </a>
        <div class="botoes-navbar">
            <ul>
                <li class="itens-menu">
                    <a href="./index.html">INICIO</a>
                </li>
                <li class="itens-menu">
                    <a href="./carros%20estoque.php">ESTOQUE</a>
                </li>
                <li class="itens-menu">
                    <a href="./index.html#endereco">ENDEREÇO</a>
                </li>
                <li class="itens-menu">
                    <a href="./index.html#contatos">CONTATOS</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="voltar-btn-container">
        <a href="./carros%20estoque.php" class="voltar-selecao-carros-link">
            <img src="./imagens/voltar-icon.png" alt="">
        </a>
        <h1 class="etiqueta-voltar">VOLTAR PARA A SELEÇÃO<br>DE VEÍCULOS</h1>
    </div>
    <div class="informacoes-carros-container">
        <div class="imagens-container">
            <div class="imagem-principal">
                <img src="<?php
                    include('./conexao.php');
                    $id = $_GET['id'];
                    $pastaQuery = mysqli_query($con,' SELECT caminhoImg FROM informacoes WHERE id = "'.$id.'"');
                    $pasta = mysqli_fetch_assoc($pastaQuery)['caminhoImg'];
                    echo $pasta;
                ?>" id="square-show-img" alt="">
            </div>
            <div class="imagens-secundarias-container">
                <?php
                    $pastaQuery = mysqli_query($con,' SELECT caminhoImg FROM informacoes WHERE id = "'.$id.'"');
                    $pastaCarro = mysqli_fetch_assoc($pastaQuery)['caminhoImg'];
                    $pasta = './upload/'. explode("/",$pastaCarro)[2].'/';
                    $pastaArray = scandir($pasta);
                    echo '<img src="'.$pastaCarro.'" class="imagem-select-item elemento-selecionado" id="icon-img-1">';
                    $ArrayExtracao = [explode("/",$pastaCarro)[3]];
                    foreach($pastaArray as $index => $file){
                        $tratamentoPrincipal = substr($file,0,9);
                        if($file != '.' && $file != '..' && $tratamentoPrincipal != 'principal'){
                            array_push($ArrayExtracao,$file);
                            $calculo = $index - 1;
                            echo '<img src="'.$pasta.$file.'" class="imagem-select-item" id="icon-img-'.$calculo.'">';
                        }
                    }
                    $contaFiles = count($pastaArray) - 2;
                    if($contaFiles < 6){
                        for($i = $contaFiles ; $i < 6 ; $i++){
                            echo '<img src="./imagens/sem-img-tamanho-ver-carro.png" class="semimagemselecao" >';
                        }
                    }
                ?>
            </div>
        </div>
        <div class="informacoes-veiculos-container">
            <div class="info-container">
                <div class="titulo-veiculo-exibir">
                    <?php
                        $carroQuery = mysqli_query($con,'SELECT nomeVeiculo FROM informacoes WHERE id = "'.$id.'"');
                        $carro = mysqli_fetch_assoc($carroQuery)['nomeVeiculo'];
                        $anoQuery = mysqli_query($con,'SELECT ano FROM informacoes WHERE id = "'.$id.'"');
                        $ano = mysqli_fetch_assoc($anoQuery)['ano'];
                        echo $carro.' '.$ano.' (SUPER NOVO)' ;
                    ?>
                </div>
                <div class="preco-veiculo-exibir">
                <?php
                        $precoQuery = mysqli_query($con,'SELECT preco FROM informacoes WHERE id = "'.$id.'"');
                        $preco = mysqli_fetch_assoc($precoQuery)['preco'];
                        if($preco != 0){
                            echo $preco;
                        }
                    ?>
                </div>
                <div class="descricao-veiculo-exibir">
                    <?php
                        $descricaoQuery = mysqli_query($con,'SELECT descricao FROM informacoes WHERE id = "'.$id.'"');
                        $descricao = mysqli_fetch_assoc($descricaoQuery)['descricao'];
                        $tratamentoDescricao = str_replace(';','<br>',$descricao);
                        echo $tratamentoDescricao;
                    ?>
                </div>
                <div class="cta-btn-container">
                    <div class="saiba-mais">
                            SAIBA MAIS! <?php
                            $linkQuery = mysqli_query($con,'SELECT linkfotos FROM informacoes WHERE id = "'.$id.'"');
                            $link = mysqli_fetch_assoc($linkQuery)['linkfotos'];
                            
                            if($link == ''){
                                echo '<script>
                                document.querySelector(".saiba-mais").addEventListener("click",()=>{
                                    window.location.href = "https://wa.me/5511974751366";
                                });
                                </script>';
                            }else{
                                echo '<script>
                                document.querySelector(".saiba-mais").addEventListener("click",()=>{
                                    window.location.href = "'.$link.'";
                                });
                                </script>';
                            }
                            if($link == ''){
                                echo ' <a class="wpp-btn"></a>';
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="Carros-exibir-container">
        <div class="botao-esquerdo-exibir"></div>
        <div class="Carros-exibir-cards-container">
            <div class="cards-container" style="left:-50px;">
                <?php
                    $carrosArray = mysqli_query($con,'SELECT * FROM informacoes');
                    while($veiculo = $carrosArray->fetch_array()){
                        $IdCarro = $veiculo['id'];
                        $NomeCarro = $veiculo['nomeVeiculo'];
                        $img = $veiculo['caminhoimg'];
                        $AnoCarro = $veiculo['ano'];
                        $PrecoCarro = $veiculo['preco'];
                        $DescricaoCarro = $veiculo['descricao'];

                        echo "<div class='card veiculosExibirOrdem'>
                            <img src='$img' class='card-img-top' alt='...'>
                            <div class='card-body'>
                                <h5 class='card-title'>".$AnoCarro." - ".$NomeCarro."</h5>
                                <p class='card-text'>".str_replace(';', '<br>', $DescricaoCarro)."</p>
                                <a href='./exibirVeiculo.php?id=".$IdCarro."' target='_blank' class='btn btn-warning botao-saibaMais'>SABER MAIS</a>
                            </div>
                        </div>";
                    };
                ?>
            </div>
        </div>
        <div class="botao-direito-exibir"></div>
    </div>
    <div class="voltarEstoqueBtnContainer">
        <a class="voltarEstoqueBtn" target="_blank" href="./carros%20estoque.php">
            VOLTAR AO ESTOQUE
        </a>
    </div>
    <footer>
        <div class="rodape-container" style="margin:80px 0 0 0;">
            <div class="rodapePrimeiro">
                <video src="imagens/27.07.2022_03.18.47_REC.mp4" autoplay preload muted loop class="carroicon"></video>
            </div>
            <div class="rodapeSegundo">
                <p>
                    <H1>Horário de Atendimento:</H1>
                    <div class="dataContainer">
                        <div class="dias">
                            segunda á sexta|<br>
                            sábado|
                        </div>
                        <div class="horario">
                            9:00 até 18:00 <br>
                            9:00 até 16:00.
                        </div>
                    </div>
                </p>
            </div>
        </div>
    </footer>
    <script src="./selecaoDeimagens.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>