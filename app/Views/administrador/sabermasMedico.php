<div class="container">
    <div class="row">
        <div class="col-2"></div>
        <div class="col-8">

            <h1 align="center">Saber Más del Médico....</h1>

            <div class="container mt-4">
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title" align="center">
                            <?php if ($ui[0]->genero == 'F'): ?>
                                Dra.
                            <?php else: ?>
                                Dr.
                            <?php endif; ?>
                            <?= $ui[0]->primerNombre . ' ' . $ui[0]->segundoNombre . ' ' . $ui[0]->apellidoPaterno . ' ' . $ui[0]->apellidoMaterno ?>
                        </h2>

                        <img src="<?= $ui[0]->foto ?>" class="card-img-top" alt="Imagen del medico">

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
                            <?= $ui[0]->telefono ?>
                        </p>
                        <br>

                        <h4> Información de usuario</h4>
                        <p><strong>Nombre de usuario:</strong>
                            <?= $u[0]->username ?>
                        </p>
                        <p><strong>Correo:</strong>
                            <?= $u[0]->correo ?>
                        </p>
                        <p><strong>Contraseña:</strong>
                            <?= $u[0]->password ?>
                        </p>
                        <br>

                        <h4>Dirección</h4>
                        <p><strong>Tipo:</strong>
                            <?= $d[0]->tipo ?>
                        </p>
                        <p><strong>Ubicada en:</strong>
                            <?= $d[0]->municipio . ' ' . $d[0]->estado ?>
                        </p>
                        <p><strong>Colonia:</strong>
                            <?= $d[0]->colonia . '(C.P.' . $d[0]->CP . ')' ?>
                        </p>
                        <p><strong>Calle:</strong>
                            <?= $d[0]->calle ?>
                        </p>
                        <p><strong>Número:</strong> #
                            <?= $d[0]->noExt . ' (interior:' . $d[0]->noInt . ')' ?>
                        </p>
                        <br>

                        <div class="container mt-4">
                            <div class="row justify-content-center">

                                <div class="col-md-3">
                                    <a href="<?= base_url('/administrador/editarMedico/' . $id); ?>" class="text-center"
                                        style="color:rgba(0,0,0,1)">
                                        <figure>
                                            <img src="https://cdn-icons-png.flaticon.com/128/705/705120.png"
                                                alt="editar" class="service-img" width="60" height="60">
                                            <figcaption>Editar</figcaption>
                                        </figure>
                                    </a>
                                </div>

                                <div class="col-md-3">
                                    <a href="<?= base_url('/administrador/eliminarMedico/' . $id); ?>" class="text-center"
                                        style="color:rgba(0,0,0,1)">
                                        <figure>
                                            <img src="https://cdn-icons-png.flaticon.com/128/3541/3541990.png"
                                                alt="eliminar" class="service-img" width="60" height="60">
                                            <figcaption>Eliminar</figcaption>
                                        </figure>
                                    </a>
                                </div>

                                <div class="col-md-3">
                                    <a href="<?= base_url('/administrador/administrarMedicos'); ?>" class="text-center"
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