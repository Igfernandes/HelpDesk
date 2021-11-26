<?php 

$_SESSION['status'] = false;

if(isset($_POST['login']) && !$_POST['validation']){
    header('location: ./index.php');
}

if(isset($_POST['conect'])){
    $validate = 0;

    $log = fopen("./register/log/error_log", 'a') or die("Unable to open file!");
    
    $acess = array(
        "email" => htmlspecialchars($_POST['email']),
        "password" => htmlspecialchars($_POST['password'])
    );


   try{
       foreach($users as $user){
            if($acess['email'] == $user['email'] && $acess['password'] == $user['password']){
                $validate = 1;
            }
            
       }

        if($validate == 1){
            $_SESSION['status'] = 1;
        }else{
            $text = "\n[".date(DATE_RFC822)."]: $er";
            fwrite($log, $text);
        }

   }catch(Exception $er){
        $text = "\n[".date(DATE_RFC822)."]: $er";

        fwrite($log, $text);
   }

   fclose($log);

//    var_dump($validate);
//    exit();
    
    header('location: ../painel.php');

}
 
if(isset($_POST['logout'])){

    session_destroy();
    header('location: ../');
}

?>