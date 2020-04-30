<!DOCTYPE html>
<html lang="en">

<?php
//include_once 'public/navbarAdmin.php';
?>

<body>
<div class="page-wrapper bg-gra-03 p-t-45 p-b-50">
    <h2 class="title">Lista de Clientes</h2>
    <div class="container">
        <table>
        <tr>
            <th>ID</th>
            <th>Nombre completo</th>

        </tr>

        <?php foreach($vars['clientes'] as $cliente){  ?>
            <tr>
                <td><?php echo $cliente['clienteid']?></td>
                <td><?php echo $cliente['clientenombrecompleto']?></td>
                
   

                <form method="POST" action="?controlador=Cliente&accion=cargarActualizarCliente">

                    <input type="hidden" value="<?php echo $cliente['clienteid']?>" id="clienteid" name="clienteid">
                    <input type="hidden" value="<?php echo $cliente['clientenombrecompleto']?>" id="clientenombrecompleto" name="clientenombrecompleto">

                    <td>  <button type="submit">Actualizar</button></td>
                </form>
                
                <form method="POST" action="?controlador=Cliente&accion=eliminarCliente">

                    <input type="hidden" value="<?php echo $cliente['clienteid']?>" id="clienteid" name="clienteid">

                    <td>  <button type="submit">Eliminar</button></td>
                </form>

            </tr>
        <?php }?>
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