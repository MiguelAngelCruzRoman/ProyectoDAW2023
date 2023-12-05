<?php $session = \Config\Services::session(); ?>
<nav class="navbar navbar-expand-lg" style="background-color: #02253d">

  <div class="container-fluid">
    <a class="navbar-brand"><img src="<?= base_url('logo.jpg') ?>" alt="" height="80" width="80"
        style="background-color:#FFFFFF;  border-radius: 50%;"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">

      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <?php if (($session->get('idPaciente') == NULL)): ?>
            <?php if (($session->get('idMedico') == NULL)): ?>
              <a class="nav-link " href="<?= base_url('index.php/administrador/pacientes/administrarPacientes') ?>"
                role="button">
                Pacientes 🤒
              </a>
            <?php else: ?>
              <a class="nav-link " href="<?= base_url('index.php/medico/pacientes/administrarPacientes') ?>" role="button">
                Pacientes 🤒
              </a>
            <?php endif; ?>
          <?php endif; ?>
        </li>

        <li class="nav-item">
          <?php if (($session->get('idPaciente') == NULL)): ?>
            <?php if (($session->get('idMedico') == NULL)): ?>
              <a class="nav-link " href="<?= base_url('index.php/administrador/medicos/administrarMedicos') ?>"
                role="button">
                Médicos 🩺
              </a>

            <?php endif; ?>

          <?php endif; ?>

          <?php if (($session->get('idPaciente') > 0)): ?>
            <a class="nav-link " href="<?= base_url('index.php/paciente/medicos/administrarMedicos') ?>" role="button">
              Médicos 🩺
            </a>
          <?php endif; ?>

        </li>

        <li class="nav-item">
          <?php if (($session->get('idPaciente') == NULL)): ?>
            <?php if (($session->get('idMedico') == NULL)): ?>
              <a class="nav-link " href="<?= base_url('index.php/administrador/consultas/administrarConsultas') ?> "
                role="button">
                Consultas 🏥
              </a>
            <?php else: ?>
              <a class="nav-link " href="<?= base_url('index.php/medico/consultas/administrarConsultas') ?>" role="button">
                Consultas 🏥
              </a>
            <?php endif; ?>
          <?php endif; ?>

          <?php if (($session->get('idPaciente') > 0)): ?>
            <a class="nav-link " href="<?= base_url('index.php/paciente/consultas/administrarConsultas') ?>"
              role="button">
              Consultas 🏥
            </a>
          <?php endif; ?>

        </li>

        <li class="nav-item">
          <?php if (($session->get('idPaciente') == NULL)): ?>
            <?php if (($session->get('idMedico') == NULL)): ?>
              <a class="nav-link " href="<?= base_url('index.php/administrador/recetas/administrarRecetas') ?>"
                role="button">
                Recetas 📝
              </a>
            <?php else: ?>
              <a class="nav-link " href="<?= base_url('index.php/medico/recetas/administrarRecetas') ?>" role="button">
                Recetas 📝
              </a>
            <?php endif; ?>
          <?php endif; ?>

          <?php if (($session->get('idPaciente') > 0)): ?>
            <a class="nav-link " href="<?= base_url('index.php/paciente/recetas/administrarRecetas') ?>" role="button">
              Recetas 📝
            </a>
          <?php endif; ?>
        </li>

        <li class="nav-item">
          <?php if (($session->get('idPaciente') == NULL)): ?>
            <?php if (($session->get('idMedico') == NULL)): ?>
              <a class="nav-link " href="<?= base_url('index.php/administrador/medicamentos/administrarMedicamentos') ?>"
                role="button">
                Medicamentos 💊
              </a>
            <?php endif; ?>
          <?php endif; ?>
        </li>
      </ul>


      <form action="<?= base_url('/cerrarSesion'); ?>" method="GET">
        <button class="btn btn-danger" type="submit">Cerrar Sesión</button>
      </form>
      <ul></ul>
    </div>
  </div>
</nav>