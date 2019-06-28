<?php
   include('includes\session.php');
   include('db.php');  
?>

<html>

<head>
    <?php  
            // Se incluye el encabezado con la barra de consulta 
             include('includes\header.php');  

            //Me guardo en variables el usuario y el ID de la session
             $usuario= $_SESSION['nombreUsuario'];
             $UsuarioId= $_SESSION['idUsuario'];
      ?>
    <title>Administracion</title>
</head>



<body>
    <div class="row">
        <div class="col-lg-12">
            <br>

            <?php $fechaActual = date("Y-m-d");?>
            <div class="form-group row">
                <div class="col-lg-4 animated bounceInLeft">
                    <h1 style="height: 20px;"><?php echo $_SESSION['nombreUsuario']; ?></h1>
                    <div class="btn btn-lg btn-block btn btn-success shadow-lg  rounded rounded" style="height: 200px; width: 80%; margin:50px;">
                        <h1>Total de Asistencias: </h1>
                        <?php 
                            $query = "SELECT count(*)as cantidad FROM asistencias WHERE presente='si' and fecha='$fechaActual'"; 
                            $resultado = mysqli_query($conn, $query);  
                            $row = mysqli_fetch_assoc($resultado);
                            $cant=$row['cantidad'];
                            echo "<h1>$cant</h1>";
                        ?>
                         
                    </div>
                    <div class="btn btn-lg btn-block btn btn-warning shadow-lg  rounded rounded" style=" height: 200px; width: 80%; margin:50px;">
                        <h1>Faltan entregar</h1>
                        <?php 

                            $query = "SELECT count(*)as cant FROM clases"; 
                            $resultado = mysqli_query($conn, $query);  
                            $row = mysqli_fetch_assoc($resultado);
                            $clasesMax=$row['cant']-1;

                            $query = "SELECT idClase FROM asistencias WHERE fecha='$fechaActual' GROUP BY idClase"; 
                            $resultado = mysqli_query($conn, $query);  
                            $cant=0;
                            while($row = mysqli_fetch_assoc($resultado)){
                            $cant++;
                            };
                            $cant=$clasesMax-$cant;
                            echo "<h1>".$cant."</h1> <h2> Clases mas</h2>";

                        ?>
                         
                    </div> 
                </div>

                <div class="col-lg-4 animated bounceInLeft">
                    <h1 style="height: 20px;">Fecha: <?php echo $fechaActual?></h1>
                <div class="btn btn-lg btn-block btn btn-warning shadow-lg  rounded rounded" style="height: 200px; width:80%; margin:50px;">
                        <h1>Chicos que concurrieron</h1>
                        <?php
                        $query = "SELECT count(*)as cantidad FROM alumnos"; 
                            $resultado = mysqli_query($conn, $query);  
                            $row = mysqli_fetch_assoc($resultado);
                            $Total=$row['cantidad'];


                            $query = "SELECT count(*)as cantidad FROM asistencias WHERE presente='Si' and fecha='$fechaActual'"; 
                            $resultado = mysqli_query($conn, $query);  
                            $row = mysqli_fetch_assoc($resultado);
                            $presentes=$row['cantidad'];

                            $porcentaje=$presentes/$Total;
                            $porcentaje=$porcentaje*100;
                            $porcentaje=(int)$porcentaje;

                            echo "<h1>".$porcentaje."% </h1>";
                        ?>
                    </div>
                    <div class="btn btn-lg btn-block btn btn-danger shadow-lg  rounded rounded"style=" height: 200px; width: 80%; margin:50px;">
                        <h1>Chicos que faltaron</h1>
                        <?php 

                            $faltaron=$Total-$presentes;
                            $porcentaje=$faltaron/$Total;
                            $porcentaje=$porcentaje*100;
                            $porcentaje=(int)$porcentaje;

                            echo "<h1>".$porcentaje."% </h1>";
                        ?> 
                    </div>
                </div>


                <div class="col-lg-4 animated slideInDown">            
                     <?php
                         $query = "SELECT idClase FROM asistencias WHERE fecha='$fechaActual' GROUP BY idClase"; 
                         $entrega = mysqli_query($conn, $query); 
                            echo "<br><h1>Clases que ya entregaron</h1>";
                            $texto="";
                            while($row = mysqli_fetch_assoc($entrega)){
                                     $texto=$texto."Clase ".$row['idClase']." - "; 
                                }
                                echo "<h2 Style='color:azure;'>".$texto."</h2>";
                    ?>
                    <a href="alumnos.php" class=" shadow-lg p-3 mb-1 rounded btn btn-lg btn-block btn btn-success">
                        Alumno Nuevo, Modificar y Eliminar
                    </a>
                    <a href="profesores.php" class="btn btn-lg btn-block btn btn-success shadow-lg p-3 mb-1 rounded">
                        Profesor Nuevo, Modificar y Eliminar
                    </a>
                    <a href="clases.php" class="btn btn-lg btn-block btn btn-success shadow-lg p-3 mb-1 rounded">
                        Clasesitas Nuevo, Modificar y Eliminar
                    </a>
                    <a href="ProfesoresEnClase.php" class="btn btn-lg btn-block btn btn-success shadow-lg p-3 mb-1 rounded">
                        Asignar Profesores a cada clase
                    </a>
                    <a href="index.php" class="btn btn-lg btn-block btn btn-success shadow-lg p-3 mb-1 rounded">
                        Cargar asistencia de algun alumno
                    </a>
                    <a href="administracion.php" class="btn btn-lg btn-block btn btn-success shadow-lg p-3 mb-1 rounded">
                        Actualizar los Datos 
                    </a>
                    <?php
                    $query = "SELECT count(*)as cant FROM alumnos"; 
                         $resultado = mysqli_query($conn, $query);  
                         $row = mysqli_fetch_assoc($resultado);
                         echo "<br><h1>Total de Alumnos: ".$row['cant']."</h1>"

                    ?>      
                </div>

            </div>


            <?php 
            // Muestro Los mensajes guardados en la session
            if (isset($_SESSION['message'])) { ?>
            <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert">
                <h5><?= $_SESSION['message']?></h5>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- Elimino los datos de la session -->
            <?php session_unset(); } ?>


            <?php  
                // Vuelvo a cargar los datos de usuario y contraseña a la session
                $_SESSION['nombreUsuario'] = $usuario;
                $_SESSION['idUsuario']=$UsuarioId;
            ?>

        </div>
    </div>
</body>

</html>


<?php 

    include('includes\footer.php');
?>