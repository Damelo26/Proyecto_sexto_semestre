<?php include_once 'Modulos/Templates/Header_Admin.php';  ?>
<div class="Contenido">
    <section id="Contenedor_Administrar_Mascotas">
    <h1>Animalitos de Pets' Home</h1>
       <a href="Registrar_Admin.php" class="Btn_Nuevo_Administrar_Mascota">Registrar animalito</a> 
      <table>
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
        <tr>
          <td>1</td>
          <td>Perro</td>
          <td>Koby</td>
          <td>Snausser</td>
          <td>8 años</td>
          <td>Ladra mucho</td>
          <td>No tiene</td>
          <td>Blanco</td>
          <td>Pequeño</td>
          <td>12 kg</td>
          <td>Si</td>
          <td>
            <a href="" class="Link_Modificar_Mascota">Editar</a>
            <a href="" class="Link_Borrar_Mascota">Eliminar</a>
          </td>
        </tr>
      </table>
    </section>
    </div>
<?php include_once 'Modulos/Templates/Footer_Admin.php';?>