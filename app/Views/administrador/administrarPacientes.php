<div class="container">
    <div class="row">
        <h1 align="center">ADMINISTRAR PACIENTES</h1>
        <div class="col-12">
        <form action="<?= base_url('index.php/administrador/buscarPacientes');?>" method="GET">
                <div class="col-5">
                    <label for="columnaBusquedaPaciente">Buscar paciente por:</label>
                    <select name="columnaBusquedaPaciente" class="form-control">
                            <option value="todo">Cualquier campo</option>
                            <option value="nombre">Nombre</option>
                            <option value="telefono">Número telefónico</option>
                            <option value="username">Username</option>
                            <option value="correo">Correo</option>
                    </select>
                </div>
            
                <div class="col-5">
                    <label for="valIngresado">Parecido a:</label>
                    <input type="text" class="form-control" name="valIngresado" >
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
                    <th>ID</th>
                    <th>Nombre del paciente</th>
                    <th>Número de contacto</th>
                    <th>Correo electrónico</th>
                    <th>Username</th>
                    <th>Fecha de creación</th>
                    <th>Última modificación</th>
                </thead>

                <tbody>
                    <?php foreach ($users as $user):if($user->paciente != null):?>
                        <tr>
                            <?php foreach ($usersInfo as $ui): if ($ui->id == $user ->id):?> 
                                <td><?=$ui->id?></td>
                                <td><?=$ui->primerNombre.' '.$ui->segundoNombre.' '.$ui->apellidoPaterno.' '.$ui->apellidoMaterno?></td>
                                <td><?=$ui->telefono?></td>
                                <td><?=$user->correo?></td>
                                <td><?=$user->username?></td>
                                <td><?=$user->created_at?></td>
                                <?php if($user->updated_at == null):?>
                                    <td>**Sin modificar**</td>
                                <?php else:?>
                                    <td><?=$user->updated_at?></td>
                                <?php endif;?>
                                <td>
                                    <a href="<?= base_url('/administrador/editarPaciente/'.$user->id); ?>">
                                    <img src="https://cdn-icons-png.flaticon.com/128/705/705120.png" alt="editar" class="service-img" width="60" height="60">
                                    </a>
                                </td>
                                <td>
                                    <a href="<?= base_url('/administrador/eliminarPaciente/'.$user->id); ?>">
                                    <img src="https://cdn-icons-png.flaticon.com/128/3541/3541990.png" alt="eliminar" class="service-img" width="60" height="60">
                                    </a>
                                </td>
                            <?php endif;endforeach ?>
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

