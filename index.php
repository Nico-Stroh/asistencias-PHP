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
    <title>asistencias</title>
</head>



<body>
    <div class="row">
        <div class="col-sm-12">
            <br>


            <div class="form-group row">
                <div class="col-lg-6 animated bounceInLeft">
                    <h1>Bienvenido <?php echo $_SESSION['nombreUsuario']; ?></h1>
                </div>

                <div class="col-lg-1 animated slideInDown">
                    <h1>Fecha</h1>
                </div>

                <div class="col-lg-2 animated slideInDown">
                    <?php $fechaActual = date("Y-m-d");?>
                    <h1><?php echo $fechaActual?></h1>
                </div>
                <div class="col-lg-3 animated slideInDown">
                    <a href="alumnos.php" class="btn btn-lg  btn btn-success">
                        Alumno Nuevo, Modificar y Eliminar
                    </a>
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
                  //Boton Nuevo Trabajo que se encuentra a la izquierda que contiene el formulario    
                

            ?>

            <div class="col-lg-12 " >
                <br>
                <?php  
                  
                 // include('includes\progresbar.php');
                  include('includes\MostrarDatos.php');   
          
                if ($usuario=="Administracion"){ ?>
                    <a href="administracion.php" class="btn btn-lg  btn btn-success">
                        Atras
                    </a>
            <?php  } ?>
       


            </div>
        </div>
    </div>
</body>



</html>



<?php 
    include('includes\footer.php');
?>