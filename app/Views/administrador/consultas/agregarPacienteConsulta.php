<div class="container">
    <div class="row">

        <div class="col-2"></div>

        <div class="col-8">
                <?= csrf_field() ?>

                <h1 align="center">Agregar Consulta</h1>
                <h4 align="center">-Seleccione un Paciente-</h4>

                <form action="<?= base_url('index.php/administrador/consultas/agregarPacienteConsulta/buscar/'.$idMedico); ?>" method="GET">
                <div class="col-12">
                    <label for="columnaBusquedaPaciente">Buscar paciente por:</label>
                    <select name="columnaBusquedaPaciente" class="form-control">
                        <option value="todo">Cualquier paciente</option>
                        <option value="nombre">Nombre</option>
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
        <?php foreach($pacientes as $paciente): ?>
            <?php foreach($userPacientes as $userPaciente): ?>
                <?php if($userPaciente->paciente == $paciente->id): ?>
                    <?php foreach($userInfoPacientes as $userInfoPaciente): ?>
                        <?php if($userPaciente->id == $userInfoPaciente->id): ?>
                            <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2 mt-2">
                                <form action="<?= base_url('/administrador/consultas/agregarConsulta/'.$paciente->id); ?>" method="post">
                                    <button class="btn" style="padding: 0; border: none; background: none;">
                                        <div class="card">
                                            <div class="card-body">
                                                <h6 class="card-title">
                                                    <?php if($userInfoPaciente->genero =='M'): ?>
                                                        Sr.
                                                    <?php else: ?>
                                                        Sra.
                                                    <?php endif; ?>
                                                    <?= $userInfoPaciente->primerNombre . ' ' . $userInfoPaciente->segundoNombre .
                                                    ' ' . $userInfoPaciente->apellidoPaterno . ' ' . $userInfoPaciente->apellidoMaterno?>
                                                </h6>
                                                <img src="<?= $userInfoPaciente->foto?>" alt="foto del médico" class="img-fluid">
                                                <input type="hidden" name="idMedico" value=<?= $idMedico?>>
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