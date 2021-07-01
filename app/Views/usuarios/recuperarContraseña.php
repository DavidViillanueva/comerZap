
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu&display=swap" rel="stylesheet">
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
    />


    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- css only for this View File -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/styles/fragments/form.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/styles/base.css">
    <title>ComerZap - Recuperar contraseña</title>
</head>

<body
    style="   
        display: flex;
        justify-content: center;
        align-content: center;"
>
    <div class="container-center">
        <div class="form__containerRounded animate__animated animate__fadeIn">
            <h1>Recuperar Contraseña</h1>
    
            <form action="POST" class="form__column">
    
                <p>
                    No hay problema! Ingresa el mail con el que te registraste y segui las instrucciones
                    para recuperar tu contraseña!
                </p>

                <div class="form__item">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" name="email" id="email"  required>
                </div>
    
                <div class="form__helper">
                    <a href="<?php echo base_url(); ?>/register" >Registrarse</a>
                </div>
                <div class="form__helper">
                    <a href="<?php echo base_url(); ?>/">Inicio</a>
                </div>
            </form>
        </div>
    </div>
</body>