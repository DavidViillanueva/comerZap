<h1>homepage</h1>
<?php if (logged_in()) : ?>
    <p> <?php var_dump(user()); ?></p><br>
    <p> Este es el user id: <?php var_dump(user_id()); ?></p><br>
    <p>Aca indica si estoy logueado: <?php var_dump(logged_in()); ?></p><br>
    <?php print_r(user()->email.'<br>');
        print_r(user()->username);
    ?>
<?php else :?>
    <h2>Usuario no logueado</h2>
<?php endif; ?>
<p><a href="/services">Servicios</a></p>
<p><a href="/commerce">Comercios</a></p>
