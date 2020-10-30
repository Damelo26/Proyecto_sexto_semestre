
 
 <?php include_once 'Modulos/Templates/Header_Admin.php';  ?>


    
<div class="Contenido">
  
    <section id="Contenedor_Adoptados_Mascotas">
    <h1><i class="fab fa-themeisle"></i>Solicitud de adopción</h1>
     <table class="Tabla_Solicitudes">
        <tr>
          <th>ID_Mascota</th>
          
          <th>Nombre</th>
          <th>Raza</th>
          <th>Edad</th>
          <th>Descripción</th>
          <th>Foto</th> 
          
          
          
          <th>Peso</th>
          <th>Acciones</th>
        </tr>
        <?php
        
        require_once "Configuraciones/Funciones.php";
       $indicador=3; /*Mientras se generan los otros pruebo con el 1, en realidad es el 3*/
        $sql="SELECT * from mascotas  WHERE ID_Estado = '$indicador'"; 
        $result=mysqli_query($conexion, $sql);
        
        while($mostrar=mysqli_fetch_array($result)){
          $identificador= $mostrar ['ID_Mascota'];
        
        ?>
        
        <tr>
          <td><?php echo $mostrar ['ID_Mascota'] ?></td>
         
          <td><?php echo $mostrar ['Nombre_Mascota'] ?></td>
          <td><?php echo $mostrar ['Raza'] ?></td>
          <td><?php echo $mostrar ['Edad'] ?></td>
          <td><?php echo $mostrar ['Descripcion'] ?></td>
          <td><img  src="<?php echo $mostrar ['Foto']?>"></td>
          
          
          <td><?php echo $mostrar ['Peso'] ?></td>
          <td>
         
        <a class="link_aprobar_masc" href="funcion.php?id=<?php echo $mostrar["ID_Mascota"]; ?>"> Aprobar </a>
        <a class="link_rechazar" href="funcionrec.php?id=<?php echo $mostrar["ID_Mascota"]; ?>"> Rechazar </a>

        
         
          </td>
        </tr>
        <?php
        }
        ?>
       
      </table>
    
     
    </section>
    </div>
<?php include_once 'Modulos/Templates/Footer_Admin.php'; ?>
     
