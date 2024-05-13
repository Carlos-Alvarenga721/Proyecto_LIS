<?php
require ('inc/essentials.php');
adminLogin();
session_regenerate_id(true);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Dashboard</title>
    <?php require('inc/links.php');?>

</head>
<body class="bg-light">

    <?php require('inc/header.php'); ?>

    <div class="container-fluid" id="main-content">
        <form action="updateOrEliminateSelected.php" method="post">
            <div class="row">
              <div class="col-lg-10 ms-auto p-4 overflow-hidden">
                <label class="form-label" style="font-weight: 500;">ID</label>
                <select class="form-select" name="reservationSelect" id="reservationSelect">
                  <option selected>Seleccione la id</option>
                </select>
              </div>
            </div>
            <div class="row" id="reservationDetails"> 
                <div class="col-lg-10 ms-auto p-4 overflow-hidden">
                    <div class="row align-items-end">
                      <div class="col-lg-3 mb-3">
                        <label class="form-label" style="font-weight: 500;">Fecha de entrada</label>
                        <input type="date" class="form-control shadow-none" name="check_in" id="check_in" min="<?php echo date('Y-m-d'); ?>">
                      </div>
                      <div class="col-lg-3 mb-3">
                        <label class="form-label" style="font-weight: 500;">Fecha de Salida</label>
                        <input type="date" class="form-control shadow-none" name="check_out" id="check_out" min="<?php echo date('Y-m-d'); ?>">
                      </div>
                      <div class="col-lg-2 mb-3">
                        <label class="form-label" style="font-weight: 500;">Adultos</label>
                        <select class="form-select shadow-none" name="adult" id="adult">
                          <option value="1" selected>1</option>
                          <option value="2">2</option>
                          <option value="3">3</option>
                        </select>
                      </div>
                      <div class="col-lg-2 mb-3">
                        <label class="form-label" style="font-weight: 500;">Menores</label>
                        <select class="form-select shadow-none" name="children" id="children">
                          <option value="0" selected>0</option>
                          <option value="1">1</option>
                          <option value="2">2</option>
                          <option value="3">3</option>
                        </select>
                      </div>
                      <div class="col-lg-1 mb-lg-3 mt-2">
                        <button type="submit" class="btn btn-primary shadow-none" id="btnCambiar" name="btnCambiar" hidden>Actualizar</button>
                      </div>
                      <div class="col-lg-1 mb-lg-3 mt-2">
                        <button type="submit" class="btn btn-danger shadow-none" id="btnEliminar" name="btnEliminar" hidden>Eliminar</button>
                      </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-10 ms-auto p-4 overflow-hidden">
                <button type="button" class="btn btn-success mb-3" style="float: right;" id="updateButton">Actualizar datos</button>
                
                <!-- Carga de datos al recargar pagina -->
                <?php require('tomaDatos.php');?>

                <!-- Script para actualizar la tabla al recargar o al darle al boton -->
                <script src="js/updateTable.js"></script>

            </div>
        </div>
    </div>

    <?php require('inc/scripts.php');?>
    <!-- Toma de datos al seleccionar el id -->
    <script src="js/registroEspecifico.js"></script>

    <!-- Validacion fechas -->
    <script src="js/validacionFechas.js"></script>

</body>
</html>