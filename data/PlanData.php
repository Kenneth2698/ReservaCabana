<?php

class PlanData
{
    protected $db;

    public function __construct()
    {
        require 'libs/SPDO.php';

        $this->db = SPDO::singleton();
    } //constructor

    public function insertarPlan($cantDias, $monto, $cantCuotas, $restricciones)
    {

        $consulta = $this->db->prepare("
            INSERT INTO tbplan (plancantidaddias,planmonto,plannumerocuotas,planrestricciones)  VALUES ( $cantDias,$monto,$cantCuotas,'$restricciones');");


        $consulta->execute();
        $consulta->CloseCursor();
    }


    public function obtenerTemporadas()
    {

        $consulta = $this->db->prepare('SELECT tbtemporadaid, tbtemporadanombre,tbtemporadafechainicio,tbtemporadafechafinal FROM tbtemporada');


        $consulta->execute();
        $resultado = $consulta->fetchAll();
        $consulta->CloseCursor();


        return $resultado;
    }

    public function obtenerPlanes()
    {

        $consulta = $this->db->prepare('SELECT planid,plancantidaddias,planmonto,plannumerocuotas,planrestricciones FROM tbplan');


        $consulta->execute();
        $resultado = $consulta->fetchAll();
        $consulta->CloseCursor();


        return $resultado;
    }

    public function obtenerFechasTemmporada($r)
    {
        $consulta = $this->db->prepare("SELECT tbtemporadafechainicio,tbtemporadafechafinal FROM tbtemporada WHERE tbtemporadaid = $r");


        $consulta->execute();
        $resultado = $consulta->fetchAll();
        $consulta->CloseCursor();


        return "Del " . $resultado[0][0] . " al " . $resultado[0][1];
    }


    public function obtenerClientes()
    {

        $consulta = $this->db->prepare('
                                        SELECT clienteid,clientenombrecompleto
                                        FROM tbcliente');


        $consulta->execute();
        $resultado = $consulta->fetchAll();
        $consulta->CloseCursor();


        return $resultado;
    }

    public function insertarCompraPlan($clienteid, $planid)
    {

        $consulta = $this->db->prepare("
            INSERT INTO tbcompraplan (clienteid,planid)  VALUES ( $clienteid,$planid);");


        $consulta->execute();
        $consulta->CloseCursor();
    }


    public function obtenerUltimaCompra($clienteid)
    {

        $consulta = $this->db->prepare("SELECT MAX(compraplanid) as id FROM tbcompraplan WHERE clienteid = $clienteid");


        $consulta->execute();
        $resultado = $consulta->fetchAll();
        $consulta->CloseCursor();


        return $resultado[0][0];
    }

    public function obtenerMontoYCuotas($planid)
    {

        $consulta = $this->db->prepare("SELECT (planmonto/plannumerocuotas) AS montomensual,plannumerocuotas FROM tbplan WHERE planid = $planid");


        $consulta->execute();
        $resultado = $consulta->fetchAll();
        $consulta->CloseCursor();


        return $resultado[0];
    }

    public function registrarAbonosPendientes($compraid, $fechaCobro, $monto)
    {

        $fechaAbono = 'NULL';
        $pagado = 0;

        $consulta = $this->db->prepare("INSERT INTO tbabonoplan (compraplanid,fechacobro,fechaabono,pagado,monto)  VALUES ( $compraid,'$fechaCobro',$fechaAbono,$pagado,$monto);");
        $consulta->execute();
        $consulta->CloseCursor();
    }

    public function obtenerTodosLosAbonos($clienteid)
    {


        $consulta = $this->db->prepare("SELECT a.abonoplanid ,c.planid, a.fechacobro,a.fechaabono,a.pagado,a.monto FROM tbabonoplan a
                                        JOIN tbcompraplan c
                                        ON a.compraplanid = c.compraplanid
                                        WHERE c.clienteid = $clienteid
                                        ");
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        $consulta->CloseCursor();


        return $resultado;
    }

    public function abonarPlan($abonoplanid)
    {
        $consulta = $this->db->prepare("UPDATE tbabonoplan
                                        SET pagado = 1, fechaabono = NOW()
                                        WHERE abonoplanid = $abonoplanid
                                        ");
        $consulta->execute();
        $consulta->CloseCursor();
    }


    public function transferirPlan($cliente_nuevo, $compraplanid)
    {
        $consulta = $this->db->prepare("UPDATE tbcompraplan
                                        SET clienteid= $cliente_nuevo
                                        WHERE compraplanid = $compraplanid
                                        ");
        $consulta->execute();
        $consulta->CloseCursor();
    }


    public function obtenerPlanesCliente($clienteid)
    {
        $consulta = $this->db->prepare("SELECT compraplanid, planid, clienteid
                                        FROM tbcompraplan
                                        WHERE clienteid = $clienteid
                                        ");
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        $consulta->CloseCursor();

        return $resultado;
    }
}
