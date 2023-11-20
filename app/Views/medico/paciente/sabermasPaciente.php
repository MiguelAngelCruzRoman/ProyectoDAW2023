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

                        <img src="<?= $userinfo[0]->foto ?>" class="card-img-top" alt="Imagen del paciente" width="300" height="300">

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
                                    <a href="<?= base_url('/medico/consultas/realizarConsulta/formulario/' . $IDMedicoPaciente); ?>" class="text-center"
                                        style="color:rgba(0,0,0,1)">
                                        <figure>
                                            <img src="https://cdn-icons-png.flaticon.com/128/3022/3022342.png"
                                                alt="editar" class="service-img" width="60" height="60">
                                            <figcaption>Realizar Consulta</figcaption>
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