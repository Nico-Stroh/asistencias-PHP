<?php
function edad($fecha) { //calcular edad
  $tiempo = strtotime($fecha); 
  $ahora = time(); 
  $edad = ($ahora-$tiempo)/(60*60*24*365.25); 
  $edad = floor($edad); 
  return $edad; 
} 
 ?>