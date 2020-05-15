<!DOCTYPE html>
<html lang="en">

<?php
//include_once 'public/navbarAdmin.php';
?>

<body>
<div class="page-wrapper bg-gra-03 p-t-45 p-b-50">
    <h2 class="title">Lista de Cuentas</h2>
    <div class="container">
        <table>
        <th>ID Cuenta</th>
        <th>ID Propietario</th>
        <th>Numero Cuenta</th>
        <th>Estado</th>
        <th>Banco</th>
        <?php
            foreach ($vars['cuentas'] as $row) { ?>
                <tr>
                    <td><?php echo $row["propietariocuentabancariaid"] ?></td>
                    <td><?php echo $row["propietarioid"] ?></td>
                    <td><?php echo $row["propietariocuentabancariabanconumerocuenta"]?></td>
                    <td><?php echo $row["propietariocuentabancariaestado"]?></td>
                    <td><?php echo $row["propietariocuentabancariabanconombre"]?></td>
                    <form method="POST" action="?controlador=Cabana&accion=eliminarCuentaPropietario">
                    <input type="hidden" value="<?php echo $row["propietariocuentabancariaid"] ?>" id="idCuenta" name="idCuenta">
                    <td><button type="submit">Eliminar</button></td>
                    </form>
                    <form method="POST" action="?controlador=Cabana&accion=cargarActualizarCuenta">
                    <input type="hidden" value="<?php echo $row["propietariocuentabancariaid"] ?>" id="idCuenta" name="idCuenta">
                    <input type="hidden" value="<?php echo $row["propietariocuentabancariabanconumerocuenta"] ?>" id="cuenta" name="cuenta">
                    <input type="hidden" value="<?php echo $row["propietariocuentabancariaestado"] ?>" id="estado" name="estado">
                    <input type="hidden" value="<?php echo $row["propietariocuentabancariabanconombre"] ?>" id="banco" name="banco">
                    <td><button type="submit">Actualizar</button></td>
                    </form>
                </tr>
        <?php } ?>
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