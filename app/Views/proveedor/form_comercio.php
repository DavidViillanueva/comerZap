
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/styles/proveedor/style_registro_comercio.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/styles/fragments/formularios.css">
<div class="form_centerContainer">
    <div class="register_block">
        <form method="post" enctype="multipart/form-data">
            <div class="header">
                <h1>Registrate como comercio</h1>
            </div>
            <div class="content">
                <div class="columna1">
                    <h3>Datos de Comercio</h3>
                    <!-- nombre fantasia  -->
                    <label for="nombre">Nombre</label>
                    <input type="text" name="nombre" id="nombre" maxlength="40" required>
                    <!-- logo -->
                    <label for="logo">Logo:</label>
                    <font color="#bd2424" size="2px">Formato incorrecto.</font>
                    <input type="file" name="logo" id="logo" accept="image/jpg,image/jpeg,image/png" class="input_editado">
                    <!-- licencia comercial -->
                    <label for="licencia">Licencia comercial</label>
                    <input type="number" name="licencia" id="licencia" maxlength="30" required>
                    <!-- categoria -->
                    <label for="categ">Categoria</label>
                    <select name="categ" id="categ">
                    </select>
                </div>

                <div class="columna2">
                    <h3>Datos de Contacto</h3>
                        <!-- telefono -->
                        <label for="telefono">Telefono:</label>
                        <input type="number" name="telefono" id="telefono" required>
                        <!-- website -->
                        <label for="website">Pagina web</label>
                        <input type="text" name="website" id="website" maxlength="40">
                        <!-- mail -->
                        <label for="mail">E-mail</label>
                        <input type="mail" name="mail" id="mail" maxlength="50">
                    <!-- delivery -->
                    <div class="delivery">
                        <input type="checkbox" id="delivery" name="delivery" checked>
                        <label for="delivery">Delivery</label>
                    </div>
                </div>
            </div>
            <div class="bottom">
                    <!-- descripcion -->
                    <div class="text">
                    <label for="descripcion">Descripcion</label>
                    <textarea name="descripcion" id="descripcion" cols="60" rows="5"></textarea>
                    </div>
            </div>
        </form>
    </div>
</div>