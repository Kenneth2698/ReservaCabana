<!DOCTYPE html>
<html lang="en">

<?php
//include_once 'public/navbarAdmin.php';
?>

<body>
<div class="page-wrapper bg-gra-03 p-t-45 p-b-50">
    <h2 class="title">Lista de Ofertas</h2>
    <div class="container">
        <table>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Fecha Inicio</th>
            <th>Fecha Final</th>
            <th>Precio</th>
            <th>Actualizar</th>
            <th>Eliminar</th>
        </tr>

        <?php foreach($vars['ofertas'] as $oferta){  ?>
            <tr>
                <td><?php echo $oferta['ofertaid']?></td>
                <td><?php echo $oferta['ofertanombre']?></td>
                <td><?php echo $oferta['ofertafechainicio']?></td>
                <td><?php echo $oferta['ofertafechafin']?></td>
                <td><?php echo $oferta['ofertaprecio']?></td>
                
   

                <form method="POST" action="?controlador=Oferta&accion=cargarActualizarOferta">

                    <input type="hidden" value="<?php echo $oferta['ofertaid']?>" id="ofertaid" name="ofertaid">
                    <input type="hidden" value="<?php echo $oferta['ofertanombre']?>" id="ofertanombre" name="ofertanombre">
                    <input type="hidden" value="<?php echo $oferta['ofertafechainicio']?>" id="ofertafechainicio" name="ofertafechainicio">
                    <input type="hidden" value="<?php echo $oferta['ofertafechafin']?>" id="ofertafechafin" name="ofertafechafin">
                    <input type="hidden" value="<?php echo $oferta['ofertaprecio']?>" id="ofertaprecio" name="ofertaprecio">

                    <td>  <button type="submit">Actualizar</button></td>
                </form>
                
                <form method="POST" action="?controlador=Oferta&accion=eliminarOferta">

                    <input type="hidden" value="<?php echo $oferta['ofertaid']?>" id="ofertaid" name="ofertaid">

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