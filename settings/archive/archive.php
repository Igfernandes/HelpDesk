<?php 

function search($line ,$separador, $indice){
    /**
     * OPEN ARCHIVE
     */

    $line = explode($separador, substr($line, 2));
    $dados = array();  $sub = array();
    foreach($line as $index => $value){
        if(!empty($value)){
            $dados[explode(":", $value)[0]] = explode(":", $value)[1];
        }
    }


    if(!empty($indice) && strstr($dados[$indice], "@") && $indice != "email"){
        foreach(explode("@", $dados[$indice]) as $value){
            if(!empty($value)){
                array_push($sub, $value);
            }
        }

        return $sub;
    }else if(!empty($indice)){
        return $dados[$indice];
    }else{
        return $dados;
    }


    
}

?>