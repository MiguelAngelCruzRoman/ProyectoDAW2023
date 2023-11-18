<div class="container">
    <div class="row">
        <div class="col-2"></div>
        <div class="col-8">
            <form action="<?= base_url('/administrador/pacientes/editarPaciente/update'); ?>" method="post">
                <?= csrf_field() ?>
                <h1 align="center">Editar Paciente</h1>
                <h4 align="center">Domicilio</h4>

                <input type="hidden" name="id" value=<?= $id ?>>
                <input type="hidden" name="primerNombre" value=<?= $primerNombre ?>>
                <input type="hidden" name="segundoNombre" value=<?= $segundoNombre ?>>
                <input type="hidden" name="apellidoPaterno" value=<?= $apellidoPaterno ?>>
                <input type="hidden" name="apellidoMaterno" value=<?= $apellidoMaterno ?>>
                <input type="hidden" name="telefono" value=<?= $telefono ?>>
                <input type="hidden" name="CURP" value=<?= $CURP ?>>
                <input type="hidden" name="seguro" value=<?= $seguro ?>>
                <input type="hidden" name="correo" value=<?= $correo ?>>
                <input type="hidden" name="contraseña" value=<?= $contraseña ?>>
                <input type="hidden" name="sangre" value=<?= $sangre ?>>
                <input type="hidden" name="alergia" value=<?= $alergia ?>>
                <input type="hidden" name="fechaRevision" value=<?= $fechaRevision ?>>
                <input type="hidden" name="motivoRevision" value=<?= $motivoRevision ?>>
                <input type="hidden" name="idDireccion" value=<?= $direccion[0]->id ?>>
                <input type="hidden" name="genero" value=<?= $genero ?>>
                <input type="hidden" name="username" value=<?= $username ?>>
                <input type="hidden" name="foto" value=<?= $foto ?>>
                <?php foreach ($habitosToxicos as $ht): ?>
                    <input type="hidden" name="habitosToxicos[]" value=<?= $ht ?>>
                <?php endforeach; ?>
                <?php foreach ($condicionesPrevias as $cp): ?>
                    <input type="hidden" name="condicionesPrevias[]" value=<?= $cp ?>>
                <?php endforeach; ?>


                <div class="mab-3">
                    <label for="estado" class="form-label">Estado:</label>
                    <input type="text" class="form-control" name="estado" id="estado"
                        value="<?= $direccion[0]->estado ?>">
                </div>

                <div class="mab-3">
                    <label for="municipio" class="form-label">Municipio:</label>
                    <input type="text" class="form-control" name="municipio" id="municipio"
                        value="<?= $direccion[0]->municipio ?>">
                </div>

                <div class="mab-3">
                    <label for="colonia" class="form-label">Colonia:</label>
                    <input type="text" class="form-control" name="colonia" id="colonia"
                        value="<?= $direccion[0]->colonia ?>">
                </div>

                <div class="mab-3">
                    <label for="calle" class="form-label">Calle:</label>
                    <input type="text" class="form-control" name="calle" id="calle" value="<?= $direccion[0]->calle ?>">
                </div>

                <div class="mab-3">
                    <label for="noExt" class="form-label">Número exterior:</label>
                    <input type="number" class="form-control" name="noExt" id="noExt" value="<?= $direccion[0]->noExt ?>">
                </div>

                <div class="mab-3">
                    <label for="noInt" class="form-label">Número interior:</label>
                    <input type="text" class="form-control" name="noInt" id="noInt" value="<?= $direccion[0]->noInt ?>">
                </div>

                <div class="mab-3">
                    <label for="CP" class="form-label">Código Postal:</label>
                    <input type="text" class="form-control" name="CP" id="CP" value="<?= $direccion[0]->CP ?>">
                </div>

                <div class="mb-3">
                    <label for="tipo">Tipo de vivienda:</label>
                    <select name="tipo" id="tipo" class="form-control">
                        <option value="<?= $direccion[0]->tipo ?>" selected><?= $direccion[0]->tipo ?></option>
                        <option value="Casa">Casa</option>
                        <option value="Departamento">Departamento</option>
                        <option value="Oficina">Oficina</option>
                    </select>
                </div>

                <div class="mb-3">
                    <input type="image" class="btn btn-warning mt-4" value="Guardar" src="">
                </div>
            </form>

            <div class="mb-3">
                <input type="image" class="btn btn-primary mt-4" value="Regresar" src=""
                    onclick="window.history.back()">
                <input type="image" class="btn btn-danger mt-4" value="Cancelar" src=""
                    onclick="window.location.href='/administrador/pacientes/administrarPacientes'">
            </div>

        </div>
    </div>
</div>