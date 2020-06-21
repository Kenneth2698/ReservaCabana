<!DOCTYPE html>
<html lang="en">

<script type="text/javascript" src="public/js/jquery-3.3.1.js"></script>

<script type="text/javascript" src="public/js/scriptK.js"></script>
<?php
//include_once 'public/navbarAdmin.php';
?>

<body>
    <div class="page-wrapper bg-gra-03 p-t-45 p-b-50">
        <h2 class="title">Crear Plan</h2>
        <div class="container">
            <form method="POST" action="?controlador=Plan&accion=insertarPlan">
                <label for="plancantidaddias">Cantidad de dias</label>
                <br>
                <input type="number" id="plancantidaddias" name="plancantidaddias">
                <br>
                <label for="planmonto">Monto total</label>
                <br>
                <input type="number" id="planmonto" name="planmonto">
                <br>
                <label for="restricciones">Restricciones</label>
                <br>
                <select name="restricciones" id="restricciones">
                    <?php
                    foreach ($vars['temporadas'] as $temporada) { ?>
                        <option value="<?php echo $temporada['tbtemporadaid'] ?>">
                            <?php echo "Temporada ".$temporada['tbtemporadanombre']." desde ".$temporada['tbtemporadafechainicio']." hasta ".$temporada['tbtemporadafechafinal']?>
                        </option>
                    <?php

                    } ?>
                </select>
                <button type="button" href="javascript:;" onclick="agregarRestriccion($('#restricciones').val());return false;">Agregar restriccion</button>
                <br>
                <a id="mensaje" style="color: red;"></a>
                <br><br>
                <button type="submit">Crear plan </button>
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