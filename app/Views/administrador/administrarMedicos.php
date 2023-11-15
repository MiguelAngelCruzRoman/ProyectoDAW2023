<div class="container">
    <div class="row">
        <h1 align="center">ADMINISTRAR MÉDICOS</h1>
        <div class="col-12">
        <form action="<?= base_url('index.php/administrador/buscarMedicos');?>" method="GET">
                <div class="col-5">
                    <label for="columnaBusquedaMedicos">Buscar médico por:</label>
                    <select name="columnaBusquedaMedicos" class="form-control">
                            <option value="todo">Todos los campos</option>
                            <option value="nombre">Nombre</option>
                            <option value="especialidad">Especialidad</option>
                            <option value="turno">Turno</option>
                            <option value="diasLaborales">Dias Laborales</option>
                    </select>
                </div>
            
                <div class="col-5">
                    <label for="valIngresado">Parecido a:</label>
                    <input type="text" class="form-control" name="valIngresado">
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
                    <th>Nombre del médico</th>
                    <th>Especialidad</th>
                    <th>Turno</th>
                    <th>Días de trabajo</th>
                    <th>Fecha de anexo</th>
                </thead>

                <tbody>
                <?php foreach ($users as $user):if($user->medico != null):?>
                        <tr>
                            <?php foreach ($usersInfo as $ui): if (($ui->id == $user ->id) && (count($medicos)> $user->medico-1)):?> 
                                <td><?=$ui->id?></td>
                                <td><?=$ui->primerNombre.' '.$ui->segundoNombre.' '.$ui->apellidoPaterno.' '.$ui->apellidoMaterno?></td>
                                <td><?=$medicos[($user->medico)-1]->especialidad?></td>
                                <td><?=$medicos[($user->medico)-1]->turno?></td>
                                <td><?=$medicos[($user->medico)-1]->diasLaborales?></td>
                                <td><?=$user->created_at?></td>
                                <td>
                                    <a href="<?= base_url('/administrador/editarMedico/'.$user->id); ?>">
                                    <img src="https://cdn-icons-png.flaticon.com/128/705/705120.png" alt="editar" class="service-img" width="60" height="60">
                                    </a>
                                </td>
                                <td>
                                    <a href="<?= base_url('/administrador/eliminarMedico/'.$user->id); ?>">
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
        <input type="image" class="btn btn-success mt-4" value="Agregar Médicos" src="" onclick="window.location='/administrador/agregarMedicos'">
        <input type="image" class="btn btn-primary mt-4" value="Página Principal" src="" onclick="window.location='/administrador/opciones'">
	</div>
</div>

