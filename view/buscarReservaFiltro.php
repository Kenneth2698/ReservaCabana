<!DOCTYPE html>
<html lang="en">

<?php
//include_once 'public/navbarAdmin.php';
?>

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>

<body>
    <?php
    $x  = 0;
    foreach ($vars["c"] as $item) {
        for ($i = 0; $i < sizeof($item); $i++) {
            $vector[$x] = $item[$i];
            $x++;
        }
    }

    $y  = 0;
    foreach ($vars["v"] as $item) {
        for ($i = 0; $i < sizeof($item); $i++) {
            $vector2[$y] = $item[$i];
            $y++;
        }
    }

    ?>

    <br><br><br>
    <div class="container" style="background-color: goldenrod;">

        <div class="row">
            <div class="col">
                <form action="?controlador=Reserva&accion=mostrarResultadosFiltrados" method="POST">
                    <h1>Buscar</h1>
                    <div class="form-group">
                        <label for="">Nombre del destino</label>
                        <input type="text" class="form-control" id="nombre" name="nombre">

                    </div>
                    <div class="form-group">
                        <label for="">Fecha de Llegada:</label>
                        <input type="date" class="form-control" id="fecha1" name="fecha1">
                    </div>
                    <div class="form-group">
                        <label for="">Fecha de Salida:</label>
                        <input type="date" class="form-control" id="fecha2" name="fecha2">
                    </div>
                    <div class="form-group">
                        <label for="">Cantidad personas</label>
                        <select class="form-control" id="cantidad" name="cantidad">
                            <option value="2">2 adultos</option>
                            <option value="5">5 adultos</option>
                            <option value="10">10 adultos</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col">
                                <select name="caracteristica" id="caracteristica" class="form-control">

                                    <?php
                                    $d = 0;
                                    for ($i = 0; $i < $vars["t"]; $i++) { ?>

                                        <option value="<?php echo $vector2[$i] ?>"><?php echo $vector[$i] . ": " . $vector2[$i] ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="gridCheck">
                            <label class="form-check-label" for="gridCheck">
                                Viajo por trabajo
                                <span title="Marcar esta opción si quiere un un destino con Internet"><img src="./public/imgs/hint.png" alt="hit image" height="25px" width="25px"></span>
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary">Buscar</button>
                    </div>
                </form>
            </div>
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