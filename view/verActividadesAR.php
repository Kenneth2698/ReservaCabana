<!DOCTYPE html>
<html lang="en">

<?php
//include_once 'public/navbarAdmin.php';
?>

<body>
    <div class="page-wrapper bg-gra-03 p-t-45 p-b-50">
        <h2 class="title">Lista de actividades pendientes, rechazdas o aceptadas</h2>
        <div class="container">
            <table>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Nombre dueno</th>
                    <th>Descripcion</th>
                    <th>Precio</th>
                    <th>Cabana ID</th>
                    <th>Estado</th>
                    <th>Aceptar</th>
                    <th>Rechazar</th>
                </tr>

                <?php foreach ($vars['actividades'] as $actividad) {  ?>
                    <tr>
                        <td><?php echo $actividad['actividadid'] ?></td>
                        <td><?php echo $actividad['actividadnombre'] ?></td>
                        <td><?php echo $actividad['actividaddueno'] ?></td>
                        <td><?php echo $actividad['actividaddescripcion'] ?></td>
                        <td><?php echo $actividad['actividadprecio'] ?></td>
                        <td><?php echo $actividad['cabanaid'] ?></td>
                        <?php if ($actividad['actividadestado'] == 0) { ?>
                            <td>Pendiente</td>
                        <?php } elseif ($actividad['actividadestado'] == 1) { ?>
                            <td>Aceptada</td>
                        <?php } else { ?>
                            <td>Rechazada</td>
                        <?php } ?>

                        <?php if ($actividad["actividadestado"] == 0) { ?>

                            <form method="POST" action="?controlador=Actividad&accion=aceptarORechazar&valor=1&id=<?php echo $actividad['actividadid'] ?>">
                                <input type="text" hidden>
                                <td> <button type="submit">Aceptar</button></td>
                            </form>

                            <form method="POST" action="?controlador=Actividad&accion=aceptarORechazar&valor=2&id=<?php echo $actividad['actividadid'] ?>">
                                <input type="text" hidden>
                                <td> <button type="submit">Rechazar</button></td>
                            </form>
                        <?php } ?>

                    </tr>
                <?php } ?>
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