<!DOCTYPE html>
<html lang="en">


<script type="text/javascript" src="public/js/jquery-3.3.1.js"></script>

<script type="text/javascript" src="public/js/scriptK.js"></script>

<?php
//include_once 'public/navbarAdmin.php';
?>

<body>


    <div class="page-wrapper bg-gra-03 p-t-45 p-b-50">
        <div class="container">
        <h2>Seleccionar cabaña para ver el calendario</h2>
            <form method="POST" action="?controlador=Reserva&accion=seleccionarCabanaParaCalendario">

            <label for="cabanaid">Nombre de la cabaña</label>
                <br>
                <select name="cabanaid" id="cabanaid">

                    <?php foreach ($vars['cabanas'] as $cabana) {  ?>

                        <option value="<?php echo $cabana['cabanaid'] ?>"><?php echo $cabana['cabananombre'] ?></option>

                    <?php } ?>
                </select>


                <br><br>

                <button type="submit">Seleccionar</button>
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