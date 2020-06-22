<?php
require 'data/ActividadData.php';
require 'data/CabanaData.php';

class ActividadBusiness
{

    private $view;

    public function __construct()
    {
        $this->view = new View();
    }

    public function mostrarCrearActividad()
    {

        $cabanaData = new CabanaData();
        $resultado['cabanas'] = $cabanaData->obtenerCabanas();

        $this->view->show("seleccionarCabanaActividad.php", $resultado);
    }

    public function crearActividad()
    {
        $actividadData = new ActividadData();

        $actividadnombre = $_POST['nombreactividad'];
        $actividaddueno = $_POST['duenoactividad'];
        $actividaddescripcion = $_POST['descripcionactividad'];
        $actividadprecio = $_POST['precioactividad'];
        $actividadestado = 0; //estado 0=pendiente, 1=aceptado, 2=rechazado
        $actividadcabana = $_POST['select_cabanas'];



        $nombre = $_FILES['imagenactividad']['name'];
        $nombrer = strtolower($nombre);
        $cd = $_FILES['imagenactividad']['tmp_name'];
        $ruta = "./public/imgs/" . $_FILES['imagenactividad']['name'];
        $destino = "./public/imgs/" . $nombrer;
        $resultado = @move_uploaded_file($_FILES['imagenactividad']['tmp_name'], $ruta);
        if (!empty($resultado)) {
            $nombre2 = $_FILES['imagenactividad2']['name'];
            $nombrer2 = strtolower($nombre2);
            $cd2 = $_FILES['imagenactividad2']['tmp_name'];
            $ruta2 = "./public/imgs/" . $_FILES['imagenactividad2']['name'];
            $destino2 = "./public/imgs/" . $nombrer2;
            $resultado2 = @move_uploaded_file($_FILES['imagenactividad2']['tmp_name'], $ruta2);
            if (!empty($resultado2)) {
                echo "Su solicitud fue enviada espere a que el admin de la cabana la acepte o rechace";
                echo '<br><br>';
                echo '<a href="?controlador=Actividad&accion=volverAHome">Presione aqui para volver a inicio</a>';
            } else {
                echo "Error al subir el archivo 2";
            }
        } else {

            echo "Error al subir el archivo";
        }

        $actividadimagen1 = $nombrer;
        $actividadimagen2 = $nombrer2;

        $actividadData->crearActividad($actividadnombre, $actividaddueno, $actividaddescripcion, $actividadprecio, $actividadimagen1, $actividadimagen2, $actividadestado, $actividadcabana);
    }

    public function volverAHome()
    {
        $this->view->show("indexView.php");
    }


    public function mostrarVerActividadesCabana()
    {
        $cabanaData = new CabanaData();
        $resultado['cabanas'] = $cabanaData->obtenerCabanas();

        $this->view->show("verActividadesCabana.php", $resultado);
    }

    public function cargarActividades()
    {
        $cabanaid = $_POST["select_cabanas"];
        $actividadData = new ActividadData();
        $resultado["actividades"] = $actividadData->obtenerActividades($cabanaid);

        $this->view->show("verActividades.php", $resultado);
    }

    public function eliminarActividad()
    {
        $actividadid = $_POST["actividadid"];
        $cabanaid = $_POST["cabanaid"];
        $actividadData = new ActividadData();

        $actividadData->eliminarActividad($actividadid);

        $resultado["actividades"] = $actividadData->obtenerActividades($cabanaid);

        $this->view->show("verActividades.php", $resultado);
    }

    public function cargarActualizar()
    {
        $actividadData = new ActividadData();
        $actividadid = $_POST['actividadid'];

        $resultado["cabanas"] = $actividadData->cabanas();

        $resultado["a"] = $actividadData->obtenerActividadesActualizar($actividadid);


        $this->view->show("verActividadesActualizar.php", $resultado);
    }

    public function actualizarActividad()
    {
        $actividadData = new ActividadData();

        $actividadnombre = $_POST['nombreactividad'];
        $actividaddueno = $_POST['duenoactividad'];
        $actividaddescripcion = $_POST['descripcionactividad'];
        $actividadprecio = $_POST['precioactividad'];
        $actividadcabana = $_POST['select_cabanas'];

        if ($_FILES['imagenactividad']['size'] == 0 && $_FILES['imagenactividad2']['size'] == 0) {
            $actividadimagen1 = $_POST['imagen'];
            $actividadimagen2 = $_POST['imagen2'];

            //echo $actividadnombre, $actividaddueno, $actividaddescripcion, $actividadprecio, $actividadimagen1, $actividadimagen2, $actividadcabana, $_POST['actividadid'];

            $actividadData->actualizarActividad($actividadnombre, $actividaddueno, $actividaddescripcion, $actividadprecio, $actividadimagen1, $actividadimagen2, $actividadcabana, $_POST['actividadid']);

            $resultado["actividades"] = $actividadData->obtenerActividades($actividadcabana);

            $this->view->show("verActividades.php", $resultado);
        } else {
            $nombre = $_FILES['imagenactividad']['name'];
            $nombrer = strtolower($nombre);
            $cd = $_FILES['imagenactividad']['tmp_name'];
            $ruta = "./public/imgs/" . $_FILES['imagenactividad']['name'];
            $destino = "./public/imgs/" . $nombrer;
            $resultado = @move_uploaded_file($_FILES['imagenactividad']['tmp_name'], $ruta);
            if (!empty($resultado)) {
                $nombre2 = $_FILES['imagenactividad2']['name'];
                $nombrer2 = strtolower($nombre2);
                $cd2 = $_FILES['imagenactividad2']['tmp_name'];
                $ruta2 = "./public/imgs/" . $_FILES['imagenactividad2']['name'];
                $destino2 = "./public/imgs/" . $nombrer2;
                $resultado2 = @move_uploaded_file($_FILES['imagenactividad2']['tmp_name'], $ruta2);
                if (!empty($resultado2)) {
                    $actividadimagen1 = $nombrer;
                    $actividadimagen2 = $nombrer2;

                    $actividadData->actualizarActividad($actividadnombre, $actividaddueno, $actividaddescripcion, $actividadprecio, $actividadimagen1, $actividadimagen2, $actividadcabana, $_POST['actividadid']);

                    $r["actividades"] = $actividadData->obtenerActividades($actividadcabana);
        
                    $this->view->show("verActividades.php", $r);
                } else {
                    echo "Error al subir el archivo 2";
                }
            } else {

                echo "Error al subir el archivo";
            }
        }
    }


    public function cargarAceptarRechazar(){
        $actividadData = new ActividadData();
        $resultado["actividades"] = $actividadData->obtenerTodasActividades();

        $this->view->show("verActividadesAR.php", $resultado);
    }

    public function aceptarORechazar(){
        $valor = $_GET["valor"];
        $id = $_GET["id"];
        $actividadData = new ActividadData();
        $actividadData->aceptarORechazar($valor,$id);

        $resultado["actividades"] = $actividadData->obtenerTodasActividades();

        $this->view->show("verActividadesAR.php", $resultado);
    }
}
