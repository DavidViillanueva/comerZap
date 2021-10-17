
<div class="containerEdit animate__animated animate__fadeIn">
    <form action="<?php echo base_url(); ?>/profile/editProfile/personalEdit/ <?= esc(session('persona.id_persona'),'url') ?>" method="post" class="center_form">

        <div class="row mt-3 mb-3">
            <h2>Editar informacion personal</h2>
            <?php if(session('errors.server')) : ?>
                <div class="alert alert-danger" role="alert">
                    <?= session('errors.server') ?>
                </div>
            <?php endif ?>

            <div class="col">
                <label for="nombre" class="form-label">Nombre:</label>
                <input 
                    type="text" 
                    name="nombre" 
                    class="form-control <?php if(session('errors.nombre')) : ?>is-invalid<?php endif ?>" 
                    placeholder="Nombre" 
                    aria-label="Nombre"
                    value="<?= session('persona.nombre') ?> "
                >                  
                <div class="invalid-feedback">
                    <?= session('errors.nombre') ?> 
                </div>

                <label for="apellido" class="form-label">Apellido:</label>
                <input 
                    type="text" 
                    name="apellido" 
                    class="form-control <?php if(session('errors.apellido')) : ?>is-invalid<?php endif ?>" 
                    placeholder="Apellido" 
                    aria-label="Apellido"
                    value="<?= session('persona.apellido') ?> "
                >                  
                <div class="invalid-feedback">
                    <?= session('errors.apellido') ?> 
                </div>

                <label for="dni" class="form-label">DNI:</label>
                <input 
                    type="text" 
                    name="dni" 
                    class="form-control <?php if(session('errors.dni')) : ?>is-invalid<?php endif ?>" 
                    placeholder="Nro de documento" 
                    aria-label="dni"
                    value="<?= session('persona.DNI') ?>"
                >
                <div class="invalid-feedback">
                    <?= session('errors.dni') ?> 
                </div> 

                <label for="fechaNacimiento" class="form-label">Fecha de nacimiento:</label>
                <input 
                    name="fechaNacimiento" 
                    type="date" 
                    class="form-control <?php if(session('errors.fechaNacimiento')) : ?>is-invalid<?php endif ?>" 
                    aria-label="Fecha de Nacimiento"
                    value="<?= session('persona.fecha_nacimiento') ?>"
                >
                <div class="invalid-feedback">
                    <?= session('errors.fechaNacimiento') ?> 
                </div>
                    
            </div>
        </div>

        <div class="center_form_bottom">
            <button type="submit" class="btn btn-primary">Editar</button>
            <a class="btn btn-primary" href="<?= route_to('profile') ?>">Cancelar</a>
        </div>
    </form>
</div>