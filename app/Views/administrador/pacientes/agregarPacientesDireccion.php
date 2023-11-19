<div class="container">
    <div class="row">
        <div class="col-2"></div>
        <div class="col-8">
            <form action="<?= base_url('/administrador/pacientes/agregarPacientes/insert'); ?>" method="POST">
                <?= csrf_field() ?>
                <h1 align="center">Agregar Paciente</h1>
                <h4 align="center">Domicilio</h4>

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
                <input type="hidden" name="statusSeguro" value=<?= $statusSeguro ?>>
                <input type="hidden" name="sangre" value=<?= $sangre ?>>
                <input type="hidden" name="alergia" value=<?= $alergia ?>>
                <input type="hidden" name="fechaChequeo" value=<?= $fechaChequeo ?>>
                <input type="hidden" name="motivoConsulta" value=<?= $motivoConsulta ?>>
                <?php foreach ($habitosToxicos as $ht): ?>
                    <input type="hidden" name="habitosToxicos[]" value=<?= $ht ?>>
                <?php endforeach; ?>
                <?php foreach ($condicionesPrevias as $cp): ?>
                    <input type="hidden" name="condicionesPrevias[]" value=<?= $cp ?>>
                <?php endforeach; ?>


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
                    <label for="noExt" class="form-label">Número exterior:</label>
                    <input type="number" class="form-control" name="noExt" id="noExt">
                </div>

                <div class="mab-3">
                    <label for="noInt" class="form-label">Número interior:</label>
                    <input type="text" class="form-control" name="noInt" id="noInt">
                </div>

                <div class="mab-3">
                    <label for="CP" class="form-label">Código Postal:</label>
                    <input type="text" class="form-control" name="CP" id="CP">
                </div>

                <div class="mb-3">
                    <label for="tipo">Tipo de dirección:</label>
                    <select name="tipo" id="tipo" class="form-control">
                        <option value="Casa">Casa</option>
                        <option value="Departamento">Departamento</option>
                        <option value="Oficina">Oficina</option>
                    </select>
                </div>

                <br>
                <div class="mb-3">
                    <button type="submit" class="btn btn-success">
                        <img src="https://cdn-icons-png.flaticon.com/128/4885/4885419.png" alt="Agregar" width="25" height="25">
                        Agregar
                    </button>
                </div>
            </form>

            <div class="mb-3">
                    <button type="submit" class="btn btn-primary" onclick="window.history.back()">
                        <img src="https://cdn-icons-png.flaticon.com/128/3585/3585896.png" alt="Regresar" width="25" height="25">
                        Regresar
                    </button>
                    <button type="submit" class="btn btn-danger" onclick="window.location.href='/administrador/pacientes/administrarPacientes'">
                        <img src="https://cdn-icons-png.flaticon.com/128/561/561189.png" alt="Cancelar" width="25" height="25">
                        Cancelar
                    </button>
            </div>
        </div>
    </div>
</div>