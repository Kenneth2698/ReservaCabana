<!DOCTYPE html>
<html lang="en">

<?php
//include_once 'public/navbarAdmin.php';
?>

<body>
<div class="page-wrapper bg-gra-03 p-t-45 p-b-50">
    <h2 class="title">Lista de Correos</h2>
    <div class="container">
        <table>
         
        <?php
        $object = json_decode($vars,true);
        foreach($object as $correo){  ?>
        <th>ID </th>
        <th>ID Cliente </th>
        <tr>
            <td><?php echo $correo['id'] ?></td>
            <td><?php echo $correo['clienteid'] ?></td>
        
        <?php 
                foreach($correo['valores'] as $valores){?>
                    <td><?php echo $valores ?></td>
                <?php 
                }?>
                <form method="POST" action="?controlador=Cliente&accion=cargarActualizarCorreo">
                <input type="hidden" value="<?php echo $correo['id']?>" id="id" name="id">
                <input type="hidden" value="<?php echo $correo['idcorreo']?>" id="idcorreo" name="idcorreo">
                <input type="hidden" value="<?php echo $correo['clienteid']?>" id="correoclienteid" name="correoclienteid">
                    <td><button type="submit">Actualizar</button></td>
                </form>
                <form method="POST" action="?controlador=Cliente&accion=cargarEliminarCorreo">
                    <input type="hidden" value="<?php echo $correo['id']?>" id="id" name="id">
                    <input type="hidden" value="<?php echo $correo['clienteid']?>" id="clienteid" name="clienteid">
                    <td><button type="submit">Eliminar</button></td>
                </form>

        </tr>
        <?php
            }?>
        </table>
        

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