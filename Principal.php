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
	<title>Pets Home y los perrinis</title>
</head>
<body>
	<div class="header">
		Titulo de la tienda

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
	<div class= "menu">
		<a href="?p=principal">Principal</a>
		<a href="?p=adopta">Adopta</a>
		<a href="?p=contactenos">Contactenos</a>
		<a href="Modulos/Registro_Usuario.php">Registrar usuario</a>
		<a href="Login.php">Iniciar sesión</a>
		<a href="Modulos/Exit.php">Salir</a>
	</div>
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