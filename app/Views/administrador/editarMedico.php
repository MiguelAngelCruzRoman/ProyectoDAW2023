<div class="container">
    <div class="row">
        <div class="col-2"></div>
        <div class="col-8">
            <form action="<?= base_url('/administrador/editarMedico2/'.$usersInfo->id);?>" method="POST">
            <?= csrf_field()?>
                <h1 align="center">Editar Medicamento</h1>
                <h4 align="center">Información Personal</h4>
                <div class="mab-3" align="center">
                        <img src="" alt="medico" class="service-img">
                </div>	
                
                <div class="mab-3" align="center">
                        <img src="<?= $usersInfo->foto ?>" alt="" class="service-img"  width="300" height="300">
                        <input type="url" class="form-control" name="foto" id="foto" value="<?= $usersInfo->foto ?>">
                </div>

                <div class="mab-3">
                    <label for="primerNombre" class="form-label">Primer nombre:</label>
                    <input type="text" class="form-control" name="primerNombre" id="primerNombre" value="<?= $usersInfo->primerNombre ?>">
                </div>

                <div class="mab-3">
                    <label for="segundoNombre" class="form-label">Segundo nombre:</label>
                    <input type="text" class="form-control" name="segundoNombre" id="segundoNombre" value="<?= $usersInfo->segundoNombre?>">
                </div>

                <div class="mab-3">
                    <label for="apellidoPaterno" class="form-label">Apellido paterno:</label>
                    <input type="text" class="form-control" name="apellidoPaterno" id="apellidoPaterno" value="<?= $usersInfo->apellidoPaterno ?>">
                </div>

                <div class="mab-3">
                    <label for="apellidoMaterno" class="form-label">Apellido materno:</label>
                    <input type="text" class="form-control" name="apellidoMaterno" id="apellidoMaterno" value="<?= $usersInfo->apellidoMaterno ?>">
                </div>

                <div class="mb-3">
                    <label for="genero">Sexo:</label>
                    <select name="genero" id="genero" class="form-control">
                        <option value="<?= $usersInfo->genero ?>" >
                            <?php if($usersInfo->genero == "M"): ?>
                                Masculino
                            <?php else :?>
                                Femenino
                            <?php endif; ?>
                        </option>
                        <option value="M" >Masculino</option>
                        <option value="F" >Femenino</option>
                    </select>
                </div>

                <div class="mab-3">
                    <label for="telefono" class="form-label">Número de contacto:</label>
                    <input type="number" class="form-control" name="telefono" id="telefono" value="<?= $usersInfo->telefono ?>">
                </div>


                <div class="mb-3">
                    <label for="especialidad">Especialidad:</label>
                    <select name="especialidad" id="especialidad" class="form-control">
                        <option value="<?= $medico->especialidad ?>" selected><?= $medico->especialidad ?></option>
                        <option value="General" >Médico general</option>
                        <option value="Cardiología" >Cardiología</option>
                        <option value="Dermatología" >Dermatología</option>
                        <option value="Ginecología" >Ginecología</option>
                        <option value="Rehabilitación" >Rehabilitación</option>
                        <option value="Oftalmología" >Oftalmología</option>
                        <option value="Ortopedia" >Ortopedia</option>
                        <option value="Pediatría" >Pediatría</option>
                        <option value="Radiología" >Radiología</option>
                        <option value="Neurología" >Neurología</option>
                        <option value="Urología" >Urología</option>
                        <option value="Oncología" >Oncología</option>
                        <option value="Endocrinología" >Endocrinología</option>
                        <option value="Psiquiatría" >Psiquiatría</option>
                        <option value="Nutrición" >Nutrición</option>
                        <option value="Dentista" >Dentista</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="diasLaborales">Días de trabajo:</label>
                    <select name="diasLaborales" id="diasLaborales" class="form-control">
                        <option value="<?= $medico->diasLaborales ?>" selected><?= $medico->diasLaborales ?></option>
                        <option value="Lunes a Jueves" >Lunes a Jueves</option>
                        <option value="Lunes a Viernes" >Lunes a Viernes</option>
                        <option value="Lunes, Miércoles, Viernes" >Lunes, Miércoles, Viernes</option>
                        <option value="Sábado y Domingo" >Sábado y Domingo</option>
                    </select>
                </div>
                
                <div class="mb-3">
                    <label for="turno">Horario de atención:</label>
                    <select name="turno" id="turno" class="form-control">
                        <option value="<?= $medico->turno ?>" selected><?= $medico->turno ?></option>
                        <option value="matutino" selected>Turno matutino (8:00-16:00)</option>
                        <option value="vespertino">Turno vespertino (16:00-24:00)</option>
                        <option value="nocturno" >Turno nocturno (00:00-8:00)</option>
                    </select>
                </div>

                <div class="mab-3">
                    <label for="correo" class="form-label">Correo electrónico:</label>
                    <input type="text" class="form-control" name="correo" id="correo" value="<?= $users->correo ?>">
                </div>

                <div class="mab-3">
                    <label for="username" class="form-label">Nombre de usuario:</label>
                    <input type="text" class="form-control" name="username" id="username" value="<?= $users->username ?>">
                </div>

                <div class="mab-3">
                    <label for="password" class="form-label">Contraseña:</label>
                    <input type="password" class="form-control" name="password" id="password" value="<?= $users->password ?>">
                </div>

                
                <div class="mb-3">
                    <input type="image" class="btn btn-success mt-4" value="Siguiente" src="">
                </div>
            </form>

            <div class="mb-3">
                <input type="image" class="btn btn-danger mt-4" value="Cancelar" src="" onclick="window.location.href='/administrador/administrarMedicos/'">
            </div>

        </div>
    </div>
</div>