<?php

session_start();

include_once("config.php");
include_once("entidades/prospecto.php");



if (!isset($_SESSION["nombre"])) {
    header("location:loginMO.php");
}

if($_POST){
    if( isset ($_POST["btnCerrar"])){
        session_destroy();
        header("location:loginMO.php");
    }
  } 

$prospecto = new Prospecto();
$prospecto->cargarFormulario($_REQUEST);


if ($_POST) {
    if (isset($_POST["btnInsertar"])) {
        $prospecto->insertar();

        
    }
    if (isset($_POST["btnGuardar"])) {
        if (isset($_GET["id"]) && $_GET["id"] > 0) {
            //Actualizo un cliente existente
            $prospecto->actualizar();
        } else {
            //Es nuevo
            $prospecto->insertar();
        }
    } else if (isset($_POST["btnBorrar"])) {
        $prospecto->eliminar();
    } else if (isset($_POST["btnCerrarSesion"])) {
        session_destroy();
        header("location:loginMO.php");
    }
    header("location:MO.php");
}
if (isset($_GET["id"]) && $_GET["id"] > 0) {
    $prospecto->obtenerPorId();
}


?>

<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Prospecto-formulario</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="icon" type="image/png" href="/images/MO.jpg" />
    <link rel="shortcut icon" type="image/x-icon" href="/images/MO.jpg" />


</head>
<style>
    .boton1{
        background-color:#00a877 !important;
        box-shadow:  3px -3px 7px #bec2c4, 
             -3px 3px 7px #ffffff;
       transition: 0.5s;
    }
    .boton1:hover{
        background-color: #2e8b57!important; 
        color: #f5f5f5;
    }
    .boton2{
        background-color:#ef3038 !important;
        box-shadow:  3px -3px 7px #bec2c4, 
             -3px 3px 7px #ffffff;
        transition: 0.5s; 
    }
    .boton2:hover{
        background-color: #ce2029!important;
        color: #f5f5f5;                           
    }
    .boton3{
        background-color: #367588!important;
        box-shadow:  3px -3px 7px #bec2c4, 
             -3px 3px 7px #ffffff;
        transition: 0.5s;
    }
    .boton3:hover{
        background-color: #003153!important;
        color: #f5f5f5;
    }
    input, select{
        box-shadow:  3px -3px 7px #bec2c4, 
             -3px 3px 7px #ffffff;
    }
    img{
        box-shadow:  3px -3px 7px #bec2c4, 
             -3px 3px 7px #ffffff;
    }
</style>
<body id="page-top">


    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.20/datatables.min.css" />
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.20/datatables.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <?php include_once("headerMO.php"); ?>

    <!-- Begin Page Content -->


    <section class="Registro">
        <div class="container">
            <div class="row">
                <div class="col-12 d-flex justify-content-center">
                    <h1>Datos del prospecto</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 form-group">
                    <label for="txtNombre">Nombre y apellido:</label>
                    <input type="text" class="form-control" name="txtNombre" id="txtFechaNac" value="<?php echo $prospecto->nombre ?>">
                </div>
                <div class="col-md-6 form-group">
                    <label for="txtTelefono">Teléfono:</label>
                    <input type="number" class="form-control" name="txtTelefono" id="txtTelefono" value="<?php echo $prospecto->telefono ?>">
                </div>
                <div class="col-md-6 form-group">
                    <label for="txtDireccion">Direccion:</label>
                    <input type="text" required class="form-control" name="txtDireccion" id="txtDireccion" value="<?php echo $prospecto->direccion ?>">
                </div>
                <div class="col-md-6 form-group">
                    <label for="txtFecha_nac">Fecha de nacimiento:</label>
                    <input type="date" required class="form-control" name="txtFecha_nac" id="txtFecha_nac" value="<?php echo $prospecto->fecha_nac ?>" >
                </div>
                <div class="col-md-6 form-group">
                    <label for="txtSexo">Sexo:</label>
                    <select  class="form-control" name="txtSexo" id="txtSexo" value="<?php echo $prospecto->fecha_nac ?>">
                        <option class="form-control"  disable selected>Seleccione el sexo</option>
                        <option class="form-control"  value="Hombre"<?php echo $prospecto->sexo==="Hombre"? "selected":"";?>>Hombre</option>
                        <option class="form-control"  value="Mujer"<?php echo $prospecto->sexo==="Mujer"? "selected":"";?>>Mujer</option>
                    </select>  
                </div>
                <div class="col-md-6 form-group">
                    <label for="txtEmail">Email:</label>
                    <input type="email"  class="form-control" name="txtEmail" id="txtEmail" value="<?php echo $prospecto->email ?>" >
                </div>
            </div>
            <div class="row">
                <div class="col-12">                    
                    <button type="submit" name="btnGuardar" class="btn btn-success boton1">Guardar <i class="fas fa-folder-plus"></i></button>
                    <button type="submit" name="btnBorrar" class="btn btn-danger boton2">Borrar <i class="fas fa-trash-alt"></i></button>
                    <div class="row">
                        <div class="col-12 text-left mt-2 ">
                        <a href="MO.php" class="btn btn-primary boton3" name="btnNuevo" >Volver al listado <i class="fas fa-undo"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            
    </section>

    <!-- Button trigger modal -->

    


  
    <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->



    </div>
    <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Desea salir del sistema?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Hacer clic en "Cerrar sesión" si deseas finalizar tu sesión actual.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a href="loginMO" class="btn btn-primary boton3" name="btnCerrarSesion">Cerrar sesión</a>
                </div>
            </div>
        </div>
    </div>
    </form>





</body>

</html>