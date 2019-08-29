var ns = {

    canciones: ['AC DC - Highway To Hell (1979) - 03 - Walk All Over You.mp3', 'cancion2.mp3'],
    activa: 0,
    play : function(){
        $('#player').attr('src', 'assets/audio/' + ns.canciones[ns.activa] + '?rand=' + Math.random());
        $('#player').trigger('play');
    },
    previous : function(){
        ns.activa=ns.activa-1;
        if (ns.activa<0){
            ns.activa=0;
        }
        ns.play();
    },
    next : function(){
        ns.activa=ns.activa+1;
        if (ns.activa==ns.canciones.length){
            ns.activa=0;
        }
        alert(ns.activa);
        ns.play();
    },
    // goTo: function(obj){
    //     ns.activa=obj.getAttribute('numeroCancion');
    //     ns.play();
    // },
    stop: function(){
        $('#player').trigger('stop');
    },
    recargarCanciones(){
        /*canciones=[];
        $('#claseCancion').forEach(function(obj){
            array_push(obj.getAttribute('ruta'));
        }*/
    }
}

$(document).ready(function(){
    $('#btnBuscar').on("click", function(){
        ns.buscar();
    })
    $('#btnIniciar').on('click', function(){
        ns.play();
    });
    $('#btnPlay').on('click', function(){
        ns.play();
    });
    $('#player').on('ended', function(){
        ns.next();
    })
    $('#btnPrevious').on('click', function(){
        ns.previous();
    })
    $('#btnNext').on('click', function(){
        ns.next();
    })
    $('#btnStop').on('click', function(){
        ns.stop();
    })
    $('.btn-song').on('click', function(){
        ns.goTo(this);
    });
})