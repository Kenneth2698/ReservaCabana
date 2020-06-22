<!DOCTYPE html>
<html lang="en">

<?php
//include_once 'public/navbarAdmin.php';
?>

<body>
    <div class="page-wrapper bg-gra-03 p-t-45 p-b-50">
        <h2 class="title">Actualizar actividad extra para complemento de cabana</h2>
        <div class="container">
            <form method="POST" action="?controlador=Actividad&accion=actualizarActividad" enctype="multipart/form-data">
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
            <input type="text" id="actividadid" name="actividadid" value="<?php echo $vars["a"][0]["actividadid"]?>" hidden>
            <label for="">Nombre del dueno del servicio</label>
            <br>
            <br>
            <input type="text" id="duenoactividad" name="duenoactividad" value="<?php echo $vars["a"][0]["actividaddueno"]?>">
            <br><br>
            <label for="">Nombre del servicio</label>
            <br><br>
            <input type="text" id="nombreactividad" name="nombreactividad" value="<?php echo $vars["a"][0]["actividadnombre"]?>">
            <br><br>
            <label for="">Descripcion</label>
            <br><br>
            <input type="text" id="descripcionactividad" name="descripcionactividad" value="<?php echo $vars["a"][0]["actividaddescripcion"]?>">
            <br><br>
            <label for="">Precio</label>
            <br><br>
            ₡<input type="number" id="precioactividad" name="precioactividad" value="<?php echo $vars["a"][0]["actividadprecio"]?>">
            <br><br>
            <h3>Seleccione las 2 imagenes para actualizar, o bien no seleccione ninguna si desea mantener las imagenes actuales</h3>
            <br><br>
            <label for="">Imagen 1 actual</label>
            <br><br>
            <?php ?>
            <img src=<?php echo "./public/imgs/".$vars["a"][0]["actividadimagen1"] ?> alt="" width="200px" height="200px">
            <br><br>
            <input type="text" id="imagen" name="imagen" value="<?php echo $vars["a"][0]["actividadimagen1"]?>" hidden>
            <input type="file" id="imagenactividad" name="imagenactividad">
            <br><br>
            <label for="">Imagen 2 actual</label>
            <br><br>
            <?php ?>
            <img src=<?php echo "./public/imgs/".$vars["a"][0]["actividadimagen2"] ?> alt="" width="200px" height="200px">
            <br><br>
            <input type="text" id="imagen2" name="imagen2" value="<?php echo $vars["a"][0]["actividadimagen2"]?>" hidden>
            <input type="file" id="imagenactividad2" name="imagenactividad2">
            
            <br><br>
                    <button type="submit">Actualizar</button>
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