<div class="container">
    <div class="row">
        <div class="col-2"></div>
        <div class="col-8">
            <form action="<?= base_url('index.php/administrador/pacientes/editarPacienteDatosMedicos/' . $usersInfo->id); ?>" method="post">
                <?= csrf_field() ?>
                <h1 align="center">Editar Paciente</h1>
                <h4 align="center">Información Personal</h4>

                <input type="hidden" name="id" value="<?= $usersInfo->id ?>">

                <div class="mab-3" align="center">
                    <img src="<?= $usersInfo->foto ?>" alt="" class="service-img" width="300" height="300">
                    <input type="url" class="form-control" name="foto" id="foto" value="<?= $usersInfo->foto ?>">
                </div>


                <div class="mab-3">
                    <label for="primerNombre" class="form-label">Primer nombre:</label>
                    <input type="text" class="form-control" name="primerNombre" id="primerNombre"
                        value="<?= $usersInfo->primerNombre ?>">
                </div>

                <div class="mab-3">
                    <label for="segundoNombre" class="form-label">Segundo nombre:</label>
                    <input type="text" class="form-control" name="segundoNombre" id="segundoNombre"
                        value="<?= $usersInfo->segundoNombre ?>">
                </div>

                <div class="mab-3">
                    <label for="apellidoPaterno" class="form-label">Apellido paterno:</label>
                    <input type="text" class="form-control" name="apellidoPaterno" id="apellidoPaterno"
                        value="<?= $usersInfo->apellidoPaterno ?>">
                </div>

                <div class="mab-3">
                    <label for="apellidoMaterno" class="form-label">Apellido materno:</label>
                    <input type="text" class="form-control" name="apellidoMaterno" id="apellidoMaterno"
                        value="<?= $usersInfo->apellidoMaterno ?>">
                </div>

                <div class="mb-3">
                    <label for="genero">Sexo:</label>
                    <select name="genero" id="genero" class="form-control">
                        <option value="<?= $usersInfo->genero ?>" selected><?= $usersInfo->genero ?></option>
                        <option value="M">Masculino</option>
                        <option value="F">Femenino</option>
                    </select>
                </div>

                <div class="mab-3">
                    <label for="telefono" class="form-label">Número de contacto:</label>
                    <input type="text" class="form-control" name="telefono" id="telefono"
                        value="<?= $usersInfo->telefono ?>">
                </div>

                <div class="mab-3">
                    <label for="CURP" class="form-label">CURP:</label>
                    <input type="text" class="form-control" name="CURP" id="CURP" value="<?= $paciente->CURP ?>">
                </div>

                <div class="mab-3">
                    <label for="correo" class="form-label">Correo electrónico:</label>
                    <input type="text" class="form-control" name="correo" id="correo" value="<?= $users->correo ?>">
                </div>

                <div class="mab-3">
                    <label for="username" class="form-label">Nombre de usuario:</label>
                    <input type="text" class="form-control" name="username" id="usernma" value="<?= $users->username ?>">
                </div>

                <div class="mab-3">
                    <label for="contraseña" class="form-label">Contraseña:</label>
                    <input type="text" class="form-control" name="contraseña" id="contraseña"
                        value="<?= $users->password ?>">
                </div>


                <div class="mb-3">
                    <input type="image" class="btn btn-success mt-4" value="Siguiente" src="">
                </div>
            </form>

            <div class="col-2">
                <input type="image" class="btn btn-danger mt-4" value="Cancelar" src="" onclick="window.history.back()">
            </div>

        </div>
    </div>
</div>