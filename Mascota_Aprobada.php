<?php include_once 'Modulos/Templates/Header_Admin.php';  ?>
<div class="Contenido">
    <section id="Contenedor_Adoptados_Mascotas">
    <h1>Mascotas Adoptadas</h1>
       <a href="" class=""></a> 
      <table>
        <tr>
          <th>ID_Adopcion</th>
          <th>Cedula</th>
          <th>Nombre</th>
          <th>ID_Mascotas</th>
          <th>Estado</th>
          
        </tr>
        <?php
        
        include "Configuraciones/Funciones.php";
        $idadop = "1";
		$CCpersona = "222";
		$idmasc = "2";
		$estadom = "Si";
        $query_insert = mysqli_query($conexion, "INSERT INTO adoptados(ID_Adopcion, Cedula, ID_Mascotas,
        Aprobado) VALUES('$idadop','$CCpersona'
        ,'$idmasc','$estadom)");
        ?>

        <?php 
         require_once "Configuraciones/Funciones.php";
         $sql="SELECT * from adoptados ";
         $result=mysqli_query($conexion, $sql);
       
        while($mostrar=mysqli_fetch_array($result)){

        
        ?>
        <tr>
          <td><?php echo $mostrar ['ID_Adopcion'] ?></td>
          <td><?php echo $mostrar ['Cedula'] ?></td>
          <td><?php echo $mostrar ['ID_Mascotas'] ?></td>
          <td><?php echo $mostrar ['Aprobado'] ?></td>
         
          
        </tr>
        <?php
        }
        ?>
      </table>
     
    </section>
    </div>
<?php include_once 'Modulos/Templates/Footer_Admin.php';?>
</div>
