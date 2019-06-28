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

   if($nombre<>"" && $apellido<>""){


   $insert = $conn->prepare("INSERT INTO profesores (nombreP, apellido, fechaNac, telefono, direccion) VALUES (?, ?, ?, ?, ?)");
   $insert->bind_param("sssis", $nombre, $apellido, $fecha, $telefono, $direccion);

    $insert->execute();
    $resultado = $insert->get_result();



    $_SESSION['message'] = 'Se guardo con éxito'.$mensajeError;
    $_SESSION['message_type'] = 'success';
  
  }else{
    $_SESSION['message'] = 'El campo Titulo o Cliente esta vacio, no se han guardado los datos';
    $_SESSION['message_type'] = 'danger';
  }
   header('Location: ..\Profesores.php');

  }
?>