<div class="container">
<div class="row justify-content-center">
        <?php
        if (isset($validation)) {
            print $validation->listErrors();
        }
        ?>
        <div class="col-md-8">
            <div id="login-container" class="row justify-content-center">
            <?= csrf_field() ?>

            <h1 align="center" style="color: #fff">Agendar Consulta</h1>
            <h4 align="center" style="color: #fff">-Información de la Consulta-</h4>

            <form action="<?= base_url('index.php/paciente/consultas/agregarConsulta/insert'); ?>" method="POST">

                <input type="hidden" name="idMedicoPaciente" value='<?= $medicoPaciente->id ?>'>


                <div class="col-12">
                    <label for="lugar" style="color: #fff">Lugar de la consulta:</label>
                    <input type="text" class="form-control" name="lugar"
                        placeholder="Ejemplo: Consultorio A, Hospital J" required pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+"
                        max_length="15" min_length="3" style="color: #000000">
                </div>

                <div class="col-12">
                    <label for="hora" style="color: #fff">Hora de consulta:</label>
                    <input type="time" class="form-control" name="hora" required style="color: #000000">
                </div>

                <div class="col-12">
                    <label for="fecha" style="color: #fff">Fecha de consulta:</label>
                    <input type="date" class="form-control" name="fecha" required style="color: #000000">
                </div>

                <div class="col-12">
                    <label for="motivo" style="color: #fff">Motivo:</label>
                    <input type="text" class="form-control" name="motivo" placeholder="Ejemplo: Dolor de cabeza"
                        required pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+" max_length="250" style="color: #000000">
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