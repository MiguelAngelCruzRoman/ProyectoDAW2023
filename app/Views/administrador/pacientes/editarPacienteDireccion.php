<div class="container">
    <div class="row justify-content-center">
        <?php
        if (isset($validation)) {
            print $validation->listErrors();
        }
        ?>
        <div class="col-md-8">
            <div id="login-container" class="row justify-content-center">
                <form action="<?= base_url('/administrador/pacientes/editarPaciente/update'); ?>" method="post">
                    <?= csrf_field() ?>
                    <h1 align="center" style="color: #fff">Editar Paciente</h1>
                    <h4 align="center" style="color: #fff">-Domicilio-</h4>

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
                    <input type="hidden" name="PacienteID" value="<?= $paciente->id ?>">
                    <input type="hidden" name="direccionID" value=<?= $direccion[0]->id ?>>

                    <?php foreach ($habitosToxicos as $ht): ?>
                        <input type="hidden" name="habitosToxicos[]" value=<?= $ht ?>>
                    <?php endforeach; ?>
                    <?php foreach ($condicionesPrevias as $cp): ?>
                        <input type="hidden" name="condicionesPrevias[]" value=<?= $cp ?>>
                    <?php endforeach; ?>


                    <div class="mab-3">
                        <label for="estado" class="form-label" style="color: #fff">Estado:</label>
                        <input type="text" class="form-control" name="estado" id="estado" placeholder="Ejemplo: Puebla"
                            required pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+" max_length="50" min_length="2"
                            value="<?= $direccion[0]->estado ?>" style="color: #000000">
                    </div>

                    <div class="mab-3">
                        <label for="municipio" class="form-label" style="color: #fff">Municipio:</label>
                        <input type="text" class="form-control" name="municipio" id="municipio"
                            placeholder="Ejemplo: Cholula" required pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+" max_length="50"
                            min_length="2" value="<?= $direccion[0]->municipio ?>" style="color: #000000">
                    </div>

                    <div class="mab-3">
                        <label for="colonia" class="form-label" style="color: #fff">Colonia:</label>
                        <input type="text" class="form-control" name="colonia" id="colonia" placeholder="Ejemplo: Rosas"
                            required pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+" max_length="50" min_length="2"
                            value="<?= $direccion[0]->colonia ?>" style="color: #000000">
                    </div>

                    <div class="mab-3">
                        <label for="calle" class="form-label" style="color: #fff">Calle:</label>
                        <input type="text" class="form-control" name="calle" id="calle"
                            value="<?= $direccion[0]->calle ?>" placeholder="Ejemplo: Revolución" required
                            pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+" max_length="50" min_length="2" style="color: #000000">
                    </div>

                    <div class="mab-3">
                        <label for="noExt" class="form-label" style="color: #fff">Número exterior:</label>
                        <input type="number" class="form-control" name="noExt" id="noExt"
                            value="<?= $direccion[0]->noExt ?>" placeholder="Ejemplo: 10" required pattern="[0-9]"
                            max_length="1" min_length="1" style="color: #000000">
                    </div>

                    <div class="mab-3">
                        <label for="noInt" class="form-label" style="color: #fff">Número interior:</label>
                        <input type="number" class="form-control" name="noInt" id="noInt"
                            value="<?= $direccion[0]->noInt ?>" placeholder="Ejemplo: 10" pattern="[0-9]" max_length="1"
                            min_length="1" style="color: #000000">
                    </div>

                    <div class="mab-3">
                        <label for="CP" class="form-label" style="color: #fff">Código Postal:</label>
                        <input type="number" class="form-control" name="CP" id="CP" value="<?= $direccion[0]->CP ?>"
                            placeholder="Ejemplo: 73950" required pattern="[0-9]" max_length="5" min_length="1"
                            style="color: #000000">
                    </div>

                    <div class="mb-3">
                        <label for="tipo" style="color: #fff">Tipo de vivienda:</label>
                        <select name="tipo" id="tipo" class="form-control" required style="color: #000000">
                            <option value="<?= $direccion[0]->tipo ?>" selected>
                                <?= $direccion[0]->tipo ?>
                            </option>
                            <option value="Casa">Casa</option>
                            <option value="Departamento">Departamento</option>
                            <option value="Oficina">Oficina</option>
                        </select>
                    </div>

                    <br>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-warning">
                            <img src="https://cdn-icons-png.flaticon.com/128/376/376218.png" alt="Guardar" width="25"
                                height="25">
                            Guardar
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