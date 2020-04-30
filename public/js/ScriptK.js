function agregarCriterioValorPrioridad(criterio,valor,prioridad) {
    
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