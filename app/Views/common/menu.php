
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"><img src="https://o.remove.bg/downloads/d8a50590-bc21-4f97-9e19-1a98aee95d33/OIG-removebg-preview.png" alt="" height="100" width="100"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">

      <a class="nav-link " href="<?= base_url('index.php/administrador/administrarPacientes') ?>" role="button">
        Administrar Pacientes 🤒
      </a>

      <a class="nav-link " href="<?= base_url('index.php/administrador/administrarMedicos') ?>" role="button">
        Administrar Médicos 🩺
      </a>
        

      <a class="nav-link " href="<?= base_url('index.php/administrador/administrarMedicamentos') ?>" role="button">
        Administrar Medicamentos 💊
      </a>
        
        
      </ul>
      <form action="<?= base_url('index.php/');?>" method="GET">
        <button class="btn btn-outline-success" type="submit">Cerrar Sesión</button>
      </form>
    </div>
  </div>
</nav>