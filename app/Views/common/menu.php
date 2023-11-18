
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"><img src="https://o.remove.bg/downloads/eede4a61-f629-44b2-9dea-aa94b7bd9c54/_34319089-9a1a-497b-a538-ba605c3af6d2-removebg-preview.png" alt="" height="100" width="100"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">

      <ul class="navbar-nav me-auto mb-16 mb-lg-16">
        <li class="nav-item">
          <a class="nav-link " href="<?= base_url('index.php/administrador/administrarPacientes') ?>" role="button">
            Administrar <br>Pacientes 🤒
          </a>
        </li>
      
        <li class="nav-item">   
          <a class="nav-link " href="<?= base_url('index.php/administrador/administrarMedicos') ?>" role="button">
            Administrar <br>Médicos 🩺
          </a>
        </li>
    
        <li class="nav-item">
          <a class="nav-link " href="<?= base_url('index.php/administrador/administrarMedicamentos') ?>" role="button">
            Administrar <br>Medicamentos 💊
          </a>
        </li> 
     
        <li class="nav-item">
          <a class="nav-link " href="<?= base_url('index.php/administrador/administrarMedicamentos') ?>" role="button">
            Administrar <br>Consultas 🏥
          </a>
        </li> 

        <li class="nav-item">
          <a class="nav-link " href="<?= base_url('index.php/administrador/administrarMedicamentos') ?>" role="button">
            Administrar <br>Recetas 📝
          </a>
        </li> 
      </ul>

      <form action="<?= base_url('index.php/');?>" method="GET">
        <button class="btn btn-outline-success" type="submit">Cerrar Sesión</button>
      </form>
    </div>
  </div>
</nav>