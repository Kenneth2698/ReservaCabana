<!DOCTYPE html>
<html lang="en">

<?php
//include_once 'public/navbarAdmin.php';
?>
<head>
    <meta charset="UTF-8">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

</head>
<body>
    <div class="page-wrapper bg-gra-03 p-t-45 p-b-50">
        <h2 class="title">Lista de Servicios</h2>
        <div class="container">
            <table>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Descripcion</th>
                    <th>Imagen</th>
                    <th>Actualizar</th>
                    <th>Eliminar</th>
                </tr>

                <?php foreach ($vars['servicios'] as $servicio) {  ?>
                    <tr>
                        <td><?php echo $servicio['servicioid'] ?></td>
                        <td><?php echo $servicio['servicionombre'] ?></td>
                        <td><?php echo $servicio['serviciodescripcion'] ?></td>
                        <td><?php echo $servicio['servicioimagenruta'] ?></td>



                        <form method="POST" action="?controlador=Servicio&accion=cargarActualizarServicio">

                            <input type="hidden" value="<?php echo $servicio['servicioid'] ?>" id="servicioid" name="servicioid">
                            <input type="hidden" value="<?php echo $servicio['servicionombre'] ?>" id="servicionombre" name="servicionombre">
                            <input type="hidden" value="<?php echo $servicio['serviciodescripcion'] ?>" id="serviciodescripcion" name="serviciodescripcion">
                            <input type="hidden" value="<?php echo $servicio['servicioimagenruta'] ?>" id="servicioimagenruta" name="servicioimagenruta">

                            <td> <button type="submit">Actualizar</button></td>
                        </form>

                        <form method="POST" action="?controlador=Servicio&accion=eliminarServicio">

                            <input type="hidden" value="<?php echo $servicio['servicioid'] ?>" id="servicioid" name="servicioid">

                            <!-- Modal -->
                            <div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="ModalLabel">Eliminar Servicio</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            ¿Desea eliminar este servicio?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                            <button type="submit" class="btn btn-danger">Eliminar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <td> <button type="button" data-toggle="modal" data-target="#Modal">Eliminar</button></td>
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