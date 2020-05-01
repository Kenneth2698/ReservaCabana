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
            <?php $i = 0;  ?>
            <?php foreach ($vars as $datos) {  ?>
                <form method="POST" action="?controlador=Cabana&accion=insertarCaracteristicaImagen">
                    <table id="tab<?php echo $datos['tbcabanacaracteristicaid'] ?>" name="tab<?php echo $datos['tbcabanacaracteristicaid'] ?>">
                        <tr>
                            <th> ID</th>
                            <th> CABAÑA</th>
                            <?php $criterios = explode(',', $datos['cabanacaracteristicacriterio']);     ?>
                            <?php foreach ($criterios as $c) {  ?>
                                <th><?php echo $c ?></th>
                            <?php } ?>

                        </tr>

                        <br>

                        <tr>
                            <?php $valores = explode(',', $datos['cabanacaracteristicavalor']);     ?>



                            <td> <?php echo $datos['tbcabanacaracteristicaid'] ?></td>
                            <td> <?php echo $datos['cabananombre'] ?></td>
                            <?php foreach ($valores as $v) {  ?>
                                <td><?php echo $v ?><br>
                                    <input type="text" id="nombre<?php echo $i ?>" name="nombre<?php echo $i ?>" placeholder="Nombre de imagen"><br>
                                    <input type="text" id="ruta<?php echo $i ?>" name="ruta<?php echo $i ?>" placeholder="Ruta">
                                    <?php $i++; ?>
                                </td>
                            <?php } ?>
                        </tr>

                    </table>
                    <br>
                    <button id="test" name="test" type="submit">Crear</button>
                    <p>________________________________________________</p>
                   
                    <input type="hidden" value="<?php echo $i ?>" id="i" name="i">
                    <input type="hidden" value="<?php echo $datos['cabanacaracteristicacodigo'] ?>" id="codigo" name="codigo">
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