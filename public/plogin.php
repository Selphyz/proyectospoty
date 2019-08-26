<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
   
	<link href="https://stackpath.bootstrapcdn.com/bootswatch/4.3.1/slate/bootstrap.min.css" rel="stylesheet" integrity="sha384-FBPbZPVh+7ks5JJ70RJmIaqyGnvMbeJ5JQfEbW0Ac6ErfvEg9yG56JQJuMNptWsH" crossorigin="anonymous">

	<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	
	

  
    <style>
    

body{
	font-size: 12px;
 	background-image: url("https://www.lacupulamusic.com/assets/img/home2.jpg");
}

#Contenedor{
	width: 450px;
	margin: 50px auto;
    border: 1px solid #ECE8E8;
	height: 350px;
	border-radius:8px;
	padding: 0px 9px 0px 9px;
	opacity: 0.75;
	background-color:black;
}


.Icon span{
	  background: #A8A6A6;
      padding: 10px;
      border-radius: 80px;
}

.Icon{
     margin-top: 10px;
     margin-bottom:10px; 
     font-size: 50px;
     text-align: center;
}

.opcioncontra{
	text-align: center;
	margin-top: 20px;
	font-size: 14px;
}

	

   </style>
   
</head>
<body>
    
<div id="Contenedor">
		 <div class="Icon">
                    
                   <span><i class="glyphicon glyphicon-user"></i></span>
         </div>
<div class="ContentForm">
		 	<form action="" method="post" name="FormEntrar">
		 		<div class="input-group input-group-lg">
				  <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
				  <input type="email" style="height:46px;" class="form-control" name="correo" placeholder="Correo" id="Correo" required>
				</div>
				<br>
				<div class="input-group input-group-lg">
				  <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
				  <input type="password" style="height:46px;" name="contra" class="form-control" placeholder="******" required>
				</div>
				<br>
				<button class="btn btn-lg btn-primary btn-block btn-signin" id="IngresoLog" type="submit" >Entrar</button>
				
				<div class="opcioncontra"><a href="/proyectospoty/pregistro.php">¿No tienes cuenta? Crea una aqui</a></div>
		 	</form>
		 </div>	
		 </div>
		 <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
</body>
</html>