<div class="container">
    <div class="row">
        <div class="col-2"></div>
        <div class="col-8">
            <form action="<?= base_url('/administrador/medicos/agregarMedicos/insert'); ?>" method="POST">
                <?= csrf_field() ?>
                <h1 align="center">Agregar Médico</h1>
                <h4 align="center">Lugar de trabajo</h4>

                <input type="hidden" name="primerNombre" value=<?= $primerNombre ?>>
                <input type="hidden" name="segundoNombre" value=<?= $segundoNombre ?>>
                <input type="hidden" name="apellidoPaterno" value=<?= $apellidoPaterno ?>>
                <input type="hidden" name="apellidoMaterno" value=<?= $apellidoMaterno ?>>
                <input type="hidden" name="genero" value=<?= $genero ?>>
                <input type="hidden" name="telefono" value=<?= $telefono ?>>
                <input type="hidden" name="correo" value=<?= $correo ?>>
                <input type="hidden" name="username" value=<?= $username ?>>
                <input type="hidden" name="password" value=<?= $password ?>>
                <input type="hidden" name="foto" value=<?= $foto ?>>
                <input type="hidden" name="especialidad" value=<?= $especialidad ?>>
                <input type="hidden" name="diasLaborales" value=<?= $diasLaborales ?>>
                <input type="hidden" name="turno" value=<?= $turno ?>>

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

                <div class="mb-3">
                    <input type="image" class="btn btn-success mt-4" value="Agregar" src="">
                </div>
            </form>

            <div class="mb-3">
                <input type="image" class="btn btn-primary mt-4" value="Regresar" src=""
                    onclick="window.history.back()">
                <input type="image" class="btn btn-danger mt-4" value="Cancelar" src=""
                    onclick="window.location.href='/administrador/medicos/administrarMedicos/'">
            </div>

        </div>
    </div>
</div>