<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Google Fonts CDN -->
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu&display=swap" rel="stylesheet">


    <!-- Bostrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>


    <!-- Estilo base -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/styles/base.css">
    <!-- Estilo template sb-admin -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/styles/styles.css">
    <!-- Estilo template vali-admin -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/styles/main.css">
    <!-- css only for this View File -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/styles/fragments/header.css">
</head>
<body>

<header>
    
    <nav class="navbar navbar-expand-lg navbar-light bg-green">
        <div class="container">
            <a class="navbar-brand" href="<?php echo base_url(); ?>">
                <div class="header__logo"></div>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
        <div class="container-fluid justify-content-end">
            <div class="row justify-content-end">

                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                        <a class="nav-link" aria-current="page" href="/">Inicio</a>
                        <a class="nav-link" href="<?php echo base_url(); ?>/comercio">Comercios</a>
                        <a class="nav-link" href="<?php echo base_url(); ?>/servicio">Servicios</a>
                        <a class="nav-link" href="<?php echo base_url(); ?>/login">Login</a>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</header>