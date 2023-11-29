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
                            <img src="<?= $medicamento->imagenEmpaque ?>" class="card-img-top"
                                alt="Imagen del medicamento" width="300" height="300">
                        </h2>


                        <h4>Información general</h4>
                        <p><strong>Nombre científico:</strong>
                            <?= $medicamento->nombreCinetifico ?>
                        </p>
                        <p><strong>Forma farmacéutica:</strong>
                            <?= $medicamento->formaFarmaceutica ?>
                        </p>
                        <p><strong>Dosis recomendada:</strong>
                            <?= $medicamento->dosis ?> gm
                        </p>
                        <p><strong>Fecha de caducidad:</strong>
                            <?= $medicamento->fechaCaducidad ?>
                        </p>

                        <p><strong>Version:</strong>
                            <?= $medicamento->version ?>
                        </p>
                        <p><strong>Recomendaciones:</strong>
                        <ul>
                            <li>
                                <?= $medicamento->simbolo ?>
                            </li>
                        </ul>
                        </p><br>


                        <div class="container mt-4">
                            <div class="row justify-content-center">
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