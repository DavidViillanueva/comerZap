<!-- pagina para carga de servicio a base de datos -->

<div>
    <h1>Cargar Servicio</h1>
</div>
<div>
    <form method="POST" action="<?php echo base_url(); ?>/servicio/insertar" autocomplete="off">
        <div class="form-group">
            
            <div class="row">
                <div>
                    <label for="">Proveedor: </label>
                    <select name="proveedor">
                        <option value="0">Seleccione Proveedor</option>
                            <?php foreach($proveedor as $pro_item) :?>
                                <option value="<?= esc($pro_item['id_proveedor']);?>"><?= esc($pro_item['id_proveedor']);?></option>
                            <?php endforeach; ?>
                    </select>
                </div>
                <div class="col-12 col-sm-6">
                    <label for="">Categoria: </label>
                    <select name="categoria_servicio">
                        <option value="0">Seleccione Categoria</option>
                        <?php foreach($categoria as $ca_item): ?>
                            <option value="<?= esc($ca_item['id_categoria_servicio']);?>"><?= esc($ca_item['nombre']);?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-sm-6">
                    <label for="">Matricula</label>
                    <input type="text" class="form-control" id="matricula" name="matricula" require/>
                </div>
                <div class="col-12 col-sm-6">
                    <label for="">Nombre</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" require/>
                </div>
            </div>
        </div>

        <a href="<?php echo base_url();?>" class="btn btn-primary">Regresar</a>
        <button type="submit" class="btn btn-success">Guardar</button>
        
    </form>
</div>