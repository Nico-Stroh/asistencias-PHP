<table class="table table-bordered animated slideinDown">
    <thead>
        <tr>
            <th>Clase</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Nacimiento</th>
            <th>Direccion</th>
            <th>Telefono</th>
            <th>Accion</th>
        </tr>
    </thead>
    <tbody>

    <?php
        
       
 //************* Paginacion de la tabla **********************/
 $artXPagina=5;   
                 
 if (!isset($_GET['pagina'])){
     $_GET['pagina']=0;
 }
 $consulta = "SELECT count(*) as cantidad FROM profesores p 
        join profesoresEnClase pc on p.id=pc.idProfesor 
        join clases c on c.id=pc.idClase";

 $total= mysqli_query($conn, $consulta); 
 $fila = mysqli_fetch_assoc($total); 
 $paginas=0;
 $paginas=($fila['cantidad']/$artXPagina);
 $iniciar=($_GET['pagina'])*$artXPagina;
  $query = "SELECT * FROM profesores p 
        join profesoresEnClase pc on p.id=pc.idProfesor 
        join clases c on c.id=pc.idClase
        LIMIT $iniciar,$artXPagina";
 $resultado = mysqli_query($conn, $query);
//************************************************************/

        while($row = mysqli_fetch_assoc($resultado)){?>
            <tr>
                <td><?php echo $row['nombre']?></td>
                <td><?php echo $row['nombreP']?></td>
                <td><?php echo $row['apellido']?></td>
                <td><?php echo $row['fechaNac']?></td>
                <td><?php echo $row['direccion']?></td>
                <td><?php echo $row['telefono']?></td>
            <td>
                <a href="editarProfesorEnClase.php?id=<?php echo $row['idPC']?>" class="btn btn-secondary">
                    <i class="fas fa-marker"></i>
                </a>
                <a href="Clases\eliminarProfesorEnClase.php?id=<?php echo $row['idPC']?>" class="btn btn-danger">
                    <i class="far fa-trash-alt"></i>
                </a>
            </td>
            </tr>
          <?php } ?>


    </tbody>
</table>

<div arial-label="Paginacion de Tabla">
<ul class="pagination">
  <li class="page-item
    <?php echo $_GET['pagina']<1 ? 'disabled':'' ?>">
        <a class="page-link "  href="ProfesoresEnClase.php?pagina=<?php echo $_GET['pagina']-1?>"> <span aria-hidden="true">&laquo;</span>
    </a>
      </li>
        <?php for($i=0;$i<=$paginas;$i++):?>
            <li class="page-item <?php echo $_GET['pagina']==$i ? 'active': ''?>">
                <a class="page-link" href="ProfesoresEnClase.php?pagina=<?php echo $i ?>">
                    <?php echo $i+1 ?>
                </a>
                </li>
                  <?php endfor ?>
                  <li class="page-item
                    <?php echo $_GET['pagina']>$paginas-1 ? 'disabled':'' ?>">
                    <a class="page-link" href="ProfesoresEnClase.php?pagina=<?php echo $_GET['pagina']+1 ?>"> <span aria-hidden="true">&raquo;</span></a>
                </li>
            </ul>
        </div>