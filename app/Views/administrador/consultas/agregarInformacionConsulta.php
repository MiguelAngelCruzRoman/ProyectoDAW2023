<div class="container">
    <div class="row">
    <?php
    if(isset($validation)){
        print $validation->listErrors();
    }
?>
        <div class="col-2"></div>

        <div class="col-8">
                <?= csrf_field() ?>

                <h1 align="center">Agregar Consulta</h1>
                <h4 align="center">-Información de la Consulta-</h4>

                <form action="<?= base_url('index.php/administrador/consultas/agregarConsulta/insert'); ?>" method="POST">
                
                <input type="hidden" name="idMedicoPaciente" value='<?= $medicoPaciente->id?>'>


                <div class="col-12">
                    <label for="lugar">Lugar de la consulta:</label>
                    <input type="text" class="form-control" name="lugar" placeholder="Ejemplo: Consultorio A, Hospital J" required pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+" max_length="15" min_length="3">
                </div>

                <div class="col-12">
                    <label for="hora">Hora de consulta:</label>
                    <input type="time" class="form-control" name="hora" required>
                </div>

                <div class="col-12">
                    <label for="fecha">Fecha de consulta:</label>
                    <input type="date" class="form-control" name="fecha" required>
                </div>

                <div class="col-12">
                    <label for="motivo">Motivo:</label>
                    <input type="text" class="form-control" name="motivo" placeholder="Ejemplo: Dolor de cabeza" required pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+" max_length="250">
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