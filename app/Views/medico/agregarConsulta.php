<div class="container">
    <div class="row">
        <div class="col-2"></div>
        <div class="col-8">
            <h1 align="center">Agregar Consulta</h1>


        <form action="<?= base_url('/medico/administrarConsultas');?>" method="GET" >
            <?= csrf_field()?>
                <input type="hidden" name="" value="">


                <div class="mab-3">
                    <label for="lugar" class="form-label">Lugar:</label>
                    <input type="text" class="form-control" name="lugar" id="lugar">
                </div>

                <div class="mab-3">
                    <label for="hora" class="form-label">Hora:</label>
                    <input type="time" class="form-control" name="hora" id="hora">
                </div>

                <div class="mab-3">
                    <label for="fecha" class="form-label">Fecha:</label>
                    <input type="date" class="form-control" name="fecha" id="fecha">
                </div>

                <div class="mb-3">
                    <label for="motivo">Motivo de consulta:</label>
                    <select name="motivo" id="motivo" class="form-control">
                        <option value="" selected></option>
                        <option value="enfermedad" >Enfermedad</option>
                        <option value="seguimiento" >Seguimiento</option>
                        <option value="preventivo" >Preventivo</option>
                        <option value="rutinario" >Rutinario</option>
                    </select>
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