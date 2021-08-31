<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu&display=swap" rel="stylesheet">


    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- css only for this View File -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/styles/fragments/form.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/styles/base.css">

    <title>ComerZap - Registro</title>
</head>
<body style="   
    display: flex;
    justify-content: center;
    align-content: center;"
>
    <div class="container-center">
        <div class="form__containerRounded">
            <h1>Registro</h1>
    
            <form action="<?= route_to('register') ?>" class="form__column" method="post">
                <?= csrf_field() ?>
                <?= view('Myth\Auth\Views\_message_block') ?>

                <div class="form__item">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control <?php if(session('errors.email')) : ?>is-invalid<?php endif ?>" name="email" required>
                </div>
    
                <div class="form__item">
                    <label for="username">Usuario:</label>
                    <input type="text" class="form-control <?php if(session('errors.username')) : ?>is-invalid<?php endif ?>" name="username" required>
                </div>

                <div class="form__item">
                    <label for="password">Contraseña:</label>
                    <input type="password" class="form-control <?php if(session('errors.password')) : ?>is-invalid<?php endif ?>" name="password" required>
                </div>

                <div class="form__item">
                    <label for="pass_confirm">Confirmar contraseña:</label>
                    <input type="password" class="form-control <?php if(session('errors.password')) : ?>is-invalid<?php endif ?>" name="pass_confirm" required>
                </div>
    
                <div class="form__item">
    
                    <input type="submit" class="btn btn-primary" value="Registrarse">
                </div>
    
                <div class="form__helper">
                    <a href="<?= route_to('login') ?>">Ya posee una cuenta?</a>
                </div>
                <div class="form__helper">
                    <a href="<?php echo base_url(); ?>/">Inicio</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
