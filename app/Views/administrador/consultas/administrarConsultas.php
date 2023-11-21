<div class="container">
    <div class="row">
        <h1 align="center">ADMINISTRAR CONSULTAS</h1>
        <div class="col-6">
            <form action="<?= base_url('index.php/administrador/consultas/buscarConsultas'); ?>" method="GET">
                <div class="col-5">
                    <label for="columnaBusquedaConsulta">Buscar consulta por:</label>
                    <select name="columnaBusquedaConsulta" class="form-control">
                        <option value="todo">Cualquier campo</option>
                        <option value="lugar">Lugar en el que se realizó</option>
                        <option value="fecha">Fecha de consulta</option>
                        <option value="motivo">Motivo de consulta</option>
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
                onclick="window.location='/administrador/consultas/agregarMedicoConsulta'">
                <img src="https://cdn-icons-png.flaticon.com/128/4885/4885419.png" alt="Icono" width="25" height="25">
                Agregar Consulta
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
            $totalRegistros = count($consultas);
            $totalPaginas = ceil($totalRegistros / $registrosPorPagina);
            $paginaActual = isset($_GET['pagina']) ? $_GET['pagina'] : 1;
            $indiceInicio = ($paginaActual - 1) * $registrosPorPagina;
            $consultasPagina = array_slice($consultas, $indiceInicio, $registrosPorPagina); ?>

            <table class="table">

            <thead class="thead-dark">
                    <th style="text-align: center">ID</th>
                    <th style="text-align: center">Lugar de consulta </th>
                    <th style="text-align: center">Motivo de consulta </th>
                    <th style="text-align: center">Fecha de consulta </th>
                    <th style="text-align: center">Status de consulta </th>
                    <th style="text-align: center">Receta</th>
                    <th style="text-align: center" colspan="3">Opciones</th>

                </thead>

                <tbody>
                <?php foreach ($consultasPagina as $consulta): ?>
                        <tr>
                        <?php foreach ($recetas as $receta): if($receta->consulta == $consulta->id):?>
                            
                            <td style="text-align: center"><?= $consulta->id ?></td>
                            
                            <td style="text-align: center"><?= $consulta->lugar ?></td>

                            <td style="text-align: center"><?= $consulta->motivo ?></td>

                            <td style="text-align: center"><?= $consulta->fecha ?></td>
                            
                            
                                <?php if($consulta->updated_at == NULL): ?>
                                    <?php if($consulta->fecha >= date('Y-m-d')):?>
                                        <td style="text-align: center; background-color:rgb(255,128,0)">Sin realizar</td>
                                    <?php else:?>
                                        <?php if($receta->fechaVencimiento == date('0000-00-00')):?>
                                            <td style="text-align: center; background-color:rgb(255,128,0)">En espera para <br>revisión del médico</td>
                                        <?php else:?>
                                            <td style="text-align: center; background-color:rgb(255,0,0)">No se realizó <br>en la fecha <br>establecida</td>
                                        <?php endif;?>

                                    <?php endif;?>
                                <?php else:?>
                                    <td style="text-align: center; background-color:rgb(0,255,0)">Realizada</td>
                                <?php endif;?>

                        
                            <td style="text-align: center">
                                    <a href="<?= base_url('/administrador/recetas/sabermasReceta/' . $receta->id); ?>"style="color:rgba(0,0,0,1)">
                                    <?='Receta '.$receta->id.' que vence en '.$receta->fechaVencimiento ?></a>
                            </td>

                            <?php if($consulta->updated_at == NULL):?>
                                <?php if($consulta->fecha >= date('Y-m-d')):?>
                                    
                                    <td style="text-align: center">
                                        <a href="<?= base_url('/administrador/consultas/posponerConsulta/' . $consulta->id); ?>"
                                            style="color:rgba(0,0,0,0.6)">
                                            <img src="https://cdn-icons-png.flaticon.com/128/2784/2784399.png" alt="posponer"
                                                class="service-img" width="60" height="60">
                                            <figcaption>Posponer</figcaption>
                                        </a>
                                    </td>
                                <?php else:?>
                                    <td style="text-align: center">
                                        <a href="<?= base_url('/administrador/consultas/realizarConsulta/' . $consulta->id); ?>"
                                            style="color:rgba(0,0,0,0.6)">
                                            <img src="https://cdn-icons-png.flaticon.com/128/190/190411.png" alt="realizar"
                                                class="service-img" width="60" height="60">
                                            <figcaption>Realizar</figcaption>
                                        </a>
                                    </td>
                                <?php endif;?>
                                <td>
                                    <a href="<?= base_url('/administrador/consultas/sabermasConsulta/' . $consulta->id); ?>"
                                        style="color:rgba(0,0,0,0.6)">
                                        <img src="https://cdn-icons-png.flaticon.com/128/5828/5828566.png" alt="saberMas"
                                            class="service-img" width="60" height="60">
                                        <figcaption>Saber más</figcaption>
                                    </a>
                                </td>
                            
                            <?php else:?>
                                <td></td>
                                <td>
                                    <a href="<?= base_url('/administrador/consultas/sabermasConsulta/' . $consulta->id); ?>"
                                        style="color:rgba(0,0,0,0.6)">
                                        <img src="https://cdn-icons-png.flaticon.com/128/5828/5828566.png" alt="saberMas"
                                            class="service-img" width="60" height="60">
                                        <figcaption>Saber más</figcaption>
                                    </a>
                                </td>
                            <?php endif;?>
                        </tr>                            
                        <?php endif;endforeach; ?>
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