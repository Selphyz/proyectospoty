var listado=$('.nombre').map(function(index, element){
    return element.innerText;
});
var s=true;
// console.log(listado);
var ns = {
    activa: 0,
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
        $('#player').prop('volume', $('.volume').val()/100);
    },
    tiempo: function(){
        $('#player').prop('currentTime', $('.trackslider').val());
        console.log($('.trackslider').val())/100;
    },
};
$(document).ready(function(){
    $('#myAudio').on('ended', function() {
        ns.next();
        // enable button/link
    });
    $('.playcancion').on('click', function(){
        ns.especifica($(this).attr('cancion'));
    });
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
    $('.volume').change(function () {
        ns.cambiaVol();
    });
    $('.trackslider').change(function () {
        ns.tiempo();
        // console.log($('.trackslider').val());
    });
    $('#player').bind('timeupdate', function () {
        $('.trackslider').val($('#player').prop('currentTime'));
    })
});