<div class="container">
    <div class="row">
        <h1 align="center">ADMINISTRAR PACIENTES</h1>
        <div class="col-12">
        <form action="<?= base_url('index.php/administrador/buscarPacientes');?>" method="GET">
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

        </div>
    </div>
    <br>

    <div class="row">
        <div class="col-12">
            <table class="table">
            
                <thead>
                    <th>Nombre del paciente</th>
                    <th>Número de contacto</th>
                    <th>Correo electrónico</th>
                    <th>Contraseña</th>
                    <th>Fecha de creación</th>
                    <th>Última modificación</th>
                    <th>Autor de modificación</th>
                </thead>

                <tbody>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>
                            <a href="<?= base_url('/administrador/editarPaciente/'); ?>">
                            <img src="" alt="editar" class="service-img">
                            <h2 class="text-center">Editar Paciente</h2>
                            </a>
                        </td>
                        <td>
                            <a href="<?= base_url('/administrador/eliminarPaciente/'); ?>">
                            <img src="" alt="eliminar" class="service-img">
                            <h2 class="text-center">Eliminar Paciente</h2>
                            </a>
                            
                        </td>
                    </tr>
                </tbody>

            </table>
        </div>
    </div>
    <br>

    <div class="col-md-4">
			<button onclick="window.location='/administrador/agregarPacientes'">
				<img src="" alt="agregar" class="service-img">
				<h2 class="text-center">Agregar Paciente</h2>
			</button>

            <button onclick="window.location='/administrador/opciones'">
				<img src="" alt="paginaPrincipal" class="service-img">
				<h2 class="text-center">Página Principal</h2>
			</button>
	</div>
</div>

