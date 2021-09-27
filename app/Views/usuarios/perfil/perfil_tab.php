

    <h1>Hola <?php print_r(user()->username) ?>!</h1>
    
    <?php if( $isComplete ):  ?>

        <div class="row">
            <div class="col-sm-6">
                <div class="card text-start">
                    <div class="card-header">
                        <h5 class="card-title">Informacion personal:</h5>
                    </div>
                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Nombre: <?= session('persona.nombre') ?></li>
                            <li class="list-group-item">Apellido: <?= session('persona.apellido') ?></li>
                            <li class="list-group-item">DNI: <?= session('persona.DNI') ?></li>
                            <li class="list-group-item">Fecha de Nacimiento: <?= session('persona.fecha_nacimiento') ?></li>
                            <li class="list-group-item">Mail: <?= session('persona.mail') ?></li>
                        </ul>
                    </div>
                    <div class="card-footer">
                        <a href="#" class="btn btn-primary">Editar</a>
                    </div>
                </div>
            </div>

            <div class="col-sm-6">
                <div class="card text-start">
                    <div class="card-header">
                        <h5 class="card-title">Domicilio</h5>
                    </div>
                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Barrio: <?= session('domicilio.barrio') ?></li>
                            <li class="list-group-item">Calle: <?= session('domicilio.calle') ?></li>
                            <li class="list-group-item">Altura: <?= session('domicilio.altura') ?></li>
                            <li class="list-group-item">Piso: <?= session('domicilio.piso') ?></li>
                            <li class="list-group-item">Departamento: <?= session('domicilio.departamento') ?></li>
                            <li class="list-group-item">Cod. Postal: <?= session('domicilio.postal') ?></li>
                        </ul>
                    </div>
                    <div class="card-footer">
                        <a href="#" class="btn btn-primary">Editar</a>
                    </div>
                </div>
            </div>


        </div>

        
    <?php else: ?>
        <h4>Bienvenido a tu pagina de usuario</h4>
        <p>
            Aca vas a poder convertirte en proveedor, realizar cambios en tu cuenta y muchas cosas mas.
        </p>
        <h4>Antes de comenzar debes completar algunos datos...</h4>
        <div class="row align-items-start">
            <div class="col"></div>
            <div class="col-5">
                <h5 class="mt-4 mb-4">Primero contanos de vos..</h5>
                <form action="<?= route_to('completeprofile') ?>" method="post">
                    <div class="row mt-3 mb-3">
                        <?php if(session('errors.server')) : ?>
                            <div class="alert alert-danger" role="alert">
                                <?= session('errors.server') ?>
                            </div>
                        <?php endif ?>

                        <div class="col">
                            <input type="text" name="nombre" class="form-control <?php if(session('errors.nombre')) : ?>is-invalid<?php endif ?>" placeholder="Nombre" aria-label="Nombre">
                                                       
                            <div class="invalid-feedback">
                                <?= session('errors.nombre') ?> 
                            </div>
                        </div>
                        <div class="col">
                            <input type="text" name="apellido" class="form-control <?php if(session('errors.apellido')) : ?>is-invalid<?php endif ?>" placeholder="Apellido" aria-label="Apellido">
                            <div class="invalid-feedback">
                                <?= session('errors.apellido') ?> 
                            </div>
                        </div>
                        <div class="col">
                            <input type="text" name="dni" class="form-control <?php if(session('errors.dni')) : ?>is-invalid<?php endif ?>" placeholder="Nro de documento" aria-label="dni">
                            <div class="invalid-feedback">
                                <?= session('errors.dni') ?> 
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3 mb-3">
                        <div class="col">
                            <label for="fechaNacimiento" class="form-label">Fecha de nacimiento:</label>
                            <input name="fechaNacimiento" type="date" class="form-control <?php if(session('errors.fechaNacimiento')) : ?>is-invalid<?php endif ?>" aria-label="Fecha de Nacimiento">
                            <div class="invalid-feedback">
                                <?= session('errors.fechaNacimiento') ?> 
                            </div>
                        </div>
                        <div class="col">
                            <label for="sexo" class="form-label">Sexo:</label>
                            <select name="sexo" class="form-select" aria-label="Default select example">
                                <option selected>Sexo</option>
                                <option value="M">Masculino</option>
                                <option value="F">Femenino</option>
                                <option value="O">Prefiero no decirlo</option>
                            </select>
                        </div>
                    </div>
                    <h5 class="mt-4 mb-4">Y por ultimo decinos donde vivis</h5>
                    <div class="row mt-3 mb-3">
                        <div class="col">
                            <input type="text" name="barrio" class="form-control <?php if(session('errors.barrio')) : ?>is-invalid<?php endif ?>" placeholder="Barrio" aria-label="Barrio">
                            <div class="invalid-feedback">
                                <?= session('errors.barrio') ?> 
                            </div>
                        </div>
                    </div>

                    <div class="row mt-3 mb-3">
                        <div class="col">
                            <input type="text" name="calle" class="form-control <?php if(session('errors.calle')) : ?>is-invalid<?php endif ?>" placeholder="Calle" aria-label="Calle">
                            <div class="invalid-feedback">
                                <?= session('errors.calle') ?> 
                            </div>
                        </div>
                    </div>

                    <div class="row mt-3 mb-3">
                        <div class="col">
                            <input type="number" name="altura" class="form-control <?php if(session('errors.altura')) : ?>is-invalid<?php endif ?>" placeholder="Altura" aria-label="Altura">
                            <div class="invalid-feedback">
                                <?= session('errors.altura') ?> 
                            </div>
                        </div>
                        <div class="col">
                            <input type="number" name="piso" class="form-control" placeholder="Piso" aria-label="Piso">
                        </div>
                        <div class="col">
                            <input type="text" name="dpto" class="form-control" placeholder="Departamento" aria-label="Dpto">
                        </div>
                        <div class="col">
                            <input type="number" name="postal" class="form-control <?php if(session('errors.postal')) : ?>is-invalid<?php endif ?>" placeholder="Codigo Postal" aria-label="Codigo Postal">
                            <div class="invalid-feedback">
                                <?= session('errors.postal') ?> 
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Enviar</button>
                </form>
            </div>

            <div class="col"></div>
        </div>
        
    <?php endif; ?>
    