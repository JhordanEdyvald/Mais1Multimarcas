<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css
    ">
    <link rel="stylesheet" href="inicio.css">
    <link rel="stylesheet" href="carros.css">
    <title>Carros</title>    
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
                <li class="itens-menu">
                        <div class="admArea" data-bs-toggle="modal" data-bs-target="#loginModal">
                            AREA ADM
                        </div>
                </li>
            </ul>
        </div>
    </nav>

    <div class="titulo">
        <h1>NOSSOS VEICULOS</h1>
    </div>
    
    <section id="sessao-carro">
        <div class="carros-container">
                <?php
                include('mudarpreco.php');
                require_once('mostrar.php');
                ?>
            </div>
    </section>
    
    <!-- Modal -->
    <div class="modal fade" id="loginModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Insira suas credenciais de Administrador</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post">
                        <div class="form-floating mb-3">
                            <input class="form-control" name="loginAdm" id="floatingInput">
                            <label for="floatingInput">Login do Administrador</label>
                        </div>
                        <div class="form-floating">
                            <input type="password" name="senhaAdm" class="form-control" id="floatingPassword" placeholder="Password">
                            <label for="floatingPassword">Senha do Administrador</label>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button id="enviar" type="submit" name="login-btn" class="btn btn-warning">ENTRAR</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--FIM Modal -->

