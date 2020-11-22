<?php   
    if (isset($_GET['mascota'])) { include_once 'Modulos/Templates/header.php';
        $valor_Obtenido = $_GET["mascota"];
        try {
            require_once "Configuraciones/Funciones.php";
            $sql = "SELECT * FROM `mascotas` WHERE ID_Mascota = '$valor_Obtenido' ";
            $sql2 = "SELECT `m.ID_Mascota`, `m.Nombre_Mascota`, `f.Nombre` FROM `mascotas` AS m INNER JOIN `categoria_mascota` as f ON `f.ID_Categoria` = `m.ID_Categoria` where `m.ID_Mascota`= '$valor_Obtenido'";
            $sql3 = "SELECT m.ID_Mascota, m.Foto, m.Edad, m.Peso, m.Descripcion, m.Nombre_Mascota as Nombre, s.Sexo as Sexo, C.Nombre as Color, t.Nombre as Tamaño, r.Raza as Raza FROM mascotas AS m INNER JOIN color as C ON C.ID_Color = m.ID_Color JOIN tamano t ON t.ID_Tamano = m.ID_Tamano JOIN sexo AS s ON s.ID_Sexo = m.ID_Sexo JOIN raza AS r ON r.ID_Raza = m.ID_Raza where m.ID_Mascota= '$valor_Obtenido'";
            $resultado = $conexion->query($sql3);
        }catch(\Exeption $e){
            echo $e->getMessage();
        }?>
        <?php  ?>
<section class="contenedor_adopta">   
    <?php $mascota = $resultado->fetch_assoc();?> 
    <div>
        <p class="Nombre_Mascota Titulo_mascotas"><?php echo $mascota['Nombre'] ?></p><!--Nombre-->
    </div>
    <div class="division">   
        <div> <!--IMAGEN-->
            <img class ="Img_adopta_esp" src= "<?php echo $mascota['Foto'] ?>" alt="Imagen perro uno"/>
        </div>
        <div class="left"> <!--Textos-->
            <div class="division_datos">
                <p class="texto_sub_ti">Genero</p>
                <p class="texto_sub sombreado_texto"><?php echo $mascota['Sexo'] ?></p> 
            </div>
            <div class="division_datos">
                <p class="texto_sub_ti">Raza</p>
                <p class="texto_sub sombreado_texto"><?php echo $mascota['Raza'] ?></p> 
            </div>
            <div class="division_datos">
                <p class="texto_sub_ti">Edad</p>
                <p class="texto_sub sombreado_texto"><?php echo $mascota['Edad'] ?></p>    
            </div>
            <div class="division_datos">
                <p class="texto_sub_ti">Peso</p>
                <p class="texto_sub sombreado_texto"><?php echo $mascota['Peso'] ?></p>              
            </div >
            <div class="division_datos">
                <p class="texto_sub_ti">Tamaño</p>
                <p class="texto_sub sombreado_texto"><?php echo $mascota['Tamaño'] ?></p>
            </div>
            <div class="division_datos">
                <p class="texto_sub_ti">Color</p>
                <p class="texto_sub sombreado_texto"><?php echo $mascota['Color'] ?></p>
            </div>
            <div> <!--Descripcion -->
                <p class="texto_sub"><?php echo $mascota['Descripcion'] ?></p>
            </div>
            <form action="Adopta_Esp.php?adoptar=<?php echo $mascota['ID_Mascota']?>" method="POST" class="form_adoptar">            
                <div class="buttonap-border">
                    <button class="buttonap Btn_Buscador">Adoptar</button>
                </div>
            </form>
        </div> <!--Fin Textos-->    
    </div> <!--Fin Divison-->
    <?php 
        try {
            require_once "Configuraciones/Funciones.php";
            $sql_recomendados = "";
            }catch(\Exeption $e){
                echo $e->getMessage();
            }
    ?>
    <div><!--Recomendados -->
        <h2 class="Nombre_Mascota Titulo_mascotas Mas_Suge">Mascotas sugeridas</h2>
        <?php 
            /*OBTENCION DE LOS PARAMETROS BASES*/
            $Consulta_Principal = mysqli_query($conexion,"SELECT m.ID_Mascota, s.ID_Sexo, r.ID_Raza, cat.ID_Categoria FROM mascotas m INNER JOIN sexo s ON s.ID_Sexo = m.ID_Sexo INNER JOIN raza r ON r.ID_Raza = m.ID_Raza INNER JOIN categoria_mascota cat ON cat.ID_Categoria = m.ID_Categoria where m.ID_Mascota= '$valor_Obtenido'");
            $Mascota_Base = mysqli_fetch_array($Consulta_Principal); 
            $ID_Mascota = $Mascota_Base['ID_Mascota'];
            $ID_Sexo = $Mascota_Base['ID_Sexo'];
            $ID_Raza = $Mascota_Base['ID_Raza'];
            $ID_Categoria = $Mascota_Base['ID_Categoria'];
            /*ALGORITMO PARA LAS SUGERENCIAS*/
            $Cantidad_Principal = mysqli_query($conexion, "SELECT COUNT(*) as Filas FROM mascotas m INNER JOIN sexo s ON s.ID_Sexo = m.ID_Sexo INNER JOIN raza r ON r.ID_Raza = m.ID_Raza WHERE (s.ID_Sexo = '$ID_Sexo') and (r.ID_Raza = '$ID_Raza') and (m.ID_Mascota != '$ID_Mascota')");
            $Filas_Cantidad_Principal = mysqli_fetch_array($Cantidad_Principal); 
            $Total_Principal = $Filas_Cantidad_Principal['Filas'];
            $Consulta_Mascota_Sola = "";
            $Consulta_Mascotas_Restantes = "";
            if($Total_Principal < 2){
                $Consulta_Mascota_Sola =  mysqli_query($conexion, "SELECT m.ID_Mascota,m.Nombre_Mascota, m.Foto FROM mascotas m INNER JOIN sexo s ON s.ID_Sexo = m.ID_Sexo INNER JOIN raza r ON r.ID_Raza = m.ID_Raza INNER JOIN categoria_mascota cat on cat.ID_Categoria = m.ID_Categoria WHERE (s.ID_Sexo = '$ID_Sexo' and r.ID_Raza = '$ID_Raza' and m.ID_Mascota != '$ID_Mascota') LIMIT 1"); 
                $Consulta_Mascotas_Restantes = mysqli_query($conexion, "SELECT m.ID_Mascota,m.Nombre_Mascota, m.Foto FROM mascotas m INNER JOIN sexo s ON s.ID_Sexo = m.ID_Sexo INNER JOIN raza r ON r.ID_Raza = m.ID_Raza INNER JOIN categoria_mascota cat on cat.ID_Categoria = m.ID_Categoria WHERE (m.ID_Sexo= '$ID_Sexo' and m.ID_Mascota != '$ID_Mascota' and m.ID_Categoria = '$ID_Categoria' and r.ID_Raza != '$ID_Raza')  ORDER BY RAND() LIMIT 3");
            }else{
                $Consulta_Mascota_Sola =  mysqli_query($conexion, "SELECT m.ID_Mascota,m.Nombre_Mascota, m.Foto FROM mascotas m INNER JOIN sexo s ON s.ID_Sexo = m.ID_Sexo INNER JOIN raza r ON r.ID_Raza = m.ID_Raza INNER JOIN categoria_mascota cat on cat.ID_Categoria = m.ID_Categoria WHERE (s.ID_Sexo = '$ID_Sexo' and r.ID_Raza = '$ID_Raza' and m.ID_Mascota != '$ID_Mascota') ORDER BY RAND() LIMIT 2"); 
                $Consulta_Mascotas_Restantes = mysqli_query($conexion, "SELECT m.ID_Mascota,m.Nombre_Mascota, m.Foto FROM mascotas m INNER JOIN sexo s ON s.ID_Sexo = m.ID_Sexo INNER JOIN raza r ON r.ID_Raza = m.ID_Raza INNER JOIN categoria_mascota cat on cat.ID_Categoria = m.ID_Categoria WHERE (m.ID_Sexo= '$ID_Sexo' and m.ID_Mascota != '$ID_Mascota' and m.ID_Categoria = '$ID_Categoria' and r.ID_Raza != '$ID_Raza')  ORDER BY RAND() LIMIT 2");
            }
            ?>
            <ul class="lista_mascotas_suge">
                <?php
                    while($mascotas_resomendadas = mysqli_fetch_array($Consulta_Mascota_Sola)){?>
                        <li>
                            <div class="mascota_suge">
                                <a href="Adopta_Esp.php?mascota=<?php echo $mascotas_resomendadas['ID_Mascota']?>" class="cinta uno" <?php echo $mascotas_resomendadas['ID_Mascota']?>>
                                    <img class ="img_mascotas" src= "<?php echo $mascotas_resomendadas['Foto']?>" alt="Imagen perro uno"/>   
                                </a> 
                                <p class="Nombre_Mascota"><?php echo $mascotas_resomendadas['Nombre_Mascota']?></p> </div>
                        </li>
                    <?php } /**while de fetch*/ ?> 
                <?php
                    while($mascotas_resomendadas = mysqli_fetch_array($Consulta_Mascotas_Restantes)){?>
                        <li>
                            <div class="mascota_suge">
                                <a href="Adopta_Esp.php?mascota=<?php echo $mascotas_resomendadas['ID_Mascota']?>" class="cinta uno" <?php echo $mascotas_resomendadas['ID_Mascota']?>>
                                        <img class ="img_mascotas" src= "<?php echo $mascotas_resomendadas['Foto']?>" alt="Imagen perro uno"/>   
                                </a> 
                                <p class="Nombre_Mascota"><?php echo $mascotas_resomendadas['Nombre_Mascota']?></p> </div>
                        </li>
                    <?php } /**while de fetch*/?> 
            </ul>
            <?php/*ALGORITMO PARA LAS SUGERENCIAS*/?>
            </div><!-- Cierre Recomendados -->
        </section>
    <?php include_once 'Modulos/Templates/footer.php'; 
    }else if(isset($_GET['adoptar'])){/*SECCION ADOPTAR*/ include_once 'Modulos/Templates/header.php';?>
    <div class="seccion_mascotas_busqueda centrar_adopta">
        <h2 class="Titulo_mascotas titu_adop" >ESTAS INICIANDO EL PROCESO DE ADOPCION</h2>
        <p class="texto_sub">Para llevar a cabo con este proceso, recuerda:</p>
        <ul class="Lista_Requerimientos">
            <li>Debes estar registrado en el sitio web, si no no lo estas ingresa 
                <a href="Registro_Usuario.php" class="hipervinculo hover-underline-animation" target="_blank">aquí</a>
            </li>
            <li>Tomate unos minutos para leer la seccion de <a href="Cosas_a_considerar.php" class="hipervinculo hover-underline-animation" target="_blank">cosas a considerar antes de adoptar</a></li>
            <li>Considera que la mascota elegida tienes las caracteristicas que en verdad deseas</li>
            <li>Verifica los datos que se encuentran en el formulario</li>
            <li>Debes esperar la respuesta de nuestros funcionarios via correo electronico o llamada para terminar los tramites correspondientes con la adopcion</li>
            <li>Recuerda que posteriormente se verificara el estado de la mascota con su nueva familia</li>
            </ul>
            <form action="Adopta_Esp.php?adopcion=<?php echo $_GET['adoptar']?>&acep=1" method="POST" class="form_adoptar centrar_boton_adop">            
                <div class="buttonap-border">
                    <button class="buttonap Btn_Buscador">Iniciar</button>
                </div>
            </form>
    </div>
   <?php include_once 'Modulos/Templates/footer.php';?>
   <?php }else if(s($_GET['adopcion']) && isset($_GET['acep'])){
        include "Configuraciones/Funciones.php";
        $alert='';
        $ID_Mascota_adoptar = $_GET['adopcion'];
        $Aceptar = $_GET['acep'];
        $Consulta_Adoptar = mysqli_query($conexion, "SELECT m.ID_Mascota FROM mascotas m WHERE m.ID_Mascota = '$ID_Mascota_adoptar' and m.ID_Estado!=2");
        $Filas_Adoptar = mysqli_num_rows($Consulta_Adoptar);
        if($Filas_Adoptar > 0 && $Aceptar == 1){/*Si valida la informacion comprueba si esta logeado*/
        if(!isset($_SESSION)){
            session_start();
        }
        if(!empty($_SESSION['active'])){
            header('location: Solicitud_adopcion.php?mascota='.$ID_Mascota_adoptar);
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
                        header('location: Solicitud_adopcion.php?mascota='.$ID_Mascota_adoptar);
                    }else{
                        $alert = 'El usuario o la contraseña son incorrectos';
                        session_destroy();
                    }
                }
        }
    }      
    ?>
    <?php include_once 'Modulos/Templates/header.php';?>
    <div class="seccion_mascotas_busqueda centrar_adopta">
		<article>
            <h2 class="Titulo_mascotas titu_adop" >Antes de seguir debes iniciar sesion</h2>
            <p class="texto_sub espaciado_adop">Registrate o autenticate y empieza con el proceso de adopcion de tu mascota.</p>
            <div class="Agrupar_botons">
                <div class="buttonap-border">
                    <a href="Adopta.php">
                        <button class="buttonap btn_Validar_Can">Cancelar</button>
                    </a>
                </div>
                <div class="buttonap-border">
                    <button id="btn-abrir-popup" class="buttonap btn_Validar">Iniciar sesion</button>
                </div>
            </div>	
        </article>
        <div class="overlay" id="overlay">
		    <div class="popup" id="popup">
			    <a href="#" id="btn-cerrar-popup" class="btn-cerrar-popup"><i class="fas fa-times"></i><a>
			    <h3>Inicia sesion o registrate</h3>
			    <form  method="post">
				    <div class="contenedor-inputs">
                        <h3>Iniciar sesion</h3>
                        <img src="img/Inicio_Sesion65.png" alt="Login">
                        <input type="text" name="usuario" placeholder="Usuario">
                        <input type="password" name="clave" placeholder="Contraseña">
                        <input type="submit" class="btn-submit" value="Ingresar">
				    </div>
				</form>
			</div>
        </div>
        <div >
            <p class="alert msg_error_adop"><?php echo isset($alert) ? $alert : ''; ?></p>   
        </div>
    </div>
        <script src="popup.js"></script>
       <?php }else {
           echo "Error";
       } ?> 
    <?php }  
    ?>     
