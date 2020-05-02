<!DOCTYPE html>
<html lang="en">

<?php
//include_once 'public/navbarAdmin.php';
?>
<head>
    <!--jquery-->
    <script type="text/javascript" src="public/js/jquery-3.3.1.js"></script>
    <!--Javascript-->
    <script type="text/javascript" src="public/js/cliente.js"></script>
</head>

<body>
<div class="page-wrapper bg-gra-03 p-t-45 p-b-50">
    <h2 class="title">Crear Correo</h2>
    <div class="container">
        <form method="POST"  action="?controlador=Cliente&accion=insertarCorreo">
            <label for="correocriterio">correo</label>
            <br>            <br>
            <input type="text" id="correovalor" name="correovalor">
            <br>            <br>
            <button type="button" href="javascript:;" onclick="agregarValorCorreo($('#correovalor').val());return false;">Agregar a la lista</button>
            <br>            <br>
            <button type="submit">Crear</button>
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