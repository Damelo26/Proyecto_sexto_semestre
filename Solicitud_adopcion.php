<?php include_once 'Modulos/Templates/header.php';  ?>

<?php 
    require_once "Configuraciones/Funciones.php";
    $valor_Obtenido = $_GET["mascota"];
    $sql3 = "SELECT m.ID_Mascota, m.Foto, m.Edad, m.Peso, m.Descripcion, m.Nombre_Mascota as Nombre, s.Sexo as Sexo, C.Nombre as Color, t.Nombre as Tamaño, r.Raza as Raza FROM mascotas AS m INNER JOIN color as C ON C.ID_Color = m.ID_Color JOIN tamano t ON t.ID_Tamano = m.ID_Tamano JOIN sexo AS s ON s.ID_Sexo = m.ID_Sexo JOIN raza AS r ON r.ID_Raza = m.ID_Raza where m.ID_Mascota= '$valor_Obtenido'";
    $resultado = $conexion->query($sql3);
    $mascota = $resultado->fetch_assoc();
    $usuario = $_SESSION['Primer_Nombre']." ".$_SESSION['Primer_Apellido'];
    $Correo = $_SESSION['Correo'];
    $Telefono = $_SESSION['Telefono'];
    $Cedula = $_SESSION['cedula'];
    $Direccion = $_SESSION['Direccion'];
    if(!empty($_POST)){
        $Adop_alert='';
        if(empty($_POST['Cedula']) || empty($_GET['mascota'])){
                $Adop_alert = '<p class="msg_error">Todos los campos son obligatorios.</p>';
            }else{
                $Cedula = $_POST['Cedula'];
                $ID_Mascota = $_GET['mascota'];
                $Estado = 3;
                $insert_adopt = mysqli_query($conexion, "INSERT INTO adoptados(Cedula,	ID_Mascotas) VALUES('$Cedula','$ID_Mascota')");
                $query_update = mysqli_query($conexion, "UPDATE mascotas SET ID_Estado = '$Estado' WHERE ID_Mascota = $ID_Mascota");
                if($insert_adopt && $insert_adopt){
                    $Adop_alert='<p class = "msg_save">Solicitud enviado correctamente.</p>';
                }else{
                    $Adop_alert='<p class = "msg_error">Error al realizar la accion.</p>';
                } 
            }/*If conparacion*/
      }/*IF empy post*/
?>
<div class="seccion_mascotas_busqueda centrar_adopta">
    <h2 class="Titulo_mascotas titu_adop">Proceso de adopcion</h2>
    <p class="texto_sub">Este es un formulario con el cual buscamos obtener informacion actualizada para asi poder adoptar una mascota con nosotros. Este es el primer paso en el proceso de adopción, si lo pasas nuestros asesores se estaran comunicando directamente contigo.</p>
    <div class = "Register_alert"><?php echo isset($Adop_alert) ? $Adop_alert : ''; ?></div>
    <form action="" method="post" class="form_Solicitud ">
        <div class="columnar">
            <p class="texto_sub_ti">Cedula</p>
            <input type="text" name="Cedula" placeholder="Tu cedula es" value="<?php echo $Cedula?>" >
        </div>
        <div class="columnar">
            <p class="texto_sub_ti">Nombre</p>
            <input type="text" name="Nombre" placeholder="Tu nombre es" value="<?php echo $usuario?>">
        </div>
        <div class="columnar">
            <p class="texto_sub_ti">Telefono</p>
            <input type="text" name="Telefono" placeholder="Tu telefono es" value="<?php echo $Telefono?>">
        </div>
        <div class="columnar">
            <p class="texto_sub_ti">Correo electronico</p>
            <input type="text" name="Correo" placeholder="Tu correo es" value="<?php echo $Correo?>">
        </div>
        <div class="clearfix"></div>
        <div class="columnar">
            <p class="texto_sub_ti">Direccion</p>
            <input type="text" name="Direccion" placeholder="Direccion" value="<?php echo $Direccion?>">
        </div>
        <div class="columnar">
            <p class="texto_sub_ti">Elige tu ocupacion</p>
            <select name="ocupacion" id="ocupacion">
                <option value="" class ="select_opciones">Ocupacion</option>
                <option value="Empleado" class ="select_opciones">Empleado</option>
                <option value="Desempleado" class ="select_opciones">Desempleado</option>
                <option value="Indepeniente" class ="select_opciones">Indepeniente</option>
                <option value="Estudiante" class ="select_opciones">Estudiante</option>
                <option value="Hogar" class ="select_opciones">Hogar</option>
            </select>
        </div>
        
        <div class="buttonap-border right_boton">
        <button type="submit" class="buttonap Btn_Buscador btn_enviar" >Enviar solicitud</button>
        </div>
    </form> 
    
        
        <div class="Espaciado_solicitud"> <!--Perrito Elegido -->
            <div class="division">   
                <div class="left_solicitud"> <!--IMAGEN-->
                    <img class ="Img_solicitud" src= "<?php echo $mascota['Foto'] ?>" alt="Imagen perro uno"/>
                </div>
                <div class="left"> <!--Textos-->
                    <div class="division_datos_solicitud Titulo_mascot_Solicitud">
                        <p><?php echo $mascota['Nombre'] ?>
                    </div>
                    <div class="division_datos_solicitud">
                        <p>Genero:</p>
                        <p><?php echo $mascota['Sexo'] ?></p> 
                    </div>
                    <div class="division_datos_solicitud">
                        <p>Raza:</p>
                        <p><?php echo $mascota['Raza'] ?></p> 
                    </div>
                    <div class="division_datos_solicitud">
                        <p>Edad:</p>
                        <p><?php echo $mascota['Edad'] ?></p>    
                    </div>
                    <div class="division_datos_solicitud">
                        <p>Peso:</p>
                        <p><?php echo $mascota['Peso'] ?></p>              
                    </div >
                    <div class="division_datos_solicitud">
                        <p>Tamaño:</p>
                        <p><?php echo $mascota['Tamaño'] ?></p>
                    </div>
                    <div class="division_datos_solicitud">
                        <p>Color:</p>
                        <p><?php echo $mascota['Color'] ?></p>
                    </div> 
                </div> <!--Fin Textos--> 
                <div class="buttonap-border center_boton center_solicitud">
                    <a href="adopta.php">
                        <button class="buttonap Btn_Buscador">Cancelar</button>
                    </a>
                </div>
            </div> <!--Fin Divison-->
            
        </div>
</div>
<?php include_once 'Modulos/Templates/footer.php';  ?>