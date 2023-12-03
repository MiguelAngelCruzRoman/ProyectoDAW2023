<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div id="login-container" class="row justify-content-center">
                <?php if (isset($validation)): ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $validation->listErrors(); ?>
                    </div>
                <?php endif; ?>
                <form action="<?= base_url('/administrador/pacientes/editarPacienteDireccion/' . $paciente->id); ?>"
                    method="POST">
                    <?= csrf_field() ?>
                    <h1 align="center" style="color: #fff">Editar Paciente</h1>
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
                    <input type="hidden" name="id" value="<?= $id ?>">

                    <div class="mb-3">
                        <label for="seguro" style="color: #fff">Tipo de seguro:</label>
                        <select name="seguro" id="seguro" class="form-control" required style="color: #000000">
                            <option value="<?= $paciente->statusSeguro ?>" selected>
                                <?= $paciente->statusSeguro ?>
                            </option>
                            <option value="estudiantil">Estudiantil</option>
                            <option value="laboral">Laboral</option>
                            <option value="adquirido">Adquirido</option>
                            <option value="heredado">Heredado</option>
                            <option value="ninguno">Ninguno</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="sangre" style="color: #fff">Tipo de sangre:</label>
                        <select name="sangre" id="sangre" class="form-control" required style="color: #000000">
                            <option value="<?= $paciente->tipoSangre ?>" selected>
                                <?= $paciente->tipoSangre ?>
                            </option>
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
                            <option value="<?= $paciente->alergia ?>" selected>
                                <?= $paciente->alergia ?>
                            </option>
                            <option value="ninguna" selected>Ninguna</option>
                            <option value="poliester">poliester</option>
                            <option value="alcohol">alcohol</option>
                            <option value="algodon">algodón</option>
                            <option value="latex">latex</option>
                        </select>
                    </div>

                    <div class="mab-3">
                        <label for="fechaRevision" class="form-label" style="color: #fff">Fecha de última
                            revisión:</label>
                        <input type="date" class="form-control" name="fechaRevision" id="fechaRevision" required
                            value="<?= $paciente->fechaRevision ?>" style="color: #000000">
                    </div>

                    <div class="mb-3">
                        <label for="motivoRevision" style="color: #fff">Motivo de última consulta:</label>
                        <select name="motivoRevision" id="motivoRevision" class="form-control" required
                            style="color: #000000">
                            <option value="<?= $paciente->motivoRevision ?>" selected>
                                <?= $paciente->motivoRevision ?>
                            </option>
                            <option value="preventivo">Preventivo</option>
                            <option value="enfermedad">Enfermedad</option>
                            <option value="rutinario">Rutinario</option>
                            <option value="seguimiento">Seguimiento</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="#" style="color: #fff">Habítos tóxicos:</label>
                        <br>
                        <div class="mb-3" style="background-color: #fff">
                            <input type="checkbox" name="habitosToxicos[]" value="Fumador" <?php if ($paciente->habitoToxico == 'Fumador')
                                echo "checked"; ?>>Fumar
                            <input type="checkbox" name="habitosToxicos[]" value="Mala alimentación" <?php if ($paciente->habitoToxico == 'Mala alimentación')
                                echo "checked"; ?>>Mala alimentación
                            <input type="checkbox" name="habitosToxicos[]" value="Alcohol" <?php if ($paciente->habitoToxico == 'Alcohol')
                                echo "checked"; ?>>Alcohol
                            <input type="checkbox" name="habitosToxicos[]" value="Drogas" <?php if ($paciente->habitoToxico == 'Drogas')
                                echo "checked"; ?>>Drogas
                            <input type="checkbox" name="habitosToxicos[]" value="Ninguno" <?php if ($paciente->habitoToxico == 'Ninguno')
                                echo "checked"; ?>>Ninguno
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="#" style="color: #fff">Condiciones previas:</label>
                        <br>
                        <div class="mb-3" style="background-color: #fff">

                            <input type="checkbox" name="condicionesPrevias[]" value="Diabetes" <?php if ($paciente->condicionesPrevias == 'Diabetes')
                                echo "checked"; ?>>Diabetes
                            <input type="checkbox" name="condicionesPrevias[]" value="Embarazo" <?php if ($paciente->condicionesPrevias == 'Embarazo')
                                echo "checked"; ?>>Embarazo
                            <input type="checkbox" name="condicionesPrevias[]" value="Cancer" <?php if ($paciente->condicionesPrevias == 'Cancer')
                                echo "checked"; ?>>Cancer
                            <input type="checkbox" name="condicionesPrevias[]" value="Hipertension" <?php if ($paciente->condicionesPrevias == 'Hipertension')
                                echo "checked"; ?>>Hipertensión
                            <input type="checkbox" name="condicionesPrevias[]" value="Sobrepeso" <?php if ($paciente->condicionesPrevias == 'Sobrepeso')
                                echo "checked"; ?>>Sobrepeso/Obesidad
                            <input type="checkbox" name="condicionesPrevias[]" value="COVID" <?php if ($paciente->condicionesPrevias == 'COVID')
                                echo "checked"; ?>>COVID
                            <input type="checkbox" name="condicionesPrevias[]" value="Bulimia" <?php if ($paciente->condicionesPrevias == 'Bulimia')
                                echo "checked"; ?>>Bulimia/Anorexia
                            <input type="checkbox" name="condicionesPrevias[]" value="Fiebre" <?php if ($paciente->condicionesPrevias == 'Fiebre')
                                echo "checked"; ?>>Fiebre del mono
                            <input type="checkbox" name="condicionesPrevias[]" value="Ninguna" <?php if ($paciente->condicionesPrevias == 'Ninguna')
                                echo "checked"; ?>>Ninguna
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