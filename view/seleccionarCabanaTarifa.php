<!DOCTYPE html>
<html lang="en">

<?php
//include_once 'public/navbarAdmin.php';
?>

<body>
<div class="page-wrapper bg-gra-03 p-t-45 p-b-50">
    <h2 class="title">Crear Tarifa</h2>
    <div class="container">
        <form method="POST"  action="?controlador=Cabana&accion=insertarTarifa">
            <label for="select_cabanas">Seleccionar cabaña para Tarifa:</label>
            <br>
            <select name="select_cabanas" id="select_cabanas">
            <?php
                            foreach ($_SESSION['lista_cabanas'] as $row) { ?>   
                                <option value="<?php echo $row[0] ?>"><?php echo $row[1] ?></option>                              
                            <?php

                            } ?>
            </select>
            <br>
            <label for="tarifamonto">Monto de la Tarifa:</label>
            <br>
            <input type="number" id="tarifamonto" name="tarifamonto">
            <br>
            <br>
            <button type="submit">Crear Tarifa</button>
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