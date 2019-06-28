<?php

include('includes\session.php');
include("db.php");


//Los datos para llenar los campos *******************************
if  (isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "SELECT * FROM profesores WHERE id=$id";
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);
    $nombre = $row['nombreP'];
    $apellido = $row['apellido'];
    $fecha = $row['fechaNac'];
    $direccion =$row['direccion'];
    $telefono= $row['telefono'];          
  }
}


//Los datos para guardar la base de datos ***************************

if (isset($_POST['editar'])) {
  $id = $_GET['id'];

  $nombre= $_POST['nombre'];
  $apellido = $_POST['apellido'];
  $fecha=$_POST['fecha'];
  $direccion=$_POST['direccion'];
  $telefono=$_POST['telefono'];
    
/*********************** actualizo en la base de datos ************************************************** */
     $query = "UPDATE profesores SET nombreP = '$nombre', apellido = '$apellido', fechaNac= '$fecha' , direccion ='$direccion' , telefono = $telefono WHERE id=$id" ;
     
     if(mysqli_query($conn, $query)) {
          $_SESSION['message']  = 'Se actualizo con éxito';
          $_SESSION['message_type'] = 'warning';
         header('Location: Profesores.php');
    } else{
          $_SESSION['message']  = 'No se actualizo';
          $_SESSION['message_type'] = 'danger';
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
        <a href="Profesores.php" class="btn btn-lg btn-block btn btn-success animated fadeInDown">
                        Volver
                    </a>
            <div class="card card-body animated fadeInDown">
                
                <h2>Editar Profesor</h2><br>
                <form action="editarProfesor.php?id=<?php echo $_GET['id']; ?>" method="POST"
                    enctype="multipart/form-data">

                    <div class="form-group row">
                        <div class="col-sm-3">
                            <h4>Nombre</h4>
                        </div>
                        <div class="col-sm-9">
                            <input name="nombre" type="text" class="form-control" value="<?php echo $nombre; ?>">
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-3">
                            <h4>apellido</h4>
                        </div>
                        <div class="col-sm-9">
                            <input name="apellido" type="text" class="form-control" value="<?php echo $apellido; ?>">
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-3">
                            <h4>Fecha de Nacimiento</h4>
                        </div>
                        <div class="col-sm-9">
                            <?php $fechaActual = date("Y-m-d");?>
                            <input type="date" name="fecha" class="form-control" min="1900-01-1"
                                max="<?php echo $fechaActual?>" step="1" value="<?php echo $fecha; ?>">
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-3">
                            <h4>Direccion</h4>
                        </div>
                        <div class="col-sm-9">
                            <input name="direccion" type="text" class="form-control" value="<?php echo $direccion; ?>">
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-3">
                            <h4>Telefono</h4>
                        </div>
                        <div class="col-sm-9">
                            <input name="telefono" type="number" class="form-control" value="<?php echo $telefono; ?>"
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