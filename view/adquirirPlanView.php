<!DOCTYPE html>
<html lang="en">

<?php
//include_once 'public/navbarAdmin.php';
?>
<script src="public/js/ScriptK.js"></script>
<body>
    <div class="page-wrapper bg-gra-03 p-t-45 p-b-50">
        <h2 class="title">Adquirir plan</h2>
        <div class="container">
            <form method="POST" action="?controlador=Plan&accion=adquirirPlan">
                <label for="select_clientes">Elija un cliente</label>
                <br>
                <select name="select_clientes" id="select_clientes">
                    <?php
                    foreach ($vars['clientes'] as $row) { ?>
                        <option value="<?php echo $row[0] ?>"><?php echo $row[1] ?></option>
                    <?php

                    } ?>
                </select>
                <br>
                <br>

                <h2 class="title">Lista de planes</h2>
                <div class="container">
                    <table>
                        <tr>
                            <th>ID</th>
                            <th>Cantidad de dias</th>
                            <th>Monto del plan</th>
                            <th>Restricciones</th>

                        </tr>

                        <?php $contador = 0;
                        foreach ($vars['planes'] as $planes) { ?>
                            <tr>
                                <td>________________________</td>
                                <td>________________________</td>
                                <td>________________________</td>
                                <td>________________________</td>
                            </tr>
                            <tr>
                                <td><?php echo $planes['planid'] ?></td>
                                <td><?php echo $planes['plancantidaddias'] ?></td>
                                <td><?php echo $planes['planmonto'] ?></td>

                                <td>
                                    <?php
                                    foreach ($vars['fechas'][$contador] as $restricciones) {
                                        echo $restricciones . "<br>";
                                    }
                                    ?>
                                </td>
                            </tr>


                        <?php $contador++;
                        } ?>

                    </table>



                    <label for="select_plan">Elija el plan que desea adquirir</label>
                    <br>
                    <select name="select_planes" id="select_planes">
                        <?php
                        foreach ($vars['planes'] as $row) { ?>
                            <option value="<?php echo $row['planid'] ?>">Plan número <?php echo $row['planid'] ?></option>
                        <?php

                        } ?>
                    </select>
                    <br>
                    <br>
                    <label for="cantidadCuotas">Elija cada cuanto tiempo va a pagar las cuotas</label>
                    <br>
                    <select name="metodoCuotas" id="metodoCuotas">
                        <option value="7">Semanal </option>
                        <option value="14">Quincenal</option>
                        <option value="30">Mensual</option>
                    </select>
                    <br>
                    <br>
                    <label for="fechainicio">Elija fecha de inicio de pagos</label>
                    <br>
                    <input type="date" id="fechainicio" name="fechainicio">
                    <br>
                    <br>
                    <label for="opcion">Elija si desea seleccionar la fecha fin</label>
                    <input type="checkbox" id="opcion" name="opcion"  onchange="cuotas(1)">
                    <br>
                    <br>
                    <label  for="numeroCuotas">Elija si desea ingresar la cantidad de cuotas</label>
                    <input type="checkbox" id="opcion2" name="opcion2" onchange="cuotas(2)">
                    <br>
                    <br>

                    
                    <label id="l1"  for="numeroCuotas" style="display:none">Elija si desea ingresar la cantidad de cuotas</label>
                    <input type="number" id="numerocuotas" name="numerocuotas" style="display:none">
                    <br>
                    <br>
                    <label id="l2" for="fechafin" style="display:none">Elija fecha de fin de pagos</label>
                    <br>
                    <input type="date" id="fechafin" name="fechafin" style="display:none" >
                    <br>
                    <br>
                    <button type="submit">Adquirir</button>
            </form>
            <br><br><br><br>
            <a class="nav-item nav-link" href="?controlador=Plan&accion=seleccionarClienteVerAbonos">Ver abonos pendientes</a>
        </div>
    </div>


    <script src="public/vendor/jquery/jquery.min.js"></script>
    <script src="public/vendor/select2/select2.min.js"></script>
    <script src="public/vendor/datepicker/moment.min.js"></script>
    <script src="public/vendor/datepicker/daterangepicker.js"></script>
    <script src="public/js/global.js"></script>
</body>

</html>