<?php include_once 'Modulos/Templates/Header_Admin.php';?>
<div class="Contenido">
    <section id="Contenedor_Adoptados_Mascotas">
    <h2><i class="fab fa-themeisle"></i> Solicitud de adopción</h2>
    <form action="Buscar_Solicitudes_Administrador.php" method= "get" class="Formulario_Buscador">
        <input type="text" name="Buscador" id="Buscador" placeholder="Buscar">
        <input type="submit" value="Buscar" class="Btn_Buscador">
    </form>
     <table class="Tabla_Solicitudes">
        <tr>
          <th>ID_Mascota</th>
          <th>Mascota</th>
          <th>Raza</th>
          <th>Edad</th>
          <th>Foto</th>
          <th>Sexo</th>
          <th>Cedula</th>
          <th>Usuario</th>
          <th>Email</th>
          <th>Telefono</th>
          <th>Direccion</th>
          <th>Acciones</th>
        </tr>
        <?php
        require_once "Configuraciones/Funciones.php";
        $Query_Cantidad_Registros = mysqli_query($conexion, "SELECT COUNT(*) as Total_Registros FROM adoptados Ad INNER JOIN mascotas m ON Ad.ID_Mascotas = m.ID_Mascota WHERE m.ID_Estado = 3");
          $Resultado_Cantidad_Registros = mysqli_fetch_array($Query_Cantidad_Registros);
          $Total_Cantidad_Registros = $Resultado_Cantidad_Registros['Total_Registros'];
          $Total_Registros_Por_Pagina = 15;
          if(empty($_GET['Pagina'])){
            $Pagina = 1;
          }else{
            $Pagina = $_GET['Pagina'];
          }
          $Desde = ($Pagina-1) * $Total_Registros_Por_Pagina;
          $Total_Paginas = ceil($Total_Cantidad_Registros / $Total_Registros_Por_Pagina);
       $indicador=3; /*Mientras se generan los otros pruebo con el 1, en realidad es el 3*/
        $sql="SELECT m.ID_Mascota, m.Nombre_Mascota, R.Raza, m.Edad, m.Foto, S.Sexo, Ad.Cedula, U.Primer_Nombre, U.Segundo_Nombre, U.Primer_Apellido, U.Segundo_Apellido, U.Email, U.Telefono, U.Direccion from adoptados Ad INNER JOIN mascotas m ON Ad.ID_Mascotas = m.ID_Mascota INNER JOIN raza R ON m.ID_Raza = R.ID_Raza INNER JOIN sexo S ON m.ID_Sexo = S.ID_Sexo INNER JOIN usuario U ON Ad.Cedula = U.Cedula WHERE m.ID_Estado = '$indicador' ORDER BY m.ID_Mascota ASC LIMIT $Desde,$Total_Registros_Por_Pagina"; 
        $result=mysqli_query($conexion, $sql);
        while($mostrar=mysqli_fetch_array($result)){
          $identificador= $mostrar ['ID_Mascota'];
        ?>
        <tr>
          <td><?php echo $mostrar ['ID_Mascota'] ?></td>    
          <td><?php echo $mostrar ['Nombre_Mascota'] ?></td>
          <td><?php echo $mostrar ['Raza'] ?></td>
          <td><?php echo $mostrar ['Edad'] ?></td>
          <td><img  src="<?php echo $mostrar ['Foto']?>"></td>
          <td><?php echo $mostrar ['Sexo'] ?></td>
          <td><?php echo $mostrar ['Cedula'] ?></td>
          <td><?php echo $mostrar ['Primer_Apellido'], ' ',$mostrar ['Segundo_Apellido'], ' ',$mostrar ['Primer_Nombre'], ' ',$mostrar ['Segundo_Nombre']; ?></td>
          <td><?php echo $mostrar ['Email'] ?></td>
          <td><?php echo $mostrar ['Telefono'] ?></td>
          <td><?php echo $mostrar ['Direccion'] ?></td>
          <td>
        <a class="link_aprobar_masc" href="funcion.php?id=<?php echo $mostrar["ID_Mascota"]; ?>&usuario=<?php echo $mostrar["Cedula"]; ?>"> Aprobar </a>
        <a class="link_rechazar" href="funcionrec.php?id=<?php echo $mostrar["ID_Mascota"]; ?>&usuario=<?php echo $mostrar["Cedula"]; ?>"> Rechazar </a>
          </td>
        </tr>
        <?php
        }
        ?>
      </table>
      <?php
        if($Total_Cantidad_Registros != 0){
      ?>
      <div class="Paginador_Administrador_Tabla">
          <ul>
            <?php
              if($Pagina != 1){
            ?>
            <li><a href="?Pagina=<?php echo 1; ?>">|<</a></li>
            <li><a href="?Pagina=<?php echo $Pagina - 1; ?>"><<</a></li>
            <?php
            }
              for ($i=1; $i <= $Total_Paginas; $i++) { 
                if($i == $Pagina){
                  echo '<li class="Pagina_Seleccionada">'.$i.'</li>';
                }else{
                  echo '<li><a href="?Pagina='.$i.'">'.$i.'</a></li>';
                }
              }
              if($Pagina != $Total_Paginas){
            ?>
            <li><a href="?Pagina=<?php echo $Pagina + 1; ?>">>></a></li>
            <li><a href="?Pagina=<?php echo $Total_Paginas; ?>">>|</a></li>
            <?php 
              }
            ?>
          </ul>
      </div>
      <?php 
        }
      ?>
    </section>
    </div>
<?php include_once 'Modulos/Templates/Footer_Admin.php'; ?>