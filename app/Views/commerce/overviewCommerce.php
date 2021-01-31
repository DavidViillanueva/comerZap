<head>
    <title><?= esc($title); ?></title>
</head>


<body>
<h1><?= esc($title); ?></h1>

<?php if( !empty( $commerce) && is_array($commerce) ) : ?>

    <?php foreach( $commerce as $commerce_item ) : ?>
        <h3> 
            <?= esc( $commerce_item['nombre_comercio']); ?> 
        </h3>

        <div>
            <?= esc($commerce_item['descripcion']); ?>
        </div>
        <p><a href="/<?= esc($commerce_item['id_comercio'], 'url'); ?>">Ver Comercio</a></p>

    <?php endforeach; ?>

<?php else: ?>

    <h3>No Commerce</h3>
    <p>Unable to find any commerce for you</p>
    
<?php endif; ?>