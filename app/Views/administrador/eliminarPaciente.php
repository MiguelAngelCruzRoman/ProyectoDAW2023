<div class="container">
    <div class="row">
        <div class="col-2"></div>
        <div class="col-8">
            <form action="<?= base_url('/administrador/administrarPacientes'); ?>" method="GET">
                <?= csrf_field() ?>
                <h1 align="center">Editar Paciente</h1>
                <h4 align="center">Información Personal</h4>

                <input type="hidden" name="" value="">

                <div class="mab-3" align="center">
                    <img src="" alt="paciente" class="service-img">
                </div>

                <div class="mab-3">
                    <label for="primerNombre" class="form-label">Primer nombre:</label>
                    <input type="text" class="form-control" name="primerNombre" id="primerNombre" value="Miguel">
                </div>

                <div class="mab-3">
                    <label for="segundoNombre" class="form-label">Segundo nombre:</label>
                    <input type="text" class="form-control" name="segundoNombre" id="segundoNombre" value="Angel">
                </div>

                <div class="mab-3">
                    <label for="apellidoMaterno" class="form-label">Apellido materno:</label>
                    <input type="text" class="form-control" name="apellidoMaterno" id="apellidoMaterno" value="Cruz">
                </div>

                <div class="mab-3">
                    <label for="apellidoPaterno" class="form-label">Apellido paterno:</label>
                    <input type="text" class="form-control" name="apellidoPaterno" id="apellidoPaterno" value="Roman">
                </div>

                <div class="mb-3">
                    <label for="motivoEliminar">Motivo:</label>
                    <select name="motivoEliminar" id="motivoEliminar" class="form-control">
                        <option value="cambioServicio">Cambio de servicio</option>
                        <option value="muerte">Muerte del beneficiario</option>
                        <option value="cambioPais">Cambio de país</option>
                        <option value="recorte">Falta de recursos</option>
                    </select>
                </div>

                <div class="mab-3">
                    <label for="password" class="form-label">Contraseña del administrador:</label>
                    <input type="text" class="form-control" name="password" id="password">
                </div>

                <div class="mab-3">
                    <label for="comentarios" class="form-label">Comentarios extra:</label>
                    <input type="text" class="form-control" name="comentarios" id="comentarios">
                </div>

                <div class="col-2">
                    <input type="image" class="btn btn-danger mt-4" value="Eliminar" src="">
                </div>
            </form>

            <div class="col-2">
                <input type="image" class="btn btn-danger mt-4" value="Cancelar" src="" onclick="window.history.back()">
            </div>

        </div>
    </div>
</div>