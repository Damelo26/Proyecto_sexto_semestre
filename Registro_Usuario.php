<?php

	include "Configuraciones/Funciones.php";
	if(!empty($_POST)){
		$Register_alert='';
		if(empty($_POST['cedula']) || empty($_POST['primernombre']) || empty($_POST['segundonombre']) || empty($_POST['primerapellido']) || empty($_POST['segundoapellido']) ||
		empty($_POST['correo']) || empty($_POST['telefono']) || empty($_POST['direccion']) ||empty($_POST['usuario']) || empty($_POST['contraseña']) || empty($_POST['rol'])){
			$Register_alert = '<p class="msg_error">Todos los campos son obligatorios.</p>';
		}else{
			$primernombre = $_POST['primernombre'];
			$segundonombre = $_POST['segundonombre'];
			$primerapellido = $_POST['primerapellido'];
			$segundoapellido = $_POST['segundoapellido'];
			$cedula = $_POST['cedula'];
			$correo = $_POST['correo'];
			$telefono = $_POST['telefono'];
			$direccion = $_POST['direccion'];
			$usuario = $_POST['usuario'];
			$contraseña = md5($_POST['contraseña']);
			$Primera_Letra = strtoupper($primernombre[0]);
			$foto = 'img/Imagenes_Perfil/Perfil_'."$Primera_Letra".'.png';
			$rol = $_POST['rol'];

			$query = mysqli_query($conexion, "SELECT * FROM usuario WHERE usuario = '$usuario' OR email = '$correo'");
			$result = mysqli_fetch_array($query);

			if($result > 0){
				$Register_alert='<p class = "msg_error">El correo o el usuario ya existe.</p>';
			}else{
				$query_insert = mysqli_query($conexion, "INSERT INTO usuario(Cedula, Primer_Nombre, Segundo_Nombre,
				Primer_Apellido, Segundo_Apellido, Email, Telefono, Direccion, Usuario, Contrasena, Imagen, ID_Rol) VALUES('$cedula','$primernombre'
				,'$segundonombre','$primerapellido','$segundoapellido','$correo','$telefono','$direccion','$usuario','$contraseña','$foto','$rol')");
				
				if($query_insert){
					$Register_alert='<p class = "msg_save">Usuario creado correctamente.</p>';
				}else{
					$Register_alert='<p class = "msg_error">Error al crear el usuario.</p>';
				}
			}
		}
	}

?>

<?php include_once 'Modulos/Templates/header.php';  ?>
	<section id="container">
		<div class="form_register">
			<h1>Registro usuario</h1>
			<hr>
			<div class = "Register_alert"><?php echo isset($Register_alert) ? $Register_alert : ''; ?></div>
			<form action="" method="post">
				<label for = "cedula">Cedula</label>
				<input type="text" name="cedula" id="cedula" placeholder="Cedula">				
				<label for = "primernombre">Primer Nombre</label>
				<input type="text" name="primernombre" id="primernombre" placeholder="Primer Nombre">
				<label for = "segundonombre">Segundo Nombre</label>
				<input type="text" name="segundonombre" id="segundonombre" placeholder="Segundo Nombre">
				<label for = "primerapellido">Primer Apellido</label>
				<input type="text" name="primerapellido" id="primerapellido" placeholder="Primer Apellido">
				<label for = "segundoapellido">Segundo Apellido</label>
				<input type="text" name="segundoapellido" id="segundoapellido" placeholder="Segundo Apellido">
				<label for = "correo">Correo electronico</label>
				<input type="email" name="correo" id="correo" placeholder="Correo electronico">				
				<label for = "telefono">Telefono</label>
				<input type="text" name="telefono" id="telefono" placeholder="Telefono">
				<label for = "direccion">Direccion</label>
				<input type="text" name="direccion" id="direccion" placeholder="Direccion">
				<label for = "usuario">Usuario</label>
				<input type="text" name="usuario" id="usuario" placeholder="Usuario">
				<label for = "contraseña">Contraseña</label>
				<input type="password" name="contraseña" id="contraseña" placeholder="Contraseña">
				<label for="rol">Tipo de usuario</label>

				<?php  

					$query_rol = mysqli_query($conexion, "SELECT * FROM rol");
					$result_rol = mysqli_num_rows($query_rol);
					
				?>

				<select name="rol" id="rol">
					<?php   
					
						if($result_rol > 0){
							while ($rol = mysqli_fetch_array($query_rol)){
					?>
								<option value="<?php echo $rol["ID_Rol"]; ?>"><?php echo $rol["Nombre"] ?></option>
					<?php

							}
						}

					?>
					
				</select>
				<input type="submit" value="Crear usuario" class="Btn_save">
			</form>
		</div>
	</section>
	<?php include_once 'Modulos/Templates/footer.php';?>