
<link rel="stylesheet" href="<?php echo base_url(); ?>/assets/styles/proveedor/style_type.css">
<div class="register_block">
    <form action="#" method="post">
            <div class="header">
                <h1>¿Que tipo de proveedor sos?</h1>
            </div>
            <div class="content">
                <a href="<?php echo base_url(); ?>/ProveedorController/createProveedor/ <?= esc(1,'url') ?>" >
                    <div class="type1" title="Comercias cosas hechas con tus propias manos! No contas con habilitacion ni local fisico.">
                            <span class="fas fa-store icon"></span>
                            <h3>Feriante</h3>
                            <p>Comercias cosas hechas con tus propias manos! No contas con habilitacion ni local fisico.</p>
                    </div>
                </a>

                <a href="<?php echo base_url(); ?>/ProveedorController/createProveedor/ <?= esc(2,'url') ?>" >
                    <div class="type2" title="Ofreces un servicio en el domicilio de tus clientes. Ej: Electricista.">
                            <span class="fas fa-tools"></span>
                            <h3>Servicio</h3>
                            <p>Ofreces un servicio en el domicilio de tus clientes. Ej: Electricista.</p>
                    </div>
                </a>

                <a href="<?php echo base_url(); ?>/ProveedorController/createProveedor/ <?= esc(3,'url') ?>" >
                    <div class="type3" title="Tenes un comercio con habilitacion comercial, local y nombre registrado.">
                            <span class="fas fa-cash-register"></span>
                            <h3>Comercio</h3>
                            <p>Tenes un comercio con habilitacion comercial, local y nombre registrado.</p>
                    </div>
                </a>
            </div>
    </form>
</div>