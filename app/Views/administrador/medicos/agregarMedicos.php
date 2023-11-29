<div class="container">
    <div class="row justify-content-center">
        <?php
        if (isset($validation)) {
            print $validation->listErrors();
        }
        ?>
        <div class="col-md-8">
            <div id="login-container" class="row justify-content-center">
                <form action="<?= base_url('/administrador/medicos/agregarMedicosDireccion'); ?>" method="POST">
                    <?= csrf_field() ?>
                    <h1 align="center" style="color: #fff">Agregar Médico</h1>
                    <h4 align="center" style="color: #fff">-Información Personal-</h4>

                    <input type="hidden" name="" value="">


                    <div class="mab-3">
                        <label for="primerNombre" class="form-label" style="color: #fff">Primer nombre:</label>
                        <input type="text" class="form-control" name="primerNombre" id="primerNombre"
                            placeholder="Ejemplo: Miguel" required pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+" max_length="15"
                            min_length="3" style="color: #000000">
                    </div>

                    <div class="mab-3">
                        <label for="segundoNombre" class="form-label" style="color: #fff">Segundo nombre:</label>
                        <input type="text" class="form-control" name="segundoNombre" id="segundoNombre"
                            placeholder="Ejemplo: Ángel" required pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+" max_length="15"
                            min_length="3" style="color: #000000">
                    </div>

                    <div class="mab-3">
                        <label for="apellidoPaterno" class="form-label" style="color: #fff">Apellido paterno:</label>
                        <input type="text" class="form-control" name="apellidoPaterno" id="apellidoPaterno"
                            placeholder="Ejemplo: Cruz" required pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+" max_length="15"
                            min_length="3" style="color: #000000">
                    </div>

                    <div class="mab-3">
                        <label for="apellidoMaterno" class="form-label" style="color: #fff">Apellido materno:</label>
                        <input type="text" class="form-control" name="apellidoMaterno" id="apellidoMaterno"
                            placeholder="Ejemplo: Román" required pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+" max_length="15"
                            min_length="3" style="color: #000000">
                    </div>

                    <div class="mb-3">
                        <label for="genero" style="color: #fff">Sexo:</label>
                        <select name="genero" id="genero" class="form-control" required style="color: #000000">
                            <option value="M">Masculino</option>
                            <option value="F">Femenino</option>
                        </select>
                    </div>

                    <div class="mab-3">
                        <label for="telefono" class="form-label" style="color: #fff">Número de contacto:</label>
                        <input type="text" class="form-control" name="telefono" id="telefono"
                            placeholder="Ejemplo: XXX-XXX-XXXX" pattern="[0-9]{-}" max_lengh="15" required
                            min_length="10" style="color: #000000">
                    </div>


                    <div class="mb-3">
                        <label for="especialidad" style="color: #fff">Especialidad:</label>
                        <select name="especialidad" id="especialidad" class="form-control" required
                            style="color: #000000">
                            <option value="General" selected>Médico general</option>
                            <option value="Cardiología">Cardiología</option>
                            <option value="Dermatología">Dermatología</option>
                            <option value="Ginecología">Ginecología</option>
                            <option value="Rehabilitación">Rehabilitación</option>
                            <option value="Oftalmología">Oftalmología</option>
                            <option value="Ortopedia">Ortopedia</option>
                            <option value="Pediatría">Pediatría</option>
                            <option value="Radiología">Radiología</option>
                            <option value="Neurología">Neurología</option>
                            <option value="Urología">Urología</option>
                            <option value="Oncología">Oncología</option>
                            <option value="Endocrinología">Endocrinología</option>
                            <option value="Psiquiatría">Psiquiatría</option>
                            <option value="Nutrición">Nutrición</option>
                            <option value="Dentista">Dentista</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="diasLaborales" style="color: #fff">Días de trabajo:</label>
                        <select name="diasLaborales" id="diasLaborales" class="form-control" required
                            style="color: #000000">
                            <option value="Lunes a Jueves" selected>Lunes a Jueves</option>
                            <option value="Lunes a Viernes">Lunes a Viernes</option>
                            <option value="Lunes, Miércoles, Viernes">Lunes, Miércoles, Viernes</option>
                            <option value="Sábado y Domingo">Sábado y Domingo</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="turno" style="color: #fff">Horario de atención:</label>
                        <select name="turno" id="turno" class="form-control" required style="color: #000000">
                            <option value="matutino" selected>Turno matutino (8:00-16:00)</option>
                            <option value="vespertino">Turno vespertino (16:00-24:00)</option>
                            <option value="nocturno">Turno nocturno (00:00-8:00)</option>
                        </select>
                    </div>

                    <div class="mab-3">
                        <label for="correo" class="form-label" style="color: #fff">Correo electrónico:</label>
                        <input type="text" class="form-control" name="correo" id="correo"
                            placeholder="Ejemplo: correo@ejemplo.com" required pattern="[a-z0-9]{@-_.}+"
                            max_length="100" min_length="3" style="color: #000000">
                    </div>

                    <div class="mab-3">
                        <label for="username" class="form-label" style="color: #fff">Nombre de usuario:</label>
                        <input type="text" class="form-control" name="username" id="username"
                            placeholder="Ejemplo: Dr.Juan" required pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s0-9]+{-_.}"
                            max_length="50" min_length="1" style="color: #000000">
                    </div>

                    <div class="mab-3">
                        <label for="password" class="form-label" style="color: #fff">Contraseña:</label>
                        <input type="password" class="form-control" name="password" id="password"
                            placeholder="Ejemplo: password2" required max_length="150" min_length="1"
                            style="color: #000000">
                    </div>


                    <div class="mab-3">
                        <label for="foto" class="form-label" style="color: #fff">Foto de frente:</label>
                        <input type="url" class="form-control" name="foto" id="foto"
                            placeholder="Ejemplo: https://foto.png" required max_length="250" style="color: #000000">
                    </div>

                    <br>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-success">
                            <img src="https://cdn-icons-png.flaticon.com/128/3585/3585717.png" alt="Siguiente"
                                width="25" height="25">
                            Siguiente
                        </button>
                    </div>
                </form>


                <div class="mb-3">
                    <button type="submit" class="btn btn-danger"
                        onclick="window.location.href='/administrador/medicos/administrarMedicos/'">
                        <img src="https://cdn-icons-png.flaticon.com/128/561/561189.png" alt="Cancelar" width="25"
                            height="25">
                        Cancelar
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>