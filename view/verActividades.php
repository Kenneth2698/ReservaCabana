<!DOCTYPE html>
<html lang="en">

<?php
//include_once 'public/navbarAdmin.php';
?>

<body>
    <div class="page-wrapper bg-gra-03 p-t-45 p-b-50">
        <h2 class="title">Lista de actividades</h2>
        <div class="container">
            <table>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Nombre dueno</th>
                    <th>Descripcion</th>
                    <th>Precio</th>
                    <th>Cabana ID</th>
                    
                    <th>Actualizar</th>
                    <th>Eliminar</th>
                </tr>

                <?php foreach ($vars['actividades'] as $actividad) {  ?>
                    <tr>
                        <td><?php echo $actividad['actividadid'] ?></td>
                        <td><?php echo $actividad['actividadnombre'] ?></td>
                        <td><?php echo $actividad['actividaddueno'] ?></td>
                        <td><?php echo $actividad['actividaddescripcion'] ?></td>
                        <td><?php echo $actividad['actividadprecio'] ?></td>
                        <td><?php echo $actividad['cabanaid'] ?></td>


                        <form method="POST" action="?controlador=Actividad&accion=cargarActualizar">

                        <input type="hidden" value="<?php echo $actividad['actividadid'] ?>" id="actividadid" name="actividadid">
                        <input type="hidden" value="<?php echo $actividad['cabanaid'] ?>" id="cabanaid" name="cabanaid">

                            <td> <button type="submit">Actualizar</button></td>
                        </form>

                        <form method="POST" action="?controlador=Actividad&accion=eliminarActividad">

                        <input type="hidden" value="<?php echo $actividad['actividadid'] ?>" id="actividadid" name="actividadid">
                        <input type="hidden" value="<?php echo $actividad['cabanaid'] ?>" id="cabanaid" name="cabanaid">

                            <td> <button type="submit">Eliminar</button></td>
                        </form>

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