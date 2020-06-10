<!DOCTYPE html>
<html lang="en">

<?php
//include_once 'public/navbarAdmin.php';
?>

<body>
<div class="page-wrapper bg-gra-03 p-t-45 p-b-50">
    <h2 class="title">CRUD DE SERVICIOS</h2>
    <ul>
    <li><a href="?controlador=Servicio&accion=cargarCrearServicio">Crear Servicio</a></li>
    <li><a href="?controlador=Servicio&accion=cargarVerServicios">Ver Servicios</a></li>
    </ul>

    <h2 class="title">CRUD DE CABANNA</h2>
    <ul>
    <li><a href="?controlador=Cabana&accion=cargarCrearCabana">Crear CABANNA</a></li>
    <li><a href="?controlador=Cabana&accion=cargarVerCabanas">Ver CABANNA</a></li>
    </ul>

    <h2 class="title">CRUD DE CARACTERISTICAS</h2>
    <ul>
    <li><a href="?controlador=Cabana&accion=cargarCrearCabanaCaracteristicas">Crear CARACTERISTICAS</a></li>
    <li><a href="?controlador=Cabana&accion=cargarVerCaracteristicas">Ver CARACTERISTICAS</a></li>
    </ul>
    
    
    <h2 class="title">CRUD DE IMAGEN</h2>
    <ul>
    <li><a href="?controlador=Cabana&accion=cargarCrearCaracteristicaImagen">Crear IMAGEN</a></li>
    <li><a href="?controlador=Cabana&accion=cargarVerCaracteristicaImagen">Ver IMAGEN</a></li>
    </ul>

    <h2 class="title">CRUD DE DIRECCION</h2>
    <ul>
    <li><a href="?controlador=Cabana&accion=cargarCrearDireccion">Crear DIRECCION</a></li>
    <li><a href="?controlador=Cabana&accion=cargarVerDireccion">Ver DIRECCION</a></li>
    </ul>

    <h2 class="title">CRUD DE PROPIETARIO</h2>
    <ul>
    <li><a href="?controlador=Cabana&accion=cargarCrearPropietario">Crear PROPIETARIO</a></li>
    <li><a href="?controlador=Cabana&accion=cargarActualizarEliminarPropietario">Ver PROPIETARIO</a></li>
    </ul>

    <h2 class="title">CRUD DE PRECIO</h2>
    <ul>
    <li><a href="#">Crear PRECIO</a></li>
    <li><a href="#">Ver PRECIO</a></li>
    </ul>

    <h2 class="title">CRUD DE CLIENTE</h2>
    <ul>
    <li><a href="?controlador=Cliente&accion=cargarCrearCliente">Crear CLIENTE</a></li>
    <li><a href="?controlador=Cliente&accion=cargarVerCliente">Ver CLIENTE</a></li>
    </ul>

    <h2 class="title">CRUD DE TELEFONO</h2>
    <ul>
    <li><a href="?controlador=Cliente&accion=listarClientes">Crear TELEFONO</a></li>
    <li><a href="?controlador=Cliente&accion=cargarVerTelefonos">Ver TELEFONO</a></li>
    </ul>

    <h2 class="title">CRUD DE CORREO</h2>
    <ul>
    <li><a href="?controlador=Cliente&accion=listarClientesCorreo">Crear CORREO</a></li>
    <li><a href="?controlador=Cliente&accion=cargarVerCorreos">Ver CORREO</a></li>
    </ul>
    <h2 class="title">CRUD DE TARIFA</h2>
    <ul>
    <li><a href="?controlador=Cabana&accion=listarCabanaTarifa">Crear TARIFA</a></li>
    <li><a href="?controlador=Cabana&accion=cargarVerTarifa">Ver TARIFA</a></li>
    </ul>
    <h2 class="title">CRUD DE TEMPORADA</h2>
    <ul>
    <li><a href="?controlador=Temporada&accion=cargarCrearTemporada">Crear TEMPORADA</a></li>
    <li><a href="?controlador=Temporada&accion=cargarVerTemporadas">Ver TEMPORADAS</a></li>
    </ul>
    <h2 class="title">CRUD DE RESERVA</h2>
    <ul>
    <li><a href="?controlador=Reserva&accion=cargarCrearReserva">Crear RESERVA</a></li>
    <li><a href="?controlador=Reserva&accion=cargarVerReserva">Ver RESERVAS</a></li>
    <li><a href="?controlador=Reserva&accion=cargarFiltroReserva">Buscar RESERVAS</a></li>
    <li><a href="?controlador=Reserva&accion=cargarCabanasParaCalendario">Calendario</a></li>
    </ul>
    <h2 class="title">CRUD DE CUENTA PROPIETARIO</h2>
    <ul>
    <li><a href="?controlador=Cabana&accion=cargarFormPropietarioCuenta">Insertar cuenta a propietarios</a></li>
    <li><a href="?controlador=Cabana&accion=cargarSeleccionarPropietarioCuenta">Ver cuentas</a></li>
    </ul>
    <h2 class="title">CRUD DE OFERTAS</h2>
    <ul>
    <li><a href="?controlador=Oferta&accion=cargarCrearOferta">Insertar ofertas</a></li>
    <li><a href="?controlador=Oferta&accion=verOfertas">Ver ofertas</a></li>
    </ul>
    <h2 class="title">CERRAR SESION</h2>
    <ul>
    <li><a href="?controlador=Usuario&accion=cerrarSesion">Salir</a></li>
    </ul>
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