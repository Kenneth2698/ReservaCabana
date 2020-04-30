<!DOCTYPE html>
<html lang="en">

<?php
//include_once 'public/navbarAdmin.php';
?>

<body>
<div class="page-wrapper bg-gra-03 p-t-45 p-b-50">
    <h2 class="title">Lista de Telefonos</h2>
    <div class="container">
        <table>
         
        <?php
        $object = json_decode($vars,true);
        foreach($object as $telefono){  ?>
        <th>ID </th>
        <th>ID Cliente </th>
        <tr>
            <td><?php echo $telefono['id'] ?></td>
            <td><?php echo $telefono['clienteid'] ?></td>
        </tr>
            <?php 
                foreach($telefono['criterios'] as $criterios){?>

                    <th><?php echo $criterios ?></th>
                    
                <?php 
                }?>
        </tr>
        <tr>
        <?php 
                foreach($telefono['valores'] as $valores){?>
                    <td><?php echo $valores ?></td>
                <?php 
                }?>
                <form method="POST" action="?controlador=Cliente&accion=cargarActualizarTelefono">
                <input type="hidden" value="<?php echo $telefono['clienteid']?>" id="telefonoclienteid" name="telefonoclienteid">
                    <td><button type="submit">Actualizar</button></td>
                </form>
                <form method="POST" action="?controlador=Cliente&accion=cargarEliminarTelefono">
                    <input type="hidden" value="<?php echo $telefono['clienteid']?>" id="telefonoclienteid" name="telefonoclienteid">
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