<?php $session = \Config\Services::session(); ?>
<div class="container">
    <div class="row">
        <div class="col-12">
            <h2 align="center">¡HOLA,
                <?= strtoupper($session->get('username')) ?>!
            </h2>
            <h2 align="center">¿QUÉ QUIERE HACER HOY?</h2>
        </div>
    </div>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-4 text-center mb-4">
                <a href="<?= base_url('/paciente/medicos/administrarMedicos'); ?>"
                    class="text-decoration-none text-dark">
                    <img src="https://cdn-icons-png.flaticon.com/512/4850/4850938.png" alt="administrarMedicos"
                        class="img-fluid" width="250" height="250">
                    <h3 class="mt-3">Administrar Médicos</h3>
                </a>
            </div>

            <div class="col-md-4 text-center mb-4">
                <a href="<?= base_url('/paciente/consultas/administrarConsultas'); ?>"
                    class="text-decoration-none text-dark">
                    <img src="https://cdn-icons-png.flaticon.com/512/4367/4367737.png" alt="administrarConsultas"
                        class="img-fluid" width="250" height="250">
                    <h3 class="mt-3">Administrar Consultas</h3>
                </a>
            </div>

            <div class="col-md-4 text-center mb-4">
                <a href="<?= base_url('/paciente/recetas/administrarRecetas'); ?>"
                    class="text-decoration-none text-dark">
                    <img src="https://images.vexels.com/media/users/3/144224/isolated/preview/589394662ba164058d2ac84b4a0643b2-notas-de-la-tabla-de-registros-medicos.png"
                        alt="administrarRecetas" class="img-fluid" width="250" height="250">
                    <h3 class="mt-3">Administrar Recetas</h3>
                </a>
            </div>
        </div>
    </div>