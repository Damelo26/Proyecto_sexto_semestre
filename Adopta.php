<?php include_once 'Modulos/Templates/header.php';  ?>
<?php 
        try {
            require_once "Configuraciones/Funciones.php";
            $sql = "SELECT * FROM `mascotas` WHERE Foto != '' ";
            $resultado = $conexion->query($sql);
        }catch(\Exeption $e){
            echo $e->getMessage();
        }
?>

    <section class = "mascotas_busqueda">
        <h2 class="prueba"> Las mascotas son</h2>
            
        <ul class="lista_mascotas">
        <?php
            $arreglo_mascota = array();
           while($mascotas = $resultado->fetch_assoc()){?>
                
                    <li>
                        <div class="mascota">
                            <a href="Adopta_Esp.php?mascota=<?php echo $mascotas['ID_Mascota']?>" class="cinta uno" <?php echo $mascotas['ID_Mascota']?>>
                                <img class ="img_mascotas" src= "<?php echo $mascotas['Foto'] ?>" alt="Imagen perro uno"/>
                                <p><?php ?></p>
                            </a> 
                                <p class="Nombre_Mascota"><?php echo $mascotas['Nombre_Mascota']?></p>
                                <p class="Frase_Oculta"><?php echo $mascotas['Frase']?></p>      
                                               
                        </div>
                    </li>
                
             <?php } /**while de fetch*/ ?>
               
             

        <?php
            $conexion->close();
        ?>  

        <?php 
            //Imprimir los datos


        ?>

        <!--
        <ul class="lista_mascotas">
            <li>
                <div class="mascota">
                    <a class="cinta uno">
                        <img class ="img_mascotas" src="img/mascotas/perro2.jpg" alt="Imagen perro uno"/>
                    </a> 
                        <p class="Nombre_Mascota">Lucia</p>
                        <p class="Frase_Oculta">Soy un animal muy feliz</p>                     
                </div>
            </li>
            <li>
                <div class="mascota"> 
                    <img class ="img_mascotas" src="img/mascotas/perro2.jpg" alt="Imagen perro uno">
                    <p>Lucia</p>
                </div>
            </li>
            <li>
                <div class="mascota"> 
                    <img class ="img_mascotas" src="img/mascotas/perro2.jpg" alt="Imagen perro uno">
                    <p>Lucia</p>
                </div>
            </li>
            <li>
                <div class="mascota"> 
                    <img class ="img_mascotas" src="img/mascotas/perro2.jpg" alt="Imagen perro uno">
                    <p>Lucia</p>
                </div>
            </li> 
            <li>
                <div class="mascota"> 
                    <img class ="img_mascotas" src="img/mascotas/perro2.jpg" alt="Imagen perro uno">
                    <p>Lu</p>
                </div>
            </li>

        </ul>
    -->
    </ul>
    </section>
   
   
<?php include_once 'Modulos/Templates/footer.php';  ?>