<?php

include('..\db.php');
include('..\includes\session.php');

if (isset($_POST['guardar'])) {
  $nombre = $_POST['nombre']; 
  $apellido = $_POST['apellido'];
  $fechaActual = date("Y-m-d");
  if($_POST['fecha']<>""){
      $fecha=$_POST['fecha'];
  }else{
      $fecha=$fechaActual;
  }
  $direccion = $_POST['direccion'];
  $telefono = $_POST['telefono'];


$Usuario=0;
$Usuario = $_SESSION['idUsuario']; 
   
   //Guardo en la Base de datos si el Titulo y el cliente no estan vacios

   $query = "SELECT count(*)as cantidad FROM alumnos where nombre='$nombre' and apellido='$apellido'";
        $resultado = mysqli_query($conn, $query);  
        $consulta = mysqli_fetch_assoc($resultado);
        $cant=$consulta['cantidad'];

   if($nombre<>"" && $apellido<>"" && $cant==0){

   $insert = $conn->prepare("INSERT INTO alumnos (nombre, apellido, fechaNacimiento, direccion, telefono) VALUES (?, ?, ?, ?, ?)");
   $insert->bind_param("ssssi", $nombre, $apellido, $fecha, $direccion, $telefono);

    $insert->execute();
    $resultado = $insert->get_result();

    $_SESSION['message'] = 'Se guardo con éxito'.$mensajeError;
    $_SESSION['message_type'] = 'success';
  
  }else{
    $_SESSION['message'] = 'El campo Titulo o Cliente esta vacio, o ya esta registrado por lo tanto no se han guardado los datos';
    $_SESSION['message_type'] = 'danger';
  }
   header('Location: ..\Alumnos.php');

  }
?>