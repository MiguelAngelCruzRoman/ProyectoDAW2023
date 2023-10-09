<div class="container">
    <div class="row">
        <div class="col-2"></div>
        <div class="col-8">
        <form action="<?= base_url('/administrador/editarPaciente2');?>" method="GET" >
            <?= csrf_field()?>
                <h1 align="center">Editar Paciente</h1>
                <h4 align="center">Información Personal</h4>
                
                <input type="hidden" name="" value="">

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

                <div class="mab-3">
                    <label for="telefono" class="form-label">Número de contacto:</label>
                    <input type="number" class="form-control" name="telefono" id="telefono" value="2311390216">
                </div>

                <div class="mab-3">
                    <label for="CURP" class="form-label">CURP:</label>
                    <input type="text" class="form-control" name="CURP" id="CURP" value="CURM030923HMCRMGA6">
                </div>

                <div class="mb-3">
                    <label for="seguro">Tipo de seguro:</label>
                    <select name="seguro" id="seguro" class="form-control">
                        <option value="estudiantil" selected>Estudiantil</option>
                        <option value="laboral">Laboral</option>
                        <option value="adquirido">Adquirido</option>
                        <option value="heredado">Heredado</option>
                        <option value="ninguno">Ninguno</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="statusSeguro">Estatus del seguro:</label>
                    <select name="statusSeguro" id="statusSeguro" class="form-control">
                        <option value="activo" selected>Activo</option>
                        <option value="baja" >Baja</option>
                        <option value="pausa" >En pauso</option>
                    </select>
                </div>

                <div class="mab-3">
                    <label for="correo" class="form-label">Correo electrónico:</label>
                    <input type="text" class="form-control" name="correo" id="correo" value="l21te0131@teziutlan.tecnm.mx">
                </div>

                <div class="mab-3">
                    <label for="contraseña" class="form-label">Contraseña:</label>
                    <input type="text" class="form-control" name="contraseña" id="contraseña" value="contraseña1">
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