<div class="container">
    <div class="row">
        <div class="col-2"></div>
        <div class="col-8">
            <h1 align="center">Realizar Consulta</h1>
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
                    <label for="lugar" class="form-label">Lugar:</label>
                    <input type="text" class="form-control" name="lugar" id="lugar" placeholder="Ejemplo: Consultorio A"
                        required pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+" max_length="15" min_length="3"
                        value="<?= $consulta->lugar ?>">
                </div>

                <div class="mb-3">
                    <label for="motivo">Motivo de consulta:</label>
                    <input type="text" class="form-control" name="motivo" id="motivo"
                        placeholder="Ejemplo: Dolor de cabeza" required pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+"
                        max_length="250" value="<?= $consulta->motivo ?>">
                </div>

                <div class="mb-3">
                    <label for="#">Medicamentos:</label>
                    <br>
                    <?php foreach ($medicamentos as $medicamento): ?>
                        <input type="checkbox" name="medicamentos[]" value="<?= $medicamento->id ?>">
                        <?= $medicamento->nombreComercial . ' (' . $medicamento->dosis . ' gm - ' . $medicamento->version . ' )' ?><br>
                    <?php endforeach; ?>
                </div>


                <div class="col-2">
                    <input type="image" class="btn btn-success mt-4" value="Agregar" src="">
                </div>
            </form>

            <div class="col-2">
                <input type="image" class="btn btn-danger mt-4" value="Cancelar" src="" onclick="window.history.back()">
            </div>

        </div>
    </div>
</div>