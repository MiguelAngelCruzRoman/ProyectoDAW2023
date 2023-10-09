<div class="container">
    <div class="row">
        <div class="col-2"></div>
        <div class="col-8">
            <form action="<?= base_url('/administrador/administrarMedicamentos');?>" method="GET">
            <?= csrf_field()?>
                <h1 align="center">Eliminar Medicamento</h1>
                
                <input type="hidden" name="" value="">

                <div class="mab-3" align="center">
                        <img src="" alt="medicamento" class="service-img">
                </div>	
                
                <div class="mab-3">
                    <label for="nombreComercial" class="form-label">Nombre comercial:</label>
                    <input type="text" class="form-control" name="nombreComercial" id="nombreComercial" value="Aspirina">
                </div>

                <div class="mab-3">
                    <label for="nombreCientifico" class="form-label">Nombre científico:</label>
                    <input type="text" class="form-control" name="nombreCientifico" id="nombreCientifico" value="Ácido acetilsalicilico">
                </div>

                <div class="mab-3">
                    <label for="forma" class="form-label">Forma comercial:</label>
                    <input type="text" class="form-control" name="forma" id="forma" value="Tabletas">
                </div>

                <div class="mab-3">
                    <label for="dosis" class="form-label">Dosis:</label>
                    <input type="text" class="form-control" name="dosis" id="dosis" value="500 mg">
                </div>

                <div class="mab-3">
                    <label for="caduciad" class="form-label">Fecha de caducidad:</label>
                    <input type="date" class="form-control" name="caduciad" id="caduciad" value="2024-05-20">
                </div>

                <div class="mab-3">
                    <label for="lote" class="form-label">Lote de fabricación:</label>
                    <input type="text" class="form-control" name="lote" id="lote" value="G-3">
                </div>

                <div class="mb-3">
                    <label for="version">Versión:</label>
                    <select name="version" id="version" class="form-control">
                        <option value="adulto" selected>Adulto</option>
                        <option value="infantil" >Infantil</option>
                        <option value="indistinto" >Indistinto</option>
                    </select>
                </div>

                <div class="mb-3">
                    <input type="image" class="btn btn-danger mt-4" value="Eliminar" src="">
                </div>
            </form>

            <div class="mb-3">
                <input type="image" class="btn btn-danger mt-4" value="Cancelar" src="" onclick="window.location.href='/administrador/administrarPacientes'">
            </div>

        </div>
    </div>
</div>