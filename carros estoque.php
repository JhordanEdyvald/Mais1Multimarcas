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
                    height: 20vh;
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
                    trasition:.3s;
                }
                
                .turbo-btn:focus {
                    color:#000;
                    border:1px solid #000;
                    background: #e7d50a;
                    trasition:.3s;
                }

                .turboancora input[type='file'] {
                    display: none;
                }

                @media only screen and (max-width:452px) {
                    #turbo-container{
                        display:none;
                    }
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
                                                <label for='formFile' class='form-label'>ESCOLHA A IMAGEM DO VEÍCULO</label>
                                                <input class='form-control' name='arquivodeimg' type='file' id='formFile'>
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
                                                </d+iv>
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
                    echo"
                    <script>
                        function addId() {
                            var idselecionado = event.target.parentNode.parentNode.id;
                            var nome = 'id';
                            var valor = parseInt(idselecionado);
                            var validade = '';
                            var local = 'path=/';
                            document.cookie = nome + '=' + (valor || '') + validade + '; '+local;
                        }
                        
                        document.querySelector('#finalizarEditPreco').addEventListener('click',function(){
                        var pegarId = document.cookie.search('id=');
                        var calculo = pegarId + 3;
                        var idFinal = document.cookie.slice(calculo);
                        var novoPreco = document.querySelector('#mudarpreco').value;
                        window.location = window.location.href+'?iasdfdasdf='+idFinal+'&novasdfopaaaareco='+novoPreco;
                        });
                    </script>
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
</body>
</html>
