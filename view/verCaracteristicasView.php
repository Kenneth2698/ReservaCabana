<!DOCTYPE html>
<html lang="en">

<script type="text/javascript" src="public/js/jquery-3.3.1.js"></script>

<script type="text/javascript" src="public/js/scriptK.js"></script>

<?php
//include_once 'public/navbarAdmin.php';
?>

<body>
    <div class="page-wrapper bg-gra-03 p-t-45 p-b-50">
        <h2 class="title">Lista de caracteristicas</h2>
        <div class="container">

            <?php foreach ($vars as $datos) {  ?>

                <table id="tab<?php echo $datos['tbcabanacaracteristicaid'] ?>" name="tab<?php echo $datos['tbcabanacaracteristicaid'] ?>">
                    <tr>
                        <th> ID</th>
                        <th> CABAÑA</th>
                        <?php $criterios = explode(',', $datos['cabanacaracteristicacriterio']);     ?>
                        <?php foreach ($criterios as $c) {  ?>
                            <th contenteditable><?php echo $c ?></th>
                        <?php } ?>

                    </tr>

                    <br>

                    <tr>
                        <?php $valores = explode(',', $datos['cabanacaracteristicavalor']);     ?>



                        <td> <?php echo $datos['tbcabanacaracteristicaid'] ?></td>
                        <td> <?php echo $datos['cabanaid'] ?></td>
                        <?php foreach ($valores as $v) {  ?>
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
                        <td><button type="submit" href="javascript:;" onclick="obtenerValoresDeTabla($('#tab'+<?php echo $datos['tbcabanacaracteristicaid'] ?>).attr('id'));return false;">Asignar datos</button></td>
                        <form method="POST" action="?controlador=Cabana&accion=cargarVerCaracteristicas">
                            <td> <button type="submit">Actualizar caracteristica</button></td>
                        </form>
                        <td>
                            <form method="POST" action="?controlador=Cabana&accion=eliminarCaracteristica">
                                <input type="hidden" value="<?php echo $datos['tbcabanacaracteristicaid'] ?>" id="caracteristicaid" name="caracteristicaid">
                                <button type="submit">Eliminar caracteristica</button>
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