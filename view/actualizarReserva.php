<!DOCTYPE html>
<html lang="en">

<?php
//include_once 'public/navbarAdmin.php';
?>

<body>
<div class="page-wrapper bg-gra-03 p-t-45 p-b-50">
    <h2 class="title">Actualizar Reserva</h2>
    <div class="container">
        <form method="POST"  action="?controlador=Reserva&accion=actualizarReserva">
            <label for="">Seleccione la fecha de inicio</label>
            <input type="text" id="reservaid" name="reservaid" value="<?php echo $vars['reserva_actualizar'][0][0]?>" hidden>
            <input type="text" id="clienteid" name="clienteid" value="<?php echo $vars['reserva_actualizar'][0][1]?>" hidden>
            <br>
            <input type="date" id="fechaInicio" name="fechaInicio" value="<?php echo $vars['reserva_actualizar'][0][2]?>">
            <br>
            <br>
            <label for="">Seleccione la fecha de salida</label>
            <br>
            <input type="date" id="fechaFinal" name="fechaFinal" value="<?php echo $vars['reserva_actualizar'][0][3]?>">
            <br>
            <br>
            <label for="">Hora de llegada</label>
            <input type="time" id="horaInicio" name="horaInicio" value="<?php echo $vars['reserva_actualizar'][0][4]?>">
            <br>
            <br>
            <label for="">Hora de salida</label>
            <input type="time" id="horaFinal" name="horaFinal" value="<?php echo $vars['reserva_actualizar'][0][5]?>">
            <br><br>
            <label for="">Cantidad de personas</label>
            <br>
            <input type="number" id="cantidadPersonas" name="cantidadPersonas" value="<?php echo $vars['reserva_actualizar'][0][6]?>">
            <br><br>
            <button type="submit">Continuar</button>
        </form>

    </div>
</div>

<!-- Jquery JS-->
<script src="public/vendor/jquery/jquery.min.js"></script>
<!-- Vendor JS-->
<script src="public/vendor/select2/select2.min.js"></script>
<script src="public/vendor/datepicker/moment.min.js"></script>
<script src="public/vendor/datepicker/daterangepicker.js"></script>

<!-- Main JS-->
<script src="public/js/global.js"></script>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->