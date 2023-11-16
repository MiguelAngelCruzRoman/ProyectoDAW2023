<div class="container">
    <div class="row">
        <div class="col-2"></div>
        <div class="col-8">
            <form action="<?= base_url('/administrador/administrarMedicos'); ?>" method="GET">
                <?= csrf_field() ?>
                <h1 align="center">Eliminar Medicamento</h1>

                <input type="hidden" name="" value="">

                <div class="mab-3" align="center">
                    <img src="" alt="medicamento" class="service-img">
                </div>

                <div class="mab-3">
                    <label for="primerNombre" class="form-label">Primer nombre:</label>
                    <input type="text" class="form-control" name="primerNombre" id="primerNombre">
                </div>

                <div class="mab-3">
                    <label for="segundoNombre" class="form-label">Segundo nombre:</label>
                    <input type="text" class="form-control" name="segundoNombre" id="segundoNombre">
                </div>

                <div class="mab-3">
                    <label for="apellidoPaterno" class="form-label">Apellido paterno:</label>
                    <input type="text" class="form-control" name="apellidoPaterno" id="apellidoPaterno">
                </div>

                <div class="mab-3">
                    <label for="apellidoMaterno" class="form-label">Apellido materno:</label>
                    <input type="text" class="form-control" name="apellidoMaterno" id="apellidoMaterno">
                </div>

                <div class="mb-3">
                    <label for="motivoEliminar">Motivo:</label>
                    <select name="motivoEliminar" id="motivoEliminar" class="form-control">
                        <option value="cambioTrabajo">Cambio de trabajo</option>
                        <option value="muerte">Muerte del médico</option>
                        <option value="cambioPais">Cambio de país</option>
                        <option value="recorte">Falta de recursos</option>
                    </select>
                </div>

                <div class="mab-3">
                    <label for="password" class="form-label">Contraseña de administrador:</label>
                    <input type="text" class="form-control" name="password" id="password">
                </div>

                <div class="mab-3">
                    <label for="comentarios" class="form-label">Comentarios extra:</label>
                    <input type="text" class="form-control" name="comentarios" id="comentarios">
                </div>

                <div class="mb-3">
                    <input type="image" class="btn btn-danger mt-4" value="Eliminar" src="">
                </div>
            </form>

            <div class="mb-3">
                <input type="image" class="btn btn-danger mt-4" value="Cancelar" src=""
                    onclick="window.location.href='/administrador/administrarMedicos'">
            </div>

        </div>
    </div>
</div>