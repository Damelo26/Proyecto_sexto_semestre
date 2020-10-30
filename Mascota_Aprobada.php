<?php include_once 'Modulos/Templates/Header_Admin.php';  ?>
<div class="Contenido">
    <section id="Contenedor_Adoptados_Mascotas">
    <h1><i class="fab fa-gratipay"></i>Mascotas adoptadas</h1>
       <a href="" class=""></a> 
      <table class="Tabla_Adoptados">
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
         $indicador=2; 
         $sql="SELECT * from mascotas  WHERE ID_Estado = '$indicador'"; 
         $result=mysqli_query($conexion, $sql);
        while($mostrar=mysqli_fetch_array($result)){

        
        ?>
        <tr>
        <td><?php echo $mostrar ['ID_Mascota'] ?></td>
          
          <td><?php echo $mostrar ['Nombre_Mascota'] ?></td>
          <td><?php echo $mostrar ['Raza'] ?></td>
          <td><?php echo $mostrar ['Edad'] ?></td>
          <td><?php echo $mostrar ['Descripcion'] ?></td>
          <td><img  src="<?php echo $mostrar ['Foto']?>" alt=""></td>
         
          <td><?php echo $mostrar ['Peso'] ?></td>
          <td>
         
         <a class="link_modif_masc" href="funcionadop.php?id=<?php echo $mostrar["ID_Mascota"]; ?>">Modificar </a>
         
 
         
          
           </td>
        </tr>
        <?php
        }
        ?>
      </table>
     
    </section>
    </div>
<?php include_once 'Modulos/Templates/Footer_Admin.php';?>
</div>
