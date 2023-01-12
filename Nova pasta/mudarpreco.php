<?php
include('conexao.php');

if(isset($_GET['iasdfdasdf'])){
    $id = $_GET['iasdfdasdf'];
    $tratamentopreco = ($_GET['novasdfopaaaareco']=='') ? 0 : $_GET['novasdfopaaaareco'];
    $preco = $tratamentopreco;

    $trocarValor = mysqli_query($con,'UPDATE informacoes SET preco = '.$preco.' WHERE id = '.$id.'');
    echo "<script>
        window.location.href = './carros%20estoque.php';
    </script>";
}