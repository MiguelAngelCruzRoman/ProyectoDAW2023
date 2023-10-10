<div class="container">
    <div class="row">
        <h1 align="center">ADMINISTRAR CONSULTAS</h1>
        <div class="col-12">
        <form action="<?= base_url('index.php/medico/buscarConsulta');?>" method="GET">
            <div class="col-5">
                <label for="columnaBusquedaConsulta">Buscar consulta por:</label>
                <select name="columnaBusquedaConsulta" class="form-control">
                    <option value="todo" selected>todos los campos</option>
                    <option value="fecha">fecha</option>
                    <option value="motivo">motivo</option>
                    <option value="status">status</option>
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
                    <th>Fecha</th>
                    <th>Hora</th>
                    <th>Motivo</th>
                    <th>Status</th>
                    <th>Receta</th>
                    <th>Estudios médicos</th>
                    <th>Comentarios</th>
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
                            <a href="<?= base_url('/medico/editarConsulta/'); ?>">
                            <img src="" alt="editar" class="service-img">
                            <h2 class="text-center">Editar Medicamento</h2>
                            </a>
                        </td>
                    </tr>
                </tbody>

            </table>
        </div>
    </div>
    <br>

    <div class="col-md-4">
			<button onclick="window.location='/medico/agregarConsulta'">
				<img src="" alt="agregar" class="service-img">
				<h2 class="text-center">Agregar Consulta</h2>
			</button>

            <button onclick="window.history.back()">
				<img src="" alt="regresar" class="service-img">
				<h2 class="text-center">Regresar</h2>
			</button>
	</div>
</div>

