<div class="container">
    <div class="row">
        <h1 align="center">ADMINISTRAR RECETAS</h1>
        <div class="col-4">
            
        </div>

        <div class="col-4"></div>


        <div class="col-4">
            <button type="button" class="btn btn-secondary mt-4" onclick="history.back()">
                <img src="https://cdn-icons-png.flaticon.com/128/8591/8591477.png" alt="regresar" class="service-img" width="25" height="25">                
                Regresar
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
            $totalRegistros = count($recetas);
            $totalPaginas = ceil($totalRegistros / $registrosPorPagina);
            $paginaActual = isset($_GET['pagina']) ? $_GET['pagina'] : 1;
            $indiceInicio = ($paginaActual - 1) * $registrosPorPagina;
            $recetasPagina = array_slice($recetas, $indiceInicio, $registrosPorPagina); ?>

            <table class="table">

                <thead>
                    <th style="text-align: center">ID</th>
                    <th style="text-align: center">Medicamentos recetados</th>
                    <th style="text-align: center">Consulta en la que se recetó</th>
                    <th style="text-align: center">Fecha de vencimiento </th>
                    <th style="text-align: center">Status </th>
                    <th style="text-align: center" colspan="2">Opciones</th>

                </thead>

                <tbody>
                <?php foreach ($recetasPagina as $receta): ?>
                    <?php if($receta->fechaVencimiento == date('0000-00-00')):?>
                    <tr>
                    </tr>
                        <?php else:?>
                                    
                        <tr>
                            <td style="text-align: center"><?= $receta->id ?></td>
                            <td>
                                <?php foreach($recetaMedicamentos as $recetaMedicamento): if($recetaMedicamento->receta == $receta->id):?>
                                    <?php foreach($medicamentos as $medicamento): if($medicamento->id == $recetaMedicamento->medicamento):?>
                                        <li><a href="<?= base_url('/administrador/medicamentos/sabermasMedicamento/' . $medicamento->id); ?>"style="color:rgba(0,0,0,1)">
                                            <?= $medicamento->nombreComercial.' ('.$medicamento->dosis.' gm)' ?></a>
                                        </li>
                                    <?php endif;endforeach; ?>
                                <?php endif;endforeach; ?>
                            </td>
                            <td style="text-align: center">
                                <?php foreach($consultas as $consulta): if($receta->consulta == $consulta->id):?>
                                    <?='Consulta '.$consulta->id.', realizada en "'.$consulta->lugar.'"' ?>
                               <?php endif;endforeach;?>
                            </td>
                            <td style="text-align: center"><?= $receta->fechaVencimiento ?></td>
                            <?php if($receta->status == 0):?>
                                <td style="text-align: center; background-color:rgb(139,0,0)"><?= $receta->status ?></td>
                                <td style="text-align: center">
                                    <a href="<?= base_url('/administrador/recetas/renovarReceta/' . $receta->id); ?>"
                                        style="color:rgba(0,0,0,0.6)">
                                        <img src="https://cdn-icons-png.flaticon.com/128/3247/3247396.png" alt="renovar"
                                            class="service-img" width="60" height="60">
                                        <figcaption>Renovar Vencimiento de Receta</figcaption>
                                    </a>
                                </td>
                            <?php else:?>
                                <td style="text-align: center"><?= $receta->status ?></td>
                                <td style="text-align: center">
                                    <a href="<?= base_url('/administrador/recetas/cancelarReceta/' . $receta->id); ?>"
                                        style="color:rgba(0,0,0,0.6)">
                                        <img src="https://cdn-icons-png.flaticon.com/128/5978/5978540.png" alt="cancelar"
                                            class="service-img" width="60" height="60">
                                        <figcaption>Cancelar Validez de Receta</figcaption>
                                    </a>
                                </td>
                            <?php endif;?>
                            <td>
                                <a href="<?= base_url('/administrador/recetas/sabermasReceta/' . $receta->id); ?>"
                                    style="color:rgba(0,0,0,0.6)">
                                    <img src="https://cdn-icons-png.flaticon.com/128/5828/5828566.png" alt="saberMas"
                                        class="service-img" width="60" height="60">
                                    <figcaption>Saber más</figcaption>
                                </a>
                            </td>
                        </tr>
                        <?php endif;?>

                    <?php endforeach;?>
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