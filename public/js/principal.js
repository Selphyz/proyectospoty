var listado=$(".nombre").map(function(index, element){
    return element.innerText;
});
var s=true;
console.log(listado);
var ns = {
    // canciones: ['AC DC - Highway To Hell (1979) - 03 - Walk All Over You.mp3', 'cancion2.mp3'],
    activa: 0,
    pause : function(){
        if(s)
        {
            $("#player").trigger('pause');
            s=false;
        }
        else {
            $("#player").trigger('play');
            s=true;
        }
    },
    play : function(){
        $('#player').attr('src', 'assets/audio/' + listado[ns.activa] + '?rand=' + Math.random());
        $('#player').trigger('play');
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
        console.log("assets/audio/"+listado[ns.activa]);
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
        if( $("#player").prop('muted') )
        {
            $("#player").prop('muted', false);
        }
        else {
        $("#player").prop('muted', true);
        }
        $("#btnMute>i").toggleClass("fas fa-volume-up");
        $("#btnMute>i").toggleClass("fas fa-volume-mute");
    },
    recargarCanciones(){
        /*canciones=[];
        $('#claseCancion').forEach(function(obj){
            array_push(obj.getAttribute('ruta'));
        }*/
    }
};

$(document).ready(function(){
    $('.playcancion').on('click', function(){
        ns.especifica($(this).attr('cancion'));
    });
    $('#player').on('ended', function(){
        ns.next();
    });
    $('#btnPrevious').on('click', function(){
        ns.previous();
    });
    $('#btnPause').on('click', function(){
        ns.pause();
    });
    $('#btnPlay').on('click', function(){
        ns.play();
    });
    $('#btnNext').on('click', function(){
        ns.next();
    });
    $('#btnStop').on('click', function(){
        ns.stop();
    });
    $('#btnMute').on('click', function(){
        ns.mute();
    });
    $('.btn-song').on('click', function(){
        ns.goTo(this);
    });
});