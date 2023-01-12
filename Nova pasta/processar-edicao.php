<?php
include('./conexao.php');
$id = $_POST['id-number'];
$queryAntigoCarro = mysqli_query($con, 'SELECT nomeVeiculo FROM informacoes WHERE id = "'.$id.'"');
$nomeAntigoVeiculo = mysqli_fetch_assoc($queryAntigoCarro)['nomeVeiculo'];
$queryAntigoAno = mysqli_query($con, 'SELECT ano FROM informacoes WHERE id = "'.$id.'"');
$AntigoAno = mysqli_fetch_assoc($queryAntigoAno)['ano'];
$pastaVelha = $nomeAntigoVeiculo.'-'.$AntigoAno;
//echo $pastaVelha.'<br><br>'.$id.'<br><br><br>';


if(isset($_POST['novoNomeVeiculo'])){
    if($_POST['novoNomeVeiculo'] != ''){
        echo 'novo Nome foi Setado <br>';
        $nomeVeiculo = $_POST['novoNomeVeiculo'];
        mysqli_query($con,'UPDATE informacoes SET nomeVeiculo = "'.$nomeVeiculo.'" where id = '.$id.'');
        rename('./upload/'.$pastaVelha, './upload/'.$nomeVeiculo.'-'.$AntigoAno);
        $tratamentoAntigoNomeQuery = mysqli_query($con, 'SELECT caminhoimg FROM informacoes WHERE id = "'.$id.'"'); 
        $tratamentoAntigoNome = mysqli_fetch_assoc($tratamentoAntigoNomeQuery)['caminhoimg'];
        $ImagemFiltrada = explode('/', $tratamentoAntigoNome)[3]; 
        $novoCaminhoImagem = './upload/'.$nomeVeiculo.'-'.$AntigoAno. '/'. $ImagemFiltrada;
        mysqli_query($con, 'UPDATE informacoes SET caminhoImg = "'.$novoCaminhoImagem.'" where id = "'.$id.'" ');
    }
}

if(isset($_POST['editar-descricao'])){
    if($_POST['editar-descricao'] != ''){
        echo"a descrição foi setada<br>";
        $descricaoVeiculo = $_POST['editar-descricao'];
        mysqli_query($con,'UPDATE informacoes SET descricao = "'.$descricaoVeiculo.'" where id = '.$id.'');
    }
}

if(isset($_POST['editarPreco'])){
    if($_POST['editarPreco'] != ''){
        echo"o preço foi setada<br>";
        $precoEditar = $_POST['editarPreco'];
        mysqli_query($con,'UPDATE informacoes SET preco = "'.$precoEditar.'" where id = '.$id.'');
    }
}

if(isset($_POST['editarAno'])){
    if($_POST['editarAno'] != ''){
        echo"o ano foi setada<br>";
        $anoEditar = $_POST['editarAno'];
        mysqli_query($con,'UPDATE informacoes SET ano = "'.$anoEditar.'" where id = '.$id.'');
        $NovoAnoVeiculoQuery = mysqli_query($con, 'SELECT ano FROM informacoes WHERE id = "'.$id.'"');
        $AnoVeiculo = mysqli_fetch_assoc($NovoAnoVeiculoQuery)['ano'];
        $novoCaminhoImagemAnoQuery = mysqli_query($con, 'SELECT caminhoImg FROM informacoes WHERE id = "'.$id.'"');
        $caminhoAntigo = mysqli_fetch_assoc($novoCaminhoImagemAnoQuery)['caminhoImg'];
        $NomeAnoSemtratar = explode('/',$caminhoAntigo)[2];
        $separadorNome = explode('-',$NomeAnoSemtratar)[0];
        $novoNomeComAno = $separadorNome .'-'. $AnoVeiculo;
        $novoCaminhoAno = './upload/'.$novoNomeComAno.'/';
        $novoCaminhoAnoFile = './upload/'.$novoNomeComAno.'/'.explode('/',$caminhoAntigo)[3];
        rename('./upload/'.$NomeAnoSemtratar.'/',$novoCaminhoAno);
        mysqli_query($con,'UPDATE informacoes SET caminhoImg = "'.$novoCaminhoAnoFile.'" where id = '.$id.'');
    }
}

