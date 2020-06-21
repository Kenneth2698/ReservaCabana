<!DOCTYPE html>
<html lang="en">

<?php
//include_once 'public/navbarAdmin.php';
?>

<body>
    <div class="page-wrapper bg-gra-03 p-t-45 p-b-50">
        <h2 class="title">Lista de planes</h2>
        <div class="container">
            <table>
                <tr>
                    <th>ID</th>
                    <th>Cantidad de dias</th>
                    <th>Monto del plan</th>
                    <th>Restricciones</th>

                </tr>

                <?php $contador = 0;
                foreach ($vars['planes'] as $planes) { ?>
                    <tr>
                        <td>________________________</td>
                        <td>________________________</td>
                        <td>________________________</td>
                        <td>________________________</td>
                    </tr>
                    <tr>
                        <td><?php echo $planes['planid'] ?></td>
                        <td><?php echo $planes['plancantidaddias'] ?></td>
                        <td><?php echo $planes['planmonto'] ?></td>

                        <td>
                            <?php
                            foreach ($vars['fechas'][$contador] as $restricciones) {
                                echo $restricciones . "<br>";
                            }
                            ?>
                        </td>
                    </tr>


                <?php $contador++;
                } ?>

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