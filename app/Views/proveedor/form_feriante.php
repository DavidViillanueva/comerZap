<link rel="stylesheet" href="<?php echo base_url(); ?>/assets/styles/proveedor/style_registro_comercio.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>/assets/styles/fragments/formularios.css">
<div class="form_centerContainer">
    <div class="register_block">
        <form class="register_form"  method="post" enctype="multipart/form-data">
                <div class="header">
                    <h1>Registrate como feriante</h1>
                </div>
                <div class="content">
                    <div class="columna1">
                        <!-- nombre -->
                        <label for="nombre">Nombre de su emprendimiento</label>
                        <input type="text" name="nombre" id="nombre" maxlength=40>
                        <!-- imagenes -->
                        <label for="images">Imagenes productos</label>
                        <input type="file" multiple="" accept="image/jpg,image/jpeg,image/png" name="images[]" class="input_editado">
                        <font color="#3d3d3d" size="2px">Maximo 5 imagenes!</font>
                    </div>

                    <div class="columna2">
                        <!-- logo -->
                        <label for="logo">Logo:</label>
                        <input type="file" name="logo" id="logo" accept="image/jpg,image/jpeg,image/png" class="input_editado">
                        <!-- descripcion -->
                        <div class="text">
                        <label for="descripcion">Descripcion</label>
                        <textarea name="descripcion" id="descripcion" cols="60" rows="5"></textarea>
                        </div>
                    </div>

                </div>
            <div class="bottom">
            </div>
        </form>
    </div>
</div>
