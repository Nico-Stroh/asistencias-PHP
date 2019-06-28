<?php
   
    session_start();

    include('db.php');
    
    $idClase = "";
    $error = "";
    $claseTabla= "";
    $contraseña="";

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        //formulario y  evito la inyeccion de sql
        $idClase = mysqli_real_escape_string($conn, $_POST['usuario']);
        $password = mysqli_real_escape_string($conn, $_POST['password']); 
        //tabla
        $query = "SELECT * FROM clases WHERE id='$idClase'";
  
        $resultado = mysqli_query($conn, $query);
        $row = mysqli_fetch_assoc($resultado);


        $claseTabla=$row['nombre'];
        $contraseña=$row['key'];


        if($password == $contraseña && $claseTabla<>"") {
            $_SESSION['nombreUsuario'] = $claseTabla;
            $_SESSION['idUsuario']=$idClase;
            if ($claseTabla=="Administracion"){
                header("location: administracion.php");
            }else{
              header("location: index.php");  
            }  
        } else {
            $error = "El usuario o la clave es invalida";
            
        }
    }   
?>
<html>

<head>
    <?php include('includes\header.php'); ?>
    <title>Login</title>
</head>

<!-- **************** Formulario ****************************** -->

<body>
    <br>
    <br>
    <div class="container animated fadeInDown">
        <div class="row">
            <div class="col-lg-4">
           
            </div>
            <div class="col-lg-4">
                <br>
                <div class="Login bounce">
                    <h1>Registrarse<br></h1> <br>
                    <form method="post" class="form-signin">
                        <div class="form-group">
                            <label>
                                <h4>Clase:</h4>
                            </label>
                            <select class="form-control" name="usuario">

                                <?php 
                                        $sql= "SELECT * FROM  clases";
                                        $result= mysqli_query($conn,$sql);
                                       
                                        while($mostrar=mysqli_fetch_array($result)){
                                    ?>
                                <option value="<?php echo $mostrar['id']?>"><?php echo $mostrar['nombre']?>
                                </option>
                                <?php
                                        }     
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>
                                <h4>Contraseña:</h4>
                            </label>
                            <input class="form-control" type="password" name="password" require />
                            <br>
                        </div>
                        <label><?php echo $error ?></label><br />
                        <input type="submit" name="enviar" class="btn btn-lg btn-block btn btn-success"
                            value="Enviar" /><br>

                    </form>
                </div>
            </div>
            <div class="col-md-4">
            </div>
        </div>
    </div>
</body>

</html>