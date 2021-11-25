
<?php require './header.php'; ?>


<main class="register">
    <div class="content">
        <div class="row">
            <?php
                if(isset($_SESSION['rgt'][$_GET['id']])):
                    $info = $_SESSION['rgt'][$_GET['id']]; ?>
            <div class="col-12">
                <div class="form-content">
                    <form action="./services/autoload.php" method="POST">
                        <div class="form-title">
                            <h3>OCORRÊNCIA DE <?= strtoupper($info['nome']) ?></h3>
                        </div>
                        <div class="form-row">
                            <div class="form-col w-6">
                                <input type="text" name="nome" id="name" disabled  value="<?= $info['nome'] ?>" required>
                                <label for="name">Nome*</label>
                            </div>
                            <div class="form-col w-6">
                                <input type="email" name="email" id="email" disabled value="<?= $info['email'] ?>" required>
                                <label for="email">E-mail*</label>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-col w-6">
                                <input type="text" name="telefone" id="telefone" disabled value="<?= $info['telefone'] ?>" max="15" required>
                                <label for="telefone">Telefone/Celular*</label>
                            </div>
                            <div class="form-col w-6">
                                <label for="ocorrencia" class="none">Data da Ocorrência:</label>
                                <input type="date" name="ocorrencia" id="ocorrencia" disabled value="<?= $info['data'] ?>" required>
                            </div>
                        </div>
                        <div class="form-select">
                            <div class="form-col w-6">
                                <label for="tipo" >Tipo</label>
                                <select name="tipo" id="tipo">
                                    <option value="<?= $info['tipo'] ?>"><?= $info['tipo'] ?></option>
                                </select>
                            </div>
                            <div class="form-col w-6">
                                <label for="status" >Situação</label>
                                <select name="status" id="status">
                                    <option value="Aberto" <?php if($info['status'] == "Aberto") echo "selected"?>>Aberto</option>
                                    <option value="Processando" <?php if($info['status'] == "Processando") echo "selected"?>>Pocessando</option>
                                    <option value="Rejeitado" <?php if($info['status'] == "Rejeitado") echo "selected"?>>Rejeitado</option>
                                    <option value="Resolvido" <?php if($info['status'] == "Resolvido") echo "selected"?>>Resolvido</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-col w-12">
                                <textarea name="descricao" id="descricao"  rows="8" disabled required><?= $info['descricao']['text'] ?></textarea>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-col w-12">
                                <textarea name="resposta" id="resposta"  rows="8" ><?php if(isset($info['descricao'])) echo $info['descricao']['resposta'] ?></textarea>
                            </div>
                        </div>
                        <div class="form-btn">
                            <input type="hidden" name="update" value="<?= $_GET['id'] ?>">
                            <button type="submit" name="register" class="btn-tp-1">ALTERAR</button>
                        </div>
                    </form>
                </div>
            </div>
            <?php 
                endif;?>
        </div>
    </div>
</main>



<?php require './footer.php'; ?>