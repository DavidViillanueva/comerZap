<div class="containerEdit animate__animated animate__fadeIn">
    <form action="<?php echo base_url(); ?>/profile/editProfile/addressEdit/ <?= esc($domicilio['id_domicilio'],'url') ?>" method="post" class="center_form">

        <div class="row mt-3 mb-3">
            <h2>Editar informacion de domicilio</h2>
            <?php if(session('errors.server')) : ?>
                <div class="alert alert-danger" role="alert">
                    <?= session('errors.server') ?>
                </div>
            <?php endif ?>

            <div class="col">
                <div class="mt-3 mb-3">
                    <label for="calle" class="form-label">Calle:</label>
                    <input 
                        type="text" 
                        name="calle" 
                        class="form-control <?php if(session('errors.calle')) : ?>is-invalid<?php endif ?>" 
                        placeholder="Calle" 
                        aria-label="calle"
                        value="<?= esc($domicilio['calle']) ?> "
                    >                  
                    <div class="invalid-feedback">
                        <?= session('errors.calle') ?> 
                    </div>
                </div>

                <div class="mt-3 mb-3">
                <label for="barrio" class="form-label">Barrio:</label>
                    <input 
                        type="text" 
                        name="barrio" 
                        class="form-control <?php if(session('errors.barrio')) : ?>is-invalid<?php endif ?>" 
                        placeholder="Barrio" 
                        aria-label="Barrio"
                        value="<?= esc($domicilio['barrio']) ?>"
                    >
                    <div class="invalid-feedback">
                        <?= session('errors.barrio') ?> 
                    </div>
                </div>

                <div class="row mt-3 mb-3">
                    <div class="col">
                        <label for="altura" class="form-label">Altura:</label>
                        <input 
                            type="number" 
                            name="altura" 
                            class="form-control <?php if(session('errors.altura')) : ?>is-invalid<?php endif ?>" 
                            placeholder="Altura" 
                            aria-label="Altura"
                            value="<?= esc($domicilio['altura']) ?>"
                        >
                        <div class="invalid-feedback">
                            <?= session('errors.altura') ?> 
                        </div>
                    </div>
                    <div class="col">
                        <label for="piso" class="form-label">Piso:</label>
                        <input 
                            type="number" 
                            name="piso" 
                            class="form-control" 
                            placeholder="Piso" 
                            aria-label="Piso"
                            value="<?= esc($domicilio['piso']) ?>"
                        >
                    </div>
                    <div class="col">
                        <label for="dpto" class="form-label">Departamento:</label>
                        <input 
                            type="text" 
                            name="dpto" 
                            class="form-control" 
                            placeholder="Departamento" 
                            aria-label="Dpto"
                            value="<?= esc($domicilio['departamento']) ?>"
                        >
                    </div>
                    <div class="col">
                        <label for="postal" class="form-label">Codigo Postal:</label>
                        <input 
                            type="number" 
                            name="postal" 
                            class="form-control <?php if(session('errors.postal')) : ?>is-invalid<?php endif ?>" 
                            placeholder="Codigo Postal" 
                            aria-label="Codigo Postal"
                            value="<?= esc($domicilio['postal']) ?>"
                        >
                        <div class="invalid-feedback">
                            <?= session('errors.postal') ?> 
                        </div>
                    </div>
                </div>

                    
            </div>
        </div>

        <div class="center_form_bottom">
            <button type="submit" class="btn btn-primary">Editar</button>
            <a class="btn btn-primary" href="<?= route_to('profile') ?>">Cancelar</a>
        </div>
    </form>
</div>