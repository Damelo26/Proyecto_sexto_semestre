<?php include_once 'Modulos/Templates/Header_Admin.php';  ?>
<div class="Contenido">
    <section id="Contenedor_Administrar_Mascotas">
        <?php
            $Buscador = strtolower($_REQUEST['Buscador']);
            if(empty($Buscador)){
                header('Location: Administrar_Mascotas_Admin.php');
            }
        ?>
        <h2><i class="fas fa-clipboard-list"></i> Animalitos de Pets' Home</h2>
        <a href="Registrar_Admin.php" class="Btn_Nuevo_Administrar_Mascota">Registrar animalito</a> 
      <form action="Buscar_Mascotas_Administrador.php" method= "get" class="Formulario_Buscador">
        <input type="text" name="Buscador" id="Buscador" placeholder="Buscar" value="<?php echo $Buscador; ?>">
        <input type="submit" value="Buscar" class="Btn_Buscador">
      </form>
       <table>
        <tr>
          <th>ID_Mascota</th>
          <th>Categoria</th>
          <th>Nombre</th>
          <th>Raza</th>
          <th>Edad</th>
          <th>Color</th>
          <th>Tamaño</th>
          <th>Peso</th>
          <th>Sexo</th>
          <th>Foto</th>
          <th>Adoptado</th>
          <th>Acciones</th>
        </tr>
        <?php
        include "Configuraciones/Funciones.php";
          $Query_Cantidad_Registros = mysqli_query($conexion, "SELECT COUNT(*) as Total_Registros FROM mascotas m INNER JOIN categoria_mascota C ON m.ID_Categoria = C.ID_Categoria INNER JOIN color Cl ON m.ID_Color = Cl.ID_Color INNER JOIN tamano T ON m.ID_Tamano = T.ID_Tamano INNER JOIN estado Es ON m.ID_Estado = Es.ID_Estado INNER JOIN raza R ON m.ID_Raza = R.ID_Raza INNER JOIN sexo S ON m.ID_Sexo = S.ID_Sexo WHERE (m.ID_Mascota LIKE '%$Buscador%' OR C.Nombre LIKE '%$Buscador%' OR m.Nombre_Mascota LIKE '%$Buscador%' OR R.Raza LIKE '%$Buscador%' OR m.Edad LIKE '%$Buscador%' OR m.Descripcion LIKE '%$Buscador%' OR C.Nombre LIKE '%$Buscador%' OR T.Nombre LIKE '%$Buscador%' OR m.Frase LIKE '%$Buscador%' OR m.Peso LIKE '%$Buscador%' OR S.Sexo LIKE '%$Buscador%' OR Es.Estado LIKE '%$Buscador%') AND (Es.ID_Estado = 1 OR Es.ID_Estado = 3)");
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
          $Busqueda_Tabla_Mascotas = mysqli_query($conexion, "SELECT m.ID_Mascota, C.Nombre as Categoria, m.Nombre_Mascota as Nombre, m.ID_Raza, R.Raza AS Raza, m.Edad, m.Foto, Cl.Nombre as Color, T.Nombre as Tamano, m.Peso, m.ID_Sexo, S.Sexo as Sexo, Es.Estado as Estado FROM mascotas m INNER JOIN categoria_mascota C ON m.ID_Categoria = C.ID_Categoria INNER JOIN color Cl ON m.ID_Color = Cl.ID_Color INNER JOIN tamano T ON m.ID_Tamano = T.ID_Tamano INNER JOIN estado Es ON m.ID_Estado = Es.ID_Estado INNER JOIN raza R ON m.ID_Raza = R.ID_Raza INNER JOIN sexo S ON m.ID_Sexo = S.ID_Sexo WHERE (m.ID_Mascota LIKE '%$Buscador%' OR m.Nombre_Mascota LIKE '%$Buscador%' OR R.Raza LIKE '%$Buscador%' OR m.Edad LIKE '%$Buscador%' OR m.Descripcion LIKE '%$Buscador%' OR C.Nombre LIKE '%$Buscador%' OR T.Nombre LIKE '%$Buscador%' OR m.Frase LIKE '%$Buscador%' OR m.Peso LIKE '%$Buscador%' OR S.Sexo LIKE '%$Buscador%' OR Es.Estado LIKE '%$Buscador%') AND (Es.ID_Estado = 1 OR Es.ID_Estado = 3) ORDER BY m.ID_Mascota ASC LIMIT $Desde,$Total_Registros_Por_Pagina");
          $Resultado_Tabla = mysqli_num_rows($Busqueda_Tabla_Mascotas);
          if($Resultado_Tabla > 0){
            while($Datos_Tabla = mysqli_fetch_array($Busqueda_Tabla_Mascotas)){
              ?>
              <tr>
                <td><?php echo $Datos_Tabla["ID_Mascota"]; ?></td>
                <td><?php echo $Datos_Tabla["Categoria"]; ?></td>
                <td><?php echo $Datos_Tabla["Nombre"]; ?></td>
                <td><?php echo $Datos_Tabla["Raza"]; ?></td>
                <td><?php echo $Datos_Tabla["Edad"]; ?></td>
                <td><?php echo $Datos_Tabla["Color"]; ?></td>
                <td><?php echo $Datos_Tabla["Tamano"]; ?></td>
                <td><?php echo $Datos_Tabla["Peso"]; ?></td>
                <td><?php echo $Datos_Tabla["Sexo"]; ?></td>
                <td><img src="<?php echo $Datos_Tabla["Foto"]; ?>" alt="" class="Foto_Mascota_Tabla_Administrar"></td>
                <td><?php echo $Datos_Tabla["Estado"]; ?></td>
                <td>
                  <a href="Modificar_Mascota_Administrador.php?id=<?php echo $Datos_Tabla["ID_Mascota"]; ?>" class="Link_Modificar_Mascota">Actualizar </a>
                  <a href="Eliminar_Mascota_Administrador.php?id=<?php echo $Datos_Tabla["ID_Mascota"]; ?>" class="Link_Borrar_Mascota">Eliminar</a>
                </td>
              </tr>
              <?php
            }
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
            <li><a href="?Pagina=<?php echo 1; ?>&Buscador=<?php echo $Buscador; ?>">|<</a></li>
            <li><a href="?Pagina=<?php echo $Pagina - 1; ?>&Buscador=<?php echo $Buscador; ?>"><<</a></li>
            <?php
            }
              for ($i=1; $i <= $Total_Paginas; $i++) { 
                if($i == $Pagina){
                  echo '<li class="Pagina_Seleccionada">'.$i.'</li>';
                }else{
                  echo '<li><a href="?Pagina='.$i.'&Buscador='.$Buscador.'">'.$i.'</a></li>';
                }
              }
              if($Pagina != $Total_Paginas){
            ?>

            <li><a href="?Pagina=<?php echo $Pagina + 1; ?>&Buscador=<?php echo $Buscador; ?>">>></a></li>
            <li><a href="?Pagina=<?php echo $Total_Paginas; ?>&Buscador=<?php echo $Buscador; ?>">>|</a></li>
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
<?php include_once 'Modulos/Templates/Footer_Admin.php';?>