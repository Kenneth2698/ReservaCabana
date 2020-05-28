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
    <div class="container">
        <?php $contador = 0; ?>
        <?php foreach ($vars as $item) { ?>

            <div class="row">
                <form action="?controlador=Reserva&accion=realizarReservaEspecifica" method="POST">
                    <h1><?php echo $item["cabananombre"] ?></h1>
                    <h4>Ubicada en <?php echo $item["direccionprovincia"] . ", " . $item["direccioncanton"] . ", " . $item["direcciondistrito"] . ", " . $item["direccionotrasenas"] . "" ?></h4>
                    <br>
                    <?php foreach ($item['lista' . $contador] as $caracteristica) { ?>

                        <div class="col-sm">
                            <div class="card" style="width: 18rem;">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $caracteristica[1]." : ".$caracteristica[2] ?></h5>
                                    
                                </div>
                                <img src="./public/imgs/<?php echo $caracteristica[3] ?>" class="card-img-top" alt="...">
                            </div>
                        </div>
                    <?php } ?><br>
                    <input type="hidden" id="cabanaid" name="cabanaid" value="<?php echo $item['cabanaid'] ?>">
                    <input type="hidden" id="cabananombre" name="cabananombre" value="<?php echo $item['cabananombre'] ?>">
                    <input type="hidden" id="fecha1" name="fecha1" value="<?php echo $item['fecha1']  ?>">
                    <input type="hidden" id="fecha2" name="fecha2" value="<?php echo $item['fecha2']  ?>">
                    <input type="hidden" id="cantidad" name="cantidad" value="<?php echo $item['cantidad']  ?>">

                    
                    <center>
                        <button class="btn-success">Seleccionar</button>
                    </center>
                </form>
            </div>

            <?php $contador++; ?>
        <?php } ?>
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