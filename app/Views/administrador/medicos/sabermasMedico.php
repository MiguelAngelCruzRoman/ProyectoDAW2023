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
                            <?= $direccion[0]->colonia . '(C.P.' . $direccion[0]->CP . ')' ?>
                        </p>
                        <p><strong>Calle:</strong>
                            <?= $direccion[0]->calle ?>
                        </p>
                        <p><strong>Número:</strong> #
                            <?= $direccion[0]->noExt . ' (interior:' . $direccion[0]->noInt . ')' ?>
                        </p>
                        <br>

                        <h4>Pacientes que atiende</h4>
                        <ul>
                            <?php foreach($medicosPaciente as $medicoPaciente): if($medicoPaciente->medico == $medico->id ):?>
                                    <?php foreach($pacientes as $paciente): if($paciente->id == $medicoPaciente->paciente ):?>
                                        <?php foreach($userPacientes as $userPaciente): if($userPaciente->paciente == $medicoPaciente->paciente ):?>
                                            <?php foreach ($userInfoPacientes as $userInfoPaciente): if($userInfoPaciente->id == $userPaciente->id):?>
                                        <li><a href="<?= base_url('/administrador/pacientes/sabermasPaciente/' . $paciente->id); ?>"style="color:rgba(0,0,0,1)">
                                            <?php if($userInfoPaciente->genero =='M'):?>
                                                Sr.
                                            <?php else: ?>
                                                Sra.
                                            <?php endif; ?>
                                            <?= $userInfoPaciente->primerNombre . ' ' . $userInfoPaciente->segundoNombre .
                                            ' ' . $userInfoPaciente->apellidoPaterno . ' ' . $userInfoPaciente->apellidoMaterno 
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
                                    <a href="<?= base_url('/administrador/medicos/editarMedico/' . $id); ?>" class="text-center"
                                        style="color:rgba(0,0,0,1)">
                                        <figure>
                                            <img src="https://cdn-icons-png.flaticon.com/128/705/705120.png"
                                                alt="editar" class="service-img" width="60" height="60">
                                            <figcaption>Editar</figcaption>
                                        </figure>
                                    </a>
                                </div>

                                <div class="col-md-3">
                                    <a href="<?= base_url('/administrador/medicos/eliminarMedico/' . $id); ?>" class="text-center"
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