<head>
<link rel="stylesheet" href="<?php echo base_url(); ?>/assets/styles/proveedor/style_registro_comercio.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>/assets/styles/fragments/formularios.css">
</head>
<body>
	<main class="main">
		<div class="register_block">
        <form action="php/registrar_servicio.php" method="post" enctype="multipart/form-data">
                <div class="header">
                    <h1>Registrate como proveedor de servicio</h1>
                </div>
                <div class="content">
                    <div class="columna1">
                        <h3>Datos</h3>
                        <!-- nombre fantasia  -->
                        <label for="nombre">Nombre de fantasia</label>
                        <input type="text" name="nombre" id="nombre" maxlength="30" requiered>
                        <!-- logo -->
                        <label for="logo">Logo:</label>
                        <input type="file" name="logo" id="logo" accept="image/jpg,image/jpeg,image/png" class="input_editado">
                        <!-- matricula -->
                        <label for="matricula">Matricula</label>
                        <input type="number" name="matricula" id="matricula" maxlength="20">

                        <!-- categoria -->
                        <label for="categ_servicio">Categoria</label>
                        <select name="categ_servicio" id="categ_servicio">
                        </select>
                    </div>

                    <div class="columna2">
                        <h3>Datos del Servicio</h3>
                        <!-- descripcion -->
                        <div class="text">
                        <label for="descripcion">Descripcion</label>
                        <textarea name="descripcion" id="descripcion" cols="60" rows="5"></textarea>
                        </div>
                        <!-- fotos -->
                        <label for="images">Fotos:</label>
                        <input type="file" multiple="" accept="image/jpg,image/jpeg,image/png" name="fotos[]" class="input_editado">
                        <br>
                    </div>
                </div>
            <div class="bottom">
            </div>
        </form>
	   </div>
    </main>

</body>
</html>