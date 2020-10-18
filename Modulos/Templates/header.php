<?php

    session_start();
    if(!isset($_SESSION['ID_Rol'])){
	   $imagen="img/Imagenes_Perfil/Perfil_I.png";
	   $usuario="Invitado";
    }else{
        if($_SESSION['ID_Rol'] >0){
			$usuario=$_SESSION['Primer_Nombre']." ".$_SESSION['Primer_Apellido'];
			$imagen=$_SESSION['Imagen'];
        }
    }

?>


<html>
<head> 
	<meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="CSS/Stylesesion.css">
	<link rel="stylesheet" href="CSS/Estilo.css">
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;1,300;1,400&family=Oswald:wght@200;300;400;500;600;700&family=PT+Sans:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
	<title>Pets' Home </title>
	<link rel="stylesheet" href="CSS/normalize.css"> <!--Esta libreria es importante ya que nos hara que en todo lado el cod se vea igual /Lo normaliza/-->
    <script src = "https://kit.fontawesome.com/b99e675b6e.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
</head>
<body>
<div class="Alinear_Header">
	<header class="header">
		<figure>
			<img src="img/logoprincipal.png" alt="">
		</figure>
		<p class="tamanoTitulo">PETS' HOME</p>
		
		<div class="perfil">
				
				<div class="imagen">
			<img src="<?php echo $imagen; ?>" >
				</div>
				<div class="Info_Perfil">
				<p>Bienvenido</p>
				<p class = "Perfil_Nombre"><?php echo $usuario;?></p>
				
			</div>
			
		</div>
	</header>	
</div>
	
	
	<div class= "menu">
			<a href="Principal.php">Principal</a>
			<a href="Adopta.php">Adopta</a>
			<a href="Contactenos.php">Contactenos</a>
			<a href="Registro_Usuario.php">Registrar usuario</a>
			<a href="Login.php">Iniciar sesión</a>
			<a href="Modulos/Exit.php">Salir</a>
		</div>

	</div>
		