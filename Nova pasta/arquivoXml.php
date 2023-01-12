<?php
    include('./conexao.php');
    if(isset($_FILES['arquivoxmlturbo']) && isset($_POST['enviarmodoturbo'])){
        
        $nomexml = $_FILES['arquivoxmlturbo']['name'];
        $tipoPlanilha = strtolower(pathinfo($nomexml, PATHINFO_EXTENSION));
        if($tipoPlanilha != "xml")
            echo "<script>
            window.alert('TIPO DE ARQUIVO INVALIDO, PRECISA SER .XML');
            setTimeout(() => {
                window.location.href = window.location.href; 
            }, 3);
        </script>";

        $arquivoXml = new DomDocument();
        $arquivoXml->load($_FILES['arquivoxmlturbo']['tmp_name']);
        $linhas = $arquivoXml->getElementsByTagName("Row");

        $primeiraLinha = true;
        $carrosArray = array();
        $anoArray = array();

        foreach($linhas as $index => $item){
                if($primeiraLinha == false){
                    $carro = $item->getElementsByTagName("Data")->item(0)->nodeValue;
                    $descricao = $item->getElementsByTagName("Data")->item(1)->nodeValue;
                    $ano = $item->getElementsByTagName("Data")->item(2)->nodeValue;
                    $preco = $item->getElementsByTagName("Data")->item(3)->nodeValue;
                    $caminhoimg = $item->getElementsByTagName("Data")->item(4)->nodeValue;
                    $nomeimg = $item->getElementsByTagName("Data")->item(5)->nodeValue;
                    $linkfotos = $item->getElementsByTagName("Data")->item(6)->nodeValue;

                    //TRATAMENTO PARA CRIAR PASTA COM NOME DO CARRO;
                    mkdir("./upload/".$carro. "-" .$ano. "/" ,1234,);

                    array_push($carrosArray,$carro);
                    array_push($anoArray,$ano);

                    $resultBd = "INSERT INTO informacoes (nomeVeiculo, descricao, ano, preco, caminhoimg, nomeimg, linkfotos) VALUES('$carro', '$descricao', '$ano', '$preco', '$caminhoimg', '$nomeimg', '$linkfotos')";

                    $resultado_usuario = mysqli_query($con, $resultBd);

                    //NÃO ESQUECER DE CRIAR O OBJETO PARA A SELEÇÃO DE IMAGENS!!
                    
                }
                $primeiraLinha = false;
        }
}
