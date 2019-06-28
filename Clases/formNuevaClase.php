  <div class="container">
    <a href="#demo" class="btn btn-lg btn-block btn btn-success" data-toggle="collapse">Nueva Clase</a>
    <div id="demo" class="collapse">
        <div class="form">
            <div class="card card-body">
                <form action="Clases\guardarClase.php" method="POST" enctype="multipart/form-data">

                    <div class="form-group row">
                        <div class="col-sm-7">
                            <h4>Nombre de la Clase</h4>
                        </div>
                        <div class="col-sm-5">
                            <input type="text" name="nombre" id="nombre" class="form-control" placeholder="(obligatorio)" require>
                        </div>
                    </div> 
                    
                    <div class="form-group row">
                        <div class="col-sm-7">
                            <h4>Contraseña</h4>
                        </div>
                        <div class="col-sm-5">
                            <input type="password" name="contraseña1" id="contraseña1" class="form-control" placeholder="(obligatorio)" require>
                        </div>
                    </div> 

                    <div class="form-group row">
                        <div class="col-sm-7">
                            <h4>Repetir Contraseña</h4>
                        </div>
                        <div class="col-sm-5">
                            <input type="password" name="contraseña2" id="contraseña2" class="form-control" placeholder="(obligatorio)" require>
                        </div>
                    </div> 

                    <div class="form-group row">
                        <div class="col-sm-7">
                            <h4>Edad Minima</h4>
                        </div>
                        <div class="col-sm-5">
                            <input type="number" name="minimo" id="minimo" class="form-control" placeholder="(obligatorio)" require>
                        </div>
                    </div> 

                    <div class="form-group row">
                        <div class="col-sm-7">
                            <h4>Edad Maxima</h4>
                        </div>
                        <div class="col-sm-5">
                           <input type="number" name="maximo" id="maximo" class="form-control" placeholder="(obligatorio)" require>
                        </div>
                    </div> 

                    
                    <input type="submit" name="guardar" class="btn btn-lg  btn-block btn btn-success" value="Guardar">
                    
                </form>
                
            </div>
        </div>
    </div>
</div>

</div>