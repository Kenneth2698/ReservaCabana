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
    <h2 class="title">Asignar cuenta a propietario</h2>
    <div class="container">
        <form method="POST"  action="?controlador=Cabana&accion=insertarPropietarioCuenta">  
            <label for="">Seleccione el propietario</label>
            <br>
            <select name="propietario" id="propietario">
                <?php foreach($vars["propietarios"] as $item){?>
                    <option value="<?php echo $item['propietarioid']?>"><?php echo $item['propietarionombre']?></option>
                <?php }?>
            </select>
            <br>
            <label for="">Nombre del banco</label>
            <br>
            <input type="text" name="banco" id="banco">
            <br>
            <label for="">Numero de cuenta</label>
            <br>
            <input type="text" name="cuenta" id="cuenta">
            <br>
            <label for="">Estado de la cuenta</label>
            <br>
            <select name="estado" id="estado">
                <option value="activa">Activa</option>
                <option value="desactiva">Desactiva</option>
            </select>
            <br><br>
            <button type="submit">Insertar</button>        
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