<?php $session = \Config\Services::session(); ?>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" ><img src="<?= base_url('logo.png') ?>" alt="" height="100" width="100"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">

      <ul class="navbar-nav me-auto mb-16 mb-lg-16">
        <li class="nav-item">
          <?php if(($session->get('idPaciente')==NULL)):?>
            <?php if(($session->get('idMedico')==NULL)):?>
              <a class="nav-link " href="<?= base_url('index.php/administrador/pacientes/administrarPacientes') ?>" role="button">
                Administrar <br>Pacientes 🤒
              </a>
            <?php else:?>
              <a class="nav-link " href="<?= base_url('index.php/medico/pacientes/administrarPacientes') ?>" role="button">
                Administrar <br>Pacientes 🤒
              </a>
            <?php endif;?>
          <?php endif;?>
        </li>
      
        <li class="nav-item">   
        <?php if(($session->get('idPaciente')== NULL)):?>
            <?php if(($session->get('idMedico')==NULL)):?>
              <a class="nav-link " href="<?= base_url('index.php/administrador/medicos/administrarMedicos') ?>" role="button">
                Administrar <br>Médicos 🩺
              </a>
              
            <?php endif;?>
           
          <?php endif;?>

            <?php if(($session->get('idPaciente')> 0)):?>
                <a class="nav-link " href="<?= base_url('index.php/paciente/medicos/administrarMedicos') ?>" role="button">
                Administrar <br>Médicos 🩺
              </a>
            <?php endif;?>
          
        </li>
     
        <li class="nav-item">
        <?php if(($session->get('idPaciente')==NULL)):?>
            <?php if(($session->get('idMedico')==NULL)):?>
              <a class="nav-link " href="<?= base_url('index.php/administrador/consultas/administrarConsultas') ?>" role="button">
                Administrar <br>Consultas 🏥
              </a>
            <?php else:?>
              <a class="nav-link " href="<?= base_url('index.php/medico/consultas/administrarConsultas') ?>" role="button">
                Administrar <br>Consultas 🏥
              </a>
            <?php endif;?>
          <?php endif;?>

          <?php if(($session->get('idPaciente')> 0)):?>
            <a class="nav-link " href="<?= base_url('index.php/paciente/consultas/administrarConsultas') ?>" role="button">
                Administrar <br>Consultas 🏥
              </a>
            <?php endif;?>
          
        </li> 

        <li class="nav-item">
            <?php if(($session->get('idPaciente')==NULL)):?>
                <?php if(($session->get('idMedico')==NULL)):?>
                  <a class="nav-link " href="<?= base_url('index.php/administrador/recetas/administrarRecetas') ?>" role="button">
            Administrar <br>Recetas 📝
          </a>
            <?php else:?>
              <a class="nav-link " href="<?= base_url('index.php/medico/recetas/administrarRecetas') ?>" role="button">
            Administrar <br>Recetas 📝
          </a>
            <?php endif;?>
          <?php endif;?>

          <?php if(($session->get('idPaciente')> 0)):?>
            <a class="nav-link " href="<?= base_url('index.php/paciente/recetas/administrarRecetas') ?>" role="button">
            Administrar <br>Recetas 📝
          </a>
            <?php endif;?>
        </li> 

        <li class="nav-item">
        <?php if(($session->get('idPaciente')==NULL)):?>
                <?php if(($session->get('idMedico')==NULL)):?>
                  <a class="nav-link " href="<?= base_url('index.php/administrador/medicamentos/administrarMedicamentos') ?>" role="button">
            Administrar <br>Medicamentos 💊
          </a>              
            <?php endif;?>
          <?php endif;?>

          
         
        </li> 
      </ul>

      
      <form action="<?= base_url('/cerrarSesion');?>"  method="GET">
        <button class="btn btn-outline-success" type="submit">Cerrar Sesión</button>
      </form>
    </div>
  </div>
</nav>