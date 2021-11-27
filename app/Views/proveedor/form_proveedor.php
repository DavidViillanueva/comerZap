<head>
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/styles/proveedor/style_registro_comercio.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/styles/fragments/formularios.css">
</head>
<div class="form_centerContainer">
    <div class="register_block">
        <form action="#" method="post">
            <div class="header">
                <h1>Registrate como proveedor</h1>
            </div>
            <div class="content">
                <div class="columna1">
                    <!-- CUIT/CUIL -->
                    <div class="form_element">
                        <label for="cuilt">Ingresa tu cuil/cuit</label>
                        <input type="text" name="cuilt" id="cuilt" required maxlength="20">
                    </div>

                    <div class="form_element">
                        <label for="rubro">Rubro:</label>
                        <select  class="form-select"  name="rubro" id="rubro">
                            <!-- cargar por php foreach de la tabla rubro -->
                            <?php foreach($rubros as $rubro): ?>
                                <option value="<?= $rubro['Id_rubro']?>" > <?= $rubro['nombre'] ?> </option>
                            <?php endforeach;?>
                        </select>
                    </div>
                </div>
                <div class="columna2">
                    <div class="form_element">
                        <div class="form-check">
                            <input  class="form-check-input check-input" type="checkbox" id="plocal" name="plocal" checked>
                            <label  class="form-check-label" for="plocal">Productor local</label>
                        </div>
                    </div>          
                </div>
            </div>
            <div class="bottom">
                <div class="element">      
                    <input type="submit" value="Siguiente">
                </div>
                <div class="element">
                    <a href="../Indexs.php"><input type="button" value="Volver Inicio"></a>
                </div>    
            </div>
        </form>
    </div>
</div>
