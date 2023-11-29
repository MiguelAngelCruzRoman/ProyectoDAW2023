<?php
if (isset($validation)) {
    print $validation->listErrors();
}
?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div id="login-container" class="row justify-content-center">
                <form action="<?php base_url('/administrador'); ?>" method="POST">

                    <h1 style="color: #fff" align="center">INICIO DE SESIÓN</h1>
                    <center><img src="<?= base_url('logo.jpg') ?>" alt="Logo" width="200" height="200" align="center">
                    </center>

                    <?= csrf_field() ?>
                    <div class="form-group">
                        <label for="username" class="form-label" style="color: #fff">Usuario: </label>
                        <input type="text" class="form-control" id="username" name="username" style="color: #000000"
                            placeholder="Ejemplo: Juan" required pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s0-9]+{-_.}"
                            max_length="50" min_length="1">
                    </div>
                    <div class="form-group">
                        <label for="password" class="form-label" style="color: #fff">Contraseña: </label>
                        <input type="password" class="form-control" id="password" name="password" style="color: #000000"
                            placeholder="Ejemplo: password2" required max_length="150" min_length="1">
                    </div>

                    <div class="form-group">
                        <label for="tipo" style="color: #fff">Tipo de usuario:</label>
                        <select name="tipo" id="tipo" class="form-control" style="color: #000000" required>
                            <option value="medico">Médico</option>
                            <option value="paciente">Paciente</option>
                            <option value="admin">Administrador</option>
                        </select>
                    </div>


                    <button type="submit" class="btn btn-primary col-md-12 ">Iniciar Sesión</button>
                </form>
            </div>
        </div>
    </div>
</div>