<!DOCTYPE html>
<html lang="en">

<body>
<?php
//include_once 'public/navbarAdmin.php';
?>

<div class="page-wrapper bg-gra-03 p-t-45 p-b-50" >
    <form method="POST" action="?controlador=Usuario&accion=inicioSesion">

    <h3>Usuario</h3>
    <input class="input--style-5" type="text" id="usuario" name="usuario">

    <h3>Contraseña</h3>
    <input class="input--style-5" type="password"  id="contra" name="contra">

    <button class="btn btn--radius-2 btn--red" type="submit">Ingresar</button>
    </form>
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