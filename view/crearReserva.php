<!DOCTYPE html>
<html lang="en">

<?php
//include_once 'public/navbarAdmin.php';
?>

<body>
<div class="page-wrapper bg-gra-03 p-t-45 p-b-50">
    <h2 class="title">Crear nueva Reserva</h2>
    <div class="container">
        <form method="POST"  action="?controlador=Reserva&accion=cargarSeleccionarClienteReserva">
            <label for="">Seleccione la cabana</label>
            <br>
            <select name="select_cabanas" id="select_cabanas">
                    <?php foreach($vars['cabanas'] as $cabana){?>
                        <option value="<?php echo $cabana[0]?>"><?php echo $cabana[1]?></option>
                    <?php }?>
            </select>
            <br>
            <br>
            <label for="">Seleccione la fecha de inicio</label>
            <br>
            <input type="date" id="fechaInicio" name="fechaInicio">
            <br>
            <br>
            <label for="">Seleccione la fecha de salida</label>
            <br>
            <input type="date" id="fechaFinal" name="fechaFinal">
            <br>
            <br>
            <label for="">Hora de llegada</label>
            <input type="time" id="horaInicio" name="horaInicio">
            <br>
            <br>
            <label for="">Hora de salida</label>
            <input type="time" id="horaFinal" name="horaFinal">
            <br><br>
            <label for="">Cantidad de personas</label>
            <br>
            <input type="number" id="cantidadPersonas" name="cantidadPersonas">
            <br><br>
            <label for="">Tipo de pago</label>
            <br>
            <select name="tipoPago" id="tipoPago">
                <option value="tarjeta">Tarjeta</option>
                <option value="efectivo">Efectivo</option>
            </select>
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