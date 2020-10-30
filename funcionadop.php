<?php include_once 'Modulos/Templates/Header_Admin.php';  ?>
<?php

//PARA MODIFICAR LA INFO
require_once "Configuraciones/Funciones.php";
$idado= $_REQUEST['id'];
if(!empty($_POST)){
	
	$alertadop='';
	if(empty($_POST['Descripcionop']) || empty($_POST['Fraseop']))
	{
		$alertadop = '<p class="msg_error">Todos los campos son obligatorios.</p>';
}
else{
	
	$descripadop1= $_POST['Descripcionop'];
	$fraseadop1= $_POST['Fraseop'];
	$fotoadop1= $_POST['Foto'];

	$query_update = mysqli_query($conexion, "UPDATE mascotas SET Descripcion='$descripadop1',Frase='$fraseadop1',Foto='$fotoadop1' WHERE ID_Mascota='$idado'");
				if($query_update){

	$alertadop = '<p class="msg_save">Información modificada correctamente.</p>';
}
else{
	$alertadop = '<p class="msg_error">Error al actualizar la informacion.</p>';
}
}
}
?>
<?php
//PARA LA INFORMACION
if(empty ($_REQUEST['id'])){
header("Location:Mascota_Aprobada.php");
}

$idadop= $_REQUEST['id'];
require_once "Configuraciones/Funciones.php";
 
$sql="SELECT * from mascotas  WHERE ID_Mascota = $idadop"; 
$result=mysqli_query($conexion, $sql);
while($mostrar=mysqli_fetch_array($result)){
	$nombmascotadop= $mostrar['Nombre_Mascota'];
	$razadop= $mostrar['Raza'];
	$edadop= $mostrar['Edad'];
	$pesadop= $mostrar['Peso'];
	$descripadop= $mostrar['Descripcion'];
	$fraseadop= $mostrar['Frase'];
	$fotoadop= $mostrar['Foto'];
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
			<i>	<label for="Nombre_Mascotaval"><?php echo $nombmascotadop?></label> </i>
					<b>				
					<label for = "Raza">Raza</label>
</b>
<i>	<label for="Nombre_Mascotaval"><?php echo $razadop?></label></i>
					<b>
					<label for = "Edad">Edad</label>
</b>
<i>	<label for="Nombre_Mascotaval"><?php echo $edadop?></label></i>
					
				
				<b>
				<label for = "Peso">Peso</label>
</b>
<i>	<label for="Nombre_Mascotaval"><?php echo $pesadop?></label></i>
				<b>
				<label for = "Descripcion">Descripcion</label>
</b>
				<input type="text" name="Descripcionop" id="Descripcionop" placeholder=""  value="<?php echo $descripadop ?>">
				<b>
				<label for = "Frase">Frase</label>
</b>
				<input type="text" name="Fraseop" id="Fraseop" placeholder=""  value="<?php echo $fraseadop ?>">
				<b>
				<label for="foto">Foto</label>
</b>
		<i>	<label for="Nombre_Mascotaval"><?php echo $fotoadop?></label></i>
				<input type="file" name="fotop" >
				<img src="<?php echo $fotoadop?>" alt="">


				<button class="Btn_save" type="submit"><i class="far fa-save"></i> Modificar Adopción</button>
			</form>
		</div>
	</section>
  </div>






<?php include_once 'Modulos/Templates/Footer_Admin.php';?>