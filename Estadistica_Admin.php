<?php
    
    require_once "Configuraciones/Funciones.php";
    $Total_Adoptacion = mysqli_query($conexion,"SELECT * FROM mascotas WHERE Adoptado = '1'");
    $Resultado_Adopcion = mysqli_num_rows($Total_Adoptacion);
    $Total_Adoptados = mysqli_query($conexion,"SELECT * FROM mascotas WHERE Adoptado = '2'");
    $Resultado_Adoptados = mysqli_num_rows($Total_Adoptados);
    $Total_Usuarios = mysqli_query($conexion,"SELECT * FROM usuario WHERE ID_Rol = '2'");
    $Resultado_Usuarios = mysqli_num_rows($Total_Usuarios);


    /*$anio='2020';
    $chart_data = '';
    for($i=1; $i<12; $i++){
        $Total_Mensual = mysqli_fetch_array(mysqli_query($conexion,"SELECT COUNT(IF(Adoptado = 1, 1, null)) Adopcion, count(IF(Adoptado = 2, 1, null)) Adoptado FROM mascotas WHERE YEAR(Fecha) = '$anio' AND MONTH(Fecha) = '$i'"));
        $chart_data= "{Mes: '".$anio."'-'".$i."', Adopcion:'".$Total_Mensual["Adopcion"]."', Adoptados:'".$Total_Mensual["Adoptado"]."'}, ";
        $chart_data = substr($chart_data, 0);
    }*/

    
    
    $enero = mysqli_fetch_array(mysqli_query($conexion,"SELECT COUNT(IF(Adoptado = 1, 1, null)) Adopcion, count(IF(Adoptado = 2, 1, null)) Adoptado FROM mascotas WHERE YEAR(Fecha) = 2020 AND MONTH(Fecha) = 1"));
    $chart_data= "{Mes: '2020-01', Adopcion:'".$enero["Adopcion"]."', Adoptados:'".$enero["Adoptado"]."'}, ";
    $chart_data = substr($chart_data, 0);
    $febrero = mysqli_fetch_array(mysqli_query($conexion,"SELECT COUNT(IF(Adoptado = 1, 1, null)) Adopcion, count(IF(Adoptado = 2, 1, null)) Adoptado FROM mascotas WHERE YEAR(Fecha) = 2020 AND MONTH(Fecha) = 2"));
    $chart_data= $chart_data."{Mes: '2020-02', Adopcion:'".$febrero["Adopcion"]."', Adoptados:'".$febrero["Adoptado"]."'}, ";
    $marzo = mysqli_fetch_array(mysqli_query($conexion,"SELECT COUNT(IF(Adoptado = 1, 1, null)) Adopcion, count(IF(Adoptado = 2, 1, null)) Adoptado FROM mascotas WHERE YEAR(Fecha) = 2020 AND MONTH(Fecha) = 3"));
    $chart_data= $chart_data."{Mes: '2020-03', Adopcion:'".$marzo["Adopcion"]."', Adoptados:'".$marzo["Adoptado"]."'}, ";
    $abril = mysqli_fetch_array(mysqli_query($conexion,"SELECT COUNT(IF(Adoptado = 1, 1, null)) Adopcion, count(IF(Adoptado = 2, 1, null)) Adoptado FROM mascotas WHERE YEAR(Fecha) = 2020 AND MONTH(Fecha) = 4"));
    $chart_data= $chart_data."{Mes: '2020-04', Adopcion:'".$abril["Adopcion"]."', Adoptados:'".$abril["Adoptado"]."'}, ";
    $mayo = mysqli_fetch_array(mysqli_query($conexion,"SELECT COUNT(IF(Adoptado = 1, 1, null)) Adopcion, count(IF(Adoptado = 2, 1, null)) Adoptado FROM mascotas WHERE YEAR(Fecha) = 2020 AND MONTH(Fecha) = 5"));
    $chart_data= $chart_data."{Mes: '2020-05', Adopcion:'".$mayo["Adopcion"]."', Adoptados:'".$mayo["Adoptado"]."'}, ";
    $junio = mysqli_fetch_array(mysqli_query($conexion,"SELECT COUNT(IF(Adoptado = 1, 1, null)) Adopcion, count(IF(Adoptado = 2, 1, null)) Adoptado FROM mascotas WHERE YEAR(Fecha) = 2020 AND MONTH(Fecha) = 6"));
    $chart_data= $chart_data."{Mes: '2020-06', Adopcion:'".$junio["Adopcion"]."', Adoptados:'".$junio["Adoptado"]."'}, ";
    $julio = mysqli_fetch_array(mysqli_query($conexion,"SELECT COUNT(IF(Adoptado = 1, 1, null)) Adopcion, count(IF(Adoptado = 2, 1, null)) Adoptado FROM mascotas WHERE YEAR(Fecha) = 2020 AND MONTH(Fecha) = 7"));
    $chart_data= $chart_data."{Mes: '2020-07', Adopcion:'".$julio["Adopcion"]."', Adoptados:'".$julio["Adoptado"]."'}, ";
    $agosto = mysqli_fetch_array(mysqli_query($conexion,"SELECT COUNT(IF(Adoptado = 1, 1, null)) Adopcion, count(IF(Adoptado = 2, 1, null)) Adoptado FROM mascotas WHERE YEAR(Fecha) = 2020 AND MONTH(Fecha) = 8"));
    $chart_data= $chart_data."{Mes: '2020-08', Adopcion:'".$agosto["Adopcion"]."', Adoptados:'".$agosto["Adoptado"]."'}, ";
    $septiembre = mysqli_fetch_array(mysqli_query($conexion,"SELECT COUNT(IF(Adoptado = 1, 1, null)) Adopcion, count(IF(Adoptado = 2, 1, null)) Adoptado FROM mascotas WHERE YEAR(Fecha) = 2020 AND MONTH(Fecha) = 9"));
    $chart_data= $chart_data."{Mes: '2020-09', Adopcion:'".$septiembre["Adopcion"]."', Adoptados:'".$septiembre["Adoptado"]."'}, ";
    $octubre = mysqli_fetch_array(mysqli_query($conexion,"SELECT COUNT(IF(Adoptado = 1, 1, null)) Adopcion, count(IF(Adoptado = 2, 1, null)) Adoptado FROM mascotas WHERE YEAR(Fecha) = 2020 AND MONTH(Fecha) = 10"));
    $chart_data= $chart_data."{Mes: '2020-10', Adopcion:'".$octubre["Adopcion"]."', Adoptados:'".$octubre["Adoptado"]."'}, ";
    $noviembre = mysqli_fetch_array(mysqli_query($conexion,"SELECT COUNT(IF(Adoptado = 1, 1, null)) Adopcion, count(IF(Adoptado = 2, 1, null)) Adoptado FROM mascotas WHERE YEAR(Fecha) = 2020 AND MONTH(Fecha) = 11"));
    $chart_data= $chart_data."{Mes: '2020-11', Adopcion:'".$noviembre["Adopcion"]."', Adoptados:'".$noviembre["Adoptado"]."'}, ";
    $diciembre = mysqli_fetch_array(mysqli_query($conexion,"SELECT COUNT(IF(Adoptado = 1, 1, null)) Adopcion, count(IF(Adoptado = 2, 1, null)) Adoptado FROM mascotas WHERE YEAR(Fecha) = 2020 AND MONTH(Fecha) = 12"));
    $chart_data= $chart_data."{Mes: '2020-12', Adopcion:'".$diciembre["Adopcion"]."', Adoptados:'".$diciembre["Adoptado"]."'} ";

    $chart_data = substr($chart_data, 0);


