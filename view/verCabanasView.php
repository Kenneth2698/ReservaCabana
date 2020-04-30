<!DOCTYPE html>
<html lang="en">

<?php
//include_once 'public/navbarAdmin.php';
?>

<body>
    <div class="page-wrapper bg-gra-03 p-t-45 p-b-50">
        <h2 class="title">Lista de Servicios</h2>
        <div class="container">
            <table>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Actualizar</th>
                    <th>Eliminar</th>
                </tr>

                <?php foreach ($vars['cabanas'] as $cabana) {  ?>
                    <tr>
                        <td><?php echo $cabana['cabanaid'] ?></td>
                        <td><?php echo $cabana['cabananombre'] ?></td>


                        <form method="POST" action="?controlador=Cabana&accion=cargarActualizarCabana">

                            <input type="hidden" value="<?php echo $cabana['cabanaid'] ?>" id="cabanaid" name="cabanaid">
                            <input type="hidden" value="<?php echo $cabana['cabananombre'] ?>" id="cabananombre" name="cabananombre">

                            <td> <button type="submit">Actualizar</button></td>
                        </form>

                        <form method="POST" action="?controlador=Cabana&accion=eliminarCabana">

                            <input type="hidden" value="<?php echo $cabana['cabanaid'] ?>" id="cabanaid" name="cabanaid">

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