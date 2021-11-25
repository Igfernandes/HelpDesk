<?php 
    require './header.php'; 
?>

<main class="login">
    <div class="content">
        <div class="row">
            <div class="col-12">
                <div class="form">
                    <form action="./services/autoload.php" method="POST">
                        <div class="form-title">
                            <h3>LOGIN</h3>
                            <input type="hidden" name="conect">
                        </div>
                        <div class="form-row mt-5">
                            <div class="form-col">
                                <label for="email" class="none">E-mail</label>
                                <input type="email" name="email" id="email" placeholder="E-mail" required>
                            </div>
                        </div>
                        <div class="form-row mt-5">
                            <div class="form-col">
                                <label for="password" class="none">Senha</label>
                                <input type="password" name="password" id="password" placeholder="Senha" required>
                            </div>
                        </div>
                        <div class="form-btn">
                            <input type="hidden" name="validation">
                            <button class="btn-tp-1" type="submit" name="conect">ENTRAR</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>



<?php require './footer.php'; ?>