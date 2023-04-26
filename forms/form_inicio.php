<?php
require_once("../global/header.php");
$tipoUsuario = $_SESSION['idTipoUsuario'];
$nombresUsuario = $_SESSION['nombreUsuario'];
$apellidosUsuario = $_SESSION['apellidoUsuario'];
?>
      <div class="container my-5">
        <div class="row p-4 align-items-center rounded-3 border shadow-lg">
          <div class="col-lg-7 p-3 p-lg-5 pt-lg-3">
            <h1 class="display-4 fw-bold lh-1 text-body-emphasis"><?=$nombresUsuario?> <?=$apellidosUsuario?> te damos la bienvenida al sistema.</h1>
            <p class="lead">SEEER es un sistema de registros de solicitudes, ratificacioones, audiencias, para tener un control de los movimientos que se realizan y asi poder graficarlos y mostrarlos en el sitio web del Centro de Conciliación Laboral del Estado de Michoacán.</p>
            <div class="d-grid gap-2 d-md-flex justify-content-md-start mb-4 mb-lg-3 btnAltaSolicitante">
              <button type="button" class="btn-lg px-4 me-md-2 fw-bold" onclick="abrirPopupAltaSolicitante();"><i class='bx bxs-user-plus'></i> Agregar Solicitante</button>
              <!-- <button type="button" class="btn btn-outline-secondary btn-lg px-4">Default</button> -->
            </div>
          </div>
          <div class="col-lg-4 offset-lg-1 p-0 overflow-hidden imgInicio">
              <img class="rounded-lg-3" src="../images/ser.png">
          </div>
        </div>
      </div>

      <div class="row">
        <div><center> <h1>Movimietos de las sedes CCLMichoacán</h1> </center></div>
        <br><br><br><br>
        <div class="col-lg-4">
          <center><h2>Morelia</h1></center>
          <canvas id="graficaMorelia"></canvas>
        </div>
        <div class="col-lg-4">
          <center><h2>Zamora</h1></center>
          <canvas id="graficaZamora"></canvas>
        </div>
        <div class="col-lg-4">
          <center><h2>Uruapan</h1></center>
          <canvas id="graficaUruapan"></canvas>
        </div>
      </div>
      

      <script>
        const ctxMorelia = document.getElementById('graficaMorelia');
        const ctxZamora = document.getElementById('graficaZamora');
        const ctxUruapan = document.getElementById('graficaUruapan');


        new Chart(ctxMorelia, {
          type: 'bar',
          data: {
            labels: [''],
            datasets: [
              {
                label: 'Solicitudes',
                data: [120],
                backgroundColor: ['#d3a929'],
                borderWidth: 5
              },
              {
                label: 'Ratificaciones',
                data: [150],
                backgroundColor: ['#476162'],
                borderWidth: 5
              },
              {
                label: 'Audiencias',
                data: [110],
                backgroundColor: ['#809798'],
                borderWidth: 5
              }
            ]
          },
          options: {
            scales: {
              y: {
                beginAtZero: true
              }
            }
          }
        });


        
        new Chart(ctxZamora, {
          type: 'bar',
          data: {
            labels: [''],
            datasets: [
              {
                label: 'Solicitudes',
                data: [120],
                backgroundColor: ['#6f1c46'],
                borderWidth: 5
              },
              {
                label: 'Ratificaciones',
                data: [150],
                backgroundColor: ['#f9c3d0'],
                borderWidth: 5
              },
              {
                label: 'Audiencias',
                data: [110],
                backgroundColor: ['#512d36'],
                borderWidth: 5
              }
            ]
          },
          options: {
            scales: {
              y: {
                beginAtZero: true
              }
            }
          }
        });


        

        new Chart(ctxUruapan, {
          type: 'bar',
          data: {
            labels: [''],
            datasets: [
              {
                label: 'Solicitudes',
                data: [120],
                backgroundColor: ['#686667'],
                borderWidth: 5
              },
              {
                label: 'Ratificaciones',
                data: [150],
                backgroundColor: ['#808798'],
                borderWidth: 5
              },
              {
                label: 'Audiencias',
                data: [110],
                backgroundColor: ['#d3a929'],
                borderWidth: 5
              }
            ]
          },
          options: {
            scales: {
              y: {
                beginAtZero: true
              }
            }
          }
        });
      </script>
<?php
require_once("../global/footer.php");
?>