<?php 


$_SESSION['registros'] = array();

if(isset($_POST['save'])){

    if(isset($_SESSION['rgt'])){
        /**
         * CAPTURANDO OS CAMPOS DO REGISTRO E ADICIONA A MAIS DENTRO DA ESTRUTURA
         */
        array_push($_SESSION['rgt'], array(
            "nome" => stripslashes(htmlspecialchars($_POST['name'])),
            "email" => stripslashes(htmlspecialchars($_POST['email'])),
            "telefone" => stripslashes(htmlspecialchars($_POST['telefone'])),
            "data" => stripslashes(htmlspecialchars($_POST['ocorrencia'])),
            "tipo" => stripslashes(htmlspecialchars($_POST['tipo'])),
            "descricao" => array(
                "text" => stripslashes(htmlspecialchars($_POST['descricao'])),
                "data_text" => date(DATE_RFC822),
                "resposta" => stripslashes(htmlspecialchars($_POST['resposta'])),
                "data_resposta" => date(DATE_RFC822)
            ),
            "status" => "Aberto"
        ));
        
    }else{
        /**
         * CAPTURANDO OS CAMPOS DO REGISTRO E CRIA UM NOVO ARRAY
         */
        date_default_timezone_set('UTC');

        $_SESSION['rgt'] = array(
            [   "nome" => stripslashes(htmlspecialchars($_POST['name'])),
                "email" => stripslashes(htmlspecialchars($_POST['email'])),
                "telefone" => stripslashes(htmlspecialchars($_POST['telefone'])),
                "data" => stripslashes(htmlspecialchars($_POST['ocorrencia'])),
                "tipo" => stripslashes(htmlspecialchars($_POST['tipo'])),
                "descricao" => array(
                    "text" => stripslashes(htmlspecialchars($_POST['descricao'])),
                    "data_text" => date(DATE_RFC822),
                    "resposta" => stripslashes(htmlspecialchars($_POST['respost'])),
                    "data_resposta" => date(DATE_RFC822),
                ),
                "status" => "Aberto"
            ]
        );
    }

    header('location: ../painel.php');

}

if(isset($_POST['update'])){
    try{
        
        $fields = $_SESSION['rgt'][$_POST['update']];

        foreach($_POST as $index => $value){
            if($index == "resposta"){

                $_SESSION['rgt'][$_POST['update']]['descricao']['resposta'] = isset($fields[$index]['resposta']) != isset($_POST['resposta']) ? stripslashes(htmlspecialchars($_POST['resposta'])) : $fields[$index]['resposta'];
                $_SESSION['rgt'][$_POST['update']]['descricao']['data_resposta'] = isset($fields[$index]['data_resposta']) != isset($_POST['resposta']) ? date(DATE_RFC822) : $fields[$index]['data_resposta'];
            }else if($index != 'update' && $index != 'register'){
                $_SESSION['rgt'][$_POST['update']][$index] = $fields[$index] != $_POST[$index] ? stripslashes(htmlspecialchars($_POST[$index])) : $fields[$index];
            }
        }

        header("location: ../ocorrencia.php?status=sucess&id=".$_POST['update']);
    }catch(Exception $e){

        header("location: ../ocorrencia.php?status=failed&id=".$_POST['update']);
    }
}

?>

