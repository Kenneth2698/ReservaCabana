<!DOCTYPE html>
<html lang="en">

<?php
//include_once 'public/navbarAdmin.php';
?>

<body>
    <div class="page-wrapper bg-gra-03 p-t-45 p-b-50">
        <h2 class="title">Crear actividad extra para complemento de cabana</h2>
        <div class="container">
            <form method="POST" action="?controlador=Actividad&accion=crearActividad" enctype="multipart/form-data">
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
            <label for="">Nombre del dueno del servicio</label>
            <br>
            <br>
            <input type="text" id="duenoactividad" name="duenoactividad">
            <br><br>
            <label for="">Nombre del servicio</label>
            <br><br>
            <input type="text" id="nombreactividad" name="nombreactividad">
            <br><br>
            <label for="">Descripcion</label>
            <br><br>
            <input type="text" id="descripcionactividad" name="descripcionactividad">
            <br><br>
            <label for="">Precio</label>
            <br><br>
            <input type="number" id="precioactividad" name="precioactividad">
            <br><br>
            <label for="">Imagen</label>
            <br><br>
            <input type="file" id="imagenactividad" name="imagenactividad">
            <br><br>
            <label for="">Imagen 2</label>
            <br><br>
            <input type="file" id="imagenactividad2" name="imagenactividad2">
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