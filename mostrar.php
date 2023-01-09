<?php
include('conexao.php');
$login = "mb.servicos1810@gmail.com";
$senha = "45531020mb";

$query = mysqli_query($con, 'SELECT * FROM informacoes ORDER BY id');
while($linha = $query->fetch_array()){
    $imagemCarro = $linha['caminhoimg'];
    $comparacao = ($linha['preco'] == 0) ? $linha['nomeVeiculo'] : $linha['nomeVeiculo'].' | R$ '.number_format($linha['preco'],2,",",".").'.'; 
    $titulo = $comparacao;
    $descricao = $linha['descricao'];
    $id = $linha['id'];
    $ano = $linha['ano'];
    $excluir = '';
    $editar = '';
    $testedevar = $id;
    if(isset($_POST['login-btn']) && $_POST['loginAdm'] == $login && $_POST['senhaAdm'] == $senha){
        $excluir = '<a class="excluir" href="./carros%20estoque.php?aiposefniaopsenifophaiuvophdASLJKEFBJALSEBlaksjebflaksjebASJKEBajskleb='.$id.'">X</a>';
        $editar = '<a class="editar" type="button" href="./formEditar.php?id='.$id.'">🖌</a>';
    }
    echo "<div class='card' id='$id'>
            <img src='$imagemCarro' class='card-img-top' alt='...'>
            <div class='card-body'>
                <h5 class='card-title'>".$ano." - ".$titulo."</h5>
                <p class='card-text'>".str_replace(';', '<br>', $descricao)."</p>
                <a href='./exibirVeiculo.php?id=".$id."' target='_blank' class='btn btn-warning botao-saibaMais'>SABER MAIS</a>
                ".$excluir." ".$editar."
            </div>
        </div>";
}

if(isset($_GET['aiposefniaopsenifophaiuvophdASLJKEFBJALSEBlaksjebflaksjebASJKEBajskleb'])){
    $valor = $_GET['aiposefniaopsenifophaiuvophdASLJKEFBJALSEBlaksjebflaksjebASJKEBajskleb'];
    $deletarImagem = mysqli_query($con,'SELECT caminhoimg FROM informacoes WHERE id = '.$valor.'');
    $resultadoDeletarImagem = mysqli_fetch_assoc($deletarImagem)['caminhoimg'];
    $nomeVeiculo = mysqli_query($con,'SELECT nomeVeiculo FROM informacoes WHERE id = '.$valor.'');
    $tratarNome = mysqli_fetch_assoc($nomeVeiculo)['nomeVeiculo'];
    $anoVeiculo = mysqli_query($con,'SELECT ano FROM informacoes WHERE id = '.$valor.'');
    $tratarAno = mysqli_fetch_assoc($anoVeiculo)['ano'];
    $pastaCarroDeletar = "./upload/".$tratarNome."-".$tratarAno."/";
    $pastaCompleta = scandir($pastaCarroDeletar);
    foreach($pastaCompleta as $index => $file){
        if($file != '..' && $file != '.'){
            unlink($pastaCarroDeletar.$file);
        }
    }
    rmdir($pastaCarroDeletar);
    mysqli_query($con,'DELETE FROM informacoes WHERE id = '.$valor.'');
    echo '<script>setTimeout(function(){
            window.location.href = "./carros%20estoque.php";
        },15);</script>';
}
