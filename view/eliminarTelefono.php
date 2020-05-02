<!DOCTYPE html>
<html lang="en">

<?php
//include_once 'public/navbarAdmin.php';
?>

<body>
<div class="page-wrapper bg-gra-03 p-t-45 p-b-50">
    <h2 class="title">Eliminar Telefono</h2>
    <div class="container">
        <form method="POST"  action="?controlador=Cliente&accion=eliminarTelefono">
            <label for="select_clientes">Elija un numero a eliminar</label>
            <br>
            <select name="select_telefono" id="select_telefono">
            <?php
                            $i = 0;
                            foreach ($vars['telefonos_cliente'] as $row) { ?>   
                                <option value="<?php echo $i ?>"><?php echo $row ?></option>                              
                            <?php

                           $i++; } ?>
            </select>
            <br>
            <br>
            <button type="submit">Seleccionar</button>
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