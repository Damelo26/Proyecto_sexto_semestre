<?php
    require_once "Configuraciones/Funciones.php";
    $Total_Adoptacion = mysqli_query($conexion,"SELECT * FROM mascotas WHERE Adoptado = '1'");
    $Resultado_Adopcion = mysqli_num_rows($Total_Adoptacion);
    $Total_Adoptados = mysqli_query($conexion,"SELECT * FROM mascotas WHERE Adoptado = '2'");
    $Resultado_Adoptados = mysqli_num_rows($Total_Adoptados);
    $Total_Usuarios = mysqli_query($conexion,"SELECT * FROM usuario WHERE ID_Rol = '2'");
    $Resultado_Usuarios = mysqli_num_rows($Total_Usuarios);
    /*
    
    $queryBusqueda = mysqli_query($conexion,"SELECT * FROM usuario");
                            $Cantidad_Usuarios = mysqli_num_rows($queryBusqueda);
                            echo $Cantidad_Usuarios;

    if(!isset($_SESSION['ID_Rol'])){
        header('location: ../Login.php');
    }else{
        if($_SESSION['ID_Rol'] != 1){
            header('location: ../Principal.php');
        }
    }*/
    
        /*$query_Adoptados = mysqli_query($conexion,"SELECT COUNT(*) Total FROM mascotas where Adoptado='1'");
        $Total_Adoptados=mysqli_fetch_assoc($query_Adoptados);
        echo $query_Adoptados["Total"];*/
    
?>
<?php include_once 'Modulos/Templates/Header_Admin.php';  ?>
<div class="Contenido">
    <div class="Contenido_Cartas_Estadisticos">
        <div class="Carta_Estadisticos">
            <h4>Mascotas en adopción</h4>
            <p>jfjfj</p>
        </div>
        <div class="Carta_Estadisticos">
            <h4>Mascotas adoptadas</h4>
            <p>jfjfj</p>
        </div>
        <div class="Carta_Estadisticos">
            <h4>Usuarios registrados</h4>
            <p>jfjfj</p>
        </div>
    </div>
    
    
    
    
    
    
    <!--<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <script src="Sistema/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
    <div class="row">
        <div class="col-md-4">
            <div class="bg-success text-white text-center m-1">
                <div class="card-header">En adopción</div>
                <div class="card-body">
                    <h1 class="card-title">
                        <span class="id_Adopcion_Estadisticos">
                            <?php
                                //echo $Resultado_Adopcion;
                            ?>
                        </span>
                    </h1>
                    <p class="card-text">Pets' Home</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="bg-primary text-white text-center m-1">
                <div class="card-header">Adoptados</div>
                <div class="card-body">
                    <h1 class="card-title">
                        <span class="id_Adopcion_Estadisticos">
                            <?php
                                //echo $Resultado_Adoptados;
                            ?>
                        </span>
                    </h1>
                    <p class="card-text">Pets' Home</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="bg-warning text-white text-center m-1">
                <div class="card-header">Usuarios registrados</div>
                <div class="card-body">
                    <h1 class="card-title">
                        <span class="id_Adopcion_Estadisticos">
                            <?php
                                //echo $Resultado_Usuarios ;
                            ?>
                        </span>
                    </h1>
                    <p class="card-text">Pets' Home</p>
                </div>
            </div>
        </div>
    </div>
    <div class="row my-3">
        <div class="col-md-12 text-center">
            <h2>Reporte de mascotas en adopción</h2>
            <canvas id="myChart" class="grafica"></canvas>
        </div>
    </div>
















    <div class="Item_Contenido">
        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Inventore delectus dolore libero repellat est ipsam quibusdam voluptates hic, non, optio sit aut possimus commodi ipsum ratione voluptatibus aliquam officiis aperiam?               
    </div>
    <div class="Item_Contenido">
        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Inventore delectus dolore libero repellat est ipsam quibusdam voluptates hic, non, optio sit aut possimus commodi ipsum ratione voluptatibus aliquam officiis aperiam?
    </div>
    <div class="Item_Contenido">
        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Inventore delectus dolore libero repellat est ipsam quibusdam voluptates hic, non, optio sit aut possimus commodi ipsum ratione voluptatibus aliquam officiis aperiam?
    </div>
    <div class="Item_Contenido">
        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Inventore delectus dolore libero repellat est ipsam quibusdam voluptates hic, non, optio sit aut possimus commodi ipsum ratione voluptatibus aliquam officiis aperiam?
    </div>-->
</div>
<?php include_once 'Modulos/Templates/Footer_Admin.php';?>