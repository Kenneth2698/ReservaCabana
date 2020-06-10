function agregarCriterioValorPrioridad(criterio, valor, prioridad) {

    var parametros = {
        'criterio': criterio,
        'valor': valor,
        'prioridad': prioridad

    };

    $.ajax(
        {
            data: parametros,
            url: '?controlador=Cabana&accion=agregarCriterioValorPrioridad',
            type: 'post',
            beforeSend: function () {

            },
            success: function () {

                //alert(response);
            },

        }
    );
}


function agregarRestriccion(idTemporada){
    var parametros = {
        'idTemporada': idTemporada,
    };

    $.ajax(
        {
            data: parametros,
            url: '?controlador=Plan&accion=agregarRestriccion',
            type: 'post',
        }
    );

    var $mensaje = $("#mensaje");
    var text = "Se agregó correctamente";
    $mensaje.text(text);
}

function obtenerValoresDeTabla(idtabla) {
    let criterios = "";
    var valores = "";
    var caracteristicaId = 0;

    $('#' + idtabla + ' th').each(function (index) {
        if (index > 1) {
            criterios += $(this).text() + ',';
        }

    });

    $('#' + idtabla + ' td').each(function (index) {
        if (index > 1) {
            valores += $(this).text() + ',';
        } else if (index == 0) {
            caracteristicaId = $(this).text();
        }
    });


    criterios = criterios.substring(0, criterios.length - 1);
    valores = valores.substring(0, valores.length - 1);

    var parametros = {
        'criterio': criterios,
        'valor': valores,
        'caracteristicaid': caracteristicaId
    };

    $.ajax(
        {
            data: parametros,
            url: '?controlador=Cabana&accion=actualizarCriterioValor',
            type: 'post',
            beforeSend: function () {

            },
            success: function () {

                // alert("response");
            },

        }
    );
}

function obtenerValoresDeTablaImagenes(idtabla) {

    let nombres = "";
    var rutas = "";
    var imagenId = 0;

    $('#' + idtabla + ' th').each(function (index) {
        if (index > 0) {
            nombres += $(this).text() + ',';
        }

    });

    $('#' + idtabla + ' td').each(function (index) {
        if (index > 0) {
            rutas += $(this).text() + ',';
        } else if (index == 0) {
            imagenId = $(this).text();
        }
    });


    nombres = nombres.substring(0, nombres.length - 1);
    rutas = rutas.substring(0, rutas.length - 1);

    var parametros = {
        'nombres': nombres,
        'rutas': rutas,
        'imagenId': imagenId
    };

    $.ajax(
        {
            data: parametros,
            url: '?controlador=Cabana&accion=actualizarImagen',
            type: 'post',
            beforeSend: function () {

            },
            success: function () {

                // alert("response");
            },

        }
    );
}