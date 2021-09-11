
<link rel="stylesheet" type="text/css" href="./assets/styles/fragments/profile.css">
<script src="https://kit.fontawesome.com/5d5c86fd92.js" crossorigin="anonymous"></script>

<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>


<body>

    <main class="profile mt-5">
		<div class="cuerpo">
            <!-- imagen user -->
            <div class="user">
                <img class="icon-shop" src="./assets/img/profile-default.jpg" alt="">
            </div>

            <!-- menu por tabs -->
            
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="perfil-tab" data-bs-toggle="tab" data-bs-target="#perfil" type="button" role="tab" aria-controls="perfil" aria-selected="true">Perfil</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="Proveedor-tab" data-bs-toggle="tab" data-bs-target="#Proveedor" type="button" role="tab" aria-controls="Proveedor" aria-selected="false">Proveedor</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="personal-tab" data-bs-toggle="tab" data-bs-target="#personal" type="button" role="tab" aria-controls="personal" aria-selected="false">personal</button>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                
                <div class="tab-pane fade show active" id="perfil" role="tabpanel" aria-labelledby="perfil-tab">
                    <?= $this->include("usuarios/perfil/perfil_tab") ?>
                </div>
                <div class="tab-pane fade" id="Proveedor" role="tabpanel" aria-labelledby="Proveedor-tab">
                    <?= $this->include("usuarios/perfil/proveedor_tab") ?>
                </div>
                <div class="tab-pane fade" id="personal" role="tabpanel" aria-labelledby="personal-tab">
                    <?= $this->include("usuarios/perfil/personal_tab") ?>
                </div>
            </div>

        </div>

        <aside>
            <h1>Categorias</h1>
            <nav class="categorias" id="navegador">
				<ul>
					<li><a href="#">Categoria 1</a></li>
					<li><a href="#">Categoria 2</a></li>
					<li><a href="#">Categoria 3</a></li>
					<li><a href="#">Categoria 4</a></li>
					<li><a href="#">Categoria 5</a></li>
				</ul>
			</nav>
        </aside>
	</main>
</body>