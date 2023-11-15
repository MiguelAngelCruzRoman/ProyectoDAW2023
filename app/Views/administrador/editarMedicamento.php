<div class="container">
    <div class="row">
        <div class="col-2"></div>
        <div class="col-8">
            <form action="<?= base_url('/administrador/editarMedicamento/update');?>" method="POST">
            <?= csrf_field()?>
                <h1 align="center">Editar Medicamento</h1>
                
                <input type="hidden" name="id" value="<?= $medicamento->id ?>">

                <div class="mab-3" align="center">
                        <img src="<?= $medicamento->imagenEmpaque ?>" alt="medicamento" class="service-img"  width="300" height="300">
                        <input type="url" class="form-control" name="imagenEmpaque" id="imagenEmpaque" value="<?= $medicamento->imagenEmpaque ?>">
                </div>	
                
                <div class="mab-3">
                    <label for="nombreComercial" class="form-label">Nombre comercial:</label>
                    <input type="text" class="form-control" name="nombreComercial" id="nombreComercial" value="<?=$medicamento->nombreComercial?>">
                </div>

                <div class="mab-3">
                    <label for="nombreCinetifico" class="form-label">Nombre científico:</label>
                    <input type="text" class="form-control" name="nombreCinetifico" id="nombreCinetifico" value="<?=$medicamento->nombreCinetifico?>">
                </div>

                <div class="mb-3">
                    <label for="formaFarmaceutica">Forma farmacéutica:</label>
                    <select name="formaFarmaceutica" id="formaFarmaceutica" class="form-control">
                        <option value="<?= $medicamento->formaFarmaceutica ?>" selected><?= $medicamento->formaFarmaceutica ?></option>
                        <option value="Tableta" >Tableta</option>
                        <option value="Cápsula" >Cápsula</option>
                        <option value="Aerosol" >Aerosol</option>
                        <option value="Solución" >Solución</option>
                        <option value="Jarabe" >Jarabe</option>
                        <option value="Polvo" >Polvo</option>
                        <option value="Crema" >Crema</option>
                        <option value="Suspensión" >Suspensión</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="dosis">Dosis recomendada:</label>
                    <select name="dosis" id="dosis" class="form-control">
                        <option value="<?= $medicamento->dosis ?>" selected><?= $medicamento->dosis ?> mg</option>
                        <option value="5" >5 mg</option>
                        <option value="10" >10mg</option>
                        <option value="15" >15 mg</option>
                        <option value="25" >25 mg</option>
                        <option value="50" >50 mg</option>
                        <option value="100" >100 mg</option>
                        <option value="150" >150 mg</option>
                        <option value="200" >200 mg</option>
                        <option value="250" >250 mg</option>
                        <option value="300" >300 mg</option>
                    </select>
                </div>

                <div class="mab-3">
                    <label for="fechaCaducidad" class="form-label">Fecha de caducidad:</label>
                    <input type="date" class="form-control" name="fechaCaducidad" id="fechaCaducidad" value="<?=$medicamento->fechaCaducidad?>">
                </div>

                <div class="mab-3">
                    <label for="loteFabricacion" class="form-label">Lote de fabricación:</label>
                    <input type="text" class="form-control" name="loteFabricacion" id="loteFabricacion" value="<?=$medicamento->loteFabricacion?>">
                </div>

                <div class="mab-3">
                    <label for="stock" class="form-label">Stock:</label>
                    <input type="text" class="form-control" name="stock" id="stock" value="<?=$medicamento->stock?>">
                </div>

                <div class="mb-3">
                    <label for="version">Versión:</label>
                    <select name="version" id="version" class="form-control">
                        <option value="<?= $medicamento->version ?>" selected><?= $medicamento->version ?></option>
                        <option value="Adultos" >Adulto</option>
                        <option value="Niños" >Infantil</option>
                        <option value="Indistinto" >Indistinto</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="#">Símbolos:</label>
                    <input type="checkbox" name="simbolo[]" value="Psicotrópicos" <?php if ($medicamento->simbolo == 'Psicotrópicos') echo "checked"; ?>>Psicotrópicos
                    <input type="checkbox" name="simbolo[]" value="Estupefacientes" <?php if ($medicamento->simbolo == 'Estupefacientes') echo "checked"; ?>>Estupefacientes
                    <input type="checkbox" name="simbolo[]" value="Frigorifico" <?php if ($medicamento->simbolo == 'Frigorifico') echo "checked"; ?>>Conservación en frigorífico
                    <input type="checkbox" name="simbolo[]" value="Caducidad" <?php if ($medicamento->simbolo == 'Caducidad') echo "checked"; ?>>Caducidad inferior a 5 años
                    <input type="checkbox" name="simbolo[]" value="Evitar alcohol" <?php if ($medicamento->simbolo == 'Evitar alcohol') echo "checked"; ?>>Evitar alcohol
                    <input type="checkbox" name="simbolo[]" value="No embarazo" <?php if ($medicamento->simbolo == 'No embarazo') echo "checked"; ?>>No embarazo
                    <input type="checkbox" name="simbolo[]" value="Estómago vacío" <?php if ($medicamento->simbolo == 'Estómago vacío') echo "checked"; ?>>Estómago vacío
                    <input type="checkbox" name="simbolo[]" value="Con comida" <?php if ($medicamento->simbolo == 'Con comida') echo "checked"; ?>>Con comida
                    <input type="checkbox" name="simbolo[]" value="No fumar" <?php if ($medicamento->simbolo == 'No fumar') echo "checked"; ?>>No fumar
                    <input type="checkbox" name="simbolo[]" value="Evitar Sol" <?php if ($medicamento->simbolo == 'Evitar Sol') echo "checked"; ?>>Evitar Sol
                </div>

                <div class="mb-3">
                    <input type="image" class="btn btn-warning mt-4" value="Guardar" src="">
                </div>
            </form>

            <div class="mb-3">
                <input type="image" class="btn btn-danger mt-4" value="Cancelar" src="" onclick="window.location.href='/administrador/administrarPacientes'">
            </div>

        </div>
    </div>
</div>