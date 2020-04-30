<!DOCTYPE html>
<html lang="en">

<?php
//include_once 'public/navbarAdmin.php';
?>

<body>
<div class="page-wrapper bg-gra-03 p-t-45 p-b-50">
    <h2 class="title">Actualizar Cliente</h2>
    <div class="container">
        <form method="POST"  action="?controlador=Cliente&accion=actualizarCliente">
            <input type="hidden" value="<?php echo $vars->getId()?>" id="clienteid" name="clienteid">   
            <label for="clientenombrecompleto">Nombre del cliente</label>
            <br>
            <input type="text" id="clientenombrecompleto" name="clientenombrecompleto" value="<?php echo $vars->getNombre()?>">
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