<!DOCTYPE html>
<html lang="en">


<script type="text/javascript" src="public/js/jquery-3.3.1.js"></script>

<script type="text/javascript" src="public/js/scriptK.js"></script>

<?php
//include_once 'public/navbarAdmin.php';
?>

<body>


    <div class="page-wrapper bg-gra-03 p-t-45 p-b-50">
        <h2 class="title">Mantener direccion</h2>
        <div class="container">
            <?php if ($vars['accion'] == "seleccionar") { ?>
                <form method="POST" action="?controlador=Cabana&accion=cargarDireccionConId">

                    <label for="cabanaid">Nombre de la cabaña</label>
                    <br>
                    <select name="cabanaid" id="cabanaid">

                        <?php foreach ($vars['cabanas'] as $cabana) {  ?>

                            <option value="<?php echo $cabana['cabanaid'] ?>"><?php echo $cabana['cabananombre'] ?></option>

                        <?php } ?>
                    </select>


                    <br><br>

                    <button type="submit">Seleccionar</button>
                </form>
            <?php } ?>


            <?php if ($vars['accion'] == 'actualizareliminardireccion') { ?>

                <form method="POST" action="?controlador=Cabana&accion=actualizarDireccion">
                    <?php foreach ($vars['direccion'] as $datos) { ?>

                        <input id="direccionid" name="direccionid" value="<?php echo $datos['direccionid'] ?>" type="hidden">

                        <label for="direccionprovincia">Provincia</label>
                        <input id="direccionprovincia" name="direccionprovincia" type="text" value="<?php echo $datos['direccionprovincia'] ?>">
                        <br><br>
                        <label for="direccioncanton">Canton</label>
                        <input id="direccioncanton" name="direccioncanton" type="text" value="<?php echo $datos['direccioncanton'] ?>">
                        <br><br>
                        <label for="direcciondistrito">Distrito</label>
                        <input id="direcciondistrito" name="direcciondistrito" type="text" value="<?php echo $datos['direcciondistrito'] ?>">
                        <br><br>
                        <label for="direccionsenas">Señas</label>
                        <input id="direccionsenas" name="direccionsenas" type="text" value="<?php echo $datos['direccionotrasenas'] ?>">
                        <br><br>
                    <?php } ?>
                    <button type="submit">Actualizar direccion</button>
                    <br><br>
                </form>

                <form method="POST" action="?controlador=Cabana&accion=eliminarDireccion">
                    <input id="direccionid" name="direccionid" value="<?php echo $datos['direccionid'] ?>" type="hidden">
                    <button type="submit">Eliminar direccion</button>
                </form>

            <?php } ?>
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