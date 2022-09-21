<?php
include('conexao.php');
// INICIO SEQUENCIA DE IMAGENS!
function enviarFotos($erro, $nome, $tmp_name){
    if($erro){
        echo "Falha ao enviar arquivo";}
    $pasta = "./upload/multifotos/";
    $nomeDoArquivo = explode('.',$nome);
    $nomeArquivo = current($nomeDoArquivo);
    $extensao = strtolower(pathinfo($nome, PATHINFO_EXTENSION));

    if($extensao != "png" && $extensao != "jpg" && $extensao != "jpeg")
        die("Tipo de arquivo não aceito, escolha entre jpg ou png");
    
        $final = move_uploaded_file($tmp_name, $pasta . $nomeArquivo . "." . $extensao);
        
        if($final){
            return true;
        }else{
            return false;
        };
}
    
if(isset($_FILES['imagensSelecaoTurbo'] ,$_POST['enviarmodoturbo'])){
include('arquivoXml.php');
$fotos = $_FILES['imagensSelecaoTurbo'];
$fotosContagem = $fotos['name'];
$novoarrayfotos;
for($i = 0; $i < count($fotosContagem); $i++){
    if($fotos['error'][$i] != 0){
        unset($fotos['name'][$i]);
        unset($fotos['type'][$i]);
        unset($fotos['tmp_name'][$i]);
        unset($fotos['size'][$i]);
    }
}
foreach($fotos['name'] as $index => $arq){
    $tudoCerto = enviarFotos($fotos['error'][$index], $fotos['name'][$index], $fotos['tmp_name'][$index]);
    if($tudoCerto==false){
        $tudoCerto = false;
    }
}
if($tudoCerto){
    echo "<script>
            window.alert('TUDO CERTO AO ENVIAR AS FOTOS!');
            setTimeout(() => {
                window.location.href = window.location.href; 
            }, 3);
        </script>";
}else{
    echo "<script>
            window.alert('FALHOU, ARQUIVO DE FOTO BUGADO! Talvez algumas de suas imagens tenha ido!');
            setTimeout(() => {
                window.location.href = window.location.href; 
            }, 3);
        </script>";
}
}
// FIM SEQUENCIA DE IMAGENS!

//INICIO PLANILHA DO EXCEL!
