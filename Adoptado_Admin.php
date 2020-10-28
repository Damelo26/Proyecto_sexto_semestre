
 
 <?php include_once 'Modulos/Templates/Header_Admin.php';  ?>
  
 
 
        
<div class="Contenido">
  
    <section id="Contenedor_Adoptados_Mascotas">
    <h1>Solicitud de adopción</h1>
     <table id="Adoptados">
        <tr>
          <th>ID_Mascota</th>
          <th>Categoria</th>
          <th>Nombre</th>
          <th>Raza</th>
          <th>Edad</th>
          <th>Descripción</th>
          <th>Foto</th> 
          <th>Color</th>
          <th>Tamaño</th>
          <th>Peso</th>
          <th>Adoptado</th>
          <th>Acciones</th>
        </tr>
        <?php
        
        require_once "Configuraciones/Funciones.php";
        $sql="SELECT * from mascotas ";
        $result=mysqli_query($conexion, $sql);
       
        while($mostrar=mysqli_fetch_array($result)){

        
        ?>
        
        <tr>
          <td><?php echo $mostrar ['ID_Mascota'] ?></td>
          <td><?php echo $mostrar ['ID_Categoria'] ?></td>
          <td><?php echo $mostrar ['Nombre_Mascota'] ?></td>
          <td><?php echo $mostrar ['Raza'] ?></td>
          <td><?php echo $mostrar ['Edad'] ?></td>
          <td><?php echo $mostrar ['Descripcion'] ?></td>
          <td><?php echo $mostrar ['Foto'] ?></td>
          <td><?php echo $mostrar ['ID_Color'] ?></td>
          <td><?php echo $mostrar ['ID_Tamano'] ?></td>
          <td><?php echo $mostrar ['Frase'] ?></td>
          <td><?php echo $mostrar ['Peso'] ?></td>
          <td>
         
          <form method="post" class="FormBoton" action="funcion.php" > <input type="submit" class="Btn_Apr" value="Aprobar" id="botona"> </form>
          <form method="post" class="FormBoton" action="funcionrec.php"> <input type="submit" value="Rechazar"  class="Btn_Rech" id="botonb">  </form>

      
         
          </td>
        </tr>
        <?php
        }
        ?>
       
      </table>
    
    </section>
    </div>
<?php include_once 'Modulos/Templates/Footer_Admin.php'; ?>
     
