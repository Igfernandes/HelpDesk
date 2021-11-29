<?php 

    require './header.php'; 

    /**
     * OPEN ARCHIVE
     */
    $archive = fopen("./services/register/data/data.hd", 'r') or die("Unable to open file!");

?>



<main class="painel">
    <div class="content">
        <div class="row">
            <div class="col-12">
                <div class="menu">
                    <nav>
                        <ul>
                            <li>
                                <a href="./register.php"><svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="file-signature" class="svg-inline--fa fa-file-signature fa-w-18" role="img" viewBox="0 0 576 512"><path fill="currentColor" d="M218.17 424.14c-2.95-5.92-8.09-6.52-10.17-6.52s-7.22.59-10.02 6.19l-7.67 15.34c-6.37 12.78-25.03 11.37-29.48-2.09L144 386.59l-10.61 31.88c-5.89 17.66-22.38 29.53-41 29.53H80c-8.84 0-16-7.16-16-16s7.16-16 16-16h12.39c4.83 0 9.11-3.08 10.64-7.66l18.19-54.64c3.3-9.81 12.44-16.41 22.78-16.41s19.48 6.59 22.77 16.41l13.88 41.64c19.75-16.19 54.06-9.7 66 14.16 1.89 3.78 5.49 5.95 9.36 6.26v-82.12l128-127.09V160H248c-13.2 0-24-10.8-24-24V0H24C10.7 0 0 10.7 0 24v464c0 13.3 10.7 24 24 24h336c13.3 0 24-10.7 24-24v-40l-128-.11c-16.12-.31-30.58-9.28-37.83-23.75zM384 121.9c0-6.3-2.5-12.4-7-16.9L279.1 7c-4.5-4.5-10.6-7-17-7H256v128h128v-6.1zm-96 225.06V416h68.99l161.68-162.78-67.88-67.88L288 346.96zm280.54-179.63l-31.87-31.87c-9.94-9.94-26.07-9.94-36.01 0l-27.25 27.25 67.88 67.88 27.25-27.25c9.95-9.94 9.95-26.07 0-36.01z"/></svg></a>
                            </li>
                            <li>
                                <a href="./ocorrencia.php" class="js-ocorrencia"><svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="user-edit" class="svg-inline--fa fa-user-edit fa-w-20" role="img" viewBox="0 0 640 512"><path fill="currentColor" d="M224 256c70.7 0 128-57.3 128-128S294.7 0 224 0 96 57.3 96 128s57.3 128 128 128zm89.6 32h-16.7c-22.2 10.2-46.9 16-72.9 16s-50.6-5.8-72.9-16h-16.7C60.2 288 0 348.2 0 422.4V464c0 26.5 21.5 48 48 48h274.9c-2.4-6.8-3.4-14-2.6-21.3l6.8-60.9 1.2-11.1 7.9-7.9 77.3-77.3c-24.5-27.7-60-45.5-99.9-45.5zm45.3 145.3l-6.8 61c-1.1 10.2 7.5 18.8 17.6 17.6l60.9-6.8 137.9-137.9-71.7-71.7-137.9 137.8zM633 268.9L595.1 231c-9.3-9.3-24.5-9.3-33.8 0l-37.8 37.8-4.1 4.1 71.8 71.7 41.8-41.8c9.3-9.4 9.3-24.5 0-33.9z"/></svg></a>
                            </li>
                        </ul>
                    </nav>
                </div>
                <div class="table">
                    <div class="table-header">
                        <ul>
                            <li></li>
                            <li>NOME</li>
                            <li>DATA</li>
                            <li>PREVIEW</li>
                            <li>ANDAMENTO</li>
                        </ul>
                    </div>
                    <div class="table-content">
                        <table>
                            <tbody>
                                <?php   
                                    $cout  = 0;
                                    while(!feof($archive)):
                                            $line = fgets($archive);
                                            if(!empty($line)): 
                                            
                                    ?>
                                <tr>
                                    <td><input type="radio" name="registros" value="<?php echo search($line, "#", "id") ?>"></td>
                                    <td><?php echo search($line, "#", "nome") ?></td>
                                    <td><?php 
                                        $data = explode("-", search($line, "#", "data"));
                                        echo $data[2]."/".$data[1]."/".$data[0];
                                    ?></td>
                                    <td><?php echo substr(search($line, "#", "descricao")[0], 0, 43)."..." ?></td>
                                    <td class="<?= strtolower(search($line, "#", "status")) ?>"><?php echo search($line, "#", "status") ?></td>
                                </tr>
                                <?php   
                                            $cout++;
                                        endif;
                                    endwhile;
                                    ?>
                            </tbody>
                        </table>
                    </div>                 
                    <div class="table-footer">
                        <div class="total">
                            <p>Total de Ocorrências: <?php if(isset($cout)) echo $cout; ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>



<?php
    fclose($archive);

    require './footer.php'; 
?>