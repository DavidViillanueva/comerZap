<!-- pagina para editar servicio a base de datos -->

<?php //print_r($datos); ?>

<div>
    <title><?php echo $titulo; ?></title>
    <h1><?php echo $titulo; ?></h1>
</div>

<div>


<form method="POST" action="<?php echo base_url(); ?>/servicio/actualizar">
    <?php 
        if(isset($datos)){
            $codServ = $datos['id_servicio'];
            $codProv = $datos['id_proveedor'];
            $codCat = $datos['id_categoria_servicio'];
            $matricula = $datos['matricula'];
            $nombre = $datos['nombre_fantacia'];
        }
    ?>

    <input type="hidden" value="<?php echo $codServ; ?>" name="id" />    

        <div class="form-group">
            
            <div class="row">
                <div>
                    <label for="">Proveedor: </label>
                    <select name="proveedor">
                        <option value="<?php echo $codProv; ?>"><?php echo $datos['id_proveedor']; ?></option>
                            <?php foreach($proveedor as $pro_item) :?>
                                <option value="<?= esc($pro_item['id_proveedor']);?>"><?= esc($pro_item['id_proveedor']);?></option>
                            <?php endforeach; ?>
                    </select>
                </div>
                <div class="col-12 col-sm-6">
                    <label for="">Categoria: </label>
                    <select name="categoria_servicio">
                        <option value="<?php echo $codCat; ?>"><?php echo $datos['id_categoria_servicio']; ?></option>
                        <?php foreach($categoria as $ca_item): ?>
                            <option value="<?= esc($ca_item['id_categoria_servicio']);?>"><?= esc($ca_item['nombre']);?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-sm-6">
                    <label for="">Matricula</label>
                    <input type="text" class="form-control" id="matricula" name="matricula" value="<?php echo $matricula; ?>"/>
                </div>
                <div class="col-12 col-sm-6">
                    <label for="">Nombre</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $nombre; ?>"/>
                </div>
            </div>
        </div>

        <a href="<?php echo base_url();?>/servicio" class="btn btn-primary">Regresar</a>
        <button type="submit" class="btn btn-success">Editar</button>
        
    </form>

</div>