// var listado=$('.nombre').map(function(index, element){
//     return element.innerText;
// });

var s=true;
var ns = {
    activa: 0,
    listado: $('td:nth-of-type(2)').map(function(index, element){
        return element.innerText;
    }),
    recargarLista: function(){
        listado=$('td:nth-of-type(2)').map(function(index, element){
            return element.innerText;
        });
    },
    pause : function(){
        if(s)
        {
            $('#player').trigger('pause');
            s=false;
        }
        else {
            $('#player').trigger('play');
            s=true;
        }
    },
    play : function(){
        $('#player').attr('src', 'assets/audio/' + listado[ns.activa] + '?rand=' + Math.random());
        $('#player').trigger('play');
        $('#pistaActual').text(' '  +  listado[ns.activa]);
    },
    previous : function(){
        ns.activa=parseInt(ns.activa)-1;
        if (ns.activa<0){
            ns.activa=0;
        }
        ns.play();
    },
    next : function(){
        ns.activa=parseInt(ns.activa)+1;
        console.log('assets/audio/'+listado[ns.activa]);
        if (ns.activa===listado.length){
            ns.activa=0;
        }
        console.log(ns.activa);
        ns.play();
    },
    especifica : function(cancion){
        console.log(cancion);
        ns.activa=parseInt(cancion);
        console.log(ns.activa);
        ns.play();
    },
    // goTo: function(obj){
    //     ns.activa=obj.getAttribute('numeroCancion');
    //     ns.play();
    // },
    stop: function(){
        $('#player').trigger('pause');
        $('#player').attr('src', '');
        // $('#player').foreach(function(obj){
        //     obj.pause();
        //     obj.currentTime=0;
        // });
        // $('#player').trigger('stop');
    },
    mute: function(){
        if( $('#player').prop('muted') )
        {
            $('#player').prop('muted', false);
        }
        else {
        $('#player').prop('muted', true);
        }
        var enchufe=$('#btnMute>i');
        enchufe.toggleClass('fas fa-volume-up');
        enchufe.toggleClass('fas fa-volume-mute');
    },
    cambiaVol: function(){
        $('#player').each(function(){
            $('#player').prop('volume', $('.volume').val()/100);
            console.log($('.volume').val()/100);
        });
    },
    tiempo: function(){
        $('#player').each(function(){
            var track=parseInt($('.trackslider').val());
            var duration=parseInt($('#player').prop('duration'));
            var salida=100/duration;
            $('#player').prop('currentTime', track/salida);
            console.log(track/salida);
        });
    },
    formatearColumna: function(id, row, index){
        
        return "<a onclick='ns.especifica(" + index + ")' class='playcancion' cancion='" + index + "'> "+ 
                    " <i class='fas fa-play-circle' style='cursor: pointer;'></i> " +
                "</a>";         
    },

    iconoBorrar: function(id, row, index){
        
        return "<i id='iconoBorrar' class='fas fa-trash-alt' style='cursor: pointer;'></i>";         
    },
    iniciarColaReproduccion: function(){
        $('#ColaReproduccion').bootstrapTable({
            url: '/jsonListaMusica',
            sidePagination: 'server',
            pagination: true,
            search: true,
            pageSize: 5,
            searchAlign:'left', 
            showFooter: false,
            //onlyInfoPagination: true
            onLoadSuccess: function(){
                ns.recargarLista();
                console.log(listado);
            },
        });
    },
    //Carga las listas
    iniciarListas: function(){
        $('#tablaListas').bootstrapTable({
            url: '/jsonListas',
            sidePagination: 'server',
            // pagination: true,
            // search: true,
            // pageSize: 5,
            // searchAlign:'left', 
            showFooter: false,
            //onlyInfoPagination: true
        });
    },    

    listaNueva: function(){
        valor=prompt("Introduce el nombre de la lista");
        $.ajax({
            url: '/listaNueva/' + encodeURI(valor),
            success: function(data){
                $('#tablaListas').bootstrapTable('refresh');
            }
        })
    },

    //pendiente de modificar
    // borrarLista: function(){
    //     if(confirm("¿Seguro que desea borrar esta lista?")){
    //         valor=idLista; 
    //         $.ajax({
    //             url: '/borrarLista/' + encodeURI(valor),
    //             success: function(data){
    //                 alert("Lista borrada")
    //                 $('#tablaListas').bootstrapTable('refresh');
    //             }
    //         })
    //     }    
    // },
    
    /*
    if (confirm("Press a button!")) {
        txt = "You pressed OK!";
    } else {
        txt = "You pressed Cancel!";
    }
    */

    listaAddCancion: function(idCancion){
        idLista=$("input[name='listaSel']:checked").val();
        if (idLista>0){
            $.ajax({
                url: '/listaAddCancion/' + encodeURI(idCancion) + '/' + encodeURI(idLista),
                success: function(data){
                    alert(data);
                }
            })
        }
    },

};

$(document).ready(function(){
    let player=$('#player');
    player.on('ended', function() {
        ns.next();
        // enable button/link
    });
    $('.playcancion').on('click', function(){
        ns.especifica($(this).attr('cancion'));
    });
    /*$('.listaAddCancion').on('click', function(){
        ns.($(this).attr('idcancion'));
    });*/

    $('#btnPrevious').click(function () {
        ns.previous();
    });
    $('#btnPause').click(function () {
        ns.pause();
    });
    $('#btnPlay').click(function () {
        ns.play();
    });
    $('#btnNext').click(function () {
        ns.next();
    });
    $('#btnStop').click(function () {
        ns.stop();
    });
    $('#btnMute').click(function () {
        ns.mute();
    });
    $('#btnCrearLista').click(function () {
        ns.listaNueva();
    });
    $('.volume').change(function () {
        ns.cambiaVol();
    });
    $('.trackslider').change(function () {
        ns.tiempo();
        // console.log($('.trackslider').val());
    });
    $('.volume').on('input propertychange', function () {
        ns.cambiaVol();
    });
    $('.trackslider').on('input propertychange', function () {
        ns.tiempo();
        // console.log($('.trackslider').val());
    });
    $('#btnRecargar').click(function () {
        ns.iniciarListas();
    });
    // $('#iconoBorrar').click(function () {
    //     ns.iniciarListas();
    // });

    ns.iniciarColaReproduccion();
    player.bind('timeupdate', function () {
        var ahora=$('#player').prop('currentTime');
        var duration=$('#player').prop('duration');
        $('.trackslider').val((ahora/duration)*100);
    })

    ns.iniciarListas();

});