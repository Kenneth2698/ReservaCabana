<!DOCTYPE html>
<html lang="en">

<?php
//include_once 'public/navbarAdmin.php';
?>

<body>
<div class="page-wrapper bg-gra-03 p-t-45 p-b-50">
    <h2 class="title">Lista de Temporadas</h2>
    <div class="container">
        <table>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Fecha Inicio</th>
            <th>Fecha Final</th>
            <th>Actualizar</th>
            <th>Eliminar</th>
        </tr>

        <?php foreach($vars['temporadas'] as $temporada){  ?>
            <tr>
                <td><?php echo $temporada['tbtemporadaid']?></td>
                <td><?php echo $temporada['tbtemporadanombre']?></td>
                <td><?php echo $temporada['tbtemporadafechainicio']?></td>
                <td><?php echo $temporada['tbtemporadafechafinal']?></td>
                
   

                <form method="POST" action="?controlador=Temporada&accion=cargarActualizarTemporada">

                    <input type="hidden" value="<?php echo $temporada['tbtemporadaid']?>" id="tbtemporadaid" name="tbtemporadaid">
                    <input type="hidden" value="<?php echo $temporada['tbtemporadanombre']?>" id="tbtemporadanombre" name="tbtemporadanombre">
                    <input type="hidden" value="<?php echo $temporada['tbtemporadafechainicio']?>" id="tbtemporadafechainicio" name="tbtemporadafechainicio">
                    <input type="hidden" value="<?php echo $temporada['tbtemporadafechafinal']?>" id="tbtemporadafechafinal" name="tbtemporadafechafinal">

                    <td>  <button type="submit">Actualizar</button></td>
                </form>
                
                <form method="POST" action="?controlador=Temporada&accion=eliminarTemporada">

                    <input type="hidden" value="<?php echo $temporada['tbtemporadaid']?>" id="tbtemporadaid" name="tbtemporadaid">

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