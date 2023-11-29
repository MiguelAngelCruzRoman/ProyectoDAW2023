<div class="container">
    <div class="row">
        <h1 align="center">ADMINISTRAR MÉDICOS</h1>

        <!-- Sección para el formulario de búsqueda de médicos-->
        <div class="col-6">
            <form action="<?= base_url('index.php/administrador/medicos/buscarMedicos'); ?>" method="GET">
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

                <div class="col-5">
                    <form action="buscar">
                        <button type="submit" class="btn btn-secondary">
                            <img src="https://cdn-icons-png.flaticon.com/128/795/795724.png" alt="Icono" width="25"
                                height="25">
                            Realizar Búsqueda
                        </button>
                    </form>
                </div>
            </form>
        </div>

        <div class="col-2"></div>

        <!-- Sección de botones para navegación entre vistas-->
        <div class="col-4">
            <button type="button" class="btn btn-success mt-4"
                onclick="window.location='/administrador/medicos/agregarMedicos'">
                <img src="https://cdn-icons-png.flaticon.com/128/4885/4885419.png" alt="Icono" width="25" height="25">
                Agregar Médico
            </button>
            <button type="button" class="btn btn-secondary mt-4" onclick="window.location='/administrador'">
                <img src="https://cdn-icons-png.flaticon.com/128/10349/10349274.png" alt="Icono" width="25" height="25">
                Página Principal
            </button>
        </div>
    </div>
    <br>

    <div class="row">
        <div class="col-12">

            <!-- Sección para agrupar los médicos en grupos de 10 elementos -->
            <?php $registrosPorPaginaUsuarios = 10;
            $totalRegistrosUsuarios = count($medicos);
            $totalPaginasUsuarios = ceil($totalRegistrosUsuarios / $registrosPorPaginaUsuarios);
            $paginaActualUsuarios = isset($_GET['paginaUsuarios']) ? $_GET['paginaUsuarios'] : 1;
            $indiceInicioUsuarios = ($paginaActualUsuarios - 1) * $registrosPorPaginaUsuarios;
            $medicosPagina = array_slice($medicos, $indiceInicioUsuarios, $registrosPorPaginaUsuarios); ?>

            <table class="table">
                <thead class="thead-dark">
                    <th style="text-align: center">ID</th>
                    <th style="text-align: center">Nombre del médico</th>
                    <th style="text-align: center">Especialidad</th>
                    <th style="text-align: center">Turno</th>
                    <th style="text-align: center">Días de trabajo</th>
                    <th style="text-align: center">Pacientes que atiende</th>
                    <th style="text-align: center" colspan="3">Opciones</th>
                </thead>
                <tbody>
                    <!-- Recuperara la información de cada médico-->
                    <?php foreach ($medicosPagina as $medico):
                        foreach ($users as $user):
                            if ($user->medico == $medico->id): ?>
                                <tr>

                                    <?php foreach ($usersInfo as $ui):
                                        if (($ui->id == $user->id)): ?>
                                            <td>
                                                <?= $ui->id ?>
                                            </td>
                                            <td>
                                                <?= $ui->primerNombre . ' ' . $ui->segundoNombre . ' ' . $ui->apellidoPaterno . ' ' . $ui->apellidoMaterno ?>
                                            </td>
                                            <td>
                                                <?= $medico->especialidad ?>
                                            </td>
                                            <td>
                                                <?= $medico->turno ?>
                                            </td>
                                            <td>
                                                <?= $medico->diasLaborales ?>
                                            </td>

                                            <!-- Sección para relacionar al médico con los pacientes que atiende-->
                                            <td>
                                                <?php foreach ($medicosPaciente as $medicoPaciente):
                                                    if ($medicoPaciente->medico == $user->medico): ?>
                                                        <?php foreach ($pacientes as $paciente):
                                                            if ($paciente->id == $medicoPaciente->paciente): ?>
                                                                <?php foreach ($userPacientes as $userPaciente):
                                                                    if ($userPaciente->paciente == $medicoPaciente->paciente): ?>
                                                                        <?php foreach ($userInfoPacientes as $userInfoPaciente):
                                                                            if ($userInfoPaciente->id == $userPaciente->id): ?>
                                                                                <li><a href="<?= base_url('/administrador/pacientes/sabermasPaciente/' . $paciente->id); ?>"
                                                                                        style="color:rgba(0,0,0,1)">
                                                                                        <?php if ($userInfoPaciente->genero == 'M'): ?>
                                                                                            Sr.
                                                                                        <?php else: ?>
                                                                                            Sra.
                                                                                        <?php endif; ?>
                                                                                        <?= $userInfoPaciente->primerNombre . ' ' . $userInfoPaciente->segundoNombre .
                                                                                            ' ' . $userInfoPaciente->apellidoPaterno . ' ' . $userInfoPaciente->apellidoMaterno
                                                                                            ?>
                                                                                    </a>
                                                                                </li>
                                                                            <?php endif; endforeach; ?>
                                                                    <?php endif; endforeach; ?>
                                                            <?php endif; endforeach; ?>
                                                    <?php endif; endforeach; ?>
                                            </td>

                                            <!-- Sección para agregar operaciones a cada uno de los médicos-->
                                            <td>
                                                <a href="<?= base_url('/administrador/medicos/editarMedico/' . $user->id); ?>"
                                                    style="color:rgba(0,0,0,0.6)">
                                                    <img src="https://cdn-icons-png.flaticon.com/128/705/705120.png" alt="editar"
                                                        class="service-img" width="60" height="60">
                                                    <figcaption>Editar</figcaption>
                                                </a>
                                            </td>
                                            <td>
                                                <a href="<?= base_url('/administrador/medicos/eliminarMedico/' . $user->id); ?>"
                                                    style="color:rgba(0,0,0,0.6)">
                                                    <img src="https://cdn-icons-png.flaticon.com/128/3541/3541990.png" alt="eliminar"
                                                        class="service-img" width="60" height="60">
                                                    <figcaption>Eliminar</figcaption>
                                                </a>
                                            </td>
                                            <td>
                                                <a href="<?= base_url('/administrador/medicos/sabermasMedico/' . $user->medico); ?>"
                                                    style="color:rgba(0,0,0,0.6)">
                                                    <img src="https://cdn-icons-png.flaticon.com/128/5828/5828566.png" alt="saberMas"
                                                        class="service-img" width="60" height="60">
                                                    <figcaption>Saber más</figcaption>
                                                </a>
                                            </td>
                                        <?php endif; endforeach ?>
                                </tr>
                            <?php endif; endforeach; endforeach; ?>
                </tbody>
            </table>

            <!-- Sección para poder cambiar de grupo de médicos -->
            <div class="col-5 mx-auto text-center">
                <ul class="pagination">
                    <li class="page-item <?php echo ($paginaActualUsuarios <= 1) ? 'disabled' : ''; ?>">
                        <a class="page-link text-black"
                            href="?paginaUsuarios=<?php echo $paginaActualUsuarios - 1; ?>">Anterior</a>
                    </li>

                    <?php for ($i = 1; $i <= $totalPaginasUsuarios; $i++): ?>
                        <li class="page-item <?php echo ($paginaActualUsuarios == $i) ? 'active' : ''; ?>">
                            <a class="page-link text-black" href="?paginaUsuarios=<?php echo $i; ?>">
                                <?php echo $i; ?>
                            </a>
                        </li>
                    <?php endfor ?>

                    <li
                        class="page-item <?php echo ($paginaActualUsuarios >= $totalPaginasUsuarios) ? 'disabled' : ''; ?>">
                        <a class="page-link text-black"
                            href="?paginaUsuarios=<?php echo $paginaActualUsuarios + 1; ?>">Siguiente</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <br>


</div>