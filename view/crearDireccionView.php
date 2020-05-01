<!DOCTYPE html>
<html lang="en">


<script type="text/javascript" src="public/js/jquery-3.3.1.js"></script>

<script type="text/javascript" src="public/js/scriptK.js"></script>

<?php
//include_once 'public/navbarAdmin.php';
?>

<body>


    <div class="page-wrapper bg-gra-03 p-t-45 p-b-50">
        <h2 class="title">Crear direccion</h2>
        <div class="container">
            <form method="POST" action="?controlador=Cabana&accion=crearDireccion">


                <input id="cabanaid" name="cabanaid" type="hidden" value="<?php echo $vars['cabanaid'] ?>">

                <label for="provincia">Provincia</label>
                <input id="provincia" name="provincia" type="text">
                <br><br>
                <label for="canton">Canton</label>
                <input id="canton" name="canton" type="text">
                <br><br>
                <label for="distrito">Distrito</label>
                <input id="distrito" name="distrito" type="text">
                <br><br>
                <label for="senas">Senas</label>
                <input id="senas" name="senas" type="text">
                <br><br>


                <button type="submit">Crear direccion</button>
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