<?php 
   session_start();
   
   /**
     * #RESTRIÇÃO DE ACESSO 
     * 
     * - Impede que um usuário sem estar logado de acessar informações internas do projeto.
     */
   
    if(stristr($_SERVER['SCRIPT_FILENAME'], "index.php") == FALSE && $_SESSION['status'] != 1){
        header('location: ./');
    }else if(stristr($_SERVER['SCRIPT_FILENAME'], "index.php") == TRUE && isset($_SESSION['status']) && $_SESSION['status'] == 1){
        header('location: ./painel.php');
    }


    /**
     * #RESTRIÇÃO DE EDIÇÃO 
     * 
     * - Impede que um usuário entre na área de edição sem antes escolher um item.
     */
    if(stristr($_SERVER['SCRIPT_FILENAME'], "ocorrencia.php") == TRUE && !isset($_GET['id'])){
        header('location: ./painel.php');
    }

?>