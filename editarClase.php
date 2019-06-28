<?php

include('includes\session.php');
include("db.php");


//Los datos para llenar los campos *******************************
if  (isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "SELECT * FROM clases WHERE id=$id";
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);
    $nombre = $row['nombre'];
    $min = $row['edadMin'];
    $max =$row['edadMax'];
            
  }
}


//Los datos para guardar la base de datos ***************************

if (isset($_POST['editar'])) {
  $id = $_GET['id'];

  $nombre = $_POST['nombre']; 
  $Contraseña1 = $_POST['contraseña1'];
  $Contraseña2 = $_POST['contraseña2'];

  $contraseña="No";
if($contraseña1==$contraseña2){
    $contraseña="Si";
}
  $edadMinima = $_POST['minimo'];
  $EdadMaxima = $_POST['maximo'];
    
/*********************** actualizo en la base de datos ************************************************** */
if($contraseña=="Si"){
    $query = "UPDATE clases SET nombre = '$nombre', key = '$contraseña1', edadMin= '$edadMinima' , edadMax ='$edadMaxima'  WHERE id=$id" ;
     
     if(mysqli_query($conn, $query)) {
          $_SESSION['message']  = 'Se actualizo con éxito';
          $_SESSION['message_type'] = 'warning';
         header('Location: Profesores.php');
    } else{
          $_SESSION['message']  = 'No se actualizo';
          $_SESSION['message_type'] = 'danger';
          header('Location: Profesores.php');
    }
}else{
    $_SESSION['message']  = 'Escriba bien su contraseña';
    $_SESSION['message_type'] = 'warning';
   header('Location: Profesores.php');
} 

  }
/****************************** Formulario **************************************** */
?>
<?php include('includes/header.php'); ?>
<br>
<div class="container">
    <div class="row">
        <div class="col-md-3 ">

        </div>

        <div class="col-md-10 mx-auto">
        <a href="clases.php" class="btn btn-lg btn-block btn btn-success animated fadeInDown">
                        Volver
                    </a>
            <div class="card card-body animated fadeInDown">
                
                <h2>Editar Clase</h2><br>
                <form action="editarClase.php?id=<?php echo $_GET['id']; ?>" method="POST"
                    enctype="multipart/form-data">

                    <div class="form-group row">
                        <div class="col-sm-3">
                            <h4>Nombre de la Clase</h4>
                        </div>
                        <div class="col-sm-9">
                            <input name="nombre" type="text" class="form-control" value="<?php echo $nombre; ?>">
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-3">
                            <h4>Contraseña</h4>
                        </div>
                        <div class="col-sm-9">
                            <input name="contraseña1" type="password" class="form-control" value="">
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-3">
                            <h4>Repetir Contraseña</h4>
                        </div>
                        <div class="col-sm-9">
                            <input name="contraseña2" type="password" class="form-control" value="">
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-3">
                            <h4>Edad Minima</h4>
                        </div>
                        <div class="col-sm-9">
                            <input name="min" type="number" class="form-control" value="<?php echo $min; ?>">
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-3">
                            <h4>Edad Maxima</h4>
                        </div>
                        <div class="col-sm-9">
                            <input name="max" type="number" class="form-control" value="<?php echo $max; ?>"
                                min="1">
                        </div>
                    </div>
            </div>
            
            <button class="btn btn-lg  btn-block btn btn-success animated fadeInDown" name="editar">Actualizar</button>            

            </form>
        </div>

    </div>

</div>
<?php include('includes\footer.php'); ?>
</div>