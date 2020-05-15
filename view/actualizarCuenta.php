<!DOCTYPE html>
<html lang="en">

<?php
//include_once 'public/navbarAdmin.php';
?>

<body>
<div class="page-wrapper bg-gra-03 p-t-45 p-b-50">
    <h2 class="title">Actualizar Cuenta</h2>
    <div class="container">
        <form method="POST"  action="?controlador=Cabana&accion=actualizarCuenta">
            <label for="">Numero de cuenta</label>
            <br>
            <input type="text" id="cuenta" name="cuenta" value="<?php echo $vars['cuenta']?>">
            <input type="text" hidden value="<?php echo $vars['id']?>" id="idCuenta" name="idCuenta">
            <br>
            <label for="">Estado de cuenta</label>
            <br>
            <select name="estado" id="estado">
                <option value="<?php echo $vars['estado']?>" disabled>Valor anterior: <?php echo $vars['estado']?> </option>
                <option value="activa">Activa</option>
                <option value="desactiva">Desactiva</option>
            </select>
            <br>
            <label for="">Banco</label>
            <br>
            <input type="text" value="<?php echo $vars['banco']?>" id="banco" name="banco">
            <br><br>
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