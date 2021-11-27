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
                        <label for="cuilt">Ingresa tu cuil/cuit</label>
                        <input type="text" name="cuilt" id="cuilt" required maxlength="20">

                        <label for="rubro">Rubro:</label>
                        <select name="rubro" id="rubro">
                            <!-- cargar por php foreach de la tabla rubro -->
                            <?php foreach($rubros as $rubro): ?>
                                <option value="<?= $rubro['Id_rubro']?>" > <?= $rubro['nombre'] ?> </option>
                            <?php endforeach;?>
                        </select>
                    </div>
                    <div class="columna2">
                        <div class="plocal">
                            <input type="checkbox" id="plocal" name="plocal" checked>
                            <label for="plocal">Productor local</label>
                        </div>
                    </div>
                </div>
            <div class="bottom">
                <input type="submit" value="Siguiente">
                <a href="../Indexs.php"><input type="button" value="Volver Inicio"></a>
            </div>
        </form>
    </div>
</div>
