<div class="container">
    <div class="row">
        <div class="col-2"></div>
        <div class="col-8">
            <h1 align="center">Realizar Consulta</h1>


        <form action="<?= base_url('/medico/consultas/realizarConsulta/'.$consulta[0]->id);?>" method="POST" >
            <?= csrf_field()?>

            <input type="hidden" name="IDconsulta" value=<?= $consulta[0]->id ?>>
            <input type="hidden" name="medico_paciente" value=<?= $medico_paciente ?>>


                <div class="mab-3">
                    <label for="lugar" class="form-label">Lugar:</label>
                    <input type="text" class="form-control" name="lugar" id="lugar" placeholder="Ejemplo: Consultorio A" required pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+" max_length="15" min_length="3">
                </div>

                <div class="mb-3">
                    <label for="motivo">Motivo de consulta:</label>
                    <input type="text" class="form-control" name="motivo" id="motivo" placeholder="Ejemplo: Dolor de cabeza" required pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+" max_length="250">
                </div>

                <div class="mb-3">
                    <label for="#">Medicamentos:</label>
                    <br>
                    <?php foreach($medicamentos as $medicamento): ?>
                        <input type="checkbox" name="medicamentos[]" value="<?= $medicamento->id?>"> 
                        <?= $medicamento->nombreComercial.' ('.$medicamento->dosis.' gm - '.$medicamento->version.' )'?><br>
                    <?php endforeach;?>
                </div>


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
            </div>
        </div>
    </div>
</div>