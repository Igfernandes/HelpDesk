<?php 
    session_start();

/**
 *  SETTINGS
 */
    require '../settings/vars/vars.php';

    require '../settings/archive/archive.php';



/*
** LOGIN SCRIPTS
*/
if(isset($_POST['validation'])) require './login/index.php';


/**
 * REGISTER SCRIPTS
 */
if(isset($_POST['register'])) require './register/index.php';


?>