<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="POST" enctype="multipart/form-data" >
        <div>
            <label for="">Selecione o arquivo</label>
            <input type="file" name="arquivo">
        </div>
        <button type="submit">Enviar arquivo</button>
    </form>
</body>
</html>

<?php
  if(isset($_FILES['arquivo'])){
    $arquivo = $_FILES['arquivo'];
      echo "Arquivo enviado";
      var_dump($_FILES);
        if($arquivo['error'])
            die("Falha ao enviar arquivo");
        $pasta = "./";
        $nomeDoArquivo = $arquivo['name'];
        $novoNomeDoArquivo = uniqid();
        $extensao = strtolower(pathinfo($nomeDoArquivo, PATHINFO_EXTENSION));
        echo $extensao;
        if($extensao != "png" && $extensao != "jpg")
            die("Tipo de arquivo não aceito, escolha entre jpg ou png");
        
        $final = move_uploaded_file($arquivo['tmp_name'], $pasta . $novoNomeDoArquivo . "." . $extensao);

        if($final){
            echo "ARQUIVO ENVIADO COM SUCESSO!";
        }else{
            echo "falhou";
        };
    }  
?>