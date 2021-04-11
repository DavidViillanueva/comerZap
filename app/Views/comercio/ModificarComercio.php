<?php //echo $id;?>
<h1>Modificar Comercios</h1>
<form action="update" method="post">
<?php
if(isset($model)){
    $idCo = $model[0]['id_comercio'];
    $idP = $model[0]['id_proveedor'];
    $idD = $model[0]['id_domicilio'];
    $idC = $model[0]['id_categoria'];
    $nc = $model[0]['nombre_comercio'];
    $del = $model[0]['delivery'];
    $lc = $model[0]['licencia_comercial'];
    $pw = $model[0]['pagina_web'];
    $mail = $model[0]['mail'];
    $desc = $model[0]['descripcion'];
    //var_dump($proveedor);
}
?>
<?php /*Comentario sobre los select, al momento de modificar los datos, la unica forma que encontre de tirar el dato correcto en el option fue de la manera <option value="<?php echo $idP; ?>"><?php echo $idP; ?></option>, si desplegamos el option, mostrara el valor repetido, pero es el mismo valor */ ?>
<label for="">Proveedor: </label>
    <select name="id_proveedor">
    <option value="<?php echo $idP; ?>"><?php echo $model[0]['id_proveedor']; ?></option>
        <?php foreach($proveedor as $pro_item) :?>
                <option value="<?= esc($pro_item['id_proveedor']);?>"><?= esc($pro_item['id_proveedor']);?></option>
        <?php endforeach; ?>
    </select><br><br>
    <label for="">Domicilio: </label>
    <select name="id_domicilio"> 
        <option value="<?php echo $idD; ?>"><?php echo $idD; ?></option>
        <?php foreach($domicilio as $do_item) :?>
            <option value="<?= esc($do_item['id_domicilio']); ?>"><?= esc($do_item['id_domicilio']);?></option>
        <?php endforeach; ?>
    </select><br><br>
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
<br><br>
    <input type="hidden" name="id" value="<?php echo $idCo; ?>">
    <label for="">Nombre Comercio: </label>
    <input type="text" name="nombre_comercio" id="" value="<?php echo $nc;?>"><br><br>
    <label for="">Delivery: </label>
    <input type="text" name="delivery" id="" value="<?php echo $del;?>"><br><br>
    <label for="">Licencia Comercial: </label>
    <input type="text" name="licencia_comercial" id="" value="<?php echo $lc;?>"><br><br>
    <label for="">Pagina Web: </label>
    <input type="text" name="pagina_web" id="" value="<?php echo $pw; ?>"><br><br>
    <label for="">Mail: </label>
    <input type="text" name="mail" id="" value="<?php echo $mail; ?>"><br><br>
    <label for="">Descripción: </label>
    <input type="text" name="descripcion" id="" value="<?php echo $desc; ?>"><br><br>
    <input type="submit" value="Guardar Modificacion"> <a href="<?php echo base_url(); ?>/comercio"><input type="button" value="Cancelar Modificacion"></a>
</form>