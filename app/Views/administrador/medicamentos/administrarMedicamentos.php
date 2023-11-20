<div class="container">
    <div class="row">
        <h1 align="center">ADMINISTRAR MEDICAMENTOS</h1>
        <div class="col-6">
            <form action="<?= base_url('index.php/administrador/medicamentos/buscarMedicamentos'); ?>" method="GET">
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
                    <input type="text" class="form-control" name="valIngresado">
                </div>

                <div class="col-5">
                    <form action="buscar">
                        <button type="submit" class="btn btn-secondary">
                            <img src="https://cdn-icons-png.flaticon.com/128/795/795724.png" alt="Icono" width="25" height="25">
                            Realizar Búsqueda
                        </button>
                    </form>
                </div>
            </form>
        </div>

        <div class="col-2"></div>

        <div class="col-4">
            <button type="button" class="btn btn-success mt-4"
                onclick="window.location='/administrador/medicamentos/agregarMedicamentos'">
                <img src="https://cdn-icons-png.flaticon.com/128/4885/4885419.png" alt="Icono" width="25" height="25">
                Agregar Medicamentos
            </button>
            <button type="button" class="btn btn-secondary mt-4" onclick="window.location='/administrador'">
                <img src="https://cdn-icons-png.flaticon.com/128/10349/10349274.png" alt="Icono" width="25" height="25">
                Página Principal
            </button>
        </div>
    </div>
    <br>


    

    <div class="row">
        <div class="col-12">

            <?php $registrosPorPagina = 10;
            $totalRegistros = count($medicamentos);
            $totalPaginas = ceil($totalRegistros / $registrosPorPagina);
            $paginaActual = isset($_GET['pagina']) ? $_GET['pagina'] : 1;
            $indiceInicio = ($paginaActual - 1) * $registrosPorPagina;
            $medicamentosPagina = array_slice($medicamentos, $indiceInicio, $registrosPorPagina); ?>

            <table class="table">

            <thead class="thead-dark">
                    <th style="text-align: center">ID</th>
                    <th style="text-align: center">Nombre comercial</th>
                    <th style="text-align: center">Nombre científico</th>
                    <th style="text-align: center">Forma farmacéutica</th>
                    <th style="text-align: center">Dosis</th>
                    <th style="text-align: center">Símbolos</th>
                    <th style="text-align: center">Caducidad</th>
                    <th style="text-align: center">Stock</th>
                    <th style="text-align: center" colspan="3">Opciones</th>

                </thead>

                <tbody>
                <?php foreach ($medicamentosPagina as $medicamento): ?>
                        <tr>
                            <td><?= $medicamento->id ?></td>
                            <td><?= $medicamento->nombreComercial ?></td>
                            <td><?= $medicamento->nombreCinetifico ?></td>
                            <td><?= $medicamento->formaFarmaceutica ?></td>
                            <td><?= $medicamento->dosis ?> mg (<?= $medicamento->version ?>)</td>
                            <td><?= $medicamento->simbolo ?></td>
                            <td><?= $medicamento->fechaCaducidad ?></td>
                            <td style="text-align: center"><?= $medicamento->stock ?></td>
                            <td>
                                <a href="<?= base_url('/administrador/medicamentos/editarMedicamento/' . $medicamento->id); ?>"
                                    style="color:rgba(0,0,0,0.6)">
                                    <img src="https://cdn-icons-png.flaticon.com/128/705/705120.png" alt="editar"
                                        class="service-img" width="60" height="60">
                                    <figcaption>Editar</figcaption>
                                </a>
                            </td>
                            <td>
                                <a href="<?= base_url('/administrador/medicamentos/eliminarMedicamento/' . $medicamento->id); ?>"
                                    style="color:rgba(0,0,0,0.6)">
                                    <img src="https://cdn-icons-png.flaticon.com/128/3541/3541990.png" alt="eliminar"
                                        class="service-img" width="60" height="60">
                                    <figcaption>Eliminar</figcaption>
                                </a>
                            </td>
                            <td>
                                <a href="<?= base_url('/administrador/medicamentos/sabermasMedicamento/' . $medicamento->id); ?>"
                                    style="color:rgba(0,0,0,0.6)">
                                    <img src="https://cdn-icons-png.flaticon.com/128/5828/5828566.png" alt="saberMas"
                                        class="service-img" width="60" height="60">
                                    <figcaption>Saber más</figcaption>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach ?>

                </tbody>

            </table>

            <div class="col-5 mx-auto text-center">
                <ul class="pagination">
                    <li class="page-item <?php echo ($paginaActual <= 1) ? 'disabled' : ''; ?>">
                        <a class="page-link text-black" href="?pagina=<?php echo $paginaActual - 1; ?>">Anterior</a>
                    </li>

                    <?php for ($i = 1; $i <= $totalPaginas; $i++): ?>
                        <li class="page-item <?php echo ($paginaActual == $i) ? 'active' : ''; ?>">
                            <a class="page-link text-black" href="?pagina=<?php echo $i; ?>"><?php echo $i; ?></a>
                        </li>
                    <?php endfor ?>

                    <li class="page-item <?php echo ($paginaActual >= $totalPaginas) ? 'disabled' : ''; ?>">
                        <a class="page-link text-black" href="?pagina=<?php echo $paginaActual + 1; ?>">Siguiente</a>
                    </li>
                </ul>
            </div>

        </div>
    </div>
    <br>
</div>