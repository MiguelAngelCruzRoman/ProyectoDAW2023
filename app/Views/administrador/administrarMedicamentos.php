<div class="container">
    <div class="row">
        <h1 align="center">ADMINISTRAR MEDICAMENTOS</h1>
        <div class="col-12">
        <form action="<?= base_url('index.php/administrador/buscarMedicamentos');?>" method="GET">
                <div class="col-5">
                    <label for="columnaBusquedaMedicamento">Buscar medicamento por:</label>
                    <select name="columnaBusquedaMedicamento" class="form-control">
                            <option value="todo">todos los campos</option>
                            <option value="nombreComercial">nombre comercial</option>
                            <option value="nombreCientifico">nombre científico</option>
                            <option value="forma">forma farmaceutica</option>
                    </select>
                </div>
            
                <div class="col-5">
                    <label for="elementoBusquedaMedicamento">Parecido a:</label>
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
                    <th>Nombre comercial</th>
                    <th>Nombre científico</th>
                    <th>Forma farmacéutica</th>
                    <th>Dosis</th>
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
                            <a href="<?= base_url('/administrador/editarMedicamento/'); ?>">
                            <img src="" alt="editar" class="service-img">
                            <h2 class="text-center">Editar Medicamento</h2>
                            </a>
                        </td>
                        <td>
                            <a href="<?= base_url('/administrador/eliminarMedicamento/'); ?>">
                            <img src="" alt="eliminar" class="service-img">
                            <h2 class="text-center">Eliminar Medicamento</h2>
                            </a>
                            
                        </td>
                    </tr>
                </tbody>

            </table>
        </div>
    </div>
    <br>

    <div class="col-md-4">
			<button onclick="window.location='/administrador/agregarMedicamentos'">
				<img src="" alt="agregar" class="service-img">
				<h2 class="text-center">Agregar Medicamentos</h2>
			</button>

            <button onclick="window.location='/administrador/opciones'">
				<img src="" alt="paginaPrincipal" class="service-img">
				<h2 class="text-center">Página Principal</h2>
			</button>
	</div>
</div>

