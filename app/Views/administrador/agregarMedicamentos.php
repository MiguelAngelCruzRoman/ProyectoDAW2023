<div class="container">
    <div class="row">
        <div class="col-2"></div>
        <div class="col-8">
            <form action="<?= base_url('/administrador/administrarMedicamentos');?>" method="GET">
            <?= csrf_field()?>
                <h1 align="center">Agregar Medicamentos</h1>
                
                <input type="hidden" name="" value="">

                <div class="mab-3" align="center">
                        <img src="" alt="medicamento" class="service-img">
                </div>	
                <div class="mab-3">
                    <label for="nombreComercial" class="form-label">Nombre comercial:</label>
                    <input type="text" class="form-control" name="nombreComercial" id="nombreComercial">
                </div>

                <div class="mab-3">
                    <label for="nombreCientifico" class="form-label">Nombre científico:</label>
                    <input type="text" class="form-control" name="nombreCientifico" id="nombreCientifico" >
                </div>

                <div class="mab-3">
                    <label for="forma" class="form-label">Forma comercial:</label>
                    <input type="text" class="form-control" name="forma" id="forma" >
                </div>

                <div class="mab-3">
                    <label for="dosis" class="form-label">Dosis:</label>
                    <input type="text" class="form-control" name="dosis" id="dosis" >
                </div>

                <div class="mab-3">
                    <label for="caduciad" class="form-label">Fecha de caducidad:</label>
                    <input type="date" class="form-control" name="caduciad" id="caduciad">
                </div>

                <div class="mab-3">
                    <label for="lote" class="form-label">Lote de fabricación:</label>
                    <input type="text" class="form-control" name="lote" id="lote">
                </div>

                <div class="mb-3">
                    <label for="version">Versión:</label>
                    <select name="version" id="version" class="form-control">
                        <option value="" selected></option>
                        <option value="adulto" >Adulto</option>
                        <option value="infantil" >Infantil</option>
                        <option value="indistinto" >Indistinto</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="simbolos">Símbolos:</label>
                    <input type="checkbox" name="psicotrópicos">Psicotrópicos
                    <input type="checkbox" name="estupefacientes">Estupefacientes
                    <input type="checkbox" name="frigorifico">Conservación en frigorífico
                    <input type="checkbox" name="caducidad5">Caducidad inferior a 5 años
                </div>

                <div class="mab-3">
                        <label for="foto" class="form-label">Imagen del empaque:</label>
                        <input type="image" >
                </div>

                <div class="mb-3">
                    <input type="image" class="btn btn-warning mt-4" value="Guardar" src="">
                </div>
            </form>

            <div class="mb-3">
                <input type="image" class="btn btn-danger mt-4" value="Cancelar" src="" onclick="window.location.href='/administrador/administrarMedicamentos/'">
            </div>

        </div>
    </div>
</div>