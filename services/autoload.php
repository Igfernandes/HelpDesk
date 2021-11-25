<?php 
    session_start();

/*
** LOGIN COMANDS
*/
if(isset($_POST['validation'])) require './login/index.php';

if(isset($_POST['register'])) require './register/index.php';


?>