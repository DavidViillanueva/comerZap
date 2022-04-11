<!-- pagina para el usuario cliente -->
<head>
    <title><?= esc($titulo); ?></title>
</head>


<body>
<h1><?= esc($title); ?></h1>
<?php if( !empty( $commerce) && is_array($commerce) ) : ?>

    <?php foreach( $commerce as $commerce_item ) : ?>
        <h3> 
            <?= esc($commerce_item['nombre_comercio']); ?> 
        </h3>

        <div>
            <?= esc($commerce_item['descripcion']); ?>
        </div>

    <?php endforeach; ?>

<?php else: ?>

    <h3>No Commerce</h3>
    <p>Unable to find any commerce for you</p>
    
<?php endif; ?>