
<?php require './header.php'; ?>


<main class="register">
    <div class="content">
        <div class="row">
            <div class="col-12">
                <div class="form-content">
                    <form action="./services/autoload.php" method="POST">
                        <div class="form-title">
                            <h3>REGISTROS DE OCORRÊNCIAS</h3>
                        </div>
                        <div class="form-row">
                            <div class="form-col w-6">
                                <input type="text" name="name" id="name" placeholder=" " required>
                                <label for="name">Nome*</label>
                            </div>
                            <div class="form-col w-6">
                                <input type="email" name="email" id="email" placeholder=" " required>
                                <label for="email">E-mail*</label>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-col w-6">
                                <input type="text" name="telefone" id="telefone" placeholder=" " required>
                                <label for="telefone">Telefone/Celular*</label>
                            </div>
                            <div class="form-col w-6">
                                <label for="ocorrencia" class="none">Data da Ocorrência:</label>
                                <input type="date" name="ocorrencia" id="ocorrencia" required>
                            </div>
                        </div>
                        <div class="form-select">
                            <div class="form-col w-12">
                                <select name="tipo" id="tipo">
                                    <option value="">Selecione</option>
                                    <option value="software">Software</option>
                                    <option value="Hardware">Hardware</option>
                                    <option value="">Comercial</option>
                                </select>
                                <label for="tipo" class="none">Tipos</label>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-col w-12">
                                <textarea name="descricao" id="descricao"  rows="8" placeholder="Mensagem" required></textarea>
                            </div>
                        </div>
                        <div class="form-btn">
                            <input type="hidden" name="save">
                            <button type="submit" name="register" class="btn-tp-1">ENVIAR</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>



<?php require './footer.php'; ?>