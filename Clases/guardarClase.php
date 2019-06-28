<?php

include('..\db.php');
include('..\includes\session.php');

if (isset($_POST['guardar'])) {
  $nombre = $_POST['nombre']; 
  $Contraseña1 = $_POST['contraseña1'];
  $Contraseña2 = $_POST['contraseña2'];

  $contraseña="No";
if($contraseña1==$contraseña2){
    $contraseña="Si";
}
  $edadMinima = $_POST['minimo'];
  $EdadMaxima = $_POST['maximo'];
  $fechaActual = date("Y-m-d");
  


$Usuario=0;
$Usuario = $_SESSION['idUsuario']; 
         
   
   //Guardo en la Base de datos si el Titulo y el cliente no estan vacios

   if($nombre<>"" && $Contraseña=="Si"){


   $insert = $conn->prepare("INSERT INTO profesores (nombre, key, edadMin, edadMax) VALUES (?, ?, ?, ?)");
   $insert->bind_param("ssii", $nombre, $contraseña1, $edadMinima, $EdadMaxima);

    $insert->execute();
    $resultado = $insert->get_result();



    $_SESSION['message'] = 'Se guardo con éxito';
    $_SESSION['message_type'] = 'success';
  
  }else{
    $_SESSION['message'] = 'El campo Titulo esta vacio o la contraseña no coincide';
    $_SESSION['message_type'] = 'danger';
  }
   header('Location: ..\Clases.php');

  }
?>