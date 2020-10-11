<?php
if(!isset($Contenido)){
	$Contenido = "Contenido";
}else{
	$Contenido = $Contenido;
}
?>
<html>
<head> 
	<meta charset="UTF-8">
	<link rel="stylesheet" href="CSS/Estilo.css">
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;1,300;1,400&family=Oswald:wght@200;300;400;500;600;700&family=PT+Sans:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
	<title>Pets' Home </title>
	<link rel="stylesheet" href="css/normalize.css"> <!--Esta libreria es importante ya que nos hara que en todo lado el cod se vea igual /Lo normaliza/-->
</head>
<body>
	<div class="header">
	<header>
	PETS' HOME
	<figure>
	<li ><img src="img/logoprincipal.png" alt=""></li>
	</figure>
	</header>
	</div>
	<div class= "menu">
			<a href="?p=principal">Principal</a>
			<a href="?p=adopta">Adopta</a>
			<a href="?p=contactenos">Contactenos</a>
			<a href="Modulos/Registro_Usuario.php">Registrar usuario</a>
			<a href="Login.php">Iniciar sesión</a>
			<a href="Modulos/Exit.php">Salir</a>
		</div>
	</div>
	<!--<nav class="navegacion">
		<ul class="Menus">
			<li><a href="#">Inicio</a></li>
			<li><a href="#">Adopta</a>
				<ul class="submenu">
					<li><a href="#">Gatos</a></li>
					<li><a href="#">Perros</a></li>
					<li><a href="#">Tigres</a></li>
				</ul>
				 
			</li>
			<li><a href="#">Contacto</a></li>		
		</ul>
	</nav>-->
	<div class="contenedor">
		<div class="cuerpo">
			<?php
				if(file_exists("Modulos/".$Contenido.".php")){
					include "Modulos/".$Contenido.".php";
				}else{
					echo "<i>No se ha encontrado el modulo <b>".$Contenido."</b> <a href='./'>Regresar</a></i>";
				}
			?>
		</div>
		
	<div class="footer">
		Copyright Nombre de la empresa &copy; <?=date("Y")?>
	</div>	
</body>
</html>