<!DOCTYPE html>
<html lang="en">

<?php
//include_once 'public/navbarAdmin.php';
?>

<body>
<div class="page-wrapper bg-gra-03 p-t-45 p-b-50">
    <h2 class="title">Lista de Clientes</h2>
    <div class="container">
        <table>
        <tr>
            <th>ID</th>
            <th>Cabana</th>
            <th>Codigo</th>
            <th>Fecha Inicio</th>
            <th>Fecha Final</th>
            <th>Hora inicio</th>
            <th>Hora final</th>
            <th>Cantidad personas</th>
            <th>Tipo pago</th>
            <th>Id Cliente</th>

        </tr>

        <?php foreach($vars['reservas'] as $reserva){  ?>
            <tr>
                <td><?php echo $reserva['reservaid']?></td>
                <td><?php echo $reserva['cabanaid']?></td>
                <td><?php echo $reserva['reservacodigo']?></td>
                <td><?php echo $reserva['reservafechainicio']?></td>
                <td><?php echo $reserva['reservafechafin']?></td>
                <td><?php echo $reserva['reservahorainicio']?></td>
                <td><?php echo $reserva['reservahorafin']?></td>
                <td><?php echo $reserva['reservacantidadpersonas']?></td>
                <td><?php echo $reserva['reservatipopago']?></td>
                <td><?php echo $reserva['reservaclienteid']?></td>

                <form method="POST" action="?controlador=Reserva&accion=cargarActualizarReserva">

                    <input type="hidden" value="<?php echo $reserva['reservaid']?>" id="reservaid" name="reservaid">

                    <td>  <button type="submit">Actualizar</button></td>
                </form>
                
                <form method="POST" action="?controlador=Reserva&accion=eliminarReserva">

                    <input type="hidden" value="<?php echo $reserva['reservaid']?>" id="reservaid" name="reservaid">

                    <td>  <button type="submit">Eliminar</button></td>
                </form>

            </tr>
        <?php }?>
        </table>
        

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