var ns = {

    canciones: ['cancion1.mp3', 'cancion2.mp3'],
    activa: 0,
    play : function(){
        $('#player').attr('src', ns.canciones[ns.activa])
        $('#player').trigger('play');
    },
    next : function(){
        ns.activa=ns.activa+1;
        if (ns.activa==ns.canciones.length){
            ns.activa=0;
        }
        ns.play();
    },
    goTo: function(obj){
        ns.activa=obj.getAttribute('numeroCancion');
        ns.play();
    },
    stop: function(){
        $('#player').trigger('stop');
    }
}

$(document).ready(function(){
    $('#btnBuscar').on("click", function(){
        ns.buscar();
    })
    $('#btnIniciar').on('click', function(){
        ns.play();
    });
    $('#player').on('ended', function(){
        ns.next();
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