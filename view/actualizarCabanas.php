<!DOCTYPE html>
<html lang="en">

<?php
//include_once 'public/navbarAdmin.php';
?>

<body>
<div class="page-wrapper bg-gra-03 p-t-45 p-b-50">
    <h2 class="title">Actualizar Cabaña</h2>
    <div class="container">
        <form method="POST"  action="?controlador=Cabana&accion=actualizarCabana">
            <input type="hidden" value="<?php echo $vars->getId()?>" id="cabanaid" name="cabanaid">   
            <label for="cabananombre">Nombre de la cabaña</label>
            <br>
            <input type="text" id="cabananombre" name="cabananombre" value="<?php echo $vars->getNombre()?>">
            <br>
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