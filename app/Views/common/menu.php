
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">SISTEMA GESTOR DE CONSULTORIOS</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Opciones
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="<?= base_url('index.php/administrador/administrarPacientes');?>">Administrar Pacientes</a></li>
            <li><a class="dropdown-item" href="<?= base_url('index.php/administrador/administrarMedicos');?>">Administrar Médicos</a></li>
            <li><a class="dropdown-item" href="<?= base_url('index.php/administrador/administrarMedicamentos');?>">Administrar Medicamentos</a></li>
          </ul>
        </li>

      </ul>
      <form action="<?= base_url('index.php/');?>" method="GET">
        <button class="btn btn-outline-success" type="submit">Cerrar Sesión</button>
      </form>
    </div>
  </div>
</nav>