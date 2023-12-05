<?php $session = \Config\Services::session(); ?>

<div class="container">
    <div class="row">
    <?php if (($session->get('confirmacion') != NULL)): ?>
            <div style="background-color:white; border-top-style: solid;border-right-style: solid;border-left-style: solid;border-bottom-style: solid">
                <br>
                <?php print($session->get('confirmacion')) ?>
                <?php session()->set([
                    'confirmacion' => NULL
                ]); ?>
            </div>
        <?php endif; ?><br>
        <h1 align="center">ADMINISTRAR CONSULTAS</h1>

        <div class="col-6">
            <form action="<?= base_url('index.php/paciente/consultas/buscarConsultas'); ?>" method="GET">
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
            <button type="button" class="btn btn-secondary mt-4" onclick="window.location='/paciente'">
                <img src="https://cdn-icons-png.flaticon.com/128/10349/10349274.png" alt="Icono" width="25" height="25">
                Página Principal
            </button>
        </div>
    </div>
    <br>


    

    <div class="row">
        <div class="col-12">

            <!-- Sección para agrupas las consultas en grupos de 10 elementos-->
            <?php $registrosPorPagina = 10;
            $totalRegistros = count($medicosPaciente);
            $totalPaginas = ceil($totalRegistros / $registrosPorPagina);
            $paginaActual = isset($_GET['pagina']) ? $_GET['pagina'] : 1;
            $indiceInicio = ($paginaActual - 1) * $registrosPorPagina;
            $medicoPacientePagina = array_slice($medicosPaciente, $indiceInicio, $registrosPorPagina); ?>

            <!-- Sección para mostrar las consultas que ya se realizaron-->
            <h4>Consultas Pendientes</h4>
            <table class="table" border="6">
                <thead class="thead-dark">
                    <th style="text-align: center">ID</th>
                    <th style="text-align: center">Lugar de consulta </th>
                    <th style="text-align: center">Motivo de consulta </th>
                    <th style="text-align: center">Fecha de consulta </th>
                    <th style="text-align: center">Status de consulta </th>
                    <th style="text-align: center">Receta</th>
                </thead>

                <tbody>   
                    <?php foreach ($medicoPacientePagina as $medicoPaciente): ?>
                        <?php foreach ($consultasPendientes as $consulta):
                            if ($medicoPaciente->id == $consulta->medico_paciente): ?>

                                    <tr>
                                    <?php foreach ($recetas as $receta):
                                        if ($receta->consulta == $consulta->id): ?>
                            
                                                <td style="text-align: center"><?= $consulta->id ?></td>
                            
                                                <td style="text-align: center"><?= $consulta->lugar ?></td>

                                                <td style="text-align: center"><?= $consulta->motivo ?></td>

                                                <td style="text-align: center"><?= $consulta->fecha ?></td>
                            
                            
                                                    <?php if ($consulta->updated_at == NULL): ?>
                                                            <?php if ($consulta->fecha < date('Y-m-d')): ?>
                                                                    <td style="text-align: center; background-color:rgb(255,128,0)">Sin realizar</td>
                                                            <?php else: ?>
                                                                    <?php if ($receta->fechaVencimiento == date('0000-00-00')): ?>
                                                                            <td style="text-align: center; background-color:rgb(255,128,0)">En espera para <br>revisión del médico</td>
                                                                    <?php else: ?>
                                                                            <td style="text-align: center; background-color:rgb(255,0,0)">No se realizó <br>en la fecha <br>establecida</td>
                                                                    <?php endif; ?>

                                                            <?php endif; ?>
                                                    <?php else: ?>
                                                            <td style="text-align: center; background-color:rgb(0,255,0)">Realizada</td>
                                                    <?php endif; ?>

                        
                                                <td style="text-align: center">
                                                        <a href="<?= base_url('/paciente/recetas/sabermasReceta/' . $receta->id); ?>"style="color:rgba(0,0,0,1)">
                                                        <?= 'Receta ' . $receta->id . ' que vence en ' . $receta->fechaVencimiento ?></a>
                                                </td>
                                    <?php endif; endforeach; ?>
                                    <tr></tr>
                        <?php endif; endforeach; ?>
                    <?php endforeach ?>
                </tbody>
            </table><br><br>

            <!-- Sección para mostrar las consultas terminadas-->
            <h4>Consultas Terminadas</h4>
            <table class="table" border="6">
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
                <?php foreach ($medicoPacientePagina as $medicoPaciente): ?>
                        <?php foreach ($consultas as $consulta):
                            if (($medicoPaciente->id == $consulta->medico_paciente) && ($consulta->fecha != '0000-00-00')): ?>

                                    <tr>
                                    <?php foreach ($recetas as $receta):
                                        if ($receta->consulta == $consulta->id): ?>
                            
                                                <td style="text-align: center"><?= $consulta->id ?></td>
                            
                                                <td style="text-align: center"><?= $consulta->lugar ?></td>

                                                <td style="text-align: center"><?= $consulta->motivo ?></td>

                                                <td style="text-align: center"><?= $consulta->fecha ?></td>
                            
                            
                                                    <?php if ($consulta->updated_at == NULL): ?>
                                                            <?php if ($consulta->fecha < date('Y-m-d')): ?>
                                                                    <td style="text-align: center; background-color:rgb(255,128,0)">Sin realizar</td>
                                                            <?php else: ?>
                                                                    <?php if ($receta->fechaVencimiento == date('0000-00-00')): ?>
                                                                            <td style="text-align: center; background-color:rgb(255,128,0)">En espera para <br>revisión del médico</td>
                                                                    <?php else: ?>
                                                                            <td style="text-align: center; background-color:rgb(255,0,0)">No se realizó <br>en la fecha <br>establecida</td>
                                                                    <?php endif; ?>

                                                            <?php endif; ?>
                                                    <?php else: ?>
                                                            <td style="text-align: center; background-color:rgb(0,255,0)">Realizada</td>
                                                    <?php endif; ?>

                        
                                                <td style="text-align: center">
                                                        <a href="<?= base_url('/paciente/recetas/sabermasReceta/' . $receta->id); ?>"style="color:rgba(0,0,0,1)">
                                                        <?= 'Receta ' . $receta->id . ' que vence en ' . $receta->fechaVencimiento ?></a>
                                                </td>

                                                <td style="text-align: center">
                                                    <a href="<?= base_url('/paciente/consultas/sabermasConsulta/' . $consulta->id); ?>"
                                                        style="color:rgba(0,0,0,0.6)">
                                                        <img src="https://cdn-icons-png.flaticon.com/128/5828/5828566.png" alt="saberMas"
                                                            class="service-img" width="60" height="60">
                                                        <figcaption>Saber más</figcaption>
                                                    </a>
                                                </td>
                                            </tr>
                                            <?php endif; endforeach; ?>
                                    <?php endif; endforeach; ?>
                            <?php endforeach ?>
                </tbody>
            </table>

            <!-- Sección para cambiar de grupo de consultas-->
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