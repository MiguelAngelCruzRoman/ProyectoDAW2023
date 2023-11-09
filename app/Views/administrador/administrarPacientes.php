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
                </thead>

                <tbody>
                    <?php foreach ($users as $user):if($user->paciente != null):?>
                        <tr>
                            <td><?=$user->paciente?></td>
                            <?php foreach ($usersInfo as $ui): if ($ui->id == $user ->id):?> 
                                <td><?=$ui->primerNombre.' '.$ui->segundoNombre.' '.$ui->apellidoPaterno.' '.$ui->apellidoMaterno?></td>
                                <td><?=$ui->telefono?></td>
                            <?php endif;endforeach ?>
                            <td><?=$user->correo?></td>
                            <td><?=$user->created_at?></td>
                            <td><?=$user->updated_at?></td>
                            <td>
                                <a href="<?= base_url('/administrador/editarPaciente/'); ?>">
                                <img src="https://cdn-icons-png.flaticon.com/128/705/705120.png" alt="editar" class="service-img" width="60" height="60">
                                </a>
                            </td>
                            <td>
                                <a href="<?= base_url('/administrador/eliminarPaciente/'); ?>">
                                <img src="https://cdn-icons-png.flaticon.com/128/3541/3541990.png" alt="eliminar" class="service-img" width="60" height="60">
                                </a>
                            </td>
                        </tr>
                    <?php endif;endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
    <br>

    <div class="col-md-4">
            <input type="image" class="btn btn-primary mt-4" value="Agregar Paciente" src="" onclick="window.location='/administrador/agregarPacientes'">
            <input type="image" class="btn btn-primary mt-4" value="Página Principal" src="" onclick="window.location='/administrador/opciones'">
	</div>
</div>

