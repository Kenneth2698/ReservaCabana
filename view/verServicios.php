<!DOCTYPE html>
<html lang="en">

<?php
//include_once 'public/navbarAdmin.php';
?>

<body>
<div class="page-wrapper bg-gra-03 p-t-45 p-b-50">
    <h2 class="title">Lista de Servicios</h2>
    <div class="container">
        <table>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Descripcion</th>
            <th>Imagen</th>
            <th>Actualizar</th>
            <th>Eliminar</th>
        </tr>

        <?php foreach($vars['servicios'] as $servicio){  ?>
            <tr>
                <td><?php echo $servicio['servicioid']?></td>
                <td><?php echo $servicio['servicionombre']?></td>
                <td><?php echo $servicio['serviciodescripcion']?></td>
                <td><?php echo $servicio['servicioimagenruta']?></td>
                
   

                <form method="POST" action="?controlador=Servicio&accion=cargarActualizarServicio">

                    <input type="hidden" value="<?php echo $servicio['servicioid']?>" id="servicioid" name="servicioid">
                    <input type="hidden" value="<?php echo $servicio['servicionombre']?>" id="servicionombre" name="servicionombre">
                    <input type="hidden" value="<?php echo $servicio['serviciodescripcion']?>" id="serviciodescripcion" name="serviciodescripcion">
                    <input type="hidden" value="<?php echo $servicio['servicioimagenruta']?>" id="servicioimagenruta" name="servicioimagenruta">

                    <td>  <button type="submit">Actualizar</button></td>
                </form>
                
                <form method="POST" action="?controlador=Servicio&accion=eliminarServicio">

                    <input type="hidden" value="<?php echo $servicio['servicioid']?>" id="servicioid" name="servicioid">

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