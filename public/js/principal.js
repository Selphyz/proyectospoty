var ns = {

    reproducir: function(){
        //Código
    },
    buscar: function(){
        val=$('#txtBuscar').val();
        $.ajax({
            url:"/musicaBuscar",
            data: {
                texto: val
            },
            success: function(res){
                $('#divResultados').html(res);
            }
        });
    }

}

$(document).ready(function(){
    $('#btnBuscar').on("click", function(){
        ns.buscar();
    })
})