
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<link href="https://fonts.googleapis.com/css2?family=Ubuntu&display=swap" rel="stylesheet">


<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- css only for this View File -->
<link rel="stylesheet" href="<?php echo base_url(); ?>/assets/styles/fragments/form.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>/assets/styles/base.css">

<title>ComerZap - Registro</title>


<script >
    recargarLista = async (e) => {
        const id = e.value;
        var myHeaders = new Headers();
        myHeaders.append("Content-Type", "application/json");

        var raw = JSON.stringify({
        "id_provincia": id
        });

        var requestOptions = {
        method: 'POST',
        headers: myHeaders,
        body: raw,
        redirect: 'follow'
        };

        fetch("http://localhost:8080/localidades", requestOptions)
        .then(response => response.json())
        .then(result => {
            var select = document.getElementById("localidad");
            result.map( (e,index) => {
                select.options[index] = new Option(e.nombre,e.id_localidad);
            })
        }
        )
        .catch(error => console.log('error', error));



    }

</script>
<body style="   
    display: flex;
    justify-content: center;
    align-content: center;"
>
    <div class="container-center">
        <div class="form__containerRounded">
            <h3>Registro</h3>
    
            <form action="POST" class="form__column">
                <div class="row g-3">
                    <div class="col-sm">
                        <div class="form__item">
                            <input  class="form-control" type="text" name="nombre" id="nombre"  placeholder="Nombre" required>
                        </div>
                    </div>
                    <div class="col-sm">
                        <div class="form__item">
                            <input class="form-control" type="text" name="apellido" id="apellido" placeholder="Apellido" required>
                        </div>
                    </div>
                </div>
                
                <div class="row g-3">
                    <div class="col-md-6">
                        <div class="form__item">
                            <input class="form-control" type="email" name="email" id="email" placeholder="email"/> 
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form__item">
                            <input class="form-control" type="number" name="DNI" id="DNI" placeholder="DNI" required>
                        </div>
                    </div>
                </div>

                <div class="form__item">
                    <label for="nacimiento">Nacimiento:</label>
                    <input type="date" id="nacimiento" name="nacimiento"
                        value="2018-07-22"
                        min="1900-01-01" max="2021-12-31"
                        class="form-control">
                </div>

                

                <div class="row g-3">
                    <label class="col" for="genero">Genero</label>
                    <div class="form-check form-check-inline col">
                        <input class="form-check-input" type="radio" name="genero" id="generoMasculino" value="masculino">
                        <label class="form-check-label" for="inlineRadio1">Masculino</label>
                    </div>
                    <div class="form-check form-check-inline col">
                        <input class="form-check-input" type="radio" name="genero" id="generoFemenino" value="femenino">
                        <label class="form-check-label" for="inlineRadio2">Femenino</label>
                    </div>
                    <div class="form-check form-check-inline col">
                        <input class="form-check-input" type="radio" name="genero" id="generoOtro" value="otro">
                        <label class="form-check-label" for="inlineRadio3">Otro</label>
                    </div>
                </div>

                <h4>Domicilio</h4>
                <div class="row row-select">
                    <select class="form-select" aria-label=".form-select-sm example" id="provincia" onchange="recargarLista(this)">
                    <?php foreach ($provincias as $provincia): ?>
                        <option value="<?php  echo $provincia['id_provincia']; ?>">
                            <?= esc( $provincia['nombre']) ?>
                        </option>
                    <?php endforeach; ?>
                    </select>
                    <select class="form-select" aria-label=".form-select-sm example" id="localidad" name="localidad">
                        <option selected>Localidad</option>
                    </select>
                </div>

                <div class="row g-3">
                    <div class="col-sm">
                        <div class="form__item">
                            <input class="form-control" type="text" name="barrio" id="barrio" placeholder="Barrio"/> 
                        </div>
                    </div>
                    <div class="col-sm">
                        <div class="form__item">
                            <input class="form-control" type="number" name="calle" id="calle" placeholder="Calle" required>
                        </div>
                    </div>
                    <div class="col-sm">
                        <div class="form__item">
                            <input class="form-control" type="number" name="altura" id="altura" placeholder="Altura" required>
                        </div>
                    </div>
                </div>
                <div class="form__item">
                    <input type="submit" class="btn btn-primary" value="Ingresar">
                </div>
    
                <div class="form__helper">
                    <a >¿Ha olvidado su contraseña?</a>
                </div>
                <div class="form__helper">
                    <a href="<?php echo base_url(); ?>/register" >Registrarse</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>