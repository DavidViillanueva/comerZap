
<link rel="stylesheet" type="text/css" href="./assets/styles/fragments/profile.css">
<script src="https://kit.fontawesome.com/5d5c86fd92.js" crossorigin="anonymous"></script>

<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>


<body>
    <h1>Perfil</h1>

    <main class="profile">
		<div class="cuerpo">
            <!-- imagen user -->
            <div class="user">
                <img class="icon-shop" src="./assets/img/profile-default.jpg" alt="">
            </div>
            <!-- menu por tabs -->
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Home</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Profile</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">Contact</button>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">...</div>
                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">...</div>
                <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">...</div>
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