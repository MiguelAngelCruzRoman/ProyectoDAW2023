<div class="container">
    <div class="row">

        <div class="col-2"></div>

        <div class="col-8">
                <?= csrf_field() ?>

                <h1 align="center">Agregar Consulta</h1>
                <h4 align="center">-Seleccione un Médico-</h4>

                <form action="<?= base_url('index.php/administrador/consultas/agregarMedicoConsulta/buscar'); ?>" method="GET">
                <div class="col-12">
                    <label for="columnaBusquedaMedicos">Buscar médico por:</label>
                    <select name="columnaBusquedaMedicos" class="form-control">
                        <option value="todo">Todos los campos</option>
                        <option value="nombre">Nombre</option>
                        <option value="especialidad">Especialidad</option>
                        <option value="turno">Turno</option>
                        <option value="diasLaborales">Dias Laborales</option>
                    </select>
                </div>

                <div class="col-12">
                    <label for="valIngresado">Parecido a:</label>
                    <input type="text" class="form-control" name="valIngresado">
                </div>

                <div class="mt-2">
                    <form action="buscar">
                        <button type="submit" class="btn btn-secondary">
                            <img src="https://cdn-icons-png.flaticon.com/128/795/795724.png" alt="Icono" width="25" height="25">
                            Realizar Búsqueda
                        </button>
                    </form>
                </div>
            </form>
        </div>
    </div>
</div>
                <div class="container mt-2">
    <div class="row">
        <?php $count = 0; ?>
        <?php foreach($medicos as $medico): ?>
            <?php foreach($userMedicos as $userMedico): ?>
                <?php if($userMedico->medico == $medico->id): ?>
                    <?php foreach($userInfoMedicos as $userInfoMedico): ?>
                        <?php if($userMedico->id == $userInfoMedico->id): ?>
                            <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 mt-2">
                                <form action="<?= base_url('/administrador/consultas/agregarPacienteConsulta/'.$medico->id); ?>" method="post">
                                    <button class="btn" style="padding: 0; border: none; background: none;">
                                        <div class="card">
                                            <div class="card-body">
                                                <h6 class="card-title">
                                                    <?php if($userInfoMedico->genero =='M'): ?>
                                                        Dr.
                                                    <?php else: ?>
                                                        Dra.
                                                    <?php endif; ?>
                                                    <?= $userInfoMedico->primerNombre . ' ' . $userInfoMedico->segundoNombre .
                                                    ' ' . $userInfoMedico->apellidoPaterno . ' ' . $userInfoMedico->apellidoMaterno?>
                                                </h6>
                                                <img src="<?= $userInfoMedico->foto?>" alt="foto del médico" width="150" height="150">
                                                <p><strong>Especialidad: </strong><?= $medico->especialidad ?></p>
                                                <p><strong>Turno: </strong> <?= $medico->turno ?></p>
                                                <p><strong>Días que labora:</strong> <?= $medico->diasLaborales ?></p>
                                            </div>
                                        </div>
                                    </button>
                                </form>
                            </div>
                            <?php $count++; ?>
                            <?php if ($count % 6 == 0): ?>
                                </div><div class="row">
                            <?php endif; ?>
                        <?php endif; ?>
                    <?php endforeach; ?>
                <?php endif; ?>
            <?php endforeach; ?>
        <?php endforeach; ?>
    </div>
</div>
<br>



            
<div class="container">
    <div class="row">
        <div class="col-5"></div>

        <div class="col-2">
                    <input type="image" class="btn btn-danger mt-4" value="Cancelar" src=""
                        onclick="window.location.href='/administrador/consultas/administrarConsultas/'">
                </div>

        <div class="col-5"></div>
    </div>
</div>