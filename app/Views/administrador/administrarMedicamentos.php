<div class="container">
    <div class="row">
        <h1 align="center">ADMINISTRAR MEDICAMENTOS</h1>
        <div class="col-6">
        <form action="<?= base_url('index.php/administrador/buscarMedicamentos');?>" method="GET">
            <div class="col-5">
                <label for="columnaBusquedaMedicamento">Buscar medicamento por:</label>
                <select name="columnaBusquedaMedicamento" class="form-control">
                    <option value="todo">todos los campos</option>
                    <option value="nombreComercial">nombre comercial</option>
                    <option value="nombreCientifico">nombre científico</option>
                    <option value="forma">forma farmaceutica</option>
                </select>
            </div>
           <div class="col-5">
                <label for="valIngresado">Parecido a:</label>
                <input type="text" class="form-control" name="valIngresado" >
            </div>

            <input type="image" class="btn btn-success mt-4" value="Realizar Consulta" src="">
        </form>
        </div>

        <div class="col-4">
            <input type="image" class="btn btn-success mt-4" value="Agregar Medicamentos" src="" onclick="window.location='/administrador/agregarMedicamentos'">
            <input type="image" class="btn btn-secondary mt-4" value="Página Principal" src="" onclick="window.location='/administrador/opciones'">
        </div>
    </div>
    <br>

    <div class="row">
        <div class="col-12">
            <table class="table">
            
                <thead>
                    <th>ID</th>
                    <th>Nombre comercial</th>
                    <th>Nombre científico</th>
                    <th>Forma farmacéutica</th>
                    <th>Dosis</th>
                    <th>Símbolos</th>
                    <th>Caducidad</th>
                    <th>Stock</th>
                </thead>

                <tbody>
                    <?php foreach ($medicamentos as $medicamento):?>
                        <tr>
                            <td><?=$medicamento->id?></td>
                            <td><?=$medicamento->nombreComercial?></td>
                            <td><?=$medicamento->nombreCinetifico?></td>
                            <td><?=$medicamento->formaFarmaceutica?></td>
                            <td><?=$medicamento->dosis?> mg (<?=$medicamento->version?>)</td>
                            <td><?=$medicamento->simbolo?></td>
                            <td><?=$medicamento->fechaCaducidad?></td>
                            <td><?=$medicamento->stock?></td>
                            <td>
                                <a href="<?= base_url('/administrador/editarMedicamento/'.$medicamento->id); ?>">
                                <img src="https://cdn-icons-png.flaticon.com/128/705/705120.png" alt="editar" class="service-img" width="60" height="60">
                                </a>
                            </td>
                            <td>
                                <a href="<?= base_url('/administrador/eliminarMedicamento/'.$medicamento->id); ?>">
                                <img src="https://cdn-icons-png.flaticon.com/128/3541/3541990.png" alt="eliminar" class="service-img" width="60" height="60">
                                </a>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>

            </table>
        </div>
    </div>
    <br>
</div>

