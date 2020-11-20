<?php
    include "Configuraciones/Funciones.php";
    if(!isset($_SESSION)){
        session_start();
    }
    $ID_Usuario = $_SESSION['cedula'];
    $Query_Modificar_Usuario = mysqli_query($conexion, "SELECT u.Cedula, u.Primer_Nombre, u.Segundo_Nombre, u.Primer_Apellido, u.Segundo_Apellido, u.Email, u.Telefono, u.Direccion, u.Usuario, u.Contrasena, u.ID_Rol, R.Nombre AS Rol FROM usuario u INNER JOIN rol R ON u.ID_Rol = R.ID_Rol 
    WHERE u.Cedula = $ID_Usuario");
    $Resultado_Modificar_Usuario = mysqli_num_rows($Query_Modificar_Usuario);
      if($Resultado_Modificar_Usuario == 0){
          header('Location: Principal.php');
      }else{
          $option_Categoria = '';
          $option_Color = '';
          $option_Tamano = '';
          $option_Estado = '';
          while($Datos_Modificar = mysqli_fetch_array($Query_Modificar_Usuario)){
              $ID_Modificar = $Datos_Modificar['Cedula'];
              $Primer_Nombre_Modificar= $Datos_Modificar['Primer_Nombre'];
              $Segundo_Nombre_Modificar = $Datos_Modificar['Segundo_Nombre'];
              $Primer_Apellido_Modificar= $Datos_Modificar['Primer_Apellido'];
              $Segundo_Apellido_Modificar = $Datos_Modificar['Segundo_Apellido'];
              $Email_Modificar= $Datos_Modificar['Email'];
              $Telefono_Modificar = $Datos_Modificar['Telefono'];
              $Direccion_Modificar= $Datos_Modificar['Direccion'];
              $Usuario_Modificar = $Datos_Modificar['Usuario'];
              $Contrasena_Modificar = $Datos_Modificar['Contrasena'];
              $ID_Rol_Modificar = $Datos_Modificar['ID_Rol'];
              $Rol_Modificar = $Datos_Modificar['Rol'];

              $option_Rol = '<option value="'.$ID_Rol_Modificar.'" select>'.$Rol_Modificar.'</option>';
          }
      }
    if(!empty($_POST)){
		$Register_alert='';
		/*if(empty($_POST['cedula']) || empty($_POST['primernombre']) || empty($_POST['segundonombre']) || empty($_POST['primerapellido']) || empty($_POST['segundoapellido']) ||
        empty($_POST['correo']) || empty($_POST['telefono']) || empty($_POST['direccion']) ||empty($_POST['usuario']) || empty($_POST['contraseña']) || empty($_POST['rol'])){*/
        if(empty($_POST['cedula']) || empty($_POST['primernombre']) || empty($_POST['segundonombre']) || empty($_POST['primerapellido']) || empty($_POST['segundoapellido']) ||
		empty($_POST['correo']) || empty($_POST['telefono']) || empty($_POST['direccion']) ||empty($_POST['usuario']) || empty($_POST['rol'])){
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
			//$contraseña = md5($_POST['contraseña']);
			$Primera_Letra = strtoupper($primernombre[0]);
			$foto = 'img/Imagenes_Perfil/Perfil_'."$Primera_Letra".'.png';
			$rol = $_POST['rol'];
			$query_Usuario_Email = mysqli_query($conexion, "SELECT COUNT(*) as Total_Registros FROM usuario WHERE usuario = '$usuario' OR email = '$correo'");
			$Resultado_Cantidad_Usuario_Email = mysqli_fetch_array($query_Usuario_Email);
            $Total_Cantidad_Registros = $Resultado_Cantidad_Usuario_Email['Total_Registros'];
			if($Total_Cantidad_Registros > 1){
				$Register_alert='<p class = "msg_error">El correo o el usuario ya existe.</p>';
			}else{
				$query_insert = mysqli_query($conexion, "UPDATE usuario SET Cedula = '$cedula', Primer_Nombre = '$primernombre', Segundo_Nombre = '$segundonombre', Primer_Apellido = '$primerapellido', Segundo_Apellido = '$segundoapellido', Email = '$correo', Telefono = '$telefono', Direccion = '$direccion', Usuario ='$usuario', Contrasena = '$Contrasena_Modificar', Imagen = '$foto', ID_Rol = '$rol' WHERE Cedula = $ID_Modificar");
				
				if($query_insert){
					$Register_alert='<p class = "msg_save">Usuario actualizado correctamente.</p>';
				}else{
					$Register_alert='<p class = "msg_error">Error al actualizar el usuario.</p>';
				}
			}
		}
	}
?>
<?php include_once 'Modulos/Templates/header.php';  ?>
<section id="containerregistro">
		<div class="form_register">
			<h1><i class="fas fa-user-plus"></i>Modificar usuario</h1>
			<hr>
			<div class = "Register_alert"><?php echo isset($Register_alert) ? $Register_alert : ''; ?></div>
			<form action="" method="post" enctype = "multipart/form-data">
                <input type="hidden" name="cedula" value="<?php echo $ID_Modificar; ?>">
				<label for = "primernombre">Primer Nombre</label>
				<input type="text" name="primernombre" id="primernombre" placeholder="Primer Nombre" value="<?php echo $Primer_Nombre_Modificar; ?>">
				<label for = "segundonombre">Segundo Nombre</label>
				<input type="text" name="segundonombre" id="segundonombre" placeholder="Segundo Nombre" value="<?php echo $Segundo_Nombre_Modificar; ?>">
				<label for = "primerapellido">Primer Apellido</label>
				<input type="text" name="primerapellido" id="primerapellido" placeholder="Primer Apellido" value="<?php echo $Primer_Apellido_Modificar; ?>">
				<label for = "segundoapellido">Segundo Apellido</label>
				<input type="text" name="segundoapellido" id="segundoapellido" placeholder="Segundo Apellido" value="<?php echo $Segundo_Apellido_Modificar; ?>">
				<label for = "correo">Correo electronico</label>
				<input type="email" name="correo" id="correo" placeholder="Correo electronico" value="<?php echo $Email_Modificar; ?>">				
				<label for = "telefono">Telefono</label>
				<input type="text" name="telefono" id="telefono" placeholder="Telefono" value="<?php echo $Telefono_Modificar; ?>">
				<label for = "direccion">Direccion</label>
				<input type="text" name="direccion" id="direccion" placeholder="Direccion" value="<?php echo $Direccion_Modificar; ?>">
				<label for = "usuario">Usuario</label>
				<input type="text" name="usuario" id="usuario" placeholder="Usuario" value="<?php echo $Usuario_Modificar; ?>">
				<!--<label for = "contraseña">Contraseña</label>
				<input type="password" name="contraseña" id="contraseña" placeholder="Contraseña">-->
				<label for="rol">Tipo de usuario</label>
				<?php  
					$query_rol = mysqli_query($conexion, "SELECT * FROM rol");
					$result_rol = mysqli_num_rows($query_rol);
				?>
				<select name="rol" id="rol" class="notItemOne">
					<?php   
					    echo $option_Rol;
					if($result_rol > 0){
						while ($rol = mysqli_fetch_array($query_rol)){
							if($_SESSION['ID_Rol'] == 1){
								?>
									<option value="<?php echo $rol["ID_Rol"]; ?>"><?php echo $rol["Nombre"] ?></option>
								<?php
							}else if($_SESSION['ID_Rol'] != 1 || empty($_SESSION['ID_Rol'])){
								if($rol["ID_Rol"] != 1){
									?>
										<option value="<?php echo $rol["ID_Rol"]; ?>"><?php echo $rol["Nombre"]; ?></option>
									<?php
								}
							}
						}
					}
				?>
                </select>
			<button class="Btn_save" type="submit"><i class="far fa-save"></i> Actualizar usuario</button>
		</form>
	</div>
</section>
<?php include_once 'Modulos/Templates/footer.php'; ?>