<div class="container">
    <div class="row">
        <div class="col-2"></div>
        <div class="col-8">

            <h1 align="center">Saber Más del Médico....</h1>

            <div class="container mt-4">
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title" align="center">
                            <?php if ($userinfo[0]->genero == 'F'): ?>
                                Dra.
                            <?php else: ?>
                                Dr.
                            <?php endif; ?>
                            <?= $userinfo[0]->primerNombre . ' ' . $userinfo[0]->segundoNombre . ' ' . $userinfo[0]->apellidoPaterno . ' ' . $userinfo[0]->apellidoMaterno ?>
                        </h2>

                        <img src="<?= $userinfo[0]->foto ?>" class="card-img-top" alt="Imagen del medico">

                        <h4> Información del médico</h4>
                        <p><strong>Especialidad:</strong>
                            <?= $medico->especialidad ?>
                        </p>
                        <p><strong>Turno de trabajo:</strong>
                            <?= $medico->turno ?>
                        </p>
                        <p><strong>Días laborales:</strong>
                            <?= $medico->diasLaborales ?>
                        </p>
                        <p><strong>Número de contacto:</strong>
                            <?= $userinfo[0]->telefono ?>
                        </p>
                        <br>
                        
                        <h4>Consultas</h4>    
                        <?php foreach($consultas as $consulta):?>
                            <ol>
                                <li><p><strong>Consulta #<?= $consulta->id?>:</strong>
                                    <?=' realizada con motivo de ['.$consulta->motivo.']' ?></p>
                                </li>

                            </ol>
                            
                        <?php endforeach;?>

                        

                        <div class="container mt-4">
                            <div class="row justify-content-center">

                            <div class="col-md-3">
                                    <a href="<?= base_url('/paciente/consultas/agregarConsulta/' . $medico->id); ?>" class="text-center"
                                        style="color:rgba(0,0,0,1)">
                                        <figure>
                                            <img src="https://cdn-icons-png.flaticon.com/128/3022/3022342.png"
                                                alt="editar" class="service-img" width="60" height="60">
                                            <figcaption>Agendar Consulta</figcaption>
                                        </figure>
                                    </a>
                                </div>

                            

                                <div class="col-md-3">
                                    <a href="#" onclick="history.back()" class="text-center"
                                        style="color:rgba(0,0,0,1)">
                                        <figure>
                                            <img src="https://cdn-icons-png.flaticon.com/128/892/892519.png"
                                                alt="regresar" class="service-img" width="60" height="60">
                                            <figcaption>Regresar</figcaption>
                                        </figure>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>