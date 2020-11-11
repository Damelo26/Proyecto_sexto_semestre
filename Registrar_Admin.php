<?php
include "Configuraciones/Funciones.php";
  if(!empty($_POST)){
	$Register_alert='';
	if(empty($_POST['Categoria']) || empty($_POST['Nombre_Mascota']) || empty($_POST['Edad']) || empty($_POST['Color']) || empty($_POST['Frase']) || empty($_POST['Peso']) || empty($_POST['Descripcion'])
	|| empty($_POST['Tamano'])){
			$Register_alert = '<p class="msg_error">Todos los campos son obligatorios.</p>';
		}else{
			$directorio ="img/Imagenes_Mascotas/";
			$archivo = $directorio . basename($_FILES["foto"]["name"]);
			$tipoArchivo = strtolower(pathinfo($archivo, PATHINFO_EXTENSION));
			$ValidarImagen = getimagesize($_FILES["foto"]["tmp_name"]);
			if($ValidarImagen != false){
				if($tipoArchivo == "jpg" || $tipoArchivo == "jpeg" || $tipoArchivo == "png"){
					if(move_uploaded_file($_FILES["foto"]["tmp_name"], $archivo)){
						$categoria = $_POST['Categoria'];
						$nombre = $_POST['Nombre_Mascota'];
						$raza = $_POST['Raza'];
						$edad = $_POST['Edad'];
						$color = $_POST['Color'];
						$tamano = $_POST['Tamano'];
						$frase = $_POST['Frase'];
						$sexo = $_POST['Sexo'];
						$peso = $_POST['Peso'];
						$descripcion = $_POST['Descripcion'];
						$id_estado = $_POST['Estado'];
						$query_insert = mysqli_query($conexion, "INSERT INTO mascotas(ID_Categoria,	Nombre_Mascota,	ID_Raza, Edad, Descripcion, Foto, ID_Color, ID_Tamano, Frase, Peso, ID_Sexo,ID_Estado) 
						VALUES('$categoria','$nombre','$raza','$edad','$descripcion','$archivo','$color','$tamano','$frase','$peso','$sexo','$id_estado')");
						if($query_insert){
							$Register_alert='<p class = "msg_save">Mascota registrada correctamente.</p>';
						}else{
							$Register_alert='<p class = "msg_error">Error al registrar la mascota.</p>';
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
		}
  }
?>
<?php include_once 'Modulos/Templates/Header_Admin.php';  ?>
  <div class="Contenido">
  <section id="Conteiner_Registro_Mascota">
		<div class="Formulario_Registro_Mascota">
			<h2><i class="fas fa-paw"></i>Registro de mascota</h2>
			<hr>
			<div class = "Register_alert"><?php echo isset($Register_alert) ? $Register_alert : ''; ?></div>
			<form action="" method="post" enctype = "multipart/form-data">
				<label for = "Categoria">Categoria</label>
				<?php
					$query_Categoria = mysqli_query($conexion, "SELECT * FROM categoria_mascota ORDER BY Nombre ASC");
					$result_Categoria = mysqli_num_rows($query_Categoria);	
				?>
				<select name="Categoria" id="Categoria">
				<?php   	
					if($result_Categoria > 0){
						while ($Categoria = mysqli_fetch_array($query_Categoria)){
				?>
							<option value="<?php echo $Categoria["ID_Categoria"]; ?>"><?php echo $Categoria["Nombre"] ?></option>
				<?php
						}
					}
				?>
				</select>
				<label for="Nombre_Mascota">Nombre</label>
				<input type="text" name="Nombre_Mascota" id="Nombre_Mascota" placeholder="Inserte el nombre">				
				<label for = "Raza">Raza</label>
				<?php
					$query_Raza = mysqli_query($conexion, "SELECT * FROM Raza ORDER BY Raza ASC");
					$result_Raza = mysqli_num_rows($query_Raza);	
				?>
				<select name="Raza" id="Raza">
				<?php   	
					if($result_Raza > 0){
						while ($Raza = mysqli_fetch_array($query_Raza)){
				?>
							<option value="<?php echo $Raza["ID_Raza"]; ?>"><?php echo $Raza["Raza"] ?></option>
				<?php
						}
					}
				?>
				</select>
				<label for = "Edad">Edad</label>
				<input type="text" name="Edad" id="Edad" placeholder="Inserte la edad">
				<label for = "Color">Color</label>
				<?php
					$query_color = mysqli_query($conexion, "SELECT * FROM color ORDER BY Nombre ASC");
					$result_color = mysqli_num_rows($query_color);	
				?>
					<select name="Color" id="Color">
				<?php   	
					if($result_color > 0){
						while ($color = mysqli_fetch_array($query_color)){
				?>
							<option value="<?php echo $color["ID_Color"]; ?>"><?php echo $color["Nombre"] ?></option>
				<?php
						}
					}
				?>
				</select>
				<label for = "Tamano">Tamaño</label>
				<?php
					$query_Tamano = mysqli_query($conexion, "SELECT * FROM Tamano");
					$result_Tamano = mysqli_num_rows($query_Tamano);	
				?>
				<select name="Tamano" id="Tamano">
				<?php   	
					if($result_Tamano > 0){
						while ($Tamano = mysqli_fetch_array($query_Tamano)){
				?>
							<option value="<?php echo $Tamano["ID_Tamano"]; ?>"><?php echo $Tamano["Nombre"] ?></option>
				<?php
						}
					}
				?>
				</select>
				<label for = "Peso">Peso</label>
				<input type="text" name="Peso" id="Peso" placeholder="Inserte el peso">
				<label for = "Sexo">Sexo</label>
				<?php
					$query_Sexo = mysqli_query($conexion, "SELECT * FROM Sexo");
					$result_Sexo = mysqli_num_rows($query_Sexo);	
				?>
				<select name="Sexo" id="Sexo">
				<?php   	
					if($result_Sexo > 0){
						while ($Sexo = mysqli_fetch_array($query_Sexo)){
				?>
							<option value="<?php echo $Sexo["ID_Sexo"]; ?>"><?php echo $Sexo["Sexo"] ?></option>
				<?php
						}
					}
				?>
				</select>
				<label for = "Descripcion">Descripcion</label>
				<input type="text" name="Descripcion" id="Descripcion" placeholder="Inserte la descripcion">
				<label for = "Frase">Frase</label>
				<input type="text" name="Frase" id="Frase" placeholder="Inserte la frase">
				<label for="foto">Foto</label>
                <input type="file" name="foto" id="seleccionArchivos">
				<img alt="" class="Ver_Foto_Mascota_Tamano" id="imagenPrevisualizacion">
                <script src="JavaScript/Previsualizar_Imagen.js"></script>
				<label for = "Estado">Estado</label>
				<?php
					$query_estado = mysqli_query($conexion, "SELECT * FROM estado");
					$result_estado = mysqli_num_rows($query_estado);	
				?>
				<select name="Estado" id="Estado">
				<?php   	
					if($result_estado > 0){
						while ($estado = mysqli_fetch_array($query_estado)){
							if($estado["ID_Estado"] == 1){
				?>
							<option value="<?php echo $estado["ID_Estado"]; ?>"><?php echo $estado["Estado"] ?></option>
				<?php
							}
						}
					}
				?>
				</select>
				
				<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
				<script type="text/javascript" src="Sistema/jquery.min.js"></script>
				<script type="text/javascript" src="JavaScript/Foto_Mascota.js"></script>
				<div class="photo">
					<label for="foto">Foto</label>
					<div class="prevPhoto">
						<span class="delPhoto notBlock">X</span>
						<label for="foto"></label>
					</div>
					<div class="upimg">
						<input type="file" name="foto" id="foto">
					</div>
					<div class="form_alert"></div>
				</div>-->
				


				<button class="Btn_save" type="submit"><i class="far fa-save"></i> Registrar mascota</button>
			</form>
		</div>
	</section>
  </div>
<?php include_once 'Modulos/Templates/Footer_Admin.php';?>