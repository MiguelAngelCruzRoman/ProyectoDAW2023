<div class="container">
    <div class="row">
        <div class="col-2"></div>
        <div class="col-8">

            <h1 align="center">Saber Más del Paciente....</h1>

            <div class="container mt-4">
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title" align="center">
                            <?= $userinfo[0]->primerNombre . ' ' . $userinfo[0]->segundoNombre . ' ' . $userinfo[0]->apellidoPaterno . ' ' . $userinfo[0]->apellidoMaterno ?>
                        </h2>

                        <img src="<?= $userinfo[0]->foto ?>" class="card-img-top" alt="Imagen del medico" width="300" height="300">

                        <h4> Información del paciente</h4>
                        <p><strong>Tipo de seguro:</strong>
                            <?= $paciente->statusSeguro ?>
                        </p>
                        <p><strong>Tipo de sangre:</strong>
                            <?= $paciente->tipoSangre ?>
                        </p>
                        <p><strong>Alergias:</strong>
                            <?= $paciente->alergia ?>
                        </p>
                        <p><strong>Hábitos tóxicos:</strong>
                            <?= $paciente->habitoToxico ?>
                        </p>
                        <p><strong>Condiciones previas:</strong>
                            <?= $paciente->condicionesPrevias ?>
                        </p>
                        <p><strong>Fecha de la última revisión:</strong>
                            <?= $paciente->fechaRevision ?>
                        </p>
                        <p><strong>Motivo de la última revisión:</strong>
                            <?= $paciente->motivoRevision ?>
                        </p>
                        <p><strong>CURP:</strong>
                            <?= $paciente->CURP ?>
                        </p>
                        <br>

                        <h4> Información de usuario</h4>
                        <p><strong>Nombre de usuario:</strong>
                            <?= $user[0]->username ?>
                        </p>
                        <p><strong>Correo:</strong>
                            <?= $user[0]->correo ?>
                        </p>
                        <p><strong>Contraseña:</strong>
                            <?= $user[0]->password ?>
                        </p>
                        <br>

                        <h4>Dirección</h4>
                        <p><strong>Tipo:</strong>
                            <?= $direccion[0]->tipo ?>
                        </p>
                        <p><strong>Ubicada en:</strong>
                            <?= $direccion[0]->municipio . ' ' . $direccion[0]->estado ?>
                        </p>
                        <p><strong>Colonia:</strong>
                            <?= $direccion[0]->colonia . ' (C.P.' . $direccion[0]->CP . ')' ?>
                        </p>
                        <p><strong>Calle:</strong>
                            <?= $direccion[0]->calle ?>
                        </p>
                        <p><strong>Número:</strong>
                            #<?=$direccion[0]->noExt . ' (interior: ' . $direccion[0]->noInt . ')' ?>
                        </p>
                        <br>

                        <h4>Médicos que lo atienden</h4>
                        <ul>
                            <?php foreach($medicosPaciente as $medicoPaciente): if($medicoPaciente->paciente == $paciente->id ):?>
                                    <?php foreach($medicos as $medico): if($medico->id == $medicoPaciente->medico ):?>
                                        <?php foreach($userMedicos as $userMedico): if($userMedico->medico == $medicoPaciente->medico ):?>
                                            <?php foreach ($userInfoMedicos as $userInfoMedico): if($userInfoMedico->id == $userMedico->id):?>
                                        <li><a href="<?= base_url('/administrador/medicos/sabermasMedico/' . $medico->id); ?>"style="color:rgba(0,0,0,1)">
                                            <?php if($userInfoMedico->genero =='M'):?>
                                                Dr.
                                            <?php else: ?>
                                                Dra.
                                            <?php endif; ?>
                                            <?= $userInfoMedico->primerNombre . ' ' . $userInfoMedico->segundoNombre .
                                            ' ' . $userInfoMedico->apellidoPaterno . ' ' . $userInfoMedico->apellidoMaterno .
                                            ' ('.$medico->especialidad.')'
                                            ?></a>
                                        </li>
                                        <?php endif;endforeach; ?>
                                    <?php endif;endforeach;?>
                                <?php endif;endforeach;?>
                            <?php endif;endforeach;?>
                        </ul>
                        

                        <div class="container mt-4">
                            <div class="row justify-content-center">

                                <div class="col-md-3">
                                    <a href="<?= base_url('/administrador/pacientes/editarPaciente/' . $id); ?>" class="text-center"
                                        style="color:rgba(0,0,0,1)">
                                        <figure>
                                            <img src="https://cdn-icons-png.flaticon.com/128/705/705120.png"
                                                alt="editar" class="service-img" width="60" height="60">
                                            <figcaption>Editar</figcaption>
                                        </figure>
                                    </a>
                                </div>

                                <div class="col-md-3">
                                    <a href="<?= base_url('/administrador/pacientes/eliminarPaciente/' . $user[0]->id); ?>" class="text-center"
                                        style="color:rgba(0,0,0,1)">
                                        <figure>
                                            <img src="https://cdn-icons-png.flaticon.com/128/3541/3541990.png"
                                                alt="eliminar" class="service-img" width="60" height="60">
                                            <figcaption>Eliminar</figcaption>
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