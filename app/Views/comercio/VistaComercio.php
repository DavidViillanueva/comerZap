<h1>Comercios</h1>
<body>
<a href="<?php echo base_url();?>/comercio/create"><input type="button" value="Crear Comercio"></a><br><br>
    <table border = '1' align='center'>
        <tr>
            <th>Id Comercio</th>
            <th>Id Proveedor</th>
            <th>Id Domicilio</th>
            <th>Id Categoria</th>
            <th>Nombre Comercio</th>
            <th>Delivery</th>
            <th>Licencia Comercial</th>
            <th>Pagina Web</th>
            <th>Mail</th>
            <th>Descripcion</th>
            <th>Borrar</th>
            <th>Modificar</th>
        </tr>
        <?php 
        foreach($comercios as $comercio){
            echo '<tr>';
            echo '<td>'.$comercio['id_comercio'].'</td>';
            echo '<td>'.$comercio['id_proveedor'].'</td>';
            echo '<td>'.$comercio['id_domicilio'].'</td>';
            echo '<td>'.$comercio['id_categoria'].'</td>';
            echo '<td>'.$comercio['nombre_comercio'].'</td>';
            echo '<td>'.$comercio['delivery'].'</td>';
            echo '<td>'.$comercio['licencia_comercial'].'</td>';
            echo '<td>'.$comercio['pagina_web'].'</td>';
            echo '<td>'.$comercio['mail'].'</td>';
            echo '<td>'.$comercio['descripcion'].'</td>';
            echo '<td>';
        ?>
            <a type="button" href="<?php echo base_url(); ?>/comercio/delete?id=<?php echo $comercio['id_comercio']; ?>">Borrar Comercio</a>
        <?php    
            echo '</td>';
            echo '<td>';
        ?>
            <a type="button" href="<?php echo base_url(); ?>/comercio/edit?id=<?php echo $comercio['id_comercio']; ?>">Editar Comercio</a>
        <?php
            echo '</td>';
            echo '</tr>';
        }
        ?>
    </table>
</body>
