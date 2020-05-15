<!DOCTYPE html>
<html lang="en">

<?php
//include_once 'public/navbarAdmin.php';
?>
<head>
    <!--jquery-->
    <script type="text/javascript" src="public/js/jquery-3.3.1.js"></script>
    <!--Javascript-->
    <script type="text/javascript" src="public/js/cliente.js"></script>
</head>

<body>
<div class="page-wrapper bg-gra-03 p-t-45 p-b-50">
    <h2 class="title">Ver cuenta de propietario</h2>
    <div class="container">
        <form method="POST"  action="?controlador=Cabana&accion=cargarListaCuentasPropietario">  
            <label for="">Seleccione el propietario para ver sus cuentas</label>
            <br>
            <select name="idpropietario" id="idpropietario">
                <?php foreach($vars["propietarios"] as $item){?>
                    <option value="<?php echo $item['propietarioid']?>"><?php echo $item['propietarionombre']?></option>
                <?php }?>
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