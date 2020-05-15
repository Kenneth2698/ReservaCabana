<!DOCTYPE html>
<html lang="en">


<script type="text/javascript" src="public/js/jquery-3.3.1.js"></script>

<script type="text/javascript" src="public/js/scriptK.js"></script>

<?php
//include_once 'public/navbarAdmin.php';
?>

<body>


    <div class="page-wrapper bg-gra-03 p-t-45 p-b-50">
        <h2 class="title"> </h2>
        <div class="container">
            <?php if ($vars['accion'] == "crear") { ?>

                <form method="POST" action="?controlador=Cabana&accion=crearPropietario">


                    <label for="nombre">Nombre</label>
                    <input id="nombre" name="nombre" type="text">
                    <br><br>
                    <label for="cuenta">Cuenta</label>
                    <input id="cuenta" name="cuenta" type="text">
                    <br><br>
                    <label for="correo">Correo</label>
                    <input id="correo" name="correo" type="text">
                    <br><br>
                    <label for="telefono">Telefono</label>
                    <input id="telefono" name="telefono" type="text">
                    <br><br>


                    <button type="submit">Crear propietario</button>
                </form>

            <?php } ?>

            <?php if ($vars['accion'] == 'actualizareliminarpropietario') { ?>

                <form method="POST" action="?controlador=Cabana&accion=actualizarPropietario">
                <?php foreach ($vars['propietarios'] as $datos) { ?>
                        <input id="propietarioid" name="propietarioid" value="<?php echo $datos['propietarioid']?>" type="hidden">
                        <label for="nombre">Nombre</label>
                        <input id="nombre" name="nombre" type="text" value="<?php echo $datos['propietarionombre']?>"> 
                        <br><br>
                        <label for="cuenta">Cuenta</label>
                        <input id="cuenta" name="cuenta" type="text" value="<?php echo $datos['propietarionumerocuentabancaria']?>">
                        <br><br>
                        <label for="correo">Correo</label>
                        <input id="correo" name="correo" type="text" value="<?php echo $datos['propietariocorreo']?>">
                        <br><br>
                        <label for="telefono">Telefono</label>
                        <input id="telefono" name="telefono" type="text" value="<?php echo $datos['propietariotelefono']?>">
                        <br><br>
                <?php } ?>
                    <button type="submit">Actualizar propietario</button>
                    <br><br>
                </form>

                <form method="POST" action="?controlador=Cabana&accion=eliminarPropietario">
                <input id="propietarioid" name="propietarioid" value="<?php echo $datos['propietarioid']?>" type="hidden">
                    <button type="submit">Eliminar propietario</button>
                </form>

            <?php } ?>


            <?php if ($vars['accion'] == 'cargarpropietarios') { ?>

                <form method="POST" action="?controlador=Cabana&accion=cargarPropietarioConId">
                <label for="propietarioid">Propietario</label>
                <br><br>
                <select name="propietarioid" id="propietarioid">
                    <?php foreach ($vars['propietarios'] as $propietario) { ?>
                        <option value="<?php echo $propietario['propietarioid'] ?>"><?php echo $propietario['propietarionombre'] ?></option>
                    <?php } ?>
                </select>
               
                    <br><br>
                <button type="submit">Seleccionar</button>
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