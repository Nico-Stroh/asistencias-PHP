<table class="table table-bordered">
    <thead>
        <tr>
            <th>Accion</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Nacimiento</th>
            <th>Direccion</th>
            <!--<th>Telefono</th>-->
            
        </tr>
    </thead>
    <tbody>

    <?php
//************* Paginacion de la tabla **********************/
        $artXPagina=7;   
                 
        if (!isset($_GET['pagina'])){
            $_GET['pagina']=0;
        }
        $consulta="SELECT count(*) as cantidad FROM alumnos";

        $total= mysqli_query($conn, $consulta); 
        $fila = mysqli_fetch_assoc($total); 
        $paginas=0;
        $paginas=($fila['cantidad']/$artXPagina);
        $iniciar=($_GET['pagina'])*$artXPagina;
        $query = "SELECT * FROM alumnos ";
        $query=$query."LIMIT $iniciar,$artXPagina";
        $resultado = mysqli_query($conn, $query);
//************************************************************/

        while($row = mysqli_fetch_assoc($resultado)){?>
            <tr>
                <td>
                <a href="editarAlumno.php?id=<?php echo $row['id']?>" class="btn btn-secondary">
                    <i class="fas fa-marker"></i>
                </a>
                <a href="Alumnos\eliminarAlumno.php?id=<?php echo $row['id']?>" class="btn btn-danger">
                    <i class="far fa-trash-alt"></i>
                </a>
                <td><?php echo $row['nombre']?></td>
                <td><?php echo $row['apellido']?></td>
                <td><?php echo $row['fechaNacimiento']?></td>
                <td><?php echo $row['direccion']?></td>
                <!--<td><?php echo $row['telefono']?></td> -->
                
            </td>
            </tr>
          <?php } ?>


    </tbody>
</table>

<div arial-label="Paginacion de Tabla">
<ul class="pagination">
  <li class="page-item
    <?php echo $_GET['pagina']<1 ? 'disabled':'' ?>">
        <a class="page-link "  href="Alumnos.php?pagina=<?php echo $_GET['pagina']-1?>"> <span aria-hidden="true">&laquo;</span>
    </a>
      </li>
        <?php for($i=0;$i<=$paginas;$i++):?>
            <li class="page-item <?php echo $_GET['pagina']==$i ? 'active': ''?>">
                <a class="page-link" href="Alumnos.php?pagina=<?php echo $i ?>">
                    <?php echo $i+1 ?>
                </a>
                </li>
                  <?php endfor ?>
                  <li class="page-item
                    <?php echo $_GET['pagina']>$paginas-1 ? 'disabled':'' ?>">
                    <a class="page-link" href="Alumnos.php?pagina=<?php echo $_GET['pagina']+1 ?>"> <span aria-hidden="true">&raquo;</span></a>
                </li>
            </ul>
        </div>
