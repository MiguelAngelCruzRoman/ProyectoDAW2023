<div class="container">

    <div class="row justify-content-center">
        <?php
        if (isset($validation)) {
            print $validation->listErrors();
        }
        ?>
        <div class="col-md-8">
            <div id="login-container" class="row justify-content-center">


                <form action="<?= base_url('/administrador/pacientes/agregarPacientesDatosMedicos'); ?>" method="post">
                    <?= csrf_field() ?>

                    <h1 align="center" style="color: #fff">Agregar Paciente</h1>
                    <h4 align="center" style="color: #fff">-Información Personal-</h4>


                    <div class="mab-3">
                        <label for="primerNombre" class="form-label" style="color: #fff">Primer nombre:</label>
                        <input type="text" class="form-control" name="primerNombre" id="primerNombre"
                            placeholder="Ejemplo: Miguel" required pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+" max_length="15"
                            min_length="3" style="color: #000000">
                    </div>

                    <div class="mab-3">
                        <label for="segundoNombre" class="form-label" style="color: #fff">Segundo nombre:</label>
                        <input type="text" class="form-control" name="segundoNombre" id="segundoNombre"
                            placeholder="Ejemplo: Ángel" pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+" max_length="15"
                            style="color: #000000">
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

                    <div class="mab-3">
                        <label for="CURP" class="form-label" style="color: #fff">CURP:</label>
                        <input type="text" class="form-control" name="CURP" id="CURP"
                            placeholder="Ejemplo: CURM030923HMCRMGA6" required pattern="[A-Z0-9]+" max_length="18"
                            min_length="18" style="color: #000000">
                    </div>

                    <div class="mab-3">
                        <label for="correo" class="form-label" style="color: #fff">Correo electrónico:</label>
                        <input type="email" class="form-control" name="correo" id="correo"
                            placeholder="Ejemplo: ejemplo@correo.com" required pattern="[a-z0-9]{@-_.}+"
                            max_length="100" min_length="7" style="color: #000000">
                    </div>

                    <div class="mab-3">
                        <label for="username" class="form-label" style="color: #fff">Nombre de usuario:</label>
                        <input type="text" class="form-control" name="username" id="username"
                            placeholder="Ejemplo: Paciente 1" required pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s0-9]+{-_.}"
                            max_length="50" min_length="1" style="color: #000000">
                    </div>

                    <div class="mab-3">
                        <label for="contraseña" class="form-label" style="color: #fff">Contraseña:</label>
                        <input type="password" class="form-control" name="contraseña" id="contraseña"
                            placeholder="Ejemplo: Contraseña1" required max_length="30" min_length="3"
                            style="color: #000000">
                    </div>


                    <div class="mab-3">
                        <label for="foto" class="form-label" style="color: #fff">Foto de frente:</label>
                        <input type="url" class="form-control" name="foto" id="foto"
                            placeholder="Ejemplo: https://foto1.png" required max_length="250" style="color: #000000">
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
                        onclick="window.location.href='/administrador/pacientes/administrarPacientes/'">
                        <img src="https://cdn-icons-png.flaticon.com/128/561/561189.png" alt="Cancelar" width="25"
                            height="25">
                        Cancelar
                    </button>
                </div>
                <div class="col-2"></div>

            </div>
        </div>

    </div>
</div>