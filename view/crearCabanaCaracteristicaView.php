<!DOCTYPE html>
<html lang="en">


<script type="text/javascript" src="public/js/jquery-3.3.1.js"></script>

<script type="text/javascript" src="public/js/scriptK.js"></script>

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
        <h2 class="title">Crear cabaña caracterisitca</h2>
        <div class="container">
            <form method="POST" action="?controlador=Cabana&accion=insertarCabanaCaracteristica">


                <label for="cabanaid">Nombre de la cabaña</label>
                <br>
                <select name="cabanaid" id="cabanaid">

                    <?php foreach ($vars['cabanas'] as $cabana) {  ?>

                        <option value="<?php echo $cabana['cabanaid'] ?>"><?php echo $cabana['cabananombre'] ?></option>

                    <?php } ?>
                </select>

                <br><br>


                <label for="caracteristicacriterio">Criterio</label>
                <input type="text" id="caracteristicacriterio" name="caracteristicacriterio">

                <br><br>

                <label for="caracteristicavalor">Valor</label>
                <input type="text" id="caracteristicavalor" name="caracteristicavalor">
                <br><br>

                <label for="caracteristicaprioridad">Prioridad</label>
                <input type="text" id="caracteristicaprioridad" name="caracteristicaprioridad">
                <br><br>
                <button type="submit" href="javascript:;" onclick="agregarCriterioValorPrioridad($('#caracteristicacriterio').val(),$('#caracteristicavalor').val(),$('#caracteristicaprioridad').val());return false;">Agregar datos</button>
                <button id="test" name="test" type="submit">Crear</button>
                <!-- Modal -->
                <div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="ModalLabel">Crear cabaña característica</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                ¿Desea crear cabaña característica?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                <button type="submit" class="btn btn-success" >Confirmar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
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