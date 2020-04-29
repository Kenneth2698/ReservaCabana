<!DOCTYPE html>
<html lang="en">

<?php
//include_once 'public/navbarAdmin.php';
?>

<body>
<div class="page-wrapper bg-gra-03 p-t-45 p-b-50">
    <h2 class="title">Actualizar Servicio</h2>
    <div class="container">
        <form method="POST"  action="?controlador=Servicio&accion=actualizarServicio">
            <input type="hidden" value="<?php echo $vars->getId()?>" id="servicioid" name="servicioid">   
            <label for="nombreservicio">Nombre del servicio</label>
            <br>
            <input type="text" id="servicionombre" name="servicionombre" value="<?php echo $vars->getNombre()?>">
            <br>
            <label for="serviciodescripcion">Descripcion del servicio</label>
            <br>
            <input type="text" id="serviciodescripcion" name="serviciodescripcion" value="<?php echo $vars->getDescripcion()?>">
            <br>
            <label for="servicioimagenruta">Imagen</label>
            <br>
            <input type="text" id="servicioimagenruta" name="servicioimagenruta" value="<?php echo $vars->getImagen()?>">
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