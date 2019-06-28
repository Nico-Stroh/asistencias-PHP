<?php
include('..\db.php');
include('..\includes\session.php');

if(isset($_GET['id'])) {
  $id = $_GET['id'];
 
  //elimino en la tabla
  $query = "DELETE FROM alumnos WHERE id = $id";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    $_SESSION['message'] = 'No se elimino';
    $_SESSION['message_type'] = 'danger';
    header('Location: ..\alumnos.php');
    die("Query Failed.");
  }else{
  $_SESSION['message'] = 'Se elimino con éxito';
  $_SESSION['message_type'] = 'danger';
  header('Location: ..\alumnos.php');
  }
  

}

?>