<?php 

    require './header.php'; 

    /**
     * OPEN ARCHIVE
     */
    $archive = fopen("./services/register/data/data.hd", 'r') or die("Unable to open file!");

?>


<main class="register">
    <div class="content">
        <div class="row">
            <?php   
                while(!feof($archive)):
                    $line = fgets($archive);
             
                    if(!empty($line) && strstr($line, "id:".$_GET['id'])): 
                    
            ?>
            <div class="col-12">
                <div class="form-content">
                    <form action="./services/autoload.php" method="POST">
                        <div class="form-title">
                            <h3>OCORRÊNCIA DE <?php echo search($line, "#", "nome") ?></h3>
                        </div>
                        <div class="form-row">
                            <div class="form-col w-6">
                                <input type="text" name="nome" id="name" disabled  value="<?php echo search($line, "#", "nome") ?>" required>
                                <label for="name">Nome*</label>
                            </div>
                            <div class="form-col w-6">
                                <input type="email" name="email" id="email" disabled value="<?php echo search($line, "#", "email") ?>" required>
                                <label for="email">E-mail*</label>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-col w-6">
                                <input type="text" name="telefone" id="telefone" disabled value="<?php echo search($line, "#", "telefone") ?>" max="15" required>
                                <label for="telefone">Telefone/Celular*</label>
                            </div>
                            <div class="form-col w-6">
                                <label for="ocorrencia" class="none">Data da Ocorrência:</label>
                                <input type="date" name="ocorrencia" id="ocorrencia" disabled value="<?php echo search($line, "#", "data") ?>" required>
                            </div>
                        </div>
                        <div class="form-select">
                            <div class="form-col w-6">
                                <label for="tipo" >Tipo</label>
                                <select name="tipo" id="tipo">
                                    <option value="<?php echo search($line, "#", "tipo") ?>"><?php echo search($line, "#", "tipo") ?></option>
                                </select>
                            </div>
                            <div class="form-col w-6">
                                <label for="status" >Situação</label>
                                <select name="status" id="status">
                                    <option value="Aberto" <?php if(strstr(search($line, "#", "status"),"Aberto")) echo "selected"?>>Aberto</option>
                                    <option value="Processando" <?php if(strstr(search($line, "#", "status"), "Processando")) echo "selected"?>>Pocessando</option>
                                    <option value="Rejeitado" <?php if(strstr(search($line, "#", "status"), "Rejeitado")) echo "selected"?>>Rejeitado</option>
                                    <option value="Resolvido" <?php if(strstr(search($line, "#", "status"), "Resolvido")) echo "selected"?>>Resolvido</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-col w-12">
                                <textarea name="descricao" id="descricao"  rows="8" disabled required><?php echo search($line, "#", "descricao")[0] ?></textarea>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-col w-12">
                                <textarea name="resposta" id="resposta"  rows="8" ><?php if(isset(search($line, "#", "descricao")[2])): echo search($line, "#", "descricao")[2]; endif; ?></textarea>
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
                endif;
            endwhile;?>
        </div>
    </div>
</main>


<?php
    fclose($archive);

    require './footer.php'; 
?>