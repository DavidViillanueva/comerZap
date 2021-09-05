<?php 
    /** despues de haber hecho todo, me quedo la duda de por que puse algunos datos en etiquetas selects, pero bueno, los datos se guardan y se traen de la bd, se pueden meter en un input tranquilamente */
?>
<div>
    <h1>Crear Comercios</h1>
</div>
<form action="save" method="post">
    <div class="form-group">
        <div class="row">
            <div class="col-12 col-sm-6">
                <label for="">Proveedor: </label>
                <select name="id_proveedor">
                    <option value="0">Seleccione Proveedor</option>
                        <?php foreach($proveedor as $pro_item) :?>
                            <option value="<?= esc($pro_item['id_proveedor']);?>"><?= esc($pro_item['id_proveedor']);?></option>
                        <?php endforeach; ?>
                </select>
            </div>
            <div class="col-12 col-sm-6">
                <label for="">Domicilio: </label>
                <select name="id_domicilio"> 
                    <option value="0">Seleccione Domicilio</option>
                    <?php foreach($domicilio as $do_item) :?>
                        <option value="<?= esc($do_item['id_domicilio']); ?>"><?= esc($do_item['id_domicilio']);?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="col-12 col-sm-6">
                <label for="">Categoria: </label>
                <select name="id_categoria">
                <option value="0">Seleccione Categoria</option>
                    <?php foreach($categoria as $ca_item): ?>
                        <option value="<?= esc($ca_item['id_categoria_comercio']);?>"><?= esc($ca_item['nombre']);?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            
        </div>
        
        <div class="row">
            <div class="col-12 col-sm-6">
                <label for="">Nombre Comercio: </label>
                <input type="text" class="form-control" name="nombre_comercio" id="" value=<?php $nc;?>>
            </div>
            <div class="col-12 col-sm-6">
                <label for="">Delivery: </label>
                <input type="text" class="form-control" name="delivery" id="" value=<?php $del;?>>
            </div>
            <div class="col-12 col-sm-6">
                <label for="">Licencia Comercial: </label>
                <input type="text" class="form-control" name="licencia_comercial" id="" value=<?php $lc;?>>
            </div>
            <div class="col-12 col-sm-6">
                <label for="">Pagina Web: </label>
                <input type="text" class="form-control" name="pagina_web" id="" value=<?php $pw; ?>>
            </div>
            <div class="col-12 col-sm-6">
                <label for="">Mail: </label>
                <input type="text" class="form-control" name="mail" id="" value=<?php $mail; ?>>
            </div>
            <div class="col-12 col-sm-6">
                <label for="">Descripción: </label>
                <input type="text" class="form-control" name="descripcion" id="" value=<?php $desc; ?>>
            </div>
            
        </div> 
    </div>
    
    <input type="submit" value="Guardar" class="btn btn-success"> 
    <a href="<?php echo base_url();?>/comercio-admin" class="btn btn-primary">Regresar</a><br>
</form>