<div class="container">
    <div class="row">

        <div class="col-2"></div>

        <div class="col-8">
            <?= csrf_field() ?>

            <h1 align="center">Administrar Mis Médicos</h1>
            <h4 align="center">-Seleccione un Médico-</h4>

            <!-- Sección para el formulario de búsqueda de médicos-->
            <form action="<?= base_url('/paciente/medicos/administrarMedicos/buscar'); ?>" method="GET">

                <div class="col-5">
                    <label for="valIngresado">Nombre del Médico Parecido a:</label>
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

<div class="container mt-2">
    <div class="row">
        <?php $count = 0; ?>
        <!-- Sección para mostrar a los médicos que atienden al paciente-->
        <?php foreach ($medicoPacientes as $medicoPaciente): ?>
            <?php foreach ($medicos as $medico):
                if ($medicoPaciente->medico == $medico->id): ?>
                    <?php foreach ($userMedicos as $userMedico): ?>
                        <?php if ($userMedico->medico == $medico->id): ?>
                            <?php foreach ($userInfoMedicos as $userInfoMedico): ?>
                                <?php if ($userMedico->id == $userInfoMedico->id): ?>
                                    <div class="col-md-4 mt-4 text-center">
                                        <form action="<?= base_url('/paciente/medicos/sabermasMedico/' . $medico->id); ?>" method="get">
                                            <button class="btn" style="padding: 0; border: none; background: none;">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <h6 class="card-title">
                                                            <?php if ($userInfoMedico->genero == 'M'): ?>
                                                                Dr.
                                                            <?php else: ?>
                                                                Dra.
                                                            <?php endif; ?>
                                                            <?= $userInfoMedico->primerNombre . ' ' . $userInfoMedico->segundoNombre .
                                                                ' ' . $userInfoMedico->apellidoPaterno . ' ' . $userInfoMedico->apellidoMaterno ?>
                                                        </h6>
                                                        <img src="<?= $userInfoMedico->foto ?>" alt="foto del médico"
                                                            style="max-height: 150px; max-width: 100%;">
                                                        <p><strong>Especialidad: </strong>
                                                            <?= $medico->especialidad ?>
                                                        </p>
                                                        <p><strong>Días laborales: </strong>
                                                            <?= $medico->diasLaborales ?>
                                                        </p>
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