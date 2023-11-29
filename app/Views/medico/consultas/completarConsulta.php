<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div id="login-container" class="row justify-content-center">
                <h1 align="center" style="color: #fff">Completar Consulta</h1>
                <?php
                if (isset($validation)) {
                    print $validation->listErrors();
                }
                ?>

                <form action="<?= base_url('/medico/consultas/realizarConsulta/' . $consulta->id); ?>" method="POST">
                    <?= csrf_field() ?>

                    <input type="hidden" name="IDconsulta" value=<?= $consulta->id ?>>
                    <input type="hidden" name="medico_paciente" value=<?= $medico_paciente ?>>


                    <div class="mab-3">
                        <label for="lugar" class="form-label" style="color: #fff">Lugar:</label>
                        <input type="text" class="form-control" name="lugar" id="lugar"
                            placeholder="Ejemplo: Consultorio A" required pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+"
                            max_length="15" min_length="3" value="<?= $consulta->lugar ?>" style="color: #000000">
                    </div>

                    <div class="mb-3">
                        <label for="motivo" style="color: #fff">Motivo de consulta:</label>
                        <input type="text" class="form-control" name="motivo" id="motivo"
                            placeholder="Ejemplo: Dolor de cabeza" required pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+"
                            max_length="250" value="<?= $consulta->motivo ?>" style="color: #000000">
                    </div>

                    <div class="mb-3">
                        <label for="#" style="color: #fff">Medicamentos:</label>
                        <br>
                        <div class="mb-3" style="background-color: #fff">

                        <?php foreach ($medicamentos as $medicamento): ?>
                            <input type="checkbox" name="medicamentos[]" value="<?= $medicamento->id ?>">
                            <?= $medicamento->nombreComercial . ' (' . $medicamento->dosis . ' gm - ' . $medicamento->version . ' )' ?><br>
                        <?php endforeach; ?>
                        </div>
                        </div>


                    <div class="mb-3">
                        <button type="submit" class="btn btn-success">
                            <img src="https://cdn-icons-png.flaticon.com/128/4885/4885419.png" alt="Agregar" width="25"
                                height="25">
                            Agregar
                        </button>
                    </div>
                </form>

                <div class="mb-3">
                    <button type="submit" class="btn btn-primary" onclick="window.history.back()">
                        <img src="https://cdn-icons-png.flaticon.com/128/3585/3585896.png" alt="Regresar" width="25"
                            height="25">
                        Regresar
                    </button>
                </div>

            </div>
        </div>
    </div>
</div>