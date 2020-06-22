<!DOCTYPE html>
<html lang="en">

<?php
//include_once 'public/navbarAdmin.php';
?>
<script src="public/js/ScriptK.js"></script>
<head>
    <meta charset="UTF-8">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

</head>

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
                            <th>Cabaña</th>
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
                                <td><?php echo $planes['cabanaid'] ?></td>
                                <td>₡<?php echo $planes['planmonto'] ?></td>

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
                    <label for="numeroCuotas">Elija si desea ingresar la cantidad de cuotas</label>
                    <input type="checkbox" id="opcion2" name="opcion2" onclick="cuotas(2)">
                    <br>
                    <br>
                    <label for="opcion">Elija si desea seleccionar la fecha fin</label>
                    <input type="checkbox" id="opcion" name="opcion" onclick="cuotas(1)">
                    <br>
                    <br>
                    <label id="l1" for="numeroCuotas" style="display:none">Ingrese la cantidad de cuotas</label>
                    <input type="number" id="numerocuotas" name="numerocuotas" style="display:none">
                    <br>
                    <br>
                    <label id="l2" for="fechafin" style="display:none">Elija fecha de fin de pagos</label>
                    <br>
                    <input type="date" id="fechafin" name="fechafin" style="display:none">
                    <br>
                    <br>
                    <button type="button" data-toggle="modal" data-target="#Modal">Adquirir</button>
                     <!-- Modal -->
                <div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="ModalLabel">Adquirir Plan</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                ¿Esta seguro de adquirir este plan?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                <button type="submit" class="btn btn-success" >Confirmar</button>
                            </div>
                        </div>
                    </div>
                </div>
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