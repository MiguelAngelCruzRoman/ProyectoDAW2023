
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
            Cambiar Vista de Usuario
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="<?= base_url('index.php/administrador/index');?>">Administrador</a></li>
            <li><a class="dropdown-item" href="<?= base_url('index.php/medico/index');?>">Médico</a></li>
            <li><a class="dropdown-item" href="<?= base_url('');?>">Paciente</a></li>
          </ul>
        </li>


      </ul>
      <form action="<?= base_url('index.php/');?>" method="GET">
        <button class="btn btn-outline-success" type="submit">Cerrar Sesión</button>
      </form>
    </div>
  </div>
</nav>