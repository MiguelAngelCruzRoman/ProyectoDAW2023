<div class="container">
    <div class="row">
        <h1 align="center">ADMINISTRAR MÉDICOS</h1>
        <div class="col-12">
        <form action="<?= base_url('index.php/administrador/buscarMedicos');?>" method="GET">
                <div class="col-5">
                    <label for="columnaBusquedaMedicos">Buscar médico por:</label>
                    <select name="columnaBusquedaMedico" class="form-control">
                            <option value="todo">todos los campos</option>
                            <option value="nombre">nombre</option>
                            <option value="especialidad">especialidad</option>
                            <option value="lugarTrabajo">lugar de trabajo</option>
                    </select>
                </div>
            
                <div class="col-5">
                    <label for="elementoBusquedaMedico">Parecido a:</label>
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
                    <th>Nombre del médico</th>
                    <th>Especialidad</th>
                    <th>Lugar de trabajo</th>
                    <th>Días de trabajo</th>
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
                            <a href="<?= base_url('/administrador/editarMedico/'); ?>">
                            <img src="" alt="editar" class="service-img">
                            <h2 class="text-center">Editar Médico</h2>
                            </a>
                        </td>
                        <td>
                            <a href="<?= base_url('/administrador/eliminarMedico/'); ?>">
                            <img src="" alt="eliminar" class="service-img">
                            <h2 class="text-center">Eliminar Médico</h2>
                            </a>
                            
                        </td>
                    </tr>
                </tbody>

            </table>
        </div>
    </div>
    <br>

    <div class="col-md-4">
        <input type="image" class="btn btn-success mt-4" value="Agregar Médicos" src="" onclick="window.location='/administrador/agregarMedicos'">
        <input type="image" class="btn btn-primary mt-4" value="Página Principal" src="" onclick="window.location='/administrador/opciones'">
	</div>
</div>

