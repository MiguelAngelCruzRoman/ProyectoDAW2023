<div class="container">
    <div class="row">
        <h1 align="center">ADMINISTRAR PACIENTES</h1>
        <div class="mab-3" align="center">
            <img src="" alt="paciente" class="service-img">
            <label for="nombreCompletoEdad" class="form-label">Miguel Angel Cruz Roman (20)</label>
        </div>	
    </div>
    <br>

    <div class="row">
        <div class="col-12">
            <div class="mab-3">
                <label for="primerNombre" class="form-label">Tipo de sangre:</label>
                <input type="text" class="form-control" name="primerNombre" id="primerNombre" value="O+">
            </div>

            <div class="mab-3">
                <label for="alergias" class="form-label">Alergias:</label>
                <input type="text" class="form-control" name="alergias" id="alergias" value="Ninguna">
            </div>

            <div class="mab-3">
                <label for="fechaRevision" class="form-label">Fecha de última revisión:</label>
                <input type="date" class="form-control" name="fechaRevision" id="fechaRevision" value="2023/10/08">
            </div>

            <div class="mab-3">
                <label for="motivoRevisión" class="form-label">Motivo de última revisión:</label>
                <input type="text" class="form-control" name="motivoRevisión" id="motivoRevisión" value="Rutinario">
            </div>

            <div class="mab-3">
                <label for="habitos" class="form-label">Habitos tóxicos:</label>
                <input type="text" class="form-control" name="habitos" id="habitos" value="Ninguno">
            </div>

            <div class="mab-3">
                <label for="condiciones" class="form-label">Condiciones previas:</label>
                <input type="text" class="form-control" name="condiciones" id="condiciones" value="Ninguna">
            </div>
        </div>
    </div>
    <br>

    <div class="col-md-4">
        <input type="image" class="btn btn-primary mt-4" value="Administrar Consultas" src="" onclick="window.location.href='/medico/administrarConsultas'">
        <input type="image" class="btn btn-primary mt-4" value="Administrar Recetas" src="" onclick="window.location.href='/medico/administrarRecetas'">
        <input type="image" class="btn btn-primary mt-4" value="Administrar Estudios Médicos" src="" onclick="window.location.href='/medico/administrarEstudiosMedicos'">
        <input type="image" class="btn btn-primary mt-4" value="Página principal" src="" onclick="window.location.href='/medico/opciones'">
	</div>
</div>