<?php
        //INCLUSÃO DE REQUISIÇÕES
            include('conexao.php');
            include('inserir.php');
            include('sequenciaImagens.php');
            
            //include('arquivoXml.php');
        //FIM INCLUSÃO DE REQUISIÇÕES
    if(isset($_POST['login-btn'])){

        $adminLogin = $_POST['loginAdm'];
        $admSenha = $_POST['senhaAdm'];
        $botao = $_POST['login-btn'];
        
        function AdminLogin(){
            global $adminLogin;
            global $admSenha;
            if($adminLogin == "teste" && $admSenha == "123") {
                echo "
                <style>
                .inserir-btn {
                    margin-top: 45px;
                    width: 205px;
                    height: 40px;
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    border-radius: 9px;
                    font-size: 1.1em;
                    font-family: Inter;
                    border: 1px solid #ffc107;
                    color: #ffc107;
                    cursor: pointer;
                    margin-left: auto;
                    margin-right: auto;
                    transition: .3s;
                    user-select: none;
                }
                
                .inserir-btn:hover {
                    border:1px solid #fff;
                    color: #fff;
                    background-color: #ffc107;
                    transition: .3s;
                }
                
                .uploadImagemContainer {
                    width: 100%;
                    background: #d9d9d9;
                    box-shadow: 0px 0px 4px 1px #b7b7b7;
                    margin-bottom: 12px;
                    display: flex;
                    justify-content: center;
                    align-items: center;
                }

                #turbo-container {
                    display: flex;
                    justify-content: space-evenly;
                    align-items: center;
                    margin: 0 0 5px 0;
                    height: 70px;
                    width: 100%;
                    border-top: 1px solid black;
                }

                .turbo-btn {
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    margin: 0 0 5px 0;
                    text-align: center;
                    background: #0000;
                    border: 1px solid black;
                    color: black;
                }
                
                .turbo-btn:hover {
                    color:#000;
                    border:1px solid #000;
                    background: #e7d50a;
                    transition:.3s;
                }
                
                .turbo-btn:focus {
                    color:#000;
                    border:1px solid #000;
                    background: #e7d50a;
                    transition:.3s;
                }

                .turboancora input[type='file'] {
                    display: none;
                }

                @media only screen and (max-width:452px) {
                    #turbo-container{
                        display:none;
                    }
                }

                :root{
                    --amarelo:#e7d50a;
                }
                
                @font-face {
                    font-family: fonte padrao;
                    src: url(fontes/Inter-Regular.ttf);
                }
                
                *{
                    margin:0 ;
                    padding: 0;
                }
                
                body {
                    text-align: center;
                    background-color: #000;
                }
                
                .navbar-menu{
                    background: #000;
                    height: 90px;
                    display: flex;
                    justify-content: space-between;
                    align-items: center; 
                    width: 100%;
                    color: var(--amarelo);
                }
                
                .tela-nav{
                    position: fixed;
                    top: 0;
                }
                
                .logo-menu {
                    height: 90px;
                }
                
                .logo-menu img {
                    height: 90px;
                }
                
                .botoes-navbar {
                    width: 60%;
                }
                
                .botoes-navbar ul{
                    display: flex;
                    align-items: center;
                    justify-content: end;
                    list-style: none;
                }
                
                .itens-menu {
                    padding: 0 10px;
                }
                
                .itens-menu a{
                    color: var(--amarelo);
                    text-decoration: none;
                    font-family: fonte padrao;
                    transition: .5s;
                    font-size: 1.2em;
                }
                
                .itens-menu a:hover{
                    color:#fff;
                    transition: .5s;
                }
                
                .banner {
                    width: 100%;
                    height: calc(100vh - 90px);
                }
                
                .banner img {
                    object-fit: cover;
                    width: 100%;
                    height: 100%;
                }
                
                .contatos {
                    height: calc(100vh - 180px);
                    display: flex;
                    flex-direction: column;
                    align-items: center;
                    margin-top: 70px;
                }
                
                .botoes-contato-container {
                    width: 100%;
                    height: 25%;
                    display: flex;
                    flex-direction: column;
                }
                
                .botoes-contato {
                    width: 100%;
                    height: 65%;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                }
                
                .botoes-contato a {
                    width: 65px;
                    margin: 0 10px;
                }
                
                .botoes-contato img {
                    width: 65px;
                }
                
                .botoes-contato-container span {
                    color: #fff;
                    font-family: 'fonte padrao';
                    font-size: 1.5em;
                }
                
                .endereco {
                    width: 100%;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    height: 15%;
                    color: #fff;
                    font-family: 'fonte padrao';
                    font-size: 1.5em;
                }
                
                .info-contatos {
                    height: 400px;
                    width: 100%;
                    display: flex;
                    justify-content: center;
                }
                
                .grade-info-container {
                    display: flex;
                    align-items: center;
                    flex-wrap: wrap;
                    justify-content: center;
                    max-width: 800px;
                    width: 100%;
                }
                
                .container-informacao-cada {
                    width: 400px;
                    display: flex;
                    justify-content: center;
                    align-items: center;
                }
                
                .container-informacao-cada img {
                    width: 65px;
                    height: 65px;
                    object-fit: cover;
                }
                
                .container-informacao-cada span {
                    color: #fff;
                    font-size: 1.5em;
                    width: 70%;
                    font-family: 'fonte padrao';
                }
                
                .rodape-container {
                    background-color: #fff;
                    height: 200px;
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    font-family: sans-serif;
                }
                
                .rodapePrimeiro {
                    width: 50%;
                    height: 100%;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    flex-direction: column;
                }
                
                .rodapeSegundo {
                    width: 50%;
                    height: 100%;
                    display: flex;
                    flex-direction: column;
                    justify-content: center;
                    align-items: center;
                    font-size: 1.2em;
                }
                
                .dataContainer {
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    height: 50%;
                    width: 100%;
                }
                
                .dias {
                    display: flex;
                    justify-content: end;
                    text-align: right;
                    margin-right: 10px;
                }
                
                .horario {
                    text-align: left;
                }
                
                .carroicon {
                    width: 130px;
                }
                /*AREA DE RESPONSIVIDADE*/
                
                @media only screen and (max-width: 616px) {
                    .itens-menu a {
                        font-size: 1em;
                    }
                
                    .botoes-contato img {
                        width: 45px;
                    }
                
                    .botoes-contato-container span {
                        font-size: 1.3em;
                    }
                
                    .container-informacao-cada img {
                        width: 45px;
                        height: 45px;
                    }
                
                    .endereco {
                        font-size: 1em;
                    }
                
                }
                
                @media only screen and (max-width:530px){
                    .navbar-menu {
                        background: #000;
                        height: 134px;
                        flex-direction: column;
                        display: flex;
                        justify-content: center;
                        align-items: center;
                        width: 100%;
                        color: var(--amarelo);
                    }
                    .botoes-navbar {
                        width: 100%;
                        display: flex;
                        justify-content: center;
                    }
                
                    .itens-menu a {
                        font-size: 0.9em;
                    }
                
                    .container-informacao-cada span {
                        font-size: 1.2em;
                    }
                
                    .botoes-navbar ul {
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        list-style: none;
                    }
                
                    .rodapeSegundo {
                        font-size: 0.6em;
                    }
                }

                .input-EscolherFoto{
                    width: 60px;
                    height: 56px;
                    border-radius: 14px;
                    background: url('./imagens/sem-imagem.png');
                    background-color: #fff;
                    background-repeat: no-repeat;
                    background-position:center;
                    box-shadow: 0px 3px 3px 1px #8b8b8b;
                    transition: .3s ease-out;
                }
                
                .input-EscolherFoto:hover {
                    background-color: rgb(250, 229, 0);
                    transition: .3s ease-out;
                }
                
                #criar-carro {
                    display: flex;
                    flex-direction: column;
                }
                
                .selecao-imagens-container{
                    display: flex;
                    justify-content: center;
                    align-items: center;
                }
                
                .select-imagem-container{
                    width: 75px;
                    height: 110px;
                    margin-top: 8px;
                }
                
                .titulo-select-img{
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
                

                </style>
                <div class='modal fade' id='exampleModal' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
        <div class='modal-dialog'>
            <div class='modal-content'>
                <div class='modal-header'>
                    <h5 class='modal-title' id='exampleModalLabel'>NOVO CARRO ;)</h5>
                    <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                </div>
        <div class='modal-body'>
            <div class='input-group'>
                <div class='uploadImagemContainer'>
                    <div class='mb-3'>
                        <form method='POST' id='criar-carro' enctype='multipart/form-data'>
                                    <label class='form-label tamanho'>SELECIONE AS IMAGENS<br> 
                                        NÃO É NECESSÁRIO PREENCHER TODOS OS CAMPOS!<br> 
                                        É OBRIGATÓRIO PREENCHER APENAS O PRIMEIRO.</label>

                                    <div class='selecao-imagens-container'>
                                        <div class='select-imagem-container'>
                                            <h1 class='titulo-select-img'>IMAGEM PRINCIPAL</h1>
                                            <label for='arquivodeimg1' id='primeiraFoto' class='input-EscolherFoto desativados'>
                                                <input class='form-control' name='arquivodeimg1' type='file' required id='arquivodeimg1' style='visibility:hidden;'>
                                            </label>
                                        </div>
                                        <div class='select-imagem-container'>
                                            <h1 class='titulo-select-img'>SEGUNDA IMAGEM</h1>
                                            <label for='arquivodeimg2' id='segundaFoto' class='input-EscolherFoto desativados'>
                                                <input class='form-control' name='arquivodeimg2' type='file' id='arquivodeimg2' style='visibility:hidden;'>
                                            </label>
                                        </div>
                                        <div class='select-imagem-container'>
                                            <h1 class='titulo-select-img'>TERÇEIRA IMAGEM</h1>
                                            <label for='arquivodeimg3' id='terceiraFoto' class='input-EscolherFoto desativados'>
                                                <input class='form-control' name='arquivodeimg3' type='file' id='arquivodeimg3' style='visibility:hidden;'>
                                            </label>
                                        </div>
                                        <div class='select-imagem-container'>
                                            <h1 class='titulo-select-img'>QUARTA IMAGEM</h1>
                                            <label for='arquivodeimg4' id='quartaFoto' class='input-EscolherFoto desativados'>
                                                <input class='form-control' name='arquivodeimg4' type='file' id='arquivodeimg4' style='visibility:hidden;'>
                                            </label>
                                        </div>
                                        <div class='select-imagem-container'>
                                            <h1 class='titulo-select-img'>QUINTA IMAGEM</h1>
                                            <label for='arquivodeimg5' id='quintaFoto' class='input-EscolherFoto desativados'>
                                                <input class='form-control' name='arquivodeimg5' type='file' id='arquivodeimg5' style='visibility:hidden;'>
                                            </label>
                                        </div>
                                        <div class='select-imagem-container'>
                                            <h1 class='titulo-select-img'>SEXTA IMAGEM</h1>
                                            <label for='arquivodeimg6' id='sextaFoto' class='input-EscolherFoto desativados'>
                                                <input class='form-control' name='arquivodeimg6' type='file' id='arquivodeimg6' style='visibility:hidden;'>
                                            </label>
                                        </div>
                                    </div>
                                    
                                    </div>
                                    </div>
                                    <span class='input-group-text'>Nome do carro | preço</span>
                                    <input type='text' name='carro' required aria-label='Nome' class='form-control'>
                                    <input type='number' name='preco' aria-label='Preço' class='form-control'>
                                </div>
                            </div>
                            <div class='form-floating'>
                                <textarea class='form-control' placeholder='Descrição' id='floatingTextarea2' name='descricao' maxlength='125' style='height: 100px' required></textarea>
                                <label for='floatingTextarea2'>Descrição</label>
                            </div>
                            <div class='input-group input-group-sm mb-3'>
                                <span class='input-group-text' id='inputGroup-sizing-sm'>Ano</span>
                                <input type='number' class='form-control' name='ano' aria-label='Sizing example input' aria-describedby='inputGroup-sizing-sm' required>
                                <span class='input-group-text' id='inputGroup-sizing-sm'>BOTÃO SAIBA MAIS</span>
                                <input type='text' class='form-control' name='linksaibamais' aria-label='Sizing example input' aria-describedby='inputGroup-sizing-sm'>
                            </div>
                            <div class='modal-footer'>
                                <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Cancelar</button>
                                <button type='submit' name='enviarform' id='CriarCarroBtn' class='btn btn-warning'>Criar</button>
                            </div>
                            </form>
                            <form method='POST' enctype='multipart/form-data'>
                            <div id='turbo-container'>
                            <a type='button' href='./exemplo.xlsx' download='Molde para subir multiplos arquivos para o site.xlsx' class='btn btn-dark' >EXEMPLO</a>
                                     <div class='turboancora'>
                                        <label for='arquivoxmlturbo' class='turbo-btn btn btn-warning'>
                                        <input type='file' name='arquivoxmlturbo' id='arquivoxmlturbo' class='turbo-btn btn btn-warning' type='file' required>
                                            MODO TURBO <img src='https://cdn-icons-png.flaticon.com/512/126/126477.png' style='margin-left:5px;' width='25'>
                                        </label>        
                                    </div>
                                    <div class='turboancora'>
                                            <label for='imagensSelecaoTurbo' class='turbo-btn btn btn-warning' style='margin-left:5px;'>
                                            <img src='https://cdn.pixabay.com/photo/2012/04/11/17/31/camera-29061_960_720.png' width='30'>
                                            </label>
                                        <input type='file' multiple name='imagensSelecaoTurbo[]' id='imagensSelecaoTurbo'>
                                    </div>
                                    <button type='submit' name='enviarmodoturbo' id='CriarCarroBtn' class='btn btn-secundary turbo-btn'>ENVIAR</button>
                            <form>
                    </div>
                </div>
            </div>
        </div>
        <div class='inserir-btn' class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#exampleModal'>
        ADICIONAR CARRO
        </div>
        <div class='modal fade' id='modalEditarpreco' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
        <div class='modal-dialog'>
            <div class='modal-content'>
            <div class='modal-header'>
                <h5 class='modal-title' id='exampleModalLabel'>EDITAR PREÇO</h5>
            </div>
            <div class='modal-body'>
                <input type='number' id='mudarpreco' class='btn btn-outline-warning' min='0' placeholder='NOVO PREÇO'>
            </div>
            <div class='modal-footer'>
                <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>FECHAR</button>
                <button type='button' id='finalizarEditPreco' name='finalizarEditarPreco' class='btn btn-warning'>ENVIAR NOVO PREÇO</button>
            </div>
            </div>
        </div>
        </div>
            ";
            }else{
                echo "<script>
                        window.alert('Senha e login incorreto Você não tem acesso as configurações de administrador!');
                        window.location.href = window.location.href;
                </script>";
            }
        }
        AdminLogin();
    }
    ?>

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
    <script src="inicio.js"></script>
    <script src="jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
    <script src='https://code.jquery.com/jquery-3.6.1.min.js'></script>
    <script src='./imagens-esquema-publicar.js'></script>
</body>
</html>