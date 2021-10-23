<h3>Proveedor</h3>
<?php if( $isProveedor ):  ?>
    <h3>Aun no sos proveedor</h3>
<?php else: ?>
    <div class="row align-items-center container-button">
    <div class="col align-self-center">
      <a class="btn btn-primary" href="<?= route_to('createproveedor') ?>">Convertirme en proveedor</a>
    </div>
    </div>
<?php endif; ?>