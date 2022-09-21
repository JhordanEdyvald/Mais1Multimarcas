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
    $linkSaibamais = $linha['linkfotos'];
    $id = $linha['id'];
    $ano = $linha['ano'];
    $excluir = '';
    $editar = '';
    $testedevar = $id;
    if(isset($_POST['login-btn']) && $_POST['loginAdm'] == $login && $_POST['senhaAdm'] == $senha){
        $excluir = '<a class="excluir" href="./carros%20estoque.php?aiposefniaopsenifophaiuvophdASLJKEFBJALSEBlaksjebflaksjebASJKEBajskleb='.$id.'">X</a>';
        $editar = '<button class="editar" type="button" onclick="addId()" data-bs-toggle="modal" data-bs-target="#modalEditarpreco">🖌</button>';
    }
    echo "<div class='card' id='$id'>
            <img src='$imagemCarro' class='card-img-top' alt='...'>
            <div class='card-body'>
                <h5 class='card-title'>".$ano." - ".$titulo."</h5>
                <p class='card-text'>".str_replace(';', '<br>', $descricao)."</p>
                <a href=".$linkSaibamais." target='_blank' class='btn btn-warning botao-saibaMais'>SABER MAIS</a>
                ".$excluir." ".$editar."
            </div>
        </div>";
}

if(isset($_GET['aiposefniaopsenifophaiuvophdASLJKEFBJALSEBlaksjebflaksjebASJKEBajskleb'])){
    $valor = $_GET['aiposefniaopsenifophaiuvophdASLJKEFBJALSEBlaksjebflaksjebASJKEBajskleb'];
    $deletarImagem = mysqli_query($con,'SELECT caminhoimg FROM informacoes WHERE id = '.$valor.'');
    $resultadoDeletarImagem = mysqli_fetch_assoc($deletarImagem)['caminhoimg'];
    unlink($resultadoDeletarImagem);
    $deletar = mysqli_query($con,'DELETE FROM informacoes WHERE id = '.$valor.'');
    echo '<script>setTimeout(function(){
            window.location.href = "./carros%20estoque.php";
        },3);</script>';
}
