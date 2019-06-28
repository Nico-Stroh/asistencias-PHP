<?php
include('..\db.php');
include('..\includes\session.php');

if(isset($_GET['id'])) {
  $id = $_GET['id'];
 
  //elimino en la tabla
  $query = "DELETE FROM profesores WHERE id = $id";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Query Failed.");
  }
  
  $_SESSION['message'] = 'Se elimino con éxito';
  $_SESSION['message_type'] = 'danger';
  header('Location: ..\profesores.php');
}

?>