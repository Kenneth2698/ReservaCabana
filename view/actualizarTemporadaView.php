<!DOCTYPE html>
<html lang="en">

<?php
//include_once 'public/navbarAdmin.php';
?>

<body>
<div class="page-wrapper bg-gra-03 p-t-45 p-b-50">
    <h2 class="title">Actualizar Temporada</h2>
    <div class="container">
        <form method="POST"  action="?controlador=Temporada&accion=actualizarTemporada">
            <input type="hidden" value="<?php echo $vars->getId()?>" id="tbtemporadaid" name="tbtemporadaid">   
            <label for="tbtemporadanombre">Nombre Temporada</label>
            <br>
            <input type="text" id="tbtemporadanombre" name="tbtemporadanombre" value="<?php echo $vars->getNombre()?>">
            <br>
            <label for="tbtemporadafechainicio">Fecha Inicio Temporada</label>
            <br>
            <input type="text" id="tbtemporadafechainicio" name="tbtemporadafechainicio" value="<?php echo $vars->getFechaInicio()?>">
            <br>
            <label for="tbtemporadafechafinal">Fecha Final Temporada</label>
            <br>
            <input type="text" id="tbtemporadafechafinal" name="tbtemporadafechafinal" value="<?php echo $vars->getFechaFinal()?>">
            <br>
            <button type="submit">Actualizar</button>
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
<!-- final -->