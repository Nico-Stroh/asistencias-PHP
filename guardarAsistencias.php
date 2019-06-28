<?php

include('db.php');
include('includes\session.php');

    
$fechaActual = date("Y-m-d");
    
$Usuario=0;
$Usuario = $_SESSION['idUsuario']; 
$NombreUsuario= $_SESSION['nombreUsuario'];        
$modificar="No";

if (isset($_POST['guardar'])) {
  $cantidad= $_POST['cantidad'];
  $modificar=$_POST['modificar'];
  echo $modificar;


 for ($i=1; $i <= $cantidad; $i++){ 
    $presente[$i]="";
      if (isset($_POST['asistencia'.$i])){
        $presente[$i]="Si";
      }else{
        $presente[$i]="No";
      } 
    $presente[$i];
    $nombre[$i] = $_POST['nombre'.$i]; 
    $apellido[$i] = $_POST['apellido'.$i];
    echo "<br>";
  }

  $fechaActual = date("Y-m-d");

/******** Recorro toda la tabla y guardo los valores en array para guardarlos en la tabla *************/
if($cantidad==0){
  $_SESSION['message']  = 'Ya se han guardado todos los datos de hoy en la tabla.';
  $_SESSION['message_type'] = 'success';
}else{

for ($i=1; $i <= $cantidad; $i++) { 
       $query = "SELECT * FROM alumnos WHERE nombre='$nombre[$i]' and apellido='$apellido[$i]'"; 
        $resultado = mysqli_query($conn, $query);  
        $row = mysqli_fetch_assoc($resultado);
        $idAlumno=$row['id'];
if ($modificar==="No"){
     $insert = $conn->prepare("INSERT INTO asistencias (fecha, idAlumnos, idClase, presente) VALUES (?, ?, ?, ?)");
     $insert->bind_param("siis", $fechaActual, $idAlumno, $Usuario, $presente[$i]);

      $insert->execute();
      $resultado = $insert->get_result();
  }else{

     $query = "UPDATE asistencias SET presente='$presente[$i]' WHERE idAlumnos='$idAlumno' and fecha='$fechaActual'";
 
      if(mysqli_query($conn, $query)) {
            $_SESSION['message']  = 'Se actualizo con éxito.';
            $_SESSION['message_type'] = 'warning';
      }
    }
  
}
}
/********* Consulta Para saber la cantidad que asistieron ******************/
    $query = "SELECT COUNT(*)as cant FROM asistencias WHERE fecha='$fechaActual' and idClase='$Usuario' and presente='Si'"; 
    $resultado = mysqli_query($conn, $query);  
    $row = mysqli_fetch_assoc($resultado);
    $cantidadPresentes=$row['cant'];

/***************** Sacar Porcentaje  ***********/
$consulta = "SELECT COUNT(*)as cant FROM asistencias WHERE fecha='$fechaActual' and idClase='$Usuario'"; 
$respuesta = mysqli_query($conn, $consulta);  
$lugar = mysqli_fetch_assoc($respuesta);
$total=$lugar['cant'];

$porcentaje= $cantidadPresentes/$total;
$porcentaje=$porcentaje*100;

    
if($modificar=="No" && $cantidad<>0){
   $_SESSION['message'] = 'Se guardo con éxito. La cantidad de alumnos que concurrieron hoy es de: '.$cantidadPresentes.' chicos'. ' un '.$porcentaje.'% de asistencias';
   $_SESSION['message_type'] = 'success';
}else{
      $_SESSION['message']= $_SESSION['message'].' La cantidad de alumnos que concurrieron hoy es de: '.$cantidadPresentes.' chicos'. ' un '.$porcentaje.'% de asistencias';
  }



 header('Location: index.php');
 }
?>