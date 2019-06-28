<?php
include("calcularEdad.php");
?>

<form action="guardarAsistencias.php" method="post">
<table class="table table-bordered animated slideinDown" id="Tabla">


    <thead>
        <tr>
            <th>P</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Edad</th>
        </tr>
    </thead>
    <tbody>

        <?php

        $idClase=$_SESSION['idUsuario'];
        $query = "SELECT * FROM clases where id=$idClase";
        $resultado = mysqli_query($conn, $query);  
        $consulta = mysqli_fetch_assoc($resultado);
        $max=$consulta['edadMax'];
        $min=$consulta['edadMin'];
        $fechaActual = date("Y-m-d");
        $Modificar="No";

        $query = "SELECT * FROM alumnos";
     
        $resultado = mysqli_query($conn, $query);  
  
       $cant=0;
        while($row = mysqli_fetch_assoc($resultado)){
            $edad=edad($row['fechaNacimiento']);

            $idAlumno=$row['id'];

            $consulta = "SELECT * FROM asistencias WHERE idAlumnos='$idAlumno' and fecha='$fechaActual'";
            $respuesta = mysqli_query($conn, $consulta); 
            $asistencia = mysqli_fetch_assoc($respuesta);
            $presente=$asistencia['presente'];

         
            if($edad>=$min && $edad<=$max){
           if(is_null($presente) || $presente=="No"){
                        if($presente=='No'){
                            $Modificar="Si";
                        }
                        $cant++;
                        ?>
                        <input type="hidden" name="cantidad" value="<?php echo $cant ?>">
                <tr>
                    <td> <input type="checkbox" name="asistencia<?php echo $cant ?>"></td>
                    <input type="hidden" name="nombre<?php echo $cant ?>" value="<?php echo $row['nombre']?>">
                    <td><?php echo $row['nombre']?></td>
                    <input type="hidden" name="apellido<?php echo $cant ?>" value="<?php echo $row['apellido']?>">
                    <td><?php echo $row['apellido']?></td>
                    <td><?php echo $edad?></td>
                </tr>

        <?php }}} ?>


    </tbody>
</table>
<label><h1>Total: <?php echo $cant ?> Chicos</h1></label><br>
<input type="hidden" name="modificar" value="<?php echo $Modificar ?>">
<input type="submit" name="guardar" class="btn btn-lg  btn btn-success" value="Guardar Asistencias">
<a href="logout.php" class="btn btn-lg  btn btn-success">
    Salir
</a>
</form>

