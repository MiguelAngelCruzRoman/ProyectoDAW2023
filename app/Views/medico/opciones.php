<div class="container">
    <div class="row">
        <div class="col-12">
                <h2 align="center">¡HOLA, DOCTOR JUAN!</h2>
                <h2 align="center">A QUIÉN ATENDERÁ HOY?</h2>
        </div>
    </div>
<div>

<div class="col-md-4">
	<form action="<?= base_url('index.php/medico/buscarPacientes');?>" method="GET">
        <div class="col-5">
            <label for="columnaBusquedaPaciente">Buscar paciente por:</label>
            <select name="columnaBusquedaPaciente" class="form-control">
                <option value="todo">todos los campos</option>
                <option value="nombre">nombre</option>
                <option value="telefono">número telefónico</option>
                <option value="correo">correo</option>
            </select>
        </div>
            
        <div class="col-5">
            <label for="elementoBusquedaPaciente">Parecido a:</label>
            <input type="text" class="form-control" name="valorCompararBusqueda" value="cualquiera">
        </div>

        <input type="image" class="btn btn-success mt-4" value="Realizar Consulta" src="">
    </form>

	<div class="mb-3">
        <input type="image" class="btn btn-success mt-4" value="Agregar Paciente" src="" onclick="window.location.href='/medico/agregarPacientes'">
        <input type="image" class="btn btn-danger mt-4" value="Eliminar Paciente" src="" onclick="window.location.href='/medico/eliminarPaciente'">
    </div>
</div>

	<div class="row">
		<div class="col-md-3">
			<a href="<?= base_url('index.php/medico/administrarPacientes/'); ?>">
				<img src="" alt="paciente1" class="service-img">
				<h2 class="text-center">Miguel Angel Cruz Roman</h2>
			</a>
		</div>	

        <div class="col-md-3">
			<a href="<?= base_url('index.php/medico/administrarPacientes/'); ?>">
				<img src="" alt="paciente2" class="service-img">
				<h2 class="text-center">Benito Raul Saenz Mora</h2>
			</a>
		</div>	

        <div class="col-md-3">
			<a href="<?= base_url('index.php/medico/administrarPacientes/'); ?>">
				<img src="" alt="paciente3" class="service-img">
				<h2 class="text-center">Camila Cruz Martinez</h2>
			</a>
		</div>	

        <div class="col-md-3">
			<a href="<?= base_url('index.php/medico/administrarPacientes/'); ?>">
				<img src="" alt="paciente4" class="service-img">
				<h2 class="text-center">Ortencia Azul Cristobal de Oca</h2>
			</a>
		</div>
	</div>

    
    <div class="row">
        <div class="col-md-3">
            <a href="<?= base_url('index.php/medico/administrarPacientes/'); ?>">
				<img src="" alt="paciente5" class="service-img">
				<h2 class="text-center">Esteban Ronca Montañez</h2>
			</a>
        </div>

        <div class="col-md-3">
            <a href="<?= base_url('index.php/medico/administrarPacientes/'); ?>">
				<img src="" alt="paciente6" class="service-img">
				<h2 class="text-center">Isabela Gonzáles Grajales</h2>
			</a>
        </div>

        <div class="col-md-3">
            <a href="<?= base_url('index.php/medico/administrarPacientes/'); ?>">
				<img src="" alt="paciente7" class="service-img">
				<h2 class="text-center">Carlos Francisco Mota de la Rosa</h2>
			</a>
        </div>

        <div class="col-md-3">
            <a href="<?= base_url('index.php/medico/administrarPacientes/'); ?>">
				<img src="" alt="paciente8" class="service-img">
				<h2 class="text-center">ERculano Romero Hernández</h2>
			</a>
        </div>
    </div>
</div>