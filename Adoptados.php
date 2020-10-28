

<?php include_once 'Modulos/Templates/header.php';  ?>

   

<?php 
   require_once "Configuraciones/Funciones.php";
        $sql="SELECT * from mascotas ";
        $result=mysqli_query($conexion, $sql);
        
		
					
        while($mostrar=mysqli_fetch_array($result)){
    ?>

    <section class = "mascotas_busqueda">
     
        
                
                <ul class="lista_mascotas">
            <li>
            <div class="mascota">
                    <a class="cinta uno">
                        <img class ="img_mascotas" src="<?php echo $mostrar ['Foto'] ?>" alt=""/>
                    </a> 
                        <p class="Nombre_Mascota"><?php echo $mostrar ['ID_Mascota'] ?></p>
                        <p class="Frase_Oculta"><?php echo $mostrar ['Frase'] ?></p>                     
                        </div>    
                    </li>
        </ul>
                  
        
       
            <?php
        }
        ?>
      
    </section>
   
   



<?php include_once 'Modulos/Templates/footer.php';  ?>