<div class="container">
    <div class="row">
        <div class="col-2"></div>
        <div class="col-8">
            <h1 align="center">Editar Consulta</h1>


        <form action="<?= base_url('/medico/administrarConsultas');?>" method="GET" >
            <?= csrf_field()?>
                <input type="hidden" name="" value="">


                <div class="mab-3">
                    <label for="lugar" class="form-label">Lugar:</label>
                    <input type="text" class="form-control" name="lugar" id="lugar">
                </div>

                <div class="mab-3">
                    <label for="fecha" class="form-label">Fecha:</label>
                    <input type="date" class="form-control" name="fecha" id="fecha">
                </div>

                <div class="mab-3">
                    <label for="hora" class="form-label">Hora:</label>
                    <input type="time" class="form-control" name="hora" id="hora">
                </div>

                <div class="mb-3">
                    <label for="motivo">Motivo de consulta:</label>
                    <select name="motivo" id="motivo" class="form-control">
                        <option value="enfermedad" selected >Enfermedad</option>
                        <option value="seguimiento" >Seguimiento</option>
                        <option value="preventivo" >Preventivo</option>
                        <option value="rutinario" >Rutinario</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="status">Status:</label>
                    <select name="status" id="status" class="form-control">
                        <option value="pediente" selected>Pediente</option>
                        <option value="realizada" >Realizada</option>
                        <option value="cancelada" >Cancelada</option>
                    </select>
                </div>

                <div class="mab-3">
                    <label for="comentario" class="form-label">Comentarios:</label>
                    <input type="text" class="form-control" name="comentario" id="comentario">
                </div>

            <form action="<?= base_url('/medico/agregarMedicamentoConsulta');?>" method="GET" >
                <div class="col-2">
                    <h3>Receta</h3>
                    <div class="mab-3">
                        <label for="nombre" class="form-label">Nombre del medicamento:</label>
                        <input type="text" class="form-control" name="nombre" id="nombre">
                    </div>
                    <div class="mab-3">
                        <label for="dosis" class="form-label">Dosis:</label>
                        <input type="text" class="form-control" name="dosis" id="dosis">
                    </div>
                    <div class="col-2">
                        <input type="image" class="btn btn-success mt-4" value="Agregar Medicamento" src="">
                    </div>

                    <table class="table">
            
                        <thead>
                            <th>Nombre comercial</th>
                            <th>Forma farmacéutica</th>
                            <th>Nombre científico</th>
                            <th>Dosis</th>
                        </thead>

                        <tbody>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>

                                <td>
                                    <a href="<?= base_url('/administrador/eliminarMedicamentoConsulta/'); ?>">
                                    <img src="" alt="eliminar" class="service-img">
                                    <h2 class="text-center">Eliminar</h2>
                                    </a>            
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </form>
            
            <div class="col-2">
                <input type="image" class="btn btn-warning mt-4" value="Guardar" src="">
            </div>
        </form>

        <form action="<?= base_url('/medico/agregarEstudiosConsulta');?>" method="GET" >
                <div class="col-2">
                    <h3>Estudios Médicos</h3>
                    <div class="mb-3">
                        <label for="tipo">Tipo de estudio::</label>
                        <select name="tipo" id="tipo" class="form-control">
                            <option value="radiografía">Radiografía</option>
                            <option value="sangre" >Sangre</option>
                            <option value="presion" >Presión</option>
                        </select>
                    </div>
                    <div class="mab-3">
                        <label for="fecha" class="form-label">Fecha de programación:</label>
                        <input type="date" class="form-control" name="fecha" id="fecha">
                    </div>
                    <div class="col-2">
                        <input type="image" class="btn btn-success mt-4" value="Agregar Estudio Médico" src="">
                    </div>

                    <table class="table">
            
                        <thead>
                            <th>Tipo de estudio médico</th>
                            <th>fecha programada</th>
                        </thead>

                        <tbody>
                            <tr>
                                <td></td>
                                <td></td>

                                <td>
                                    <a href="<?= base_url('/administrador/eliminarEstudioConsulta/'); ?>">
                                    <img src="" alt="eliminar" class="service-img">
                                    <h2 class="text-center">Eliminar</h2>
                                    </a>            
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </form>
            
            <div class="col-2">
                <input type="image" class="btn btn-warning mt-4" value="Guardar" src="">
            </div>
        </form>


            <div class="col-2">
                <input type="image" class="btn btn-danger mt-4" value="Cancelar" src="" onclick="window.history.back()">
            </div>

        </div>
    </div>
</div>