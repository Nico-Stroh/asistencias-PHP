  <div class="container">
    <a href="#demo" class="btn btn-lg btn-block btn btn-success" data-toggle="collapse">Nuevo Profesor</a>
    <div id="demo" class="collapse">
        <div class="form">
            <div class="card card-body">
                <form action="Profesores\guardarProfesor.php" method="POST" enctype="multipart/form-data">

                    <div class="form-group row">
                        <div class="col-sm-4">
                            <h4>Nombre</h4>
                        </div>
                        <div class="col-sm-8">
                            <input type="text" name="nombre" id="titulo" class="form-control" placeholder="Titulo (obligatorio)" require>
                        </div>
                    </div> 
                    
                    <div class="form-group row">
                        <div class="col-sm-4">
                            <h4>Apellido</h4>
                        </div>
                        <div class="col-sm-8">
                            <input type="text" name="apellido" id="cliente" class="form-control" placeholder="Cliente (obligatorio)" require>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-4">
                            <h4>Fecha de Nacimiento</h4>
                        </div>
                        <div class="col-sm-8">
                            <?php $fechaActual = date("Y-m-d");?>
                            <input type="date" name="fecha" min="1900-01-01" max="<?php echo $fechaActual?>" step="1"
                                class="form-control" require>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-4">
                            <h4>Dirección</h4>
                        </div>
                        <div class="col-sm-8">
                            <input type="text" name="direccion" id="cliente" class="form-control" placeholder="Cliente (obligatorio)" require>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-4">
                            <h4>Telefono</h4>
                        </div>
                        <div class="col-sm-8">
                            <input type="text" name="telefono" id="cliente" class="form-control" placeholder="Cliente (obligatorio)" require>
                        </div>
                    </div>

                    
                    <input type="submit" name="guardar" class="btn btn-lg  btn-block btn btn-success" value="Guardar">
                    
                </form>
                
            </div>
        </div>
    </div>
</div>

</div>