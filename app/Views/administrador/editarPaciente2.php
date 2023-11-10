<div class="container">
    <div class="row">
        <div class="col-2"></div>
        <div class="col-8">
            <form action="<?= base_url('/administrador/editarPaciente3/'.$id);?>" method="POST">
            <?= csrf_field()?>
                <h1 align="center">Editar Paciente</h1>
                <h4 align="center">Historial Médico</h4>
                
                <input type="hidden" name="id" value=<?=$id?>>
                <input type="hidden" name="primerNombre" value=<?=$primerNombre?>>
                <input type="hidden" name="segundoNombre" value=<?=$segundoNombre?>>
                <input type="hidden" name="apellidoPaterno" value=<?=$apellidoPaterno?>>
                <input type="hidden" name="apellidoMaterno" value=<?=$apellidoMaterno?>>
                <input type="hidden" name="telefono" value=<?=$telefono?>>
                <input type="hidden" name="CURP" value=<?=$CURP?>>
                <input type="hidden" name="seguro" value=<?=$seguro?>>
                <input type="hidden" name="correo" value=<?=$correo?>>
                <input type="hidden" name="contraseña" value=<?=$contraseña?>>
                
                <div class="mb-3">
                    <label for="sangre">Tipo de sangre:</label>
                    <select name="sangre" id="sangre" class="form-control">
                        <option value="<?=$paciente->tipoSangre?>" selected><?=$paciente->tipoSangre?></option>
                        <option value="O+">O+</option>
                        <option value="O-" >O-</option>
                        <option value="A+" >A+</option>
                        <option value="A-" >A-</option>
                        <option value="AB+">AB+</option>
                        <option value="AB-">AB-</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="alergia">Alergia:</label>
                    <select name="alergia" id="alergia" class="form-control">
                        <option value="<?=$paciente->alergia?>" selected><?=$paciente->alergia?></option>
                        <option value="ninguna" selected>Ninguna</option>
                        <option value="poliester" >poliester</option>
                        <option value="alcohol" >alcohol</option>
                        <option value="algodon" >algodón</option>
                        <option value="latex" >latex</option>
                    </select>
                </div>

                <div class="mab-3">
                    <label for="fechaRevision" class="form-label">Fecha de última revisión:</label>
                    <input type="date" class="form-control" name="fechaRevision" id="fechaRevision" value="<?=$paciente->fechaRevision?>">
                </div>

                <div class="mb-3">
                    <label for="motivoRevision">Motivo de última consulta:</label>
                    <select name="motivoRevision" id="motivoRevision" class="form-control">
                        <option value="<?=$paciente->motivoRevision?>" selected><?=$paciente->motivoRevision?></option>
                        <option value="preventivo" >Preventivo</option>
                        <option value="enfermedad" >Enfermedad</option>
                        <option value="rutinario" >Rutinario</option>
                        <option value="seguimiento" >Seguimiento</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="habitosToxicos">Habítos tóxicos:</label>
                    <input type="checkbox" name="fumar">Fumar
                    <input type="checkbox" name="malaAlimentación">Mala alimentación
                    <input type="checkbox" name="beber">Beber
                    <input type="checkbox" name="faltaEjercicio">Falta de ejercicio
                    <input type="checkbox" name="drogas">Drogas
                    <input type="checkbox" name="dormirPoco">Dormir poco
                    <input type="checkbox" name="grasas">Grasas
                </div>

                <div class="mb-3">
                    <label for="condicionesPrevias">Condiciones previas:</label>
                    <input type="checkbox" name="diabetes">Diabetes
                    <input type="checkbox" name="embarazo">Embarazo
                    <input type="checkbox" name="cancer">Cancer
                    <input type="checkbox" name="hipertension">Hipertensión
                    <input type="checkbox" name="sobrepeso">Sobrepeso/Obesidad
                    <input type="checkbox" name="COVID">COVID
                    <input type="checkbox" name="bulimia">Bulimia/Anorexia
                    <input type="checkbox" name="fiebre">Fiebre del mono
                </div>

                <div class="mb-3">
                    <input type="image" class="btn btn-success mt-4" value="Siguiente" src="">
                </div>
            </form>
            
            <div class="mb-3">
                <input type="image" class="btn btn-primary mt-4" value="Regresar" src="" onclick="window.history.back()">
                <input type="image" class="btn btn-danger mt-4" value="Cancelar" src="" onclick="window.location.href='/administrador/administrarPacientes'">
            </div>

        </div>
    </div>
</div>