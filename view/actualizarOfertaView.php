<!DOCTYPE html>
<html lang="en">

<?php
//include_once 'public/navbarAdmin.php';
?>

<body>
<div class="page-wrapper bg-gra-03 p-t-45 p-b-50">
    <h2 class="title">Actualizar Oferta</h2>
    <div class="container">
        <form method="POST"  action="?controlador=Oferta&accion=actualizarOferta">
            <label for="ofertanombre">Nombre de Oferta</label>
            <br>
            <input type="text" id="ofertanombre" name="ofertanombre" value=<?php echo $vars["ofertas"][1]?>>
            <br>
            <label for="ofertafechainicio">Fecha Inicio</label>
            <br>
            <input type="date" class="hide-replaced" id="ofertafechainicio" name="ofertafechainicio" value=<?php echo $vars["ofertas"][2]?>>
            <br>
            <label for="ofertafechafin">Fecha Final</label>
            <br>
            <input type="date" class="hide-replaced" id="ofertafechafin" name="ofertafechafin" value=<?php echo $vars["ofertas"][3]?>>
            <br>
            <label for="">Precio</label>
            <br>
            <input type="number" id="ofertaprecio" name="ofertaprecio" value=<?php echo $vars["ofertas"][4]?>>
            <br>
            <br>
            <input type="number" id="ofertaid" name="ofertaid" value=<?php echo $vars["ofertas"][0]?> hidden>
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