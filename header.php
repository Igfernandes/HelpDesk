<?php 
    require_once './settings/functions.php';
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>App - Help Desk</title>

    <link rel="stylesheet" href="<?= CSS ?>/style.css">
</head>
<body>


<header>
    <div class="content">
        <div class="row">
            <div class="col-12">
                <div class="box">
                    <div class="logo">
                        <a href="./">
                            <div class="logo-img">
                                <img src="<?= IMG ?>/logotipo.png" alt="Logotipo em PNG">
                            </div>
                        </a>
                    </div>
                    <?php if(isset($_SESSION['status']) && $_SESSION['status'] == true): ?>
                    <div class="exit">
                        <form action="./services/autoload.php" method="POST">
                            <div class="exit-btn">
                                <input type="hidden" name="validation">
                                <button class="btn-tp-2" type="submit" name="logout">Sair</button>
                            </div>
                        </form>
                    </div>
                    <?php endif;?>
                </div>
            </div>
        </div>
    </div>
</header>
