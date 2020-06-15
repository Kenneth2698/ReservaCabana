<!DOCTYPE html>
<html lang="en">

<?php
//include_once 'public/navbarAdmin.php';
?>

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>

<body>
    <br><br><br>
    <div class="container" style="background-color: goldenrod;">


        <div class="container">
            <h3>Cuando quieres alojarte en <?php echo $vars["cabananombre"] ?> ?</h3>
            <form class="form" action="?controlador=Reserva&accion=ultimaVerificacion" method="POST">
                <div class="row">
                    <div class="form-group col-md-4">
                    <div class="col">
                        <label for="">Fecha de Llegada:</label>
                        <input type="date" id="fecha1" name="fecha1" class="form-control" value="<?php echo $vars["fecha1"] ?>">
                    </div>
                    </div>    

                    <div class="form-group col-md-4">
                    <div class="col">
                        <label for="">Fecha de Salida:</label>
                        <input type="date" id="fecha2" name="fecha2" class="form-control" value="<?php echo $vars["fecha2"] ?>">

                    </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-2">
                    <div class="col">
                        <label for="">Cantidad de personas:</label>
                        <select name="cantidad" id="cantidad" class="form-control">
                            <option selected value="<?php echo $vars["cantidad"] ?>"><?php echo $vars["cantidad"] ?></option>
                            <option value="2">2</option>
                            <option value="5">5</option>
                            <option value="10">10</option>
                        </select>
                    </div>
                    </div>
                    <div class="form-group col-md-6">
                    <div class="col">
                    <input type="hidden" id="cabanaid" name="cabanaid" value="<?php echo $vars['cabanaid'] ?>">
                    <input type="hidden" id="cabananombre" name="cabananombre" value="<?php echo $vars['cabananombre'] ?>">
                    <button type="submit" class="btn btn-primary" style="margin-top: 32px;">Ver disponibilidad</button>
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

    <!--BOOTSTRAP-->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->