if(isset($_FILES['arquivodeimg1'])){
    if($_FILES['arquivodeimg1']['name'] != ''){
        echo"imagem 1 foi setada<br>";
        //echo $_FILES['arquivodeimg1']['name'].'<br><br>';
        $primeiraImagem = $_FILES['arquivodeimg1'];
        //var_dump($primeiraImagem);
        $arquivo = $_FILES['arquivodeimg1'];
        $pastaQuery = mysqli_query($con,'SELECT caminhoImg FROM informacoes WHERE id = "'.$id.'"');
        $pastaTratamento = mysqli_fetch_assoc($pastaQuery)['caminhoImg'];
        $pasta = './upload/'.explode('/',$pastaTratamento)[2];
        $nomeDoArquivo = $arquivo['name'];
        $novoNomeDoArquivo = uniqid();
        $extensao = strtolower(pathinfo($nomeDoArquivo, PATHINFO_EXTENSION));
        if($extensao != "png" && $extensao != "jpg" && $extensao != "jpeg"){
            echo 'apenas png ou jpg';
        }
        $path = $pasta . "/principal" . $novoNomeDoArquivo . "." . $extensao;
        mysqli_query($con,'UPDATE informacoes SET caminhoImg = "'.$path.'" where id = "'.$id.'"');
        $final = move_uploaded_file($arquivo['tmp_name'], $path);
        unlink($pastaTratamento);
        }
}

if(isset($_FILES['arquivodeimg2'])){
    if($_FILES['arquivodeimg2']['name'] != ''){
        echo"imagem 2 foi setada<br>";
        $arquivodeimgSegQuery = mysqli_query($con, 'SELECT caminhoImg FROM informacoes where id = "'.$id.'"');
        $tratamentoSegundo = mysqli_fetch_assoc($arquivodeimgSegQuery)['caminhoImg'];
        $pastaArquivo = './upload/'.explode('/',$tratamentoSegundo)[2].'/';
        $arquivoSeg = $_FILES['arquivodeimg2'];
        $pastasOrdem = scandir($pastaArquivo,1);
        $nomeSegundoArquivo = $arquivoSeg['name'];
        if(isset($pastasOrdem[3])){
            foreach($pastasOrdem as $index => $item){
                $principal = substr($item,0,9);
                if($principal != 'principal' && $item != '.' && $item != '..'){
                    unlink($pastaArquivo.$item);
                }
            }
        }
        move_uploaded_file($arquivoSeg['tmp_name'], $pastaArquivo.$arquivoSeg['name']);
    }
}

if(isset($_FILES['arquivodeimg3'])){
    if($_FILES['arquivodeimg3']['name'] != ''){
        echo"imagem 3 foi setada<br>";
        $arquivoTer = $_FILES['arquivodeimg3'];
        $nomeTerceiroArquivo = $arquivoTer['name'];
        move_uploaded_file($arquivoTer['tmp_name'], $pastaArquivo.$arquivoTer['name']);
    }
}

if(isset($_FILES['arquivodeimg4'])){
    if($_FILES['arquivodeimg4']['name'] != ''){
        echo"imagem 4 foi setada<br>";
        $arquivoQua = $_FILES['arquivodeimg4'];
        $nomeTerceiroArquivo = $arquivoQua['name'];
        move_uploaded_file($arquivoQua['tmp_name'], $pastaArquivo.$arquivoQua['name']);
    }
}

if(isset($_FILES['arquivodeimg5'])){
    if($_FILES['arquivodeimg5']['name'] != ''){
        echo"imagem 5 foi setada<br>";
        $arquivoQui = $_FILES['arquivodeimg5'];
        $nomeTerceiroArquivo = $arquivoQui['name'];
        move_uploaded_file($arquivoQui['tmp_name'], $pastaArquivo.$arquivoQui['name']);
    }
}

if(isset($_FILES['arquivodeimg6'])){
    if($_FILES['arquivodeimg6']['name'] != ''){
        echo"imagem 6 foi setada<br>";
        $arquivoSex = $_FILES['arquivodeimg6'];
        $nomeTerceiroArquivo = $arquivoSex['name'];
        move_uploaded_file($arquivoSex['tmp_name'], $pastaArquivo.$arquivoSex['name']);
    }
}

echo '<script>
    setTimeout(() => {
        window.location.href = "./carros estoque.php"; 
    }, 3);
</script>';