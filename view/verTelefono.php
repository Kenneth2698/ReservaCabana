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
            <tr>
                <th>ID:</th>
                <td><?php echo $telefono['id'] ?></td>
                <?php 
                foreach($telefono['criterios'] as $criterios){?>
                    <th>Criterio:</th>
                    <td><?php echo $criterios ?></td>
                <?php 
                }?>

                <?php 
                foreach($telefono['valores'] as $valores){?>
                    <th>Valor:</th>
                    <td><?php echo $valores ?></td>
                <?php 
                }?>
                <th>ID Cliente:</th>
                <td><?php echo $telefono['clienteid'] ?></td>  

                <form method="POST" action="?controlador=Servicio&accion=cargarActualizarServicio">

                    <input type="hidden" value="<?php echo $telefono['id']?>" id="telefonoid" name="telefonoid">
                    <input type="hidden" value="<?php echo $telefono['criterio']?>" id="telefonocriterio" name="telefonocriterio">
                    <input type="hidden" value="<?php echo $telefono['valor']?>" id="telefonovalor" name="telefonovalor">
                    <input type="hidden" value="<?php echo $telefono['clienteid']?>" id="telefonoclienteid" name="telefonoclienteid">

                    <td>  <button type="submit">Actualizar</button></td>
                </form>
                
                <form method="POST" action="?controlador=Servicio&accion=eliminarServicio">

                    <input type="hidden" value="<?php echo $telefono['id']?>" id="telefonoid" name="telefonoid">

                    <td>  <button type="submit">Eliminar</button></td>
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