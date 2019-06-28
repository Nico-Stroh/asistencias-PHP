<table class="table table-bordered animated slideinDown">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Edad minima</th>
            <th>Edad Maxima</th>
            <th>Accion</th>
        </tr>
    </thead>
    <tbody>

    <?php
        
        $query = "SELECT * FROM clases";
        
        $resultado = mysqli_query($conn, $query);  

  
        while($row = mysqli_fetch_assoc($resultado)){?>
            <tr>
                <td><?php echo $row['nombre']?></td>
                <td><?php echo $row['edadMin']?></td>
                <td><?php echo $row['edadMax']?></td>
            <td>
                <a href="editarClase.php?id=<?php echo $row['id']?>" class="btn btn-secondary">
                    <i class="fas fa-marker"></i>
                </a>
                <a href="Clases\eliminarClase.php?id=<?php echo $row['id']?>" class="btn btn-danger">
                    <i class="far fa-trash-alt"></i>
                </a>
            </td>
            </tr>
          <?php } ?>


    </tbody>
</table>