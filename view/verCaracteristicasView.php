<!DOCTYPE html>
<html lang="en">

<?php
//include_once 'public/navbarAdmin.php';
?>

<body>
    <div class="page-wrapper bg-gra-03 p-t-45 p-b-50">
        <h2 class="title">Lista de caracteristicas</h2>
        <div class="container">

        <?php foreach ($vars as $datos) {  ?>
            <table>
                <tr>
                    <th> ID</th> 
                    <th> CABAÑA</th>
                    <?php $criterios = explode(',',$datos['cabanacaracteristicacriterio'] );     ?>
                    <?php    foreach ($criterios as $c) {  ?>
                        <th>  
                         <?php echo $c ?>
                        </th>
                    <?php } ?>
                </tr>

                <br>

                <tr>
                    <?php $valores = explode(',',$datos['cabanacaracteristicavalor'] );     ?>
                    <td> <?php  echo $datos['tbcabanacaracteristicaid'] ?></td>
                    <td> <?php  echo $datos['cabanaid'] ?></td>
                    <?php    foreach ($valores as $v) {  ?>
                        <td>  
                            <?php echo $v ?>
                        </td>
                    <?php } ?>
                </tr>
            </table>
            <br><br><br><br>
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