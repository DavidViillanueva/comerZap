<?php //echo $id;?>
<div>
    <title><?php echo $titulo; ?></title>
    <h1><?php echo $titulo; ?></h1>
</div>
<form action="update" method="POST">
<?php
if(isset($datos)){
    $idCo = $datos['id_comercio'];
    $idP = $datos['id_proveedor'];
    $idD = $datos['id_domicilio'];
    $idC = $datos['id_categoria'];
    $nc = $datos['nombre_comercio'];
    $del = $datos['delivery'];
    $lc = $datos['licencia_comercial'];
    $pw = $datos['pagina_web'];
    $mail = $datos['mail'];
    $desc = $datos['descripcion'];
    $activo = $datos['activo'];
    //var_dump($proveedor);
}
?>
<?php /*Comentario sobre los select, al momento de modificar los datos, la unica forma que encontre de tirar el dato correcto en el option fue de la manera <option value="<?php echo $idP; ?>"><?php echo $idP; ?></option>, si desplegamos el option, mostrara el valor repetido, pero es el mismo valor */ ?>

<div class="form-group">
    <div class="row">
        <div class="col-12 col-sm-6">
            <label for="">Proveedor: </label>
            <select name="id_proveedor">
            <option value="<?php echo $idP; ?>"><?php echo $datos['id_proveedor']; ?></option>
                <?php foreach($proveedor as $pro_item) :?>
                        <option value="<?= esc($pro_item['id_proveedor']);?>"><?= esc($pro_item['id_proveedor']);?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="col-12 col-sm-6">
            <label for="">Domicilio: </label>
            <select name="id_domicilio"> 
                <option value="<?php echo $idD; ?>"><?php echo $idD; ?></option>
                <?php foreach($domicilio as $do_item) :?>
                    <option value="<?= esc($do_item['id_domicilio']); ?>"><?= esc($do_item['id_domicilio']);?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="col-12 col-sm-6">
            <label for="">Categoria: </label>
            <select name="id_categoria">
            <?php 
            /** con respecto a este foreach, lo utilizo para no tirar el id de categoria en el option y que me muestre el nombre o tipo de categoria, ej: verduleria, zapateria, etc y no su respectivo id, lo mismo pasa con los anteriores el dato se repite, pero es el mismo */
                foreach ($categoria as $cat) {
                    if($cat['id_categoria_comercio']==$idC){
                        $nomC = $cat['nombre'];
                    }
                }
            ?>
            <option value="<?php echo $idC; ?>"><?php echo $nomC; ?></option>
                <?php foreach($categoria as $ca_item): ?>
                    <option value="<?= esc($ca_item['id_categoria_comercio']);?>"><?= esc($ca_item['nombre']);?></option>
                <?php endforeach; ?>
            </select>
        </div>
             
    </div>
    <div class="row">
        <div class="col-12 col-sm-6">
            <input type="hidden" name="id" value="<?php echo $idCo; ?>">
            <label for="">Nombre Comercio: </label>
            <input type="text" class="form-control" name="nombre_comercio" id="" value="<?php echo $nc;?>">
        </div>
        <div class="col-12 col-sm-6">
            <label for="">Delivery: </label>
            <input type="text" class="form-control" name="delivery" id="" value="<?php echo $del;?>">
        </div>
        <div class="col-12 col-sm-6">
            <label for="">Licencia Comercial: </label>
            <input type="text" class="form-control" name="licencia_comercial" id="" value="<?php echo $lc;?>">
        </div>
        <div class="col-12 col-sm-6">
            <label for="">Pagina Web: </label>
            <input type="text" class="form-control" name="pagina_web" id="" value="<?php echo $pw; ?>">
        </div>
        <div class="col-12 col-sm-6">
            <label for="">Mail: </label>
            <input type="text" class="form-control" name="mail" id="" value="<?php echo $mail; ?>">
        </div>
        <div class="col-12 col-sm-6">
            <label for="">Descripción: </label>
            <input type="text" class="form-control" name="descripcion" id="" value="<?php echo $desc; ?>">
        </div>
        <div class="col-12 col-sm-6">
            <label for="">Activo: </label>   
            <input type="text" class="form-control" name="activo" id="" value="<?php echo $activo; ?>">    
        </div>
    </div>       
        
</div>

    <button type="submit" class="btn btn-success">Modificar</button>
    <a href="<?php echo base_url();?>/comercio-admin" class="btn btn-primary">Regresar</a><br>
</form>