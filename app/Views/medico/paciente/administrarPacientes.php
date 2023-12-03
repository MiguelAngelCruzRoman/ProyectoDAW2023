<div class="container">
    <div class="row">

        <div class="col-2"></div>

        <div class="col-8">
            <?= csrf_field() ?>

            <h1 align="center">Administrar Mis Pacientes</h1>
            <h4 align="center">-Seleccione un Paciente-</h4>

            <!-- Sección para el formualario de búsqueda de pacientes-->
            <form action="<?= base_url('/medico/pacientes/administrarPacientes/buscar'); ?>" method="GET">

                <div class="col-5">
                    <label for="valIngresado">Nombre del Paciente Parecido a:</label>
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
    </div>
</div>
<br>

<!-- Sección para relacionar al paciente con el médico que lo atiende-->
<div class="container mt-2">
    <div class="row">
        <?php $count = 0; ?>
        <?php foreach ($medicoPacientes as $medicoPaciente): ?>
            <?php foreach ($pacientes as $paciente):
                if ($medicoPaciente->paciente == $paciente->id): ?>
                    <?php foreach ($userPacientes as $userPaciente): ?>
                        <?php if ($userPaciente->paciente == $paciente->id): ?>
                            <?php foreach ($userInfoPacientes as $userInfoPaciente): ?>
                                <?php if ($userPaciente->id == $userInfoPaciente->id): ?>
                                    <div class="col-md-4 mt-4 text-center">
                                        <form action="<?= base_url('/medico/pacientes/sabermasPaciente/' . $paciente->id); ?>" method="get">
                                            <button class="btn" style="padding: 0; border: none; background: none;">
                                                <div class="card text-white bg-dark mb-3 border-dark" style="height:250px ; width: 300px;">
                                                    <div class="card-body">
                                                        <h6 class="card-title">
                                                            <?php if ($userInfoPaciente->genero == 'M'): ?>
                                                                Sr.
                                                            <?php else: ?>
                                                                Sra.
                                                            <?php endif; ?>
                                                            <?= $userInfoPaciente->primerNombre . ' ' . $userInfoPaciente->segundoNombre .
                                                                ' ' . $userInfoPaciente->apellidoPaterno . ' ' . $userInfoPaciente->apellidoMaterno ?>
                                                        </h6>
                                                        <img src="<?= $userInfoPaciente->foto ?>" alt="foto del paciente"
                                                            style="height:150px ; width: 200px;">
                                                        <input type="hidden" name="IDmedicoPaciente" value=<?= $medicoPaciente->id ?>>
                                                    </div>
                                                </div>
                                            </button>
                                        </form>
                                    </div>
                                    <?php $count++; ?>
                                    <?php if ($count % 3 == 0): ?>
                                    </div>
                                    <div class="row">
                                    <?php endif; ?>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    <?php endforeach; ?>
                <?php endif; endforeach; ?>
        <?php endforeach; ?>
    </div>
</div>