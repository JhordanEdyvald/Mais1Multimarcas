<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="./inicio.css">
    <link rel="stylesheet" href="./formulario.css">
    <title>EDITAR | MAIS1</title>
    <style>
                .editarImgContainer {
                    height: 222px;
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    flex-direction: column;
                    margin: 20px 0 0 0;
                }

                 .input-EscolherFoto{
                    width: 169px;
                    height: 171px;
                    border-radius: 14px;
                    background: url('./imagens/sem-editar-imagem.png');
                    background-color: #fff;
                    background-repeat: no-repeat;
                    background-position: center;
                }
                
                .input-EscolherFoto:hover {
                    background-color: rgb(250, 229, 0);
                    transition: .3s ease-out;
                }
                
                #criar-carro {
                    display: flex;
                    flex-direction: column;
                }
                
                .imagens-editar{
                    display: flex;
                    justify-content: space-evenly;
                    align-items: center;
                    width: 80%;
                    height: 80%;
                }
                                                
                .titulo-select-img-editar{
                    font-size: 0.8em;
                    font-weight: 400;
                    text-align: center;
                }
                
                .form-label.tamanho{
                    font-size: 0.8em;
                    margin-top: 10px;
                }
                
                .desativados {
                    background-color: #B6B6B6;
                    pointer-events: none;
                }

                .envar-container {
                    height: 65px;
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    margin: 15px 0;
                }

                .btn-enviar {
                    background: #E7D50A;
                    width: 261px;
                    height: 44px;
                    border-radius: 15px;
                    font-size: 1.4em;
                    box-shadow: yellow 0px 0px 9px;
                    border: none;
                    transition: ease-in .3s;
                }

                .btn-enviar:hover {
                    background: #000;
                    border:2px solid #E7D50A;
                    color:#E7D50A;
                    transition: ease-in .3s;
                }
    </style>
</head>
<body>

