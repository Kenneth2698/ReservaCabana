<!DOCTYPE html>
<html lang="en">

<?php
//include_once 'public/navbarAdmin.php';
?>

<body>
    <div class="page-wrapper bg-gra-03 p-t-45 p-b-50">
        <h2 class="title">Seleccionar cabana</h2>
        <div class="container">
            <form method="POST" action="?controlador=Actividad&accion=cargarActividades">
                <label for="select_cabanas">Cabana asociada al servicio</label>
                <br>
                <select name="select_cabanas" id="select_cabanas">
                    <?php
                    foreach ($vars['cabanas'] as $row) { ?>
                        <option value="<?php echo $row[0] ?>"><?php echo $row[1] ?></option>
                    <?php

                    } ?>
                </select>
            <br><br>

                    <button type="submit">Solicitar</button>
            </form>
        </div>
    </div>


    <script src="public/vendor/jquery/jquery.min.js"></script>
    <script src="public/vendor/select2/select2.min.js"></script>
    <script src="public/vendor/datepicker/moment.min.js"></script>
    <script src="public/vendor/datepicker/daterangepicker.js"></script>
    <script src="public/js/global.js"></script>
</body>

</html>