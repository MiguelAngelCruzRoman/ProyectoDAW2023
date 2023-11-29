<div class="container">
    <div class="row justify-content-center">
        <?php
        if (isset($validation)) {
            print $validation->listErrors();
        }
        ?>
        <div class="col-md-8">
            <div id="login-container" class="row justify-content-center">
                <form action="<?= base_url('/administrador/medicamentos/agregarMedicamentos/insert'); ?>" method="POST">
                    <?= csrf_field() ?>
                    <h1 align="center" style="color: #fff">Agregar Medicamentos</h1>

                    <div class="mab-3">
                        <label for="nombreComercial" class="form-label" style="color: #fff">Nombre comercial:</label>
                        <input type="text" class="form-control" name="nombreComercial" id="nombreComercial"
                            placeholder="Ejemplo: Paracetamol" required pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+"
                            max_length="50" min_length="3" style="color: #000000">
                    </div>

                    <div class="mab-3">
                        <label for="nombreCinetifico" class="form-label" style="color: #fff">Nombre científico:</label>
                        <input type="text" class="form-control" name="nombreCinetifico" id="nombreCinetifico"
                            placeholder="Ejemplo: Acetaminofén" required pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+"
                            max_length="80" min_length="3" style="color: #000000">
                    </div>

                    <div class="mb-3">
                        <label for="formaFarmaceutica" style="color: #fff">Forma farmacéutica:</label>
                        <select name="formaFarmaceutica" id="formaFarmaceutica" class="form-control" required
                            style="color: #000000">
                            <option value="Tableta" selected>Tableta</option>
                            <option value="Cápsula">Cápsula</option>
                            <option value="Aerosol">Aerosol</option>
                            <option value="Solución">Solución</option>
                            <option value="Jarabe">Jarabe</option>
                            <option value="Polvo">Polvo</option>
                            <option value="Crema">Crema</option>
                            <option value="Suspensión">Suspensión</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="dosis" style="color: #fff">Dosis recomendada:</label>
                        <select name="dosis" id="dosis" class="form-control" required style="color: #000000">
                            <option value="5" selected>5 mg</option>
                            <option value="10">10 mg</option>
                            <option value="15">15 mg</option>
                            <option value="25">25 mg</option>
                            <option value="50">50 mg</option>
                            <option value="100">100 mg</option>
                            <option value="150">150 mg</option>
                            <option value="200">200 mg</option>
                            <option value="250">250 mg</option>
                            <option value="300">300 mg</option>
                        </select>
                    </div>

                    <div class="mab-3">
                        <label for="fechaCaducidad" class="form-label" style="color: #fff">Fecha de caducidad:</label>
                        <input type="date" class="form-control" name="fechaCaducidad" id="fechaCaducidad" required
                            style="color: #000000">
                    </div>

                    <div class="mab-3">
                        <label for="loteFabricacion" class="form-label" style="color: #fff">Lote de fabricación:</label>
                        <input type="text" class="form-control" name="loteFabricacion" id="loteFabricacion"
                            placeholder="Ejemplo: ABC 78S" required pattern="[A-Z0-9\s]+" max_length="10"
                            style="color: #000000">
                    </div>

                    <div class="mab-3">
                        <label for="stock" class="form-label" style="color: #fff">Stock:</label>
                        <input type="number" class="form-control" name="stock" id="stock" placeholder="Ejemplo: 15"
                            required pattern="[0-9]+" max_length="11" style="color: #000000">
                    </div>

                    <div class="mb-3">
                        <label for="version" style="color: #fff">Versión:</label>
                        <select name="version" id="version" class="form-control" required style="color: #000000">
                            <option value="Adultos">Adulto</option>
                            <option value="Niños">Infantil</option>
                            <option value="Indistinto" selected>Indistinto</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="#" style="color: #fff">Símbolos:</label><br>
                        <div class="mb-3" style="background-color: #fff">

                            <input type="checkbox" name="simbolo[]" style="color: #fff"
                                value="Psicotrópicos">Psicotrópicos
                            <input type="checkbox" name="simbolo[]" style="color: #fff"
                                value="Estupefacientes">Estupefacientes
                            <input type="checkbox" name="simbolo[]" style="color: #fff" value="Frigorifico">Conservación
                            en frigorífico
                            <input type="checkbox" name="simbolo[]" style="color: #fff" value="Caducidad">Caducidad
                            inferior a 5 años
                            <input type="checkbox" name="simbolo[]" style="color: #fff" value="Evitar alcohol">Evitar
                            alcohol
                            <input type="checkbox" name="simbolo[]" style="color: #fff" value="No embarazo">No embarazo
                            <input type="checkbox" name="simbolo[]" style="color: #fff" value="Estómago vacío">Estómago
                            vacío
                            <input type="checkbox" name="simbolo[]" style="color: #fff" value="Con comida">Con comida
                            <input type="checkbox" name="simbolo[]" style="color: #fff" value="No fumar">No fumar
                            <input type="checkbox" name="simbolo[]" style="color: #fff" value="Evitar Sol">Evitar Sol
                            <input type="checkbox" name="simbolo[]" style="color: #fff" value="Ninguno" checked>Ninguno
                        </div>
                    </div>

                    <div class="mab-3">
                        <label for="imagenEmpaque" class="form-label" style="color: #fff">Imagen del empaque:</label>
                        <input type="url" class="form-control" name="imagenEmpaque" id="imagenEmpaque"
                            placeholder="Ejemplo: https://foto.png" required max_length="150" style="color: #000000">
                    </div>

                    <br>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-success">
                            <img src="https://cdn-icons-png.flaticon.com/128/4885/4885419.png" alt="Agregar" width="25"
                                height="25">
                            Agregar
                        </button>
                    </div>
                </form>

                <div class="mb-3">
                    <button type="submit" class="btn btn-danger"
                        onclick="window.location.href='/administrador/medicamentos/administrarMedicamentos/'">
                        <img src="https://cdn-icons-png.flaticon.com/128/561/561189.png" alt="Cancelar" width="25"
                            height="25">
                        Cancelar
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>