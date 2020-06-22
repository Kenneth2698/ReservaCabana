<!DOCTYPE html>
<html lang="en">

<?php
//include_once 'public/navbarAdmin.php';
?>

<body>
<div class="page-wrapper bg-gra-03 p-t-45 p-b-50">
    <h2 class="title">Lista de Montos Tarifas</h2>
    <div class="container">
        <table>
        <tr>
            <th>ID</th>
            <th>Cabana</th>
            <th>Monto Tarifa</th>
        </tr>

        <?php foreach($vars['tarifas'] as $tarifa){  ?>
            <tr>
                <td><?php echo $tarifa['cabanatarifaid']?></td>
                <td><?php echo $tarifa['cabananombre']?></td>
                <td>₡<?php echo $tarifa['cabanatarifamonto']?></td>
                
   

                <form method="POST" action="?controlador=Cabana&accion=cargarActualizarTarifa">

                    <input type="hidden" value="<?php echo $tarifa['cabanatarifaid']?>" id="cabanatarifaid" name="cabanatarifaid">
                    <input type="hidden" value="<?php echo $tarifa['cabananombre']?>" id="cabananombre" name="cabananombre">
                    <input type="hidden" value="<?php echo $tarifa['cabanatarifamonto']?>" id="cabanatarifamonto" name="cabanatarifamonto">

                    <td>  <button type="submit">Actualizar</button></td>
                </form>
                
                <form method="POST" action="?controlador=Cabana&accion=eliminarTarifa">

                    <input type="hidden" value="<?php echo $tarifa['cabanatarifaid']?>" id="cabanatarifaid" name="cabanatarifaid">

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