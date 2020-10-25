<?php include_once 'Modulos/Templates/header.php';  ?>
<?php /*Consulta a la base de datos*/    
    try{
        require_once "Configuraciones/Funciones.php";
        $sql = "SELECT Nombre_Mascota, ID_Categoria FROM mascotas";
        $resultado = $conexion->query($sql);
     }catch(\Exeption $e){
        echo $e->getMessage(); 

    }
?>
   
    <?php/*
        $conexion->close();
        
    */?>
  <?php /*
    <?php   
    try{
        require_once "Configuraciones/Funciones.php";
        $sql = "SELECT * FROM mascotas";
        $resultado = $conexion->query($sql);

    }catch(\Exeption $e){
        echo $e->getMessage(); 

    }
    ?>
        <?php
            $eventos = $resultado->fetch_assoc(); 
        ?>

        <pre>
            <?php
            var_dump($eventos);
            ?>
        </pre>
        <?php
            $conexion->close();
        ?> */ 
    ?>

    <section class = "mascotas_busqueda">
        <h2 class="prueba"> Las mascotas son</h2>
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
    </section>
   
   
<?php include_once 'Modulos/Templates/footer.php';  ?>