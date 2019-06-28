  <div class="container">
    <a href="#demo" class="btn btn-lg btn-block btn btn-success" data-toggle="collapse">Nuevo Profesor de Clase</a>
    <div id="demo" class="collapse">
        <div class="form">
            <div class="card card-body">
                <form action="Clases\guardarProfesorClase.php" method="POST" enctype="multipart/form-data">

                    <div class="form-group row">
                        <div class="col-sm-4">
                            <h4>Profesor</h4>
                        </div>
                        <div class="col-sm-8">
                        <select class="form-control" name="profesor">

                                <?php 
                                        $sql= "SELECT * FROM  profesores";
                                        $result= mysqli_query($conn,$sql);
                                    
                                        while($mostrar=mysqli_fetch_array($result)){
                                    ?>
                                <option value="<?php echo $mostrar['id']?>">
                                        <?php echo $mostrar['nombreP']." ".$mostrar['apellido']?>
                                </option>
                                <?php
                                 }     
                                ?>
                            </select>
                        </div>
                    </div> 
                    
                    <div class="form-group row">
                        <div class="col-sm-4">
                            <h4>Clase</h4>
                        </div>
                        <div class="col-sm-8">
                        <select class="form-control" name="clase">

                                <?php 
                                        $sql= "SELECT * FROM  clases";
                                        $result= mysqli_query($conn,$sql);
                                    
                                        while($mostrar=mysqli_fetch_array($result)){
                                    ?>
                                <option value="<?php echo $mostrar['id']?>">
                                        <?php echo $mostrar['nombre']?>
                                </option>
                                <?php
                                 }     
                                ?>
                            </select>
                        </div>
                    </div> 


                    
                    <input type="submit" name="guardar" class="btn btn-lg  btn-block btn btn-success" value="Guardar">
                    
                </form>
                
            </div>
        </div>
    </div>
</div>

</div>