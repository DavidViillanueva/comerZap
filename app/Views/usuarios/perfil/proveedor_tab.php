<?php if( $isProveedor ):  ?>
    <h3>¡Ya sos proveedor!</h3>
    <p>
      Ahora que ya sos proveedor, podes crear un servicio, comercio o feria dependiendo de el rubro que quieras desempeñar! 
      La creacion es muy facil y guiada asique no te asustes!
    </p>
    <!-- Aca deberia verificar los comercios/servicios/ferias que tiene y si no tiene hacer un link a la pantalla de seleccion -->
    <div class="col align-self-center">
      <a class="btn btn-primary" href="<?= route_to('createproveedor') ?>">Crear</a>
    </div>

<?php else: ?>
    <div class="row align-items-center container-button">
      <div class="col align-self-center">
        <a class="btn btn-primary" href="<?= route_to('createproveedor') ?>">Convertirme en proveedor</a>
      </div>
    </div>
<?php endif; ?>