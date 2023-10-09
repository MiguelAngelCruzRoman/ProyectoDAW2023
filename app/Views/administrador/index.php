<div class="container">
    <div class="row">

        <div class="col-2"></div>

        <div class="col-8">
        <form action="<?= base_url('index.php/administrador/opciones');?>" method="GET" >
                <h2>INICIAR SESIÓN</h2>

                <div class="mab-3">
                    <label for="correo" class="form-label">Correo electrónico</label>
                    <input type="text" class="form-control" name="correo" id="correo">
                </div>

                <div class="mb-3">
                    <lable for="contraseña" class="form-label">Contraseña</lable>
                    <input type="password" class="form-control" name="contraseña" id="contraseña">
                </div>


                <div class="mb-3">
                    <input type="submit" class="btn btn-primary">
                </div>
            </form>
            <div class="col-2"></div>

        </div>
    </div>
</div>