    <?php if(stristr($_SERVER['SCRIPT_FILENAME'], "painel.php") == TRUE){ ?>
    <div class="content">
        <div class="row">
            <div class="col-12">
                <div class="copyright">
                    <p>Desenvolvido por IgorFernandes</p>
                </div>
            </div>
        </div>
    </div>
    <?php }?>

    <notify>
        <div class="text">
            <span></span>
        </div>
    </notify>

    <script type="module" src="<?= JS ?>/scripts.js"></script>
</body>
</html>