<!-- esta pagina es la que vera el usuario cliente al ingresar al sistema,
y debe mostrar todos los servicios activos cargados de la base de dato -->
<?php 
//prueba bd
//print_r($datos); 
?>

<head>
    <title><?php echo $titulo; ?></title>
</head>

<body>
    <div>
        <h1><?= esc($titulo); ?></h1>
    </div>
    <br>
    
    <?php if( !empty( $datos) && is_array($datos) ) : ?>

        <?php foreach( $datos as $datos_item ) : ?>
            <h3> 
                <?= esc( $datos_item['nombre_fantacia']); ?> 
            </h3>

            <div>
                <?= esc($datos_item['matricula']); ?>
            </div>
            <p><a href="/<?= esc($datos_item['id_servicio'], 'url'); ?>">Ver Servicio</a></p>

        <?php endforeach; ?>

    <?php else: ?>

        <h3>No Commerce</h3>
        <p>Unable to find any commerce for you</p>
        
    <?php endif; ?>

</body>