<?php

include('..\db.php');
include('..\includes\session.php');

if (isset($_POST['guardar'])) {
  $Profesor = $_POST['profesor'];
  $Clase=$_POST['clase']; 
  $fecha = date("Y-m-d");

  echo "$Profesor";
  echo "$Clase";
 
$Usuario=0;

         
   
   //Guardo en la Base de datos 


   $insert = $conn->prepare("INSERT INTO profesoresEnClase (anio, idProfesor, idClase) VALUES (?, ?, ?)");
   $insert->bind_param("sii", $fecha, $Profesor, $Clase);

    $insert->execute();
    $resultado = $insert->get_result();



    $_SESSION['message'] = 'Se guardo con éxito';
    $_SESSION['message_type'] = 'success';
  


   header('Location: ..\ProfesoresEnClase.php');

  }
?>