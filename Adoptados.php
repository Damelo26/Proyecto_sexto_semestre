

<?php include_once 'Modulos/Templates/header.php';  ?>

   

<?php 
   require_once "Configuraciones/Funciones.php";
   $indicador=2; /*Mientras se generan los otros pruebo con el 1, en realidad es el 3*/
        $sql="SELECT * from mascotas  WHERE ID_Estado = '$indicador'";
       
        $result=mysqli_query($conexion, $sql);
        
		
					
        while($mostrar=mysqli_fetch_array($result)){
    ?>

    <section class = "adoptados_busqueda">
     
        
                
                <ul class="lista_adoptados">
            <li>
            <div class="adoptados">
                    <a class="cint q">
                        <img class ="img_adoptados" src="<?php echo $mostrar ['Foto'] ?>" alt=""/>
                    </a> 
                        <p class="Nombre_Adop"><?php echo $mostrar ['Nombre_Mascota'] ?></p>
                        <p class="Frase_OcultaA"><?php echo $mostrar ['Frase'] ?></p>                     
                        </div>    
                    </li>
        </ul>
                  
        
       
            <?php
        }
        ?>
      
    </section>
   
   



<?php include_once 'Modulos/Templates/footer.php';  ?>