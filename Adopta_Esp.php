<?php include_once 'Modulos/Templates/header.php';  ?>
<?php 
    $valor_Obtenido = $_GET["mascota"];
        try {
            require_once "Configuraciones/Funciones.php";
            $sql = "SELECT * FROM `mascotas` WHERE ID_Mascota = '$valor_Obtenido' ";
            $sql2 = "SELECT `m.ID_Mascota`, `m.Nombre_Mascota`, `f.Nombre` FROM `mascotas` AS m INNER JOIN `categoria_mascota` as f ON `f.ID_Categoria` = `m.ID_Categoria` where `m.ID_Mascota`= '$valor_Obtenido'";
            $sql3 = "SELECT m.ID_Mascota, m.Foto, m.Edad, m.Raza, m.Peso, m.Descripcion, m.Nombre_Mascota as Nombre, C.Nombre as Color, t.Nombre as Tamaño FROM mascotas AS m INNER JOIN color as C ON C.ID_Color = m.ID_Color JOIN tamano t ON t.ID_Tamano = m.ID_Tamano where m.ID_Mascota= '$valor_Obtenido'";
            $resultado = $conexion->query($sql3);
        }catch(\Exeption $e){
            echo $e->getMessage();
        }
?>
Variable "id_mascota": <?php echo $_GET["mascota"]; ?> 

<section class="contenedor_adopta">   
    <?php 
        $mascota = $resultado->fetch_assoc();
    ?> 
    <div>
            <p><?php echo $mascota['Nombre'] ?></p><!--Nombre-->
    </div>
    <div class="division">   
        <div> <!--IMAGEN-->
            <img class ="Img_adopta_esp" src= "<?php echo $mascota['Foto'] ?>" alt="Imagen perro uno"/>
        </div>
        <div class="left"> <!--Textos-->
            <div class="division_datos">
                <p>Raza</p>
                <p><?php echo $mascota['Raza'] ?></p> 
            </div>
            <div class="division_datos">
                <p>Edad</p>
                <p><?php echo $mascota['Edad'] ?></p>    
            </div>
            <div class="division_datos">
                <p>Peso</p>
                <p><?php echo $mascota['Peso'] ?></p>
                               
            </div >
            <div class="division_datos">
                <p>Tamaño</p>
                <p><?php echo $mascota['Tamaño'] ?></p>
            </div>
            <div class="division_datos">
                <p>Color</p>
                <p><?php echo $mascota['Color'] ?></p>
            </div>
            <div> <!--Descripcion -->
            <p><?php echo $mascota['Descripcion'] ?></p>
            </div>
        </div> 
    </div> 
    <?php 
        try {
            require_once "Configuraciones/Funciones.php";
            $sql_recomendados = "SELECT * FROM `mascotas` WHERE Foto != '' ";
            /*Cambiar el SQL */
            $resultado_recomendados = $conexion->query($sql_recomendados);
        }catch(\Exeption $e){
            echo $e->getMessage();
        }
    ?>

    <div><!--Recomendados -->
    <h2>Mascotas sugeridas</h2>
    <ul class="lista_mascotas_suge">
        <?php
            $arreglo_mascota = array();
           while($mascotas_resomendadas = $resultado_recomendados->fetch_assoc()){?>
                    <li>
                        <div class="mascota_suge">
                            <a href="Adopta_Esp.php?mascota=<?php echo $mascotas_resomendadas['ID_Mascota']?>" class="cinta uno" <?php echo $mascotas_resomendadas['ID_Mascota']?>>
                                <img class ="img_mascotas" src= "<?php echo $mascotas_resomendadas['Foto'] ?>" alt="Imagen perro uno"/>
                                <p><?php ?></p> <!--Revisar en el video img_mascotas a ver que hace con esa -->
                            </a> 
                                <p class="Nombre_Mascota"><?php echo $mascotas_resomendadas['Nombre_Mascota']?></p>                         
                        </div>
                    </li>
                
             <?php } /**while de fetch*/ ?>
               
         
    </ul>

    </div>
    <?php
            $conexion->close();
        ?>
       
</section>


<? /*php include_once 'Modulos/Templates/footer.php'; */ ?>