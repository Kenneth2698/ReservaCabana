<!DOCTYPE html>
<html lang="en">

<?php
//include_once 'public/navbarAdmin.php';
?>

<body>
<div class="page-wrapper bg-gra-03 p-t-45 p-b-50">
    <h2 class="title">Actualizar Correo</h2>
    <div class="container">
        <form method="POST"  action="?controlador=Cliente&accion=actualizarCorreo">
            <?php
                $i = 0;
                foreach ($vars['correos_cliente'] as $row) { ?>  
                  <!--  <label><?php// echo $vars['tipos'][$i] ?></label> -->
                    <input type="email" id="<?php echo 'valores'.$i?>" name="<?php echo 'valores'.$i?>" value="<?php echo $row ?>"></input>  
                                             
                <?php

                $i++; } 
                ?>
                <input type="text" hidden value="<?php echo $i?>" id="contador" name="contador"> 
            <br>
            <br>
            <button type="submit">Actualizar</button>
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