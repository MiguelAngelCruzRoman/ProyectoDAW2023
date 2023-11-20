<?php
    if(isset($validation)){
        print $validation->listErrors();
    }
?>

<div class="container">
    <div class="row">
        <div class="col"></div>
        <div class="col">
            <form action="<?php base_url('/administrador'); ?>" method="POST">
            <?= csrf_field() ?>
            <div class="mb-3">
                <label for="username" class="form-label">Usuario: </label>
                <input type="text" class="form-control" id="username" name="username" placeholder="Ejemplo: Juan" required pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s0-9]+{-_.}" max_length="50" min_length="1">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Contraseña: </label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Ejemplo: password2" required max_length="150" min_length="1">
            </div>

            <div class="mb-3">
                <label for="tipo">Tipo de usuario:</label>
                <select name="tipo" id="tipo" class="form-control" required>
                    <option value="medico">Médico</option>
                    <option value="paciente">Paciente</option>
                    <option value="admin" selected>Administrador</option>
                </select>
            </div>
            
            <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
        <div class="col"></div>
    </div>
</div>