<?php
include "Configuraciones/Funciones.php";
  if(empty($_GET['id'])){
      header('Location: Administrar_Mascotas_Admin.php');
  }
  $ID_Modificar = $_GET['id'];
  $Query_Modificar = mysqli_query($conexion, "SELECT m.ID_Mascota, m.ID_Categoria, C.Nombre as Categoria, m.Nombre_Mascota as Nombre, m.Raza, m.Edad, m.Descripcion, m.Foto, m.ID_Color, Cl.Nombre as Color, m.ID_Tamano, T.Nombre as Tamano, m.Frase, m.Peso,m.ID_Estado, Es.Estado as Estado FROM mascotas m INNER JOIN categoria_mascota C ON m.ID_Categoria = C.ID_Categoria INNER JOIN color Cl ON m.ID_Color = Cl.ID_Color INNER JOIN tamano T ON m.ID_Tamano = T.ID_Tamano INNER JOIN estado Es ON m.ID_Estado = Es.ID_Estado WHERE m.ID_Mascota = $ID_Modificar");
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

            if($ID_Modificar_Categoria == 1){
                $option_Categoria = '<option value="'.$ID_Modificar_Categoria.'" select>'.$Categoria_Modificar.'</option>';
            }else if($ID_Modificar_Categoria == 2){
                $option_Categoria = '<option value="'.$ID_Modificar_Categoria.'" select>'.$Categoria_Modificar.'</option>';
            }

            $Nombre_Modificar = $Datos_Modificar['Nombre'];
            $Raza_Modificar = $Datos_Modificar['Raza'];
            $Edad_Modificar = $Datos_Modificar['Edad'];
			$Descripcion_Modificar = $Datos_Modificar['Descripcion'];
			$Foto_Modificar = $Datos_Modificar['Foto'];
			$Foto_Etiqueta = '<img src='.$Foto_Modificar.' alt="" class="Ver_Foto_Mascota_Tamano" id="imagenPrevisualizacion">';
            $ID_Modificar_Color = $Datos_Modificar['ID_Color'];
            $Color_Modificar = $Datos_Modificar['Color'];

            if($ID_Modificar_Color == 1){
                $option_Color = '<option value="'.$ID_Modificar_Color.'" select>'.$Color_Modificar.'</option>';
            }else if($ID_Modificar_Color == 2){
                $option_Color = '<option value="'.$ID_Modificar_Color.'" select>'.$Color_Modificar.'</option>';
            }else if($ID_Modificar_Color == 3){
                $option_Color = '<option value="'.$ID_Modificar_Color.'" select>'.$Color_Modificar.'</option>';
            }

            $ID_Modificar_Tamano = $Datos_Modificar['ID_Tamano'];
            $Tamano_Modificar = $Datos_Modificar['Tamano'];

            if($ID_Modificar_Tamano == 1){
                $option_Tamano = '<option value="'.$ID_Modificar_Tamano.'" select>'.$Tamano_Modificar.'</option>';
            }else if($ID_Modificar_Tamano == 2){
                $option_Tamano = '<option value="'.$ID_Modificar_Tamano.'" select>'.$Tamano_Modificar.'</option>';
            }else if($ID_Modificar_Tamano == 3){
                $option_Tamano = '<option value="'.$ID_Modificar_Tamano.'" select>'.$Tamano_Modificar.'</option>';
            }

            $Frase_Modificar = $Datos_Modificar['Frase'];
            $Peso_Modificar = $Datos_Modificar['Peso'];
            $ID_Modificar_Estado = $Datos_Modificar['ID_Estado'];
            $Estado_Modificar = $Datos_Modificar['Estado'];

            if($ID_Modificar_Estado == 1){
                $option_Estado = '<option value="'.$ID_Modificar_Estado.'" select>'.$Estado_Modificar.'</option>';
            }else if($ID_Modificar_Estado == 2){
                $option_Estado = '<option value="'.$ID_Modificar_Estado.'" select>'.$Estado_Modificar.'</option>';
            }else if($ID_Modificar_Estado == 3){
                $option_Estado = '<option value="'.$ID_Modificar_Estado.'" select>'.$Estado_Modificar.'</option>';
            }

        }
	}
	if(!empty($_POST)){
		$Register_alert='';
		if(empty($_POST['Categoria']) || empty($_POST['Nombre_Mascota']) || empty($_POST['Raza']) || empty($_POST['Edad']) || empty($_POST['Color']) || empty($_POST['Frase']) || empty($_POST['Peso']) || empty($_POST['Descripcion'])
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
								$id_estado = $_POST['Estado'];
								$query_update = mysqli_query($conexion, "UPDATE mascotas SET ID_Categoria = '$categoria', Nombre_Mascota = '$nombre', Raza = '$raza', Edad = '$edad', Descripcion = '$descripcion', Foto = '$archivo', ID_Color = '$color', ID_Tamano = '$tamano', Frase ='$frase', Peso = '$peso', ID_Estado = '$id_estado' WHERE ID_Mascota = $ID_Mascota");
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
					$id_estado = $_POST['Estado'];
					$query_update = mysqli_query($conexion, "UPDATE mascotas SET ID_Categoria = '$categoria', Nombre_Mascota = '$nombre', Raza = '$raza', Edad = '$edad', Descripcion = '$descripcion', Foto = '$archivo', ID_Color = '$color', ID_Tamano = '$tamano', Frase ='$frase', Peso = '$peso', ID_Estado = '$id_estado' WHERE ID_Mascota = $ID_Mascota");
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
					$query_Categoria = mysqli_query($conexion, "SELECT * FROM categoria_mascota");
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
				<input type="text" name="Raza" id="Raza" placeholder="Inserte la raza" value="<?php echo $Raza_Modificar; ?>">
				<label for = "Edad">Edad</label>
				<input type="text" name="Edad" id="Edad" placeholder="Inserte la edad" value="<?php echo $Edad_Modificar; ?>">
				<label for = "Color">Color</label>
				<?php
					$query_color = mysqli_query($conexion, "SELECT * FROM color");
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
				<label for = "Descripcion">Descripcion</label>
				<input type="text" name="Descripcion" id="Descripcion" placeholder="Inserte la descripcion" value="<?php echo $Descripcion_Modificar; ?>">
				<label for = "Frase">Frase</label>
				<input type="text" name="Frase" id="Frase" placeholder="Inserte la frase" value="<?php echo $Frase_Modificar; ?>">
				<label for="foto">Foto</label>
                <input type="file" name="foto" id="seleccionArchivos">
				<?php echo $Foto_Etiqueta; ?>
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
				<!--
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
				</div>
				-->


				<button class="Btn_save" type="submit"><i class="far fa-save"></i> Guardar mascota</button>
			</form>
		</div>
	</section>
  </div>
<?php include_once 'Modulos/Templates/Footer_Admin.php';?>