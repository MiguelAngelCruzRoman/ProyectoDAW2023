<div class="container">
    <div class="row">
        <div class="col-2"></div>
        <div class="col-8">

            <h1 align="center">Saber Más del Medicamento....</h1>

            <div class="container mt-4">
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title" align="center">
                            <?= $medicamento->nombreComercial ?>
                        </h2>

                        <img src="<?= $medicamento->imagenEmpaque ?>" class="card-img-top" alt="Imagen del medicamento">

                        <p><strong>Nombre científico:</strong>
                            <?= $medicamento->nombreCinetifico ?>
                        </p>
                        <p><strong>Forma farmacéutica:</strong>
                            <?= $medicamento->formaFarmaceutica ?>
                        </p>
                        <p><strong>Dosis recomendada:</strong>
                            <?= $medicamento->dosis ?>
                        </p>
                        <p><strong>Fecha de caducidad:</strong>
                            <?= $medicamento->fechaCaducidad ?>
                        </p>
                        <p><strong>Lote de fabricación:</strong>
                            <?= $medicamento->loteFabricacion ?>
                        </p>
                        <p><strong>Stock:</strong>
                            <?= $medicamento->stock ?>
                        </p>
                        <p><strong>Version:</strong>
                            <?= $medicamento->version ?>
                        </p>
                        <p><strong>Símbolos:</strong>
                        <ul>
                            <li>
                                <?= $medicamento->simbolo ?>
                            </li>
                        </ul>
                        </p>

                        <div class="container mt-4">
                            <div class="row justify-content-center">

                                <div class="col-md-3">
                                    <a href="<?= base_url('/administrador/editarMedicamento/' . $medicamento->id); ?>"
                                        class="text-center" style="color:rgba(0,0,0,1)">
                                        <figure>
                                            <img src="https://cdn-icons-png.flaticon.com/128/705/705120.png"
                                                alt="editar" class="service-img" width="60" height="60">
                                            <figcaption>Editar</figcaption>
                                        </figure>
                                    </a>
                                </div>

                                <div class="col-md-3">
                                    <a href="<?= base_url('/administrador/eliminarMedicamento/' . $medicamento->id); ?>"
                                        class="text-center" style="color:rgba(0,0,0,1)">
                                        <figure>
                                            <img src="https://cdn-icons-png.flaticon.com/128/3541/3541990.png"
                                                alt="eliminar" class="service-img" width="60" height="60">
                                            <figcaption>Eliminar</figcaption>
                                        </figure>
                                    </a>
                                </div>

                                <div class="col-md-3">
                                    <a href="<?= base_url('/administrador/administrarPacientes' . $medicamento->id); ?>"
                                        class="text-center" style="color:rgba(0,0,0,1)">
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