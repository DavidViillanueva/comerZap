<?php 
    /** despues de haber hecho todo, me quedo la duda de por que puse algunos datos en etiquetas selects, pero bueno, los datos se guardan y se traen de la bd, se pueden meter en un input tranquilamente */
?>
<h1>Crear Comercios</h1>
<form action="save" method="post">
    <label for="">Proveedor: </label>
    <select name="id_proveedor">
        <option value="0">Seleccione Proveedor</option>
            <?php foreach($proveedor as $pro_item) :?>
                <option value="<?= esc($pro_item['id_proveedor']);?>"><?= esc($pro_item['id_proveedor']);?></option>
            <?php endforeach; ?>
    </select><br><br>
    <label for="">Domicilio: </label>
    <select name="id_domicilio"> 
        <option value="0">Seleccione Domicilio</option>
        <?php foreach($domicilio as $do_item) :?>
            <option value="<?= esc($do_item['id_domicilio']); ?>"><?= esc($do_item['id_domicilio']);?></option>
        <?php endforeach; ?>
    </select><br><br>
    <label for="">Categoria: </label>
    <select name="id_categoria">
    <option value="0">Seleccione Categoria</option>
        <?php foreach($categoria as $ca_item): ?>
            <option value="<?= esc($ca_item['id_categoria_comercio']);?>"><?= esc($ca_item['nombre']);?></option>
        <?php endforeach; ?>
    </select><br><br>
    <label for="">Nombre Comercio: </label>
    <input type="text" name="nombre_comercio" id="" value=<?php $nc;?>><br><br>
    <label for="">Delivery: </label>
    <input type="text" name="delivery" id="" value=<?php $del;?>><br><br>
    <label for="">Licencia Comercial: </label>
    <input type="text" name="licencia_comercial" id="" value=<?php $lc;?>><br><br>
    <label for="">Pagina Web: </label>
    <input type="text" name="pagina_web" id="" value=<?php $pw; ?>><br><br>
    <label for="">Mail: </label>
    <input type="text" name="mail" id="" value=<?php $mail; ?>><br><br>
    <label for="">Descripción: </label>
    <input type="text" name="descripcion" id="" value=<?php $desc; ?>><br><br>
    <input type="submit" value="Guardar"> <a href="<?php echo base_url(); ?>/comercio"><input type="button" value="Cancelar"></a>
</form>