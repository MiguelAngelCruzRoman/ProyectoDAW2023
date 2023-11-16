<div class="container">
    <div class="row">
        <div class="col-2"></div>
        <div class="col-8">
            <form action="<?= base_url('/administrador/agregarPacientes3'); ?>" method="POST">
                <?= csrf_field() ?>
                <h1 align="center">Agregar Paciente</h1>
                <h4 align="center">Historial Médico</h4>

                <input type="hidden" name="primerNombre" value=<?= $primerNombre ?>>
                <input type="hidden" name="segundoNombre" value=<?= $segundoNombre ?>>
                <input type="hidden" name="apellidoPaterno" value=<?= $apellidoPaterno ?>>
                <input type="hidden" name="apellidoMaterno" value=<?= $apellidoMaterno ?>>
                <input type="hidden" name="genero" value=<?= $genero ?>>
                <input type="hidden" name="telefono" value=<?= $telefono ?>>
                <input type="hidden" name="CURP" value=<?= $CURP ?>>
                <input type="hidden" name="correo" value=<?= $correo ?>>
                <input type="hidden" name="username" value=<?= $username ?>>
                <input type="hidden" name="contraseña" value=<?= $contraseña ?>>
                <input type="hidden" name="foto" value=<?= $foto ?>>


                <div class="mb-3">
                    <label for="statusSeguro">Tipo del seguro:</label>
                    <select name="statusSeguro" id="statusSeguro" class="form-control">
                        <option value=""></option>
                        <option value="Ninguno" selected>Ninguno</option>
                        <option value="Seguro Privado">Seguro privado</option>
                        <option value="Seguro Social">Seguro social</option>
                        <option value="Seguro Estudiantil">Seguro estudiantil</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="sangre">Tipo de sangre:</label>
                    <select name="sangre" id="sangre" class="form-control">
                        <option value="O+">O+</option>
                        <option value="O-">O-</option>
                        <option value="A+">A+</option>
                        <option value="A-">A-</option>
                        <option value="AB+">AB+</option>
                        <option value="AB-">AB-</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="alergia">Alergia:</label>
                    <select name="alergia" id="alergia" class="form-control">
                        <option value="Ninguna" selected>Ninguna</option>
                        <option value="Poliester">Poliester</option>
                        <option value="Alcohol">Alcohol</option>
                        <option value="Algodón">Algodón</option>
                        <option value="Latex">Latex</option>
                    </select>
                </div>

                <div class="mab-3">
                    <label for="fechaChequeo" class="form-label">Fecha de última revisión:</label>
                    <input type="date" class="form-control" name="fechaChequeo" id="fechaChequeo">
                </div>

                <div class="mb-3">
                    <label for="motivoConsulta">Motivo de última consulta:</label>
                    <select name="motivoConsulta" id="motivoConsulta" class="form-control">
                        <option value="Preventivo" selected>Preventivo</option>
                        <option value="Enfermedad">Enfermedad</option>
                        <option value="Rutinario">Rutinario</option>
                        <option value="Seguimiento">Seguimiento</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="#">Habítos tóxicos:</label>
                    <input type="checkbox" name="habitosToxicos[]" value="Fumador">Fumar
                    <input type="checkbox" name="habitosToxicos[]" value="Mala alimentación">Mala alimentación
                    <input type="checkbox" name="habitosToxicos[]" value="Alcohol">Alcohol
                    <input type="checkbox" name="habitosToxicos[]" value="Drogas">Drogas
                    <input type="checkbox" name="habitosToxicos[]" value="Ninguno">Ninguno
                </div>

                <div class="mb-3">
                    <label for="#">Condiciones previas:</label>
                    <input type="checkbox" name="condicionesPrevias[]" value="Diabetes">Diabetes
                    <input type="checkbox" name="condicionesPrevias[]" value="Embarazo">Embarazo
                    <input type="checkbox" name="condicionesPrevias[]" value="Cancer">Cancer
                    <input type="checkbox" name="condicionesPrevias[]" value="Hipertension">Hipertensión
                    <input type="checkbox" name="condicionesPrevias[]" value="Sobrepeso">Sobrepeso/Obesidad
                    <input type="checkbox" name="condicionesPrevias[]" value="COVID">COVID
                    <input type="checkbox" name="condicionesPrevias[]" value="Bulimia">Bulimia/Anorexia
                    <input type="checkbox" name="condicionesPrevias[]" value="Fiebre">Fiebre del mono
                    <input type="checkbox" name="condicionesPrevias[]" value="Ninguna">Ninguna
                </div>

                <div class="mb-3">
                    <input type="image" class="btn btn-success mt-4" value="Siguiente" src="">
                </div>
            </form>

            <div class="mb-3">
                <input type="image" class="btn btn-primary mt-4" value="Regresar" src=""
                    onclick="window.history.back()">
                <input type="image" class="btn btn-danger mt-4" value="Cancelar" src=""
                    onclick="window.location.href='/administrador/administrarPacientes'">
            </div>

        </div>
    </div>
</div>