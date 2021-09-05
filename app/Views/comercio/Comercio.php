<!-- pagina para el usuario cliente -->
<head>
    <title><?= esc($titulo); ?></title>
</head>


<body>
<h1><?= esc($titulo); ?></h1>
<?php if( !empty($datos) && is_array($datos) ) : ?>

    <?php foreach( $datos as $datos_item ) : ?>
        <h3> 
            <?= esc($datos_item['nombre_comercio']); ?> 
        </h3>

        <div>
            <?= esc($datos_item['descripcion']); ?>
        </div>
        <p><a href="/<?= esc($datos_item['id_comercio'], 'url'); ?>">Ver Comercio</a></p>
    <?php endforeach; ?>

<?php else: ?>

    <h3>No Commerce</h3>
    <p>Unable to find any commerce for you</p>
    
<?php endif; ?>