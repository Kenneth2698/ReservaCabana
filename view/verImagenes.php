<!DOCTYPE html>
<html lang="en">

<script type="text/javascript" src="public/js/jquery-3.3.1.js"></script>

<script type="text/javascript" src="public/js/scriptK.js"></script>

<?php
//include_once 'public/navbarAdmin.php';
?>

<body>
    <div class="page-wrapper bg-gra-03 p-t-45 p-b-50">
        <h2 class="title">Lista de imagenes</h2>
        <div class="container">

            <?php foreach ($vars as $datos) {
                $i = 0; ?>

                <table id="tab<?php echo $datos['caracteristicaimagenid'] ?>" name="tab<?php echo $datos['caracteristicaimagenid'] ?>">
                    <tr>
                        <th> ID</th>
                        <?php $nombres = explode(',', $datos['caracteristicaimagennombre']);     ?>
                        <?php foreach ($nombres as $c) {  ?>
                            <th contenteditable><?php echo $c ?></th>
                        <?php } ?>

                    </tr>

                    <br>

                    <tr>
                        <?php $rutas = explode(',', $datos['caracteristicaimagenruta']);     ?>



                        <td> <?php echo $datos['caracteristicaimagenid'] ?></td>
                        <?php foreach ($rutas as $v) {  ?>
                            <td contenteditable><?php echo $v ?></td>
                        <?php } ?>
                    </tr>

                </table>
                <br>

                <table>
                    <tr>
                        <th>Asignar</th>
                        <th>Actualizar</th>
                        <th>Eliminar</th>
                    </tr>
                    <tr>
                        <td><button type="submit" href="javascript:;" onclick="obtenerValoresDeTablaImagenes($('#tab'+<?php echo $datos['caracteristicaimagenid'] ?>).attr('id'));return false;">Asignar datos</button></td>
                        <form method="POST" action="?controlador=Cabana&accion=cargarVerCaracteristicaImagen">
                            <td> <button type="submit">Actualizar caracteristica</button></td>
                        </form>

                        <td>
                            <form method="POST" action="?controlador=Cabana&accion=eliminarImagen">
                                <input type="hidden" value="<?php echo $datos['caracteristicaimagenid'] ?>" id="imagenid" name="imagenid">
                                <button type="submit">Eliminar imagen</button>
                            </form>
                        </td>

                        </td>
                    </tr>
                </table>

                <p>________________________________________________</p>

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