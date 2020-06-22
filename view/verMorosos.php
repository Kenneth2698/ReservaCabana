<!DOCTYPE html>
<html lang="en">

<?php
//include_once 'public/navbarAdmin.php';
?>

<body>
    <div class="page-wrapper bg-gra-03 p-t-45 p-b-50">
        <h2 class="title">Lista de abonos morosos</h2>
        <br>
        <div class="container">
            <table>
                <tr>
                    <th>Plan</th>
                    <th>Fecha de cobro</th>
                    <th>Fecha de abono</th>
                    <th>Monto</th>
                    <th>Estado</th>
                    <th>Accion</th>

                </tr>
                <?php foreach ($vars['abonos'] as $abonos) {if($abonos['fechacobro'] < date('Y-m-d')){?>

                    <tr>
                        <td><?php echo $abonos['planid'] ?></td>
                        <td><?php echo $abonos['fechacobro'] ?></td>
                        <td>
                            <?php echo "__________";?>
                        </td>
                        <td>₡<?php echo $abonos['monto'] ?></td>
                        <td>
                            <?php echo "Moroso";
                            ?>
                        </td>
                        <td><a href="?controlador=Plan&accion=abonarPlan&planid=<?php echo $abonos['abonoplanid']?>" class="btn">Abonar</a></td>
                        
                    </tr>


                <?php
                }} ?>

            </table>



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