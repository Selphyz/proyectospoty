<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css">
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.css">
    <title>cola de reproducción</title>
</head>
<body>
    <div class="container bg-dark">
        <h4>Cola de reproducción</h4>
        <!-- Cada pista será un div con ARTISTA - Título y al final botones Me gusta y Añadir -->
        <!-- La pista activa en ese momento iría en color text-SUCCESS -->
        <!-- TO-DO - click en pista pausa o reproduce según esté-->
        <div id="pista" class="d-flex justify-content-between bg-primary p-1 text-success">
            <div id="informacion">
                <span class="text-uppercase" id="artista" name="artista">ACDC</span> - 
                <span id="titulo" name="titulo">Highway to Hell</span>
            </div>
            <div id="acciones">
                <i id="corazon" class="far fa-heart px-1"></i>
                <!-- <i class="fas fa-heart px-1"></i> -->
                <i class="fas fa-plus px-1"></i>
            </div>
        </div>
        <div id="pista" class="d-flex justify-content-between bg-primary p-1">
            <div id="informacion">
                <span class="text-uppercase" id="artista" name="artista">ACDC</span> - 
                <span id="titulo" name="titulo">Thunderstruck</span>
            </div>
            <div id="acciones">
                <i class="far fa-heart px-1"></i><i class="fas fa-heart px-1"></i><i class="fas fa-plus px-1"></i>
            </div>
        </div>
        <div id="pista" class="d-flex justify-content-between bg-primary p-1">
            <div id="informacion">
                <span class="text-uppercase" id="artista" name="artista">Héroes del Silencio</span> - 
                <span id="titulo" name="titulo">Avalancha</span>
            </div>
            <div id="acciones">
                <i class="far fa-heart px-1"></i><i class="fas fa-heart px-1"></i><i class="fas fa-plus px-1"></i>
            </div>
        </div>
        <div id="pista" class="d-flex justify-content-between bg-primary p-1">
            <div id="informacion">
                <span class="text-uppercase" id="artista" name="artista">Scorpions</span> - 
                <span id="titulo" name="titulo">Blackout</span>
            </div>
            <div id="acciones">
                <i class="far fa-heart px-1"></i><i class="fas fa-heart px-1"></i><i class="fas fa-plus px-1"></i>
            </div>
        </div>
    </div>

    <script src="node_modules/jquery-3.4.1.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.js"></script>
    <script src="cola_repr.js"></script>
</body>
</html>