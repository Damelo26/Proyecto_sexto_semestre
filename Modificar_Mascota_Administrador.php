<?php
include "Configuraciones/Funciones.php";
  if(empty($_GET['id'])){
      header('Location: Administrar_Mascotas_Admin.php');
  }
  $ID_Modificar = $_GET['id'];
  $Query_Modificar = mysqli_query($conexion, "SELECT m.ID_Mascota, m.ID_Categoria, C.Nombre as Categoria, m.Nombre_Mascota as Nombre, m.ID_Raza, R.Raza AS Raza, m.Edad, m.Descripcion, m.Foto, m.ID_Color, Cl.Nombre as Color, m.ID_Tamano, T.Nombre as Tamano, m.Frase, m.Peso, m.ID_Sexo, S.Sexo as Sexo, m.ID_Estado, Es.Estado as Estado FROM mascotas m INNER JOIN categoria_mascota C ON m.ID_Categoria = C.ID_Categoria INNER JOIN color Cl ON m.ID_Color = Cl.ID_Color INNER JOIN tamano T ON m.ID_Tamano = T.ID_Tamano INNER JOIN estado Es ON m.ID_Estado = Es.ID_Estado INNER JOIN raza R ON m.ID_Raza = R.ID_Raza INNER JOIN sexo S ON m.ID_Sexo = S.ID_Sexo WHERE m.ID_Mascota = $ID_Modificar");
  $Resultado_Modificar = mysqli_num_rows($Query_Modificar);
    if($Resultado_Modificar == 0){
        header('Location: Administrar_Mascotas_Admin.php');
    }else{
        $option_Categoria = '';
        $option_Color = '';
        $option_Tamano = '';
        $option_Estado = '';
        while($Datos_Modificar = mysqli_fetch_array($Query_Modificar)){
            $ID_Modificar_Mascota = $Datos_Modificar['ID_Mascota'];
            $ID_Modificar_Categoria = $Datos_Modificar['ID_Categoria'];
            $Categoria_Modificar = $Datos_Modificar['Categoria'];

            $option_Categoria = '<option value="'.$ID_Modificar_Categoria.'" select>'.$Categoria_Modificar.'</option>';

			$Nombre_Modificar = $Datos_Modificar['Nombre'];
			$ID_Modificar_Raza = $Datos_Modificar['ID_Raza'];
			$Raza_Modificar = $Datos_Modificar['Raza'];
			
			$option_Raza = '<option value="'.$ID_Modificar_Raza.'" select>'.$Raza_Modificar.'</option>';

            $Edad_Modificar = $Datos_Modificar['Edad'];
			$Descripcion_Modificar = $Datos_Modificar['Descripcion'];
			$Foto_Modificar = $Datos_Modificar['Foto'];
            $ID_Modificar_Color = $Datos_Modificar['ID_Color'];
            $Color_Modificar = $Datos_Modificar['Color'];

            $option_Color = '<option value="'.$ID_Modificar_Color.'" select>'.$Color_Modificar.'</option>';

            $ID_Modificar_Tamano = $Datos_Modificar['ID_Tamano'];
            $Tamano_Modificar = $Datos_Modificar['Tamano'];

            $option_Tamano = '<option value="'.$ID_Modificar_Tamano.'" select>'.$Tamano_Modificar.'</option>';

            $Frase_Modificar = $Datos_Modificar['Frase'];
			$Peso_Modificar = $Datos_Modificar['Peso'];
			$ID_Modificar_Sexo = $Datos_Modificar['ID_Sexo'];
			$Sexo_Modificar = $Datos_Modificar['Sexo'];

			$option_Sexo = '<option value="'.$ID_Modificar_Sexo.'" select>'.$Sexo_Modificar.'</option>';

            $ID_Modificar_Estado = $Datos_Modificar['ID_Estado'];
            $Estado_Modificar = $Datos_Modificar['Estado'];

                $option_Estado = '<option value="'.$ID_Modificar_Estado.'" select>'.$Estado_Modificar.'</option>';

        }
	}
	if(!empty($_POST)){
		$Register_alert='';
		if(empty($_POST['Categoria']) || empty($_POST['Nombre_Mascota']) || empty($_POST['Edad']) || empty($_POST['Color']) || empty($_POST['Frase']) || empty($_POST['Peso']) || empty($_POST['Descripcion'])
		|| empty($_POST['Tamano'])){
				$Register_alert = '<p class="msg_error">Todos los campos son obligatorios.</p>';
			}else{
			    $archivo = '';
				$Foto_Nombre = $_FILES["foto"]["name"];
				if($Foto_Nombre != ''){
					$directorio ="img/Imagenes_Mascotas/";
					$archivo = $directorio.basename($_FILES["foto"]["name"]);
					$tipoArchivo = strtolower(pathinfo($archivo, PATHINFO_EXTENSION));
					$ValidarImagen = getimagesize($_FILES["foto"]["tmp_name"]);
					if($ValidarImagen != false){
						if($tipoArchivo == "jpg" || $tipoArchivo == "jpeg" || $tipoArchivo == "png"){
							if(move_uploaded_file($_FILES["foto"]["tmp_name"], $archivo)){
								$ID_Mascota = $_POST['ID_Mascota'];
								$categoria = $_POST['Categoria'];
								$nombre = $_POST['Nombre_Mascota'];
								$raza = $_POST['Raza'];
								$edad = $_POST['Edad'];
								$color = $_POST['Color'];
								$tamano = $_POST['Tamano'];
								$frase = $_POST['Frase'];
								$peso = $_POST['Peso'];
								$descripcion = $_POST['Descripcion'];
								$sexo = $_POST['Sexo'];
								$id_estado = $_POST['Estado'];
								$query_update = mysqli_query($conexion, "UPDATE mascotas SET ID_Categoria = '$categoria', Nombre_Mascota = '$nombre', ID_Raza = '$raza', Edad = '$edad', Descripcion = '$descripcion', Foto = '$archivo', ID_Color = '$color', ID_Tamano = '$tamano', Frase ='$frase', Peso = '$peso', ID_Sexo = '$sexo', ID_Estado = '$id_estado' WHERE ID_Mascota = $ID_Mascota");
								if($query_update){
									$Register_alert='<p class = "msg_save">Mascota modificada correctamente.</p>';
								}else{
									$Register_alert='<p class = "msg_error">Error al modificar la mascota.</p>';
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
					$ID_Mascota = $_POST['ID_Mascota'];
					$categoria = $_POST['Categoria'];
					$nombre = $_POST['Nombre_Mascota'];
					$raza = $_POST['Raza'];
					$edad = $_POST['Edad'];
					$archivo = $Foto_Modificar;
					$color = $_POST['Color'];
					$tamano = $_POST['Tamano'];
					$frase = $_POST['Frase'];
					$peso = $_POST['Peso'];
					$descripcion = $_POST['Descripcion'];
					$sexo = $_POST['Sexo'];
					$id_estado = $_POST['Estado'];
					$query_update = mysqli_query($conexion, "UPDATE mascotas SET ID_Categoria = '$categoria', Nombre_Mascota = '$nombre', ID_Raza = '$raza', Edad = '$edad', Descripcion = '$descripcion', Foto = '$archivo', ID_Color = '$color', ID_Tamano = '$tamano', Frase ='$frase', Peso = '$peso', ID_Sexo = '$sexo', ID_Estado = '$id_estado' WHERE ID_Mascota = $ID_Mascota");
					if($query_update){
					$Register_alert='<p class = "msg_save">Mascota modificada correctamente.</p>';
					}else{
					$Register_alert='<p class = "msg_error">Error al modificar la mascota.</p>';
					}
				}		
			}
	}
?>
<?php include_once 'Modulos/Templates/Header_Admin.php';  ?>
  <div class="Contenido">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <section id="Conteiner_Registro_Mascota">
		<div class="Formulario_Registro_Mascota">
			<h1><i class="fas fa-paw"></i>Modificar mascota</h1>
			<hr>
			<div class = "Register_alert"><?php echo isset($Register_alert) ? $Register_alert : ''; ?></div>
			<form action="" method="post" enctype = "multipart/form-data">
            <input type="hidden" name="ID_Mascota" value="<?php echo $ID_Modificar_Mascota; ?>">    
            <label for = "Categoria">Categoria</label>
				<?php
					$query_Categoria = mysqli_query($conexion, "SELECT * FROM categoria_mascota ORDER BY Nombre ASC");
					$result_Categoria = mysqli_num_rows($query_Categoria);	
				?>
				<select name="Categoria" id="Categoria" class="notItemOne">
                <?php   	
                    echo $option_Categoria;
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
				<input type="text" name="Nombre_Mascota" id="Nombre_Mascota" placeholder="Inserte el nombre" value="<?php echo $Nombre_Modificar; ?>">				
				<label for = "Raza">Raza</label>
				<?php
					$query_Raza = mysqli_query($conexion, "SELECT * FROM Raza  ORDER BY Raza ASC");
					$result_Raza = mysqli_num_rows($query_Raza);	
				?>
				<select name="Raza" id="Raza" class="notItemOne">
				<?php   
					echo $option_Raza;	
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
				<input type="text" name="Edad" id="Edad" placeholder="Inserte la edad" value="<?php echo $Edad_Modificar; ?>">
				<label for = "Color">Color</label>
				<?php
					$query_color = mysqli_query($conexion, "SELECT * FROM color ORDER BY Nombre ASC");
					$result_color = mysqli_num_rows($query_color);	
				?>
					<select name="Color" id="Color" class="notItemOne">
                <?php   	
                    echo $option_Color;
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
				<select name="Tamano" id="Tamano" class="notItemOne">
                <?php   
                    echo $option_Tamano;	
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
				<input type="text" name="Peso" id="Peso" placeholder="Inserte el peso" value="<?php echo $Peso_Modificar; ?>">
				<label for = "Sexo">Sexo</label>
				<?php
					$query_Sexo = mysqli_query($conexion, "SELECT * FROM Sexo");
					$result_Sexo = mysqli_num_rows($query_Sexo);	
				?>
				<select name="Sexo" id="Sexo" class="notItemOne">
				<?php   
					echo $option_Sexo;	
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
				<input type="text" name="Descripcion" id="Descripcion" placeholder="Inserte la descripcion" value="<?php echo $Descripcion_Modificar; ?>">
				<label for = "Frase">Frase</label>
				<input type="text" name="Frase" id="Frase" placeholder="Inserte la frase" value="<?php echo $Frase_Modificar; ?>">
				<label for="foto">Foto</label>
                <input type="file" name="foto" id="seleccionArchivos">
				<img src="<?php echo $Foto_Modificar; ?>" alt="" class="Ver_Foto_Mascota_Tamano" id="imagenPrevisualizacion">
                <script src="JavaScript/Previsualizar_Imagen.js"></script>
				<label for = "Estado">Estado</label>
				<?php
					$query_estado = mysqli_query($conexion, "SELECT * FROM estado");
					$result_estado = mysqli_num_rows($query_estado);	
				?>
					<select name="Estado" id="Estado" class="notItemOne">
                <?php  
                    echo $option_Estado;	 	
					if($result_estado > 0){
						while ($estado = mysqli_fetch_array($query_estado)){
				?>
							<option value="<?php echo $estado["ID_Estado"]; ?>"><?php echo $estado["Estado"] ?></option>
				<?php
						}
					}
				?>
				</select>
				<button class="Btn_save" type="submit"><i class="far fa-save"></i> Guardar mascota</button>
			</form>
		</div>
	</section>
  </div>
<?php include_once 'Modulos/Templates/Footer_Admin.php';?>