<nav class="navbar-menu">
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

    <div class="Titulo-editar-container">
        <h1 class="editar-titulo">EDITAR: <?php
                    include('./conexao.php');
                    if(isset($_GET['id'])){
                        $id = intval($_GET['id']);
                        $query = mysqli_query($con,'SELECT * FROM informacoes WHERE id ='.$id.';');
                        $linha = $query->fetch_array();
                        echo $linha['nomeVeiculo'];
                    };
                ?></h1>
    </div>

    <form action="./processar-edicao.php" method="POST" id="formEditarTotal" enctype='multipart/form-data'>
        <div class="formularios-containers">
            <div class="nome-form-editar">
                <h1 class="titulo-nome-editar">
                    NOVO NOME:
                </h1>
                <script>
                    const link = window.location.href;
                    const position = link.search("id");
                    const valorPrimeiro = position + 3;
                    const id = link.substring(valorPrimeiro);
                    document.write('<input type="number" name="id-number" style="display:none;" value="'+id+'">');
                </script>
                <input type="text" name="novoNomeVeiculo" class="nome-form-editar-input" placeholder="<?php
                    include('./conexao.php');
                    if(isset($_GET['id'])){
                        $id = intval($_GET['id']);
                        $query = mysqli_query($con,'SELECT nomeVeiculo FROM informacoes WHERE id = '.$id.';');
                        $linha = $query->fetch_array();
                        echo $linha['nomeVeiculo'];
                    };
                    ?>">
            </div>
            <div class="descricao-form-editar">
                <div>
                    <h1 class="titulo-descricao-editar">
                        DESCRIÇÃO:
                    </h1>
                    <h1 class="titulo-descricao-editar aviso">
                        Use ponto e virgula ";" para quebrar linha
                    </h1>
                </div>
                <textarea type="text" name="editar-descricao" placeholder="<?php
                        include('./conexao.php');
                        if(isset($_GET['id'])){
                            $id = intval($_GET['id']);
                            $query = mysqli_query($con,'SELECT * FROM informacoes WHERE id ='.$id.';');
                            $linha = $query->fetch_array();
                            echo $linha['descricao'];
                        };
                    ?>" class="descricao-form-editar-input"></textarea>
            </div>
            <div class="preco-ano-editar-container">
                <div class="editar-preco-container">
                    <h1 class="titulo-editarPreco-editar">
                        EDITAR PREÇO:
                    </h1>
                    <input inputmode="numeric" name="editarPreco" placeholder="R$<?php
                        include('./conexao.php');
                        if(isset($_GET['id'])){
                            $id = intval($_GET['id']);
                            $query = mysqli_query($con,'SELECT * FROM informacoes WHERE id ='.$id.';');
                            $linha = $query->fetch_array();
                            echo $linha['preco'];
                        };
                    ?>" class="editarPreco-form-input">
                </div>
                <div class="editar-ano-container">
                    <h1 class="titulo-editarAno-editar">
                        EDITAR ANO:
                    </h1>
                    <input inputmode="numeric" name="editarAno" placeholder="<?php
                        include('./conexao.php');
                        if(isset($_GET['id'])){
                            $id = intval($_GET['id']);
                            $query = mysqli_query($con,'SELECT * FROM informacoes WHERE id ='.$id.';');
                            $linha = $query->fetch_array();
                            echo $linha['ano'];
                        };
                    ?>" class="editarAno-form-input">
                </div>
            </div>
        </div>

        <section class="editarImgContainer">
            <div class="imagens-editar">
                <div class='select-imagem-editar-container'>
                    <label for='arquivodeimg1' id='primeiraFoto' class='input-EscolherFoto desativados'>
                        <input class='form-control' name='arquivodeimg1' type='file' id='arquivodeimg1' style='visibility:hidden;'>
                    </label>
                </div>
                <div class='select-imagem-editar-container'>
                    <label for='arquivodeimg2' id='segundaFoto' class='input-EscolherFoto desativados'>
                        <input class='form-control' name='arquivodeimg2' type='file' id='arquivodeimg2' style='visibility:hidden;'>
                    </label>
                </div>
                <div class='select-imagem-editar-container'>
                    <label for='arquivodeimg3' id='terceiraFoto' class='input-EscolherFoto desativados'>
                        <input class='form-control' name='arquivodeimg3' type='file' id='arquivodeimg3' style='visibility:hidden;'>
                    </label>
                </div>
                <div class='select-imagem-editar-container'>
                    <label for='arquivodeimg4' id='quartaFoto' class='input-EscolherFoto desativados'>
                        <input class='form-control' name='arquivodeimg4' type='file' id='arquivodeimg4' style='visibility:hidden;'>
                    </label>
                </div>
                <div class='select-imagem-editar-container'>
                    <label for='arquivodeimg5' id='quintaFoto' class='input-EscolherFoto desativados'>
                        <input class='form-control' name='arquivodeimg5' type='file' id='arquivodeimg5' style='visibility:hidden;'>
                    </label>
                </div>
                <div class='select-imagem-editar-container'>
                    <label for='arquivodeimg6' id='sextaFoto' class='input-EscolherFoto desativados'>
                        <input class='form-control' name='arquivodeimg6' type='file' id='arquivodeimg6' style='visibility:hidden;'>
                    </label>
                </div>
            </div>
        </section>
        <div class="envar-container">
            <button type="submit" class="btn-enviar">SALVAR</button>
        </div>
    </form>
    <script>
        //labels
            var labelPrimeiro = document.querySelector('#primeiraFoto');
            var labelSegundo = document.querySelector('#segundaFoto');
            var labelTerceiro = document.querySelector('#terceiraFoto');
            var labelQuarto = document.querySelector('#quartaFoto');
            var labelQuinto = document.querySelector('#quintaFoto');
            var labelSexto = document.querySelector('#sextaFoto');
        //inputs
            var inputPrimeiro = document.querySelector('#arquivodeimg1');
            var inputSegundo = document.querySelector('#arquivodeimg2');
            var inputTerceiro = document.querySelector('#arquivodeimg3');
            var inputQuarto = document.querySelector('#arquivodeimg4');
            var inputQuinto = document.querySelector('#arquivodeimg5');
            var inputSexto = document.querySelector('#arquivodeimg6');
            
            labelPrimeiro.style.boxShadow = '0 0 6px 1px #e7d50a';
            
            
            function readerOfFiles (input,label) {
                let reader = new FileReader();
                var file = input.files[0];
                reader.readAsDataURL(file);
                var teste;

                function loadEvent(){
                    return new Promise((resolve) =>{ 
                        reader.addEventListener('load', (e)=>{
                        const readerTarget = e.target;
                        return resolve(readerTarget.result);
                    });
                    //resolve();
                    })
                }

                async function callback() {
                    const valor = await loadEvent();
                    //console.log(valor);
                    label.style.backgroundImage = 'url('+valor+')';
                    label.style.backgroundSize = 'cover';
                }

                callback();
                

            }
            
            inputPrimeiro.addEventListener('change', (e) =>{
                if(inputPrimeiro.value != ''){
                    labelSegundo.style.boxShadow = '0 0 6px 1px #e7d50a';
                    readerOfFiles(inputPrimeiro, labelPrimeiro);
                } else {
                    labelSegundo.style.boxShadow = 'none';
                    labelTerceiro.style.boxShadow = 'none';
                    labelQuarto.style.boxShadow = 'none';
                    labelQuinto.style.boxShadow = 'none';
                    labelSexto.style.boxShadow = 'none';
                    labelPrimeiro.style.backgroundSize = 'auto';
                    labelPrimeiro.style.backgroundImage = 'url("./imagens/sem-editar-imagem.png")';
                    labelSegundo.style.backgroundSize = 'auto';
                    labelSegundo.style.backgroundImage = 'url("./imagens/sem-editar-imagem.png")';
                    labelTerceiro.style.backgroundSize = 'auto';
                    labelTerceiro.style.backgroundImage = 'url("./imagens/sem-editar-imagem.png")';
                    labelQuarto.style.backgroundSize = 'auto';
                    labelQuarto.style.backgroundImage = 'url("./imagens/sem-editar-imagem.png")';
                    labelQuinto.style.backgroundSize = 'auto';
                    labelQuinto.style.backgroundImage = 'url("./imagens/sem-editar-imagem.png")';
                    labelSexto.style.backgroundSize = 'auto';
                    labelSexto.style.backgroundImage = 'url("./imagens/sem-editar-imagem.png")';
                }
            });
            
            inputSegundo.addEventListener('change', (e) =>{
                if(inputSegundo.value != ''){
                    labelTerceiro.style.boxShadow = '0 0 6px 1px #e7d50a';
                    readerOfFiles(inputSegundo, labelSegundo); 
                } else {
                    labelTerceiro.style.boxShadow = 'none';
                    labelQuarto.style.boxShadow = 'none';
                    labelQuinto.style.boxShadow = 'none';
                    labelSexto.style.boxShadow = 'none';
                    labelSegundo.style.backgroundSize = 'auto';
                    labelSegundo.style.backgroundImage = 'url("./imagens/sem-editar-imagem.png")';
                    labelTerceiro.style.backgroundSize = 'auto';
                    labelTerceiro.style.backgroundImage = 'url("./imagens/sem-editar-imagem.png")';
                    labelQuarto.style.backgroundSize = 'auto';
                    labelQuarto.style.backgroundImage = 'url("./imagens/sem-editar-imagem.png")';
                    labelQuinto.style.backgroundSize = 'auto';
                    labelQuinto.style.backgroundImage = 'url("./imagens/sem-editar-imagem.png")';
                    labelSexto.style.backgroundSize = 'auto';
                    labelSexto.style.backgroundImage = 'url("./imagens/sem-editar-imagem.png")';
                }

            });
            
            inputTerceiro.addEventListener('change', () =>{
                if(inputTerceiro.value != ''){
                    labelQuarto.style.boxShadow = '0 0 6px 1px #e7d50a';
                    readerOfFiles(inputTerceiro, labelTerceiro);
                } else {
                    labelQuarto.style.boxShadow = 'none';
                    labelQuinto.style.boxShadow = 'none';
                    labelSexto.style.boxShadow = 'none';
                    labelTerceiro.style.backgroundSize = 'auto';
                    labelTerceiro.style.backgroundImage = 'url("./imagens/sem-editar-imagem.png")';
                    labelQuarto.style.backgroundSize = 'auto';
                    labelQuarto.style.backgroundImage = 'url("./imagens/sem-editar-imagem.png")';
                    labelQuinto.style.backgroundSize = 'auto';
                    labelQuinto.style.backgroundImage = 'url("./imagens/sem-editar-imagem.png")';
                    labelSexto.style.backgroundSize = 'auto';
                    labelSexto.style.backgroundImage = 'url("./imagens/sem-editar-imagem.png")';
                }
            });
            
            inputQuarto.addEventListener('change', () =>{
                if(inputQuarto.value != ''){
                    labelQuinto.style.boxShadow = '0 0 6px 1px #e7d50a';
                    readerOfFiles(inputQuarto, labelQuarto);
                } else {
                    labelQuinto.style.boxShadow = 'none';
                    labelSexto.style.boxShadow = 'none';
                    labelQuarto.style.backgroundSize = 'auto';
                    labelQuarto.style.backgroundImage = 'url("./imagens/sem-editar-imagem.png")';
                    labelQuinto.style.backgroundSize = 'auto';
                    labelQuinto.style.backgroundImage = 'url("./imagens/sem-editar-imagem.png")';
                    labelSexto.style.backgroundSize = 'auto';
                    labelSexto.style.backgroundImage = 'url("./imagens/sem-editar-imagem.png")';
                }
            });
            
            inputQuinto.addEventListener('change', () =>{
                if(inputQuinto.value != ''){
                    labelSexto.style.boxShadow = '0 0 6px 1px #e7d50a';
                    readerOfFiles(inputQuinto, labelQuinto);
                } else {
                    labelSexto.style.boxShadow = 'none';
                    labelQuinto.style.backgroundSize = 'auto';
                    labelQuinto.style.backgroundImage = 'url("./imagens/sem-editar-imagem.png")';
                    labelSexto.style.backgroundSize = 'auto';
                    labelSexto.style.backgroundImage = 'url("./imagens/sem-editar-imagem.png")';
                }
            });

            inputSexto.addEventListener('change', () =>{
                if(inputSexto.value == ''){
                    labelSexto.style.backgroundSize = 'auto';
                    labelSexto.style.backgroundImage = 'url("./imagens/sem-editar-imagem.png")';
                } else{
                    readerOfFiles(inputSexto, labelSexto);
                }
            });

    </script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
    <script src='https://code.jquery.com/jquery-3.6.1.min.js'></script>
    <script src='./imagens-esquema-publicar-edit.js'></script>
</body>
</html>