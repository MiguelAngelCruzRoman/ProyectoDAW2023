<div class="container">
    <div class="row">
        <div class="col-2"></div>
        <div class="col-8">

            <h1 align="center">Saber Más de la Receta</h1>

            <div class="container mt-4">
                <div class="card">
                    <div class="card-body">
                        <h3> Información de la receta</h3>
                        <p><strong>Fecha de vencimiento:</strong>
                            <?= $receta->fechaVencimiento ?>
                        </p>

                        <?php foreach($consultas as $consulta): if($consulta->id == $receta->consulta):?>
                                <p><strong>Realizada en:</strong>
                                    <?= $consulta->lugar ?>
                                </p>
                                <p><strong>El día:</strong>
                                    <?= $consulta->fecha.' a las '.$consulta->hora?>
                                </p>
                                <p><strong>Motivo de expedición:</strong>
                                    <?= $consulta->motivo?>
                                </p>
                                <?php $idMedicoPaciente = $consulta->medico_paciente?>
                        <?php endif;endforeach; ?>

                        <p><strong>Paciente al quien se recetó: </strong>
                            <?php foreach($medicosPaciente as $medicoPaciente): if($medicoPaciente->id == $idMedicoPaciente):?>
                                        
                                <?php foreach($pacientes as $paciente): if($paciente->id == $medicoPaciente->paciente ):?>
                                        <?php foreach($userPacientes as $userPaciente): if($userPaciente->paciente == $medicoPaciente->paciente ):?>
                                            <?php foreach ($userInfoPacientes as $userInfoPaciente): if($userInfoPaciente->id == $userPaciente->id):?>
                                        <a href="<?= base_url('/administrador/pacientes/sabermasPaciente/' . $medicoPaciente->paciente); ?>"style="color:rgba(0,0,0,1)">
                                            <?php if($userInfoPaciente->genero =='M'):?>
                                                Sr.
                                            <?php else: ?>
                                                Sra.
                                            <?php endif; ?>
                                            <?= $userInfoPaciente->primerNombre . ' ' . $userInfoPaciente->segundoNombre .
                                            ' ' . $userInfoPaciente->apellidoPaterno . ' ' . $userInfoPaciente->apellidoMaterno?></a>
                                        <?php endif;endforeach; ?>
                                    <?php endif;endforeach;?>
                                <?php endif;endforeach;?>
                                
                            <?php endif;endforeach;?>
                        </p>


                        <p><strong>Médico que recetó: </strong>
                            <?php foreach($medicosPaciente as $medicoPaciente): if($medicoPaciente->id == $idMedicoPaciente):?>
                                    <?php foreach($medicos as $medico): if($medico->id == $medicoPaciente->medico ):?>
                                        <?php foreach($userMedicos as $userMedico): if($userMedico->medico == $medicoPaciente->medico ):?>
                                            <?php foreach ($userInfoMedicos as $userInfoMedico): if($userInfoMedico->id == $userMedico->id):?>
                                        <a href="<?= base_url('/administrador/medicos/sabermasMedico/' . $medicoPaciente->medico); ?>"style="color:rgba(0,0,0,1)">
                                            <?php if($userInfoMedico->genero =='M'):?>
                                                Dr.
                                            <?php else: ?>
                                                Dra.
                                            <?php endif; ?>
                                            <?= $userInfoMedico->primerNombre . ' ' . $userInfoMedico->segundoNombre .
                                            ' ' . $userInfoMedico->apellidoPaterno . ' ' . $userInfoMedico->apellidoMaterno?></a>
                                        <?php endif;endforeach; ?>
                                    <?php endif;endforeach;?>
                                <?php endif;endforeach;?>
                            <?php endif;endforeach;?>
                        </p>
                        <br>

                            

                        <h3>Medicamentos</h3>
                        <?php foreach($recetaMedicamentos as $recetaMedicamento): if($recetaMedicamento->receta == $receta->id):?>
                            <?php foreach($medicamentos as $medicamento): if($medicamento->id == $recetaMedicamento->medicamento):?>
                                <li><a href="<?= base_url('/administrador/medicamentos/sabermasMedicamento/' . $medicamento->id); ?>"style="color:rgba(0,0,0,1)">
                                    <?= $medicamento->nombreComercial.' ('.$medicamento->dosis.' gm)' ?></a>
                                </li>
                            <?php endif;endforeach; ?>
                        <?php endif;endforeach; ?>
                        

                        <div class="container mt-4">
                            <div class="row justify-content-center">

                                
                            <?php if($receta->status == 0):?>
                                <div class="col-md-3">
                                    <a href="<?= base_url('/administrador/recetas/renovarReceta/' .$receta->id); ?>" class="text-center"
                                        style="color:rgba(0,0,0,1)">
                                        <figure>
                                            <img src="https://cdn-icons-png.flaticon.com/128/3247/3247396.png"
                                                alt="renovar" class="service-img" width="60" height="60">
                                            <figcaption>Renovar</figcaption>
                                        </figure>
                                    </a>
                                </div>
                            <?php else:?>
                                <div class="col-md-3">
                                    <a href="<?= base_url('/administrador/recetas/cancelarReceta/' .$receta->id); ?>" class="text-center"
                                        style="color:rgba(0,0,0,1)">
                                        <figure>
                                            <img src="https://cdn-icons-png.flaticon.com/128/5978/5978540.png"
                                                alt="cancelar" class="service-img" width="60" height="60">
                                            <figcaption>Cancelar</figcaption>
                                        </figure>
                                    </a>
                                </div>
                            <?php endif;?>
                                

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