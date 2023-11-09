<div class="container">
    <div class="row">
        <div class="col-2"></div>
        <div class="col-8">
            <form action="<?= base_url('/administrador/administrarPacientes');?>" method="GET">
            <?= csrf_field()?>
                <h1 align="center">Agregar Paciente</h1>
                <h4 align="center">Domicilio</h4>
                
                <input type="hidden" name="" value="">

                <div class="mab-3">
                    <label for="estado" class="form-label">Estado:</label>
                    <input type="text" class="form-control" name="estado" id="estado" value="Puebla">
                </div>

                <div class="mab-3">
                    <label for="municipio" class="form-label">Municipio:</label>
                    <input type="text" class="form-control" name="municipio" id="municipio" value="Teziutlán">
                </div>

                <div class="mab-3">
                    <label for="colonia" class="form-label">Colonia:</label>
                    <input type="text" class="form-control" name="colonia" id="colonia" value="Emiliano Zapata">
                </div>

                <div class="mab-3">
                    <label for="calle" class="form-label">Calle:</label>
                    <input type="text" class="form-control" name="calle" id="calle" value="El Mirador">
                </div>

                <div class="mab-3">
                    <label for="noExterior" class="form-label">Número exterior:</label>
                    <input type="number" class="form-control" name="noExterior" id="noExterior" value="33">
                </div>

                <div class="mab-3">
                    <label for="noInterior" class="form-label">Número interior:</label>
                    <input type="text" class="form-control" name="noInterior" id="noInterior" value="N/A">
                </div>

                <div class="mab-3">
                    <label for="CP" class="form-label">Código Postal:</label>
                    <input type="text" class="form-control" name="CP" id="CP" value="73950">
                </div>

                <div class="mb-3">
                    <label for="tipoVivienda">Tipo de vivienda:</label>
                    <select name="tipoVivienda" id="tipoVivienda" class="form-control">
                        <option value="casaFirme" selected>Casa firme</option>
                        <option value="viviendaMovil" >Vivienda móvil</option>
                        <option value="departamento" >Departamento</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="tipoCalle">Tipo de calle:</label>
                    <select name="tipoCalle" id="tipoCalle" class="form-control">
                        <option value="privada" selected>Privada</option>
                        <option value="terracería" >Terracería</option>
                        <option value="carretera" >Carretera</option>
                        <option value="peatonal" >Peatonal</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="zonaVivienda">Zona de vivienda:</label>
                    <select name="zonaVivienda" id="zonaVivienda" class="form-control">
                        <option value="urbana" selected>Urbana</option>
                        <option value="rural" >Rural</option>
                        <option value="protegida" >Protegida</option>
                    </select>
                </div>

                <div class="mb-3">
                    <input type="image" class="btn btn-warning mt-4" value="Guardar" src="">
                </div>
            </form>

            <div class="mb-3">
                <input type="image" class="btn btn-primary mt-4" value="Regresar" src="" onclick="window.history.back()">
                <input type="image" class="btn btn-danger mt-4" value="Cancelar" src="" onclick="window.location.href='/administrador/administrarPacientes'">
            </div>

        </div>
    </div>
</div>