?>
<?php include_once 'Modulos/Templates/Header_Admin.php';  ?>
<div class="Contenido">
    <div class="Contenido_Cartas_Estadisticos">
        <div class="Carta_Estadisticos_Adopcion">
            <h4>Mascotas en adopción</h4>
            <p>
                <?php
                    echo $Resultado_Adopcion;
                ?>
            </p>
            <h5>Pets' Home</h5>
        </div>
        <div class="Carta_Estadisticos_Adoptados">
            <h4>Mascotas adoptadas</h4>
            <p>
                <?php
                    echo $Resultado_Adoptados;
                ?>
            </p>
            <h5>Pets' Home</h5>
        </div>
        <div class="Carta_Estadisticos_Usuarios">
            <h4>Usuarios registrados</h4>
            <p>
                <?php
                    echo $Resultado_Usuarios ;
                ?>
            </p>
            <h5>Pets' Home</h5>
        </div>
    </div>

    <section class = "Fecha_Grafica_Estadistica">
        <div class="Fecha_Estadistico_Administrador">
            <form class="Formulario_Fecha_Estadistico" action="" method="post">
            <label for="Fecha_Estadistico"></label>
            <input type="text" name="Fecha_Estadistico" id="Fecha_Estadistico" placeholder="Digite la fecha">
            <button class="Btn_save" type="submit"><i class="fas fa-chart-line"></i> Buscar</button>
            </form>
        </div>
    </section>

    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>

    <br /><br />
    <div class="Contenedor_Grafica" style="width: 1000px;">
        <h2 >Total de adopciones y adoptados en el año</h2>
        <br /><br />
        <div id="chart"></div>
    </div>

    <!--
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <script src="Sistema/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
    -->
</div>
<?php include_once 'Modulos/Templates/Footer_Admin.php';?>
<script>
   Morris.Line({
        element : 'chart',
        data:[<?php echo $chart_data; ?>],
        xkey:'Mes',
        ykeys:['Adopcion', 'Adoptados'],
        labels:['Adopción', 'Adoptados'],
        xLabelAngle: 60
   }); 
</script>