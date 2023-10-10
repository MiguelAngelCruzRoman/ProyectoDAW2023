<div class="container">
    <div class="row">
        <div class="col-2"></div>
        <div class="col-8">
            <form action="<?= base_url('/administrador/editarMedico2');?>" method="GET">
            <?= csrf_field()?>
                <h1 align="center">Editar Medicamento</h1>
                <h4 align="center">Información Personal</h4>
                <div class="mab-3" align="center">
                        <img src="" alt="medico" class="service-img">
                </div>	
                
                <div class="mab-3">
                    <label for="primerNombre" class="form-label">Primer nombre:</label>
                    <input type="text" class="form-control" name="primerNombre" id="primerNombre" value="Pablo">
                </div>

                <div class="mab-3">
                    <label for="segundoNombre" class="form-label">Segundo nombre:</label>
                    <input type="text" class="form-control" name="segundoNombre" id="segundoNombre" value="N/A">
                </div>

                <div class="mab-3">
                    <label for="apellidoPaterno" class="form-label">Apellido paterno:</label>
                    <input type="text" class="form-control" name="apellidoPaterno" id="apellidoPaterno" value="Milanés">
                </div>

                <div class="mab-3">
                    <label for="apellidoMaterno" class="form-label">Apellido materno:</label>
                    <input type="text" class="form-control" name="apellidoMaterno" id="apellidoMaterno" value="Gutierrez">
                </div>

                <div class="mb-3">
                    <label for="especialidad">Especialidad:</label>
                    <select name="especialidad" id="especialidad" class="form-control">
                        <option value="general" selected>Médico general</option>
                        <option value="cardiologia" >Cardiología</option>
                        <option value="dermatologia" >Dermatología</option>
                        <option value="ginecologia" >Ginecología</option>
                        <option value="rehabilitacion" >Rehabilitación</option>
                        <option value="oftalmologia" >Oftalmología</option>
                        <option value="ortopedia" >Ortopedia</option>
                        <option value="pediatria" >Pediatría</option>
                        <option value="radiologia" >Radiología</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="dias">Días de trabajo:</label>
                    <select name="dias" id="dias" class="form-control">
                        <option value="LMiV" selected>Lunes, Miércoles y Viernes</option>
                        <option value="MJ" >Martes y Jueves</option>
                        <option value="SD" >Sábado y Domingo</option>
                    </select>
                </div>
                
                <div class="mb-3">
                    <label for="turno">Horario de atención:</label>
                    <select name="turno" id="turno" class="form-control">
                        <option value="matutino" selected>Turno matutino (8:00-16:00)</option>
                        <option value="vespertino">Turno vespertino (16:00-24:00)</option>
                        <option value="nocturno" >Turno nocturno (00:00-8:00)</option>
                    </select>
                </div>

                <div class="mab-3">
                    <label for="correo" class="form-label">Correo electrónico:</label>
                    <input type="text" class="form-control" name="correo" id="correo" value="pablo.medge@hospital.com">
                </div>

                <div class="mab-3">
                    <label for="password" class="form-label">Contraseña:</label>
                    <input type="text" class="form-control" name="password" id="password" value="Doc123">
                </div>

                <input type="hidden" name="" value="">

                
                <div class="mb-3">
                    <input type="image" class="btn btn-success mt-4" value="Siguiente" src="">
                </div>
            </form>

            <div class="mb-3">
                <input type="image" class="btn btn-danger mt-4" value="Cancelar" src="" onclick="window.location.href='/administrador/administrarMedicos/'">
            </div>

        </div>
    </div>
</div>