<!DOCTYPE html>
<html lang="en">

<?php
//include_once 'public/navbarAdmin.php';
?>

<body>
    <div class="page-wrapper bg-gra-03 p-t-45 p-b-50">
        <h2 class="title">Lista de abonos pendientes, pagados y morosos</h2>
        <br>
        <div class="container">
            <table>
                <tr>
                    <th>Plan</th>
                    <th>Fecha de cobro</th>
                    <th>Fecha de abono</th>
                    <th>Monto</th>
                    <th>Estado</th>
                    <th>Cantidad a depositar</th>
                    <th>Abonar</th>
                    <th>Abonar todo</th>

                </tr>

                <?php $miArray = $vars['abonos'];
                foreach ($vars['abonos'] as $abonos) { ?>

                    <tr>
                        <td><?php echo $abonos['planid'] ?></td>
                        <td><?php echo $abonos['fechacobro'] ?></td>
                        <td>
                            <?php
                            if ($abonos['fechaabono'] == NULL) {
                                echo "__________";
                            } else {
                                echo $abonos['fechaabono'];
                            }
                            ?>
                        </td>
                        <td>₡<?php echo $abonos['monto'] ?></td>
                        <td>
                            <?php
                            if ($abonos['pagado'] == 1) {
                                echo "Pagado";
                            } else {
                                if ($abonos['fechacobro'] < date('Y-m-d')) {
                                    echo "Moroso";
                                } else {
                                    echo "Pendiente";
                                }
                            }
                            ?>
                        </td>
                        <?php
                        if ($abonos['pagado'] != 1) { ?>
                            <form action="?controlador=Plan&accion=abonarPlanPersonalizado" method="POST">
                                <input id="planid" name="planid" type="hidden" value="<?php echo $abonos['abonoplanid'] ?>">
                                <input id="montofijo" name="montofijo" type="hidden" value="<?php echo $abonos['monto'] ?>">
                                <td>₡<input id="monto" name="monto"  type="number" value="<?php echo $abonos['monto'] ?>"></td>
                                <td><button type="submit" >Abonar</button></td>
                            </form>
                            <td><a href="?controlador=Plan&accion=abonarPlan&planid=<?php echo $abonos['abonoplanid'] ?>" class="btn">Abonar todo</a></td>
                        <?php } ?>

                    </tr>


                <?php
                } ?>

            </table>
            <li><a href='?controlador=Plan&accion=abonarPlanRestante&abonos=<?php echo serialize($miArray) ?>'>Aplicar por el plan</a></li>



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