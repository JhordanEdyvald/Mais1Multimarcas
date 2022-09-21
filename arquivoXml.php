<?php
    include_once('conexao.php');
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
        //var_dump($arquivoXml);
        $linhas = $arquivoXml->getElementsByTagName("Row");
        //var_dump($linhas);

        $primeiraLinha = true;
        
        foreach($linhas as $index){
                if($primeiraLinha == false){
                    $carro = $index->getElementsByTagName("Data")->item(0)->nodeValue;
                    $descricao = $index->getElementsByTagName("Data")->item(1)->nodeValue;
                    $ano = $index->getElementsByTagName("Data")->item(2)->nodeValue;
                    $preco = $index->getElementsByTagName("Data")->item(3)->nodeValue;
                    $caminhoimg = $index->getElementsByTagName("Data")->item(4)->nodeValue;
                    $nomeimg = $index->getElementsByTagName("Data")->item(5)->nodeValue;
                    $linkfotos = $index->getElementsByTagName("Data")->item(6)->nodeValue;

                    $resultBd = "INSERT INTO informacoes (nomeVeiculo, descricao, ano, preco, caminhoimg, nomeimg, linkfotos) VALUES('$carro', '$descricao', '$ano', '$preco', '$caminhoimg', '$nomeimg', '$linkfotos')";

                    $resultado_usuario = mysqli_query($con, $resultBd);
                }
                $primeiraLinha = false;
        }
}