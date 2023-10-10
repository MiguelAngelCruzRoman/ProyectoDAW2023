<div class="container">
    <div class="row">
        <div class="col-2"></div>
        <div class="col-8">
            <h1 align="center">Agregar Paciente</h1>

        <form action="<?= base_url('/medico/buscarPacientesAgregar');?>" method="GET">
            <div class="col-5">
                <label for="columnaBusquedaPaciente">Buscar paciente por:</label>
                <select name="columnaBusquedaPaciente" class="form-control">
                    <option value="CURP">CURP</option>
                    <option value="telefono" selected>número telefónico</option>
                    <option value="correo">correo</option>
                </select>
            </div>
                
            <div class="col-5">
                <label for="elementoBusquedaPaciente">Parecido a:</label>
                <input type="number" class="form-control" name="valorCompararBusqueda" value="2311390216">
            </div>

            <input type="image" class="btn btn-success mt-4" value="Realizar Consulta" src="">
        </form>

        <form action="<?= base_url('/medico/opciones');?>" method="GET" >
            <?= csrf_field()?>
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

                <div class="mab-3">
                    <label for="telefono" class="form-label">Número de contacto:</label>
                    <input type="number" class="form-control" name="telefono" id="telefono" value="2311390216">
                </div>

                <div class="mab-3">
                    <label for="CURP" class="form-label">CURP:</label>
                    <input type="text" class="form-control" name="CURP" id="CURP" value="CURM030923HMCRMGA6">
                </div>

                <div class="mab-3">
                    <label for="correo" class="form-label">Correo electrónico:</label>
                    <input type="text" class="form-control" name="correo" id="correo" value="l21te0131@teziutlan.tecnm.mx">
                </div>

                <div class="col-2">
                    <input type="image" class="btn btn-success mt-4" value="Agregar" src="">
                </div>
            </form>

            <div class="col-2">
                <input type="image" class="btn btn-danger mt-4" value="Cancelar" src="" onclick="window.history.back()">
            </div>

        </div>
    </div>
</div>