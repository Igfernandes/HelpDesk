<?php 

$_SESSION['status'] = false;

if(isset($_POST['login']) && !$_POST['validation']){
    header('location: ./index.php');
}

if(isset($_POST['conect'])){
    $validate = 1;
    
    $acess = array(
        "email" => htmlspecialchars($_POST['email']),
        "password" => htmlspecialchars($_POST['password'])
    );


    if($acess['email'] !== 'admin@admin.com'){
        $validate = 0;
    }else if($acess['password'] !== '123'){
        $validate = 0;
    }

    if($validate == 1){
        $_SESSION['status'] = 1;
    }

    
    header('location: ../painel.php');

}
 
if(isset($_POST['logout'])){

    session_destroy();
    header('location: ../');
}

?>