<div class="container">
    <div class="row">
        <h1 align="center">ADMINISTRAR PACIENTES</h1>
        <div class="col-6">
            <form action="<?= base_url('index.php/administrador/buscarPacientes'); ?>" method="GET">
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
                    <input type="text" class="form-control" name="valIngresado">
                </div>

                <div class="col-5">
                    <form action="buscar">
                        <button type="submit" class="btn btn-secondary">
                            <img src="https://cdn-icons-png.flaticon.com/128/795/795724.png" alt="Icono" width="25" height="25">
                            Realizar Búsqueda
                        </button>
                    </form>
                </div>
            </form>
        </div>

        <div class="col-2"></div>

        <div class="col-4">
            <button type="button" class="btn btn-success mt-4"
                onclick="window.location='/administrador/agregarPacientes'">
                <img src="https://cdn-icons-png.flaticon.com/128/4885/4885419.png" alt="Icono" width="25" height="25">
                Agregar Medicamentos
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
        <?php $registrosPorPaginaUsuarios = 10;
            $totalRegistrosUsuarios = count($users);
            $totalPaginasUsuarios = ceil($totalRegistrosUsuarios / $registrosPorPaginaUsuarios);
            $paginaActualUsuarios = isset($_GET['paginaUsuarios']) ? $_GET['paginaUsuarios'] : 1;
            $indiceInicioUsuarios = ($paginaActualUsuarios - 1) * $registrosPorPaginaUsuarios;
            $usersPagina = array_slice($users, $indiceInicioUsuarios, $registrosPorPaginaUsuarios);?>

            <table class="table">
                <thead>
                    <th>ID</th>
                    <th>Nombre del paciente</th>
                    <th>Número de contacto</th>
                    <th>Correo electrónico</th>
                    <th>Username</th>
                    <th>Fecha de creación</th>
                    <th style="text-align: center" colspan="3">Opciones</th>
                </thead>

                <tbody>
                    <?php foreach ($usersPagina as $user):
                        if ($user->paciente != null): ?>
                            <tr>
                                <?php foreach ($usersInfo as $ui):
                                    if ($ui->id == $user->id): ?>
                                        <td><?= $ui->id ?></td>
                                        <td><?= $ui->primerNombre . ' ' . $ui->segundoNombre . ' ' . $ui->apellidoPaterno . ' ' . $ui->apellidoMaterno ?>
                                        </td>
                                        <td><?= $ui->telefono ?></td>
                                        <td><?= $user->correo ?></td>
                                        <td><?= $user->username ?></td>
                                        <td><?= $user->created_at ?></td>



                                        <td>
                                            <a href="<?= base_url('/administrador/editarPaciente/' . $user->id); ?>"
                                                style="color:rgba(0,0,0,0.6)">
                                                <img src="https://cdn-icons-png.flaticon.com/128/705/705120.png" alt="editar"
                                                    class="service-img" width="60" height="60">
                                                <figcaption>Editar</figcaption>
                                            </a>
                                        </td>
                                        <td>
                                            <a href="<?= base_url('/administrador/eliminarPaciente/' . $user->id); ?>"
                                                style="color:rgba(0,0,0,0.6)">
                                                <img src="https://cdn-icons-png.flaticon.com/128/3541/3541990.png" alt="eliminar"
                                                    class="service-img" width="60" height="60">
                                                <figcaption>Eliminar</figcaption>
                                            </a>
                                        </td>
                                        <td>
                                            <a href="<?= base_url('/administrador/sabermasPaciente/' . $user->paciente); ?>"
                                                style="color:rgba(0,0,0,0.6)">
                                                <img src="https://cdn-icons-png.flaticon.com/128/5828/5828566.png" alt="saberMas"
                                                    class="service-img" width="60" height="60">
                                                <figcaption>Saber más</figcaption>
                                            </a>
                                        </td>
                                    <?php endif; endforeach ?>
                            </tr>
                        <?php endif; endforeach ?>
                </tbody>
            </table>

            <div class="col-5 mx-auto text-center">
                <ul class="pagination">
                    <li class="page-item <?php echo ($paginaActualUsuarios <= 1) ? 'disabled' : ''; ?>">
                        <a class="page-link text-black" href="?paginaUsuarios=<?php echo $paginaActualUsuarios - 1; ?>">Anterior</a>
                    </li>

                    <?php for ($i = 1; $i <= $totalPaginasUsuarios; $i++): ?>
                        <li class="page-item <?php echo ($paginaActualUsuarios == $i) ? 'active' : ''; ?>">
                            <a class="page-link text-black" href="?paginaUsuarios=<?php echo $i; ?>"><?php echo $i; ?></a>
                        </li>
                    <?php endfor ?>

                    <li class="page-item <?php echo ($paginaActualUsuarios >= $totalPaginasUsuarios) ? 'disabled' : ''; ?>">
                        <a class="page-link text-black" href="?paginaUsuarios=<?php echo $paginaActualUsuarios + 1; ?>">Siguiente</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <br>
</div>