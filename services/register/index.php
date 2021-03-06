<?php 


$_SESSION['registros'] = array();

if(isset($_POST['save'])){

    $log = fopen("./register/log/error_log", 'a') or die("Unable to open file!");
    $archive = fopen("./register/data/data.hd", 'a') or die("Unable to open file!");


    /**
     * COUNT LINES
     */
        $count = 0;
        $handle = fopen("./register/data/data.hd", "r");
        while(!feof($handle)){

            $line = fgets($handle);

        $count++;
        }

        fclose($handle);


    try{
        /**
         * CAPTURANDO OS CAMPOS DO REGISTRO E CRIA UM NOVO ARRAY
         */
        date_default_timezone_set('UTC');

        $info = array( 
            "nome" => htmlspecialchars($_POST['name']),
            "email" => htmlspecialchars($_POST['email']),
            "telefone" => htmlspecialchars($_POST['telefone']),
            "data" => htmlspecialchars($_POST['ocorrencia']),
            "tipo" => htmlspecialchars($_POST['tipo']),
            "descricao" => array(
                "text" => htmlspecialchars($_POST['descricao']),
                "data_text" => date(DATE_RFC822),
                "resposta" => isset($_POST['respost']) ? htmlspecialchars($_POST['respost']) : "" ,
                "data_resposta" => isset($_POST['respost']) ? date(DATE_RFC822) : "",
            ),
            "status" => "Aberto"
        );
        
        $dados = "->#id:$count";
       
        /**
         * Percorre dentro do array incluindo os dados tratados dentro de uma variável(string)
         * - As informações principais estaram dividas por "#", já as sub informações estaram por "@"
         */
        foreach($info as $index => $value){
            if($index == "descricao"){
                $dados .= "#$index:";
                foreach($value as $sub){
                    if(!empty($sub)){
                        $dados .= "@$sub";
                    }
                }
            }else{
                $dados .= "#$index:$value";
            }
        }

    }catch(Exception $erro){
        $text = "\n[".date(DATE_RFC822)."]: $er";

        fwrite($log, $text);
    }

    //Escreve dentro do arquivo e pula uma linha utilizando as barras referentes ao sistema.
    fwrite($archive, $dados.PHP_EOL);
    fclose($archive);
    fclose($log);

    header('location: ../painel.php');

}

if(isset($_POST['update'])){

    $log = fopen("./register/log/error_log", 'a') or die("Unable to open file!");
    $archive = fopen("./register/data/data.hd", 'r') or die("Unable to open file!");

    try{
      
         /**
         * COUNT LINES
         * 
         * - Retorna as linhas e analisa até encontrar a remetente a modificação.
         * - Realoca as linhas dentro de de uma variável que irá inserir novamente dentro do document, mas agora modificando a linha encontrada
         * - Quando encontra a linha, verifica as mudanças e caso haja alguma altera, caso não só adiciona os itens.
         */
        $count = 1; $dados = "->"; $infos = array();

        while(!feof($archive)){

            $line = fgets($archive);
            
            if($count == $_POST['update'] && strstr($line, '->') !==  false){
      
                $info =  search($line, "#", "");
                foreach($info as $index => $value){
                    
                    if($index == "descricao"){
                        $itens = explode("@", $value);
                        if(isset($_POST['resposta']) && !empty($_POST['resposta']) && !isset($itens[3]) || !empty($itens[3])){
                            $dados .= "#$index:@$itens[1]@$itens[2]@".$_POST['resposta']."@".date(DATE_RFC822);
                        }else if(!isset($_POST['respost']) || empty($_POST['respost'])){
                            $dados .= "#$index:@$itens[1]@$itens[2]";  
                        }
                    }else if(isset($_POST['status']) && $index == "status"){
                        $dados .= "#$index:".$_POST['status'];
                       
                    }else{
                        $dados .= "#$index:$value";
                    }
                }

               array_push($infos, $dados);
            }else if(strstr($line, "->")){
                array_push($infos, $line);
            }
            $count++;
        }   

        var_dump($infos);
        var_dump($_POST);

        fclose($archive);

        $archive = fopen("./register/data/data.hd", 'w+') or die("Unable to open file!");
        foreach($infos as $lines){
        
            if(!empty($lines))fwrite($archive, str_replace(PHP_EOL, ' ', $lines).PHP_EOL);
        }
        
            // exit();

        fclose($archive);
     
        header("location: ../ocorrencia.php?status=sucess&id=".$_POST['update']);
    }catch(Exception $e){
        $text = "\n[".date(DATE_RFC822)."]: $er";

        fwrite($log, $text);

        fclose($archive);
        fclose($log);

        header("location: ../ocorrencia.php?status=failed&id=".$_POST['update']);

        
    }
   
}

?>

