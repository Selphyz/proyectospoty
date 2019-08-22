$(document).ready(function(){
    //Evento para cambiar el icono del corazón dar like - quitar like
    $("#corazon").click(function () {
        if ($("#corazon").hasClass("far")){
            $(this).removeClass("far");
            $(this).addClass("fas");
        }else{
            $(this).removeClass("fas");
            $(this).addClass("far");
        }
    });

    //Cambiamos el color al pasar el ratón
    $("#pista").mouseenter(function () {
        $(this).removeClass("bg-primary");
        $(this).addClass("bg-default");
    });

    $("#pista").mouseleave(function () {
        $(this).removeClass("bg-default");
        $(this).addClass("bg-primary");
    });
});