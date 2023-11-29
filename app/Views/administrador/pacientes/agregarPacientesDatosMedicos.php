<div class="container">
    <div class="row justify-content-center">
        <?php
        if (isset($validation)) {
            print $validation->listErrors();
        }
        ?>
        <div class="col-md-8">
            <div id="login-container" class="row justify-content-center">

                <form action="<?= base_url('/administrador/pacientes/agregarPacientesDireccion'); ?>" method="POST">
                    <?= csrf_field() ?>
                    <h1 align="center" style="color: #fff">Agregar Paciente</h1>
                    <h4 align="center" style="color: #fff">-Historial Médico-</h4>

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
                        <label for="statusSeguro" style="color: #fff">Tipo del seguro:</label>
                        <select name="statusSeguro" id="statusSeguro" class="form-control" required
                            style="color: #000000">
                            <option value="Ninguno" selected>Ninguno</option>
                            <option value="Seguro Privado">Seguro privado</option>
                            <option value="Seguro Social">Seguro social</option>
                            <option value="Seguro Estudiantil">Seguro estudiantil</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="sangre" style="color: #fff">Tipo de sangre:</label>
                        <select name="sangre" id="sangre" class="form-control" required style="color: #000000">
                            <option value="O+">O+</option>
                            <option value="O-">O-</option>
                            <option value="A+">A+</option>
                            <option value="A-">A-</option>
                            <option value="AB+">AB+</option>
                            <option value="AB-">AB-</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="alergia" style="color: #fff">Alergia:</label>
                        <select name="alergia" id="alergia" class="form-control" required style="color: #000000">
                            <option value="Ninguna" selected>Ninguna</option>
                            <option value="Poliester">Poliester</option>
                            <option value="Alcohol">Alcohol</option>
                            <option value="Algodón">Algodón</option>
                            <option value="Latex">Latex</option>
                        </select>
                    </div>

                    <div class="mab-3">
                        <label for="fechaChequeo" class="form-label" style="color: #fff">Fecha de última
                            revisión:</label>
                        <input type="date" class="form-control" name="fechaChequeo" id="fechaChequeo" required
                            style="color: #000000">
                    </div>

                    <div class="mb-3">
                        <label for="motivoConsulta" style="color: #fff">Motivo de última consulta:</label>
                        <select name="motivoConsulta" id="motivoConsulta" class="form-control" required
                            style="color: #000000">
                            <option value="Preventivo" selected>Preventivo</option>
                            <option value="Enfermedad">Enfermedad</option>
                            <option value="Rutinario">Rutinario</option>
                            <option value="Seguimiento">Seguimiento</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="#" style="color: #fff">Habítos tóxicos:</label>
                        <br>
                        <div class="mb-3" style="background-color: #fff">
                            <input type="checkbox" name="habitosToxicos[]" value="Fumador">Fumar
                            <input type="checkbox" name="habitosToxicos[]" value="Mala alimentación">Mala alimentación
                            <input type="checkbox" name="habitosToxicos[]" value="Alcohol">Alcohol
                            <input type="checkbox" name="habitosToxicos[]" value="Drogas">Drogas
                            <input type="checkbox" name="habitosToxicos[]" value="Ninguno" checked>Ninguno
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="#" style="color: #fff">Condiciones previas:</label>
                        <br>
                        <div class="mb-3" style="background-color: #fff">
                            <input type="checkbox" name="condicionesPrevias[]" value="Diabetes">Diabetes
                            <input type="checkbox" name="condicionesPrevias[]" value="Embarazo">Embarazo
                            <input type="checkbox" name="condicionesPrevias[]" value="Cancer">Cancer
                            <input type="checkbox" name="condicionesPrevias[]" value="Hipertension">Hipertensión
                            <input type="checkbox" name="condicionesPrevias[]" value="Sobrepeso">Sobrepeso/Obesidad
                            <input type="checkbox" name="condicionesPrevias[]" value="COVID">COVID
                            <input type="checkbox" name="condicionesPrevias[]" value="Bulimia">Bulimia/Anorexia
                            <input type="checkbox" name="condicionesPrevias[]" value="Fiebre">Fiebre del mono
                            <input type="checkbox" name="condicionesPrevias[]" value="Ninguna" checked>Ninguna
                        </div>
                    </div>

                    <br>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-success">
                            <img src="https://cdn-icons-png.flaticon.com/128/3585/3585717.png" alt="Siguiente"
                                width="25" height="25">
                            Siguiente
                        </button>
                    </div>
                </form>

                <div class="mb-3">
                    <button type="submit" class="btn btn-primary" onclick="window.history.back()">
                        <img src="https://cdn-icons-png.flaticon.com/128/3585/3585896.png" alt="Regresar" width="25"
                            height="25">
                        Regresar
                    </button>
                    <button type="submit" class="btn btn-danger"
                        onclick="window.location.href='/administrador/pacientes/administrarPacientes'">
                        <img src="https://cdn-icons-png.flaticon.com/128/561/561189.png" alt="Cancelar" width="25"
                            height="25">
                        Cancelar
                    </button>
                </div>

            </div>
        </div>
    </div>
</div>