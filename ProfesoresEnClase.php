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
    <title>Profesores</title>
</head>



<body>
    <div class="row">
        <div class="col-sm-12">
            <br>
            
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
                $_SESSION['nombreUsuario'] = $usuario;
                $_SESSION['idUsuario']=$UsuarioId; 
            ?> 
                <div class="form-group row">                        
                        <div class="col-xl-8">
                             
                            <?php include('Clases\mostrarProfesoresEnClase.php');  
                            ?>                           
                            <a href="administracion.php" class="btn btn-lg  btn btn-success">
                                Volver Atras
                            </a>
                        </div>
                        <div class="col-xl-4 animated fadeInLeft">  
                         <h1>Profesores</h1>                         
                                             
                            <?php  
                                include('Clases\formNuevoProfesorClase.php'); 
                            ?>
                             
                       </div>     
                 </div>
            </div>
        </div> 
    </div>
</body>


</html>


<?php 
    include('includes\footer.php');
?>