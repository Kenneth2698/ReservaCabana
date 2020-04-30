function agregarCriterioTelefono(criterio,valor) {

    var parametros = {
        "criterio": criterio,
        "valor": valor
    };

    $.ajax(
        {
            data: parametros,
            url: '?controlador=Cliente&accion=ampliarListaTel',
            type: 'post',
            beforeSend: function () {
                
            },
            success: function () {
                

            },

        }
    );
}