<div class="container">
    <div class="row">
        <div class="col-2"></div>
        <div class="col-8">
            <form action="<?= base_url('/administrador/administrarMedicos');?>" method="GET">
            <?= csrf_field()?>
                <h1 align="center">Agregar Médico</h1>
                <h4 align="center">Lugar de trabajo</h4>
                
                <input type="hidden" name="" value="">

                <div class="mab-3">
                    <label for="estado" class="form-label">Estado:</label>
                    <input type="text" class="form-control" name="estado" id="estado">
                </div>

                <div class="mab-3">
                    <label for="municipio" class="form-label">Municipio:</label>
                    <input type="text" class="form-control" name="municipio" id="municipio">
                </div>

                <div class="mab-3">
                    <label for="colonia" class="form-label">Colonia:</label>
                    <input type="text" class="form-control" name="colonia" id="colonia">
                </div>

                <div class="mab-3">
                    <label for="calle" class="form-label">Calle:</label>
                    <input type="text" class="form-control" name="calle" id="calle">
                </div>

                <div class="mab-3">
                    <label for="noExterior" class="form-label">Número exterior:</label>
                    <input type="number" class="form-control" name="noExterior" id="noExterior">
                </div>

                <div class="mab-3">
                    <label for="noInterior" class="form-label">Número interior:</label>
                    <input type="number" class="form-control" name="noInterior" id="noInterior">
                </div>

                <div class="mab-3">
                    <label for="nombreConsultorio" class="form-label">Nombre del consultorio:</label>
                    <input type="text" class="form-control" name="nombreConsultorio" id="nombreConsultorio">
                </div>

                <div class="mb-3">
                    <label for="tipoConsultorio">Tipo de consultorio:</label>
                    <select name="tipoConsultorio" id="tipoConsultorio" class="form-control">
                        <option value="" selected></option>
                        <option value="fijo">Fijo</option>
                        <option value="movil" >Movil</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="noConsultorio">Número de consultorio:</label>
                    <input type="number" class="form-control" name="nombreConsultorio" id="nombreConsultorio">
                </div>

                <div class="mb-3">
                    <input type="image" class="btn btn-success mt-4" value="Agregar" src="">
                </div>
            </form>

            <div class="mb-3">
                <input type="image" class="btn btn-primary mt-4" value="Regresar" src="" onclick="window.history.back()">
                <input type="image" class="btn btn-danger mt-4" value="Cancelar" src="" onclick="window.location.href='/administrador/administrarMedicos/'">
            </div>

        </div>
    </div>
</div>