<div class="container">
    <div class="row">
        <?php
        if (isset($validation)) {
            print $validation->listErrors();
        }
        ?>
        <div class="col-2"></div>
        <div class="col-8">
            <form
                action="<?= base_url('index.php/administrador/pacientes/editarPacienteDatosMedicos/' . $paciente->id); ?>"
                method="post">
                <?= csrf_field() ?>
                <h1 align="center">Editar Paciente</h1>
                <h4 align="center">Información Personal</h4>

                <input type="hidden" name="id" value="<?= $usersInfo[0]->id ?>">

                <div class="mab-3" align="center">
                    <img src="<?= $usersInfo[0]->foto ?>" alt="" class="service-img" width="300" height="400">
                    <input type="url" class="form-control" name="foto" id="foto" value="<?= $usersInfo[0]->foto ?>"
                        placeholder="Ejemplo: https://foto.png" required max_length="250">
                </div>


                <div class="mab-3">
                    <label for="primerNombre" class="form-label">Primer nombre:</label>
                    <input type="text" class="form-control" name="primerNombre" id="primerNombre"
                        placeholder="Ejemplo: Miguel" required pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+" max_length="15"
                        min_length="3" value="<?= $usersInfo[0]->primerNombre ?>">
                </div>

                <div class="mab-3">
                    <label for="segundoNombre" class="form-label">Segundo nombre:</label>
                    <input type="text" class="form-control" name="segundoNombre" id="segundoNombre"
                        placeholder="Ejemplo: Ángel" pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+" max_length="15"
                        value="<?= $usersInfo[0]->segundoNombre ?>">
                </div>

                <div class="mab-3">
                    <label for="apellidoPaterno" class="form-label">Apellido paterno:</label>
                    <input type="text" class="form-control" name="apellidoPaterno" id="apellidoPaterno"
                        placeholder="Ejemplo: Cruz" required pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+" max_length="15"
                        min_length="3" value="<?= $usersInfo[0]->apellidoPaterno ?>">
                </div>

                <div class="mab-3">
                    <label for="apellidoMaterno" class="form-label">Apellido materno:</label>
                    <input type="text" class="form-control" name="apellidoMaterno" id="apellidoMaterno"
                        placeholder="Ejemplo: Román" required pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+" max_length="15"
                        min_length="3" value="<?= $usersInfo[0]->apellidoMaterno ?>">
                </div>

                <div class="mb-3">
                    <label for="genero">Sexo:</label>
                    <select name="genero" id="genero" class="form-control" required>
                        <option value="<?= $usersInfo[0]->genero ?>" selected>
                            <?= $usersInfo[0]->genero ?>
                        </option>
                        <option value="M">Masculino</option>
                        <option value="F">Femenino</option>
                    </select>
                </div>

                <div class="mab-3">
                    <label for="telefono" class="form-label">Número de contacto:</label>
                    <input type="text" class="form-control" name="telefono" id="telefono"
                        placeholder="Ejemplo: XXX-XXX-XXXX" required pattern="[0-9]{-}" max_length="15" min_length="10"
                        value="<?= $usersInfo[0]->telefono ?>">
                </div>

                <div class="mab-3">
                    <label for="CURP" class="form-label">CURP:</label>
                    <input type="text" class="form-control" name="CURP" id="CURP" value="<?= $paciente->CURP ?>"
                        placeholder="Ejemplo: CURM030923HMCRMGA6" required pattern="[A-Z0-9]+" max_length="18"
                        min_length="18">
                </div>

                <div class="mab-3">
                    <label for="correo" class="form-label">Correo electrónico:</label>
                    <input type="text" class="form-control" name="correo" id="correo" value="<?= $users[0]->correo ?>"
                        placeholder="Ejemplo: correo@ejemplo.com" required pattern="[a-z0-9]{@-_.}+" max_length="100"
                        min_length="3">
                </div>

                <div class="mab-3">
                    <label for="username" class="form-label">Nombre de usuario:</label>
                    <input type="text" class="form-control" name="username" id="username"
                        value="<?= $users[0]->username ?>" placeholder="Ejemplo: Paciente" required
                        pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s0-9]+{-_.}" max_length="50" min_length="1">
                </div>

                <div class="mab-3">
                    <label for="contraseña" class="form-label">Contraseña:</label>
                    <input type="text" class="form-control" name="contraseña" id="contraseña"
                        placeholder="Ejemplo: password2" required max_length="150" min_length="1"
                        value="<?= $users[0]->password ?>">
                </div>


                <br>
                <div class="mb-3">
                    <button type="submit" class="btn btn-success">
                        <img src="https://cdn-icons-png.flaticon.com/128/3585/3585717.png" alt="Siguiente" width="25"
                            height="25">
                        Siguiente
                    </button>
                </div>
            </form>

            <div class="mb-3">
                <button type="submit" class="btn btn-danger"
                    onclick="window.location.href='/administrador/pacientes/administrarPacientes'">
                    <img src="https://cdn-icons-png.flaticon.com/128/561/561189.png" alt="Cancelar" width="25"
                        height="25">
                    Cancelar
                </button>
            </div>

        </div>
    </div>
</div>