<?php include_once 'Modulos/Templates/Header_Admin.php';  ?>
<?php
	require_once "Configuraciones/Funciones.php";
	//PARA LA INFORMACION
	if(empty ($_REQUEST['id'])){
		header("Location:Mascota_Aprobada.php");
	}
	$idadop = $_REQUEST['id'];
	$sql="SELECT m.ID_Mascota, m.Nombre_Mascota, R.Raza, m.Edad, m.Descripcion, m.Foto, m.Peso, m.Frase, S.Sexo from mascotas m INNER JOIN raza R ON m.ID_Raza = R.ID_Raza INNER JOIN sexo S ON m.ID_Sexo = S.ID_Sexo WHERE ID_Mascota  = $idadop"; 
	$result=mysqli_query($conexion, $sql);
	while($mostrar = mysqli_fetch_array($result)){
		$nombmascotadop = $mostrar['Nombre_Mascota'];
		$razadop = $mostrar['Raza'];
		$edadop = $mostrar['Edad'];
		$pesadop = $mostrar['Peso'];
		$sexoop = $mostrar['Sexo'];
		$descripadop = $mostrar['Descripcion'];
		$fraseadop = $mostrar['Frase'];
		$fotoadop = $mostrar['Foto'];
		$fotoadop_Etiqueta = '<img src='.$fotoadop.' alt="" class="Ver_Foto_Mascota_Tamano" id="imagenPrevisualizacion">';
	}

	//PARA MODIFICAR LA INFO
	$idado= $_REQUEST['id'];
	if(!empty($_POST)){
		$alertadop='';
		if(empty($_POST['Descripcionop']) || empty($_POST['Fraseop'])){
			$alertadop = '<p class="msg_error">Todos los campos son obligatorios.</p>';
		}
		else{
			$archivo = '';
			$fotop_Nombre = $_FILES["fotop"]["name"];
			if($fotop_Nombre != ''){
				$directorio ="img/Imagenes_Mascotas/";
				$archivo = $directorio.basename($_FILES["fotop"]["name"]);
				$tipoArchivo = strtolower(pathinfo($archivo, PATHINFO_EXTENSION));
				$ValidarImagen = getimagesize($_FILES["fotop"]["tmp_name"]);
				if($ValidarImagen != false){
					if($tipoArchivo == "jpg" || $tipoArchivo == "jpeg" || $tipoArchivo == "png"){
						if(move_uploaded_file($_FILES["fotop"]["tmp_name"], $archivo)){
							$descripadop1= $_POST['Descripcionop'];
							$fraseadop1= $_POST['Fraseop'];
							$query_update = mysqli_query($conexion, "UPDATE mascotas SET Descripcion='$descripadop1',Frase='$fraseadop1',Foto='$archivo' WHERE ID_Mascota='$idado'");
								if($query_update){
									$alertadop = '<p class="msg_save">Información modificada correctamente.</p>';
								}else{
									$alertadop = '<p class="msg_error">Error al actualizar la informacion.</p>';
								}
						}else{
							$Register_alert = '<p class="msg_error">La foto no se pudo guardar.</p>';
						}
					}else{
						$Register_alert = '<p class="msg_error">Solo se admiten imagen jpg/png/jpeg.</p>';
					}
				}else{
					$Register_alert = '<p class="msg_error">El archivo no es una imagen.</p>';
				}
			}else{
				$descripadop1= $_POST['Descripcionop'];
				$fraseadop1= $_POST['Fraseop'];
				$query_update = mysqli_query($conexion, "UPDATE mascotas SET Descripcion='$descripadop1',Frase='$fraseadop1',Foto='$fotoadop' WHERE ID_Mascota='$idado'");
				if($query_update){
					$alertadop = '<p class="msg_save">Información modificada correctamente.</p>';
				}else{
					$alertadop = '<p class="msg_error">Error al actualizar la informacion.</p>';
				}
			}
		}
	}
?>
<div class="ContenidoAdoptado">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <section id="Conteiner_Modificar_Adoptado">
		<div class="Formulario_Modificar_Adoptado">
			<h1><i class="fas fa-paw"></i>Modificación Adoptado</h1>
			<hr>
			<div class = "alertadop"><?php echo isset($alertadop) ? $alertadop : ''; ?></div>
			<form class="FormAdop" action="" method="post" enctype = "multipart/form-data">
				<b>	
					<label for="Nombre_Mascota">Nombre</label>
				</b>
				<i>
					<label for="Nombre_Mascotaval"><?php echo $nombmascotadop;?></label>
				</i>
				<b>				
					<label for = "Raza">Raza</label>
				</b>
				<i>
					<label for="Nombre_Mascotaval"><?php echo $razadop;?></label>
				</i>
				<b>
					<label for = "Edad">Edad</label>
				</b>
				<i>	
					<label for="Nombre_Mascotaval"><?php echo $edadop;?></label>
				</i>
				<b>
				<label for = "Peso">Peso</label>
				</b>
				<i>
					<label for="Nombre_Mascotaval"><?php echo $pesadop;?></label>
				</i>
				<b>
				<label for = "Sexo">Sexo</label>
				</b>
				<i>
					<label for="Nombre_Mascotaval"><?php echo $sexoop;?></label>
				</i>
				<b>
					<label for = "Descripcion">Descripcion</label>
				</b>
				<input type="text" name="Descripcionop" id="Descripcionop" placeholder=""  value="<?php echo $descripadop; ?>">
				<b>
					<label for = "Frase">Frase</label>
				</b>
				<input type="text" name="Fraseop" id="Fraseop" placeholder=""  value="<?php echo $fraseadop; ?>">
				<b>
					<label for="foto">Foto</label>
				</b>
				<input type="file" name="fotop" id="seleccionArchivos">
				<?php echo $fotoadop_Etiqueta; ?>
                <script src="JavaScript/Previsualizar_Imagen.js"></script>
				<button class="Btn_save" type="submit"><i class="far fa-save"></i> Modificar Adopción</button>
			</form>
		</div>
	</section>
  </div>
<?php include_once 'Modulos/Templates/Footer_Admin.php';?>