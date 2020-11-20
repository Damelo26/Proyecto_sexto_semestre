<?php 
	$alert='';
	session_start();	
	if(!empty($_SESSION['active'])){
		if($_SESSION['ID_Rol'] == 1){
			header('location: Estadistica_Admin.php');
		}else if($_SESSION['ID_Rol'] != 1){
			header('location: index.php');
		}	
	}else{
		if(!empty($_POST)){
			if(empty($_POST['usuario']) || empty($_POST['clave'])){
				$alert = 'Ingrese su usuario y contraseña';
			}else{
				require_once "Configuraciones/Funciones.php";
				$user = mysqli_real_escape_string($conexion,$_POST['usuario']);
				$pass = md5(mysqli_real_escape_string($conexion,$_POST['clave']));

				$query = mysqli_query($conexion,"SELECT * FROM usuario WHERE Usuario = '$user' AND Contrasena = '$pass'");
				$result = mysqli_num_rows($query);

				if($result > 0 ){
					$data = mysqli_fetch_array($query);
					$_SESSION['active'] = true;
					$_SESSION['cedula'] = $data['Cedula'];
					$_SESSION['Primer_Nombre'] = $data['Primer_Nombre'];
					$_SESSION['Segundo_Nombre'] = $data['Segundo_Nombre'];
					$_SESSION['Primer_Apellido'] = $data['Primer_Apellido'];
					$_SESSION['Segundo_Apellido'] = $data['Segundo_Apellido'];
					$_SESSION['Correo'] = $data['Email'];
					$_SESSION['Telefono'] = $data['Telefono'];
					$_SESSION['Direccion'] = $data['Direccion'];
					$_SESSION['Usuario'] = $data['Usuario'];
					$_SESSION['Contrasena'] = $data['Contrasena'];
					$_SESSION['Imagen'] = $data['Imagen'];
					$_SESSION['ID_Rol'] = $data['ID_Rol'];
					if($_SESSION['ID_Rol'] == 1){
						header('location:Estadistica_Admin.php');
					}else if($_SESSION['ID_Rol'] != 1){
						header('location:index.php');
					}	
				}else{
					$alert = 'El usuario o la contraseña son incorrectos';
					session_destroy();
				}
			}
	}
}
 ?>
<?php include_once 'Modulos/Templates/header.php';  ?>
	<section id="contenedorlogin">	
		<form action="" method="post">
			<h3>Iniciar sesion</h3>
			<img src="img/Inicio_Sesion65.png" alt="Login">
			<input type="text" name="usuario" placeholder="Usuario">
			<input type="password" name="clave" placeholder="Contraseña">
			<div class="alert"><?php echo isset($alert) ? $alert : ''; ?></div>
			<input type="submit" value="Ingresar">
		</form> 
	</section>
	<?php include_once 'Modulos/Templates/footer.php';?>