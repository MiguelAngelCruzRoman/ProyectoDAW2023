<div class="container">
    <div class="row">
        <div class="col-2"></div>
        <div class="col-8">
            <form action="<?= base_url('/administrador/editarPaciente3');?>" method="GET">
            <?= csrf_field()?>
                <h1 align="center">Editar Paciente</h1>
                <h4 align="center">Historial Médico</h4>
                
                <input type="hidden" name="" value="">

                <div class="mb-3">
                    <label for="sangre">Tipo de sangre:</label>
                    <select name="sangre" id="sangre" class="form-control">
                        <option value="O+" selected>O+</option>
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
                        <option value="ninguna" selected>Ninguna</option>
                        <option value="poliester" >poliester</option>
                        <option value="alcohol" >alcohol</option>
                        <option value="algodon" >algodón</option>
                        <option value="latex" >latex</option>
                    </select>
                </div>

                <div class="mab-3">
                    <label for="fechaChequeo" class="form-label">Fecha de última revisión:</label>
                    <input type="date" class="form-control" name="fechaChequeo" id="fechaChequeo" value="2023/09/23">
                </div>

                <div class="mb-3">
                    <label for="motivoConsulta">Motivo de última consulta:</label>
                    <select name="alergia" id="alergia" class="form-control">
                        <option value="preventivo" selected>preventivo</option>
                        <option value="enfermedad" >enfermedad</option>
                        <option value="rutinario" >rutinario</option>
                        <option value="seguimiento" >seguimiento</option>
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
                    <label for="habitosToxicos">Condiciones previas:</label>
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