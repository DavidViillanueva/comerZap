
<div class="container">
    <?php if( $type === 'personalEdit'): ?>
        <?= $this->include("usuarios/perfil/editPersonalData.php") ?>
    <?php endif; ?>
    
    <?php if( $type === 'addressEdit'): ?>
        <?= $this->include("usuarios/perfil/editDireccionData.php") ?>
    <?php endif; ?>
</div>
