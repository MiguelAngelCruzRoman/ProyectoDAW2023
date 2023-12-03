<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div id="login-container" class="row justify-content-center">

                <?php if (isset($validation)): ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $validation->listErrors(); ?>
                    </div>
                <?php endif; ?>
                <?= csrf_field() ?>
                <h1 align="center" style="color: #fff">Agregar Consulta</h1>
                <h4 align="center" style="color: #fff">-Información de la Consulta-</h4>

                <form action="<?= base_url('index.php/administrador/consultas/agregarConsulta/insert'); ?>"
                    method="POST">

                    <input type="hidden" name="idMedicoPaciente" value='<?= $medicoPaciente->id ?>'>


                    <div class="col-12">
                        <label for="lugar" style="color: #fff">Lugar de la consulta:</label>
                        <input type="text" class="form-control" name="lugar"
                            placeholder="Ejemplo: Consultorio A, Hospital J" required pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+"
                            max_length="15" min_length="3" style="color: #000000"
                            value="<?= isset($_POST['lugar']) ? $_POST['lugar'] : '' ?>">
                    </div>

                    <div class="col-12">
                        <label for="hora" style="color: #fff">Hora de consulta:</label>
                        <input type="time" class="form-control" name="hora" required style="color: #000000"
                            value="<?= isset($_POST['hora']) ? $_POST['hora'] : '' ?>">
                    </div>

                    <div class="col-12">
                        <label for="fecha" style="color: #fff">Fecha de consulta:</label>
                        <input type="date" class="form-control" name="fecha" required style="color: #000000"
                            value="<?= isset($_POST['fecha']) ? $_POST['fecha'] : '' ?>">
                    </div>

                    <div class="col-12">
                        <label for="motivo" style="color: #fff">Motivo:</label>
                        <input type="text" class="form-control" name="motivo" placeholder="Ejemplo: Dolor de cabeza"
                            required pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+" max_length="250" style="color: #000000"
                            value="<?= isset($_POST['motivo']) ? $_POST['motivo'] : '' ?>">
                    </div>

                    <div class="mb-3">
                        <button type="submit" class="btn btn-success">
                            <img src="https://cdn-icons-png.flaticon.com/128/4885/4885419.png" alt="Agregar" width="25"
                                height="25">
                            Agregar
                        </button>
                    </div>

                </form>

                <!--Botones de navegación de vistas-->
                <div class="mab-3">
                    <button type="submit" class="btn btn-primary" onclick="window.history.back()">
                        <img src="https://cdn-icons-png.flaticon.com/128/3585/3585896.png" alt="Regresar" width="25"
                            height="25">
                        Regresar
                    </button>
                    <button type="submit" class="btn btn-danger"
                        onclick="window.location.href='/administrador/consultas/administrarConsultas'">
                        <img src="https://cdn-icons-png.flaticon.com/128/561/561189.png" alt="Cancelar" width="25"
                            height="25">
                        Cancelar
                    </button>
                </div>
            </div>
        </div>

    </div>
</div>