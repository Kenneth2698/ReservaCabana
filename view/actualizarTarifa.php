<!DOCTYPE html>
<html lang="en">

<?php
//include_once 'public/navbarAdmin.php';
?>

<body>
<div class="page-wrapper bg-gra-03 p-t-45 p-b-50">
    <h2 class="title">Actualizar Correo</h2>
    <div class="container">
        <form method="POST"  action="?controlador=Cabana&accion=actualizarTarifa">
        <input type="hidden" value="<?php echo $vars['idtarifa']?>" id="cabanatarifaid" name="cabanatarifaid">
        <label for="cabananombre"><?php echo $vars['cabana']?></label>
        <br>
        <br>
        <label for="cabanatarifamonto">Monto Tarifa</label>
        <br>
        <input type="number" value="<?php echo $vars['monto']?>" id="cabanatarifamonto" name="cabanatarifamonto"> 
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
<!-- end document-->