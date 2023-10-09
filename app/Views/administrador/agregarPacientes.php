<div class="container">
    <div class="row">

        <div class="col-2"></div>

        <div class="col-8">
            <form action="<?= base_url('/administrador/administrarPacientes');?>" method="GET">
            <?= csrf_field()?>
                <h2>Agregar Paciente</h2>

                <div class="mab-3">
                    <label for="primerNombre" class="form-label">Primer nombre:</label>
                    <input type="text" class="form-control" name="primerNombre" id="primerNombre" >
                </div>

                <div class="mab-3">
                    <label for="segundoNombre" class="form-label">Segundo nombre:</label>
                    <input type="text" class="form-control" name="segundoNombre" id="segundoNombre" >
                </div>

                <div class="mab-3">
                    <label for="apellidoMaterno" class="form-label">Apellido materno:</label>
                    <input type="text" class="form-control" name="apellidoMaterno" id="apellidoMaterno" >
                </div>

                <div class="mab-3">
                    <label for="apellidoPaterno" class="form-label">Apellido paterno:</label>
                    <input type="text" class="form-control" name="apellidoPaterno" id="apellidoPaterno" >
                </div>

                <div class="mab-3">
                    <label for="telefono" class="form-label">Número de contacto:</label>
                    <input type="number" class="form-control" name="telefono" id="telefono" >
                </div>

                <div class="mab-3">
                    <label for="CURP" class="form-label">CURP:</label>
                    <input type="text" class="form-control" name="CURP" id="CURP" >
                </div>

                <div class="mb-3">
                    <label for="seguro">Tipo de seguro:</label>
                    <select name="seguro" id="seguro" class="form-control">
                        <option value="" ></option>
                        <option value="estudiantil" >Estudiantil</option>
                        <option value="laboral">Laboral</option>
                        <option value="adquirido">Adquirido</option>
                        <option value="heredado">Heredado</option>
                        <option value="ninguno">Ninguno</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="statusSeguro">Estatus del seguro:</label>
                    <select name="statusSeguro" id="statusSeguro" class="form-control">
                        <option value="" ></option>
                        <option value="activo" >Activo</option>
                        <option value="baja" >Baja</option>
                        <option value="pausa" >En pauso</option>
                    </select>
                </div>

                <div class="mab-3">
                    <label for="correo" class="form-label">Correo electrónico:</label>
                    <input type="text" class="form-control" name="correo" id="correo">
                </div>

                <div class="mab-3">
                    <label for="contraseña" class="form-label">Contraseña:</label>
                    <input type="text" class="form-control" name="contraseña" id="contraseña">
                </div>

                <div class="mab-3">
                        <label for="foto" class="form-label">Foto de frente:</label>
                        <input type="image" >
                </div>

                <div class="mb-3">
                    <input type="submit" class="btn btn-success">
                </div>
            </form>

            <div class="col-2"></div>

        </div>
    </div>
</div>